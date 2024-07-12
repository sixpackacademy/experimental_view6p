<?php
session_start();
require 'db/database_connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];

    $stmt = $conn->prepare("INSERT INTO users (username, first_name, last_name, email, phone_number, password, role) VALUES (?, ?, ?, ?, ?, ?, 0)");
    $stmt->bind_param("ssssss", $username, $first_name, $last_name, $email, $phone_number, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result){
        header('Location: login.php');
    } else {
        echo "algum erro inesperado aconteceu.";
    }

    

    $smtm->close();
    
}

$conn->close();