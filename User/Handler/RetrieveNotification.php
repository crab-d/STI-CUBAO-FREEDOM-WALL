<?php
 
 
include('../Database/db_connect.php');
$account_id = $_SESSION['account_id'];

$query = 'SELECT * FROM `notification` WHERE receiver_id = ? AND NOT sender_id = ? ORDER BY notification_id DESC';
$stmt = mysqli_prepare($conn_contents, $query); 
mysqli_stmt_bind_param($stmt, 'ii', $account_id, $account_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) > 0) {
     while ($row = mysqli_fetch_assoc($result)) {
        $account_data = getUserProfile($row['sender_id']);

        switch ($row['notif_type']) {
            case 'comment':
                $notif_icon = '<i class="bi bi-chat-right-dots-fill text-primary me-2"></i> ';
                $notif_type = ' commented';
                break;
            case 'reply':
                $notif_icon = '<i class="bi bi-chat-right-dots-fill text-primary me-2"></i> ';
                $notif_type = ' replied';
                break;
            case 'like':
                $notif_icon = '<i class="bi bi-suit-heart-fill text-danger me-2"></i> ';
                $notif_type = ' liked';
                break;
        }
        echo '
        <div data-post-id='. $row['post_id']. ' class="my-1" style="cursor: pointer">
            <p class="w-100  p-2 m-0 border rounded bg-light primary-fs poppins-medium">' . $notif_icon . $account_data['sender_display_name'] . $notif_type . ' on your post</p>
        </div>';
    }
   
} else {
   echo "<p class='text-center w-100 fs-6'> You don't have any notification </p>";
}

function getUserProfile($accountId) {
    include('../Database/db_connect.php');

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
}
?>
