<?php
include '../Database/db_connect.php';

$post_id = $_GET['post_id'].

$query = 'SELECT COUNT(*) as total_likes FROM like_post WHERE post_id = ?';
$stmt = mysqli_prepare($conn_contents, $query);
mysqli_stmt_bind_param($stmt, 'i', $post_id);
mysqli_execute($stmt);
mysqli_stmt_bind_result($stmt, $total_likes);
mysqli_stmt_fetch($stmt);

header('Content-Type: application/json');
echo json_encode([
    'totalLike' => $total_likes,
])

?>