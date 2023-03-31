<?php
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="Imagens/DescomplicarsIcon.png" rel="icon">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/perfils.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DescompliCars</title>
</head>
<body>
    <?php require "PHP/verificar.php";
        echo $_SESSION['cima'];
    ?>

    <div class="lados">
        <div class="lado_di">
            <div class="coisas_di">
                <div class="nomeusu">
                <h2><?php
                    echo $_SESSION['login'];
                ?></h2>
                </div>
                <h2><div class="restousu">
                    <a class="letrasusu" href="Perfil.php">
                            <div>
                                Voltar
                            </div>
                        </a>
                    <a class="letrasusu" href=PHP/sair.php><form action="PHP/sair.php" method="post">
                        Sair
                    </form></a>
                    <?php
                //mostrando a msg de login e senha inválidos!
                    if(isset($_SESSION['msgC']))
                    {
                        echo $_SESSION['msgC'];
                        unset($_SESSION['msgC']);
                    }
                ?>

                </div></h2>    
            </div>
        </div>
        <div class="quadrado">
        <a href="CadastroCar.php">
            <div class="quad">
                <img src="Imagens/Pergunta/Supra.png">
                <h3>Vai colocar opinião sobre o seu carro?</h3>
            </div>
        </a>
        </div>
    </div>
    <?php require "PHP/rodape.php";
        echo $_SESSION['rodape'];
    ?>
</body>
</html>