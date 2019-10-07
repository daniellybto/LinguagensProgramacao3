<?php
    namespace App\Controllers;
    use App\Config\InitConfigController;
    use App\Conexao;
    use App\Models\Usuario;

    class IndexController extends InitConfigController{

        public function index(){
            #exemplo de como passar dados através do atributo $view:
            #neste caso estou criando um atributo 'dados' para meu objeto vazio $view, já que através do __construtc eu havia criado um objeto vazio para o atributo $view através da classe stdClass.
            //
            // $this->view->dados = "Select * From tabela";

            #criando a instância da conexão com o BD com mysqli!
            $conexao = Conexao::getDb();

            #instanciar o modelo de conexão... 
            $usuario = new Usuario($conexao);

            $usuarios = $usuario->listAll();

            #esse atributo view vem da classe herdada 'InitConfigController'
            $this->view->dados = $usuarios;
            print_r($usuarios);

            $this->render("index");

        }
        
        public function sobreNos(){
            #criando a instância da conexão com o BD com mysqli!
            $conexao = Conexao::getDb();

            #instanciar o modelo de conexão... 
            $usuario = new Usuario($conexao);

            $usuarios = $usuario->listAll();

            #esse atributo view vem da classe herdada 'InitConfigController'
            $this->view->dados = $usuarios;

            $this->render("sobreNos");
        }


        
    }

?>