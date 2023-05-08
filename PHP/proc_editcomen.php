<?php
    session_start();
    include_once("conexao.php");
    $codigoopn = $_POST['codigo'];
    $opiniao = $_POST['opiniao'];
    $sql = "UPDATE opnioes SET opn_opiniao = '$opiniao' WHERE opn_cod = '$codigoopn'";
    $comando = mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn)){
        $_SESSION['msgC'] = "Comentario editado com sucesso";
        header("location:../Perfil.php");
    }else{
        $_SESSION['msgC'] = "Comentario não editado";
        header("location:../editarPerfil.php");
    }
?>
