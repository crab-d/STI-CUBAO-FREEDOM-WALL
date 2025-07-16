<?php include '../STI_FW/Public/Components/PublicMetaData.php'?>
 

<body>
    <div class="container-fluid d-flex p-0 m-0">
        <div class="col-0 col-sm-6 d-none d-sm-block primary-color p-0">
            <img src="../Resources/Image/Logo.jpg" class="primary-color img-fluid m-0 p-0 cover d-none d-sm-block"/>
        </div>
        <div class="col-12 col-sm-6 d-flex justify-content-center align-items-center flex-column m-0 poppins-medium p-sm-0 p-5 m-sm-0 m-2">
            <img src="../Resources/Image/Logo.jpg" class="primary-color d-block d-sm-none m-0 p-0 cover  rounded-circle" style="height: 20vw; width: 20vw  ;"/>
            <p class="poppins-medium fw-bold text-primary text-center fs-3 mt-5 m-sm-0">STI CUBAO FREEDOM WALL</p>
            <p class="text-center"> Connect with other STIers anonymously</p>
            <div class="d-flex column gap-3 ">
                <a class="btn primary-color text-white mt-3" href="../Session/Login.php">Login</a>
                <a class="text-decoration-none m-0 btn btn-outline-primary mt-3" href="../Public/HomePage.php">About</a>
            </div>
        </div>
    </div>
    <!-- <script src="https://cdn.botpress.cloud/webchat/v0/inject.js"></script>
<script>
  window.botpressWebChat.init({
    "composerPlaceholder": "Chat with us!",
    "botId": "YOUR_BOT_ID",
    "hostUrl": "https://cdn.botpress.cloud/webchat/v0",
    "messagingUrl": "https://messaging.botpress.cloud",
    "clientId": "YOUR_BOT_ID",
    "botName": "My Bot",
    "enableConversationDeletion": true,
    "showPoweredBy": false
  });
</script> -->

    <?php include 'Components/Footer.php' ?>
</body>
</html>