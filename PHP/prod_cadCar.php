<?php
    session_start();
    include_once("conexao.php");

    $marca = filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_STRING);
    $modelo = filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_STRING);
    $anoMod = filter_input(INPUT_POST, 'anomod', FILTER_SANITIZE_STRING);
    $anoFab = filter_input(INPUT_POST, 'anofab', FILTER_SANITIZE_STRING);
    $versao = filter_input(INPUT_POST, 'versao', FILTER_SANITIZE_STRING);
    $imagem = addslashes(file_get_contents($_FILES['imagem']['tmp_name']));

    $sql = "insert into carros (car_marca, car_modelo, car_anomod, car_anofab, car_versao, car_image) values ('$marca', '$modelo', '$anoMod', '$anoFab', '$versao', '$imagem')";
    $comando = mysqli_query($conn, $sql);

    if(mysqli_insert_id($conn))
    {
        $_SESSION['msgC'] = "<p style='color:#004aad;;'>Carro cadastrado com sucesso</p>";
        header("Location: ../perfil.php");
    }
    else
    {
        $_SESSION['msgC'] = "<p style='color:#004aad;;'>Carro não foi cadastrado com sucesso</p>";
        header("Location: ../perfil.php");
    }
?>