<?php
include_once("PHP/conexao.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="Imagens/DescomplicarsIcon.png" rel="icon">
  <link href="CSS/style.css" rel="stylesheet">
  <link href="CSS/usuarios.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.cpf').mask('000.000.000-00');
      $('.date').mask('00/00/0000');
      $('.phone').mask('(00)00000-0000');

      $('.cpf').on('input', function() {
        $(this).mask('000.000.000-00');
      });

      $('.date').on('input', function() {
        $(this).mask('00/00/0000');
      });

      $('.phone').on('input', function() {
        $(this).mask('(00)00000-0000');
      });
    });
  </script>
  <title>DescompliCars</title>
</head>

<body>
  <!--MenuBar-->
  <?php require "PHP/verificar.php";
  echo $_SESSION['cima'];
  ?>
  <!--Fecha MenuBar-->
  <div class="meio">
    <div class="wrapper">
      <div class="title-text">
        <div class="title login">Login</div>
        <div class="title signup">Cadastrar</div>
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">Login</label>
          <label for="signup" class="slide signup">Cadastrar</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
          <form action="PHP/login.php" method="post" class="login">
            <div class="field">
              <input type="email" placeholder="E-mail" name="email" required>
            </div>
            <div class="field">
              <input type="password" placeholder="Senha" name="senha" required>
            </div>
            <div style="text-align:center; margin-top:10px; margin-bottom:10px;">
              <?php
              //mostrando a msg de login e senha inválidos!
              if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
              }
              ?>
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Login">
            </div>
            <div class="signup-link">Ainda não é um membro? <a href="">Cadastra-se Agora</a></div>
          </form>
          <form action="PHP/cadastrar.php" method="post" class="signup" enctype="multipart/form-data">
            <div class="field">
              <input type="email" placeholder="E-mail" name="email" required>
              <input type="text" placeholder="Nome" name="nome" required>
              <input type="text" placeholder="Sobrenome" name="sobrenome" required>
            </div>
            <div class="field">
              <input type="text" class="phone" minlength="14" maxlength="14" placeholder="Telefone" name="tel" required>
              <input type="date" min="1900-01-01" max="2023-01-01" name="datanasc" required>
              <input type="text" class="cpf" minlength="14" maxlength="14" placeholder="CPF" name="cpf" required>
            </div>
            <div class="field">
              <input type="text" placeholder="Endereco" name="endereco" required>
              <input type="text" placeholder="Cidade" name="cidade" required>
              <input type="text" placeholder="Estado" name="estado" required>
            </div>
            <div class="field">
              <h3 style="display: flex; align-items: center; justify-content: center;">Genero:</h3><select name="genero">
                <option value="Feminino">Feminino</option>
                <option value="Masculino">Masculino</option>
                <option value="Outros">Outros</option>
              </select>
              <input type="password" placeholder="Senha" name="senha" required>
            </div>
            <div class="field">
              Insira sua foto<input type="file" name="imagemperfil" accept="image/*">
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Cadastrar">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--Rodapé-->
  <?php require "PHP/rodape.php";
  echo $_SESSION['rodape'];
  ?>
  <!--Rodapé Fechar-->
  <script>
    const loginText = document.querySelector(".title-text .login");
    const loginForm = document.querySelector("form.login");
    const loginBtn = document.querySelector("label.login");
    const signupBtn = document.querySelector("label.signup");
    const signupLink = document.querySelector("form .signup-link a");
    signupBtn.onclick = (() => {
      loginForm.style.marginLeft = "-50%";
      loginText.style.marginLeft = "-50%";
    });
    loginBtn.onclick = (() => {
      loginForm.style.marginLeft = "0%";
      loginText.style.marginLeft = "0%";
    });
    signupLink.onclick = (() => {
      signupBtn.click();
      return false;

      $(document).ready(function() {
        $('.date').mask('00/00/0000');
        $('.phone').mask('(00) 00000-0000');
      });
    });
  </script>
</body>

</html>