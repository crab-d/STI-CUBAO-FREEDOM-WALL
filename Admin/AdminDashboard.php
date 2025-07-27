<?php include('../Admin/Components/AdminMetaData.php') ?>

<body>
    <div class="container-fluid vh-100 d-flex p-0 m-0 row">
        <div class="col-2 d-flex flex-column bg-light p-2">
            <div class="d-flex align-content-center align-items-center p-0 mb-3">
                <p class="m-0 primary-text poppins-medium fw-bold">SCFW Admin</p>
                <small class="fw-bold opacity-50 ms-2 m-0 fst-italic text-dark" style="font-size: 7px;">Beta v.2.3</small>
            </div>
            <div class="p-1">
                
                <button id="userDashboard" class="w-100 btn text-white text-start p-1 primary-color"><i class="bi bi-person-circle mx-2 text-white"></i>User Dashboard</button>
            </div>
        </div>
        <div class="col-10 p-5 d-flex flex-column">
            <p class="p-0 m-0">Contents Data</p>

            <div class="container row row-cols-1 row-cols-lg-4">
                <div class="d-flex col p-2  rounded overflow-hidden flex-column flex-shrink-0">
                    <p class="text-center primary-color p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total post  </p>
                    <div class="align-items-center bg-light justify-content-center flex-grow-1 d-flex p-2">
                    
                        <p class=" fs-3 m-0 text-center fw-bold poppins-medium p-0">
                            19
                        </p>
                    </div>
                </div>
 
                <div class="d-flex col p-2  rounded overflow-hidden flex-column flex-shrink-0">
                    <p class="text-center primary-color p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total Comment  </p>
                    <div class="align-items-center bg-light justify-content-center flex-grow-1 d-flex p-2">
                    
                        <p class=" fs-3 m-0 text-center fw-bold poppins-medium p-0">
                            19
                        </p>
                    </div>
                </div>

                 <div class="d-flex col p-2  rounded overflow-hidden flex-column flex-shrink-2">
                    <p class="text-center primary-color p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total Message  </p>
                    <div class="align-items-center bg-light justify-content-center flex-grow-1 d-flex p-2">
                    
                        <p class=" fs-3 m-0 text-center fw-bold poppins-medium p-0">
                            19
                        </p>
                    </div>
                </div>
                 <div class="d-flex col p-2 rounded overflow-hidden flex-column flex-shrink-0">
                    <p class="text-center primary-color p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total Like  </p>
                    <div class="align-items-center  bg-light justify-content-center flex-grow-1 d-flex p-2">
                    
                        <p class=" fs-3 m-0 text-center fw-bold poppins-medium p-0">
                            19
                        </p>
                    </div>
                </div>
            </div>
             <p class="p-0 m-0">Users Data</p>
            <div class="container row row-cols-1 row-cols-lg-4">
                <div class="d-flex col p-2  rounded overflow-hidden flex-column flex-shrink-0">
                    <p class="text-center primary-color p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total Accounts  </p>
                    <div class="align-items-center bg-light justify-content-center flex-grow-1 d-flex p-2">
                    
                        <p class=" fs-3 m-0 text-center fw-bold poppins-medium p-0">
                            19
                        </p>
                    </div>
                </div>
 
                <div class="d-flex col p-2  rounded overflow-hidden flex-column flex-shrink-0">
                    <p class="text-center primary-color p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total Active  </p>
                    <div class="align-items-center bg-light justify-content-center flex-grow-1 d-flex p-2">
                    
                        <p class=" fs-3 m-0 text-center fw-bold poppins-medium p-0">
                            19
                        </p>
                    </div>
                </div>

                 <div class="d-flex col p-2  rounded overflow-hidden flex-column flex-shrink-2">
                    <p class="text-center primary-color p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total Muted  </p>
                    <div class="align-items-center bg-light justify-content-center flex-grow-1 d-flex p-2">
                    
                        <p class=" fs-3 m-0 text-center fw-bold poppins-medium p-0">
                            19
                        </p>
                    </div>
                </div>
                 <div class="d-flex col p-2 rounded overflow-hidden flex-column flex-shrink-0">
                    <p class="text-center primary-color p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total Inactive  </p>
                    <div class="align-items-center  bg-light justify-content-center flex-grow-1 d-flex p-2">
                    
                        <p class=" fs-3 m-0 text-center fw-bold poppins-medium p-0">
                            19
                        </p>
                    </div>
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