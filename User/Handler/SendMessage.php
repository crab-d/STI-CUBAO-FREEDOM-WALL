<?php
session_start();
include '../../Database/db_connect.php';

$accountId = $_SESSION['account_id'];

date_default_timezone_set("Asia/Manila");
$chat_date = date('F j, Y g:i A');

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['chatContent'])) {
    $chatContent = htmlspecialchars($_POST['chatContent']);
    $query = 'INSERT INTO public_chat(account_id,chat_content,chat_date) VALUES (?,?,?)';
    $stmt = mysqli_prepare($conn_contents, $query);
    mysqli_stmt_bind_param($stmt, 'iss', $accountId, $chatContent, $chat_date);
    if (mysqli_stmt_execute($stmt)) {
       
    } else {
       
    }
} 

?>