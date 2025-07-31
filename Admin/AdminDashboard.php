<?php 
include('../Admin/Components/AdminMetaData.php');
include('../Admin/Handler/RetrieveCounts.php');
?>

<body class="poppins-regular">
    <div class="container-fluid vh-100 d-flex p-0 m-0 row">
        <div class="col-0 col-lg-3 d-none d-lg-flex flex-column bg-white p-2 overflow-scroll">
            <div class="d-flex align-content-center align-items-center p-0 mb-3">
                <p class="m-0 primary-text poppins-medium fw-bold">SCFW Admin</p>
                <small class="fw-bold opacity-50 ms-2 m-0 fst-italic text-dark" style="font-size: 7px;">Beta v.2.3</small>
            </div>
            <div class="p-1 ">
                <button id="adminDashboard" class="w-100 btn text-white text-start p-1 primary-color mb-1" onclick="location.reload()"><i class="bi bi-person-circle mx-2 text-white"></i>Admin Dashboard</button>
                <button id="userDashboard" class="w-100 btn text-white text-start p-1 primary-color"><i class="bi bi-person-circle mx-2 text-white"></i>User Dashboard</button>
            </div>
        
            <div class=" bg-light overflow-hidden shadow-sm rounded d-flex flex-column align-items-center mt-3">
                <div id="filter_btn_container" class="p-0 w-100 primary-fs">
                    <button value="user_management" class="p-2 bg-white w-100 rounded border text-start"><span class="primary-color p-1 me-2"></span>User Management</button>
                    <button value="content_management" class="p-2 bg-white w-100 rounded border text-start"><span class="bg-primary p-1 me-2"></span>Content Management</button>
                    <button value="content_approval" class="p-2 bg-white w-100 rounded border text-start"><span class="bg-success p-1 me-2"></span>Content Approval</button>
                    <button value="content_report" class="p-2 bg-white w-100 rounded border text-start"><span class="bg-danger p-1 me-2"></span>Content Reports</button>
                </div>  
            </div>
            <span class="flex-grow-1"></span>
            <div>
                <a class="mb-5 text-decoration-none w-100 yellow-color btn shadow-sm border-1 border-black" href="../Session/Logout.php">Logout</a>
            </div>
        </div>
        <div class="col p-0 bg-light p-3 d-flex container m-0 row align-items-center flex-column overflow-scroll vh-100" id="content_container">
            <?php include '../Admin/Components/DashboardTotalCounts.php' ?>
            <?php include '../Admin/Components/UserManagement.php' ?>
        </div>

        
        

        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script src="../Admin/Function/ContainerContentChanger.js"></script>
    <script>
        $('#userDashboard').on('click', ()=>{
            window.location.href = "../User/UserDashboard.php"
        })
    </script>
</body>
</html>