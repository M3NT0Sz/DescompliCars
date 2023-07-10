<?php
session_start();
include_once("../PHP/conexao.php");
if (isset($_SESSION['login'])) {
    foreach ($_SESSION['loginA'] as $codigo) {
        $codigo = $codigo['cod'];
        $imagem = "SELECT * FROM usuarios WHERE usu_cod=$codigo";
        $comando = mysqli_query($conn, $imagem);
        while ($row = mysqli_fetch_array($comando)) {
            $imagemusu = base64_encode($row['usu_image']);
        }
    }
} else {
}

if ($imagemusu != "") {
    $_SESSION['cima'] = "
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css rel=stylesheet integrity=sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM crossorigin=anonymous>
    <link href=https://fonts.cdnfonts.com/css/maven-pro rel=stylesheet>
    <link href='../CSS/style.css' rel='stylesheet'>
    <nav class='navbar navbar-expand-lg bg-body-tertiary' style='box-shadow: 0 2px 0 0 #004aad;' aria-label='Thirteenth navbar example'>
        <div class='container-fluid'>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarsExample11' aria-controls='navbarsExample11' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div data-toggle='collapse' class='collapse navbar-collapse d-lg-flex' id='navbarsExample11'>
            <a class='navbar-brand col-lg-3 me-0' href=index.php><img src=../Imagens/Logo.png><h2><font color=black>Descompli</font><font color=#004aad>Cars</font></h2></a>
            
                <ul class='navbar-nav col-lg-6 justify-content-lg-center'>
                    <li class='nav-item'>
                        <h4><a class='nav-link' href='../Concessionarias.php'>Marcas</a></h4>
                    </li>
                    <li class='nav-item'>
                        <h4><a class='nav-link' href='../TodosCarros.php'>Carros</a></h4>
                    </li>
                </ul>
                <div class='d-lg-flex col-lg-3 justify-content-lg-end'>
                    <a href=../PHP/ver.php>
                        <form action=../PHP/ver.php method=post>
                            <center><img style='margin-right:20px;width:50px;height:50px;border-radius:30px;border-color:#004aad;border-style:solid;' src='data:image/jpeg;base64,$imagemusu'><br></center>
                        </form>
                    </a>
                </div>
            </div>
        </div>
    </nav>
<script src=https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js integrity=sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz crossorigin=anonymous></script>
";
} else {
    $_SESSION['cima'] = "
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css rel=stylesheet integrity=sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM crossorigin=anonymous>
    <link href=https://fonts.cdnfonts.com/css/maven-pro rel=stylesheet>
    <link href='../CSS/style.css' rel='stylesheet'>
    <nav class='navbar navbar-expand-lg bg-body-tertiary rounded' aria-label='Thirteenth navbar example'>
        <div class='container-fluid'>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarsExample11' aria-controls='navbarsExample11' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse d-lg-flex' id='navbarsExample11'>
            <a class='navbar-brand col-lg-3 me-0' href=../index.php><img src=../Imagens/Logo.png><h2><font color=black>Descompli</font><font color=#004aad>Cars</font></h2></a>
            
                <ul class='navbar-nav col-lg-6 justify-content-lg-center'>
                    <li class='nav-item'>
                        <h4><a class='nav-link' href='../Concessionarias.php'>Marcas</a></h4>
                    </li>
                    <li class='nav-item'>
                        <h4><a class='nav-link' href='../TodosCarros.php'>Carros</a></h4>
                    </li>
                </ul>
                <div class='d-lg-flex col-lg-3 justify-content-lg-end'>
                    <a href=../PHP/ver.php>
                        <form action=../PHP/ver.php method=post>
                            <i class='bx bxs-user'></i>
                        </form>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js integrity=sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz crossorigin=anonymous></script>
    ";
}
