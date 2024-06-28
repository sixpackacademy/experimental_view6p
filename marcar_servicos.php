<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // Se o usuário não está logado, redirecione para a página de login
    header('Location: login.php');
    exit();
}
$user_id = $_SESSION['user_id'];

// Fazer a chamada à API de citações motivacionais
$api_url = "https://api.quotable.io/random";
$quote_data = json_decode(file_get_contents($api_url), true);

$quote = $quote_data['content'];
$author = $quote_data['author'];
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

    .quote {
      margin-top: 20px;
      padding: 15px;
      background: #e9ecef;
      border-radius: 8px;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section starts -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html">
            <span>
              Six Pack Academy
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="ml-auto">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <?php
                  if(!isset($_SESSION['user_id'])) {
                    echo '<a class="nav-link" href="login.html">Log In</a>';
                  } else {
                    echo '<a class="nav-link" href="logout.php">Log Out</a>';
                  }
                  ?>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="marcar_servicos.php">Marcar Serviço</a>
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
                <h2 id="contactenos">
                  Marcar serviços
                </h2>
              </div>
              <form action="">
                <div class="form-group">
                  <label for="servico">Serviço:</label>
                  <select class="form-control" name="servico" id="servico">
                    <option value="fisioterapia">Fisioterapia</option>
                    <option value="fisioterapia-desportiva">Fisioterapia Desportiva</option>
                    <option value="reabilitacao-desportiva">Reabilitação Desportiva</option>
                    <option value="avaliacao-postural">Avaliação Postural</option>
                    <option value="massagem-relaxamento">Massagem de Relaxamento</option>
                    <option value="massagem-desconstraturante">Massagem Desconstruturante</option>
                    <option value="drenagem-linfatica">Drenagem Linfática</option>
                    <option value="kinesio-taping">Kinesio Taping</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="datetime">Data e Hora:</label>
                  <input type="datetime-local" class="form-control" id="datetime" placeholder="Data e Hora" />
                </div>
                
                <div class="d-flex">
                  <button class="btn btn-primary">
                    Marcar serviço
                  </button>
                </div>
              </form>
              <div class="quote">
                <h4>Citação Motivacional</h4>
                <p>"<?php echo $quote; ?>"</p>
                <p><em>- <?php echo $author; ?></em></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end contact section -->

  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="info_items">
        <a href="">
          <div class="item">
            <div class="img-box box-1">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                Rua Faria Guimarães, 753, Porto, Portugal
              </p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item">
            <div class="img-box box-2">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                22 400 1603
              </p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item">
            <div class="img-box box-3">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                SixPackAcademy@gmail.com
              </p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>
  <!-- end info section -->

  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <p>
      &copy; 2024 All Rights Reserved.
      <a href="https://www.consumidor.gov.pt/livro-de-reclamacoes.aspx">Livro de reclamações</a>
    </p>
  </footer>
  <!-- footer section -->

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
</body>

</html>
