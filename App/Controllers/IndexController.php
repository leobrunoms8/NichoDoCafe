<?php
    namespace App\Controllers;

    class IndexController {
        public function index(){
            $this->render("index");
        }

        public function sobreNos(){
            $this->render("sobreNos");
        }

        public function render($view){
            require_once "../App/Views/index/".$view.".phtml";
        }
    }


?>