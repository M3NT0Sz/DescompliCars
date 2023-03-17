<?php
    include_once("PHP/conexao.php");
    $_SESSION['modelo'] = 
    "<h2>Modelo</h2>
        <select class=modelo name=modelo id=modelo onclick='esconderAnoMod()'>
            <option value='Escolha um Modelo'>
                Escolha um Modelo
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