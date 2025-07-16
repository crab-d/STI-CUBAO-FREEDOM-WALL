<?php
$clientId = 'f4af1976-bef7-4b29-9b72-585a9333a99b';
$clientSecret = 'nr28Q~uedYXut6CbyipJKra_p8RBngGZm8BvWaV2';
$redirectUri = 'http://localhost/STI_FW/Session/microsoft-callback.php';

if (isset($_GET['code'])) {
    $code = $_GET['code'];

    // Exchange code for access token
    $tokenUrl = 'https://login.microsoftonline.com/common/oauth2/v2.0/token';

    $data = [
        'client_id' => $clientId,
        'scope' => 'openid profile email User.Read',
        'code' => $code,
        'redirect_uri' => $redirectUri,
        'grant_type' => 'authorization_code',
        'client_secret' => $clientSecret
    ];

    $ch = curl_init($tokenUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    $response = curl_exec($ch);
    curl_close($ch);

    $tokenData = json_decode($response, true);
    $accessToken = $tokenData['access_token'] ?? null;

    if ($accessToken) {
        
        $ch = curl_init('https://graph.microsoft.com/v1.0/me');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $accessToken
        ]);
        $userInfo = curl_exec($ch);
        curl_close($ch);

        $user = json_decode($userInfo, true);
        session_start();
        

        $_SESSION['firstName'] = $user['givenName'];
        $_SESSION['lastName'] = $user['surname'];
        $_SESSION['email'] = $user['mail'];
        $_SESSION['isLoggedIn'] = true;
        
        header('Location: ../User/UserRegistration.php');

     
        // echo '<pre>';
        // print_r($user);
        // echo '</pre>';
    } else {
    echo 'Failed to get access token.<br>';
    echo '<pre>';
    print_r($tokenData);
    echo '</pre>';
}

} else {
    echo 'No code received.';
}
