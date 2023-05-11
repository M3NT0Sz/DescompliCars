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
    error_reporting(0);
    if (isset($_SESSION['login'])) {
        foreach ($_SESSION['loginA'] as $codigo) {
            $codigousu = $codigo['cod'];
        }
    }
    if (isset($_SESSION['codigocarro'])) {
        $cod = $_SESSION['codigocarro'];
        unset($_SESSION['codigocarro']);
    } else {
        $cod = $_POST['cod'];
    }
    $carro = "SELECT * FROM carros WHERE car_cod = $cod";
    $comando = mysqli_query($conn, $carro);
    while ($row = mysqli_fetch_array($comando)) {
        $modelo = $row['car_modelo'];
        $opniaocarro = "SELECT * FROM opnioes WHERE opn_carro='$modelo'";
        $abobora = mysqli_query($conn, $opniaocarro);
        while ($row = mysqli_fetch_array($abobora)) {
            $avalia[] = $row['opn_avaliacao'];
        }
        if ($avalia != "") {
            $soma = 0;
            foreach ($avalia as $avalias) {
                $soma = $soma + $avalias;
            }
            $media = $soma / count($avalia);
            $media = substr($media, 0, 1);
        } else {
            $media = 0;
        }
    }

    $carro = "SELECT * FROM carros WHERE car_cod = $cod";
    $carros = mysqli_query($conn, $carro);
    while ($row = mysqli_fetch_array($carros)) {
        $cod = $row['car_cod'];
        $marca = $row['car_marca'];
        $modelo = $row['car_modelo'];
        $contagem = $row['car_contagem'];

        $soma = 1 + $contagem;
        $contagens = "UPDATE carros SET car_contagem = '$soma' WHERE car_cod = '$cod'";
        $comando = mysqli_query($conn, $contagens);
        if (mysqli_affected_rows($conn)) {
        } else {
        }
        $imagem = base64_encode($row['car_image']);

        echo "<center><img src='data:image/jpeg;base64,$imagem'><br>
            <h1><font color=#004aad>$marca $modelo</font></h1>
            <div class=estrelas>";
        if ($media == "1") {
            echo "
                        <img src=Imagens/star1.png id=s1>
                
                        <img src=Imagens/star0.png id=s2>
                
                        <img src=Imagens/star0.png id=s3>
                
                        <img src=Imagens/star0.png id=s4>
                
                        <img src=Imagens/star0.png id=s5>";
        } else if ($media == "2") {
            echo "
                        <img src=Imagens/star1.png id=s1>
                
                        <img src=Imagens/star1.png id=s2>
                
                        <img src=Imagens/star0.png id=s3>
                
                        <img src=Imagens/star0.png id=s4>
                
                        <img src=Imagens/star0.png id=s5>";
        } else if ($media == "3") {
            echo "
                        <img src=Imagens/star1.png id=s1>
                
                        <img src=Imagens/star1.png id=s2>
                
                        <img src=Imagens/star1.png id=s3>
                
                        <img src=Imagens/star0.png id=s4>
                
                        <img src=Imagens/star0.png id=s5>";
        } else if ($media == "4") {
            echo "
                        <img src=Imagens/star1.png id=s1>
                
                        <img src=Imagens/star1.png id=s2>
                
                        <img src=Imagens/star1.png id=s3>
                
                        <img src=Imagens/star1.png id=s4>
                
                        <img src=Imagens/star0.png id=s5>";
        } else if ($media == "5") {
            echo "
                        <img src=Imagens/star1.png id=s1>
                
                        <img src=Imagens/star1.png id=s2>
                
                        <img src=Imagens/star1.png id=s3>
                
                        <img src=Imagens/star1.png id=s4>
                
                        <img src=Imagens/star1.png id=s5>";
        }
        echo "</div></center>";
        echo "<div class=rowc>";

        $opniaocarro = "SELECT * FROM opnioes WHERE opn_carro='$modelo'";
        $abobora = mysqli_query($conn, $opniaocarro);
        while ($row = mysqli_fetch_array($abobora)) {
            $codigoopn = $row['opn_cod'];
            $opiniao = $row['opn_opiniao'];
            $usuario = $row['opn_pessoa'];
            $codigofoto = $row['opn_codusu'];
            $avaliacao = $row['opn_avaliacao'];
            $avalia[] = $row['opn_avaliacao'];
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
                        <div class=nomeperfil>";


                echo "<h1>$usuario</h1>";
                echo "</div>
                        <div class=imagemmaluca style=display:flex;flex-direction:row;>";

                if ($avaliacao == "1") {
                    echo "
                            <img src=Imagens/star1.png id=s1>
                    
                            <img src=Imagens/star0.png id=s2>
                    
                            <img src=Imagens/star0.png id=s3>
                    
                            <img src=Imagens/star0.png id=s4>
                    
                            <img src=Imagens/star0.png id=s5>";
                } else if ($avaliacao == "2") {
                    echo "
                            <img src=Imagens/star1.png id=s1>
                    
                            <img src=Imagens/star1.png id=s2>
                    
                            <img src=Imagens/star0.png id=s3>
                    
                            <img src=Imagens/star0.png id=s4>

                            <img src=Imagens/star0.png id=s5>";
                } else if ($avaliacao == "3") {
                    echo "
                            <img src=Imagens/star1.png id=s1>
                    
                            <img src=Imagens/star1.png id=s2>
                    
                            <img src=Imagens/star1.png id=s3>
                    
                            <img src=Imagens/star0.png id=s4>

                            <img src=Imagens/star0.png id=s5>";
                } else if ($avaliacao == "4") {
                    echo "
                            <img src=Imagens/star1.png id=s1>
                    
                            <img src=Imagens/star1.png id=s2>
                    
                            <img src=Imagens/star1.png id=s3>

                            <img src=Imagens/star1.png id=s4>
                    
                            <img src=Imagens/star0.png id=s5>";
                } else if ($avaliacao == "5") {
                    echo "
                            <img src=Imagens/star1.png id=s1>
                    
                            <img src=Imagens/star1.png id=s2>
                    
                            <img src=Imagens/star1.png id=s3>
                    
                            <img src=Imagens/star1.png id=s4>
                    
                            <img src=Imagens/star1.png id=s5>";
                } else if ($avaliacao == "0") {
                    echo "
                            <img src=Imagens/star0.png id=s1>
                    
                            <img src=Imagens/star0.png id=s2>
                    
                            <img src=Imagens/star0.png id=s3>
                    
                            <img src=Imagens/star0.png id=s4>
                    
                            <img src=Imagens/star0.png id=s5>";
                }
                echo "</div>";
                echo "<center>";
                echo "<form action=Perfilusu.php method=post>";
                echo "<input type=hidden name=cod value='$codigofoto'>";
                echo "<button class=button-6>Ver perfil</button>";
                echo "</form>";
                echo "</center>";
                if ($codigousu == 1 || $codigousu == 2) {
                    echo "<form method=post action=PHP/deletarcomentario.php>";
                    echo "<input type=hidden name=codcomentario value=$codigoopn>";
                    echo "<button>Excluir</button>";
                    echo "</form>";
                }

                echo "</div>
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

        echo "<form action=PHP/verificarlog.php method=post>";
        if (isset($_SESSION['login'])) {
            echo "<input type=hidden name=codigousu value=$codigousu>";
        }
        echo "<input type=hidden name=codigocar value=$cod>";
        echo "<center><button class=button-6>Cadastrar opinião</button></center>";
        echo "</form>";
        $marcas = "SELECT * FROM marcas WHERE mar_nome = '$marca'";
        $comando = mysqli_query($conn, $marcas);
        while ($row = mysqli_fetch_array($comando)) {
            $codigocarros = $row['mar_cod'];
            echo "<form action=marcas.php method=post>";
            echo "<center><input type=hidden name=cod value='$codigocarros'><button type=submit class=button-6>Voltar</button></center>";
            echo "</form>";
        }
    }
    ?>
    <!--Rodapé-->
    <?php require "PHP/rodape.php";
    echo $_SESSION['rodape'];
    ?>
</body>

</html>