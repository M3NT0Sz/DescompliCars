<?php
session_start();
include_once("conexao.php");


$cod = $_POST['cod'];

$sql ="DELETE FROM usuarios WHERE usu_cod = '$cod'";
$comando  = mysqli_query($conn,$sql);
header("location:../usutudo.php");
?>