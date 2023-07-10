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
  <link href="CSS/carros.css" rel="stylesheet">
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
  <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="Carosel/1.png" alt="">
      </div>
      <div class="carousel-item">
        <img src="Carosel/2.png" alt="">
      </div>
      <div class="carousel-item">
        <img src="Carosel/3.png" alt="">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span style="color: #004aad;" class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!--Imagens Fecha-->

  <br><br>
  <div class="containerconcea">
    <div class="top-titlea">
      <h3>Modelos</h3>
      <hr>
      <div class="rowa">
        <a href="Modelos/SUVs.php" id="modelos">
          <div class="featured-boxa">
            <div class="featured-imga">
              <img src="Carros/abcdefg.png">
              <h1>SUVs</h1>
            </div>
          </div>
        </a>
        <a href="Modelos/Hatchers.php">
          <div class="featured-boxa">
            <div class="featured-imga">
              <img src="Carros/Hatchers.png">
              <h1>Hatchers</h1>
            </div>
          </div>
        </a>
        <a href="Modelos/Picapes.php">
          <div class="featured-boxa">
            <div class="featured-imga">
              <img src="Carros/Picapes.png">
              <h1>Picapes</h1>
            </div>
          </div>
        </a>
        <a href="Modelos/Eletricos.php">
          <div class="featured-boxa">
            <div class="featured-imga">
              <img src="Carros/Eletricos.png">
              <h1>Eletricos</h1>
            </div>
          </div>
        </a>
        <a href="Modelos/Sedans.php">
          <div class="featured-boxa">
            <div class="featured-imga">
              <img src="Carros/Sedans.png">
              <h1>Sedans</h1>
            </div>
          </div>
        </a>
        <a href="Modelos/Familia.php">
          <div class="featured-boxa">
            <div class="featured-imga">
              <img src="Carros/Familia.png">
              <h1>Familia</h1>
            </div>
          </div>
        </a>
        <a href="Modelos/Economicos.php">
          <div class="featured-boxa">
            <div class="featured-imga">
              <img src="Carros/Esportivos.png">
              <h1>Esportivos</h1>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
  <div class="containerconcea">
    <div class="top-titlea">
      <h3>Carros mais vistos</h3>
      <hr>
      <?php
      $carrosvis = "SELECT * FROM carros ORDER BY car_contagem desc LIMIT 4";
      $comando = mysqli_query($conn, $carrosvis);
      echo "<div class=rowa>";
      while ($row = mysqli_fetch_array($comando)) {
        $cod = $row['car_cod'];
        $marca = $row['car_marca'];
        $modelo = $row['car_modelo'];
        $tipo = $row['car_tipo'];
        $imagem = base64_encode($row['car_image']);
        $contagem = $row['car_contagem'];
        echo '<form action=carros.php method=post>
            <button class="featured-boxb">
            <div class="featured-imgb">
              <center><img class=perfil src=data:image/jpeg;base64,' . $imagem . '><br>
              <h1><font color=#004aad size=5>' . $marca . " " . $modelo . '</font></h1>
              <input type=hidden name=cod value=' . $cod . '>
            </div>
              
          </button>
          </form>';
      }
      echo "</div>";
      ?>
    </div>
  </div>

  <!--Rodapé-->
  <?php require "PHP/rodape.php";
  echo $_SESSION['rodape'];
  ?>
  <!--Rodapé Fechar-->
  <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js integrity=sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz crossorigin=anonymous></script>
</body>

</html>