<?php
session_start();
include('../../Database/db_connect.php');

$sender_id = $_SESSION['account_id'];
$notif_type = isset($_POST['notif_TYPE']) ? $_POST['notif_TYPE'] : 0; //Like
$post_id = isset($_POST['post_ID']) ? $_POST['post_ID'] : 0; 


$receiver_id = getReceiverID($post_id);
date_default_timezone_set('Asia/Manila');
$date = date("F j, Y h:i A");

$query = 'INSERT INTO `notification` (sender_id, receiver_id, notif_type, notif_date, post_id) VALUES (?,?,?,?,?)';
$stmt = mysqli_prepare($conn_contents, $query);
mysqli_stmt_bind_param($stmt, 'iissi', $sender_id, $receiver_id, $notif_type, $date, $post_id);
mysqli_stmt_execute($stmt);

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


?>