<?php
session_start();
require 'db/database_connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $phone_number = $_POST['num_telemovel'];
    $mensagem = $_POST['mensagem'];

    $stmt = $conn->prepare("INSERT INTO contactos (cliente, email, num_telemovel, mensagem) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $email, $phone_number, $mensagem);
    
    if($stmt->execute()){
        header('Location: index.php');
        exit();
    } else {
        echo "algum erro inesperado aconteceu.";
    }

    
    if($stmt !== null){
        $smtm->close();
    }   
}