<?php
include '../Session/SessionChecker.php';
include '../Database/db_connect.php';
include '../User/Components/Header.php';

function retrive_user_data() {
    include '../Database/db_connect.php';
    $stmt = mysqli_prepare($conn_accounts, 'SELECT * FROM accounts WHERE school_email = ?');
    mysqli_stmt_bind_param($stmt, "s" , $_SESSION['email']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)){
        if ((bool) $row['is_active']) {
            $_SESSION['account_id'] = $row['account_id'];
            $_SESSION['display_name'] = $row['display_name'];
            $_SESSION['firstName'] = $row['user_firstname'];
            $_SESSION['lastName'] = $row['user_lastname'];
            $_SESSION['email'] = $row['school_email'];
            $_SESSION['is_muted'] = (bool) $row['is_muted'];
            $_SESSION['is_admin'] = (bool) $row['is_admin'];
            $_SESSION['is_active'] = (bool) $row['is_active'];
            $_SESSION['date_joined'] = $row['date_joined'];
            header('Location: ../User/UserDashboard.php');
        } else {
            header('Location: ../');
        }
    }
    
}

retrive_user_data();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["displayName"])) {
    $stmt = mysqli_prepare($conn_accounts, 'SELECT `account_id` FROM accounts WHERE display_name = ?');
    mysqli_stmt_bind_param($stmt, "s", $_POST["displayName"]);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
     echo '<div class="alert alert-danger">Display name already taken, please try different one</div>';
     
    } else {

    
    date_default_timezone_set('Asia/Manila');
    $currentDate = date("F j, Y");
    $stmt = mysqli_prepare($conn_accounts, 'INSERT INTO accounts (school_email, user_firstname, user_lastname, display_name, date_joined) VALUES (?,?,?,?,?)');
    mysqli_stmt_bind_param($stmt, "sssss" , $_SESSION['email'], $_SESSION['firstName'], $_SESSION['lastName'], $_POST['displayName'], $currentDate);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    
    retrive_user_data();
    exit;

}
}

mysqli_close($conn_accounts);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="icon" type="image/x-icon" href="../Resources/Image/Logo.jpg"/>
    <link rel="stylesheet" href="../Style/Style.css"/>
     <link rel="stylesheet" href="../Resources/Font/Poppins.css"/>
    <link rel="stylesheet" href="./Resources/Font/Poppins.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
        .homepage-bg-about {
    background-blend-mode: lighten;
    background-position: center;
    background-size: 300px;
    background-repeat: repeat;

   background-image: url("../Resources/Image/HP_BG.png");
   background-attachment: fixed;
}
    </style>
</head>
<body class="poppins-regular">

    <div class="d-flex justify-content-center mt-4 rounded overflow-hidden">
    <div class="container-sm row col-sm-12 col-md-6 bg-light shadow-sm rounded  p-0">
        <div class="bg-info col-md-5 col-sm-12 d-md-block d-none overflow-hidden p-0 homepage-bg-about">
            <div class="homepage-bg-about h-100 w-100" alt="das"></div>
        </div>
        <div class="col-md-7 col-sm-12 p-4">
        <p class="text-start fw-bold fs-3 poppins-medium primary-text mt-4 mb-0">User Registration</p>
        <p class="text-start"><small class="text-center m-0 opacity-50">Kindly check your information below and edit your display name</small></p>
        <form class="form d-flex flex-column  border-1 rounded" method="post" action="#">
            <label for="firstname">First Name</label>
            <input name="firstname" class="p-1 rounded opacity-25" value="<?php echo htmlspecialchars($_SESSION['firstName']);?>" readonly>
            <label for="lastName" class="mt-3">Last Name</label>
            <input name="lastName" class="p-1 rounded opacity-25" value="<?php echo htmlspecialchars($_SESSION['lastName']);?>" readonly>
            <label for="email" class="mt-3">School Email</label>
            <input name="email" class="p-1 rounded opacity-25" value="<?php echo htmlspecialchars($_SESSION['email']);?>" readonly>
            <label for="displayName" class="mt-3">Display Name</label>
            <input name="displayName" class="p-1 rounded shadow-sm border-0" maxlength="20" value="Anonymous STIers" >
             <button type="button" class="btn btn-info text-white mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Register
            </button>

            
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content  bg-light">
                    <div class="modal-body d-flex flex-column">
                        <div class="d-flex flex-column justify-content-between mb-2 p-0 align-items-center">
                            <p class="m-2 w-100 fw-bold poppins-medium">STI Cubao Freedom Wall</p>
                            <p> Before we create your account, please be reminded that your content will be <strong> monitored </strong> by the student admin. Avoid posting or engaging with inappropriate content, and always follow proper social etiquette. Thank you!</p>
                        </div>
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NVM</button>
                        <button type="sumbit" class="btn btn-info text-white">OKAY LETSGO</button>
                    </div>
                    </div>
                </div>
            </div>

 
        </form>
        </div>
    </div>
        </div>
</body> 
</html>