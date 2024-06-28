<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "Bem-vindo, utilizador ID: " . $_SESSION['user_id'];
?>