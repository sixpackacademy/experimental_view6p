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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Processar a inserção do novo produto
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $imagem = $_FILES['imagem'];

        // Diretório de upload
        $target_dir = "../images/";
        $target_file = $target_dir . basename($imagem["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Verificar se o arquivo é uma imagem real ou fake
        $check = getimagesize($imagem["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "O arquivo não é uma imagem.";
            $uploadOk = 0;
        }

        // Verificar se o arquivo já existe
        if (file_exists($target_file)) {
            echo "Desculpe, o arquivo já existe.";
            $uploadOk = 0;
        }

        // Verificar o tamanho do arquivo
        if ($imagem["size"] > 500000) {
            echo "Desculpe, o arquivo é muito grande.";
            $uploadOk = 0;
        }

        // Permitir certos formatos de arquivo
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
            $uploadOk = 0;
        }

        // Verificar se $uploadOk está definido como 0 por um erro
        if ($uploadOk == 0) {
            echo "Desculpe, seu arquivo não foi enviado.";
        // Tentar fazer o upload do arquivo
        } else {
            if (move_uploaded_file($imagem["tmp_name"], $target_file)) {
                $imagem_nome = basename($imagem["name"]);
                $sql = "INSERT INTO produtos (nome, preco, imagem) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $nome, $preco, $imagem_nome);

                if ($stmt->execute()) {
                    echo "Produto adicionado com sucesso!";
                    header('Location: /dashboard');
                    exit;
                } else {
                    echo "Erro ao adicionar o produto: " . $stmt->error;
                }
            } else {
                echo "Desculpe, houve um erro ao fazer o upload do seu arquivo.";
            }
        }
    }

    $conn->close();
} else {
    echo "<h1>NAO TENS PERMISSAO!</h1>";
    echo '<img src="/assets/img/permissao.jpeg">';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h1 {
            color: #333333;
            margin-bottom: 20px;
        }
        form {
            width: 100%;
            text-align: left;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: calc(100% - 10px);
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
        a {
            display: block;
            margin-top: 15px;
            text-decoration: none;
            color: #007BFF;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Adicionar Produto</h1>
        <form action="adicionar_produto.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="number" name="preco" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="imagem">Imagem:</label>
                <input type="file" name="imagem" accept="image/*" required>
            </div>
            <button type="submit">Adicionar</button>
        </form>
        <a href="dashboard.php">Voltar ao Dashboard</a>
    </div>
</body>
</html>
