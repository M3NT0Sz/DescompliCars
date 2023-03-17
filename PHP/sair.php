<?php
    session_start();
    include_once("conexao.php");

    session_destroy();
    header("location: ../index.php")
?>