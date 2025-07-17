<?php 
 
require '../../Database/db_connect.php';
session_start();

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;
$defaultHiddenValue = 0;
$filter = isset($_GET['postFilter']) ? $_GET['postFilter'] : '';
$htmlContent = '';
$account_id = isset($_SESSION['account_id']) ? $_SESSION['account_id'] : 0;
$rowCount = 0;

if ($filter === '') {
    $query = 'SELECT * FROM user_post WHERE is_hidden = ? ORDER BY post_id DESC LIMIT ?, ?';
    $stmt = mysqli_prepare($conn_contents, $query);
    mysqli_stmt_bind_param($stmt, 'iii', $defaultHiddenValue, $offset, $limit);
} else {
    $query = 'SELECT * FROM user_post WHERE is_hidden = ? AND post_chanel = ? ORDER BY post_id DESC LIMIT ?,?';
    $stmt = mysqli_prepare($conn_contents, $query);
    mysqli_stmt_bind_param($stmt, 'isii', $defaultHiddenValue, $filter, $offset, $limit);
}

mysqli_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
file_put_contents("debug.log", "Page: $page, Offset: $offset, Filter: $filter\n", FILE_APPEND);
while ($row = mysqli_fetch_assoc($result)) {
    $rowCount++;
    switch ($row['post_chanel']) {
        case 'random_message':
            $postColor = '#38b6ff';
            $textColor = '#f1f1f1ff';
            break;
        case 'rants':
            $postColor = '#ffc107';
            $textColor = '#1b1b1bff';

            break;
        case 'confession':
            $postColor = '#dc3545';
            $textColor = '#f1f1f1ff';
            break;
        case 'questions':
            $postColor = '#0d6efd';
            $textColor = '#f1f1f1ff';
            break;
        case 'lf_classmates':
            $postColor = '#198754';
            $textColor = '#f1f1f1ff';
            break;
        case 'lost_and_found':
            $postColor = '#212529';
            $textColor = '#f1f1f1ff';
            break;
        
        default:
            $postColor = '#38b6ff';
            $textColor = '#f1f1f1ff';
            break;
    }
    
    $htmlContent .= '
    <div data-post-id="' . $row['post_id'] . '" class="user_post bg-light rounded-2 shadow-sm border m-2 p-0 w-75 d-flex flex-column overflow-hidden container flex-shrink-0">
        <div id="PostCard_Header" class="bg-light m-0 d-flex justify-content-between p-2">
            <p class="m-0">' . getPosterDisplayName($row["account_id"]) . '</p>
 
            <p class="m-0">' . $row['post_date'] . '</p>
        </div>

        <div id="PostCard_Body" class="text-white p-5" style="background-color: ' . $postColor . '">
            <p class="text-center my-5" style="color: ' . $textColor . '">' . $row['post_content'] . '</p>
        </div>

        <div id="PostCard_ActionBar" class="rounded bg-white d-flex justify-content-between p-2">';

        if (checkUserLikePost($row['post_id'], $account_id)) {
            $htmlContent .= '<p style="cursor: default" class="disabled-like m-0 like_post" data-post-id="' . $row['post_id'] .  '">
                Likes <span class="rounded text-white poppins-medium primary-color p-1" style="height:10px; width:10px;">' . getPostLike($row['post_id']) .  '</span>
            </p>';
        } else {
            $htmlContent .= '<p style="cursor: pointer" class="m-0 like_post" data-post-id="' . $row['post_id'] . '">
                Likes <span class="rounded text-white poppins-medium primary-color p-1" style="height:10px; width:10px;">' . getPostLike($row['post_id']) .  '</span>
            </p>';
        }

        $htmlContent .= '<p class="m-0">' . $row['comment_count'] . '</p>
        </div>
    </div>';

}

header('Content-Type: application/json');
echo json_encode([
    'html' => $htmlContent,
    'count' => $rowCount
]);


function getPosterDisplayName($account_id){
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

function getPostLike($post_id) {
    require '../../Database/db_connect.php';
    $query = 'SELECT COUNT(*) AS total_likes FROM like_post WHERE post_id = ?';
    $stmt = mysqli_prepare($conn_contents, $query);
    mysqli_stmt_bind_param($stmt, 'i', $post_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $total_likes);
    mysqli_stmt_fetch($stmt);
    return $total_likes;
}

function checkUserLikePost($post_id, $account_id) {
    require '../../Database/db_connect.php';
    $query = 'SELECT like_id FROM like_post WHERE account_id = ? AND post_id = ?';
    $stmt = mysqli_prepare($conn_contents, $query);
    mysqli_stmt_bind_param($stmt, 'ii', $account_id, $post_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        return true;
    }
    return false;
}

?>
