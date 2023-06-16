<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="Imagens/DescomplicarsIcon.png" rel="icon">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/concessionarias.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DescompliCars</title>
</head>

<body>
    <!--MenuBar-->
    <?php require "PHP/verificar.php";
    echo $_SESSION['cima'];
    ?>
    <!--Fecha MenuBar-->

    <div class="containerconce">
        <div class="top-title">
            <h3>Marcas</h3>
            <hr>
            <?php
            $marcas = "SELECT * FROM marcas ORDER BY mar_nome";
            $comando = mysqli_query($conn, $marcas);
            echo "<div class=row>";
            while ($row = mysqli_fetch_array($comando)) {
                $cod = $row['mar_cod'];
                $marca = $row['mar_nome'];
                $imagem = base64_encode($row['mar_image']);
                echo "
                <form method=post action=Marcas.php>
                <button class=featured-box>
                <div class=featured-img>
                    <img src='data:image/jpeg;base64,$imagem' style=padding:10px;>
                    <input type=hidden name=cod value=$cod>
                    <h1>$marca</h1>
                </div>
                </button>
                </form>
                ";
            }
            ?>
        </div>
    </div>
    </div>
    <!--Rodapé-->
    <?php require "PHP/rodape.php";
    echo $_SESSION['rodape'];
    ?>
    <!--Rodapé Fechar-->
</body>

</html>