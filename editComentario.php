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
                $codigofoto = $row['opn_codusu'];

                $imagemusu = "SELECT * FROM usuarios WHERE usu_cod=$codigofoto";
                $comando = mysqli_query($conn, $imagemusu);
                while ($row = mysqli_fetch_array($comando)) {
                    $imagemusua = base64_encode($row['usu_image']);

                    echo "
                        <div class=featured-boxd>
                            <div class=featured-imgc>
                                <div class=ladoscar>
                                    <div class=usuesquerda>";
                    echo "<img class=perfil src='data:image/jpeg;base64,$imagemusua'>
                                    <div class=nomeperfil>
                                    <div style=display:flex;flex-direction:column;>
                                    <h1>$usuario</h1>
                                    <h1>$marca $carro</h1>
                                    </div>
                                    </div>
                                    </div>
                                    <div class=opidireita>
                                        <div class=titulodireita>
                                            <h1>Opinião</h1>
                                        </div>
                                        <form action=PHP/proc_editcomen.php method=post>
                                        <div class=opiniao>
                                            <textarea name='opiniao' class=textoperfil>$opnioes</textarea>
                                        </div>
                                        <input type=hidden class=id name=codigo value=$codigousu>
                                        <div style=display:flex;flex-direction:row;>
                                        <button class=button-6>Editar Comentario</button>
                                        </form>
                                        
                                    <script>
                                        function excluir() {
                                            if (confirm(Tem certeza que deseja excluir sua conta?)) {
                                                const input = document.getElementsByClassName(id);
                                                event.preventDefault();
                                                window.location.href = PHP/excluir.php?codigo= + input[0].value
                                            } else {

                                            }
                                        }
                                    </script>
                                    <button class=button-6 type=submit onclick=excluir()>Excluir</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </form>
                            </div>";
                }
            }
            ?>

            <?php require "PHP/rodape.php";
            echo $_SESSION['rodape'];
            ?>
</body>

</html>