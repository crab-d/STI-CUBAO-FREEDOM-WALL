<?php
session_start();
include('../../Database/db_connect.php');


$sender_id = $_SESSION['account_id'];
$notif_type = isset($_POST['notif_TYPE']) ? $_POST['notif_TYPE'] : 0;

switch ($notif_type) {
    case 'comment':
        $post_id = $_POST['post_ID'];
        $receiver_id = getReceiverID($post_id);
        break;
    case 'like':
        $post_id = $_POST['post_ID'];
        $receiver_id = getReceiverID($post_id);
        break;
    case 'reply':
        $post_id = $_POST['post_ID'];
        $receiver_id = getReceiverID_reply($_POST['comment_ID']);
        break;
}

if ($sender_id == $receiver_id) return;
    
date_default_timezone_set('Asia/Manila');
$date = date("F j, Y h:i A");

$query = 'INSERT INTO `notification` (sender_id, receiver_id, notif_type, notif_date, post_id) VALUES (?,?,?,?,?)';
$stmt = mysqli_prepare($conn_contents, $query);
mysqli_stmt_bind_param($stmt, 'iissi', $sender_id, $receiver_id, $notif_type, $date, $post_id);
mysqli_stmt_execute($stmt);
var_dump($_POST);

function getReceiverID($post_id) {
    include('../../Database/db_connect.php');

    $query = 'SELECT account_id AS receiver_id FROM user_post WHERE post_id  = ?';
    $stmt = mysqli_prepare($conn_contents, $query);
    mysqli_stmt_bind_param($stmt, 'i', $post_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $receiver_id);
    mysqli_stmt_fetch($stmt);

    return $receiver_id;    
}

function getReceiverID_reply($comment_id) {
    include('../../Database/db_connect.php');

    $query = 'SELECT account_id AS receiver_id FROM comment_post WHERE comment_id  = ?';
    $stmt = mysqli_prepare($conn_contents, $query);
    mysqli_stmt_bind_param($stmt, 'i', $comment_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $receiver_id);
    mysqli_stmt_fetch($stmt);

    return $receiver_id;  
}

?>