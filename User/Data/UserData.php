<?php 
session_start();
$account_id = $_SESSION['account_id'];
$display_name = $_SESSION['display_name'];
$firstName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];
$email = $_SESSION['email'];
$is_muted = $_SESSION['is_muted'];
$is_admin = $_SESSION['is_admin'];
$is_active = $_SESSION['is_active'];
$data_joined = $_SESSION['date_joined'];

//should i query data instead? or query once updated

?>