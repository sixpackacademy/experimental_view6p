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
    $identification_number = rand(1000,2000);
    $role = 0;

    $stmt = $conn->prepare("INSERT INTO users (username, first_name, last_name, email, phone_number, password, role, identification_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $username, $first_name, $last_name, $email, $phone_number, $password, $role, $identification_number);
    
    if($stmt->execute()){
        header('Location: login.php');
        exit();
    } else {
        echo "algum erro inesperado aconteceu.";
    }

    
    if($stmt !== null){
        $smtm->close();
    }   
}