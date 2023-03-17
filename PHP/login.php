<?php
    session_start();
	include_once("conexao.php");

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
    
    $sql = "SELECT * FROM usuarios WHERE usu_email = '$email' and usu_senha = '$senha'";
    $result = mysqli_query($conn, $sql);
    $row_usuario = mysqli_fetch_array($result);  
    if(mysqli_num_rows($result) == 1)
    {
        
        $_SESSION['login'] = $row_usuario['usu_nome'] ." ". $row_usuario['usu_sobrenome'];
        header("Location: ../Perfil.php");
    }
    else
	{
        $_SESSION['erro'] = "<p style='color:#004aad;'>Email ou Senha incorretos!</p>";
        header("Location: ../Usuario.php");
    }
?>
