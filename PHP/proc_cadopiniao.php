<?php
session_start();
include_once("conexao.php");
$codcar = $_POST['codcar'];
$codusu = $_POST['codusu'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$opiniao = $_POST['opiniao'];
$avaliacao = $_POST['avaliacao'];
$anomod = $_POST['anomodelo'];
$pros = $_POST['pros'];
$contra = $_POST['contra'];

if (strpos($pros, ' ') !== false && strpos($opiniao, ' ') !== false && strpos($contra, ' ') !== false) {
    $_SESSION['erroopi'] = "Por favor coloque sua opinião";
    header("location: opiniao.php");
}else{
    $usuario = "SELECT usu_nome, usu_sobrenome, usu_image FROM usuarios WHERE usu_cod='$codusu'";
    $comando = mysqli_query($conn, $usuario);
    while ($row = mysqli_fetch_array($comando)) {
        $nomeusu = $row['usu_nome'] . " " . $row['usu_sobrenome'];
        $sql = "INSERT INTO opnioes (opn_pessoa, opn_opiniao, opn_carro, opn_marca, opn_codusu, opn_avaliacao, opn_anomod, opn_pros, opn_contra) VALUES ('$nomeusu', '$opiniao', '$modelo', '$marca', '$codusu', '$avaliacao', '$anomod', '$pros', '$contra')";
        $comando = mysqli_query($conn, $sql);

        if (mysqli_insert_id($conn)) {
            $_SESSION['codigocarro'] = $codcar;
            header("Location: ../carros.php");
        } else {
            $_SESSION['msgC'] = "<p style='color:#004aad;'>Opinião não foi cadastrado com sucesso</p>";
            header("Location: ../perfil.php");
        }
    }
}
