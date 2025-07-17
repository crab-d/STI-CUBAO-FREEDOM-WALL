<?php
include('../../Database/db_connect.php');
session_start();

$account_id = isset($_SESSION['account_id']) ? $_SESSION['account_id'] : 0;
$post_id = isset($_POST['post_id']) ? $_POST['post_id'] : 0;
 
 
if ($account_id !== 0) {
    $query = 'INSERT INTO like_post (account_id, post_id) VALUES (?,?) ';
    $stmt = mysqli_prepare($conn_contents, $query);
    mysqli_stmt_bind_param($stmt, 'ii', $account_id, $post_id);
    mysqli_execute($stmt);
}  

 
?>