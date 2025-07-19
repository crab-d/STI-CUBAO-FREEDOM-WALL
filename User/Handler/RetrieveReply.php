<?php

$post_id = $_GET['post_id'];
$comment_id = $_GET['comment_id'];

function getPostCommentReply($post_id, $comment_id) {
    require '../../Database/db_connect.php';
    $initialActiveValue = 1;
    $reply = '';
 

    $query = 'SELECT * FROM reply_comment_post WHERE comment_id = ? AND post_id = ? AND is_active = ?';
    $stmt = mysqli_prepare($conn_contents, $query);
    mysqli_stmt_bind_param($stmt, 'iii', $comment_id,$post_id,$initialActiveValue);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_assoc($result)) {
   
        $reply .= '
            <div class="user-comment w-100 d-flex align-items-end justify-content-start " >
                <div style="height: 15px; width: 15px;" class="rounded-circle me-2 primary-color flex-shrink-0"></div>
                <div class="d-flex flex-column align-items-start justify-content-end ">
                    <p class="fs-6 m-0 text-start opacity-50"><small>'. getUserDisplayName($row['account_id']) .'</small></p>
                    <p class="primary-color text-start m-0 rounded p-1 text-white" >'. $row['reply_content'] .'</p>
                </div>
                <p class="primary-text fs-6 m-0 ms-2"><small>Reply</small></p>
            </div>
        ';
    }
    return $reply;
}

header('Content-Type: application/json');
echo json_encode(getPostCommentReply($post_id, $comment_id));
?>