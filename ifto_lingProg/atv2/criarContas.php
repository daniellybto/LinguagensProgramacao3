<?php
    require 'autoload.php';
    

    $contaPoupanca = new Poupanca($_POST['titular'], $_POST['agencia'], $_POST['numConta'], $_POST['saldo']);
    $_SESSION['contaPoupanca'] = $contaPoupanca;

    header('Location: index.php');
    

?>