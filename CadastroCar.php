<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="Imagens/DescomplicarsIcon.png" rel="icon">
    <link href="CSS/style.css" rel="stylesheet">
    <link href="CSS/cadastrocar.css" rel="stylesheet">
    <link href="CSS/testecad.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DescompliCars</title>
</head>

<body onload="esconderMod(); esconderAnoMod(); esconderAnoFab(); esconderVersao();">
    <!--MenuBar-->
    <?php require "PHP/verificar.php";
    echo $_SESSION['cima'];
    ?>
    <!--Fecha MenuBar-->

    <div class="cadquad">
        <div class="cadquadrado">
            <h1>Cadastre seu veiculo</h1>
            <form method="post" action="PHP/prod_cadCar.php">
                <div class=caddeita>
                    <h2>Marca</h2>
                    <select class=marca name=marca id=marca onclick='esconderMod()'>
                        <option value='Escolha uma Marca'>
                            Escolha uma Marca
                        </option>
                        <option value='Audi'>
                            Audi
                        </option>
                        <option value=BMW>
                            BMW
                        </option>
                        <option value=CAOA>
                            CAOA Chery
                        </option>
                        <option value=Chevrolet>
                            Chevrolet
                        </option>
                        <option value=Citroen>
                            Citroen
                        </option>
                        <option value=Fiat>
                            Fiat
                        </option>
                        <option value=Ford>
                            Ford
                        </option>
                        <option value=Honda>
                            Honda
                        </option>
                        <option value=Hyundai>
                            Hyundai
                        </option>
                        <option value=Jepp>
                            Jepp
                        </option>
                        <option value=Kia>
                            Kia
                        </option>
                        <option value=Honda>
                            Land Rover
                        </option>
                        <option value=Honda>
                            Mercedes
                        </option>
                        <option value=Honda>
                            Mini
                        </option>
                        <option value=Honda>
                            Mitsubishi
                        </option>
                        <option value=Honda>
                            Nissan
                        </option>
                        <option value=Honda>
                            Peugeot
                        </option>
                        <option value=Honda>
                            Porche
                        </option>
                        <option value=Honda>
                            RAM
                        </option>
                        <option value=Honda>
                            Renault
                        </option>
                        <option value=Honda>
                            Subaru
                        </option>
                        <option value=Honda>
                            Suzuki
                        </option>
                        <option value=Honda>
                            Toyota
                        </option>
                        <option value=Honda>
                            Volkswagen
                        </option>
                        <option value=Honda>
                            Volvo
                        </option>
                    </select>
                </div>
                <div class=caddeita id=cadmod>
                    <h2>Modelo</h2><input type="text" name="modelo" id="modelo">
                </div>
                <div class="caddeita" id="cadAnoMod">
                    <h2>Ano Modelo</h2><input type="number" name="anomod" min="1990" max="2099" id="anomodelo" onclick="esconderAnoFab()">
                </div>
                <div class="caddeita" id="cadAnoFab">
                    <h2>Ano De Fabricação</h2><input type="number" name="anofab" min="1990" max="2099" id="anofab" onclick="esconderVersao()">
                </div>
                <div class="caddeita" id="cadVersao">
                    <h2>Versão</h2><input type="text" name="versao">
                </div>
                <div class="caddeita">
                    <h2>Imagem do veículo</h2>
                    <input type="file" name="imagem" accept="image/*">
                </div>
                <div class="buttomD">
                    <button class="butom " type="submit"> Cadastrar</button>
                    <div>

            </form>
        </div>
    </div>
    </div>
    </div>

    <!--Rodapé-->
    <?php require "PHP/rodape.php";
    echo $_SESSION['rodape'];
    ?>
    <!--Rodapé Fechar-->
    <script src="Java/cadcarros.js"></script>
</body>

</html>