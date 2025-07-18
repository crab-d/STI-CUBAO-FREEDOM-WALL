<?php
include('../../Database/db_connect.php');
include('../../User/Data/UserData.php');

$post_id = $_POST['post_id'];
$comment_content = $_POST['comment_content'];

date_default_timezone_set('Asia/Manila');
$date = date('F j, Y g:i A');


$query = 'INSERT INTO comment_post (account_id, post_id, comment_content, comment_date) VALUES (?,?,?,?)';
$stmt = mysqli_prepare($conn_contents, $query);
mysqli_stmt_bind_param($stmt, 'iiss', $account_id, $post_id, $comment_content, $date);
if ( mysqli_stmt_execute($stmt)) {

}


?>