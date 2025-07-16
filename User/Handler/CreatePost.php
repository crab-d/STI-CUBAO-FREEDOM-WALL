<?php
date_default_timezone_set('Asia/Manila');
$post_date = date('F j, Y g:i A');


include '../Database/db_connect.php';
if (
    $_SERVER['REQUEST_METHOD'] === "POST" && 
    isset($_POST['sumbit_post']) &&
    isset($_POST['post_content']) && 
    isset($_POST['post_chanel']) && 
    !empty($_POST['post_content']) 
    )
{
    $query = 'INSERT INTO user_post(account_id,post_date,post_content,post_chanel) VALUES (?,?,?,?)';
    $stmt = mysqli_prepare($conn_contents, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $_SESSION['account_id'], $post_date, $_POST['post_content'], $_POST['post_chanel']);
    if (mysqli_stmt_execute($stmt)) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo '<div class="alert alert-danger"> Something went wrong, please try again. If error persist contact STI FREEDOM WALL FB PAGE THANK YOU</div>';
    }
};