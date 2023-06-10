<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Imagens/DescomplicarsIcon.png" rel="icon">
    <link href="CSS/style.css" rel="stylesheet">
    <link href="CSS/carros.css" rel="stylesheet">
    <link href="CSS/usuarios.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>DescompliCars</title>
</head>

<body>
    <!--MenuBar-->
    <?php require "PHP/verificar.php";
    echo $_SESSION['cima'];
    ?>
    <!--Fecha MenuBar-->
    <?php
    error_reporting(0);
    if (isset($_SESSION['login'])) {
        foreach ($_SESSION['loginA'] as $codigo) {
            $codigousu = $codigo['cod'];
        }
    }
    ?>
    <div class="ladoscar">
        <div class="esquerdalad">
            <div class="texto">
                <h1>Filtros</h1>
                <hr>
            </div>
            <div class="opcionais">
                <h1>Opcionais</h1>
                <hr>
                <h3><input type="checkbox" name="">Airbag</h3>
                <h3><input type="checkbox" name="">Alarme</h3>
                <h3><input type="checkbox" name="">Ar-condicionado</h3>
                <h3><input type="checkbox" name="">Ar Quente</h3>
                <h3><input type="checkbox" name="">Banco com regulagem de altura</h3>
                <h3><input type="checkbox" name="">Banco dianteiros com aquecimento</h3>
                <h3><input type="checkbox" name="">Bancos em couro</h3>
                <h3><input type="checkbox" name="">Capota Maritima</h3>
                <h3><input type="checkbox" name="">CD e MP3 player</h3>
                <h3><input type="checkbox" name="">CD player</h3>
                <h3><input type="checkbox" name="">Computador de bordo</h3>
                <h3><input type="checkbox" name="">Controle automatico de velocidade</h3>
                <h3><input type="checkbox" name="">Controle de tração</h3>
                <h3><input type="checkbox" name="">Desembaçador traseiro</h3>
                <h3><input type="checkbox" name="">Direção hidraulica</h3>
                <h3><input type="checkbox" name="">Disqueteira</h3>
                <h3><input type="checkbox" name="">DVD Player</h3>
                <h3><input type="checkbox" name="">Encosta de cabeça traseiro</h3>
                <h3><input type="checkbox" name="">Farol de xenonio</h3>
                <h3><input type="checkbox" name="">Freio ABS</h3>
                <h3><input type="checkbox" name="">GPS</h3>
                <h3><input type="checkbox" name="">Limpador traseiro</h3>
                <h3><input type="checkbox" name="">Protetor de caçamba</h3>
                <h3><input type="checkbox" name="">Rádio</h3>
                <h3><input type="checkbox" name="">Rádio e toca fitas</h3>
                <h3><input type="checkbox" name="">Retrovisor fotocromico</h3>
                <h3><input type="checkbox" name="">Retrovisor elétricos</h3>
                <h3><input type="checkbox" name="">Rodas de liga leve</h3>
                <h3><input type="checkbox" name="">Sensor de chuva</h3>
                <h3><input type="checkbox" name="">Sensor de estacionamento</h3>
                <h3><input type="checkbox" name="">Teto solar</h3>
                <h3><input type="checkbox" name="">Tração 4x4</h3>
                <h3><input type="checkbox" name="">Travas elétricas</h3>
                <h3><input type="checkbox" name="">Vidros elétricos</h3>
                <h3><input type="checkbox" name="">Volante com regulagem de altura</h3>
            </div>
            <div class="cambio">
                <h1>Cambio</h1>
                <hr>
                <h3><input type="checkbox" name="">Automático</h3>
                <h3><input type="checkbox" name="">Automática sequencial</h3>
                <h3><input type="checkbox" name="">Automatizada</h3>
                <h3><input type="checkbox" name="">Automatizada dct</h3>
                <h3><input type="checkbox" name="">CVT</h3>
                <h3><input type="checkbox" name="">Manual</h3>
                <h3><input type="checkbox" name="">Semi-Automática</h3>
            </div>
            <div class="combustivel">
                <h1>Combustivel</h1>
                <hr>
                <h3><input type="checkbox" name="">Álcool</h3>
                <h3><input type="checkbox" name="">Álcool e Gás Natural</h3>
                <h3><input type="checkbox" name="">Diesel</h3>
                <h3><input type="checkbox" name="">Gás Natural</h3>
                <h3><input type="checkbox" name="">Gasolina</h3>
                <h3><input type="checkbox" name="">Gasolina e Álcool</h3>
                <h3><input type="checkbox" name="">Gasolina e Elétrico</h3>
                <h3><input type="checkbox" name="">Gasolina e Gás Natural</h3>
                <h3><input type="checkbox" name="">Gasolina, Álcool e Gás Natural</h3>
                <h3><input type="checkbox" name="">Gasolina, Álcool, Gás Natural e Benzina</h3>
            </div>
            <div class="categoria">
                <h1>Categorias</h1>
                <hr>
                <h3><input type="checkbox" name="">Carros 1.0</h3>
                <h3><input type="checkbox" name="">Carros a Diesel</h3>
                <h3><input type="checkbox" name="">Carros Antigos</h3>
                <h3><input type="checkbox" name="">Carros Automaticos</h3>
                <h3><input type="checkbox" name="">Carros Clássicos</h3>
                <h3><input type="checkbox" name="">Carros com 2 Portas</h3>
                <h3><input type="checkbox" name="">Carros de 7 Lugares</h3>
                <h3><input type="checkbox" name="">Carros de Luxo</h3>
                <h3><input type="checkbox" name="">Carros Economicos</h3>
                <h3><input type="checkbox" name="">Carros Elétricos</h3>
                <h3><input type="checkbox" name="">Carros Esportivos</h3>
                <h3><input type="checkbox" name="">Carros Grandes</h3>
                <h3><input type="checkbox" name="">Carros Hibridos</h3>
                <h3><input type="checkbox" name="">Carros Importados</h3>
                <h3><input type="checkbox" name="">Carros para Aplicativos</h3>
                <h3><input type="checkbox" name="">Carros para Familia</h3>
                <h3><input type="checkbox" name="">Carros para PCD</h3>
                <h3><input type="checkbox" name="">Carros Pequenos</h3>
                <h3><input type="checkbox" name="">Carros Populares</h3>
                <h3><input type="checkbox" name="">Hatchers</h3>
                <h3><input type="checkbox" name="">Picapes</h3>
                <h3><input type="checkbox" name="">Sedans</h3>
                <h3><input type="checkbox" name="">SUVs</h3>
            </div>
            <div class="botaolad">
                <button class="button-6">Buscar</button>
            </div>
        </div>
        <div class="direitalad">
            <center>
                <div style="background-color: transparent;" class="wrapper">
                    <div class="form-container">
                        <div class="form-inner">
                            <form class="form" action="#" method="post">
                                <div class="field">
                                    <input type="text" placeholder="Esta procurando um veiculo?" name="search">
                                    <button class="button-6">Procurar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </center>

            <?php
            $search = $_POST['search'];
            if ($search != "") {
                echo "<div class=containerconcea>";
                echo "<div class=rowb>";
                $procurar = "SELECT * FROM carros WHERE car_modelo LIKE '%$search%'";
                $comando = mysqli_query($conn, $procurar);
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
              </button>
              </form>";
                    if (isset($_SESSION['login'])) {
                        if ($codigousu == "1") {
                            echo "<center><form method=post action=PHP/procexcluir.php>
                        <input type=hidden name=cod value=$cod>
                        <button>Excluir</button>
                        </form>
                        <form method=post action=PHP/proceditcar.php>
                        <input type=hidden name=cod value=$cod>
                        <button>Editar</button>
                        </form></center>";
                        }
                    } else {
                        echo "";
                    }
                    echo "</div>";
                }
                echo "</div>
    </div>
    </div>";
            } else {
                $teste = "SELECT * FROM carros";
                $comando = mysqli_query($conn, $teste);
                while ($row = mysqli_fetch_array($comando)) {
                    $tipo = $row['car_tipo'];
                    if ($tipo == "Sedans") {
                        echo "<div class=containerconcea>
        <div class=top-titlea>
        <h3>Sedans</h3>
        <hr>";
                        echo "<div class=rowb>";
                        $carros = "SELECT * FROM carros WHERE car_tipo='Sedans' ORDER BY car_contagem desc LIMIT 3";
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

                $teste = "SELECT * FROM carros";
                $comando = mysqli_query($conn, $teste);
                while ($row = mysqli_fetch_array($comando)) {
                    $tipo = $row['car_tipo'];
                    if ($tipo == "Picapes") {
                        echo "<div class=containerconcea>
    <div class=top-titlea>
    <h3>Picapes</h3>
    <hr>";
                        echo "<div class=rowb>";
                        $carros = "SELECT * FROM carros WHERE car_tipo='Picapes' ORDER BY car_contagem desc LIMIT 3";
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

                $teste = "SELECT * FROM carros";
                $comando = mysqli_query($conn, $teste);
                while ($row = mysqli_fetch_array($comando)) {
                    $tipo = $row['car_tipo'];
                    if ($tipo == "Hatchers") {
                        echo "<div class=containerconcea>
        <div class=top-titlea>
        <h3>Hatchers</h3>
        <hr>";
                        echo "<div class=rowb>";
                        $carros = "SELECT * FROM carros WHERE car_tipo='Hatchers' ORDER BY car_contagem desc LIMIT 3";
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

                $teste = "SELECT * FROM carros";
                $comando = mysqli_query($conn, $teste);
                while ($row = mysqli_fetch_array($comando)) {
                    $tipo = $row['car_tipo'];
                    if ($tipo == "SUVs") {
                        echo "<div class=containerconcea>
    <div class=top-titlea>
    <h3>SUVs</h3>
    <hr>";
                        echo "<div class=rowb>";
                        $carros = "SELECT * FROM carros WHERE car_tipo='SUVs' ORDER BY car_contagem desc LIMIT 3";
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

                $teste = "SELECT * FROM carros";
                $comando = mysqli_query($conn, $teste);
                while ($row = mysqli_fetch_array($comando)) {
                    $tipo = $row['car_tipo'];
                    if ($tipo == "Esportivos") {
                        echo "<div class=containerconcea>
<div class=top-titlea>
<h3>Esportivos</h3>
<hr>";
                        echo "<div class=rowb>";
                        $carros = "SELECT * FROM carros WHERE car_tipo='Esportivos' ORDER BY car_contagem desc LIMIT 3";
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

                $teste = "SELECT * FROM carros";
                $comando = mysqli_query($conn, $teste);
                while ($row = mysqli_fetch_array($comando)) {
                    $tipo = $row['car_tipo'];
                    if ($tipo == "Eletricos") {
                        echo "<div class=containerconcea>
<div class=top-titlea>
<h3>Eletricos</h3>
<hr>";
                        echo "<div class=rowb>";
                        $carros = "SELECT * FROM carros WHERE car_tipo='Eletricos' ORDER BY car_contagem desc LIMIT 3";
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
            ?>

            <?php
            echo "<center style=margin-bottom:20px;><a href='Concessionarias.php'><button class=button-6>Voltar</button></a></center>";
            ?>
        </div>
    </div>
    <!--Rodapé-->
    <?php require "PHP/rodape.php";
    echo $_SESSION['rodape'];
    ?>
    <!--Rodapé Fechar-->
    <script>
        const clearInput = () => {
            const input = document.getElementsByTagName("input")[0];
            input.value = "";
        };

        const clearBtn = document.getElementById("clear-btn");
        clearBtn.addEventListener("click", clearInput);
    </script>
</body>

</html>