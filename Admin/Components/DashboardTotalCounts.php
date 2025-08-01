<div id="admin_dashboard" class="content p-0 m-0 justify-content-center d-flex flex-column align-items-center">
    <div class="container row row-cols-1 row-cols-sm-2 row-cols-lg-4">
        <div class="d-flex col p-2 overflow-hidden flex-column flex-shrink-0">
            <p class="text-center primary-color p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total post </p>
            <div class="align-items-center rounded shadow-sm bg-white justify-content-center flex-grow-1 rounded shadow-sm d-flex p-2">

                <p class=" fs-3 m-0 text-center fw-bold poppins-medium my-3 p-0">
                    <?php echo getTotalPost() ?>
                </p>
            </div>
        </div>

        <div class="d-flex col p-2  rounded overflow-hidden flex-column flex-shrink-0">
            <p class="text-center bg-success p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total Comment </p>
            <div class="align-items-center bg-white justify-content-center flex-grow-1 rounded shadow-sm d-flex p-2">

                <p class=" fs-3 m-0 text-center fw-bold poppins-medium my-3 p-0">
                    <?php echo getTotalComment() ?>

                </p>
            </div>
        </div>

        <div class="d-flex col p-2  rounded overflow-hidden flex-column flex-shrink-2">
            <p class="text-center bg-danger p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total Message </p>
            <div class="align-items-center bg-white justify-content-center flex-grow-1 rounded shadow-sm d-flex p-2">

                <p class=" fs-3 m-0 text-center fw-bold poppins-medium my-3 p-0">
                    <?php echo getTotalMessage() ?>

                </p>
            </div>
        </div>
        <div class="d-flex col p-2 rounded overflow-hidden flex-column flex-shrink-0">
            <p class="text-center bg-warning p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total Like </p>
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
            <p class="text-center primary-color p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total Accounts </p>
            <div class="align-items-center bg-white justify-content-center flex-grow-1 rounded shadow-sm d-flex p-2">

                <p class=" fs-3 m-0 text-center fw-bold poppins-medium my-3 p-0">
                    <?php echo getTotalUser() ?>
                </p>
            </div>
        </div>

        <div class="d-flex col p-2  rounded overflow-hidden flex-column flex-shrink-0">
            <p class="text-center bg-success p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total Active </p>
            <div class="align-items-center bg-white justify-content-center flex-grow-1 rounded shadow-sm d-flex p-2">

                <p class=" fs-3 m-0 text-center fw-bold poppins-medium my-3 p-0">
                    <?php echo getTotalActive() ?>
                </p>
            </div>
        </div>

        <div class="d-flex col p-2  rounded overflow-hidden flex-column flex-shrink-2">
            <p class="text-center bg-danger p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total Muted </p>
            <div class="align-items-center bg-white justify-content-center flex-grow-1 rounded shadow-sm d-flex p-2">

                <p class=" fs-3 m-0 text-center fw-bold poppins-medium my-3 p-0">
                    <?php echo getTotalMuted() ?>

                </p>
            </div>
        </div>
        <div class="d-flex col p-2 rounded overflow-hidden flex-column flex-shrink-0">
            <p class="text-center bg-warning p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total Inactive </p>
            <div class="align-items-center  bg-white justify-content-center  flex-grow-1 rounded shadow-sm d-flex p-2">

                <p class=" fs-3 m-0 text-center fw-bold poppins-medium my-3 p-0">
                    <?php echo ((int) getTotalUser() - (int) getTotalActive()) ?>

                </p>
            </div>
        </div>
    </div>



    <div class="w-100 container row mt-3 col-2 col-lg-1">
        <div class="bg-white rounded p-2 col shadow-sm p-2 ">
            <p class="p-0 m-0">Recent reports</p>
            <div class="gap-2 flex-column d-flex">
                <div class="d-flex  p-2 bg-light">
                    <div class="d-flex flex-column">
                        <p class="primary-fs m-0 p-0 fw-bold">Anonymous STIers 123</p>
                        <p class="primary-fs m-0 p-0">JPBARCI</p>
                    </div>
                    <div class="flex-grow-1"></div>
                    <div class="d-flex gap-1">
                        <button class="btn border-0 bg-success p-1"><i class="bi text-white bi-search"></i></button>
                        <button class="btn border-0 bg-warning p-1"><i class="bi text-white bi-exclamation-square-fill"></i></button>
                        <button class="btn border-0 bg-danger p-1"><i class="bi text-white bi-x-square-fill"></i></button>
                    </div>
                </div>
                <div class="d-flex  p-2 bg-light">
                    <div class="d-flex flex-column">
                        <p class="primary-fs m-0 p-0 fw-bold">Anonymous STIers 123</p>
                        <p class="primary-fs m-0 p-0">JPBARCI</p>
                    </div>
                    <div class="flex-grow-1"></div>
                    <div class="d-flex gap-1">
                        <button class="btn border-0 bg-success p-1"><i class="bi text-white bi-search"></i></button>
                        <button class="btn border-0 bg-warning p-1"><i class="bi text-white bi-exclamation-square-fill"></i></button>
                        <button class="btn border-0 bg-danger p-1"><i class="bi text-white bi-x-square-fill"></i></button>
                    </div>
                </div>
                <div class="d-flex  p-2 bg-light">
                    <div class="d-flex flex-column">
                        <p class="primary-fs m-0 p-0 fw-bold">Anonymous STIers 123</p>
                        <p class="primary-fs m-0 p-0">JPBARCI</p>
                    </div>
                    <div class="flex-grow-1"></div>
                    <div class="d-flex gap-1">
                        <button class="btn border-0 bg-success p-1"><i class="bi text-white bi-search"></i></button>
                        <button class="btn border-0 bg-warning p-1"><i class="bi text-white bi-exclamation-square-fill"></i></button>
                        <button class="btn border-0 bg-danger p-1"><i class="bi text-white bi-x-square-fill"></i></button>
                    </div>
                </div>
                <div class="d-flex  p-2 bg-light">
                    <div class="d-flex flex-column">
                        <p class="primary-fs m-0 p-0 fw-bold">Anonymous STIers 123</p>
                        <p class="primary-fs m-0 p-0">JPBARCI</p>
                    </div>
                    <div class="flex-grow-1"></div>
                    <div class="d-flex gap-1">
                        <button class="btn border-0 bg-success p-1"><i class="bi text-white bi-search"></i></button>
                        <button class="btn border-0 bg-warning p-1"><i class="bi text-white bi-exclamation-square-fill"></i></button>
                        <button class="btn border-0 bg-danger p-1"><i class="bi text-white bi-x-square-fill"></i></button>
                    </div>
                </div>  
                <div class="d-flex  p-2 bg-light">
                    <div class="d-flex flex-column">
                        <p class="primary-fs m-0 p-0 fw-bold">Anonymous STIers 123</p>
                        <p class="primary-fs m-0 p-0">JPBARCI</p>
                    </div>
                    <div class="flex-grow-1"></div>
                    <div class="d-flex gap-1">
                        <button class="btn border-0 bg-success p-1"><i class="bi text-white bi-search"></i></button>
                        <button class="btn border-0 bg-warning p-1"><i class="bi text-white bi-exclamation-square-fill"></i></button>
                        <button class="btn border-0 bg-danger p-1"><i class="bi text-white bi-x-square-fill"></i></button>
                    </div>
                </div>
                <button class="w-100 primary-color text-white text-center btn mt-4">View more reports</button>
            </div>
        </div>
        <div class="bg-white rounded p-2 col shadow-sm p-2 ">
            <p class="p-0 m-0 mb-2">Recent posts for approval</p>
            <div class="d-flex  p-2 bg-light">
                <div class="d-flex flex-column">
                    <p class="primary-fs m-0 p-0 fw-bold">Anonymous STIers 123</p>
                    <p class="primary-fs m-0 p-0">JPBARCI</p>
                </div>
                <div class="flex-grow-1"></div>
                <div class="d-flex gap-1">
                    <button class="btn border-0 bg-success p-1"><i class="bi text-white bi-check-square-fill"></i></button>
                    <button class="btn border-0 bg-danger p-1"><i class="bi text-white bi-x-square-fill"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>