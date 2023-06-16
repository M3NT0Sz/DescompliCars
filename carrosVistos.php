<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="Imagens/DescomplicarsIcon.png" rel="icon">
    <link rel="stylesheet" href="CSS/style.css">
    <link href="CSS/carros.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/perfils.css">
    <link rel="stylesheet" href="carrosVistos.css">
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
                        <form style="width:100%;" action="carrosVistos.php" method="post">
                            <a class="letrasusu" href="carrosVistos.php">
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
                        if ($codigo == 1) {
                        ?>
                            <form action="usutudo.php" style="width:100%;">
                                <a class="letrasusu" href="">
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


        <div class="con">
            <div class="to">
                <h3>Carros ja vistos</h3>
                <hr>
                <?php
                $carrosvis = "SELECT * FROM carros ORDER BY car_contagem ";
                $comando = mysqli_query($conn, $carrosvis);
                echo "<div class=rowa>";
                while ($row = mysqli_fetch_array($comando)) {
                    $cod = $row['car_cod'];
                    $marca = $row['car_marca'];
                    $modelo = $row['car_modelo'];
                    $tipo = $row['car_tipo'];
                    $imagem = base64_encode($row['car_image']);
                    $contagem = $row['car_contagem'];
                    echo '<form action=carros.php method=post>
            <button class="featured-boxb">
            <div class="featured-imgb">
              <center><img  src=data:image/jpeg;base64,' . $imagem . '><br>
              <h1><font color=#004aad size=5>' . $marca . " " . $modelo . '</font></h1>
              <input type=hidden name=cod value=' . $cod . '>
            </div>
              
          </button>
          </form>';
                }
                echo "</div>";
                ?>
            </div>
        </div>
    </div>
    <?php require "PHP/rodape.php";
    echo $_SESSION['rodape'];
    ?>
</body>

</html>