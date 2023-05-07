<?php
session_start();
include_once("conexao.php");


$cod = $_POST['cod'];

$sql ="DELETE FROM carros WHERE car_cod = '$cod'";
$comando  = mysqli_query($conn,$sql);
header("location:../index.php");
?>