<?php
$dsn = 'mysql:host=localhost;dbname=chatdb;charset=utf8mb4';
$user = 'root';       // change if needed
$pass = '';           // change if needed

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

// Poll for new messages
if (isset($_GET['poll'])) {
    header('Content-Type: application/json');
    $lastId = intval($_GET['last_id'] ?? 0);
    $timeout = 30;
    $start = time();

    do {
        $stmt = $pdo->prepare("SELECT id, message FROM messages WHERE id > ? ORDER BY id ASC");
        $stmt->execute([$lastId]);
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($messages)) {
            echo json_encode(['status' => 'ok', 'messages' => $messages]);
            exit;
        }

        usleep(200000); // 0.2 second
    } while (time() - $start < $timeout);

    echo json_encode(['status' => 'timeout', 'messages' => []]);
    exit;
}

// Insert new message
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    $msg = trim($_POST['message']);
    if ($msg !== '') {
        $stmt = $pdo->prepare("INSERT INTO messages (message) VALUES (?)");
        $stmt->execute([$msg]);
    }
    echo json_encode(['status' => 'sent']);
    exit;
}
