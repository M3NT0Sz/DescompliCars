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
    <link href="CSS/carros.css" rel="stylesheet">
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
                        if (isset($_SESSION['login'])) {
                            foreach ($_SESSION['loginA'] as $codigo) {
                                $codigo = $codigo['cod'];
                            }
                            $imagem = "SELECT * FROM usuarios WHERE usu_cod=$codigo";
                            $comando = mysqli_query($conn, $imagem);
                            while ($row = mysqli_fetch_array($comando)) {
                                $codigousu = $row['usu_cod'];
                                $imagem = base64_encode($row['usu_image']);
                                echo "<center><img class=perfil style='width:100px;height:100px;' src='data:image/jpeg;base64,$imagem'><br></center>";
                            }
                            echo $_SESSION['login'];
                        } else if (isset($_SESSION['edit'])) {
                            foreach ($_SESSION['loginA'] as $codigo) {
                                $codigo = $codigo['cod'];
                            }
                            $imagem = "SELECT * FROM usuarios WHERE usu_cod=$codigo";
                            $comando = mysqli_query($conn, $imagem);
                            while ($row = mysqli_fetch_array($comando)) {
                                $imagem = base64_encode($row['usu_image']);
                                echo "<center><img style='width:100px;height:100px;' class=perfil src='data:image/jpeg;base64,$imagem'><br></center>";
                            }
                            echo $_SESSION['edit'];
                        }
                        ?></h2>
                </div>
                <h2>
                    <div class="restousu">
                        <form style="width:100%;" action="Perfil.php" method="post">
                            <a class="letrasusu" href="Perfil.php">
                                <div>
                                    <?php
                                    foreach ($_SESSION['loginA'] as $codigo) {
                                        $codigo = $codigo['cod'];
                                        echo "<input type=hidden name=codigo value=$codigo>";
                                    }
                                    ?>
                                    Carros Vistos
                                </div>
                            </a>
                        </form>
                        <form style="width:100%;" action="editarPerfil.php" method="post">
                            <a class="letrasusu" href="editarPerfil.php">
                                <div>
                                    <?php
                                    foreach ($_SESSION['loginA'] as $codigo) {
                                        $codigo = $codigo['cod'];
                                        echo "<input type=hidden name=codigo value=$codigo>";
                                    }
                                    ?>
                                    Editar Perfil
                                </div>
                            </a>
                        </form>
                        <form style="width:100%;" action="comentarios.php" method="post">
                            <a class="letrasusu" href="comentarios.php">
                                <div>
                                    Comentarios
                                </div>
                            </a>
                        </form>
                        <?php
                        if ($codigo == 1 || $codigo == 2) {
                        ?>
                            <form action="usutudo.php" style="width:100%;" method="post">
                                <a class="letrasusu" href="usutudo.php">
                                    <div>
                                        Ver Usuarios
                                    </div>
                                </a>
                            </form>
                        <?php
                        } else {
                        }
                        ?>
                        <a class="letrasusu" href=PHP/sair.php>
                            <form action="PHP/sair.php" method="post">
                                Sair
                            </form>
                        </a>
                        <?php
                        if (isset($_SESSION['editado'])) {
                            echo "<h3><center>".$_SESSION['editado']."</center></h3>";
                            unset($_SESSION['editado']);
                        }
                        ?>
                        <?php
                        //mostrando a msg de login e senha inválidos!
                        if (isset($_SESSION['msgC'])) {
                            echo "<h3><center>".$_SESSION['msgC']."</center></h3>";
                            unset($_SESSION['msgC']);
                        }
                        ?>

                    </div>
                </h2>
            </div>
        </div>
        <div style="display:flex;justify-content:center;align-items:center;text-align:center;flex-direction:column;width:100%;margin-top:20px;">
            <?php
            if (isset($_SESSION['login'])) {
                if ($codigousu == "1" || $codigousu == "2") {
            ?>
                    <div class="quadradoa">
                        <div class="quadrado">
                            <a href="CadastroCar.php">
                                <div class="quad">
                                    <img src="Imagens/Pergunta/Supra.png">
                                    <h3>Vai colocar sua opinião sobre algum carro?</h3>
                                </div>
                            </a>
                        </div>
                        <div class="quadrado">
                            <a href="CadastroMarca.php">
                                <div class="quad">
                                    <img src="Imagens/Pergunta/Supra.png">
                                    <h3>Cadastrar Marcas</h3>
                                </div>
                            </a>
                        </div><br>
                        <div class="quadrado">
                            <a href="CadastroEspi.php">
                                <div class="quad">
                                    <img src="Imagens/Pergunta/Supra.png">
                                    <h3>Cadastrar especificacoes</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <font color="#004aad">
                        <h1>Carros Vistos</h1>
                    </font>
                    <hr>
            <?php
                    echo "<div class=containerconcea style=flex-direction:row;display:flex;>";
                    echo "<div class=rowb style=flex-direction:row;display:flex;>";
                    $visto = "SELECT * FROM car_visto WHERE carv_perfilcod = '$codigo'";
                    $pao = mysqli_query($conn, $visto);
                    while ($batata = mysqli_fetch_array($pao)) {
                        $codusu = $batata['carv_perfilcod'];
                        $codcar = $batata['carv_carcod'];
                        $procurar = "SELECT * FROM carros WHERE car_cod = '$codcar'";
                        $comando = mysqli_query($conn, $procurar);
                        while ($row = mysqli_fetch_array($comando)) {
                            $cod = $row['car_cod'];
                            $marca = $row['car_marca'];
                            $modelo = $row['car_modelo'];
                            $tipo = $row['car_tipo'];
                            $imagemcar = base64_encode($row['car_image']);

                            echo "
                        <form action=carros.php method=post>
                            <button class=featured-boxb>
                                <div class=featured-imgb>
                                <img src='data:image/jpeg;base64,$imagemcar'>
                                <center><font color=#004aad size=5><h1>$marca $modelo</h1></font></center>
                                <input type=hidden name=cod value=$cod>
                            </button>
                        </form>";
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
    </div>
    </div>
    <?php require "PHP/rodape.php";
    echo $_SESSION['rodape'];
    ?>
</body>

</html>