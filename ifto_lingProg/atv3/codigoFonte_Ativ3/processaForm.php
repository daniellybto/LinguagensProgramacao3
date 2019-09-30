<?php
    require "autoload.php";

    $razaoSocial = $_POST["razaoSocial"];
    $nomeFantasia = $_POST["nomeFantasia"];
    $cnpj = $_POST["cnpj"];
    $endereco = $_POST["endereco"];
    $numero = $_POST["numeroEndereco"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $responsavel = $_POST["responsavel"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    $empresa = new Empresa($razaoSocial, $nomeFantasia, $cnpj, $endereco, $numero, $bairro, $cidade, $estado, $responsavel, $email, $telefone);

    $empresa->inserir();

?>
