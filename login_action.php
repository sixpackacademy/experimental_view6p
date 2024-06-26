<?php
session_start();
require 'db/database_connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $identification_number = $_POST['identification_number'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE identification_number = ?");
    $stmt->bind_param("i", $identification_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();

        if($user['password'] === $password){
            $_SESSION['user_id'] = $user['id'];
            header('Location: marcar_servicos.php');
        } else {
            echo "Pass errada";
        }
    } else {
        echo "user n existe";
    }

    $smtm->close();
}

$conn->close();