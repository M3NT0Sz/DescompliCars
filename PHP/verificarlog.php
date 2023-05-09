<?php
 session_start();
 include_once("PHP/conexao.php");
?>


<?php 
    if(isset($_SESSION['login'])||isset($_SESSION['edit'])){
        $codigocar = $_POST['codigocar'];
        $codigousu = $_POST['codigousu'];
        $_SESSION['codigocar'] = $codigocar;
        $_SESSION['codigousu'] = $codigousu;
        header("location: opiniao.php");                        
    }
    else{
       header("location: ../Usuario.php");
    }
?>