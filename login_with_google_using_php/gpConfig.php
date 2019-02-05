<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '431104549695-ui00r3gnf3pg3j767qbneth3k74jeecu.apps.googleusercontent.com';
$clientSecret = 'pTrIR1VBFaGpTFt0sT7UiaGE';
$redirectURL = 'http://localhost/login_with_google_using_php/';

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>