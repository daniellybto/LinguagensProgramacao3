<?php
    if(!class_exists("Banco")){
        class Banco{
            private $linhas; #contar o número de linhas encontrados em uma consulta
            private $array_dados;
            private $pdo;
            private $banco;

            public function __construct(){
                try {
                    #essa funçao $_SERVER['SERVER_NAME'] é uma função própria do php que verifica se a aplicação
                    #está no 'localhost' ou não...
                    if($_SERVER['SERVER_NAME'] == 'localhost'){
                        //code...
                        $host = 'localhost';
                        $usuario = 'root';
                        $senha = '';
                        $bd = 'aluno';
                    } else{ #caso eu esteja com o arquivo em um servidor online são essas as configurações
                            #que ele irá usar....
                        $host = 'servidor.com';
                        $usuario = 'user_banco_online';
                        $senha = 'senha_banco_online';
                        $bd = 'banco_online';

                    }
 
                    $this->banco = $bd;
                    $this->pdo = new PDO("mysql:dbname=$bd;host=$host",$usuario,$senha);
                    // $this->pdo = new PDO("mysql:dbname=". $bd . ";host=" . $host,$usuario,$senha);
                    $this->pdo->exec("set names utf8");

                } catch (PDOException $erro) {
                    //throw $erro;
                    echo "Erro... Não foi possível conectar ao banco de dados: " . $erro->getMessage();
                }
                
            }

            public function query($sql){
                $query = $this->pdo->query($sql);
                $this->linhas = $query->rowCount(); #retorna a quantidade de linhas encontradas em um select por exemplo / ou afetadas por uma inserção INSERT INTO, por exemplo
                $this->array_dados = $query->fetchAll(); #retorna um array com todos os resultados das linhas!
            }

            public function linhas(){#função para pegar/retornar a quantidade de linhas encontradas!
                return $this->linhas;
            }

            public function result(){#função que retornará o array de dados do banco de dados...
                return $this->array_dados;
            }
        }
    }

    // $bd = new Banco();
?>