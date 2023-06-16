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

        <h1>Opcionais</h1>
        <hr>
        <?php
        $opcionais = "SELECT * FROM especificacoes WHERE esp_tipo LIKE '%Opcionais%'";
        $comando = mysqli_query($conn, $opcionais);
        while ($row = mysqli_fetch_array($comando)) {
            $esp = $row['esp_especificacoes'];
            echo "<h3><input type=checkbox id='$esp' onchange='addTexto()'>$esp</h3>";
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
                echo "<h3><input type=checkbox id='$esp' onchange='addTexto()'>$esp</h3>";
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
                echo "<h3><input type=checkbox id='$esp' onchange='addTexto()'>$esp</h3>";
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
                echo "<h3><input type=checkbox id='$esp' onchange='addTexto()'>$esp</h3>";
            }
            ?>
            <input type="hidden" name="Tudo" id="Tudo">
        <?php
        echo "
            <button>Editar</button>
            <a href='../index.php'><button type=button>voltar</button></a>
        </form>
        ";
    }
        ?>

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
                }else{
                    if (!checkboxAirbag.checked) {
                        campoTudo.value = campoTudo.value.replace("Airbag", "");
                    }
                }

                if (!Tudo.value.match("Ar-condicionado")) {
                    if (checkboxArCondicionado.checked) {
                        campoTudo.value += " Ar-condicionado";
                    }
                }else{
                    if (!checkboxArCondicionado.checked) {
                        campoTudo.value = campoTudo.value.replace("Ar-condicionado", "");
                    }
                }

                if (!Tudo.value.match("Direção hidraulica")) {
                    if (checkboxDireçãoHidraulica.checked) {
                        campoTudo.value += " Direção hidraulica";
                    }
                }else{
                    if (!checkboxDireçãoHidraulica.checked) {
                        campoTudo.value = campoTudo.value.replace("Direção hidraulica", "");
                    }
                }
                if (!Tudo.value.match("Freio ABS")) {
                    if (checkboxFreioABS.checked) {
                        campoTudo.value += " Freio ABS";
                    }
                }else{
                    if (!checkboxFreioABS.checked) {
                        campoTudo.value = campoTudo.value.replace("Freio ABS", "");
                    }
                }
                if (!Tudo.value.match("GPS")) {
                    if (checkboxGPS.checked) {
                        campoTudo.value += " GPS";
                    }
                }else{
                    if (!checkboxGPS.checked) {
                        campoTudo.value = campoTudo.value.replace("GPS", "");
                    }
                }
                if (!Tudo.value.match("Retrovisor elétricos")) {
                    if (checkboxRetrovisorElétricos.checked) {
                        campoTudo.value += " Retrovisor elétricos";
                    }
                }else{
                    if (!checkboxRetrovisorElétricos.checked) {
                        campoTudo.value = campoTudo.value.replace("Retrovisor elétricos", "");
                    }
                }
                if (!Tudo.value.match("Sensor de estacionamento")) {
                    if (checkboxSensorDeEstacionamento.checked) {
                        campoTudo.value += " Sensor de estacionamento";
                    }
                }else{
                    if (!checkboxSensorDeEstacionamento.checked) {
                        campoTudo.value = campoTudo.value.replace("Sensor de estacionamento", "");
                    }
                }
                if (!Tudo.value.match("Teto solar")) {
                    if (checkboxTetoSolar.checked) {
                        campoTudo.value += " Teto solar";
                    }
                }else{
                    if (!checkboxTetoSolar.checked) {
                        campoTudo.value = campoTudo.value.replace("Teto solar", "");
                    }
                }
                if (!Tudo.value.match("Tração 4x4")) {
                    if (checkboxTração4x4.checked) {
                        campoTudo.value += " Tração 4x4";
                    }
                }else{
                    if (!checkboxTração4x4.checked) {
                        campoTudo.value = campoTudo.value.replace("Tração 4x4", "");
                    }
                }
                if (!Tudo.value.match("Travas elétricas")) {
                    if (checkboxTravasElétricas.checked) {
                        campoTudo.value += " Travas elétricas";
                    }
                }else{
                    if (!checkboxTravasElétricas.checked) {
                        campoTudo.value = campoTudo.value.replace("Travas elétricas", "");
                    }
                }
                if (!Tudo.value.match("Vidros elétricos")) {
                    if (checkboxVidrosElétricos.checked) {
                        campoTudo.value += " Vidros elétricos";
                    }
                }else{
                    if (!checkboxVidrosElétricos.checked) {
                        campoTudo.value = campoTudo.value.replace("Vidros elétricos", "");
                    }
                }
                if (!Tudo.value.match("Automático")) {
                    if (checkboxAutomático.checked) {
                        campoTudo.value += " Automático";
                    }
                }else{
                    if (!checkboxAutomático.checked) {
                        campoTudo.value = campoTudo.value.replace("Automático", "");
                    }
                }
                if (!Tudo.value.match("Automática sequencial")) {
                    if (checkboxAutomáticaSequencial.checked) {
                        campoTudo.value += " Automática sequencial";
                    }
                }else{
                    if (!checkboxAutomáticaSequencial.checked) {
                        campoTudo.value = campoTudo.value.replace("Automática sequencial", "");
                    }
                }
                if (!Tudo.value.match("Manual")) {
                    if (checkboxManual.checked) {
                        campoTudo.value += " Manual";
                    }
                }else{
                    if (!checkboxManual.checked) {
                        campoTudo.value = campoTudo.value.replace("Manual", "");
                    }
                }
                if (!Tudo.value.match("Álcool")) {
                    if (checkboxÁlcool.checked) {
                        campoTudo.value += " Álcool";
                    }
                }else{
                    if (!checkboxÁlcool.checked) {
                        campoTudo.value = campoTudo.value.replace("Álcool", "");
                    }
                }
                if (!Tudo.value.match("Diesel")) {
                    if (checkboxDiesel.checked) {
                        campoTudo.value += " Diesel";
                    }
                }else{
                    if (!checkboxDiesel.checked) {
                        campoTudo.value = campoTudo.value.replace("Diesel", "");
                    }
                }
                if (!Tudo.value.match("Gás Natural")) {
                    if (checkboxGásNatural.checked) {
                        campoTudo.value += " Gás Natural";
                    }
                }else{
                    if (!checkboxGásNatural.checked) {
                        campoTudo.value = campoTudo.value.replace("Gás Natural", "");
                    }
                }
                if (!Tudo.value.match("Gasolina")) {
                    if (checkboxGasolina.checked) {
                        campoTudo.value += " Gasolina";
                    }
                }else{
                    if (!checkboxGasolina.checked) {
                        campoTudo.value = campoTudo.value.replace("Gasolina", "");
                    }
                }
                if (!Tudo.value.match("Elétrico")) {
                    if (checkboxElétrico.checked) {
                        campoTudo.value += " Elétrico";
                    }
                }else{
                    if (!checkboxElétrico.checked) {
                        campoTudo.value = campoTudo.value.replace("Elétrico", "");
                    }
                }
                if (!Tudo.value.match("1.0")) {
                    if (checkbox10.checked) {
                        campoTudo.value += " 1.0";
                    }
                }else{
                    if (!checkbox10.checked) {
                        campoTudo.value = campoTudo.value.replace("1.0", "");
                    }
                }
                if (!Tudo.value.match("Antigos")) {
                    if (checkboxAntigos.checked) {
                        campoTudo.value += " Antigos";
                    }
                }else{
                    if (!checkboxAntigos.checked) {
                        campoTudo.value = campoTudo.value.replace("Antigos", "");
                    }
                }
                if (!Tudo.value.match("2 Portas")) {
                    if (checkbox2Portas.checked) {
                        campoTudo.value += " 2 Portas";
                    }
                }else{
                    if (!checkbox2Portas.checked) {
                        campoTudo.value = campoTudo.value.replace("2 Portas", "");
                    }
                }
                if (!Tudo.value.match("7 Lugares")) {
                    if (checkbox7Lugares.checked) {
                        campoTudo.value += " 7 Lugares";
                    }
                }else{
                    if (!checkbox7Lugares.checked) {
                        campoTudo.value = campoTudo.value.replace("7 Lugares", "");
                    }
                }
                if (!Tudo.value.match("Luxo")) {
                    if (checkboxLuxo.checked) {
                        campoTudo.value += " Luxo";
                    }
                }else{
                    if (!checkboxLuxo.checked) {
                        campoTudo.value = campoTudo.value.replace("Luxo", "");
                    }
                }
                if (!Tudo.value.match("Economicos")) {
                    if (checkboxEconomicos.checked) {
                        campoTudo.value += " Economicos";
                    }
                }else{
                    if (!checkboxEconomicos.checked) {
                        campoTudo.value = campoTudo.value.replace("Economicos", "");
                    }
                }
                if (!Tudo.value.match("Elétricos")) {
                    if (checkboxElétricos.checked) {
                        campoTudo.value += " Elétricos";
                    }
                }else{
                    if (!checkboxElétricos.checked) {
                        campoTudo.value = campoTudo.value.replace("Elétricos", "");
                    }
                }
                if (!Tudo.value.match("Esportivos")) {
                    if (checkboxEsportivos.checked) {
                        campoTudo.value += " Esportivos";
                    }
                }else{
                    if (!checkboxEsportivos.checked) {
                        campoTudo.value = campoTudo.value.replace("Esportivos", "");
                    }
                }
                if (!Tudo.value.match("Grandes")) {
                    if (checkboxGrandes.checked) {
                        campoTudo.value += " Grandes";
                    }
                }else{
                    if (!checkboxGrandes.checked) {
                        campoTudo.value = campoTudo.value.replace("Grandes", "");
                    }
                }
                if (!Tudo.value.match("Hibridos")) {
                    if (checkboxHibridos.checked) {
                        campoTudo.value += " Hibridos";
                    }
                }else{
                    if (!checkboxHibridos.checked) {
                        campoTudo.value = campoTudo.value.replace("Hibridos", "");
                    }
                }
                if (!Tudo.value.match("Importados")) {
                    if (checkboxImportados.checked) {
                        campoTudo.value += " Importados";
                    }
                }else{
                    if (!checkboxImportados.checked) {
                        campoTudo.value = campoTudo.value.replace("Importados", "");
                    }
                }
                if (!Tudo.value.match("Familia")) {
                    if (checkboxFamilia.checked) {
                        campoTudo.value += " Familia";
                    }
                }else{
                    if (!checkboxFamilia.checked) {
                        campoTudo.value = campoTudo.value.replace("Familia", "");
                    }
                }
                if (!Tudo.value.match("Populares")) {
                    if (checkboxPopulares.checked) {
                        campoTudo.value += " Populares";
                    }
                }else{
                    if (!checkboxPopulares.checked) {
                        campoTudo.value = campoTudo.value.replace("Populares", "");
                    }
                }
                if (!Tudo.value.match("Pequenos")) {
                    if (checkboxPequenos.checked) {
                        campoTudo.value += " Pequenos";
                    }
                }else{
                    if (!checkboxPequenos.checked) {
                        campoTudo.value = campoTudo.value.replace("Pequenos", "");
                    }
                }
            }
        </script>
</body>

</html>