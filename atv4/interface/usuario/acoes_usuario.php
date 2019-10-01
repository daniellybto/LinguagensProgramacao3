<?php 
	require_once"../../classes/Usuario.php";
	session_start();

	#ou seja, se a pessoa tentar acessar essa página sem ter sido redirecionada por um formulário ela será redirecinada para a página de login_usuario.php
	if(empty($_POST['acao'])){
		header('Location: login_usuario.php');
        exit();
	}

	$usuario = new Usuario();

	$acao = $_POST["acao"];

	if($acao == "cadastrar"){

		$usuario->__set("nome", utf8_decode($_POST["nome"]));
		$usuario->__set("email", utf8_decode($_POST["email"]));
		$usuario->__set("senha", md5($_POST["senha"]));
		
		$usuario->inserir();
?>
		<meta http-equiv="refresh" content="10;url=login_usuario.php">
<?php
	}elseif($acao == "login"){

		
	}
 ?>
