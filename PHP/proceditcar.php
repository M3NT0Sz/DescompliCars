<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Imagens/DescomplicarsIcon.png" rel="icon">
    <link href="../CSS/style.css" rel="stylesheet">
    <link href="../CSS/carros.css" rel="stylesheet">
    <link href="../CSS/usuarios.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>DescompliCars</title>
</head>

<body>
    <!--MenuBar-->
    <?php require "marcas.php";
    echo $_SESSION['cima'];
    ?>
    <!--Fecha MenuBar-->
    <div style="display: flex; justify-content: center; align-items: center; text-align: center;">
    <?php
    $cod = $_POST['cod'];
    $editcar = "SELECT * FROM carros WHERE car_cod=$cod";
    $comando = mysqli_query($conn, $editcar);
    while ($row = mysqli_fetch_array($comando)) {
        $marca = $row['car_marca'];
        $modelo = $row['car_modelo'];
        $tipo = $row['car_tipo'];
        $imagem = base64_encode($row['car_image']);
        echo "
        <form method=post action=editcar.php>
            <input type=hidden name=cod value='$cod'><br>
            <h1>Marca <input style='font-size:20px;' type=text name=marca value='$marca'></h1><br>
            <h1>Modelo <input style='font-size:20px;' type=text name=modelo value='$modelo'></h1><br>
            <h1>Tipo<select name=tipo style='font-size:20px;'>
                        <option value=$tipo>$tipo</option>
                        <option value=SUVs>SUVs</option>
                        <option value=Hatchers>Hatchers</option>
                        <option value=Picapes>Picapes</option>
                        <option value=Eletricos>Eletricos</option>
                        <option value=Sedans>Sedans</option>
                    </select></h1>";
    ?>
        <h1 style="margin-top: 20px;">Opcionais</h1>
        <hr>
        <?php
        $opcionais = "SELECT * FROM especificacoes WHERE esp_tipo LIKE '%Opcionais%'";
        $comando = mysqli_query($conn, $opcionais);
        while ($row = mysqli_fetch_array($comando)) {
            $esp = $row['esp_especificacoes'];
            echo "<h3><input style='font-size:20px;' type=checkbox id='$esp' value='$esp' onchange='addTexto()'>$esp</h3>";
        }
        ?>
        <div class="cambio" style="margin-top: 20px;">
            <h1>Cambio</h1>
            <hr>
            <?php
            $Cambio = "SELECT * FROM especificacoes WHERE esp_tipo LIKE '%Cambio%'";
            $comando = mysqli_query($conn, $Cambio);
            while ($row = mysqli_fetch_array($comando)) {
                $esp = $row['esp_especificacoes'];
                echo "<h3><input style='font-size:30px;' type=checkbox id='$esp' value='$esp' onchange='addTexto()'>$esp</h3>";
            }
            ?>
        </div>
        <div class="combustivel" style="margin-top: 20px;">
            <h1>Combustivel</h1>
            <hr>
            <?php
            $Combustivel = "SELECT * FROM especificacoes WHERE esp_tipo LIKE '%Combustivel%'";
            $comando = mysqli_query($conn, $Combustivel);
            while ($row = mysqli_fetch_array($comando)) {
                $esp = $row['esp_especificacoes'];
                echo "<h3><input style='font-size:30px;' type=checkbox id='$esp' value='$esp' onchange='addTexto()'>$esp</h3>";
            }
            ?>
        </div>
        <div class="categoria" style="margin-top: 20px;">
            <h1>Categorias</h1>
            <hr>
            <?php
            $Categorias = "SELECT * FROM especificacoes WHERE esp_tipo LIKE '%Categorias%'";
            $comando = mysqli_query($conn, $Categorias);
            while ($row = mysqli_fetch_array($comando)) {
                $esp = $row['esp_especificacoes'];
                echo "<h3><input style='font-size:30px;' type=checkbox id='$esp' value='$esp' onchange='addTexto()'>$esp</h3>";
            }
            ?>
            <input type="hidden" name="Tudo" id="Tudo">
        <?php
        echo "
            <button class=button-6>Editar</button>
            <a href='../index.php'><button type=button class=button-6 style='margin-bottom:20px;margin-top:20px;'>Voltar</button></a>
        </form>
        ";
        }
        ?>
        </div>
        </div>
        <!--Rodapé-->
        <?php require "rodape2.php";
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
</body>

</html>