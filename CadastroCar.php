<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <link href="Imagens/DescomplicarsIcon.png" rel="icon">
    <link href="CSS/style.css" rel="stylesheet">
    <link href="CSS/cadastrocar.css" rel="stylesheet">
    <link href="CSS/testecad.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DescompliCars</title>
</head>
<body onload="esconderMod(); esconderAnoMod(); esconderAnoFab(); esconderVersao();">
    <!--MenuBar-->
    <?php require "PHP/verificar.php";
        echo $_SESSION['cima'];
    ?>
    <!--Fecha MenuBar-->
    <div class="cadquad">
        <div class="cadquadrado">
            <h1>Cadastre seu veiculo</h1>
            <form method="post" action="PHP/cadcar.php">
                <div class=caddeita>
                <?php require "CadPHP/marca.php";
                    echo $_SESSION['marca'];
                ?>
                </div>
                <div class=caddeita id=cadmod>
                <?php require "CadPHP/modelo.php";
                    echo $_SESSION['modelo'];
                ?>
                </div>
                <div class=caddeita id="cadanomod">
                <?php require "CadPHP/anomodelo.php";
                    echo $_SESSION['anomod'];
                ?>
                </div>
                <div class=caddeita id="cadanofab">
                <?php require "CadPHP/anofabri.php";
                    echo $_SESSION['anofab'];
                ?>
                </div>
                <div class=caddeita id="cadversao">
                <?php require "CadPHP/versao.php";
                    echo $_SESSION['versao'];
                ?>
                </div>
                <button class="button-6">Cadastrar</button>
            </form>
        </div>
    </div>
    <!--Rodapé-->
    <?php require "PHP/rodape.php";
        echo $_SESSION['rodape'];
    ?>
    <!--Rodapé Fechar-->
    <script src="JS/cadcarros.js"></script>
</body>
</html>