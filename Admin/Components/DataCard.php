<?php

function dataCard($data) {
    echo '
    <div class="d-flex col p-2 overflow-hidden flex-column flex-shrink-0">
        <p class="text-center primary-color p-0 text-white fw-semibold poppins-medium m-0"><i class="bi me-2 text-white bi-file-post-fill"></i>Total post  </p>
        <div class="align rounded-items-center bg-white justify-content-center flex-grow-1 d-flex p-2">
        
            <p class=" fs-3 m-0 text-center fw-bold poppins-medium my-3 p-0">
                '. $data . '
            </p>
        </div>
    </div>
    ';
}
?>