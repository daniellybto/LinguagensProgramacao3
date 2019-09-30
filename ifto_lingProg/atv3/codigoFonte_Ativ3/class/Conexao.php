<?php
    class Conexao{
        private $servidor = 'localhost';
        private $usuario = 'root';
        private $senha = '';
        private $bancoDeDados = 'ifto';
        public $mysqli;

        public function __construct(){
            $this->mysqli = new mysqli($this->servidor, $this->usuario, $this->senha, $this->bancoDeDados);

            if($this->mysqli->connect_errno){
                echo "Falha ao conectar:: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
                exit();
            }
        }
        
    }

?>