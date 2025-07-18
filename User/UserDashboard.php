<?php

include '../User/Components/UserMetaData.php';
include '../User/Handler/CreatePost.php';
 

$Fullname = $_SESSION['firstName'] . ' ' . $_SESSION['lastName'];
if (!isset($_SESSION['is_active'])) {
    header('Location: ../User/UserRegistration.php');
    exit;
}

?>


<body id="body" class="poppins-regular" style="opacity: 0">
    <div class="container-fluid row m-0 p-0">
        <!-- FIRST COL -->
        <div class="col-3 bg-white m-0 p-0 vh-100 ">
            <div class="p-2  d-flex flex-column vh-100">
                <p class="primary-text poppins-medium">STI CUBAO FREEDOM WALL</p>
                <div id="profile" style="cursor: pointer;" class="bg-light shadow-sm rounded overflow-hidden d-flex align-items-center">
                    <div class="primary-color p-2"><i class="bi m-0 bi-person-square text-white"></i></div>
                    <p  class="m-0 ms-2"><?php echo $Fullname ?></p>
                </div>
                <div class=" mt-5 bg-light overflow-hidden shadow-sm rounded d-flex flex-column align-items-center">
                    <p class="primary-color w-100 text-center text-white">Chanels</p>
                    <div class="p-2 w-100">
                        <button type="submit" name="postFilter" value="" class="p-2 text-start mb-4 bg-white w-100 rounded border">All Chanels</button>
                        <button type="submit" name="postFilter" value="random_message" class="p-2 bg-white w-100 rounded border text-start"><span class="primary-color p-1 me-2"></span>Random Message</button>
                        <button type="submit" name="postFilter" value="rants" class="p-2 bg-white w-100 rounded border text-start"><span class="bg-warning p-1 me-2"></span>Rants</button>
                        <button type="submit" name="postFilter" value="confession" class="p-2 bg-white w-100 rounded border text-start"><span class="bg-danger p-1 me-2"></span>Confession</button>
                        <button type="submit" name="postFilter" value="questions" class="p-2 bg-white w-100 rounded border text-start"><span class="bg-primary p-1 me-2"></span>Questions</button>
                        <button type="submit" name="postFilter" value="lf_classmates" class="p-2 bg-white w-100 rounded border text-start"><span class=" bg-success p-1 me-2"></span>LF Classmates</button>
                        <button type="submit" name="postFilter" value="lost_and_found" class="p-2 bg-white w-100 rounded border text-start"><span class=" bg-dark p-1 me-2"></span>Lost and Found</button>
                    </div>
                </div>
                <span class="  flex-grow-1"></span>
                <div>
                    <a class="text-decoration-none w-100 yellow-color btn shadow-sm border-1 border-black" href="../Session/Logout.php">Logout</a>
                </div>
            </div>
        </div>

        <!-- SECOND COL -->
        <div id="MainBody" class="col-6 d-flex flex-column align-items-center bg-light vh-100 overflow-scroll m-0">

            <div class="bg-light rounded-2 shadow-sm border m-2 p-0 w-75 d-flex border border-info">
                <button type="button" class="btn w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Create a post
                </button>

                <form action="#" method="POST">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content  bg-light">
                                <div class="modal-body d-flex flex-column">
                                    <div class="d-flex justify-content-between mb-2 p-0 align-items-center">
                                        <p class="m-0 col-4">Create a post</p>
                                        <select name="post_chanel" class="col-8 w-auto m-0 form-select form-select-sm">
                                            <option value="random_message">Random Message</option>
                                            <option value="rants">Rants</option>
                                            <option value="confession">Confession</option>
                                            <option value="questions">Questions</option>
                                            <option value="lf_classmates">LF Classmates</option>
                                            <option value="lost_and_found">Lost and Found</option>
                                        </select>
                                    </div>
                                    <div>
                                        <textarea name="post_content" class="bg-white w-100 shadow-sm p-1 border-0 rounded" rows="5" placeholder="Say something, <?php echo $_SESSION['display_name'] ?>... "></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer p-1">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="sumbit_post" class="btn btn-primary">Post</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


            </div>

            <div id="response" class="w-100 d-flex justify-content-center flex-column text-center align-items-center">
                
            </div>
            <div id="loading" style="display: none; text-align: center;" class="d-flex justify-content-center ">
                <p>Loading more post</p>
            </div>



        </div>

        <!-- THIRD COL -->
        <div class="col-3 overflow-scroll bg-white m-0 p-0">
            <div class="bg-white d-flex flex-column align-items-center vh-100">

                <div id="PublicChatHeader" class="primary-color w-100">
                    <p class="text-center text-white m-0">Public Chat</p>
                </div>

                <div id="PublicChatBody" class="bg-white d-flex flex-column  overflow-scroll h-100 flex-grow-1 p-2 w-100 gap-3">
                    <p class="fs-6 text-center text-dark-emphasis"><small>Start of conversation</small></p>

                    <div id="chatContents">

                    </div>
                    
                </div>

                <div id="PublicChatAction" class=" d-flex w-100 mb-1 p-2">   
                    <input id="IPT_chatContent" name="chat_content" type="text" class="bg-white rounded border-0 shadow-sm flex-grow-1 border-1 ps-2" placeholder="Type a Message">
                    <button id="BTN_chatSend" name="send_message" type="submit" class="primary-color btn text-white shadow-sm">Send</button>  
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script src="../User/Function/RetrievePostComment.js"></script>
    <script src="../User/Function/RetrievePost.js"></script>
    <script src="../User/Function/RetrieveSendChat.js"></script> 
    <script src="../User/Function/LikePost.js"></script>    


    <script>

        $('#profile').on('click', ()=>{
            window.location.href = '../User/UserProfile.php';
        })

        $(document).ready(()=>{
            let body = $('#body')
            setTimeout(()=>{
                let container = $('#PublicChatBody')[0]
                let scrollHeight = container.scrollHeight;
                container.scrollTop = scrollHeight;
                body.css('opacity', 1)
            }, 1000);
        })

</script>
</body>
</html>