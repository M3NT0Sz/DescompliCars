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
    <link rel="stylesheet" href="CSS/perfils.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>DescompliCars</title>
</head>

<body>
    <!--MenuBar-->
    <?php require "PHP/verificar.php";
    echo $_SESSION['cima'];
    ?>
    <!--Fecha MenuBar-->
    <div class="lados">
        <div class="lado_di">
            <div class="coisas_di">
                <div class="nomeusu">
                    <h2><?php
                        foreach ($_SESSION['loginA'] as $codigo) {
                            $codigo = $codigo['cod'];
                        }
                        $imagem = "SELECT * FROM usuarios WHERE usu_cod=$codigo";
                        $comando = mysqli_query($conn, $imagem);
                        while ($row = mysqli_fetch_array($comando)) {
                            if (isset($_SESSION['login'])) {
                                $imagem = base64_encode($row['usu_image']);
                                echo "<center><img class=perfil src='data:image/jpeg;base64,$imagem'><br></center>";
                                echo $_SESSION['login'];
                            } else if (isset($_SESSION['edit'])) {
                                $imagem = base64_encode($row['usu_image']);
                                echo "<center><img class=perfil src='data:image/jpeg;base64,$imagem'><br></center>";
                                echo $_SESSION['edit'];
                            }
                        }
                        ?></h2>
                </div>
                <h2>
                <div class="restousu">
                    <form style="width:100%;" action="carrosVistos.php" method="post">
                            <a class="letrasusu" href="carrosVistos.php">
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
                                    echo "<input type=hidden name=codigo value=$codigo>";
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
                        <a class="letrasusu" href=PHP/sair.php>
                            <form action="PHP/sair.php" method="post">
                                Sair
                            </form>
                        </a>
                    </div>
                </h2>
            </div>
        </div>
        <?php
        error_reporting(0);
        $opinioes = "SELECT * FROM opnioes WHERE opn_codusu = '$codigo'";
        $abobrinha = mysqli_query($conn, $opinioes);
        while ($row = mysqli_fetch_array($abobrinha)) {
            $codigousu[] = $row['opn_codusu'];
        }
        if ($codigousu == 0 || sizeof($codigousu) <= 1) {
        ?>
            <div class="quadradoa" style="height: 650px;">
            <?php
        } else if (sizeof($codigousu) >= 3) {
            ?>
                <div class="quadradoa" style="height: auto;">
                <?php
            }
            echo "
        <div class=top-titlea>
        <h3>Opiniões</h3>
        <hr>
        <div class=rowc>";



            $opinioes = "SELECT * FROM opnioes WHERE opn_codusu = '$codigo'";
            $abobrinha = mysqli_query($conn, $opinioes);
            while ($row = mysqli_fetch_array($abobrinha)) {
                $codigoopn = $row['opn_cod'];
                $opiniao = $row['opn_opiniao'];
                $carro = $row['opn_carro'];
                $marca = $row['opn_marca'];
                $anomod = $row['opn_anomod'];
                $pros = $row['opn_pros'];
                $contra = $row['opn_contra'];

                echo "
            <div class=featured-boxd>
                <div class=featured-imgc>
                    <div class=ladoscar>
                        <div class=usuesquerda>";
                echo "<div class=nomeperfil>
                        <div style=display:flex;flex-direction:column;>
                        <h1>$marca $carro</h1>";
                $codigocarro = "SELECT * FROM carros WHERE car_modelo = '$carro'";
                $codiguin = mysqli_query($conn, $codigocarro);
                while ($row = mysqli_fetch_array($codiguin)) {
                    $codigos = $row['car_cod'];
                    echo "<form method=post action=Carros.php>
                        <input type=hidden name=cod value=$codigos>
                        <button class=button-6>Ver carro</button>
                        </form>";
                }
                echo "<div class=imagemmaluca style=display:flex;justify-content:center;align-items:center;flex-direction:row;>";
                echo "</div></div></div>
                        </div>
                        <div class=opidireita>
                            <div class=titulodireita>
                                <h1>Opinião</h1>
                            </div>
                            <form action=editComentario.php method=post>
                            <input type=hidden name=codigoopn value=$codigoopn>
                            <div class=opiniao>
                                <h5>".$opiniao."</h5>
                            </div>
                            <div class=titulodireita>
                                <h1>Prós</h1>
                            </div>
                            <div class=opiniao>
                                <h5>".$pros."</h5>
                            </div>
                            <div class=titulodireita>
                                <h1>Contra</h1>
                            </div>
                            <div class=opiniao>
                                <h5>".$contra."</h5>
                                <button class=button-6>Editar Comentario</button>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>";
                echo "</div>";
            }
            echo "</div>";
            echo "</div>";
            echo "</div>";
                ?>
                </div>
                <!--Rodapé-->
                <?php require "PHP/rodape.php";
                echo $_SESSION['rodape'];
                ?>
</body>

</html>