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

.hero_area_fisio {
  height: 100vh;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
          background-image: url(../images/fisio.jpg);
  background-size: cover;
  background-attachment: fixed;
}

    .content-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 50px;
      color: white; 
      margin-top: 80px;
    }
    .content-container .text {
      flex: 1;
      padding-right: 20px;
      font-size: 30px;
      background-color: rgba(255, 255, 255, 0.3);
      border-radius: 20px;
      box-shadow: 10px 10px 20px black;
    }
    .content-container .image {
      flex: 1;
      display: flex;
      justify-content: flex-end;
    }
    .content-container .image img {
      max-width: 97%;
      border-radius: 20px;
      height: 475px;
      width: 800px;
      box-shadow: 10px 10px 20px black;
    }
    .content-container .words{
    padding: 20px;
    }
    .content-container .service_button{
      content-justify: center;
    }
    .content-container .hover{

    }
     
.button-57 {
  position: relative;
  overflow: hidden;
  border: 0px solid #18181a;
  color: #18181a;
  display: inline-block;
  font-size: 15px;
  line-height: 30px;
  padding: 18px 18px 17px;
  text-decoration: none;
  cursor: pointer;
  background: #fff;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  border-radius: 5px;
}

.button-57 span:first-child {
  position: relative;
  transition: color 600ms cubic-bezier(0.48, 0, 0.12, 1);
  z-index: 10;
}

.button-57 span:last-child {
  color: white;
  display: block;
  position: absolute;
  bottom: 0;
  transition: all 500ms cubic-bezier(0.48, 0, 0.12, 1);
  z-index: 100;
  opacity: 0;
  top: 50%;
  left: 50%;
  transform: translateY(225%) translateX(-50%);
  height: 14px;
  line-height: 13px;
}

.button-57:after {
  content: "";
  position: absolute;
  bottom: -50%;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: green;
  transform-origin: bottom center;
  transition: transform 600ms cubic-bezier(0.48, 0, 0.12, 1);
  transform: skewY(9.3deg) scaleY(0);
  z-index: 50;
}

.button-57:hover:after {
  transform-origin: bottom center;
  transform: skewY(9.3deg) scaleY(2);
}

.button-57:hover span:last-child {
  transform: translateX(-50%) translateY(-100%);
  opacity: 1;
  transition: all 900ms cubic-bezier(0.48, 0, 0.12, 1);
}
    
  </style>
</head>

<body>
  <div class="hero_area_fisio">
    <!-- header section starts -->
    <header class="header_section">
      <div class="container-fluid ">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
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
                    echo '<a class="nav-link" href="login.php">Log In</a>';
                  } else {
                    echo '<a class="nav-link" href="logout.php">Log Out</a>';
                  }
                  ?>
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
      <div class="words">
      <h1>Sobre a Fisioterapia </h1>
      <br><br>
      <p>
      A fisioterapia é uma ciência da saúde que utiliza métodos físicos, como exercícios, massagens e técnicas manuais, para tratar e prevenir disfunções do movimento e dor. Seu objetivo é restaurar, manter e promover a saúde física e funcional dos pacientes. É essencial na reabilitação de lesões, doenças crônicas e condições pós-cirúrgicas.
      </p>
      </div>
    </div>
    <div class="image">
      <img src="images/fisio2.jpg" alt="Fisioterapia">
    </div>
    
  </div>
  <div style="text-align: center">
<!-- Calendly link widget begin -->
<link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>
<a href="" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/tanjilkh/fisioterapia'});return false;"><button class="button-57" role="button"><span class="text">Fisioterapia </span><span>Marcar <br> Agora</span></button>
</a>
<!-- Calendly link widget end -->

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