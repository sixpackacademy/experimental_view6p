<?php
session_start();
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
}
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
    .content-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 50px;
      color: white; 
    }
    .content-container .text {
      flex: 1;
      padding-right: 20px;
      font-size: 30px;
    }
    .content-container .image {
      flex: 1;
      display: flex;
      justify-content: flex-end;
    }
    .content-container .image img {
      max-width: 100%;
      border-radius: 20px;
    }
  </style>
</head>

<body>
  <div class="hero_area_fisio_desp">
    <!-- header section starts -->
    <header class="header_section">
      <div class="container-fluid ">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
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
              <ul class="navbar-nav  ">
                <li class="nav-item">
                  <?php
                  if (!isset($_SESSION['user_id'])) {
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

  <div class="content-container">
    <div class="text">
      <h1>Sobre a Fisioterapia Desportiva</h1>
      <br><br>
      <p>
        A fisioterapia desportiva é uma especialidade da fisioterapia que atua na prevenção e tratamento de lesões relacionadas com a prática desportiva.
        O principal objetivo é ajudar os atletas a recuperar rapidamente de lesões e a melhorar a sua performance.
      </p>
    </div>
    <div class="image">
      <img src="images/fisio_desp2.png" alt="Fisioterapia Desportiva">
    </div>
  </div>
  </div>


  <!-- Us section -->

  <!-- end us section -->

  <!-- heathy section -->

  <!-- end heathy section -->

  <!-- contact section -->

  <section class="contact_section ">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 px-0">
          <div class="img-box">
            <img src="images/rececao.png" alt="">
          </div>
        </div>
        <div class="col-lg-5 col-md-6">
          <div class="form_container pr-0 pr-lg-5 mr-0 mr-lg-2">
            <div class="heading_container">
              <h2 id="contactenos">
                Contacte nos
              </h2>
            </div>
            <form action="">
              <div>
                <input type="text" placeholder="Nome" />
              </div>
              <div>
                <input type="email" placeholder="Email" />
              </div>
              <div>
                <input type="text" placeholder="Número de telemóvel" />
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Mensagem" />
              </div>
              <div class="d-flex ">
                <button>
                  Send
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->

  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="info_items">
        <a href="">
          <div class="item ">
            <div class="img-box box-1">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                Rua Faria Guimarães, 753 , Porto, Portugal
              </p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item ">
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
          <div class="item ">
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

  <!-- end info_section -->

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