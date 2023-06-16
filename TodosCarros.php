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
                <?php
                $opcionais = "SELECT * FROM especificacoes WHERE esp_tipo LIKE '%Opcionais%'";
                $comando = mysqli_query($conn, $opcionais);
                while ($row = mysqli_fetch_array($comando)) {
                    $esp = $row['esp_especificacoes'];
                    echo "<h3 style='margin-bottom:10px'><input type=checkbox id='$esp' onchange='addTexto()'>$esp</h3>";
                }
                ?>
            </div>
            <div class="cambio">
                <h1>Cambio</h1>
                <hr>
                <?php
                $Cambio = "SELECT * FROM especificacoes WHERE esp_tipo LIKE '%Cambio%'";
                $comando = mysqli_query($conn, $Cambio);
                while ($row = mysqli_fetch_array($comando)) {
                    $esp = $row['esp_especificacoes'];
                    echo "<h3 style='margin-bottom:10px'><input type=checkbox id='$esp' onchange='addTexto()'>$esp</h3>";
                }
                ?>
            </div>
            <div class="combustivel">
                <h1>Combustivel</h1>
                <hr>
                <?php
                $Combustivel = "SELECT * FROM especificacoes WHERE esp_tipo LIKE '%Combustivel%'";
                $comando = mysqli_query($conn, $Combustivel);
                while ($row = mysqli_fetch_array($comando)) {
                    $esp = $row['esp_especificacoes'];
                    echo "<h3 style='margin-bottom:10px'><input type=checkbox id='$esp' onchange='addTexto()'>$esp</h3>";
                }
                ?>
            </div>
            <div class="categoria">
                <h1>Categorias</h1>
                <hr>
                <?php
                $Categorias = "SELECT * FROM especificacoes WHERE esp_tipo LIKE '%Categorias%'";
                $comando = mysqli_query($conn, $Categorias);
                while ($row = mysqli_fetch_array($comando)) {
                    $esp = $row['esp_especificacoes'];
                    echo "<h3 style='margin-bottom:10px'><input type=checkbox id='$esp' onchange='addTexto()'>$esp</h3>";
                }
                ?>
            </div>
            <div class="botaolad">
                <form action="#" method="post">
                    <input type="text" name="Tudo" id="Tudo">
                    <button class="button-6">Buscar</button>
                </form>
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
            $tudo = $_POST['Tudo'];
            if ($tudo != "") {
                echo "<div class=containerconcea>";
                echo "<div class=rowb>";
                $procurar = "SELECT * FROM carros WHERE car_outros LIKE '%$tudo%'";
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
                        if ($codigousu == "1" || $codigousu == "2") {
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
            }
            ?>
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
                        if ($codigousu == "1" || $codigousu == "2") {
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
                                if ($codigousu == "1" || $codigousu == "2") {
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
                                if ($codigousu == "1" || $codigousu == "2") {
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
                                if ($codigousu == "1" || $codigousu == "2") {
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
                                if ($codigousu == "1" || $codigousu == "2") {
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
                                if ($codigousu == "1" || $codigousu == "2") {
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
                                if ($codigousu == "1" || $codigousu == "2") {
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
        function addTexto() {
            var checkboxAirbag = document.getElementById("Airbag");
            var checkboxArCondicionado = document.getElementById("Ar-condicionado");
            var checkboxDireçãoHidraulica = document.getElementById("Direção hidraulica");
            var checkboxFreioABS = document.getElementById("Freio ABS");
            var checkboxGPS = document.getElementById("GPS");
            var checkboxRetrovisorElétricos = document.getElementById("Retrovisor elétricos");
            var checkboxSensorDeEstacionamento = document.getElementById("Sensor de estacionamento");
            var checkboxTetoSolar = document.getElementById("Teto solar");
            var checkboxTração4x4 = document.getElementById("Tração 4x4");
            var checkboxTravasElétricas = document.getElementById("Travas elétricas");
            var checkboxVidrosElétricos = document.getElementById("Vidros elétricos");
            var checkboxAutomático = document.getElementById("Automático");
            var checkboxAutomáticaSequencial = document.getElementById("Automática sequencial");
            var checkboxManual = document.getElementById("Manual");
            var checkboxÁlcool = document.getElementById("Álcool");
            var checkboxDiesel = document.getElementById("Diesel");
            var checkboxGásNatural = document.getElementById("Gás Natural");
            var checkboxGasolina = document.getElementById("Gasolina");
            var checkboxElétrico = document.getElementById("Elétrico");
            var checkbox10 = document.getElementById("1.0");
            var checkboxAntigos = document.getElementById("Antigos");
            var checkbox2Portas = document.getElementById("2 Portas");
            var checkbox7Lugares = document.getElementById("7 Lugares");
            var checkboxLuxo = document.getElementById("Luxo");
            var checkboxEconomicos = document.getElementById("Economicos");
            var checkboxElétricos = document.getElementById("Elétricos");
            var checkboxEsportivos = document.getElementById("Esportivos");
            var checkboxGrandes = document.getElementById("Grandes");
            var checkboxHibridos = document.getElementById("Hibridos");
            var checkboxImportados = document.getElementById("Importados");
            var checkboxFamilia = document.getElementById("Familia");
            var checkboxPequenos = document.getElementById("Pequenos");
            var checkboxPopulares = document.getElementById("Populares");
            var campoTudo = document.getElementById("Tudo");

            if (!Tudo.value.match("Airbag")) {
                if (checkboxAirbag.checked) {
                    campoTudo.value += " Airbag";
                }
            } else {
                if (!checkboxAirbag.checked) {
                    campoTudo.value = campoTudo.value.replace("Airbag", "");
                }
            }

            if (!Tudo.value.match("Ar-condicionado")) {
                if (checkboxArCondicionado.checked) {
                    campoTudo.value += " Ar-condicionado";
                }
            } else {
                if (!checkboxArCondicionado.checked) {
                    campoTudo.value = campoTudo.value.replace("Ar-condicionado", "");
                }
            }

            if (!Tudo.value.match("Direção hidraulica")) {
                if (checkboxDireçãoHidraulica.checked) {
                    campoTudo.value += " Direção hidraulica";
                }
            } else {
                if (!checkboxDireçãoHidraulica.checked) {
                    campoTudo.value = campoTudo.value.replace("Direção hidraulica", "");
                }
            }
            if (!Tudo.value.match("Freio ABS")) {
                if (checkboxFreioABS.checked) {
                    campoTudo.value += " Freio ABS";
                }
            } else {
                if (!checkboxFreioABS.checked) {
                    campoTudo.value = campoTudo.value.replace("Freio ABS", "");
                }
            }
            if (!Tudo.value.match("GPS")) {
                if (checkboxGPS.checked) {
                    campoTudo.value += " GPS";
                }
            } else {
                if (!checkboxGPS.checked) {
                    campoTudo.value = campoTudo.value.replace("GPS", "");
                }
            }
            if (!Tudo.value.match("Retrovisor elétricos")) {
                if (checkboxRetrovisorElétricos.checked) {
                    campoTudo.value += " Retrovisor elétricos";
                }
            } else {
                if (!checkboxRetrovisorElétricos.checked) {
                    campoTudo.value = campoTudo.value.replace("Retrovisor elétricos", "");
                }
            }
            if (!Tudo.value.match("Sensor de estacionamento")) {
                if (checkboxSensorDeEstacionamento.checked) {
                    campoTudo.value += " Sensor de estacionamento";
                }
            } else {
                if (!checkboxSensorDeEstacionamento.checked) {
                    campoTudo.value = campoTudo.value.replace("Sensor de estacionamento", "");
                }
            }
            if (!Tudo.value.match("Teto solar")) {
                if (checkboxTetoSolar.checked) {
                    campoTudo.value += " Teto solar";
                }
            } else {
                if (!checkboxTetoSolar.checked) {
                    campoTudo.value = campoTudo.value.replace("Teto solar", "");
                }
            }
            if (!Tudo.value.match("Tração 4x4")) {
                if (checkboxTração4x4.checked) {
                    campoTudo.value += " Tração 4x4";
                }
            } else {
                if (!checkboxTração4x4.checked) {
                    campoTudo.value = campoTudo.value.replace("Tração 4x4", "");
                }
            }
            if (!Tudo.value.match("Travas elétricas")) {
                if (checkboxTravasElétricas.checked) {
                    campoTudo.value += " Travas elétricas";
                }
            } else {
                if (!checkboxTravasElétricas.checked) {
                    campoTudo.value = campoTudo.value.replace("Travas elétricas", "");
                }
            }
            if (!Tudo.value.match("Vidros elétricos")) {
                if (checkboxVidrosElétricos.checked) {
                    campoTudo.value += " Vidros elétricos";
                }
            } else {
                if (!checkboxVidrosElétricos.checked) {
                    campoTudo.value = campoTudo.value.replace("Vidros elétricos", "");
                }
            }
            if (!Tudo.value.match("Automático")) {
                if (checkboxAutomático.checked) {
                    campoTudo.value += " Automático";
                }
            } else {
                if (!checkboxAutomático.checked) {
                    campoTudo.value = campoTudo.value.replace("Automático", "");
                }
            }
            if (!Tudo.value.match("Automática sequencial")) {
                if (checkboxAutomáticaSequencial.checked) {
                    campoTudo.value += " Automática sequencial";
                }
            } else {
                if (!checkboxAutomáticaSequencial.checked) {
                    campoTudo.value = campoTudo.value.replace("Automática sequencial", "");
                }
            }
            if (!Tudo.value.match("Manual")) {
                if (checkboxManual.checked) {
                    campoTudo.value += " Manual";
                }
            } else {
                if (!checkboxManual.checked) {
                    campoTudo.value = campoTudo.value.replace("Manual", "");
                }
            }
            if (!Tudo.value.match("Álcool")) {
                if (checkboxÁlcool.checked) {
                    campoTudo.value += " Álcool";
                }
            } else {
                if (!checkboxÁlcool.checked) {
                    campoTudo.value = campoTudo.value.replace("Álcool", "");
                }
            }
            if (!Tudo.value.match("Diesel")) {
                if (checkboxDiesel.checked) {
                    campoTudo.value += " Diesel";
                }
            } else {
                if (!checkboxDiesel.checked) {
                    campoTudo.value = campoTudo.value.replace("Diesel", "");
                }
            }
            if (!Tudo.value.match("Gás Natural")) {
                if (checkboxGásNatural.checked) {
                    campoTudo.value += " Gás Natural";
                }
            } else {
                if (!checkboxGásNatural.checked) {
                    campoTudo.value = campoTudo.value.replace("Gás Natural", "");
                }
            }
            if (!Tudo.value.match("Gasolina")) {
                if (checkboxGasolina.checked) {
                    campoTudo.value += " Gasolina";
                }
            } else {
                if (!checkboxGasolina.checked) {
                    campoTudo.value = campoTudo.value.replace("Gasolina", "");
                }
            }
            if (!Tudo.value.match("Elétrico")) {
                if (checkboxElétrico.checked) {
                    campoTudo.value += " Elétrico";
                }
            } else {
                if (!checkboxElétrico.checked) {
                    campoTudo.value = campoTudo.value.replace("Elétrico", "");
                }
            }
            if (!Tudo.value.match("1.0")) {
                if (checkbox10.checked) {
                    campoTudo.value += " 1.0";
                }
            } else {
                if (!checkbox10.checked) {
                    campoTudo.value = campoTudo.value.replace("1.0", "");
                }
            }
            if (!Tudo.value.match("Antigos")) {
                if (checkboxAntigos.checked) {
                    campoTudo.value += " Antigos";
                }
            } else {
                if (!checkboxAntigos.checked) {
                    campoTudo.value = campoTudo.value.replace("Antigos", "");
                }
            }
            if (!Tudo.value.match("2 Portas")) {
                if (checkbox2Portas.checked) {
                    campoTudo.value += " 2 Portas";
                }
            } else {
                if (!checkbox2Portas.checked) {
                    campoTudo.value = campoTudo.value.replace("2 Portas", "");
                }
            }
            if (!Tudo.value.match("7 Lugares")) {
                if (checkbox7Lugares.checked) {
                    campoTudo.value += " 7 Lugares";
                }
            } else {
                if (!checkbox7Lugares.checked) {
                    campoTudo.value = campoTudo.value.replace("7 Lugares", "");
                }
            }
            if (!Tudo.value.match("Luxo")) {
                if (checkboxLuxo.checked) {
                    campoTudo.value += " Luxo";
                }
            } else {
                if (!checkboxLuxo.checked) {
                    campoTudo.value = campoTudo.value.replace("Luxo", "");
                }
            }
            if (!Tudo.value.match("Economicos")) {
                if (checkboxEconomicos.checked) {
                    campoTudo.value += " Economicos";
                }
            } else {
                if (!checkboxEconomicos.checked) {
                    campoTudo.value = campoTudo.value.replace("Economicos", "");
                }
            }
            if (!Tudo.value.match("Elétricos")) {
                if (checkboxElétricos.checked) {
                    campoTudo.value += " Elétricos";
                }
            } else {
                if (!checkboxElétricos.checked) {
                    campoTudo.value = campoTudo.value.replace("Elétricos", "");
                }
            }
            if (!Tudo.value.match("Esportivos")) {
                if (checkboxEsportivos.checked) {
                    campoTudo.value += " Esportivos";
                }
            } else {
                if (!checkboxEsportivos.checked) {
                    campoTudo.value = campoTudo.value.replace("Esportivos", "");
                }
            }
            if (!Tudo.value.match("Grandes")) {
                if (checkboxGrandes.checked) {
                    campoTudo.value += " Grandes";
                }
            } else {
                if (!checkboxGrandes.checked) {
                    campoTudo.value = campoTudo.value.replace("Grandes", "");
                }
            }
            if (!Tudo.value.match("Hibridos")) {
                if (checkboxHibridos.checked) {
                    campoTudo.value += " Hibridos";
                }
            } else {
                if (!checkboxHibridos.checked) {
                    campoTudo.value = campoTudo.value.replace("Hibridos", "");
                }
            }
            if (!Tudo.value.match("Importados")) {
                if (checkboxImportados.checked) {
                    campoTudo.value += " Importados";
                }
            } else {
                if (!checkboxImportados.checked) {
                    campoTudo.value = campoTudo.value.replace("Importados", "");
                }
            }
            if (!Tudo.value.match("Familia")) {
                if (checkboxFamilia.checked) {
                    campoTudo.value += " Familia";
                }
            } else {
                if (!checkboxFamilia.checked) {
                    campoTudo.value = campoTudo.value.replace("Familia", "");
                }
            }
            if (!Tudo.value.match("Populares")) {
                if (checkboxPopulares.checked) {
                    campoTudo.value += " Populares";
                }
            } else {
                if (!checkboxPopulares.checked) {
                    campoTudo.value = campoTudo.value.replace("Populares", "");
                }
            }
            if (!Tudo.value.match("Pequenos")) {
                if (checkboxPequenos.checked) {
                    campoTudo.value += " Pequenos";
                }
            } else {
                if (!checkboxPequenos.checked) {
                    campoTudo.value = campoTudo.value.replace("Pequenos", "");
                }
            }
        }
    </script>
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