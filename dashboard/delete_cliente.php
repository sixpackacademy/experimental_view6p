<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $role = $_SESSION['role'];
}

if ($role == 1) {
    // Conexão ao banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "root"; 
    $dbname = "view6pa";

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Verificar se o método é POST e se o ID do cliente foi passado via GET
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        $id = intval($_GET['id']);

        // Query para deletar o cliente
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Cliente deletado com sucesso!";
            header('Location: /dashboard'); // Redirecionar para o dashboard ou outra página apropriada após a exclusão
            exit;
        } else {
            echo "Erro ao deletar o cliente: " . $stmt->error;
        }
    } else {
        echo "ID do cliente não especificado.";
    }

    $conn->close();
} else {
    echo "<h1>NAO TENS PERMISSAO!</h1>";

    exit;
}
?>
