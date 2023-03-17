<?php
    session_start();
    include_once("conexao.php");

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
    $senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));

    $sql = "insert into usuarios (usu_email, usu_nome, usu_sobrenome, usu_senha) values ('$email', '$nome', '$sobrenome', '$senha')";
    $comando = mysqli_query($conn, $sql);

    if(mysqli_insert_id($conn))
    {
        $_SESSION['msg'] = "<p style='color:green;'>Usuario cadastrado com sucesso</p>";
        header("Location: ../Usuario.php");
    }
    else
    {
        $_SESSION['msg'] = "<p style='color:red;'>Usuario não foi cadastrado com sucesso</p>";
        header("Location: ../Usuario.php");
    }
?>