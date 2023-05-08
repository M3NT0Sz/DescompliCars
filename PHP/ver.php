<?php
 session_start();
 include_once("PHP/conexao.php");
?>


<?php 
    if(isset($_SESSION['login'])||isset($_SESSION['edit'])){
        header("location: ../Perfil.php");                        
    }
    else{
       header("location: ../Usuario.php");
    }
?>