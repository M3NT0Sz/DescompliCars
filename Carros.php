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
    foreach ($_SESSION['loginA'] as $codigo) {
        $codigousu = $codigo['cod'];
    }

    $cod = $_POST['cod'];
    $carro = "SELECT * FROM carros WHERE car_cod = $cod";
    $comando = mysqli_query($conn, $carro);
    while ($row = mysqli_fetch_array($comando)) {
        $cod = $row['car_cod'];
        $marca = $row['car_marca'];
        $modelo = $row['car_modelo'];
        $imagem = base64_encode($row['car_image']);

        echo "<center><img src='data:image/jpeg;base64,$imagem'><br>
            <h1><font color=#004aad>$marca $modelo</font></h1>
        </center>";
        echo "<div class=rowc>";
        $opniaocarro = "SELECT * FROM opnioes WHERE opn_carro='$modelo'";
        $abobora = mysqli_query($conn, $opniaocarro);
        while ($row = mysqli_fetch_array($abobora)) {
            $opiniao = $row['opn_opiniao'];
            $usuario = $row['opn_pessoa'];
            $codigofoto = $row['opn_codusu'];

            $imagemusu = "SELECT * FROM usuarios WHERE usu_cod='$codigofoto'";
            $comando = mysqli_query($conn, $imagemusu);
            while ($row = mysqli_fetch_array($comando)) {
                $imagemusua = base64_encode($row['usu_image']);
                echo "
            <div class=featured-boxc>
                <div class=featured-imgc>
                    <div class=ladoscar>
                        <div class=usuesquerda>";
                echo "<img class=perfil src='data:image/jpeg;base64,$imagemusua'>
                        <div class=nomeperfil>
                        <h1>$usuario</h1>
                        </div>
                        </div>
                        <div class=opidireita>
                            <div class=titulodireita>
                                <h1>Opinião</h1>
                            </div>
                            <div class=opiniao>
                                <textarea class=textoperfil disabled readonly>$opiniao</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ";
            }
        }
        echo "</div>";

        echo "<form action=PHP/opiniao.php method=post>";
        echo "<input type=hidden name=codigousu value=$codigousu>";
        echo "<input type=hidden name=codigocar value=$cod>";
        echo "<center><button class=button-6>Cadastrar opinião</button></center>
        </form>";
    }
    ?>
    <!--Rodapé-->
    <?php require "PHP/rodape.php";
    echo $_SESSION['rodape'];
    ?>
</body>

</html>