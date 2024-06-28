<?php
session_start();
require_once 'vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('167388635862-87tucghlc8n09eifdnoh2h4m35aeqpc2.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost:8000/calendar.php');
$client->addScope(Google_Service_Calendar::CALENDAR);

if (!isset($_GET['code'])) {
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    exit();
} else {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    $_SESSION['refresh_token'] = $client->getRefreshToken();
    header('Location: marcar_servicos.php');
    exit();
}
?>
