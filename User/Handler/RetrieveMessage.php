<?php
 

session_start();
header('Content-Type: application/json');
session_write_close();
require_once('../../Database/db_connect.php');

$defaultActiveValue = 1;
$accountId = $_SESSION['account_id'] ?? 0;
$lastChatId = isset($_GET['last_chat_id']) ? intval($_GET['last_chat_id']) : 0;
$page = isset($_GET['Page']) ? intval($_GET['Page']) : 1;
$limit = 40;
$offset = ($page - 1) * $limit;

$content = '';

function getMessages($conn, $defaultActiveValue, $lastChatId, $accountId) {
    $content = '';

    if ($lastChatId > 0) {
        $query = "
            SELECT * FROM public_chat
            WHERE is_active = ? AND chat_id > ?
            ORDER BY chat_id ASC
            LIMIT 20
        ";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'ii', $defaultActiveValue, $lastChatId);
    } else {
        $query = "
            SELECT * FROM (
                SELECT * FROM public_chat
                WHERE is_active = ?
                ORDER BY chat_id DESC
                LIMIT 40
            ) AS recent_chats
            ORDER BY chat_id ASC
        ";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $defaultActiveValue);
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $chatId = htmlspecialchars($row['chat_id']);
        $chatContent = htmlspecialchars($row['chat_content']);

        
        if ($row['account_id'] == $accountId) {
        $content .= '
            <div id="CardMessage" data-chat-id="' . $chatId . '" class="chat-message d-flex justify-content-end mt-3">
                <p class="primary-color m-0 primary-fs p-2 text-white rounded" style="max-width: 75%; font-size: 14px; word-break: break-all; overflow-wrap; break-word">
                        ' . $chatContent . ' 
                </p>
            </div>';
        } else {
        $sender = getUserProfile($row['account_id']);

        $content .= '
            <div id="CardMessage" data-chat-id="' . $chatId . '" class="d-flex w-100 mt-3 chat-message" style="max-width: 80%">
                <div class="rounded-circle align-self-end me-1 flex-shrink-0" style="background-color: '. $sender['sender_profile_color'] .'; height: 15px; width: 15px;"></div>
                <div class="d-flex flex-column gap-0" style="max-width:100%">
                    <p class="primary-fs m-0"><small>' . $sender['sender_display_name'] . '</small></p>
                    <div>
                    <p class="p-0 m-0 w-auto primary-color primary-fs w-auto p-2 flex-shrink-0 text-white rounded" style=" overflow-wrap: break-word" >
                        ' . $chatContent . '
                    </p>
                    </div>
                </div>
            </div>';
        }
    }

    return $content;
}

function getUserProfile($accountId) {
    include('../../Database/db_connect.php');

    $query = 'SELECT display_name, profile_color FROM accounts WHERE account_id = ?';
    $stmt = mysqli_prepare($conn_accounts, $query);
    mysqli_stmt_bind_param($stmt, 'i', $accountId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        $sender_display_name = $row['display_name'];
        $sender_profile_color = $row['profile_color'];
        return [
            'sender_display_name' => $sender_display_name,
            'sender_profile_color' => $sender_profile_color
        ];
    }

    return [
            'sender_display_name' => "unknown",
            'sender_profile_color' => "#ff4444"
        ];
}

// 1st try: check immediately
$content = getMessages($conn_contents, $defaultActiveValue, $lastChatId, $accountId);

if (empty($content)) {
    // If nothing new, wait once
    sleep(10);

    // Try again once
    $content = getMessages($conn_contents, $defaultActiveValue, $lastChatId, $accountId);
}

echo json_encode(['content' => $content]);
