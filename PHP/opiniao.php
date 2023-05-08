<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../CSS/style.css" rel="stylesheet">
    <link href="../CSS/opiniao.css" rel="stylesheet">
    <link href="../CSS/carros.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    include_once("conexao.php");
    $codcar = $_POST['codigocar'];
    $codusu = $_POST['codigousu'];
    $carro = "SELECT * FROM carros WHERE car_cod='$codcar'";
    $comando = mysqli_query($conn, $carro);
    while ($row = mysqli_fetch_array($comando)) {
        $marca = $row['car_marca'];
        $modelo = $row['car_modelo'];
        echo "<form action=proc_cadopiniao.php method=post>
        <input type=text name=marca value='$marca'>
        <input type=hidden name=codusu value='$codusu'>
        <input type=text name=modelo value='$modelo'>
        <textarea type=text class=tamanhoinput name=opiniao maxlength=1000></textarea>
        <button class=button-6>Cadastrar Opinião</button>
        <a href=../index.php><button type=button class=button-6>Voltar</button></a>
        </form>";
    }
    ?>
</body>

</html>