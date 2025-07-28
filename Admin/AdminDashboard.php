<?php 
include('../Admin/Components/AdminMetaData.php');
include('../Admin/Handler/RetrieveCounts.php');
?>

<body>
    <div class="container-fluid vh-100 d-flex p-0 m-0 row">
        <div class="col-0 col-lg-2 d-none d-lg-flex flex-column bg-light p-2">
            <div class="d-flex align-content-center align-items-center p-0 mb-3">
                <p class="m-0 primary-text poppins-medium fw-bold">SCFW Admin</p>
                <small class="fw-bold opacity-50 ms-2 m-0 fst-italic text-dark" style="font-size: 7px;">Beta v.2.3</small>
            </div>
            <div class="p-1">
                
                <button id="userDashboard" class="w-100 btn text-white text-start p-1 primary-color"><i class="bi bi-person-circle mx-2 text-white"></i>User Dashboard</button>
            </div>
        </div>
        <div class="col-12 bg-light col-lg-10 d-flex container m-0 row align-items-center flex-column">
        <div class="w-100 p-0 m-0 d-flex align-items-center flex-column">
            <!-- <p class="p-0 m-0">Contents Data</p> -->

            <div class="container mt-5 row row-cols-1 row-cols-sm-2 row-cols-lg-4">
                <div class="d-flex col p-2 overflow-hidden flex-column flex-shrink-0">
                    <p class="text-center primary-color p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total post  </p>
                    <div class="align-items-center rounded shadow-sm bg-white justify-content-center flex-grow-1 rounded shadow-sm d-flex p-2">
                    
                        <p class=" fs-3 m-0 text-center fw-bold poppins-medium my-3 p-0">
                            <?php echo getTotalPost() ?>
                        </p>
                    </div>
                </div>
 
                <div class="d-flex col p-2  rounded overflow-hidden flex-column flex-shrink-0">
                    <p class="text-center bg-success p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total Comment  </p>
                    <div class="align-items-center bg-white justify-content-center flex-grow-1 rounded shadow-sm d-flex p-2">
                    
                        <p class=" fs-3 m-0 text-center fw-bold poppins-medium my-3 p-0">
                            <?php echo getTotalComment() ?>
                            
                        </p>
                    </div>
                </div>

                 <div class="d-flex col p-2  rounded overflow-hidden flex-column flex-shrink-2">
                    <p class="text-center bg-danger p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total Message  </p>
                    <div class="align-items-center bg-white justify-content-center flex-grow-1 rounded shadow-sm d-flex p-2">
                    
                        <p class=" fs-3 m-0 text-center fw-bold poppins-medium my-3 p-0">
                            <?php echo getTotalMessage() ?>
                            
                        </p>
                    </div>
                </div>
                 <div class="d-flex col p-2 rounded overflow-hidden flex-column flex-shrink-0">
                    <p class="text-center bg-warning p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total Like  </p>
                    <div class="align-items-center  bg-white justify-content-center flex-grow-1 rounded shadow-sm d-flex p-2">
                    
                        <p class=" fs-3 m-0 text-center fw-bold poppins-medium  my-3 p-0">
                            <?php echo getTotalLikes() ?>
                            
                        </p>
                    </div>
                </div>
            </div>
             <!-- <p class="p-0 m-0 w-100 text-start mt-4"><span class="poppins-medium fw-semibold primary-color text-white p-1 w-auto">Users Data </span></p> -->
            <div class="container mt-5 row row-cols-1 row-cols-sm-2 row-cols-lg-4">

                <div class="d-flex col p-2  rounded overflow-hidden flex-column flex-shrink-0">
                    <p class="text-center primary-color p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total Accounts  </p>
                    <div class="align-items-center bg-white justify-content-center flex-grow-1 rounded shadow-sm d-flex p-2">
                    
                        <p class=" fs-3 m-0 text-center fw-bold poppins-medium my-3 p-0">
                            <?php echo getTotalUser() ?>
                        </p>
                    </div>
                </div>
 
                <div class="d-flex col p-2  rounded overflow-hidden flex-column flex-shrink-0">
                    <p class="text-center bg-success p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total Active  </p>
                    <div class="align-items-center bg-white justify-content-center flex-grow-1 rounded shadow-sm d-flex p-2">
                    
                        <p class=" fs-3 m-0 text-center fw-bold poppins-medium my-3 p-0">
                            <?php echo getTotalActive() ?>
                        </p>
                    </div>
                </div>

                 <div class="d-flex col p-2  rounded overflow-hidden flex-column flex-shrink-2">
                    <p class="text-center bg-danger p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total Muted  </p>
                    <div class="align-items-center bg-white justify-content-center flex-grow-1 rounded shadow-sm d-flex p-2">
                    
                        <p class=" fs-3 m-0 text-center fw-bold poppins-medium my-3 p-0">
                            <?php echo getTotalMuted() ?>
                            
                        </p>
                    </div>
                </div>
                 <div class="d-flex col p-2 rounded overflow-hidden flex-column flex-shrink-0">
                    <p class="text-center bg-warning p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total Inactive  </p>
                    <div class="align-items-center  bg-white justify-content-center  flex-grow-1 rounded shadow-sm d-flex p-2">
                    
                        <p class=" fs-3 m-0 text-center fw-bold poppins-medium my-3 p-0">
                            <?php echo ((int) getTotalUser() - (int) getTotalActive()) ?>
                            
                        </p>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="w-100 container bg-danger row mt-3 col-2 col-lg-1">
            <div class="bg-light col shadow-sm p-2 ">
                <p>Recent Reports</p>
            </div>
             <div class="bg-primary col shadow-sm p-2 ">
                <p>Recent Posts</p>

            </div>
        </div>
        </div>
        

        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>

    <script>
        $('#userDashboard').on('click', ()=>{
            window.location.href = "../User/UserDashboard.php"
        })
    </script>
</body>
</html>