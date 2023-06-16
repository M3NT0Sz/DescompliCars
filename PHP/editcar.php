<?php
session_start();
include_once("conexao.php");

$cod = filter_input(INPUT_POST, 'cod', FILTER_SANITIZE_STRING);
$marca = filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_STRING);
$modelo = filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_STRING);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
$tudo = filter_input(INPUT_POST, 'Tudo', FILTER_SANITIZE_STRING);

$sql = "UPDATE carros SET car_marca = '$marca', car_modelo = '$modelo', car_tipo = '$tipo', car_outros = '$tudo' WHERE car_cod='$cod'";
$comando = mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn)) {
    $_SESSION['editado'] = "Carro editado com sucesso";
    header("location:../Perfil.php");
} else {
    $_SESSION['naoeditado'] = "Carro não editado";
    header("location:../editarPerfil.php");
}
