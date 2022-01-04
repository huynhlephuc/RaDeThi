<?php
    class Controller{
        public function Model($model){
            require_once "./mvc/models/".$model.".php";
            return new $model;
        }

        public function View($view, $data=[]){
            require_once "./mvc/views/".$view.".php";
        }

        public function CheckSession(){
            if (!isset($_SESSION["id"])){
                header("Location: http://localhost/hotrorade/Home");
            }
        }
    }
