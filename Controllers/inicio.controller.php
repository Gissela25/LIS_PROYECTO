<?php


class InicioController{
    private $modelo;

    public function __CONSTRUCT(){
       
    }
    public function Inicio(){
        //$bd = BasedeDatos::Conectar();
        require_once "Views/index.php";
    }
}