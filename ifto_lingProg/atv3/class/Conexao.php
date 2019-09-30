<?php
    class Conexao{
        //servidor local
        // private $servidor = 'localhost';
        // private $usuario = 'root';
        // private $senha = '';
        // private $bancoDeDados = 'ifto';
        
        //servidor epizy
        private $servidor = 'sql206.epizy.com';
        private $usuario = 'epiz_24290622';
        private $senha = '8DNijcCZd9B';
        private $bancoDeDados = 'epiz_24290622_ifto';

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