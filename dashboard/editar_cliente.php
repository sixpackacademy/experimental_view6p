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
        // Obter os dados do cliente para preencher o formulário
        $id = intval($_GET['id']);
        $sql = "SELECT username, first_name, last_name, email, phone_number, identification_number FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $client = $result->fetch_assoc();
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Processar a atualização dos dados do cliente
        $id = intval($_POST['id']);
        $username = $_POST['username'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $identification_number = $_POST['identification_number'];

        $sql = "UPDATE users SET username = ?, first_name = ?, last_name = ?, email = ?, phone_number = ?, identification_number = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $username, $first_name, $last_name, $email, $phone_number, $identification_number, $id);

        if ($stmt->execute()) {
            echo "Cliente atualizado com sucesso!";
            header('Location: /dashboard');
            exit;
        } else {
            echo "Erro ao atualizar o cliente: " . $stmt->error;
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
    <title>Editar Cliente</title>
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
    <?php if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($client)) { ?>
        <div class="container">
            <h1>Editar Cliente</h1>
            <form action="editar_cliente.php" method="POST">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                    <label for="username">Username:</label>
                    <input type="text" name="username" value="<?php echo htmlspecialchars($client['username']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" value="<?php echo htmlspecialchars($client['first_name']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" value="<?php echo htmlspecialchars($client['last_name']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($client['email']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" value="<?php echo htmlspecialchars($client['phone_number']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="identification_number">Identification Number:</label>
                <input type="text" name="identification_number" value="<?php echo htmlspecialchars($client['identification_number']); ?>" required>
                </div>
                <button type="submit">Atualizar</button>
            </form>
            <a href="{{ url_for('dashboard_page') }}">Voltar ao Dashboard</a>
        </div>
            
            
        </form>
    <?php } else { ?>
        <p>Cliente não encontrado.</p>
    <?php } ?>
</body>
</html>
