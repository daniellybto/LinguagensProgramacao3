<?php
    require 'autoload.php';

    $usuario = new Usuario();

    $totalLinhas = $usuario->selectGeral("SELECT * FROM usuario");

    print_r($usuario->selectGeral("SELECT * FROM usuario"));

    echo "<br><br>";

    foreach($totalLinhas as $dados){
        echo $dados['idusuario'] . "<br>";
        echo $dados['usu_nome']. "<br>";
        echo $dados['usu_email']. "<br>";
        echo "<hr>";
    }


?>