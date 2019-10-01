<?php 
require_once "Conexao.php";

class Usuario{
	private $nome;
	private $email;
	private $senha;

	public function __get($atributo){
		return $this->$atributo;
	}
	public function __set($atributo, $valor){
		$this->$atributo = $valor;
	}

	public function inserir(){
		$con = new Conexao();

		$sql = "INSERT INTO usuario(usu_nome, usu_email, usu_senha) VALUES ('$this->nome', '$this->email', '$this->senha')";

		if ($con->mysqli->query($sql)) {
			echo "Cadastro Realizado com Sucesso!<br> Você Será Redirecionado em 10 segundos!";
		} else { 
			echo "Cadastrado não Realizado.";
		}
		
		$con->mysqli->close();
	}

	public function login($email, $senha){
		$con = new Conexao();


	}

}

?>