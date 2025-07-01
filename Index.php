<?php
// index.php

$url = $_GET['url'] ?? 'Public/LandingPage';

$url = strtolower($url);

$file = $url . '.php';

if (file_exists($file)) {
    require $file;
} else {
    echo "404 Not Found";
}
