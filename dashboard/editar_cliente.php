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

    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Cliente</h1>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($client)) { ?>
        <form action="editar_cliente.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($client['username']); ?>" required>
            <br>
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" value="<?php echo htmlspecialchars($client['first_name']); ?>" required>
            <br>
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" value="<?php echo htmlspecialchars($client['last_name']); ?>" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($client['email']); ?>" required>
            <br>
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" value="<?php echo htmlspecialchars($client['phone_number']); ?>" required>
            <br>
            <label for="identification_number">Identification Number:</label>
            <input type="text" name="identification_number" value="<?php echo htmlspecialchars($client['identification_number']); ?>" required>
            <br>
            <button type="submit">Atualizar</button>
        </form>
    <?php } else { ?>
        <p>Cliente não encontrado.</p>
    <?php } ?>
</body>
</html>
