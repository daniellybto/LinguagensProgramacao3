<?php
    require "autoload.php";

    $razaoSocial = utf8_decode($_POST['razaoSocial']);;
    $nomeFantasia = utf8_decode($_POST["nomeFantasia"]);
    $cnpj = utf8_decode($_POST["cnpj"]);
    $endereco = utf8_decode($_POST["endereco"]);
    $numero = utf8_decode($_POST["numeroEndereco"]);
    $bairro = utf8_decode($_POST["bairro"]);
    $cidade = utf8_decode($_POST["cidade"]);
    $estado = utf8_decode($_POST["estado"]);
    $responsavel = utf8_decode($_POST["responsavel"]);
    $email = utf8_decode($_POST["email"]);
    $telefone = utf8_decode($_POST["telefone"]);

    $empresa = new Empresa($razaoSocial, $nomeFantasia, $cnpj, $endereco, $numero, $bairro, $cidade, $estado, $responsavel, $email, $telefone);

    $empresa->inserir();

?>
<meta http-equiv="refresh" content="10;url=index.html">