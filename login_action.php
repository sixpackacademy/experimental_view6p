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
            $_SESSION['identification_number'] = $user['identification_number'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['phone_number'] = $user['phone_number'];
            header('Location: index.php');
        } else {
            echo "Pass errada";
        }
    } else {
        echo "user n existe";
    }

    $smtm->close();
}

$conn->close();