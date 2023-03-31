<?php
 include_once("PHP/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Imagens/DescomplicarsIcon.png" rel="icon">
    <link href="CSS/style.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>DescompliCars</title>
</head>
<body>
    <!--MenuBar-->
    <?php require "PHP/verificar.php";
        echo $_SESSION['cima'];
    ?>
    <!--Fecha MenuBar-->
    <!--Imagens-->
    <div class="slideshow-container">

        <div id="radio1" class="mySlides fade">
          <img src="Carosel/1.png" style="width:100%;">
        </div>
        
        <div id="radio2" class="mySlides fade">
          <img src="Carosel/2.png" style="width:100%;">
        </div>
        
        <div id="radio3" class="mySlides fade">
          <img src="Carosel/3.png" style="width:100%">
        </div>
        
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
        
        </div>
        <br>
        
        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span> 
          <span class="dot" onclick="currentSlide(2)"></span> 
          <span class="dot" onclick="currentSlide(3)"></span> 
        </div>
        <!--Imagens Fecha-->

        <br><br>
    <div class="containerconcea">
      <div class="top-titlea">
        <h3>Modelos</h3>
        <hr>
    <div class="rowa">
      <a href="#" id="modelos"><div class="featured-boxa">
          <div class="featured-imga">
              <img src="Carros/abcdefg.png">
              <h1>SUVs</h1>
          </div>
      </div></a>
      <a href="Modelos/Hatchers.php"><div class="featured-boxa">
          <div class="featured-imga">
              <img src="Carros/Hatchers.png">
              <h1>Hatchers</h1>
          </div>
      </div></a>
      <a href="Modelos/Picapes.php"><div class="featured-boxa">
          <div class="featured-imga">
              <img src="Carros/Picapes.png">
              <h1>Picapes</h1>
          </div>
        </div></a>
        <a href="Modelos/Eletricos.php"><div class="featured-boxa">
          <div class="featured-imga">
              <img src="Carros/Eletricos.png">
              <h1>Eletricos</h1>
          </div>
      </div></a>
      <a href="Modelos/Sedans.php"><div class="featured-boxa">
          <div class="featured-imga">
              <img src="Carros/Sedans.png">
              <h1>Sedans</h1>
          </div>
      </div></a>
      <a href="Modelos/Economicos.php"><div class="featured-boxa">
          <div class="featured-imga">
              <img src="Carros/Economicos.png">
              <h1>Economicos</h1>
          </div>
        </div></a>
        <a href="Modelos/Familia.php"><div class="featured-boxa">
          <div class="featured-imga">
              <img src="Carros/Familia.png">
              <h1>Familia</h1>
          </div>
        </div></a>
      </div>
      </div>
    </div>

    <!--Rodapé-->
    <?php require "PHP/rodape.php";
        echo $_SESSION['rodape'];
    ?>
    <!--Rodapé Fechar-->
    <script src="Java/script.js"></script>
    <script src="Java/app.js"></script>
    <script>
      setInterval(() => {
        plusSlides(1)
      }, 5000);
    </script>
    
</body>
</html>