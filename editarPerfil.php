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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.cpf').mask('000.000.000-00');
            $('.date').mask('00/00/0000');
            $('.phone').mask('(00)00000-0000');

            $('.cpf').on('input', function() {
                $(this).mask('000.000.000-00');
            });

            $('.date').on('input', function() {
                $(this).mask('00/00/0000');
            });

            $('.phone').on('input', function() {
                $(this).mask('(00)00000-0000');
            });
        });
    </script>
    <title>DescompliCars</title>
</head>

<body>
    <?php require "PHP/verificar.php";
    echo $_SESSION['cima'];
    foreach ($_SESSION['loginA'] as $codigo) {
        $codigo = $codigo['cod'];
        echo "<input type=hidden name=codigo value=$codigo>";
        $sql = "SELECT * FROM usuarios WHERE usu_cod = $codigo";
        $result = mysqli_query($conn, $sql);
        $row_usuario = mysqli_fetch_array($result);
    }
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
        <div style="display: flex; justify-content: center; align-items: center; text-align: center; flex-direction: column; width: 100%; margin-left: 20px;">
            <h1 style="color:#004aad; margin-top: 20px;">Editar</h1>
            <hr>
            <form style="width: 100%; display: flex; justify-content: center; align-items: center; text-align: center; flex-direction: column;" action="PHP/editarProc.php" method="post" enctype="multipart/form-data">
                <div style="width: 100%; display: flex; justify-content: center; align-items: center; text-align: center; flex-direction: column;">
                    <div class="quadlado">
                        <h1>Nome:<input style="font-size: 20px;" type="text" name="nome" value="<?php echo $row_usuario['usu_nome'] ?>"></h1>
                    </div>
                    <div class="quadlado">
                        <h1>Sobrenome:<input style="font-size: 20px;" type="text" name="sobrenome" value="<?php echo $row_usuario['usu_sobrenome'] ?>"></h1>
                    </div>
                    <div class="quadlado">
                        <h1>Email:<input style="font-size: 20px;" type="text" name="email" value="<?php echo $row_usuario['usu_email'] ?>"></h1>
                    </div>
                    <div class="quadlado">
                        <h1>Telefone:<input style="font-size: 20px;" class="phone" type="text" name="tel" maxlength="14" value="<?php echo $row_usuario['usu_tel'] ?>"></h1>
                    </div>
                    <div class="quadlado">
                        <h1>Data de Nascimento:<input style="font-size: 20px;" type="date" min="1900-01-01" max="2023-01-01" name="dtnasc" value="<?php echo $row_usuario['usu_dtnasc'] ?>"></h1>
                    </div>
                    <div class="quadlado">
                        <h1>CPF:<input style="font-size: 20px;" type="text" class="cpf" name="cpf" maxlength="14" value="<?php echo $row_usuario['usu_cpf'] ?>"></h1>
                    </div>
                    <div class="quadlado">
                        <h1>Endereço:<input style="font-size: 20px;" type="text" name="endereco" value="<?php echo $row_usuario['usu_endereco'] ?>"></h1>
                    </div>
                    <div class="quadlado">
                        <h1>Cidade:<input style="font-size: 20px;" type="text" name="cidade" value="<?php echo $row_usuario['usu_cidade'] ?>"></h1>
                    </div>
                    <div class="quadlado">
                        <h1>Estado:<input style="font-size: 20px;" type="text" maxlength="2" name="estado" value="<?php echo $row_usuario['usu_estado'] ?>"></h1>
                    </div>
                    <div class="quadlado">
                        <h1>Genero: <select style="font-size: 20px;" name="genero">
                                <?php
                                if ($row_usuario['usu_genero'] == "Masculino") {
                                    echo "<option value='Masculino'>Masculino</option>";
                                    echo "<option value='Feminino'>Feminino</option>";
                                    echo "<option value='Outros'>Outros</option>";
                                } else if ($row_usuario['usu_genero'] == "Feminino") {
                                    echo "<option value='Feminino'>Feminino</option>";
                                    echo "<option value='Masculino'>Masculino</option>";
                                    echo "<option value='Outros'>Outros</option>";
                                } else {
                                    echo "<option value='Outros'>Outros</option>";
                                    echo "<option value='Feminino'>Feminino</option>";
                                    echo "<option value='Masculino'>Masculino</option>";
                                }
                                ?>
                            </select></h1>
                    </div>
                    <div class="quadlado">
                        <h1>Insira sua foto<input style="font-size: 20px;" type="file" name="imagemperfil" accept="image/*"></h1>
                    </div>
                </div>
                <input type="hidden" name="cod" value="<?php echo $row_usuario['usu_cod'] ?>">
                <div class="quadlado" style="display: flex; justify-content: center; align-items: center; text-align: center;">
                    <button class="button-6" type="submit">Editar</button>
                </div>
            </form>
            <div class="quadlado" style="display: flex; justify-content: center; align-items: center; text-align: center;">
                <input type="hidden" class="id" name="codigo" value=<?php echo $row_usuario['usu_cod'] ?>>
                <script>
                    function excluir() {
                        if (confirm("Tem certeza que deseja excluir sua conta?")) {
                            const input = document.getElementsByClassName("id");
                            event.preventDefault();
                            window.location.href = "PHP/excluir.php?codigo=" + input[0].value
                        } else {

                        }
                    }
                </script>
                <button class="button-6" type="submit" onclick="excluir()">Excluir</button>
            </div>
            </form>
        </div>
    </div>
    <?php require "PHP/rodape.php";
    echo $_SESSION['rodape'];
    ?>
</body>

</html>