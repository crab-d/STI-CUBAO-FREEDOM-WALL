<?php
$logoutUrl = 'https://login.microsoftonline.com/common/oauth2/v2.0/logout';
$logoutUrl .= '?post_logout_redirect_uri=' . urlencode('http://localhost/STI_FW/Session/Logout-callback.php');

header("Location: $logoutUrl");

exit;
?>