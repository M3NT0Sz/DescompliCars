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
    <link href="../css/style.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>DescompliCars</title>
</head>
<body>
    <!--MenuBar-->
    <?php require "../PHP/marcas.php";
        echo $_SESSION['cima'];
    ?>
    <!--Fecha MenuBar-->
    <!--Rodapé-->
    <?php require "../PHP/rodape2.php";
        echo $_SESSION['rodape'];
    ?>
    <!--Rodapé Fechar-->
</body>
</html>