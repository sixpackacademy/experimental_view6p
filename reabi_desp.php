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
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
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
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="col-lg-10 col-md-11 mx-auto">
                <div class="detail-box">
                  <div>
                    <h3>
                      Fitness
                    </h3>
                    <h2>
                      Serviços
                    </h2>
                    <h1>
                      Six Pack Academy
                    </h1>
                    <p>
                    A reabilitação desportiva é um campo especializado da fisioterapia que se concentra na recuperação 
                    de atletas e praticantes de atividades físicas após lesões. O principal objetivo é restaurar a função física,
                     minimizar a dor e o desconforto, e permitir que o indivíduo retorne ao seu nível máximo de desempenho esportivo 
                     de maneira segura e eficaz.
                   <br>
                    O processo de reabilitação desportiva inclui uma avaliação detalhada da lesão e da 
                    condição física do atleta, seguida pela elaboração de um plano de tratamento personalizado. 
                    Esse plano pode envolver uma combinação de técnicas, como exercícios terapêuticos para fortalecer e 
                    estabilizar os músculos, alongamentos para melhorar a flexibilidade, terapia manual para reduzir a dor e 
                    a rigidez, e modalidades de eletroterapia para acelerar a cicatrização dos tecidos.
                   <br>
                    Além do tratamento das lesões, a reabilitação desportiva também enfatiza a prevenção de futuras lesões. 
                    Isso pode incluir o ensino de técnicas adequadas de movimento, ajustes na rotina de treinamento,
                     e a incorporação de exercícios de aquecimento e alongamento na rotina diária do atleta.
                   <br>
                    Os profissionais de reabilitação desportiva trabalham em estreita colaboração com treinadores, 
                    médicos e outros especialistas para assegurar uma abordagem integrada e completa ao cuidado do atleta.
                     Através de um programa de reabilitação bem-estruturado, os atletas podem não apenas se recuperar de lesões,
                     mas também melhorar sua condição física geral, reduzindo o risco de novas lesões e prolongando suas carreiras esportivas.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
      
      </div>
    </section>
    <!-- end slider section -->
  </div>


  <!-- Us section -->

  <section class="us_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2 id="servicos">
          Os nossos serviços
        </h2>
      </div>

      <div class="us_container ">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="box">
              <div class="img-box">
                <img src="images/physiotherapist.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  FISIOTERAPIA DESPORTIVA
                </h5>
                <p>
                  Tratamento e prevenção de lesões relacionadas com a prática de atividade física e desporto.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="box">
              <div class="img-box">
                <img src="images/dumbell.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  REABILITAÇÃO DESPORTIVA
                </h5>
                <p>
                  Processo de recuperação de lesões ou doenças que afetam a performance atlética.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="box">
              <div class="img-box">
                <img src="images/av_postural.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  AVALIAÇÃO POSTURAL
                </h5>
                <p>
                  Análise da postura e do alinhamento do corpo para identificar desequilíbrios e anomalias.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="box">
              <div class="img-box">
                <img src="images/massage.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  DRENAGEM LINFÁTICA
                </h5>
                <p>
                  Massagem que ajuda a estimular o sistema linfático e promover a eliminação de toxinas do corpo.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end us section -->


  <!-- heathy section -->

  <section class="heathy_section layout_padding">
    <div class="container">

      <div class="row">
        <div class="col-md-12 mx-auto">
          <div class="detail-box">
            <h2>
              HEALTHY MIND, HEALTHY BODY
            </h2>
            <p>
              No Ginásio Six Pack, valorizamos a conexão entre a mente e o corpo. 
              Uma mente saudável é essencial para um corpo saudável. 
              Oferecemos serviços que promovem o equilíbrio mental e físico, ajudando-o a viver de forma mais harmoniosa e saudável. 
              Invista no seu bem-estar integral connosco.            
            </p>

          </div>
        </div>
      </div>

    </div>
  </section>

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