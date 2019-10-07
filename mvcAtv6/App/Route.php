<?php
    namespace App;
    use App\Config\InitConfigRoutes;

    class Route extends InitConfigRoutes {

        #função que irá dizer quais são as rotas que a aplicação possui!
        protected function initRoutes(){
            #aqui eu pego o nome do diretório (caminh completo do diretório tipo: c://xampp/htdos/ etc....)
            $diretorio = explode("\\",dirname(__DIR__));

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

            $this->setRoutes($routes);
        }

    }
?>