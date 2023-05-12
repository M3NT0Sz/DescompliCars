<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="Imagens/DescomplicarsIcon.png" rel="icon">
    <link href="css/style.css" rel="stylesheet">
    <link href="CSS/carros.css" rel="stylesheet">
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

    <?php
    $cod = $_POST['cod'];
    $usu = "SELECT * FROM usuarios WHERE usu_cod='$cod'";
    $abobora = mysqli_query($conn, $usu);
    while ($row = mysqli_fetch_array($abobora)) {
        $imagem = base64_encode($row['usu_image']);
        $nome = $row['usu_nome'];
        $sobrenome = $row['usu_sobrenome'];
        echo "<div class=top-titlea>";
        echo "<img style='width:200px;height:200px;border-radius:40px;margin-top:20px;border-color:#004aad;border-style:solid;' src='data:image/jpeg;base64,$imagem'>";
        echo "<font color='#004aad'><h1>".$nome. " ".$sobrenome."</h1></font>";
        echo "<h3>Opiniões</h3>
        <hr>
        <div class=rowc>";
        $usuarios = "SELECT * FROM opnioes WHERE opn_codusu='$cod'";
        $comando = mysqli_query($conn, $usuarios);
        while ($row = mysqli_fetch_array($comando)) {
            $opiniao = $row['opn_opiniao'];
            $carro = $row['opn_carro'];
            $marca = $row['opn_marca'];
            $avaliacao = $row['opn_avaliacao'];
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
                        <h1>$marca $carro</h1>
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

                $codigocarro = "SELECT * FROM carros WHERE car_modelo = '$carro'";
                $codiguin = mysqli_query($conn, $codigocarro);
                while ($row = mysqli_fetch_array($codiguin)) {
                    $codigos = $row['car_cod'];
                    echo "<form method=post action=Carros.php>
                        <input type=hidden name=cod value=$codigos>
                        <button class=button-6>Ver carro</button>
                        </form>";
                }

            echo "</div></div>
                        </div>
                        <div class=opidireita>
                            <div class=titulodireita>
                                <h1>Opinião</h1>
                            </div>
                            <center>
                            <div class=opiniao style=margin-bottom:10px;display:flex;align-items:center;justify-content:center;>
                                <h6>$opiniao</h6>
                            </div>
                            <div class=titulodireita>
                                <h1>Prós</h1>
                            </div>
                            <div class=opiniao style=margin-bottom:10px;>
                                <h6>$pros</h6>
                            </div>
                            <div class=titulodireita>
                                <h1>Contra</h1>
                            </div>
                            <div class=opiniao style=margin-bottom:10px;>
                                <h6>$contra</h6>
                            </div>
                            </center>
                        </div>
                    </div>
                </div>";
            echo "</div>";
        }
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    ?>

    <!--Rodapé-->
    <?php require "PHP/rodape.php";
    echo $_SESSION['rodape'];
    ?>
    <!--Rodapé Fechar-->
</body>

</html>