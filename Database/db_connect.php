<?php


$host = "localhost";
$user = "root";
$password = "";
$db_acc = "user_accounts";
$db_contents = "contents";

$conn_accounts = mysqli_connect($host,$user,$password,$db_acc);
if (!$conn_accounts) {
    die("Conenction Failed" . mysqli_connect_error());
}

$conn_contents = mysqli_connect($host,$user,$password,$db_contents);
if (!$conn_contents) {
    die("Connection Failed" . mysqli_connect_error());
} 

 

 ?>