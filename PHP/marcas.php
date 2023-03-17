<?php
    session_start();
    include_once("../PHP/conexao.php");
    $_SESSION['cima'] = "<div class=container>;
        <div class=menu>
            <div class=imagemmenu>
                <a href=../index.php><img src=../Imagens/Logo.png></a>
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