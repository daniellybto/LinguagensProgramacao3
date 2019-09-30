<?php
    spl_autoload_register(
        function($classe){
            require "class/$classe.php";
        }
    );
    session_start();

    if(!isset($_COOKIE['userAtividade'])){
        $dadosCookie = 'Horário -- Lançamento -- Valor(R$)@';

        setcookie('userAtividade', $dadosCookie);
    }
?>