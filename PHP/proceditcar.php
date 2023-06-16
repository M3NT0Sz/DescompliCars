<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carros</title>
</head>

<body>
    <?php
    session_start();
    include_once("conexao.php");
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
            Marca <input type=text name=marca value='$marca'><br>
            Modelo <input type=text name=modelo value='$modelo'><br>
            <h2>Tipo</h2><select name=tipo>
                        <option value=$tipo>$tipo</option>
                        <option value=SUVs>SUVs</option>
                        <option value=Hatchers>Hatchers</option>
                        <option value=Picapes>Picapes</option>
                        <option value=Eletricos>Eletricos</option>
                        <option value=Sedans>Sedans</option>
                    </select>";
    ?>
        Imagem <input type="file" name="imagem" accept="image/*"><br>

        <h1>Opcionais</h1>
        <hr>
        <?php
        $opcionais = "SELECT * FROM especificacoes WHERE esp_tipo LIKE '%Opcionais%'";
        $comando = mysqli_query($conn, $opcionais);
        while ($row = mysqli_fetch_array($comando)) {
            $esp = $row['esp_especificacoes'];
            echo "<h3><input type=checkbox id='$esp'>$esp</h3>";
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
                echo "<h3><input type=checkbox id='$esp'>$esp</h3>";
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
                echo "<h3><input type=checkbox id='$esp'>$esp</h3>";
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
                echo "<h3><input type=checkbox id='$esp'>$esp</h3>";
            }
            ?>
            <input type="text" id="Tudo">
        <?php
        echo "
            <button>Editar</button>
            <a href='../index.php'><button type=button>voltar</button></a>
        </form>
        ";
    }



        ?>
        <script>
            function outros() {
                if (document.getElementById("AirBag").checked = false) {
                    document.getElementById('Tudo').value = "";
                } else if (document.getElementById("AirBag").checked = true) {
                    document.getElementById('Tudo').value = document.getElementById('Tudo').value + ", AirBag";
                }
            }
        </script>
</body>

</html>