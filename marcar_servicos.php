<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Six Pack Academy</title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .content-wrapper {
            flex: 1;
        }
        .contact_section select,
        .contact_section input {
            margin-bottom: 15px;
        }
        .contact_section {
            background: #f9f9f9;
            padding: 60px 0;
        }
        .form_container {
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .form-group label {
            font-weight: 600;
            margin-bottom: 8px;
        }
        .form-group input,
        .form-group select {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            width: 100%;
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            padding: 10px 20px;
            border-radius: 4px;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
</head>
<body>
<div class="hero_area">
    <!-- header section starts -->
    <header class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <a class="navbar-brand" href="index.php">
                    <span>Six Pack Academy</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="ml-auto">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Log In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#servicos">Servicos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contactenos"> Contacte nos</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- end header section -->
</div>

<!-- contact section -->
<div class="content-wrapper">
    <section class="contact_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1 px-0"></div>
                <div class="col-lg-5 col-md-6">
                    <div class="form_container pr-0 pr-lg-5 mr-0 mr-lg-2">
                        <div class="heading_container">
                            <h2 id="contactenos">Marcar serviços</h2>
                        </div>
                        <p>ID do utilizador: <?php echo $user_id; ?></p>
                        <form action="calendar.php" method="POST">
                            <div class="form-group">
                                <label for="servico">Serviço:</label>
                                <select class="form-control" name="servico" id="servico">
                                    <option value="fisioterapia">Fisioterapia</option>
                                    <option value="fisioterapia-desportiva">Fisioterapia Desportiva</option>
                                    <option value="reabilitacao-desportiva">Reabilitação Desportiva</option>
                                    <option value="reabilitacao-post-cirurgia">Reabilitação Pós-Cirurgia</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dia">Dia:</label>
                                <input type="date" class="form-control" id="dia" name="dia">
                            </div>
                            <div class="form-group">
                                <label for="hora">Hora:</label>
                                <input type="time" class="form-control" id="hora" name="hora">
                            </div>
                            <div class="form-group">
                                <label for="observacoes">Observações:</label>
                                <textarea class="form-control" id="observacoes" name="observacoes"></textarea>
                            </div>
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                            <input type="hidden" name="access_token" value="<?php echo json_encode($_SESSION['access_token']); ?>">
                            <div class="btn_box">
                                <button type="submit" class="btn btn-primary">Marcar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div id="map" class="h-100 w-100">
                        <div class="map-responsive">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.27991688384!2d-74.25987368726902!3d40.69767006447952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c250b7b75c01e3%3A0xa97d7d7d7d7d7d7d!2sNew%20York!5e0!3m2!1sen!2sus!4v1578402654585!5m2!1sen!2sus"
                                    width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 px-0"></div>
            </div>
        </div>
    </section>
</div>

<!-- footer section -->
<footer class="container-fluid footer_section">
    <p>&copy; <span id="displayYear"></span> All Rights Reserved. Six Pack Academy</p>
</footer>
<!-- footer section -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script>
    document.getElementById('displayYear').innerHTML = new Date().getFullYear();
</script>
</body>
</html>
