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
			echo "Cadastrado com suscesso.";
		} else { 
			echo "Cadastrado não Realizado.";
		}
		
		$con->mysqli->close();
			
	}

	public function login(){
		$conect = new Conexao();

		//função que de certa forma protege contra o mysql injection:
		$this->email = mysqli_real_escape_string($conect->mysqli, $this->email);
		$this->senha = mysqli_real_escape_string($conect->mysqli, $this->senha);

		$query = "SELECT idusuario FROM usuario WHERE usu_email = '$this->email' AND usu_senha = md5('$this->senha')";

		//Executo a query e guardo o resultado da minha query na variável $resultado (valor booleano)
		$resultado = $conect->mysqli->query($query);

		// de acordo com o resultado da minha query eu verifico a quantidade de linhas retornadas, ou seja, se for 0 isso quer dizer que não foi encontrado nenhum registro no BD
		$linhasEncontradas = mysqli_num_rows($resultado);

		if($linhasEncontradas == 1){
			return true;
		}else{
			return false;
		}
	}

	public function selectGeral(){
		$conect = new Conexao();
		$query = "SELECT * FROM usuario";

		return $conect->mysqli->query($query);
	}

}

?>