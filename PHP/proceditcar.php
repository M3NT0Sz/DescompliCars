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
        $anomod = $row['car_anomod'];
        $anofab = $row['car_anofab'];
        $versao = $row['car_versao'];
        $tipo = $row['car_tipo'];
        $imagem = base64_encode($row['car_image']);
        echo "
        <form method=post action=editcar.php>
            <input type=hidden name=cod value='$cod'><br>
            Marca <input type=text name=marca value='$marca'><br>
            Modelo <input type=text name=modelo value='$modelo'><br>
            Ano Modelo <input type=text name=anomod value='$anomod'><br>
            Ano Fabricação <input type=text name=anofab value='$anofab'><br>
            Versao <input type=text name=versao value='$versao'><br>
            <h2>Tipo</h2><select name=tipo>
                        <option value=$tipo>$tipo</option>
                        <option value=SUVs>SUVs</option>
                        <option value=Hatchers>Hatchers</option>
                        <option value=Picapes>Picapes</option>
                        <option value=Eletricos>Eletricos</option>
                        <option value=Sedans>Sedans</option>
                    </select>
            Imagem <input type=file name=imagem accept=image/*><br>
            <button>Editar</button>
        </form>
        ";
    }
    ?>
</body>

</html>