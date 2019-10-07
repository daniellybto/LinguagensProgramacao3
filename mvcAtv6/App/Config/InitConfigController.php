<?php
    #Configuração de Inicialização da aplicação - Controller!
    #tipo o arquivo Action.php
    namespace App\Config;

        
    #a stdClass é uma classe nativa do php, através dela é possível criar Objetos padrões...
    // use stdClass;

    #uma classe abstrata não pode ser instanciada, apenas extendida/herdada!!!
    abstract class InitConfigController{
        #atributo que irá armazenar todos os dados retornados por alguma requisição do Model, ou seja, serão os dados retornados através de querys do BD!
        protected $view;

        public function __construct(){
            #neste caso estamos criando um Objeto vazio e armazenando no atributo $view;
            $this->view = new \stdClass();
        }

        #método protected é protegido mais pode ser herdado!
        # o método render é o responsável por "incluir" o layout padrão para as páginas,... 
        # que no caso é a nav bar!
        protected function render($view){
            $this->view->page = $view;
            require_once "../App/Views/index.phtml"; 
        }

        #o método content é o responsável por pôr o conteúdo dinamicamente no corpo da minha página... , 
        # ou seja, ele é o responsável por renderizar o conteúdo variável da minha página!
        protected function content(){
            require_once "../App/Views/" . $this->view->page . ".phtml"; 
        }

    }
    
?>