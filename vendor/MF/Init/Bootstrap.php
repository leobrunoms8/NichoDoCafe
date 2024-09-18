<?php
    namespace MF\Init;

    abstract class Bootstrap{
        private $routes;

        // Array com rotas, contoladores e açoes da aplicação
        abstract protected function initRoutes();

        // Construtor inicializado ao carregar a página public/index
        public function __construct(){
            $this->initRoutes();
            $this->run($this->getUrl());
        }

        public function getRoutes(){ // Getter
            return $this->routes;
        }

        public function setRoutes(array $routes){ // Setter
            $this->routes = $routes;
        }

        // Função executada no construror que percorre as rotas instanciadas e verifica a rota selecionada
        protected function run($url){
            foreach($this->getRoutes() as $key => $route){

                // Validada a rota é instaciado o respectivo namespace e então executada a ação
                if($url == $route['route']){
                    $class = "App\\Controllers\\".ucfirst($route['controller']);

                    $controller = new $class;
                    $action = $route['action'];
                    $controller->$action();
                }
            }
        }

        // Retorna o path validado para a seleção da rota a ser acionada
        protected function getUrl(){
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        }
    }


?>