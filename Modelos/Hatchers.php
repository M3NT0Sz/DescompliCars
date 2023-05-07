<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../Imagens/DescomplicarsIcon.png" rel="icon">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/carros.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DescompliCars</title>
</head>
<body>
    <!--MenuBar-->
    <?php require "../PHP/marcas.php";
        echo $_SESSION['cima'];
    ?>
    <!--Fecha MenuBar-->
    <?php
    echo "<div class=containerconcea>
    <div class=top-titlea>
      <h3>Hatchers</h3>
      <hr>";
    $car = "SELECT * FROM carros WHERE car_tipo like 'Hatchers'";
    $comando = mysqli_query($conn, $car);
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
        echo "<a href=Modelos/Familia.php><div class=featured-boxb>
          <div class=featured-imgb>
              <img src='data:image/jpeg;base64,$imagem'>
              <h1>$marca</h1>
              <h1>$modelo</h1>
              <h1>$anomod</h1>
              <h1>$anofab</h1>
              <h1>$versao</h1>
              <h1>$tipo</h1>
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
</body>
</html>