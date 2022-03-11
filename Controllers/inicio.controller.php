<?php

require_once "Models/branch.php";

class InicioController{
    private $modelo;

    public function __CONSTRUCT(){
       $this->modelo=new branch();
    }
    public function Inicio(){
        //$bd = BasedeDatos::Conectar();
        require_once "Views/index.php";
    }
}