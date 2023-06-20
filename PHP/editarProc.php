<?php
session_start();
include_once("conexao.php");

$cod = filter_input(INPUT_POST, 'cod', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
$dtnasc = filter_input(INPUT_POST, 'dtnasc', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$cid = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);

$imagem = $_FILES['imagemperfil']['tmp_name'];
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if (empty($imagem)) {
        $sql = "UPDATE usuarios SET usu_nome = '$nome', usu_sobrenome = '$sobrenome', usu_email = '$email', usu_dtnasc = '$dtnasc', usu_cpf = '$cpf', usu_endereco = '$endereco', usu_cidade = '$cid', usu_estado = '$estado', usu_genero = '$genero' WHERE usu_cod = '$cod'";
        $comando = mysqli_query($conn, $sql);
        if (mysqli_affected_rows($conn)) {
            $_SESSION['editado'] = "Usuario editado com sucesso";
            unset($_SESSION['login']);
            $_SESSION['login'] = $nome . " " . $sobrenome;
            header("location:../Perfil.php");
        } else {
            $_SESSION['naoeditado'] = "Usuario não editado";
            header("location:../editarPerfil.php");
        }
    } else {
        $imageInfo = getimagesize($imagem);
        if ($imageInfo !== false) {
            $imagem = addslashes(file_get_contents($_FILES['imagemperfil']['tmp_name']));
            $sql = "UPDATE usuarios SET usu_nome = '$nome', usu_sobrenome = '$sobrenome', usu_email = '$email', usu_dtnasc = '$dtnasc', usu_cpf = '$cpf', usu_endereco = '$endereco', usu_cidade = '$cid', usu_estado = '$estado', usu_genero = '$genero', usu_image = '$imagem' WHERE usu_cod = '$cod'";
            $comando = mysqli_query($conn, $sql);
            if (mysqli_affected_rows($conn)) {
                $_SESSION['editado'] = "Usuario editado com sucesso";
                unset($_SESSION['login']);
                $_SESSION['login'] = $nome . " " . $sobrenome;
                header("location:../Perfil.php");
            } else {
                $_SESSION['naoeditado'] = "Usuario não editado";
                header("location:../editarPerfil.php");
            }
        }else{
            $_SESSION['naoeditado'] = "<font color='#004aad'><h3>Por favor insira uma imagem que exista</h3></font>";
            header("Location: ../editarPerfil.php");
        }
    }
} else {
    $_SESSION['naoeditado'] = "Email Invalido";
    header("Location: ../editarPerfil.php");
}
