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
            <h2>Responder ao Cliente</h2>
            <form id="responseForm">
                <label for="clientEmail">Cliente:</label>
                <input type="text" id="clientEmail" name="clientEmail" readonly>
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
                    <a href="/dashboard/clientes.php" class="" id="accounts"><i class='bx bxs-user-account'></i><span>Clientes</span></a>
                </li>
                <li>
                    <a href="/dashboard/produtos.php" class="" id="accounts"><i class='bx bxs-user-account'></i><span>Produtos</span></a>
                </li>
                <li>
                    <a href="/dashboard/contactos.php" class="active" id="reviews"><i class='bx bxs-comment-detail'></i><span>Contactos</span></a>
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
                        <h2>Mensagens</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Email</th>
                                <th>Mensagem</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require '../db/database_connection.php';

                            $query = "SELECT id, cliente, email, mensagem FROM contactos";
                            $result = $conn->query($query);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['cliente']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['mensagem']) . "</td>";
                                    echo '<td><button class="approve-btn" data-client="' . htmlspecialchars($row['cliente']) . '" data-service="Unknown">Responder</button>';
                                    echo '<button class="reject-btn" mensagem-id="' . htmlspecialchars($row['id']) . '">Apagar</button></td>';
                                    echo "</tr>";
                                }
                            } else {
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const sidebarLinks = document.querySelectorAll('.sidebar-menu a');
            const mainContentSections = document.querySelectorAll('.main-content > main');
            const modal = document.getElementById('responseModal');
            const closeModal = document.querySelector('.close');
            const responseButtons = document.querySelectorAll('.approve-btn');
            const clientEmailInput = document.getElementById('clientEmail');
            const responseForm = document.getElementById('responseForm');

            responseButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    const clientRow = this.closest('tr');
                    const clientEmail = clientRow.querySelector('td:nth-child(2)').textContent;
                    clientEmailInput.value = clientEmail;
                    modal.style.display = 'block';
                });
            });

            closeModal.addEventListener('click', function () {
                modal.style.display = 'none';
            });

            window.addEventListener('click', function (event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            });

            responseForm.addEventListener('submit', function (event) {
                event.preventDefault();
                const clientEmail = document.getElementById('clientEmail').value;
                const responseMessage = document.getElementById('responseMessage').value;
                const emailSubject = encodeURIComponent('Resposta à sua mensagem');
                const emailBody = encodeURIComponent(responseMessage);
                const gmailUrl = `https://mail.google.com/mail/?view=cm&fs=1&to=${clientEmail}&su=${emailSubject}&body=${emailBody}`;
                window.open(gmailUrl, '_blank');
                modal.style.display = 'none';
            });

            document.querySelector('#reviews-section').classList.remove('hidden');
        });
    </script>

    <script>
document.addEventListener("DOMContentLoaded", function () {
    const deleteButtons = document.querySelectorAll('.reject-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            const mensagemRow = this.closest('tr');
            const mensagemId = this.getAttribute('mensagem-id');
            if (confirm(`Tem certeza que deseja apagar a mensagem com ID ${mensagemId}?`)) {
                window.location.href = `delete_mensagem.php?id=${mensagemId}`;
            }
        });
    });
});
</script>
</body>

</html>
<?php 
} else { 
?>
    <h1>NAO TENS PERMISSAO!</h1>
    <img src="/assets/img/permissao.jpeg">
<?php 
} 
?>
