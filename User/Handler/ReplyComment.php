<?php
include('../../Database/db_connect.php');
include('../Data/UserData.php');

$post_id = $_POST['post_id'];
$comment_id = $_POST['comment_id'];
$reply_content = $_POST['reply_content'];

date_default_timezone_set('Asia/Manila');
$date = date('F j, Y g:i A');

$query = 'INSERT INTO reply_comment_post (account_id, post_id,comment_id,reply_content,reply_date) VALUES (?,?,?,?,?)';
$stmt = mysqli_prepare($conn_contents, $query);
mysqli_stmt_bind_param($stmt, 'iiiss', $account_id, $post_id, $comment_id, $reply_content,$date);
mysqli_stmt_execute($stmt);


?>