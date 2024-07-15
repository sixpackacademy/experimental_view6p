<?php
session_start();
require 'db/database_connection.php';

$identification_number = $_SESSION['identification_number'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitização e validação dos dados de entrada
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $num_tel = filter_var($_POST['num_tel'], FILTER_SANITIZE_STRING);

    if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($num_tel)) {
        // Preparar a instrução SQL
        $stmt = $conn->prepare("UPDATE users SET email=?, phone_number=? WHERE identification_number = ?");
        if ($stmt) {
            // Vincular parâmetros
            $stmt->bind_param("sss", $email, $num_tel, $identification_number);
            
            // Executar a declaração
            if ($stmt->execute()) {
                header('Location: profile.php');
                exit();
            } else {
                echo "Erro ao executar a declaração: " . $stmt->error;
            }

            // Fechar a declaração
            $stmt->close();
        } else {
            echo "Erro ao preparar a declaração: " . $conn->error;
        }
    } else {
        echo "Dados de entrada inválidos.";
    }
} else {
    echo "Método de solicitação inválido.";
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
