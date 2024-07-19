<?php
session_start();
require 'db/database_connection.php';
require_once realpath(__DIR__ . '/vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;


// Carrega as variáveis de ambiente do ficheiro .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$smtp_username = $_ENV['SMTP_USERNAME'];
$smtp_password = $_ENV['SMTP_PASSWORD'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $identification_number = rand(1000, 2000);
    $role = 0;

    $stmt = $conn->prepare("INSERT INTO users (username, first_name, last_name, email, phone_number, password, role, identification_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $username, $first_name, $last_name, $email, $phone_number, $password, $role, $identification_number);

    if ($stmt->execute()) {
        // Enviar e-mail ao utilizador
        $mail = new PHPMailer(true);
        try {
            // Configurações do servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $smtp_username;
            $mail->Password = $smtp_password;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Recipientes
            $mail->setFrom('no-reply@sixpackacademy.com', 'Six Pack Academy');
            $mail->addAddress($email, $first_name);

            // Conteúdo do e-mail
            $mail->isHTML(true);
            $mail->Subject = 'Welcome to Six Pack Academy';
            $mail->Body    = "Hello $first_name,<br><br>Thank you for registering at Six Pack Academy.<br>Your Identification Number is: <b>$identification_number</b><br><br>Best regards,<br>Six Pack Academy Team";
            $mail->AltBody = "Hello $first_name,\n\nThank you for registering at Six Pack Academy.\nYour Identification Number is: $identification_number\n\nBest regards,\nSix Pack Academy Team";

            $mail->send();
            header('Location: login.php');
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "algum erro inesperado aconteceu.";
    }

    if ($stmt !== null) {
        $stmt->close();
    }
}
