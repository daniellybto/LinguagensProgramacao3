<?php
    require 'autoload.php';

    //capturando qual foi o botão/escolha que o usuário escolheu
    $valorBtn = $_POST["btnAcao"];

    $contaPoupanca = $_SESSION['contaPoupanca'];

    switch($valorBtn){
        case 'Sacar':
            $contaPoupanca->sacar($_POST["valor"]);

            $valoranterior = $_COOKIE['userAtividade'];

            setcookie('userAtividade', $valoranterior.date('H:i'). " -- Saque -- R$".number_format($_POST['valor'],2)."@");

            header('Location: index.php');
            break;
            
        case 'Depositar':
            $contaPoupanca->depositar($_POST["valor"]);
            
            $valoranterior = $_COOKIE['userAtividade'];

            setcookie('userAtividade', $valoranterior.date('H:i'). " -- Depósito -- R$".number_format($_POST['valor'],2)."@");
            
            header('Location: index.php');
            break;
            
        case 'Transferir':
            $contaExemplo = $_SESSION['contaExemplo'];
            $contaPoupanca->transferir($_POST["valor"], "Depositante");
            $contaExemplo->transferir($_POST["valor"], "Beneficiario");
            
            $valoranterior = $_COOKIE['userAtividade'];

            setcookie('userAtividade', $valoranterior.date('H:i'). " -- Transferência -- R$".number_format($_POST['valor'],2)."@");

            header('Location: index.php');
            break;

    }
    
?>