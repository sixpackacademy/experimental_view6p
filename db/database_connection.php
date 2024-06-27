<?php
$servername = "localhost";
$username = "root";
$password = "root";

// Criar a conexão
$conn = mysqli_connect($servername, $username, $password);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . mysqli_connect_error());
}

echo "Conectado!";