<?php

require_once "Models/branch.php";
require_once "Models/worker.php";

class InicioController{
    private $modelo;

    public function __CONSTRUCT(){
       $this->modelo=new branch();
       $this->modelo=new worker();
    }
    public function Inicio(){
        //$bd = BasedeDatos::Conectar();
        require_once "Views/index.php";
    }
}