<?php
session_start();

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'vendor/autoload.php'; // Caminho para o arquivo autoload.php do Google Client

    $client_id = '167388635862-87tucghlc8n09eifdnoh2h4m35aeqpc2.apps.googleusercontent.com';
    $client_secret = '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';
    $redirect_uri = 'http://localhost:8000/calendar.php'; // Substitua pela URL do seu script calendar.php

    // Configurar o cliente OAuth2
    $client = new Google_Client();
    $client->setClientId($client_id);
    $client->setClientSecret($client_secret);
    $client->setRedirectUri($redirect_uri);
    $client->addScope(Google_Service_Calendar::CALENDAR);

    // Token de acesso do formulário POST
    $access_token = $_POST['access_token'];

    // Configura o token de acesso
    $client->setAccessToken($access_token);

    // Criar evento no Google Calendar
    $service = new Google_Service_Calendar($client);

    $event = new Google_Service_Calendar_Event([
        'summary' => $_POST['servico'],
        'start' => [
            'dateTime' => $_POST['datetime'],
            'timeZone' => 'Europe/Lisbon',
        ],
        'end' => [
            'dateTime' => $_POST['datetime'],
            'timeZone' => 'Europe/Lisbon',
        ],
    ]);

    $calendarId = 'primary';
    $event = $service->events->insert($calendarId, $event);
    echo 'Evento criado: ' . $event->htmlLink;
} else {
    echo 'Formulário não submetido corretamente.';
}
?>
