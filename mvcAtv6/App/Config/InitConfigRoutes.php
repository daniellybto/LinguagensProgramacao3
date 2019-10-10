<?php
#Configuração de Inicialização da aplicação!
#tipo o arquivo Bootstrap.php
    namespace App\Config;

    #uma classe abstrata não pode ser instanciada, apenas extendida/herdada!!!
    abstract class InitConfigRoutes{
        private $routes;

        #aqui é tipo uma 'interface' que obriga a classe que instancia esta classe a ter uma classa initRoutes()
        #ou seja, deve ser implementada na classe filha!
        abstract protected function initRoutes();
        
        public function __construct(){
            $this->initRoutes();
            $this->run($this->getUrl());
        }
        
        public function getRoutes(){
            return $this->routes;
        }

        public function setRoutes(array $rota){
            $this->routes = $rota;
        }

        protected function getUrl(){
            #retorno qual é o URL, baseado apenas no Path , sem considerar método __GET['']
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        }
        
        #método protected é protegido mais pode ser herdado!
        protected function run($url){

            foreach ($this->getRoutes() as $key => $route){
               
                if($url == $route['route']){
                    $class = "App\\Controllers\\" . $route['controller'];

                    $controller = new $class;
                    
                    $action = $route['action'];

                    $controller->$action();
                }
            }
        }

    }
    
?>