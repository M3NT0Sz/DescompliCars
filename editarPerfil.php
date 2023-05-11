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
    foreach ($_SESSION['loginA'] as $codigo) {
        $codigo = $codigo['cod'];
        echo "<input type=hidden name=codigo value=$codigo>";
        $sql = "SELECT * FROM usuarios WHERE usu_cod = $codigo";
        $result = mysqli_query($conn, $sql);
        $row_usuario = mysqli_fetch_array($result);
    }
    function Mask($mask,$str){

        $str = str_replace(" ","",$str);
    
        for($i=0;$i<strlen($str);$i++){
            $mask[strpos($mask,"#")] = $str[$i];
        }
    
        return $mask;
    
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
                        <div class="letrasusu">
                            Informações
                        </div>
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
        <div class="quadradoa">
            <div class="quadedit">
                <h1 style="padding-bottom: 10px;">Editar</h1>
                <form style="width: 100%;" action="PHP/editarProc.php" method="post">
                    <div class="quadlado">
                        <h3>Nome:<input type="text" name="nome" value="<?php echo $row_usuario['usu_nome'] ?>"></h3>
                    </div>
                    <div class="quadlado">
                        <h3>Sobrenome:<input type="text" name="sobrenome" value="<?php echo $row_usuario['usu_sobrenome'] ?>"></h3>
                    </div>
                    <div class="quadlado">
                        <h3>Email:<input type="text" name="email" value="<?php echo $row_usuario['usu_email'] ?>"></h3>
                    </div>
                    <div class="quadlado">
                        <h3>Telefone:<input  type="text" name="tel" maxlength="14" value="<?php echo $row_usuario['usu_tel'] ?>"></h3>
                    </div>
                    <div class="quadlado">
                        <h3>Data de Nascimento:<input type="date" name="dtnasc" value="<?php echo $row_usuario['usu_dtnasc'] ?>"></h3>
                    </div>
                    <div class="quadlado">
                        <h3>CPF:<input type="text" name="cpf" maxlength="14" value="<?php echo $row_usuario['usu_cpf'] ?>"></h3>
                    </div>
                    <div class="quadlado">
                        <h3>Endereço:<input type="text" name="endereco" value="<?php echo $row_usuario['usu_endereco'] ?>"></h3>
                    </div>
                    <div class="quadlado">
                        <h3>Cidade:<input type="text" name="cidade" value="<?php echo $row_usuario['usu_cidade'] ?>"></h3>
                    </div>
                    <div class="quadlado">
                        <h3>Estado:<input type="text" maxlength="2" name="estado" value="<?php echo $row_usuario['usu_estado'] ?>"></h3>
                    </div>
                    <div class="quadlado">
                        <h3>Genero: <select name="genero">
                            <?php
                                if($row_usuario['usu_genero'] == "Masculino"){
                                    echo "<option value='Masculino'>Masculino</option>";
                                    echo "<option value='Feminino'>Feminino</option>";
                                } else {
                                    echo "<option value='Feminino'>Feminino</option>";
                                    echo "<option value='Masculino'>Masculino</option>";
                                }
                            ?>                            
                        </select></h3>
                    </div>
                    <input type="hidden" name="cod" value="<?php echo $row_usuario['usu_cod'] ?>">
                    <div class="quadlado">
                        <button class="botao" type="submit">Editar</button>
                    </div>
                </form>
                <div class="quadlado">
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
                    <button class="botao" type="submit" onclick="excluir()">Excluir</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php require "PHP/rodape.php";
    echo $_SESSION['rodape'];
    ?>
</body>

</html>