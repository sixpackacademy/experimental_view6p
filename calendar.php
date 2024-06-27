<?php
session_start();
require_once 'google-api-php-client/vendor/autoload.php';

// Configurar o cliente OAuth2
$client = new Google_Client();
$client->setClientId('SEU_CLIENT_ID'); // Substitua pelo seu Client ID
$client->setClientSecret('SEU_CLIENT_SECRET'); // Substitua pelo seu Client Secret
$client->setRedirectUri('http://localhost/seu_projeto/calendar.php'); // Substitua pelo seu Redirect URI
$client->addScope(Google_Service_Calendar::CALENDAR);

// Função para obter o token de acesso
if (!isset($_GET['code'])) {
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
} else {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    header('Location: ' . filter_var('calendar.php', FILTER_SANITIZE_URL));
}

// Definir credenciais do cliente
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
    $service = new Google_Service_Calendar($client);

    // Criar evento no Google Calendar
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
    }
}
?>
