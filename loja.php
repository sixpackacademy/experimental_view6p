<?php
session_start();
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
}
?>

<!DOCTYPE html>
<html lang="en" >
<head><!-- slider stylesheet -->
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
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

body {
    font-family: "Poppins", sans-serif;
    color: #444444;
}

a,
a:hover {
    text-decoration: none;
    color: inherit;
}

.section-products {
    padding: 80px 0 54px;
}

.section-products .header {
    margin-bottom: 50px;
}

.section-products .header h3 {
    font-size: 1rem;
    color: #2E7D32;
    font-weight: 500;
}

.section-products .header h2 {
    font-size: 2.2rem;
    font-weight: 400;
    color: #444444; 
}

.section-products .single-product {
    margin-bottom: 26px;
}

.section-products .single-product .part-1 {
    position: relative;
    height: 290px;
    max-height: 290px;
    margin-bottom: 20px;
    overflow: hidden;
}

.section-products .single-product .part-1::before {
		position: absolute;
		content: "";
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: -1;
		transition: all 0.3s;
}

.section-products .single-product:hover .part-1::before {
		transform: scale(1.2,1.2) rotate(5deg);
}



.section-products .single-product .part-1 .discount,
.section-products .single-product .part-1 .new {
    position: absolute;
    top: 15px;
    left: 20px;
    color: #ffffff;
    background-color: #fe302f;
    padding: 2px 8px;
    text-transform: uppercase;
    font-size: 0.85rem;
}

.section-products .single-product .part-1 .new {
    left: 0;
    background-color: #444444;
}

.section-products .single-product .part-1 ul {
    position: absolute;
    bottom: -41px;
    left: 20px;
    margin: 0;
    padding: 0;
    list-style: none;
    opacity: 0;
    transition: bottom 0.5s, opacity 0.5s;
}

.section-products .single-product:hover .part-1 ul {
    bottom: 30px;
    opacity: 1;
}

.section-products .single-product .part-1 ul li {
    display: inline-block;
    margin-right: 4px;
}

.section-products .single-product .part-1 ul li a {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    background-color: #ffffff;
    color: #444444;
    text-align: center;
    box-shadow: 0 2px 20px rgb(50 50 50 / 10%);
    transition: color 0.2s;
}

.section-products .single-product .part-1 ul li a:hover {
    color: #fe302f;
}

.section-products .single-product .part-2 .product-title {
    font-size: 1rem;
}

.section-products .single-product .part-2 h4 {
    display: inline-block;
    font-size: 1rem;
}

.section-products .single-product .part-2 .product-old-price {
    position: relative;
    padding: 0 7px;
    margin-right: 2px;
    opacity: 0.6;
}

.section-products .single-product .part-2 .product-old-price::after {
    position: absolute;
    content: "";
    top: 50%;
    left: 0;
    width: 100%;
    height: 1px;
    background-color: #444444;
    transform: translateY(-50%);
}
.center-cropped {
  width: 300px;
  height: 300px;
  background-position: center center;
  background-repeat: no-repeat;
}
	</style>
  <meta charset="UTF-8">
  <title>Loja suplementos</title>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
 <div class="container-fluid ">	
	        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span class="text-dark">
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
                    echo '<a class="nav-link text-dark" href="login.php">Log In</a>';
                    echo '</li>';
                  } else {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link text-dark" href="logout.php">Log Out</a>';
                    echo '</li>';
                    echo '<li class="nav-item">';
                    if($_SESSION['role'] == 1){
                      echo '<a class="nav-link text-dark" href="/dashboard">Dashboard</a>';
                    }
                    echo '</li>';
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link text-dark" href="profile.php"> Profile</a>';
                    echo '</li>';
                  }
                  ?>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-dark" href="loja.php">Loja</a>
                </li>
               
               
                
                
              </ul>
            </div>
          </div>
        </nav>
    </div>
<!-- partial:index.partial.html -->
<section class="section-products">
		<div class="container">
				<div class="row justify-content-center text-center">
						<div class="col-md-8 col-lg-6">
								<div class="header">
										<h3>Loja Suplementos</h3>
										<h2>Os nossos produtos</h2>
								</div>
						</div>
				</div>
				<div class="row">
						<!-- Single Product -->
							<?php
                            require 'db/database_connection.php';

                            $query = "SELECT id, nome, preco, imagem FROM produtos";
                            $result = $conn->query($query);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                   
                                
                                    echo "</tr>";
                                   	echo "<div class='col-md-6 col-lg-4 col-xl-3'>";
									echo "		<div id='product-' class='single-product'>";
									echo "<div class='part-1'>";
									echo "<img src='/images/" . $row['imagem'] . " ' class='center-cropped'>";
									echo "</div>";
									echo "<div class='part-2'>";
									echo "<h3 class='product-title'>" . $row['nome'] . "</h3>";
									echo "<h4 class='product-price'>" . $row['preco'] . ".99 €</h4>";
									echo "</div>";
									echo "</div>";
									echo "</div>";
                                }
                            }
                             else {
                                echo "NADA!";
                            }

                            $conn->close();
                            ?>
						
						
				</div>
		</div>
</section>
<!-- partial -->
  
</body>
</html>
