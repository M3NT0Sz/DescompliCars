<?php
    session_start();
    include_once("../PHP/conexao.php");
    $_SESSION['cima'] = "
    <div class=container style='margin-bottom:10vh;'>
        <div class=menu>
            <div class=imagemmenu>
                <a href=../index.php class=linkmenus><img src=../Imagens/Logo.png><h2><font color=black>Descompli</font><font color=#004aad>Cars</font></h2></a>
            </div>
            <div class=navbar>
                <ul class=tabelamenu>
                    <li class=linkmenu><a href=../Concessionarias.php>Concessionárias</a></li>
                    <li class=linkmenu><a href=#>Noticias</a></li>
                    <li class=linkmenu><a href=#>Opnioes</a></li>
                </ul>
            </div>
            <div class=iconesmenu>
                <a href=../PHP/ver.php><form action=../PHP/ver.php method=post>
                    <i class='bx bxs-user'></i>
                </form></a>
                <a href=# class=linkicones><i class='bx bxs-bell'></i></a>
            </div>
        </div>  
    </div>";
?>