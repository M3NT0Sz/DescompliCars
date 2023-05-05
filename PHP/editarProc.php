<?php
session_start();
include_once("conexao.php");

$nome = $_POST['nome'];
$sobreNome = $_POST['sobrenome'];
$email = $_POST['email'];
$fone = $_POST['tel'];
$dataN = $_POST['dtnasc'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$cid = $_POST['cidade'];
$estado = $_POST['estado'];
$genero = $_POST['genero'];


$sql = "UPDATE usuarios SET usu_nome = '$nome', usu_sobrenome = '$sobreNome', usu_email = '$email', usu_dtnasc = '$dataN', usu_cpf = '$cpf', usu_endereco = '$endereco', usu_cidade = '$cid', usu_estado = '$estado', usu_genero = '$genero'"; 
$comando = mysqli_query($conn, $sql);
if(mysqli_affected_rows($conn)){
    $_SESSION['editado'] = "Usuario editado com sucesso";
    unset($_SESSION['login']);
    $_SESSION['edit'] = $nome. " " .$sobreNome;    
    header("location:../Perfil.php");
}else{
    $_SESSION['naoeditado'] = "Usuario não editado";
    header("location:../editarPerfil.php");
}
?>