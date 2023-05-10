<?php
session_start();
include_once("conexao.php");


$cod = $_POST['codcomentario'];

$sql ="DELETE FROM opnioes WHERE opn_cod = '$cod'";
$comando  = mysqli_query($conn,$sql);
header("location:../index.php");
?>