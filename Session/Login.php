<?php
$clientId = 'YOUR_CLIENT_ID';
$redirectUri = 'http://localhost/microsoft-callback.php';
$scopes = 'openid profile email User.Read';

$params = [
    'client_id' => $clientId,
    'response_type' => 'code',
    'redirect_uri' => $redirectUri,
    'response_mode' => 'query',
    'scope' => $scopes
];

$authUrl = 'https://login.microsoftonline.com/common/oauth2/v2.0/authorize?' . http_build_query($params);

header('Location: ' . $authUrl);
exit;
