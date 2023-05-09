<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../CSS/style.css" rel="stylesheet">
    <link href="../CSS/opiniao.css" rel="stylesheet">
    <link href="../CSS/carros.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DescompliCars</title>
</head>

<body>
    <!--MenuBar-->
    <?php require "marcas.php";
        echo $_SESSION['cima'];
    ?>
    <!--Fecha MenuBar-->
    <div class="quadradoa">
        <div class="quadedit">
            <h1 style="padding-bottom: 10px;">Cadastrar Opinião</h1>
            <?php
            $codcar = $_SESSION['codigocar'];
            $codusu = $_SESSION['codigousu'];
            $carro = "SELECT * FROM carros WHERE car_cod='$codcar'";
            $comando = mysqli_query($conn, $carro);
            while ($row = mysqli_fetch_array($comando)) {
                $marca = $row['car_marca'];
                $modelo = $row['car_modelo'];
                echo "<form style=width:100%; action=proc_cadopiniao.php method=post>
                <div class=quadlado>
                <h3>Marca:<input type=text name=marca value='$marca'>
                </div>
                <div class=quadlado>
        <input type=hidden name=codcar value='$codcar'></h3>
        <input type=hidden name=codusu value='$codusu'>
        <h3>Modelo:<input type=text name=modelo value='$modelo'></h3>
        </div>
        <center><h3>Opnião</center>
        <div class=quadlado>
        <textarea type=text class='tamanhoinput algumtext' name=opiniao maxlength=1000></textarea>
        </div></h3>
        <div class=quadlado>
        <a href=javascript:void(0) onclick=Avaliar(1)>
        <img src=../Imagens/star0.png id=s1></a>

        <a href=javascript:void(0) onclick=Avaliar(2)>
        <img src=../Imagens/star0.png id=s2></a>

        <a href=javascript:void(0) onclick=Avaliar(3)>
        <img src=../Imagens/star0.png id=s3></a>

        <a href=javascript:void(0) onclick=Avaliar(4)>
        <img src=../Imagens/star0.png id=s4></a>

        <a href=javascript:void(0) onclick=Avaliar(5)>
        <img src=../Imagens/star0.png id=s5></a>
        </div>
        <input type=hidden name=avaliacao id=rating value=0>
        <div class=quadlado>
        <button class=button-6>Cadastrar Opinião</button>
        </div>
        <div class=quadlado>
        <a href=../index.php><button type=button class=button-6>Voltar</button></a>
        </div>
        </form>";
            }
            ?>
        </div>
    </div>

    <!--Rodapé-->
    <?php require "rodape2.php";
        echo $_SESSION['rodape'];
    ?>
    <!--Rodapé Fechar-->

    <script>
        function Avaliar(estrela) {
            var url = window.location;
            url = url.toString()
            url = url.split("index.html");
            url = url[0];

            var s1 = document.getElementById("s1").src;
            var s2 = document.getElementById("s2").src;
            var s3 = document.getElementById("s3").src;
            var s4 = document.getElementById("s4").src;
            var s5 = document.getElementById("s5").src;
            var avaliacao = 0;

            if (estrela == 5) {
                if (s5 == url + "../Imagens/star0.png") {
                    document.getElementById("s1").src = "../Imagens/star1.png";
                    document.getElementById("s2").src = "../Imagens/star1.png";
                    document.getElementById("s3").src = "../Imagens/star1.png";
                    document.getElementById("s4").src = "../Imagens/star1.png";
                    document.getElementById("s5").src = "../Imagens/star0.png";
                    avaliacao = 4;
                } else {
                    document.getElementById("s1").src = "../Imagens/star1.png";
                    document.getElementById("s2").src = "../Imagens/star1.png";
                    document.getElementById("s3").src = "../Imagens/star1.png";
                    document.getElementById("s4").src = "../Imagens/star1.png";
                    document.getElementById("s5").src = "../Imagens/star1.png";
                    avaliacao = 5;
                }
            }

            //ESTRELA 4
            if (estrela == 4) {
                if (s4 == url + "../Imagens/star0.png") {
                    document.getElementById("s1").src = "../Imagens/star1.png";
                    document.getElementById("s2").src = "../Imagens/star1.png";
                    document.getElementById("s3").src = "../Imagens/star1.png";
                    document.getElementById("s4").src = "../Imagens/star1.png";
                    document.getElementById("s5").src = "../Imagens/star1.png";
                    avaliacao = 3;
                } else {
                    document.getElementById("s1").src = "../Imagens/star1.png";
                    document.getElementById("s2").src = "../Imagens/star1.png";
                    document.getElementById("s3").src = "../Imagens/star1.png";
                    document.getElementById("s4").src = "../Imagens/star1.png";
                    document.getElementById("s5").src = "../Imagens/star0.png";
                    avaliacao = 4;
                }
            }

            //ESTRELA 3
            if (estrela == 3) {
                if (s3 == url + "../Imagens/star0.png") {
                    document.getElementById("s1").src = "../Imagens/star1.png";
                    document.getElementById("s2").src = "../Imagens/star1.png";
                    document.getElementById("s3").src = "../Imagens/star1.png";
                    document.getElementById("s4").src = "../Imagens/star1.png";
                    document.getElementById("s5").src = "../Imagens/star0.png";
                    avaliacao = 2;
                } else {
                    document.getElementById("s1").src = "../Imagens/star1.png";
                    document.getElementById("s2").src = "../Imagens/star1.png";
                    document.getElementById("s3").src = "../Imagens/star1.png";
                    document.getElementById("s4").src = "../Imagens/star0.png";
                    document.getElementById("s5").src = "../Imagens/star0.png";
                    avaliacao = 3;
                }
            }

            //ESTRELA 2
            if (estrela == 2) {
                if (s2 == url + "../Imagens/star0.png") {
                    document.getElementById("s1").src = "../Imagens/star1.png";
                    document.getElementById("s2").src = "../Imagens/star1.png";
                    document.getElementById("s3").src = "../Imagens/star1.png";
                    document.getElementById("s4").src = "../Imagens/star0.png";
                    document.getElementById("s5").src = "../Imagens/star0.png";
                    avaliacao = 1;
                } else {
                    document.getElementById("s1").src = "../Imagens/star1.png";
                    document.getElementById("s2").src = "../Imagens/star1.png";
                    document.getElementById("s3").src = "../Imagens/star0.png";
                    document.getElementById("s4").src = "../Imagens/star0.png";
                    document.getElementById("s5").src = "../Imagens/star0.png";
                    avaliacao = 2;
                }
            }

            //ESTRELA 1
            if (estrela == 1) {
                if (s1 == url + "../Imagens/star0.png") {
                    document.getElementById("s1").src = "../Imagens/star1.png";
                    document.getElementById("s2").src = "../Imagens/star1.png";
                    document.getElementById("s3").src = "../Imagens/star0.png";
                    document.getElementById("s4").src = "../Imagens/star0.png";
                    document.getElementById("s5").src = "../Imagens/star0.png";
                    avaliacao = 0;
                } else {
                    document.getElementById("s1").src = "../Imagens/star1.png";
                    document.getElementById("s2").src = "../Imagens/star0.png";
                    document.getElementById("s3").src = "../Imagens/star0.png";
                    document.getElementById("s4").src = "../Imagens/star0.png";
                    document.getElementById("s5").src = "../Imagens/star0.png";
                    avaliacao = 1;
                }
            }
            document.getElementById('rating').value = avaliacao;
        }
    </script>
</body>

</html>