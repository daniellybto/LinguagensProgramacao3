<?php
    namespace App\Models;

use mysqli;

class Usuario{
        #essa variável irá receber a conexão com o BD!
        protected $conexaoDb;

        private $nome;
        private $email;
        private $senha;

        public function __construct(\mysqli $conexao){
            $this->conexaoDb = $conexao;
        }

        public function __set($atributo, $value){
            $this->$atributo = $value;
        }

        public function __get($value){
            return $this->$value;
        }

        #Lista Todos os dados da tabela usuario!
        public function listAll(){
            return mysqli_query($this->conexaoDb, "SELECT * FROM usuario");
        }
        #Lista um dado específico da tabela usuário
        public function listOne($campo, $idusuario){
            return mysqli_query($this->conexaoDb, "SELECT * FROM usuario WHERE $campo = $idusuario");
        }

        #Adiciona um Novo usuário no Banco de dados
        public function add(){
            $query = "INSERT INTO usuario(usu_nome, usu_email, usu_senha) VALUES ('$this->nome', '$this->email', '$this->senha')";

            // print_r($query);

            try {
                return mysqli_query($this->conexaoDb, $query);
            } catch (\Exception $erro) {
                // echo "Erro... Não foi possível conectar ao Banco de Dados: ". $erro->getMessage();
                return false;
            }
        }

    }

?>