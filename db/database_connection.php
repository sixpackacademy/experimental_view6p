<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "view6pa";
// Criar a conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . mysqli_connect_error());
}

# ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'RicardoMagalhaes2004';