<?php
session_start();
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  $role = $_SESSION['role'];
}

if ($role == 1) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/dashboard.css">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <title>Dashboard</title>
</head>

<body>
    <div id="responseModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Responder ao produto</h2>
            <form id="responseForm">
                <label for="produtomail">produto:</label>
                <input type="text" id="produtomail" name="produtomail" readonly>
                <label for="responseMessage">Mensagem:</label>
                <textarea id="responseMessage" name="responseMessage" rows="4" required></textarea>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
    <div class="sidebar">
        <div class="sidebar-brand">
            <a href="/" class="logo">SixPack<span>Academy</span></a>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="/dashboard" class="" id="dashboard"><i class='bx bx-clipboard'></i><span>Dashboard</span></a>
                </li>  
                <li>
                    <a href="/dashboard/produtos.php" class="active" id="accounts"><i class='bx bxs-user-account'></i><span>produtos</span></a>
                </li>
                
                <li>
                    <a href="/dashboard/contactos.php" class="" id="reviews"><i class='bx bxs-comment-detail'></i><span>Contactos</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content" class="hidden">
        <header>
            <h1>Dashboard</h1>
            <div class="user">
                <img src="/assets/img/user-icon.png">
                <div>
                    <h4>Administrador</h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>

        <!-- Outras seções do dashboard omitidas para brevidade -->

        <main id="reviews-section">
            <div class="reviews">
                <div class="recent-reviews">
                    <div class="header">
                        <h2>Produtos</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOme</th>
                                <th>Preço</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require '../db/database_connection.php';

                            $query = "SELECT id, nome, preco FROM produtos";
                            $result = $conn->query($query);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['id']) . "</td>"; // Alterado para exibir o ID do produto
                                    echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['preco']) . "</td>";
                                    echo '<td>
                                    <button class="approve-btn" data-client="' . htmlspecialchars($row['username']) . '">Editar</button>
                                    <button class="reject-btn" data-client-id="' . htmlspecialchars($row['id']) . '">Apagar</button>
                                </td>';
                                
                                    echo "</tr>";
                                }
                            }
                             else {
                                echo "<tr><td colspan='4'>Nenhum contacto encontrado</td></tr>";
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <!-- Outras seções omitidas para brevidade -->

    </div>

</body>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const editButtons = document.querySelectorAll('.approve-btn');
        const deleteButtons = document.querySelectorAll('.reject-btn');

        editButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                const clientRow = this.closest('tr');
                const clientId = clientRow.querySelector('td:first-child').textContent;
                window.location.href = `editar_produto.php?id=${clientId}`;
            });
        });

        deleteButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            const clientRow = this.closest('tr');
            const clientId = this.getAttribute('data-client-id');
            // Aqui você pode implementar a lógica para deletar o produto, como um redirecionamento para uma página de confirmação de exclusão
            // Exemplo:
            if (confirm(`Tem certeza que deseja apagar o produto com ID ${clientId}?`)) {
                window.location.href = `delete_produto.php?id=${clientId}`;
            }
        });
    });
    });
</script>

</html>
<?php 
} else { 
?>
    <h1>NAO TENS PERMISSAO!</h1>
    <img src="/assets/img/permissao.jpeg">
<?php 
} 
?>
