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
        $tipo = $row['car_tipo'];
        $imagem = base64_encode($row['car_image']);
        echo "<form action=../carros.php method=post>
        <button class=featured-boxb>
          <div class=featured-imgb>
              <img src='data:image/jpeg;base64,$imagem'>
              <font size='5px' color=#004aad>" . $marca . " " . $modelo . "</font>
              <input type=hidden name=cod value=$cod>
          </div>";
        echo "</button></form>";
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