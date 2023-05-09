<?php
session_start();
include_once("PHP/conexao.php");
if (isset($_SESSION['login'])) {
    foreach ($_SESSION['loginA'] as $codigo) {
        $codigo = $codigo['cod'];
        $imagem = "SELECT * FROM usuarios WHERE usu_cod=$codigo";
        $comando = mysqli_query($conn, $imagem);
        while ($row = mysqli_fetch_array($comando)) {
            $imagemusu = base64_encode($row['usu_image']);
        }
    }
    if ($imagemusu != "") {
    $_SESSION['cima'] = "
    <link href=https://fonts.cdnfonts.com/css/maven-pro rel=stylesheet>
    <div class=container style='margin-bottom:10vh;'>
        <div class=menu>
            <div class=imagemmenu>
                <a href=index.php class=linkmenus><img src=Imagens/Logo.png><h2><font color=black>Descompli</font><font color=#004aad>Cars</font></h2></a>
            </div>
            <div class=navbar>
                <ul class=tabelamenu>
                    <li class=linkmenu><a href=Concessionarias.php>Concessionárias</a></li>
                </ul>
            </div>
            <div class=iconesmenu>
                <a href=PHP/ver.php><form action=PHP/ver.php method=post>
                    <center><img style='margin-right:20px;width:50px;height:50px;border-radius:30px;border-color:#004aad;border-style:solid;' src='data:image/jpeg;base64,$imagemusu'><br></center>
                </form></a>
            </div>
        </div>  
    </div>";
}
} else {
    $_SESSION['cima'] = "
    <link href=https://fonts.cdnfonts.com/css/maven-pro rel=stylesheet>
    <div class=container style='margin-bottom:10vh;'>
        <div class=menu>
            <div class=imagemmenu>
                <a href=index.php class=linkmenus><img src=Imagens/Logo.png><h2><font color=black>Descompli</font><font color=#004aad>Cars</font></h2></a>
            </div>
            <div class=navbar>
                <ul class=tabelamenu>
                    <li class=linkmenu><a href=Concessionarias.php>Concessionárias</a></li>
                </ul>
            </div>
            <div class=iconesmenu>
                <a href=PHP/ver.php><form action=../PHP/ver.php method=post>
                    <i class='bx bxs-user'></i>
                </form></a>
            </div>
        </div>  
    </div>";
}

 

?>