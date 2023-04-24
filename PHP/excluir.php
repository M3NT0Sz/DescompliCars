<?php
session_start();
include_once("conexao.php");


$cod = $_GET['codigo'];

$sql ="DELETE FROM usuarios WHERE usu_cod = '$cod'";
$comando  = mysqli_query($conn,$sql);
session_destroy();
header("location:../index.php");
?>