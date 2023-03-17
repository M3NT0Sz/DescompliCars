<?php
    include_once("PHP/conexao.php");
    $_SESSION['anomod'] = 
    "<h2>Ano do Modelo</h2>
        <select class=anomod name=anomod id=anomodelo onclick='esconderAnoFab()'>
            <option value='escolhaano'>
                Escolha um ano
            </option>
            <option value='ano1'>
                2023
            </option>
            <option value>
                2022
            </option>
            <option value>
                2021
            </option>
            <option value>
                2020
            </option>
        </select>"
?>