    <?php
    include('../../Database/db_connect.php');
    session_start();


    $profile_color = $_POST['profile_color'] ?? '#111111';
    $display_name = $_POST['display_name'] ?? 'error';



    $account_id = $_SESSION['account_id'];

    $stmt = mysqli_prepare($conn_accounts, 'SELECT `account_id` FROM accounts WHERE display_name = ? AND account_id != ?');
    mysqli_stmt_bind_param($stmt, "si", $display_name, $account_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="alert alert-danger">Display name already taken, please try different one</div>';
    } else {
        $query = 'UPDATE accounts SET profile_color = ?, display_name = ? WHERE account_id = ?';
        $stmt = mysqli_prepare($conn_accounts, $query);
        mysqli_stmt_bind_param($stmt, 'ssi', $profile_color, $display_name, $account_id);
        if (mysqli_stmt_execute($stmt)) {
            echo 'success';
            $_SESSION['profile'] = $profile_color;
            $_SESSION['display_name'] = $display_name;
        } else {
            echo 'failed';                                                                                                                                                                   
        }
    }
    ?>