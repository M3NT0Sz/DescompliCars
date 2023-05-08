<?php
    session_start();
    include_once("conexao.php");

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
    $dtnasc = filter_input(INPUT_POST, 'datanasc', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
    $senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));

    $imagem = addslashes(file_get_contents($_FILES['imagemperfil']['tmp_name']));

    $sql = "insert into usuarios (usu_email, usu_nome, usu_sobrenome, usu_tel, usu_dtnasc, usu_cpf, usu_endereco, usu_cidade, usu_estado, usu_genero, usu_senha, usu_image) values ('$email', '$nome', '$sobrenome', '$telefone', '$dtnasc', '$cpf', '$endereco', '$cidade', '$estado', '$genero', '$senha', '$imagem')";
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