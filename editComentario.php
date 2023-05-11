<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="Imagens/DescomplicarsIcon.png" rel="icon">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/perfils.css">
    <link rel="stylesheet" href="CSS/carros.css">
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
                                $imagem = base64_encode($row['usu_image']);
                                echo "<center><img class=perfil src='data:image/jpeg;base64,$imagem'><br></center>";
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
                                echo "<center><img class=perfil src='data:image/jpeg;base64,$imagem'><br></center>";
                            }
                            echo $_SESSION['edit'];
                        }
                        ?></h2>
                </div>
                <h2>
                    <div class="restousu">
                        <a class="letrasusu" href="Perfil.php">
                            <div>
                                Voltar
                            </div>
                        </a>
                        <a class="letrasusu" href=PHP/sair.php>
                            <form action="PHP/sair.php" method="post">
                                Sair
                            </form>
                        </a>
                        <?php
                        //mostrando a msg de login e senha inválidos!
                        if (isset($_SESSION['naoeditado'])) {
                            echo $_SESSION['naoeditado'];
                            unset($_SESSION['naoeditado']);
                        }
                        ?>
                        <?php
                        //mostrando a msg de login e senha inválidos!
                        if (isset($_SESSION['msgC'])) {
                            echo $_SESSION['msgC'];
                            unset($_SESSION['msgC']);
                        }
                        ?>

                    </div>
                </h2>
            </div>
        </div>
        <div class="containerconcea">
            <?php
            $codigoopn = $_POST['codigoopn'];
            $opiniao = "SELECT * FROM opnioes WHERE opn_cod=$codigoopn";
            $abobrinha = mysqli_query($conn, $opiniao);
            while ($row = mysqli_fetch_array($abobrinha)) {
                $usuario = $row['opn_pessoa'];
                $codigousu = $row['opn_cod'];
                $opnioes = $row['opn_opiniao'];
                $carro = $row['opn_carro'];
                $marca = $row['opn_marca'];
                $avaliacao = $row['opn_avaliacao'];

                echo "
                        <div class=featured-boxd>
                            <div class=featured-imgc>
                                <div class=ladoscar>
                                    <div class=usuesquerda>
                                    <div class=nomeperfil>
                                    <div style=display:flex;flex-direction:column;>
                                    <h1>$marca $carro</h1>";
                echo "<div class=imagemmaluca>";
                if ($avaliacao == "1") {
                    echo "<a href=javascript:void(0) onclick=Avaliar(1)>
                                        <img src=Imagens/star1.png id=s1></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(2)>
                                        <img src=Imagens/star0.png id=s2></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(3)>
                                        <img src=Imagens/star0.png id=s3></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(4)>
                                        <img src=Imagens/star0.png id=s4></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(5)>
                                        <img src=Imagens/star0.png id=s5></a>";
                } else if ($avaliacao == "2") {
                    echo "<a href=javascript:void(0) onclick=Avaliar(1)>
                                        <img src=Imagens/star1.png id=s1></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(2)>
                                        <img src=Imagens/star1.png id=s2></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(3)>
                                        <img src=Imagens/star0.png id=s3></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(4)>
                                        <img src=Imagens/star0.png id=s4></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(5)>
                                        <img src=Imagens/star0.png id=s5></a>";
                } else if ($avaliacao == "3") {
                    echo "<a href=javascript:void(0) onclick=Avaliar(1)>
                                        <img src=Imagens/star1.png id=s1></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(2)>
                                        <img src=Imagens/star1.png id=s2></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(3)>
                                        <img src=Imagens/star1.png id=s3></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(4)>
                                        <img src=Imagens/star0.png id=s4></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(5)>
                                        <img src=Imagens/star0.png id=s5></a>";
                } else if ($avaliacao == "4") {
                    echo "<a href=javascript:void(0) onclick=Avaliar(1)>
                                        <img src=Imagens/star1.png id=s1></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(2)>
                                        <img src=Imagens/star1.png id=s2></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(3)>
                                        <img src=Imagens/star1.png id=s3></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(4)>
                                        <img src=Imagens/star1.png id=s4></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(5)>
                                        <img src=Imagens/star0.png id=s5></a>";
                } else if ($avaliacao == "5") {
                    echo "<a href=javascript:void(0) onclick=Avaliar(1)>
                                        <img src=Imagens/star1.png id=s1></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(2)>
                                        <img src=Imagens/star1.png id=s2></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(3)>
                                        <img src=Imagens/star1.png id=s3></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(4)>
                                        <img src=Imagens/star1.png id=s4></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(5)>
                                        <img src=Imagens/star1.png id=s5></a>";
                } else if ($avaliacao == "0") {
                    echo "<a href=javascript:void(0) onclick=Avaliar(1)>
                                        <img src=Imagens/star0.png id=s1></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(2)>
                                        <img src=Imagens/star0.png id=s2></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(3)>
                                        <img src=Imagens/star0.png id=s3></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(4)>
                                        <img src=Imagens/star0.png id=s4></a>
                                
                                        <a href=javascript:void(0) onclick=Avaliar(5)>
                                        <img src=Imagens/star0.png id=s5></a>";
                }
                echo "</div></div>
                                    </div>
                                    </div>
                                    <div class=opidireita>
                                        <div class=titulodireita>
                                            <h1>Opinião</h1>
                                        </div>
                                        <form action=PHP/proc_editcomen.php method=post>
                                        <div class=opiniao>
                                            <textarea name='opiniao' maxlength=1000 class=textoperfil>$opnioes</textarea>
                                        </div>
                                        <input type=hidden name=avaliacao id=rating value=$avaliacao>
                                        <input type=hidden class=id name=codigo value=$codigousu>
                                        <div style=display:flex;flex-direction:row;>
                                        <button class=button-6>Editar Comentario</button>
                                        </form>
                                        
                                    <input type=hidden class=id name=codigo value=$codigousu>";
            ?>
                <script>
                    function excluir() {
                        if (confirm("Tem certeza que deseja excluir sua conta?")) {
                            const input = document.getElementsByClassName("id");
                            event.preventDefault();
                            window.location.href = "PHP/excluircoment.php?codigo=" + input[0].value
                        } else {

                        }
                    }

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
                            if (s5 == url + "Imagens/star0.png") {
                                document.getElementById("s1").src = "Imagens/star1.png";
                                document.getElementById("s2").src = "Imagens/star1.png";
                                document.getElementById("s3").src = "Imagens/star1.png";
                                document.getElementById("s4").src = "Imagens/star1.png";
                                document.getElementById("s5").src = "Imagens/star0.png";
                                avaliacao = 4;
                            } else {
                                document.getElementById("s1").src = "Imagens/star1.png";
                                document.getElementById("s2").src = "Imagens/star1.png";
                                document.getElementById("s3").src = "Imagens/star1.png";
                                document.getElementById("s4").src = "Imagens/star1.png";
                                document.getElementById("s5").src = "Imagens/star1.png";
                                avaliacao = 5;
                            }
                        }

                        //ESTRELA 4
                        if (estrela == 4) {
                            if (s4 == url + "Imagens/star0.png") {
                                document.getElementById("s1").src = "Imagens/star1.png";
                                document.getElementById("s2").src = "Imagens/star1.png";
                                document.getElementById("s3").src = "Imagens/star1.png";
                                document.getElementById("s4").src = "Imagens/star1.png";
                                document.getElementById("s5").src = "Imagens/star1.png";
                                avaliacao = 3;
                            } else {
                                document.getElementById("s1").src = "Imagens/star1.png";
                                document.getElementById("s2").src = "Imagens/star1.png";
                                document.getElementById("s3").src = "Imagens/star1.png";
                                document.getElementById("s4").src = "Imagens/star1.png";
                                document.getElementById("s5").src = "Imagens/star0.png";
                                avaliacao = 4;
                            }
                        }

                        //ESTRELA 3
                        if (estrela == 3) {
                            if (s3 == url + "Imagens/star0.png") {
                                document.getElementById("s1").src = "Imagens/star1.png";
                                document.getElementById("s2").src = "Imagens/star1.png";
                                document.getElementById("s3").src = "Imagens/star1.png";
                                document.getElementById("s4").src = "Imagens/star1.png";
                                document.getElementById("s5").src = "Imagens/star0.png";
                                avaliacao = 2;
                            } else {
                                document.getElementById("s1").src = "Imagens/star1.png";
                                document.getElementById("s2").src = "Imagens/star1.png";
                                document.getElementById("s3").src = "Imagens/star1.png";
                                document.getElementById("s4").src = "Imagens/star0.png";
                                document.getElementById("s5").src = "Imagens/star0.png";
                                avaliacao = 3;
                            }
                        }

                        //ESTRELA 2
                        if (estrela == 2) {
                            if (s2 == url + "../Imagens/star0.png") {
                                document.getElementById("s1").src = "Imagens/star1.png";
                                document.getElementById("s2").src = "Imagens/star1.png";
                                document.getElementById("s3").src = "Imagens/star1.png";
                                document.getElementById("s4").src = "Imagens/star0.png";
                                document.getElementById("s5").src = "Imagens/star0.png";
                                avaliacao = 1;
                            } else {
                                document.getElementById("s1").src = "Imagens/star1.png";
                                document.getElementById("s2").src = "Imagens/star1.png";
                                document.getElementById("s3").src = "Imagens/star0.png";
                                document.getElementById("s4").src = "Imagens/star0.png";
                                document.getElementById("s5").src = "Imagens/star0.png";
                                avaliacao = 2;
                            }
                        }

                        //ESTRELA 1
                        if (estrela == 1) {
                            if (s1 == url + "Imagens/star0.png") {
                                document.getElementById("s1").src = "Imagens/star1.png";
                                document.getElementById("s2").src = "Imagens/star1.png";
                                document.getElementById("s3").src = "Imagens/star0.png";
                                document.getElementById("s4").src = "Imagens/star0.png";
                                document.getElementById("s5").src = "Imagens/star0.png";
                                avaliacao = 0;
                            } else {
                                document.getElementById("s1").src = "Imagens/star1.png";
                                document.getElementById("s2").src = "Imagens/star0.png";
                                document.getElementById("s3").src = "Imagens/star0.png";
                                document.getElementById("s4").src = "Imagens/star0.png";
                                document.getElementById("s5").src = "Imagens/star0.png";
                                avaliacao = 1;
                            }
                        }
                        document.getElementById('rating').value = avaliacao;
                    }
                </script>
            <?php

                echo "<button type=button class=button-6 type=submit onclick='excluir()'>Excluir</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </form>
                            </div>";
            }
            ?>
        </div>
        <?php require "PHP/rodape.php";
        echo $_SESSION['rodape'];
        ?>
</body>

</html>