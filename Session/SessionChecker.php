<?php
session_start();

if (!$_SESSION['isLoggedIn']) {
    header('Location: ../');
} 
 
if (!isset($_SESSION['isLoggedIn'])) {
    header('Location: ../');
} 
?>