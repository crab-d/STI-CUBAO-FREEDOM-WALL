<?php 
$Fullname = $_SESSION['firstName'] . ' ' . $_SESSION['lastName'];
?>

<div id="user_management" class="content p-0 container d-flex row">
    <div class="col-8 d-flex flex-column container">
        <div class="d-flex container w-100 p-0">
            <form action="#" class="w-100 d-flex m-0">
                <input type="text" placeholder="search user" class="flex-grow-1">
                <select class=" me-3">
                    <option value="1" default>Active</option>
                    <option value="2">Deactive</option>
                </select>
                <button class="btn btn-success text-white">Search</button>
            </form>
        </div>
        <div class="d-flex flex-column bg-white p-3 rounded-1 shadow-sm mt-2">
            <div class="d-flex">
                <p class="p-0 m-0">Users</p>
                <div class="flex-grow-1"></div>
                <p class="p-0 m-0">Actions</p>

            </div>

            <div id="users_container" class="d-flex flex-column gap-1">
                <div class="d-flex align-items-center bg-light p-2 rounded-1 shadow-sm">
                    <div class="bg-danger me-3" style="height: 20px; width: 20px"></div>
                    <div class="d-flex flex-column justify-content-center align-items-start">
                        <p class="p-0 m-0">Anonymous Stiers 123</p>
                        <p class="p-0 m-0 primary-fs">John Paul Barcinilla</p>
                    </div>
                    <div class="flex-grow-1"></div>
                    <div class="flex gap-1">
                        <button class="bg-info col btn border-0 rounded p-2"><i class="bi text-white bi-person-square"></i></button>
                        <button class="bg-primary col btn border-0 rounded p-2"><i class="bi text-white bi-pencil-square"></i></button>
                        <button class="bg-success col btn border-0 rounded p-2"><i class="bi text-white bi-mic-mute-fill"></i></button>
                        <button class="bg-danger col btn border-0 rounded p-2"><i class="bi text-white bi-ban-fill"></i></button>
                    </div>
                </div>
                <div class="d-flex align-items-center bg-light p-2 rounded-1 shadow-sm">
                    <div class="bg-danger me-3" style="height: 20px; width: 20px"></div>
                    <div class="d-flex flex-column justify-content-center align-items-start">
                        <p class="p-0 m-0">Anonymous Stiers 123</p>
                        <p class="p-0 m-0 primary-fs">John Paul Barcinilla</p>
                    </div>
                    <div class="flex-grow-1"></div>
                    <div class="flex gap-1">
                        <button class="bg-info col btn border-0 rounded p-2"><i class="bi text-white bi-person-square"></i></button>
                        <button class="bg-primary col btn border-0 rounded p-2"><i class="bi text-white bi-pencil-square"></i></button>
                        <button class="bg-success col btn border-0 rounded p-2"><i class="bi text-white bi-mic-mute-fill"></i></button>
                        <button class="bg-danger col btn border-0 rounded p-2"><i class="bi text-white bi-ban-fill"></i></button>
                    </div>
                </div>
                <div class="d-flex align-items-center bg-light p-2 rounded-1 shadow-sm">
                    <div class="bg-danger me-3" style="height: 20px; width: 20px"></div>
                    <div class="d-flex flex-column justify-content-center align-items-start">
                        <p class="p-0 m-0">Anonymous Stiers 123</p>
                        <p class="p-0 m-0 primary-fs">John Paul Barcinilla</p>
                    </div>
                    <div class="flex-grow-1"></div>
                    <div class="flex gap-1">
                        <button class="bg-info col btn border-0 rounded p-2"><i class="bi text-white bi-person-square"></i></button>
                        <button class="bg-primary col btn border-0 rounded p-2"><i class="bi text-white bi-pencil-square"></i></button>
                        <button class="bg-success col btn border-0 rounded p-2"><i class="bi text-white bi-mic-mute-fill"></i></button>
                        <button class="bg-danger col btn border-0 rounded p-2"><i class="bi text-white bi-ban-fill"></i></button>
                    </div>
                </div>
                <div class="d-flex align-items-center bg-light p-2 rounded-1 shadow-sm">
                    <div class="bg-danger me-3" style="height: 20px; width: 20px"></div>
                    <div class="d-flex flex-column justify-content-center align-items-start">
                        <p class="p-0 m-0">Anonymous Stiers 123</p>
                        <p class="p-0 m-0 primary-fs">John Paul Barcinilla</p>
                    </div>
                    <div class="flex-grow-1"></div>
                    <div class="flex gap-1">
                        <button class="bg-info col btn border-0 rounded p-2"><i class="bi text-white bi-person-square"></i></button>
                        <button class="bg-primary col btn border-0 rounded p-2"><i class="bi text-white bi-pencil-square"></i></button>
                        <button class="bg-success col btn border-0 rounded p-2"><i class="bi text-white bi-mic-mute-fill"></i></button>
                        <button class="bg-danger col btn border-0 rounded p-2"><i class="bi text-white bi-ban-fill"></i></button>
                    </div>
                </div>
                <div class="d-flex align-items-center bg-light p-2 rounded-1 shadow-sm">
                    <div class="bg-danger me-3" style="height: 20px; width: 20px"></div>
                    <div class="d-flex flex-column justify-content-center align-items-start">
                        <p class="p-0 m-0">Anonymous Stiers 123</p>
                        <p class="p-0 m-0 primary-fs">John Paul Barcinilla</p>
                    </div>
                    <div class="flex-grow-1"></div>
                    <div class="flex gap-1">
                        <button class="bg-info col btn border-0 rounded p-2"><i class="bi text-white bi-person-square"></i></button>
                        <button class="bg-primary col btn border-0 rounded p-2"><i class="bi text-white bi-pencil-square"></i></button>
                        <button class="bg-success col btn border-0 rounded p-2"><i class="bi text-white bi-mic-mute-fill"></i></button>
                        <button class="bg-danger col btn border-0 rounded p-2"><i class="bi text-white bi-ban-fill"></i></button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="col d-flex d-none d-lg-block flex-column bg-white shadow-sm rounded-1 p-3 gap-2 h-100">
        <div class="d-flex justify-content-center flex-column shadow-sm rounded bg-light align-items-center">
            <p class="m-0 poppins-medium primary-fs w-100 text-start primary-color text-white p-1 ps-2">User profile</p>
            <div class="d-flex align-items-center py-3 flex-column">
                <div class="rounded-circle mb-3" style="background-color: <?php echo $_SESSION['profile']?> ;height:10vh; width:10vh;" ></div>
                <p class="fw-bold fs-6 m-0"><?php echo $_SESSION['display_name'] ?></p>
                <p class="primary-fs m-0 text-black-50"><?php echo $Fullname ?></p>
            </div>
        </div>
        <div class="d-flex justify-content-center flex-column shadow-sm rounded bg-light align-items-start">
            <p class="m-0 poppins-medium primary-fs w-100 text-start primary-color text-white p-1 ps-2">User Record</p>
            <div class="d-flex align-items-start p-3 flex-column">
                <p class="primary-fs p-0 m-0">Report Count: <span class="fw-bold">2</span></p>
                <p class="primary-fs p-0 m-0">Post Count: <span class="fw-bold">2</span></p>
                <p class="primary-fs p-0 m-0">Message Count: <span class="fw-bold">2</span></p>
                <p class="primary-fs p-0 m-0">Comment Count: <span class="fw-bold">2</span></p>
                <p class="primary-fs p-0 m-0">Like Count: <span class="fw-bold">2</span></p>
            </div>
        </div>
    </div>
</div>