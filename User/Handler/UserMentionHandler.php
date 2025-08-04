    <?php
    include('../../Database/db_connect.php');

    $query = $_GET['query'] ?? '';

    // Make sure connection is good
    if (!$conn_accounts) {
        http_response_code(500);
        echo json_encode(['error' => 'Database connection failed']);
        exit;
    }

    $stmt = $conn_accounts->prepare("SELECT display_name FROM accounts WHERE display_name LIKE CONCAT('%', ?, '%') LIMIT 5");
    $stmt->bind_param("s", $query);
    $stmt->execute();

    $result = $stmt->get_result();
    $users = [];

    while ($row = $result->fetch_assoc()) {
        $users[] = [
            'key' => $row['display_name'],
            'value' => $row['display_name']
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($users);
?>