<?php

require_once "Models/branch.php";

class branchcontroller{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new branch;
    }

    public function branch(){
        require_once "Views/branch/branch.php";
    }

    public function Insert(){
        $titulo = "Ingresar";
        $p=new branch();
        if(isset($_GET['id'])){
            $p=$this->modelo->have($_GET['id']);
            $titulo="Actualizar";
        }
        require_once "Views/branch/branch-insert.php";
    }

    public function Save(){
        $p=new branch();
        $p->setPro_id(intval($_POST['ID_Sucursal']));
        $p->setPro_nom($_POST['Nombre_Sucursal']);

        $p->getPro_id() > 0 ?
        $this->modelo->Update($p) :
        $this->modelo->Insert($p);

        header("location:?c=branch&a=branch");
    }

    public function inicio(){

        require_once "Views/branch/index.php";
    }
}
