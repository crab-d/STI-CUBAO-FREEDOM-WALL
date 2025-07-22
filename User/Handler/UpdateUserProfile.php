<?php
include('../../Database/db_connect.php');
session_start();


$profile_color = $_POST['profile_color'] ?? '#111111';
$display_name = $_POST['display_name'] ?? 'error';

$_SESSION['profile'] = $profile_color;
$_SESSION['display_name'] = $display_name;

$account_id = $_SESSION['account_id'];

$query = 'UPDATE accounts SET profile_color = ?, display_name = ? WHERE account_id = ?';
$stmt = mysqli_prepare($conn_accounts, $query);
mysqli_stmt_bind_param($stmt, 'ssi', $profile_color, $display_name, $account_id);
if (mysqli_stmt_execute($stmt)) {
    echo 'success';
} else {
    echo 'failed';
}

print_r($_SESSION)
?>