<?php

require_once "Models/branch.php";
require_once "Models/worker.php";
require_once "Models/family.php";
require_once "Models/products.php";
require_once "Core/config.php";
class InicioController{
    private $modelo;

    public function __CONSTRUCT(){
       $this->modelo=new branch();
       $this->modelo=new worker();
       $this->modelo=new family();
       $this->modelo=new products();
    }
    public function Inicio(){
        //$bd = BasedeDatos::Conectar();
        require_once "Views/index.php";
    }
}