<?php
session_start();
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  $role = $_SESSION['role'];
  require '../db/database_connection.php';
  $query = "SELECT id, identification_number, username, email, phone_number FROM users";
  $num_contacto = "SELECT * from contactos";
$result = $conn->query($query);
$result2 = $conn->query($num_contacto);
    // Conta o número de registos
    $num_users = $result->num_rows;
    $quant_contactos = $result2->num_rows;

    $conn->close();
}
?>
<?php if($role == 1) { ?>
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
                    <a href="#" class="active" id="dashboard"><i class='bx bx-clipboard'></i><span>Dashboard</span></a>
                </li>  
            <li>
                <a href="/dashboard/clientes.php" class="" id="accounts"><i class='bx bxs-user-account'></i><span>Clientes</span></a>
            </li>
           
            <li>
                <a href="/dashboard/contactos.php" class="" id="reviews"><i class='bx bxs-comment-detail'></i><span>Contactos</span></a>
            </li>

            </li> 
                
            </ul>
        </div>
    </div>

         <div class="main-content">
            <header>
            <h1>
                Dashboard
            </h1>

            <div class="user">
                <img src="/assets/img/user-icon.png">
                <div>
                    <h4>Administrador</h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>

            <main id="dashboard-section">
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1><?php echo $num_users; ?></h1>
                        <span>Clientes</span>
                    </div>
                    <div>
                        <i class='bx bxs-user bx-lg'></i>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1><?php echo $quant_contactos; ?></h1>
                        <span>Contactos</span>
                    </div>
                    <div>
                        <i class='bx bxs-comment-detail bx-lg'></i>
                    </div>
                </div>

               
            </div>

            <div class="dashboard">
                <div class="recent-sales">
                    <div class="header">
                        <h2>Mensagens</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Mensagem</th>    
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            require '../db/database_connection.php';

                            $query = "SELECT cliente, email, mensagem FROM contactos";
                            $result = $conn->query($query);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['cliente']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['mensagem']) . "</td>";
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
                <div class="new-customer">
                    <div class="header">
                        <h2>Novos Clientes</h2>
                        <button class="see-all">Ver Tudo →</button>
                    </div>
                    <div class="customer-list">
                    <?php
                            require '../db/database_connection.php';

                            $query = "SELECT id, first_name, last_name, identification_number, username, email, phone_number FROM users";
                            $result = $conn->query($query);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<div class='customer-item'>";
                                    echo "<img src='/assets/img/tanjil.jpg' alt='Customer'>";
                                    echo "<div class='customer-info'>";
                                    echo "<p>" . $row['username'] . "</p>";
                                    echo "<span>Contacts</span>";
                                    echo "<div class='customer-info-icons'>";
                                    echo "<i class='bx bx-user'></i>";
                                    echo "<i class='bx bx-phone'></i>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                            }
                             else {
                                echo "<tr><td colspan='4'>Nenhum contacto encontrado</td></tr>";
                            }

                            $conn->close();
                            ?>
                       
                    </div>
                </div>
            </div>
        </main>

        <main id="reserve-section" class="hidden">
            <section class="reserved-cars">
                <div class="header">
                    <h2>Serviços Reservados</h2>
                    <button class="see-all">Ver Tudo →</button>
                </div>
                <div class="car-list">
                    <div class="car-item">
                        <img src="../images/drenagem2.png" alt="Car 1">
                        <div class="car-info">
                            <h3>Drenagem Linfática</h3>
                            <p>Reservado por: António Costa</p>
                            <p>Data de reserva: 05-08-2026</p>
                        </div>
                    </div>
                    
                </div>
            </section>

            <section class="reservation-requests">
                <div class="header">
                    <h2>Pedidos de Reservas</h2>
                    <button class="see-all">Ver Tudo →</button>
                </div>
                <div class="request-list">
                    <div class="request-item">
                        <img src="../images/fisio_desp2.png" alt="Car 3">
                        <div class="request-info">
                            <h3>Fisioterapia Desportiva</h3>
                            <p>Pedido de: Marcelo Rebelo de Sousa</p>
                            <p>Marcação de Data: 12-09-2024</p>
                            <div class="request-actions">
                                <button class="approve-btn">Aceitar</button>
                                <button class="reject-btn">Rejeitar</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
        </main>

        <main id="customer-support-section" class="hidden">
            <div class="tickets">
                <div class="ticket-item">
                    <div class="ticket-header">
                        <h3>Issue with Payment</h3>
                        <span class="ticket-status">Open</span>
                    </div>
                    <p class="ticket-description">Customer is unable to complete payment process.</p>
                    <div class="ticket-footer">
                        <span class="ticket-customer">
                            <i class="bx bx-user"></i> Customer ID:
                        </span>
                        <span class="ticket-contact">
                            <a href=""><i class="bx bx-phone"></i></a>
                        </span>
                    </div>
                </div>

                <div class="ticket-item">
                    <div class="ticket-header">
                        <h3>Technical Support Needed</h3>
                        <span class="ticket-status">Pending</span>
                    </div>
                    <p class="ticket-description">Customer reports issues with car navigation system.</p>
                    <div class="ticket-footer">
                        <span class="ticket-customer">
                            <i class="bx bx-user"></i> Customer ID:
                        </span>
                        <span class="ticket-contact">
                            <a href=""><i class="bx bx-phone"></i></a>
                        </span>
                    </div>
                </div>
            </div>
        </main>

        <main id="reviews-section" class="hidden">
            <div class="reviews">
                <div class="recent-reviews">
                    <div class="header">
                        <h2></h2>
                        <button class="see-all">Ver Tudo →</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Email</th>
                                <th>Data</th>
                                <th>Serviço</th>
                                <th>Mensagem</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Luís Monte Negro</td>
                                <td>luismontenegro@gmail.com</td>
                                <td>2024-06-01</td>
                                <td>Massagem Relaxante</td>
                                <td>Gostei muita da massagem e muito profiissional</td>
                                <td><button class="approve-btn" data-client="Luís Monte Negro" data-service="Massagem Relaxante">Responder</button></td>
                            </tr>
                            <tr>
                                <td>Tanjil</td>
                                <td>tanjilkh@gmail.com</td>
                                <td>2024-07-01</td>
                                <td>Fisioterapia Desportiva</td>
                                <td>Sinto me melhor após a realização do serviço</td>
                                <td><button class="approve-btn" data-client="Tanjil" data-service="Fisioterapia Desportiva">Responder</button></td>
                            </tr>
                            <tr>
                                <td>Ricardo</td>
                                <td>ricardont@gmail.com</td>
                                <td>2024-07-02</td>
                                <td>Fisioterapia</td>
                                <td>Está disponivel nos dias de sabado?</td>
                                <td><button class="approve-btn" data-client="Ricardo" data-service="Fisioterapia">Responder</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </main>

        <main id="accounts-section" class="hidden">
            <div class="accounts">
                <div class="account-overview">
                    <div class="header">
                        <h2>Clientes</h2>
                        <button class="see-all">Ver tudo →</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID Cliente</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telemóvel</th>
                                <th>Acão</oth>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1875</td>
                                <td>Tanjil Khan</td>
                                <td>tanjilkh@gmail.com</td>
                                <td>914720543</td>
                                <td><button class="view-details">Editar</button> <button class="view-details">Apagar</button></td>
                                
                            </tr>
                            <tr>
                                <td>1895</td>
                                <td>Ricardo Magalhães</td>
                                <td>ricardont@gmail.com</td>
                                <td>914720543</td>
                                <td><button class="view-details">Editar</button> <button class="view-details">Apagar</button></td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        

        <main id="settings-section" class="hidden">
            <h2>Settings Section</h2>
        </main>

    </div>
   
</body>

</html>
<?php } ?>

<?php if($role == 0){ ?>
    <h1>NAO TENS PERMISSAO!</h1>
     <img src="/assets/img/permissao.jpeg">
<?php } ?>