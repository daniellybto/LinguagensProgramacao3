<?php
    namespace App\Models;

use mysqli;

class Usuario{
        #essa variável irá receber a conexão com o BD!
        protected $conexaoDb;

        public function __construct(\mysqli $conexao){
            $this->conexaoDb = $conexao;
        }

        public function listAll(){
            return mysqli_query($this->conexaoDb, "SELECT * FROM usuario");

        }


    }

?>