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
            <form method="post" action="PHP/prod_cadCar.php" enctype="multipart/form-data">
                <div class=caddeita>
                    <h2>Marca</h2>
                    <select class=marca name=marca id=marca onclick='esconderMod()'>
                        <?php
                        $cars = [
                            'Audi',
                            'BMW',
                            'CAOA Chery',
                            'Chevrolet',
                            'Citroen',
                            'Ferrari',
                            'Fiat',
                            'Ford',
                            'Honda',
                            'Hyundai',
                            'Jeep',
                            'Kia',
                            'Lamborghini',
                            'LandRover',
                            'Mercedes',
                            'Mini',
                            'Mitsubishi',
                            'Nissan',
                            'Peugeot',
                            'Porche',
                            'RAM',
                            'Renault',
                            'Subaru',
                            'Suzuki',
                            'Toyota',
                            'Volkswagen',
                            'Volvo'
                        ];
                        echo "<option value='Escolha uma Marca'>
                        Escolha uma Marca
                    </option>";
                        for ($x = 0; $x < sizeof($cars); $x++) {
                            echo "<option value=$cars[$x]>
                            " . $cars[$x] . "
                        </option>";
                        }
                        ?>
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
                <div class="caddeita" id="cadVersao">
                    <h2>Tipo</h2><select name="tipo" id="">
                        <option value="SUVs">SUVs</option>
                        <option value="Hatchers">Hatchers</option>
                        <option value="Picapes">Picapes</option>
                        <option value="Eletricos">Eletricos</option>
                        <option value="Sedans">Sedans</option>
                    </select>
                </div>
                <div class="caddeita">
                    <h2>Imagem do veículo</h2>
                    <input type="file" name="imagem" accept="image/*">
                </div>
                <div class="buttomD">
                    <button class="butom " type="submit">Cadastrar</button>
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