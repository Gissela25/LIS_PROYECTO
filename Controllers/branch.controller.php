<?php

require_once "Models/branch.php";

class branchcontroller{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new branch;
    }

    public function branch(){
        require_once "Views/branch.php";
    }

    public function Insert(){
        require_once "Views/branch-insert.php";
    }

    public function Save(){
        $p=new branch();
        $p->setPro_id(intval($_POST['ID_Sucursal']));
        $p->setPro_nom($_POST['Nombre_Sucursal']);

        $this->modelo->Insert($p);

        header("location:?c=branch&a=branch");
    }
}
