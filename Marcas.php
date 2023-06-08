<!DOCTYPE html>
<html lang="en">

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
    if (isset($_SESSION['login'])) {
        foreach ($_SESSION['loginA'] as $codigo) {
            $codigousu = $codigo['cod'];
        }
    }
    $codigo = $_POST['cod'];
    $marcas = "SELECT * FROM marcas WHERE mar_cod = $codigo";
    $comando = mysqli_query($conn, $marcas);
    while ($row = mysqli_fetch_array($comando)) {
        $marca = $row['mar_nome'];
        $imagem = base64_encode($row['mar_image']);

        echo "<div class=marcatudo><div class=imagemmarca><img src='data:image/jpeg;base64,$imagem'></div><br>
            <h1><font color=#004aad>$marca</font></h1></div>";
        $teste = "SELECT * FROM carros WHERE car_marca='$marca'";
        $comando = mysqli_query($conn, $teste);
        while ($row = mysqli_fetch_array($comando)) {
            $tipo = $row['car_tipo'];
            if ($tipo == "Sedans") {
                echo "<div class=containerconcea>
        <div class=top-titlea>
        <h3>Sedans</h3>
        <hr>";
                echo "<div class=rowb>";
                $carros = "SELECT * FROM carros WHERE car_marca='$marca' and car_tipo='Sedans'";
                $comando = mysqli_query($conn, $carros);
                while ($row = mysqli_fetch_array($comando)) {
                    $cod = $row['car_cod'];
                    $marca = $row['car_marca'];
                    $modelo = $row['car_modelo'];
                    $tipo = $row['car_tipo'];
                    $imagem = base64_encode($row['car_image']);
                    echo "<div style='display:flex;flex-direction:column;'> 
            <form action=carros.php method=post>
                    <button class=featured-boxb>
            <div class=featured-imgb>
              <img src='data:image/jpeg;base64,$imagem'>
              <center><font color=#004aad size=5><h1>$marca $modelo</h1></font></center>
              <input type=hidden name=cod value=$cod>
              </form>";
                    echo "</div></button>";
                    if (isset($_SESSION['login'])) {
                        if ($codigousu == "1") {
                            echo "<form method=post action=PHP/procexcluir.php>
                        <input type=hidden name=cod value=$cod>
                        <button>Excluir</button>
                        </form>
                        <form method=post action=PHP/proceditcar.php>
                        <input type=hidden name=cod value=$cod>
                        <button>Editar</button>
                        </form>";
                        }
                    } else {
                        echo "";
                    }
                    echo "</div>";
                }
            }
        }
        echo "</div>
    </div>
    </div>";

        $teste = "SELECT * FROM carros WHERE car_marca='$marca'";
        $comando = mysqli_query($conn, $teste);
        while ($row = mysqli_fetch_array($comando)) {
            $tipo = $row['car_tipo'];
            if ($tipo == "Picapes") {
                echo "<div class=containerconcea>
        <div class=top-titlea>
        <h3>Picapes</h3>
        <hr>";
                echo "<div class=rowb>";
                $carros = "SELECT * FROM carros WHERE car_marca='$marca' and car_tipo='Picapes'";
                $comando = mysqli_query($conn, $carros);
                while ($row = mysqli_fetch_array($comando)) {
                    $cod = $row['car_cod'];
                    $marca = $row['car_marca'];
                    $modelo = $row['car_modelo'];
                    $tipo = $row['car_tipo'];
                    $imagem = base64_encode($row['car_image']);
                    echo "<div style='display:flex;flex-direction:column;'> 
            <form action=carros.php method=post>
                    <button class=featured-boxb>
            <div class=featured-imgb>
              <img src='data:image/jpeg;base64,$imagem'>
              <center><font color=#004aad size=5><h1>$marca $modelo</h1></font></center>
              <input type=hidden name=cod value=$cod>
              </form>";
                    echo "</div></button>";
                    if (isset($_SESSION['login'])) {
                        if ($codigousu == "1") {
                            echo "<form method=post action=PHP/procexcluir.php>
                        <input type=hidden name=cod value=$cod>
                        <button>Excluir</button>
                        </form>
                        <form method=post action=PHP/proceditcar.php>
                        <input type=hidden name=cod value=$cod>
                        <button>Editar</button>
                        </form>";
                        }
                    } else {
                        echo "";
                    }
                    echo "</div>";
                }
            }
        }
        echo "</div>
    </div>
    </div>";

        $teste = "SELECT * FROM carros WHERE car_marca='$marca'";
        $comando = mysqli_query($conn, $teste);
        while ($row = mysqli_fetch_array($comando)) {
            $tipo = $row['car_tipo'];
            if ($tipo == "SUVs") {
                echo "<div class=containerconcea>
        <div class=top-titlea>
        <h3>SUVs</h3>
        <hr>";
                echo "<div class=rowb>";
                $carros = "SELECT * FROM carros WHERE car_marca='$marca' and car_tipo='SUVs'";
                $comando = mysqli_query($conn, $carros);
                while ($row = mysqli_fetch_array($comando)) {
                    $cod = $row['car_cod'];
                    $marca = $row['car_marca'];
                    $modelo = $row['car_modelo'];
                    $tipo = $row['car_tipo'];
                    $imagem = base64_encode($row['car_image']);
                    echo "<div style='display:flex;flex-direction:column;'> 
            <form action=carros.php method=post>
                    <button class=featured-boxb>
            <div class=featured-imgb>
              <img src='data:image/jpeg;base64,$imagem'>
              <center><font color=#004aad size=5><h1>$marca $modelo</h1></font></center>
              <input type=hidden name=cod value=$cod>
              </form>";
                    echo "</div></button>";
                    if (isset($_SESSION['login'])) {
                        if ($codigousu == "1") {
                            echo "<form method=post action=PHP/procexcluir.php>
                        <input type=hidden name=cod value=$cod>
                        <button>Excluir</button>
                        </form>
                        <form method=post action=PHP/proceditcar.php>
                        <input type=hidden name=cod value=$cod>
                        <button>Editar</button>
                        </form>";
                        }
                    } else {
                        echo "";
                    }
                    echo "</div>";
                }
            }
        }
        echo "</div>
    </div>
    </div>";

        $teste = "SELECT * FROM carros WHERE car_marca='$marca'";
        $comando = mysqli_query($conn, $teste);
        while ($row = mysqli_fetch_array($comando)) {
            $tipo = $row['car_tipo'];
            if ($tipo == "Hatchers") {
                echo "<div class=containerconcea>
        <div class=top-titlea>
        <h3>Hatchers</h3>
        <hr>";
                echo "<div class=rowb>";
                $carros = "SELECT * FROM carros WHERE car_marca='$marca' and car_tipo='Hatchers'";
                $comando = mysqli_query($conn, $carros);
                while ($row = mysqli_fetch_array($comando)) {
                    $cod = $row['car_cod'];
                    $marca = $row['car_marca'];
                    $modelo = $row['car_modelo'];
                    $tipo = $row['car_tipo'];
                    $imagem = base64_encode($row['car_image']);
                    echo "<div style='display:flex;flex-direction:column;'> 
            <form action=carros.php method=post>
                    <button class=featured-boxb>
            <div class=featured-imgb>
              <img src='data:image/jpeg;base64,$imagem'>
              <center><font color=#004aad size=5><h1>$marca $modelo</h1></font></center>
              <input type=hidden name=cod value=$cod>
              </form>";
                    echo "</div></button>";
                    if (isset($_SESSION['login'])) {
                        if ($codigousu == "1") {
                            echo "<form method=post action=PHP/procexcluir.php>
                        <input type=hidden name=cod value=$cod>
                        <button>Excluir</button>
                        </form>
                        <form method=post action=PHP/proceditcar.php>
                        <input type=hidden name=cod value=$cod>
                        <button>Editar</button>
                        </form>";
                        }
                    } else {
                        echo "";
                    }
                    echo "</div>";
                }
            }
        }
        echo "</div>
    </div>
    </div>";

    $teste = "SELECT * FROM carros WHERE car_marca='$marca'";
        $comando = mysqli_query($conn, $teste);
        while ($row = mysqli_fetch_array($comando)) {
            $tipo = $row['car_tipo'];
            if ($tipo == "Esportivos") {
                echo "<div class=containerconcea>
        <div class=top-titlea>
        <h3>Esportivos</h3>
        <hr>";
                echo "<div class=rowb>";
                $carros = "SELECT * FROM carros WHERE car_marca='$marca' and car_tipo='Esportivos'";
                $comando = mysqli_query($conn, $carros);
                while ($row = mysqli_fetch_array($comando)) {
                    $cod = $row['car_cod'];
                    $marca = $row['car_marca'];
                    $modelo = $row['car_modelo'];
                    $tipo = $row['car_tipo'];
                    $imagem = base64_encode($row['car_image']);
                    echo "<div style='display:flex;flex-direction:column;'> 
            <form action=carros.php method=post>
                    <button class=featured-boxb>
            <div class=featured-imgb>
              <img src='data:image/jpeg;base64,$imagem'>
              <center><font color=#004aad size=5><h1>$marca $modelo</h1></font></center>
              <input type=hidden name=cod value=$cod>
              </form>";
                    echo "</div></button>";
                    if (isset($_SESSION['login'])) {
                        if ($codigousu == "1") {
                            echo "<form method=post action=PHP/procexcluir.php>
                        <input type=hidden name=cod value=$cod>
                        <button>Excluir</button>
                        </form>
                        <form method=post action=PHP/proceditcar.php>
                        <input type=hidden name=cod value=$cod>
                        <button>Editar</button>
                        </form>";
                        }
                    } else {
                        echo "";
                    }
                    echo "</div>";
                }
            }
        }
        echo "</div>
    </div>
    </div>";

        $teste = "SELECT * FROM carros WHERE car_marca='$marca'";
        $comando = mysqli_query($conn, $teste);
        while ($row = mysqli_fetch_array($comando)) {
            $tipo = $row['car_tipo'];
            if ($tipo == "Eletricos") {
                echo "<div class=containerconcea>
        <div class=top-titlea>
        <h3>Eletricos</h3>
        <hr>";
                echo "<div class=rowb>";
                $carros = "SELECT * FROM carros WHERE car_marca='$marca' and car_tipo='Eletricos'";
                $comando = mysqli_query($conn, $carros);
                while ($row = mysqli_fetch_array($comando)) {
                    $cod = $row['car_cod'];
                    $marca = $row['car_marca'];
                    $modelo = $row['car_modelo'];
                    $tipo = $row['car_tipo'];
                    $imagem = base64_encode($row['car_image']);
                    echo "<div style='display:flex;flex-direction:column;'> 
            <form action=carros.php method=post>
                    <button class=featured-boxb>
            <div class=featured-imgb>
              <img src='data:image/jpeg;base64,$imagem'>
              <center><font color=#004aad size=5><h1>$marca $modelo</h1></font></center>
              <input type=hidden name=cod value=$cod>
              </form>";
                    echo "</div></button>";
                    if (isset($_SESSION['login'])) {
                        if ($codigousu == "1") {
                            echo "<form method=post action=PHP/procexcluir.php>
                        <input type=hidden name=cod value=$cod>
                        <button>Excluir</button>
                        </form>
                        <form method=post action=PHP/proceditcar.php>
                        <input type=hidden name=cod value=$cod>
                        <button>Editar</button>
                        </form>";
                        }
                    } else {
                        echo "";
                    }
                    echo "</div>";
                }
            }
        }
        echo "</div>
    </div>
    </div>";
    }
    echo "<center style=margin-bottom:20px;><a href='Concessionarias.php'><button class=button-6>Voltar</button></a></center>";
    ?>
    <!--Rodapé-->
    <?php require "PHP/rodape.php";
    echo $_SESSION['rodape'];
    ?>
    <!--Rodapé Fechar-->
</body>

</html>