<?php
session_start();
require_once 'vendor/autoload.php';

if (!isset($_POST['access_token'])) {
    echo "Token de acesso não encontrado.";
    exit();
}

$access_token = json_decode($_POST['access_token'], true);
$servico = $_POST['servico'];
$dia = $_POST['dia'];
$hora = $_POST['hora'];
$observacoes = $_POST['observacoes'];
$user_id = $_POST['user_id'];

$client = new Google_Client();
$client->setAccessToken($access_token);

if ($client->isAccessTokenExpired()) {
    echo "Token de acesso expirado.";
    exit();
}

$calendar_service = new Google_Service_Calendar($client);

$event = new Google_Service_Calendar_Event(array(
    'summary' => $servico,
    'description' => $observacoes,
    'start' => array(
        'dateTime' => $dia . 'T' . $hora . ':00',
        'timeZone' => 'America/New_York',
    ),
    'end' => array(
        'dateTime' => $dia . 'T' . date('H:i:s', strtotime($hora) + 3600),
        'timeZone' => 'America/New_York',
    ),
));

$calendarId = 'primary';
$event = $calendar_service->events->insert($calendarId, $event);

echo 'Evento criado: ' . $event->htmlLink;
?>
