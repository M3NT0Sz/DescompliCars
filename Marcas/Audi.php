<?php
    include_once("../PHP/conexao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Imagens/DescomplicarsIcon.png" rel="icon">
    <link href="../CSS/style.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>DescompliCars</title>
</head>
<body>
    <!--MenuBar-->
    <?php require "../PHP/marcas.php";
        echo $_SESSION['cima'];
    ?>
    <!--Fecha MenuBar-->
    <!--Imagens-->
    <div class="slideshow-container">

        <div id="radio1" class="mySlides fade">
          <img src="../imgLogosECarros/Audi/AudiLogo.png" class="imgLogos">
        </div>
        
        <div id="radio2" class="mySlides fade">
          <img src="../imgLogosECarros/Audi/A3Audi.png" style="width:auto; height:500px;">
        </div>
        
        <div id="radio3" class="mySlides fade">
          <img src="../imgLogosECarros/Audi/Q3Audi.png" style="width:auto; height:500px;">
        </div>
        
        <div id="radio4" class="mySlides fade">
          <img src="../imgLogosECarros/Audi/R8Audi.png" style="width:auto; height:500px;">
        </div>
        
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
        
        </div>
        <br>
        <!--Imagens Fecha-->
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