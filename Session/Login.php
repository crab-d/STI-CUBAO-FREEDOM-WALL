<?php
$clientId = 'f4af1976-bef7-4b29-9b72-585a9333a99b';
$redirectUri = 'http://localhost/STI_FW/Session/microsoft-callback.php';
$scopes = 'openid profile email User.Read';

$params = [
    'client_id' => $clientId,
    'response_type' => 'code',
    'redirect_uri' => $redirectUri,
    'response_mode' => 'query',
    'scope' => $scopes
];

$authUrl = 'https://login.microsoftonline.com/cubao.sti.edu.ph/oauth2/v2.0/authorize?' . http_build_query($params);

header('Location: ' . $authUrl);
exit;
