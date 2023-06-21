<?php
session_start();
include_once("conexao.php");

$marca = filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_STRING);
$modelo = filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_STRING);
$versao = filter_input(INPUT_POST, 'versao', FILTER_SANITIZE_STRING);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);

$imagem = $_FILES['imagem']['tmp_name'];

if (empty($imagem)) {
    $_SESSION['erro'] = "Por favor insira uma imagem";
    header("location:../CadastroCar.php");
} else {
    $imagem = addslashes(file_get_contents($_FILES['imagem']['tmp_name']));
    $sql = "insert into carros (car_marca, car_modelo, car_tipo, car_image) values ('$marca', '$modelo', '$tipo', '$imagem')";
    $comando = mysqli_query($conn, $sql);

    if (mysqli_insert_id($conn)) {
        $_SESSION['msgC'] = "<p style='color:#004aad;;'>Carro cadastrado com sucesso</p>";
        header("Location: ../perfil.php");
    } else {
        $_SESSION['msgC'] = "<p style='color:#004aad;;'>Carro não foi cadastrado com sucesso</p>";
        header("Location: ../perfil.php");
    }
}
