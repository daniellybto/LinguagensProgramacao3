<?php
//classe que vai fazer conexão da aplicação para o BD!
namespace Conexao;

use mysqli;

class Conexao{
    private $servidor = "localhost";
    private $usuario = "root";
    private $senha = "";
    private $banco = "ifto";

    function __construct()
    {
        $mysqli = new mysqli($this->servidor, $this->usuario, $this->senha, $this->banco);

        if($mysqli->connect_errno){
            echo "Falha ao Conectar: (".$mysqli->connect_errno. ") " . $mysqli->connect_error;
            exit();
        }
    }
}

?>