<?php
    session_start();
    include_once("conexao.php");

    $marca = filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_STRING);
    
    $imagem = addslashes(file_get_contents($_FILES['imagem']['tmp_name']));
    

    $sql = "insert into marcas (mar_nome, mar_image) values ('$marca', '$imagem')";
    $comando = mysqli_query($conn, $sql);

    if(mysqli_insert_id($conn))
    {
        $_SESSION['msgC'] = "<p style='color:#004aad;'>Marca cadastrado com sucesso</p>";
        header("Location: ../perfil.php");
    }
    else
    {
        $_SESSION['msgC'] = "<p style='color:#004aad;'>Marca não foi cadastrado com sucesso</p>";
        header("Location: ../perfil.php");
    }
