<?php
include('../../Database/db_connect.php');
session_start();

$post_id = $_GET['post_id'];
$account_id = $_SESSION['account_id'];
$is_active = 1;
$user_comment = '';

$query = 'SELECT * FROM comment_post WHERE post_id = ? AND is_active = ? ORDER BY comment_id DESC' ;
$stmt = mysqli_prepare($conn_contents, $query);
mysqli_stmt_bind_param($stmt, 'ii', $post_id, $is_active);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

while ($row = mysqli_fetch_assoc($result)) {
    if ((bool) $row['is_active']) {
        $user_comment .= '
        <div class="d-flex flex-column align-items-end mb-3 ">
            <div class="user-comment w-100 d-flex align-items-end justify-content-start " >
                <div style="height: 15px; width: 15px;" class="rounded-circle me-2 primary-color flex-shrink-0"></div>
                <div class="d-flex flex-column align-items-start justify-content-end ">
                    <p class="fs-6 m-0 text-start opacity-50"><small>'. getUserDisplayName($row['account_id']) .'</small></p>
                    <p class="primary-color text-start m-0 rounded p-1 text-white" >'. $row['comment_content'] .'</p>
                </div>
                <p data-comment-id="'. $row['comment_id'].'" data-post-id="'. $row['post_id'].'" data-display-name="'.getUserDisplayName($row['account_id']).'" class="reply-comment primary-text fs-6 m-0 ms-2" style="cursor: pointer"><small>Reply <span class="primary-color rounded text-white p-1" style="height: 10px; width: 10px; font-size: 10px">'. getPostReplyCount($row['post_id'], $row['comment_id']). '</span></small></p>
            </div>
            <div id="reply-container-'.$row['comment_id'].'" class="w-100 d-none bg-light d-flex flex-column align-items-start justify-content-start ps-3">
                    '. getPostCommentReply($row['post_id'], $row['comment_id']) .'
                    <div class="w-100 p-0">
                    <form id="reply-form-'. $row['comment_id'].'" class="d-flex w-100 justify-content-between p-2" >
                    <input type="hidden" name="post_id" value="'. $row["post_id"] .'">
                        <input id="reply_input"  class="reply_input w-100 m-0 comment-input-box rounded border-0 bg-white shadow-sm" placeholder="Comment as ' . getUserDisplayName($account_id) . '">
                        <button id="reply_submit" class="btn primary-color text-white rounded shadow-sm m-1"  type="submit">Send</button>
                    </form>
                    </div>
                </div>';
        $user_comment .= '</div>';
    }
    
}

function getPostReplyCount($post_id ,$comment_id) {
    require '../../Database/db_connect.php';
    $query = 'SELECT COUNT(*) AS total_reply FROM reply_comment_post WHERE post_id = ? AND comment_id = ?';
    $stmt = mysqli_prepare($conn_contents, $query);
    mysqli_stmt_bind_param($stmt, 'ii', $post_id, $comment_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $total_reply);
    mysqli_stmt_fetch($stmt);
    return $total_reply;
}

function getPostCommentReply($post_id, $comment_id) {
    require '../../Database/db_connect.php';
    $initialActiveValue = 1;
    $reply = '';
    $rowCount = 0;

    $query = 'SELECT * FROM reply_comment_post WHERE comment_id = ? AND post_id = ? AND is_active = ?';
    $stmt = mysqli_prepare($conn_contents, $query);
    mysqli_stmt_bind_param($stmt, 'iii', $comment_id,$post_id,$initialActiveValue);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_assoc($result)) {
        $rowCount++;
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

function getUserDisplayName($account_id){
    require '../../Database/db_connect.php';
    $query = 'SELECT display_name FROM accounts WHERE account_id = ?';
    $stmt = mysqli_prepare($conn_accounts, $query);
    mysqli_stmt_bind_param($stmt, 'i', $account_id);
    mysqli_execute($stmt);
    $posterDisplayName = 'unknown';

    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        $posterDisplayName = $row['display_name'];
    }

    return $posterDisplayName;
}

header('Content-Type: application/json');
echo json_encode([
    'User_Comment' => $user_comment
])

?>
