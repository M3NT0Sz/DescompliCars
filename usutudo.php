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
                        if (isset($_SESSION['login'])) {
                            foreach ($_SESSION['loginA'] as $codigo) {
                                $codigo = $codigo['cod'];
                            }
                            $imagem = "SELECT * FROM usuarios WHERE usu_cod=$codigo";
                            $comando = mysqli_query($conn, $imagem);
                            while ($row = mysqli_fetch_array($comando)) {
                                $codigousu = $row['usu_cod'];
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
                            echo $_SESSION['editado'];
                            unset($_SESSION['editado']);
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
        <div style="width:100%; display:flex; flex-direction: column; align-items: center; justify-content: center; text-align: center;">
        <div class=top-titlea>
        <h3>Usuarios</h3>
        <hr>
        </div>
            <?php
            $sql = "SELECT * FROM usuarios WHERE usu_cod >= 3 ORDER BY usu_cod";
            $resultado = mysqli_query($conn, $sql);
            while ($obj = mysqli_fetch_array($resultado)) {
                $cod = $obj[0];
                $email = $obj[1];
                $nome = $obj[2];
                $sobrenome = $obj[3];
                $tel = $obj[5];
                $dtnasc = $obj[6];
                $cpf = $obj[7];
                $endereco = $obj[8];
                $cidade = $obj[9];
                $estado = $obj[10];
                $genero = $obj[11];
            ?>
                <div style="width: 300px; height: auto; background-color: white; border-radius: 20px; margin-bottom: 10px;">
                    <?php
                    echo "<br>Nome: $nome";
                    echo "<br>Sobrenome: $sobrenome";
                    echo "<br>Telefone: $tel";
                    echo "<br>Data de Nascimento: $dtnasc";
                    echo "<br>CPF:$cpf";
                    echo "<br>Endereco:$endereco";
                    echo "<br>Cidade:$cidade";
                    echo "<br>Estado:$estado";
                    echo "<br>Genero:$genero";
                    echo "<form method='post' action='PHP/excluirusu.php'>";
                    echo "<input type='hidden' name='cod' value='$cod'>";
                    echo "<button class='button-6'>Excluir</button>";
                    echo "</form>";
                    echo "<hr>";
                    ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <?php require "PHP/rodape.php";
    echo $_SESSION['rodape'];
    ?>
</body>

</html>