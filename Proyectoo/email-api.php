<?php
session_start();
$mysql = new mysqli("localhost","root","","proyectoo");
$sql = "SELECT correo FROM datos WHERE usuarios_id = '".$_SESSION['usuario_id']."'";
$stmt = $mysql->query($sql);

//require 'vendor/autoload.php';

use Google\Client;
use Google\Service\Gmail;
use Google\Service\Gmail\Message;

// Función para enviar un correo electrónico con el PDF adjunto
function sendEmail($filePath) {
    $client = new Client();
    $client->setAuthConfig('client_secret_360203544825-sq89ctsjrjple4t2uthr2vmshsi5rfg4.apps.googleusercontent.com.json');
    $client->setScopes(Gmail::GMAIL_SEND);
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    $tokenPath = 'token.json';
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }

    if ($client->isAccessTokenExpired()) {
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            $authUrl = $client->createAuthUrl();
            printf("Open the following link in your browser:\n%s\n", $authUrl);
            print 'Enter verification code: ';
            $authCode = trim(fgets(STDIN));
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            $client->setAccessToken($accessToken);

            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($accessToken));
        }
    }

    $service = new Gmail($client);

    $strRawMessage = "From: oscarhdez003@gmail.com\r\n";
    $strRawMessage .= "To: oscarhdez003@gmail.com\r\n";
    $strRawMessage .= "Subject: Asunto del correo\r\n";
    $strRawMessage .= "Content-Type: text/html; charset=utf-8\r\n\r\n";
    $strRawMessage .= "Este es el cuerpo del correo en <b>HTML</b>.";

    $rawMessage = strtr(base64_encode($strRawMessage), array('+' => '-', '/' => '_'));
    $message = new Message();
    $message->setRaw($rawMessage);

    $mime = new \Google\Service\Gmail\MessagePart();
    $mime->setFilename('contenido.pdf');
    $mime->setMimeType('application/pdf');
    $mime->setBody(file_get_contents($filePath));

    $message->setPayload($mime);

    try {
        $message = $service->users_messages->send('me', $message);
        return 'Message sent: ' . $message->getId();
    } catch (Exception $e) {
        return 'An error occurred: ' . $e->getMessage();
    }
}

// Manejar la subida del archivo PDF
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['pdf'])) {
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['pdf']['name']);

    if (move_uploaded_file($_FILES['pdf']['tmp_name'], $uploadFile)) {
        echo sendEmail($uploadFile);
    } else {
        echo "No se pudo subir el archivo.";
    }
} else {
    echo "No se recibió ningún archivo.";
}
?>