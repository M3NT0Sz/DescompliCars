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
        $cod = $row['car_cod'];
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
        echo "<div class=rowc>";
        $opniaocarro = "SELECT * FROM opnioes WHERE opn_carro='$modelo'";
        $comando = mysqli_query($conn, $opniaocarro);
        while ($row = mysqli_fetch_array($comando)) {
            $opiniao = $row['opn_opiniao'];
            $usuario = $row['opn_pessoa'];

            echo "
            <div class=featured-boxc>
                <div class=featured-imgc>
                    <div class=ladoscar>
                        <div class=usuesquerda>
                            <h1>$usuario</h1>
                        </div>
                        <div class=opidireita>
                            <div class=titulodireita>
                                <h1>Opinião</h1>
                            </div>
                            <div class=opiniao>
                                $opiniao
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ";
        }
        echo "</div>";

        echo "<form action=PHP/opiniao.php method=post>";
        foreach ($_SESSION['loginA'] as $codigo) {
            $codigo = $codigo['cod'];
            echo "<input type=hidden name=codigousu value=$codigo>";
        }
        echo "<input type=hidden name=codigocar value=$cod>";
        echo "<button class=button-6>Cadastrar opinião</button>
        </form>";
    }
    ?>
    <!--Rodapé-->
    <?php require "PHP/rodape.php";
    echo $_SESSION['rodape'];
    ?>
</body>

</html>