<?php
session_start();
header('Content-Type: application/json');
session_write_close();
require_once('../../Database/db_connect.php');

$defaultActiveValue = 1;
$accountId = $_SESSION['account_id'] ?? 0;
$lastChatId = isset($_GET['last_chat_id']) ? intval($_GET['last_chat_id']) : 0;
$page = isset($_GET['Page']) ? intval(isset($_GET['Page'])) : 1;
$limit = 40;
$offset = ($page - 1) * $limit;

$startTime = time();
$timeout = 600;
$content = '';

do {
    // Query for messages newer than lastChatId
    if ($lastChatId > 0) {
        // Long polling: get new messages only
        $query = "
        SELECT * FROM public_chat
        WHERE is_active = ? AND chat_id > ?
        ORDER BY chat_id ASC
        LIMIT 20
    ";

        $stmt = mysqli_prepare($conn_contents, $query);
        mysqli_stmt_bind_param($stmt, 'ii', $defaultActiveValue, $lastChatId);
    } else {
        $query = "
        SELECT * FROM (
            SELECT * FROM public_chat
            WHERE is_active = ?
            ORDER BY chat_id DESC
        ) AS recent_chats
        ORDER BY chat_id ASC
    ";

        $stmt = mysqli_prepare($conn_contents, $query);
        mysqli_stmt_bind_param($stmt, 'i', $defaultActiveValue);
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // New messages found, build content
        while ($row = mysqli_fetch_assoc($result)) {
            $chatId = htmlspecialchars($row['chat_id']);
            $chatContent = htmlspecialchars($row['chat_content']);
            $displayName = htmlspecialchars($row['display_name']);

            if ($row['account_id'] == $accountId) {
                $content .= '
                    <div id="CardMessage" data-chat-id="' . $chatId . '" class="chat-message d-flex justify-content-end w-100 mt-3">
                        <p class="primary-color m-0 fs-6 p-1 text-white rounded" style="max-width: 75%;">
                            <small>' . $chatContent . '</small>
                        </p>
                    </div>';
            } else {
                $content .= '
                    <div id="CardMessage" data-chat-id="' . $chatId . '" class="d-flex w-100 mt-3 chat-message">
                        <div class="primary-color rounded-circle align-self-end me-1 flex-shrink-0" style="height: 15px; width: 15px;"></div>
                        <div class="d-flex flex-column">
                            <p class="fs-6 m-0"><small>' . $displayName . '</small></p>
                            <p  class="primary-color m-0 fs-6 p-1 text-white rounded" style="max-width: 75%;">
                                <small>' . $chatContent . '</small>
                            </p>
                        </div>
                        
                    </div>';
            }
        }
        break; // exit loop and respond immediately with new data
    } else {
        // No new messages yet, wait a bit and check again
        usleep(500000); // wait 0.5 seconds
    }
} while ((time() - $startTime) < $timeout);

// Respond (could be empty content if timeout)
echo json_encode(['content' => $content]);
