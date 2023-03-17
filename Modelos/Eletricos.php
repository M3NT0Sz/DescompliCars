<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../Imagens/DescomplicarsIcon.png" rel="icon">
    <link href="../css/style.css" rel="stylesheet">
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
    <!--Rodapé-->
    <?php require "PHP/rodape.php";
        echo $_SESSION['rodape'];
    ?>
    <!--Rodapé Fechar-->
</body>
</html>