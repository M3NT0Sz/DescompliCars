<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../Imagens/DescomplicarsIcon.png" rel="icon">
  <link href="../CSS/style.css" rel="stylesheet">
  <link href="../CSS/carros.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>DescompliCars</title>
</head>

<body>
  <!--MenuBar-->
  <?php require "../PHP/marcas.php";
  echo $_SESSION['cima'];
  ?>
  <!--Fecha MenuBar-->
  <div class="slideshow-container">

    <div id="radio1" class="mySlides fade">
      <img src="../imgLogosECarros/BMW/Logo-Bmw.png" style="width:auto; height:400px;">
    </div>

    <div id="radio2" class="mySlides fade">
      <img src="../imgLogosECarros/BMW/320iBMW.png" style="width:auto; height: 400px;;">
    </div>

    <div id="radio3" class="mySlides fade">
      <img src="../imgLogosECarros/BMW/XBMW.png" style="width:auto; height: 400px;;">
    </div>

    <div id="radio4" class="mySlides fade">
      <img src="../imgLogosECarros/BMW/BMWCae.png" style="width:auto; height: 400px;;">
    </div>

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>

  </div>
  <?php
  echo "<div class=containerconcea>
    <div class=top-titlea>
      <h3>Sedans</h3>
      <hr>";
  $carsedan = "SELECT * FROM carros WHERE car_marca like 'BMW' and car_tipo like 'Sedans'";
  $comando = mysqli_query($conn, $carsedan);
  echo "<div class=rowb>";
  while ($row = mysqli_fetch_array($comando)) {
    $cod = $row['car_cod'];
    $marca = $row['car_marca'];
    $modelo = $row['car_modelo'];
    $anomod = $row['car_anomod'];
    $anofab = $row['car_anofab'];
    $versao = $row['car_versao'];
    $tipo = $row['car_tipo'];
    $imagem = base64_encode($row['car_image']);
    echo "<div class=featured-boxb>
          <div class=featured-imgb>
          <form action=../carros.php method=post>
              <img src='data:image/jpeg;base64,$imagem'>
              <h1>$marca</h1>
              <h1>$modelo</h1>
              <h1>$anomod</h1>
              <h1>$anofab</h1>
              <h1>$versao</h1>
              <h1>$tipo</h1>
              <input type=hidden name=cod value=$cod>
              <button>Ver Opniões</button>
              </form>
              <form method=post action=../PHP/procexcluir.php>
              <input type=hidden name=cod value=$cod>
              <button>Excluir</button>
              </form>
              <form method=post action=../PHP/proceditcar.php>
              <input type=hidden name=cod value=$cod>
              <button>Editar</button>
              </form>
          </div>";
    echo "</div>";
  }
  echo "</div>
    </div>
    </div>";

  echo "<div class=containerconcea>
    <div class=top-titlea>
      <h3>Hatchers</h3>
      <hr>";
  $carhatchers = "SELECT * FROM carros WHERE car_marca like 'BMW' and car_tipo like 'Hatchers'";
  $comando = mysqli_query($conn, $carhatchers);
  echo "<div class=rowb>";
  while ($row = mysqli_fetch_array($comando)) {
    $cod = $row['car_cod'];
    $marca = $row['car_marca'];
    $modelo = $row['car_modelo'];
    $anomod = $row['car_anomod'];
    $anofab = $row['car_anofab'];
    $versao = $row['car_versao'];
    $tipo = $row['car_tipo'];
    $imagem = base64_encode($row['car_image']);
    echo "<div class=featured-boxb>
    <div class=featured-imgb>
    <form action=../carros.php method=post>
        <img src='data:image/jpeg;base64,$imagem'>
        <h1>$marca</h1>
        <h1>$modelo</h1>
        <h1>$anomod</h1>
        <h1>$anofab</h1>
        <h1>$versao</h1>
        <h1>$tipo</h1>
        <input type=hidden name=cod value=$cod>
        <button>Ver Opniões</button>
        </form>
              <input type=hidden name=cod value=$cod>
              </form>
              <form method=post action=../PHP/proceditcar.php>
              <input type=hidden name=cod value=$cod>
              <button>Editar</button>
              </form>
          </div>";
    echo "</div></a>";
  }
  echo "</div>
    </div>
    </div>";

  echo "<div class=containerconcea>
    <div class=top-titlea>
      <h3>SUVs</h3>
      <hr>";
  $carsuvs = "SELECT * FROM carros WHERE car_marca like 'BMW' and car_tipo like 'SUVs'";
  $comando = mysqli_query($conn, $carsuvs);
  echo "<div class=rowb>";
  while ($row = mysqli_fetch_array($comando)) {
    $cod = $row['car_cod'];
    $marca = $row['car_marca'];
    $modelo = $row['car_modelo'];
    $anomod = $row['car_anomod'];
    $anofab = $row['car_anofab'];
    $versao = $row['car_versao'];
    $tipo = $row['car_tipo'];
    $imagem = base64_encode($row['car_image']);
    echo "<div class=featured-boxb>
    <div class=featured-imgb>
    <form action=../carros.php method=post>
        <img src='data:image/jpeg;base64,$imagem'>
        <h1>$marca</h1>
        <h1>$modelo</h1>
        <h1>$anomod</h1>
        <h1>$anofab</h1>
        <h1>$versao</h1>
        <h1>$tipo</h1>
        <input type=hidden name=cod value=$cod>
        <button>Ver Opniões</button>
        </form>
              <form method=post action=../PHP/proceditcar.php>
              <input type=hidden name=cod value=$cod>
              <button>Editar</button>
              </form>
          </div>";
    echo "</div></a>";
  }
  echo "</div>
    </div>
    </div>";

  echo "<div class=containerconcea>
    <div class=top-titlea>
      <h3>Eletricos</h3>
      <hr>";
  $careletrico = "SELECT * FROM carros WHERE car_marca like 'BMW' and car_tipo like 'Eletricos'";
  $comando = mysqli_query($conn, $careletrico);
  echo "<div class=rowb>";
  while ($row = mysqli_fetch_array($comando)) {
    $cod = $row['car_cod'];
    $marca = $row['car_marca'];
    $modelo = $row['car_modelo'];
    $anomod = $row['car_anomod'];
    $anofab = $row['car_anofab'];
    $versao = $row['car_versao'];
    $tipo = $row['car_tipo'];
    $imagem = base64_encode($row['car_image']);
    echo "<div class=featured-boxb>
    <div class=featured-imgb>
    <form action=../carros.php method=post>
        <img src='data:image/jpeg;base64,$imagem'>
        <h1>$marca</h1>
        <h1>$modelo</h1>
        <h1>$anomod</h1>
        <h1>$anofab</h1>
        <h1>$versao</h1>
        <h1>$tipo</h1>
        <input type=hidden name=cod value=$cod>
        <button>Ver Opniões</button>
        </form>
              <form method=post action=../PHP/proceditcar.php>
              <input type=hidden name=cod value=$cod>
              <button>Editar</button>
              </form>
          </div>";
    echo "</div></a>";
  }
  echo "</div>
    </div>
    </div>";
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