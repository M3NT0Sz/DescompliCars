<?php
    include_once("PHP/conexao.php");
    $_SESSION['anofab'] =
    "<h2>Ano de Fabricação</h2>
        <select class=anofab name=anofab id=anofab onclick='esconderVersao()'>
            <option value='Escolha um ano'>
                Escolha um ano
            </option>
            <option value='2023'>
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