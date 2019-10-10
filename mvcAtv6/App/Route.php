<?php
    namespace App;
    use App\Config\InitConfigRoutes;

    class Route extends InitConfigRoutes {

        #função que irá dizer quais são as rotas que a aplicação possui!
        protected function initRoutes(){
            #aqui eu pego o nome do diretório (caminh completo do diretório tipo: c://xampp/htdos/ etc....)
            // $diretorio = explode("\\",dirname(__DIR__));
            $diretorio = explode(DIRECTORY_SEPARATOR,dirname(__DIR__));

            #Se existir essa ação, ou seja, se houver uma solicitação de algum formulário então eu irei criar uma Rota p/ atender meu form!
            if(isset($_POST['acao'])){

                $routes [$_POST['acao']] = array(
                    'route' => "/" . end($diretorio) ."/".$_POST['acao'],
                    'controller'  => 'IndexController',
                    'action' => $_POST['acao']
                );
            }

            #quando eu vou passar a rota eu pego o ultimo diretório end($diretorio), para incluir na chave route!
            $routes ['home'] = array(
                'route' => "/" . end($diretorio) . "/",
                'controller'  => 'IndexController',
                'action' => 'index'
            );
            $routes ['sobre_nos'] = array(
                'route' => "/" . end($diretorio) .'/sobre_nos',
                'controller'  => 'IndexController',
                'action' => 'sobreNos'
            );
            $routes ['FormAddUser'] = array(
                'route' => "/" . end($diretorio) .'/FormAddUser',
                'controller'  => 'IndexController',
                'action' => 'formAddUser'
            );
            $routes ['FormUpdateUser'] = array(
                'route' => "/" . end($diretorio) .'/FormUpdateUser',
                'controller'  => 'IndexController',
                'action' => 'formUpdateUser'
            );
            


            $this->setRoutes($routes);
        }

    }
?>