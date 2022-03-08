<?php

require_once "Models/branch.php";

class branchcontroller{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new branch;
    }

    public function Inicio(){
        require_once "Views/branch.php";
    }
}