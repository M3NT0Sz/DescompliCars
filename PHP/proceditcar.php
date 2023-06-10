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
                <h3><input type="checkbox" name="a" id="Airbag" onclick="outros()">Airbag</h3>
                <h3><input type="checkbox" name="a" id="Alarme">Alarme</h3>
                <h3><input type="checkbox" name="a" id="Ar-condicionado">Ar-condicionado</h3>
                <h3><input type="checkbox" name="a" id="Ar Quente">Ar Quente</h3>
                <h3><input type="checkbox" name="a" id="Banco com regulagem de altura">Banco com regulagem de altura</h3>
                <h3><input type="checkbox" name="a" id="Banco dianteiros com aquecimento">Banco dianteiros com aquecimento</h3>
                <h3><input type="checkbox" name="a" id="Bancos em couro">Bancos em couro</h3>
                <h3><input type="checkbox" name="a" id="Capota Maritima">Capota Maritima</h3>
                <h3><input type="checkbox" name="a" id="CD e MP3 player">CD e MP3 player</h3>
                <h3><input type="checkbox" name="a" id="CD player">CD player</h3>
                <h3><input type="checkbox" name="a" id="Computador de bordo">Computador de bordo</h3>
                <h3><input type="checkbox" name="a" id="Controle automatico de velocidade">Controle automatico de velocidade</h3>
                <h3><input type="checkbox" name="a" id="Controle de tração">Controle de tração</h3>
                <h3><input type="checkbox" name="a" id="Desembaçador traseiro">Desembaçador traseiro</h3>
                <h3><input type="checkbox" name="a" id="Direção hidraulica">Direção hidraulica</h3>
                <h3><input type="checkbox" name="a" id="Disqueteira">Disqueteira</h3>
                <h3><input type="checkbox" name="a" id="DVD Player">DVD Player</h3>
                <h3><input type="checkbox" name="a" id="Encosta de cabeça traseiro">Encosta de cabeça traseiro</h3>
                <h3><input type="checkbox" name="a" id="Farol de xenonio">Farol de xenonio</h3>
                <h3><input type="checkbox" name="a" id="Freio ABS">Freio ABS</h3>
                <h3><input type="checkbox" name="a" id="GPS">GPS</h3>
                <h3><input type="checkbox" name="a" id="Limpador traseiro">Limpador traseiro</h3>
                <h3><input type="checkbox" name="a" id="Protetor de caçamba">Protetor de caçamba</h3>
                <h3><input type="checkbox" name="a" id="Rádio">Rádio</h3>
                <h3><input type="checkbox" name="a" id="Rádio e toca fitas">Rádio e toca fitas</h3>
                <h3><input type="checkbox" name="a" id="Retrovisor fotocromico">Retrovisor fotocromico</h3>
                <h3><input type="checkbox" name="a" id="Retrovisor elétricos">Retrovisor elétricos</h3>
                <h3><input type="checkbox" name="a" id="Rodas de liga leve">Rodas de liga leve</h3>
                <h3><input type="checkbox" name="a" id="Sensor de chuva">Sensor de chuva</h3>
                <h3><input type="checkbox" name="a" id="Sensor de estacionamento">Sensor de estacionamento</h3>
                <h3><input type="checkbox" name="a" id="Teto solar">Teto solar</h3>
                <h3><input type="checkbox" name="a" id="Tração 4x4">Tração 4x4</h3>
                <h3><input type="checkbox" name="a" id="Travas elétricas">Travas elétricas</h3>
                <h3><input type="checkbox" name="a" id="Vidros elétricos">Vidros elétricos</h3>
                <h3><input type="checkbox" name="a" id="Volante com regulagem de altura">Volante com regulagem de altura</h3>
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
        function outros(){
            var AirBag = document.querySelector("#AirBag")
            if(AirBag.checked == true){
                document.getElementById('Tudo').value = AirBag.value;
            }
        }
    </script>
</body>

</html>