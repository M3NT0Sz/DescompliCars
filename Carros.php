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
    <?php
    $cod = $_POST['cod'];
    $carro = "SELECT * FROM carros WHERE car_cod = $cod";
    $comando = mysqli_query($conn, $carro);
    while ($row = mysqli_fetch_array($comando)) {
        $marca = $row['car_marca'];
        $modelo = $row['car_modelo'];
        $anomod = $row['car_anomod'];
        $anofab = $row['car_anofab'];
        $versao = $row['car_versao'];
        $tipo = $row['car_tipo'];
        $imagem = base64_encode($row['car_image']);

        echo "<center><img src='data:image/jpeg;base64,$imagem'><br>
            <h1><font color=#004aad>$marca $modelo</font></h1>
        </center>";
    }
    ?>
    <!--Rodapé-->
    <?php require "PHP/rodape.php";
    echo $_SESSION['rodape'];
    ?>
</body>

</html>