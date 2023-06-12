<?php
    session_start();
    include_once("conexao.php");
    $especificacao = $_POST['especificacao'];
    $tipo = $_POST['tipo'];
    $sql = "INSERT INTO especificacoes (esp_especificacoes, esp_tipo) VALUES ('$especificacao', '$tipo')";
    $comando = mysqli_query($conn, $sql);
    header("location:../Perfil.php")
?>