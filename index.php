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
  
                
                <?php
                  if(!isset($_SESSION['user_id'])) {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="login.php">Log In</a>';
                    echo '</li>';

                  } else {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="logout.php">Log Out</a>';
                    echo '</li>';
                    echo '<li class="nav-item">';
                    if($_SESSION['role'] == 1){
                      echo '<a class="nav-link" href="/dashboard">Dashboard</a>';
                    }
                    echo '</li>';
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="profile.php"> Profile</a>';
                    echo '</li>';

                  }
                  ?>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="#servicos">Servicos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#contactenos"> Contacte nos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="loja.php">Loja</a>
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
                      O Ginásio Six Pack é um centro de fitness dedicado a oferecer uma variedade de serviços de alta qualidade para satisfazer as suas necessidades de saúde e condicionamento físico. 
                      Entre os serviços disponíveis, destacamos a
                      <div class="button-container">
                      <a href="fisio_desp.php">Fisioterapia Desportiva</a>
                      <a href="fisio.php">Fisioterapia</a>
                      <a href="reabi_desp.php">Reabilitação desportiva</a>
                      <a href="aval_post.php">Avaliação postural</a>
                      <a href="massagem_relax.php">Massagem de relaxamento</a>
                      <a href="massagem_descont.php">Massagem descontrotaturante</a>
                      <a href="drenagem_linfatica.php">Drenagem linfática</a>
                      <a href="knesio_taping.php">Knesio taping</a>
                      <div>
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
            <form action="mandar_mensagem.php" method="post">
              <div>
                <input type="text" placeholder="Nome" name="nome" required/>
              </div>
              <div>
                <input type="email" placeholder="Email" name="email" required/>
              </div>
              <div>
                <input type="text" placeholder="Número de telemóvel" name="num_telemovel" required/>
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Mensagem" name="mensagem" required/>
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
        <a href="https://www.google.pt/maps/place/R.+de+Faria+Guimar%C3%A3es+753,+4200-077+Porto/@41.1667026,-8.6116752,54m/data=!3m1!1e3!4m6!3m5!1s0xd24645737f8f6bb:0xe04f403174ccf745!8m2!3d41.1638469!4d-8.6065284!16s%2Fg%2F11c2h3wzmj?entry=ttu">
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