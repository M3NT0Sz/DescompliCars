<?php
  include_once("PHP/conexao.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <link href="Imagens/DescomplicarsIcon.png" rel="icon">
    <link href="CSS/style.css" rel="stylesheet">
    <link href="CSS/pergunta.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DescompliCars</title>
</head>
<body>
    <!--MenuBar-->
    <?php require "PHP/verificar.php";
        echo $_SESSION['cima'];
    ?>
    <!--Fecha MenuBar-->
    <div style="text-align: center; margin-top: 10px; font-size: 35px;">
    <?php
                //mostrando a msg de login e senha inválidos!
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                    }
                ?>
    </div>
    <div class="quadrado">
        <a href="CadastroCar.php">
            <div class="quad">
                <img src="Imagens/Pergunta/Supra.png">
                <h3>Vai colocar opinião sobre o seu carro?</h3>
            </div>
        </a>
        <a href="Perfil.php">
            <div class="quad">
                <img src="Imagens/Pergunta/R34.png">
                <h3>Vai olhar as opiniões?</h3>
            </div>
        </a>
    </div>
    <!--Rodapé-->
    <?php require "PHP/rodape.php";
        echo $_SESSION['rodape'];
    ?>
    <!--Rodapé Fechar-->
</body>
</html>