<?php
    session_start();
    include_once("PHP/conexao.php");
    $_SESSION['cima'] = "
    <link href=https://fonts.cdnfonts.com/css/lambo rel=stylesheet>
    <div class=container>
        <div class=menu>
            <div class=imagemmenu>
                <a class=linkmenus href=index.php><img src=Imagens/Logo.png><font color=black size=5>Descompli</font><font color=#004aad size=5>Cars</font></a>
            </div>
            <div class=navbar>
                <ul class=tabelamenu>
                    <li class=linkmenu><a href=Concessionarias.php>Concessionárias</a></li>
                    <li class=linkmenu><a href=#>Noticias</a></li>
                    <li class=linkmenu><a href=#>Opnioes</a></li>
                </ul>
            </div>
            <div class=iconesmenu>
                <a href=PHP/ver.php><form action=PHP/ver.php method=post>
                    <i class='bx bxs-user'></i>
                </form></a>
                <a href=# class=linkicones><i class='bx bxs-bell'></i></a>
            </div>
        </div>  
    </div>" 
?>