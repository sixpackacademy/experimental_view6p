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

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        // Obter os dados do produto para preencher o formulário
        $id = intval($_GET['id']);
        $sql = "SELECT nome, preco FROM produtos WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $produto = $result->fetch_assoc();
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Processar a atualização dos dados do produto
        $id = intval($_POST['id']);
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];

        $sql = "UPDATE produtos SET nome = ?, preco = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $nome, $preco, $id);

        if ($stmt->execute()) {
            echo "produto atualizado com sucesso!";
            header('Location: /dashboard');
            exit;
        } else {
            echo "Erro ao atualizar o produto: " . $stmt->error;
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
    <title>Editar produto</title>
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
        input[type="text"] {
            width: calc(100% - 10px);
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="number"] {
            width: calc(100% - 10px);
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="email"] {
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
    <?php if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($produto)) { ?>
        <div class="container">
            <h1>Editar produto</h1>
            <form action="editar_produto.php" method="POST">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="preco">Preco:</label>
                    <input type="number" name="preco" value="<?php echo htmlspecialchars($produto['preco']); ?>" required>
                </div>
                <button type="submit">Atualizar</button>
            </form>
            <a href="{{ url_for('dashboard_page') }}">Voltar ao Dashboard</a>
        </div>
            
            
        </form>
    <?php } else { ?>
        <p>produto não encontrado.</p>
    <?php } ?>
</body>
</html>
