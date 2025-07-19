<?php
session_start();

if (!$_SESSION['isLoggedIn']) {
    header('Location: ../');
} 
 
?>