<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Imagens/DescomplicarsIcon.png" rel="icon">
    <link href="../css/style.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>DescompliCars</title>
</head>
<body>
<?php require "../PHP/marcas.php";
        echo $_SESSION['cima'];
    ?>
    <!--Fecha MenuBar-->
    <div class="slideshow-container">

        <div id="radio1" class="mySlides fade">
          <img src="../imgLogosECarros/RAM/RAMLogo.png" style="width:auto; height:400px;">
        </div>
        
        <div id="radio2" class="mySlides fade">
          <img src="../imgLogosECarros/RAM/carro1.png" style="width:auto; height: 400px;;">
        </div>
        
        <div id="radio3" class="mySlides fade">
          <img src="../imgLogosECarros/RAM/carro2.png" style="width:auto; height: 400px;;">
        </div>
        
        <div id="radio4" class="mySlides fade">
          <img src="../imgLogosECarros/RAM/carro3.png" style="width:auto; height: 400px;;">
        </div>
        
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
        
        </div>
        <?php
  $caraudi = "SELECT * FROM carros WHERE car_marca like 'RAM'";
  $comando = mysqli_query($conn, $caraudi);
  echo "<div class=rowb>";
    while ($row = mysqli_fetch_array($comando)) {
      $marca = $row['car_marca'];
      $modelo = $row['car_modelo'];
      $anomod = $row['car_anomod'];
      $anofab = $row['car_anofab'];
      $versao = $row['car_versao'];
      $tipo = $row['car_tipo'];
      $imagem = base64_encode($row['car_image']);
      echo "<a href=Modelos/Familia.php><div class=featured-boxb>
          <div class=featured-imgb>
              <img src='data:image/jpeg;base64,$imagem'>
              <h1>$marca</h1>
              <h1>$modelo</h1>
              <h1>$anomod</h1>
              <h1>$anofab</h1>
              <h1>$versao</h1>
              <h1>$tipo</h1>
          </div>";
          echo "</div></a>";
    }
    echo "</div>";
  ?>
    <!--Rodapé-->
    <?php require "../PHP/rodape2.php";
        echo $_SESSION['rodape'];
    ?>
    <!--Rodapé Fechar-->
    <script src="../Java/script.js"></script>
    <script src="../Java/app.js"></script>
    <script>
      setInterval(() => {
        plusSlides(1)
      }, 5000);
    </script>
</body>
</html>