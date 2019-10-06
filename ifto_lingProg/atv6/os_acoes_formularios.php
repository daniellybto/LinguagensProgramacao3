<?php
require 'autoload.php';

// ao explodir teresmos:
// $explode[0] => o Objeto Requisitante (Ex: Usuário, Cliente ou OS)
// $explode[1] => teremos a ação a ser realizada (Ex: add, update, search ou delete)
$explode = explode(";",$_POST['acao']);

################################################
# Ações do objeto USUÁRIO:
################################################
if($explode[0] == "usuario"){

    $usuario = new Usuario();

    // ++++++++++++++++++++++++++
    // INSERIR usuário
    // ++++++++++++++++++++++++++
    if($explode[1] == "add"){
        $usuario->__set("nome", utf8_decode($_POST["nome"]));
		$usuario->__set("email", utf8_decode($_POST["email"]));
		$usuario->__set("senha", md5($_POST["senha"]));
		
        if($usuario->inserir()){
            
            $_SESSION['resultOperacao'][0]=true; #o parâmetro 'true' indica que ocorreu conforme o esperado!
            $_SESSION['resultOperacao'][1]="O Usuário";
            $_SESSION['resultOperacao'][2]="Adicionado";

            header('Location: os_home.php');
        }else{
            $_SESSION['resultOperacao'][0]=false; #o parâmetro 'false' indica que ocorreu algum problema!
            $_SESSION['resultOperacao'][1]="O Usuário";
            $_SESSION['resultOperacao'][2]="Adicionado";

        }

    }
    // ++++++++++++++++++++++++++
    // ATUALIZAR/EDITAR usuário
    // ++++++++++++++++++++++++++
    if($explode[1] == "edit"){#quando for editar eu vou ter outro parâmetro em $explode[2] que é o id do campo que ela clicou!
        $totalLinhas = $usuario->selectGeral("SELECT * FROM usuario WHERE idusuario = $explode[2]");
        

    }

    
}

?>