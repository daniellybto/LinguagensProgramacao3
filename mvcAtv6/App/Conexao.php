<?php
    namespace App;
    
    # Responsável por fazer a conexão com o BD!
    class Conexao{
        
        #com a definição deste método como 'static' eu não preciso criar uma nova instância de Conexao para utilizar este método getDb.. 
        #basta que eu utilize o artifício= Conexao::getDb
        # ou seja, com os 2 pontos eu consigo chamar esse método diretamente!
        public static function getDb(){

            #essa funçao $_SERVER['SERVER_NAME'] é uma função própria do php que verifica se a aplicação
            #está no 'localhost' ou não...
            if($_SERVER['SERVER_NAME'] == 'localhost'){
                $servidor = "localhost";
                $usuario = "root";
                $senha = "";
                $banco = "ifto";
            } else{#caso eu esteja com os arquivos no meu servidor online, essas são as configurações:
				$servidor = "sql206.epizy.com";
				$usuario = "epiz_24290622";
				$senha = "8DNijcCZd9B";
				$banco = "epiz_24290622_ifto";

			}
			try {
                $conexao = new \mysqli($servidor, $usuario, $senha, $banco);

                return $conexao;

			} catch (Exception $erro) {
				echo "Erro... Não foi possível conectar ao Banco de Dados: ". $erro->getMessage();
			}

        }
        
    }
    
?>