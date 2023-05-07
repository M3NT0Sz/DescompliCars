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
    $cod = $_POST['cod'];
    $marcas = "SELECT * FROM marcas WHERE mar_cod = $cod";
    $comando = mysqli_query($conn, $marcas);
    while ($row = mysqli_fetch_array($comando)) {
        $marca = $row['mar_nome'];
        $imagem = base64_encode($row['mar_image']);

        echo "<center><img src='data:image/jpeg;base64,$imagem'><br>
            <h1><font color=#004aad>$marca</font></h1>
        </center>";
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
                    $anomod = $row['car_anomod'];
                    $anofab = $row['car_anofab'];
                    $versao = $row['car_versao'];
                    $tipo = $row['car_tipo'];
                    $imagem = base64_encode($row['car_image']);
                    echo "<div class=featured-boxb>
            <div class=featured-imgb>
            <form action=carros.php method=post>
              <img src='data:image/jpeg;base64,$imagem'>
              <h1>$marca</h1>
              <h1>$modelo</h1>
              <h1>$anomod</h1>
              <h1>$anofab</h1>
              <h1>$versao</h1>
              <h1>$tipo</h1>
              <input type=hidden name=cod value=$cod>
              <button>Ver Opniões</button>
              </form>
              <form method=post action=PHP/procexcluir.php>
              <input type=hidden name=cod value=$cod>
              <button>Excluir</button>
              </form>
              <form method=post action=PHP/proceditcar.php>
              <input type=hidden name=cod value=$cod>
              <button>Editar</button>
              </form>
          </div>";
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
                    $anomod = $row['car_anomod'];
                    $anofab = $row['car_anofab'];
                    $versao = $row['car_versao'];
                    $tipo = $row['car_tipo'];
                    $imagem = base64_encode($row['car_image']);
                    echo "<div class=featured-boxb>
            <div class=featured-imgb>
            <form action=carros.php method=post>
              <img src='data:image/jpeg;base64,$imagem'>
              <h1>$marca</h1>
              <h1>$modelo</h1>
              <h1>$anomod</h1>
              <h1>$anofab</h1>
              <h1>$versao</h1>
              <h1>$tipo</h1>
              <input type=hidden name=cod value=$cod>
              <button>Ver Opniões</button>
              </form>
              <form method=post action=PHP/procexcluir.php>
              <input type=hidden name=cod value=$cod>
              <button>Excluir</button>
              </form>
              <form method=post action=PHP/proceditcar.php>
              <input type=hidden name=cod value=$cod>
              <button>Editar</button>
              </form>
          </div>";
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
                    $anomod = $row['car_anomod'];
                    $anofab = $row['car_anofab'];
                    $versao = $row['car_versao'];
                    $tipo = $row['car_tipo'];
                    $imagem = base64_encode($row['car_image']);
                    echo "<div class=featured-boxb>
            <div class=featured-imgb>
            <form action=carros.php method=post>
              <img src='data:image/jpeg;base64,$imagem'>
              <h1>$marca</h1>
              <h1>$modelo</h1>
              <h1>$anomod</h1>
              <h1>$anofab</h1>
              <h1>$versao</h1>
              <h1>$tipo</h1>
              <input type=hidden name=cod value=$cod>
              <button>Ver Opniões</button>
              </form>
              <form method=post action=PHP/procexcluir.php>
              <input type=hidden name=cod value=$cod>
              <button>Excluir</button>
              </form>
              <form method=post action=PHP/proceditcar.php>
              <input type=hidden name=cod value=$cod>
              <button>Editar</button>
              </form>
          </div>";
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
                    $anomod = $row['car_anomod'];
                    $anofab = $row['car_anofab'];
                    $versao = $row['car_versao'];
                    $tipo = $row['car_tipo'];
                    $imagem = base64_encode($row['car_image']);
                    echo "<div class=featured-boxb>
            <div class=featured-imgb>
            <form action=carros.php method=post>
              <img src='data:image/jpeg;base64,$imagem'>
              <h1>$marca</h1>
              <h1>$modelo</h1>
              <h1>$anomod</h1>
              <h1>$anofab</h1>
              <h1>$versao</h1>
              <h1>$tipo</h1>
              <input type=hidden name=cod value=$cod>
              <button>Ver Opniões</button>
              </form>
              <form method=post action=PHP/procexcluir.php>
              <input type=hidden name=cod value=$cod>
              <button>Excluir</button>
              </form>
              <form method=post action=PHP/proceditcar.php>
              <input type=hidden name=cod value=$cod>
              <button>Editar</button>
              </form>
          </div>";
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
                    $anomod = $row['car_anomod'];
                    $anofab = $row['car_anofab'];
                    $versao = $row['car_versao'];
                    $tipo = $row['car_tipo'];
                    $imagem = base64_encode($row['car_image']);
                    echo "<div class=featured-boxb>
            <div class=featured-imgb>
            <form action=carros.php method=post>
              <img src='data:image/jpeg;base64,$imagem'>
              <h1>$marca</h1>
              <h1>$modelo</h1>
              <h1>$anomod</h1>
              <h1>$anofab</h1>
              <h1>$versao</h1>
              <h1>$tipo</h1>
              <input type=hidden name=cod value=$cod>
              <button>Ver Opniões</button>
              </form>
              <form method=post action=PHP/procexcluir.php>
              <input type=hidden name=cod value=$cod>
              <button>Excluir</button>
              </form>
              <form method=post action=PHP/proceditcar.php>
              <input type=hidden name=cod value=$cod>
              <button>Editar</button>
              </form>
          </div>";
                    echo "</div>";
                }
            }
        }
        echo "</div>
    </div>
    </div>";
    }
    ?>
    <!--Rodapé-->
    <?php require "PHP/rodape.php";
    echo $_SESSION['rodape'];
    ?>
    <!--Rodapé Fechar-->
</body>

</html>