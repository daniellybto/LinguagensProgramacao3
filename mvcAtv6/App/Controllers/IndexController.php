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
            // print_r($usuarios);

            $this->render("index");
        }
        
        public function formAddUser(){//FUNÇÃO PARA ADICIONAR UM FORMULÁRIO PARA ADICIONAR UM NOVO USUÁRIO
            
            #criando a instância da conexão com o BD com mysqli!
            $conexao = Conexao::getDb();
            
            #instanciar o modelo de conexão... 
            $usuario = new Usuario($conexao);
            
            #Novo atributo criado com a simples função de Customizar o título que aparecerá na View!!!
            $this->titulo = "Novo Usuário";
            #Novo atributo para personalizar os campos do formulário
            $this->formAddUserNames = array(
                'Nome' => 'usu_nome',
                'Email' => 'usu_email',
                'Senha' => 'usu_senha'
            );

            #Novo atributo para customizar o value do action do button submit!
            #Esse atributo formAction é que irá disparar a ROTA personalizada addUser() !!!!
            $this->formAction = 'addUser';

            //renderizar página do Form p/ Add User!
            $this->render("add");
        }

        public function addUser(){#Função que irá Adicionar um Usuário!
            #criando a instância da conexão com o BD com mysqli!
            $conexao = Conexao::getDb();

            #instanciar o modelo de conexão... 
            $usuario = new Usuario($conexao);
            $usuario->__set("nome", utf8_decode($_POST["usu_nome"]));
            $usuario->__set("email", utf8_decode($_POST["usu_email"]));
            $usuario->__set("senha", md5($_POST["usu_senha"]));

            #esse atributo view vem da classe herdada 'InitConfigController'
            #este atributo especificamente devolve uma impressão na minha view!
            $this->resultAction = ($usuario->add() == true ? "<br><br><h3 class='text-success text-center'>Cliente Adicionado com Sucesso!</h3>" : "<br><br><h3 class='text-danger text-center'>Cliente NÃO FOI ADICIONADO com Sucesso :-(</h3>");
           
            $this->render("index");
        }

        public function formUpdateUser(){//FUNÇÃO PARA ADICIONAR UM FORMULÁRIO PARA Atualizar dados do Usuário
            #criando a instância da conexão com o BD com mysqli!
            $conexao = Conexao::getDb();

            #instanciar o modelo de conexão... 
            $usuario = new Usuario($conexao);

            $resultQuery = $usuario->listAll();
            $this->view->dados = $resultQuery;

            #Novo atributo criado com a simples função de Customizar o título que aparecerá na View!!!
            $this->titulo = "Dados de Usuário";
            #Novo atributo para personalizar os campos do formulário
            $this->formAddUserNames = array(
                'ID Usuário' => 'idusuario',
                'Nome do Usuário' => 'usu_nome',
                'Email do Usuário' => 'usu_email'
            );

            #Novo atributo para customizar o value do action do button submit!
            #Esse atributo formAction é que irá disparar a ROTA personalizada addUser() !!!!
            $this->formAction = 'updateUser';

            $this->render("update");
        }

        public function updateUser(){// FUNÇÃO que IRÁ PEGAR OS DADOS DO FORMULÁRIO QUE O CLIENTE ESCOLHEU E IRÁ APRESENTAR EM UM OUTRO FORM PARA QUE ELE POSSA EDITAR... 
            #criando a instância da conexão com o BD com mysqli!
            $conexao = Conexao::getDb();

            #instanciar o modelo de conexão... 
            $usuario = new Usuario($conexao);

            #pegar o dado do id do usuário do formulário
            $iduser = $_POST["id"];

            $resultQuery = $usuario->listOne($iduser);

            // echo "<pre>";
            // print_r(mysqli_fetch_assoc($resultQuery));
            // echo "</pre>";

            $this->view->dados = mysqli_fetch_assoc($resultQuery);

            #Novo atributo criado com a simples função de Customizar o título que aparecerá na View!!!
            $this->titulo = "Dados do Usuário";
            #Novo atributo para personalizar os campos do formulário
            $this->formAddUserNames = array(
                'ID Usuário' => 'idusuario',
                'Nome do Usuário' => 'usu_nome',
                'Email do Usuário' => 'usu_email',
                'Senha' => 'usu_senha'
            );

            #Novo atributo para customizar o value do action do button submit!
            #Esse atributo formAction é que irá disparar a ROTA personalizada addUser() !!!!
            $this->formAction = 'executeUpdate';

            $this->render("formUpdate");

        }


        
        // public function sobreNos(){
        //     #criando a instância da conexão com o BD com mysqli!
        //     $conexao = Conexao::getDb();

        //     #instanciar o modelo de conexão... 
        //     $usuario = new Usuario($conexao);

        //     $usuarios = $usuario->listAll();
            
        //     #esse atributo view vem da classe herdada 'InitConfigController'
        //     $this->view->dados = $usuarios;

        //     $this->render("sobreNos");
            
        // }
        
    }

?>
