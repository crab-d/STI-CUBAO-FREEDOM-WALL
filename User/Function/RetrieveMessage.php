<?php
include('../../Database/db_connect.php');
session_start();

$defaultActiveValue = 1;
$query = "SELECT * FROM (
             SELECT * FROM public_chat 
             WHERE is_active = ? 
             ORDER BY chat_id DESC 
             LIMIT 20
         ) AS recent_chats 
         ORDER BY chat_id ASC";

$stmt = mysqli_prepare($conn_contents, $query);
mysqli_stmt_bind_param($stmt, 'i', $defaultActiveValue);
mysqli_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['account_id'] == $_SESSION['account_id']) {
        echo '
            <div id="CardMessage" class="d-flex justify-content-end w-100 mt-3">
                <p class="primary-color m-0 fs-6 p-1 text-white rounded" style="max-width: 75%;"><small>' . $row['chat_content'] . '</small></p>
            </div>
        ';
    } else {
        echo '
            <div id="CardMessage" class="d-flex w-100 mt-3">
                <div class="primary-color rounded-circle align-self-end me-1 flex-shrink-0" style="height: 15px; width: 15px;"></div>
                <div class="d-flex flex-column">
                    <p class="fs-6 m-0"><small>' . $row['display_name'] . '</small></p>
                    <p class="primary-color m-0 fs-6 p-1 text-white rounded" style="max-width: 75%;"><small>' . $row['chat_content'] . '</small></p>
                </div>
            </div>
        ';
    }
}

?>