<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "view6pa";
// Criar a conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . mysqli_connect_error());
}

echo "Conectado!";