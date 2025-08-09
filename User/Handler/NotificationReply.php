<?php
session_start();
include('../../Database/db_connect.php');

$sender_id = $_SESSION['account_id'];
$receiver_id = $POST['receiver_id'];
$post_id = $POST['post_id'];
$type = "reply";

date_default_timezone_set('Asia/Manila');
$date = date("F j, Y h:i A");

$query = "INSERT INTO notifcation (sender_id, receiver_id, notif_type, notif_date post_id) VALUES (?,?,?,?,?)";
$stmt = mysqli_prepare($conn_contents, $query);
mysqli_stmt_bind_param($stmt, 'iisi', $sender_id, $receiver_id)

?>