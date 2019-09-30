<?php

use PHPMailer\PHPMailer\Exception;

class Conexao{

		private $servidor;
		private $usuario;
		private $senha;
		private $banco;

		public $mysqli;

		public function __construct(){
			#essa funçao $_SERVER['SERVER_NAME'] é uma função própria do php que verifica se a aplicação
			#está no 'localhost' ou não...
			if($_SERVER['SERVER_NAME'] == 'localhost'){
				$this->servidor = "localhost";
				$this->usuario = "root";
				$this->senha = "";
				$this->banco = "ifto";
			}else{#caso eu esteja com os arquivos no meu servidor online, essas são as configurações:
				$this->servidor = "sql206.epizy.com";
				$this->usuario = "epiz_24290622";
				$this->senha = "8DNijcCZd9B";
				$this->banco = "epiz_24290622_ifto";

			}
			try {
				$this->mysqli = new mysqli($this->servidor, $this->usuario, $this->senha, $this->banco);
			} catch (Exception $erro) {
				echo "Erro... Não foi possível conectar ao Banco de Dados: ". $erro->getMessage();
			}

		}

	}

?>