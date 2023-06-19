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
                    echo "<h3 style='margin-bottom:10px'><input type=checkbox value='$esp' id='$esp' onchange='addTexto()'>$esp</h3>";
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
                    echo "<h3 style='margin-bottom:10px'><input type=checkbox value='$esp' id='$esp' onchange='addTexto()'>$esp</h3>";
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
                    echo "<h3 style='margin-bottom:10px'><input type=checkbox value='$esp' id='$esp' onchange='addTexto()'>$esp</h3>";
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
                    echo "<h3 style='margin-bottom:10px'><input type=checkbox value='$esp' id='$esp' onchange='addTexto()'>$esp</h3>";
                }
                ?>
            </div>
            <div class="botaolad">
                <form action="#" method="post">
                    <input type="hidden" name="Tudo" id="Tudo">
                    <button style="margin-bottom: 20px;" class="button-6">Buscar</button>
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
                $carrosExibidos = array();
                $tudo = explode(",", $tudo);
                echo "<div class=containerconcea style=flex-direction:row;display:flex;>";
                echo "<div class=rowb style=flex-direction:row;display:flex;>";
                $procurar = "SELECT * FROM carros WHERE 1 = 1";
                foreach ($tudo as $valor) {
                    $procurar .= " AND car_outros LIKE '%$valor%' = 1";
                }
                $comando = mysqli_query($conn, $procurar);
                while ($row = mysqli_fetch_array($comando)) {
                    $cod = $row['car_cod'];
                    $marca = $row['car_marca'];
                    $modelo = $row['car_modelo'];
                    $tipo = $row['car_tipo'];
                    $outro = $row['car_outros'];
                    $imagem = base64_encode($row['car_image']);
                    if (in_array($cod, $carrosExibidos)) {
                        continue; // Ir para a próxima iteração do loop sem exibir o carro novamente
                    }
                    $carrosExibidos[] = $cod;

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
                echo "</div>";
                echo "</div>";
                echo "<br><center style=margin-bottom:20px;><a href='index.php'><button class=button-6>Voltar</button></a></center>";
                echo "</div>
                </div>";
            } else {
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
                    echo "</div>";
                    echo "<br><center style=margin-bottom:20px;><a href='index.php'><button class=button-6>Voltar</button></a></center>";

                    echo "</div>
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
                    echo "</div></div></div>";

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
                    echo "<br><center style=margin-bottom:20px;><a href='index.php'><button class=button-6>Voltar</button></a></center>";
                }
            }
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
            var Tudo = document.getElementById("Tudo")
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            var selecionados = [];

            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    selecionados.push(checkboxes[i].value);
                }
            }
            selecionados = selecionados.sort();
            Tudo.value = selecionados
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