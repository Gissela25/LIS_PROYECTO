<?php

require_once "Models/family.php";

class familycontroller{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new family;
    }

    public function family(){
        require_once "Views/family/family.php";
    }

    public function Insert(){
        $titulo = "Ingresar";
        $p=new family();
        if(isset($_GET['id'])){
            $p=$this->modelo->have($_GET['id']);
            $titulo="Actualizar";
        }
        require_once "Views/family/family-insert.php";
    }

    public function Save(){
        $p=new family();
        $p->setPro_id(($_POST['ID_Familia']));
        $p->setPro_nom($_POST['Nombre']);

        $this->modelo->Insert($p);

        header("location:?c=family&a=family");
    }

    public function Saveedit(){
        $p=new family();
        $p->setPro_id(($_POST['ID_Familia']));
        $p->setPro_nom($_POST['Nombre']);

        $this->modelo->Update($p);

        header("location:?c=family&a=family");
    }

    public function edit(){
        $titulo = "Ingresar";
        $p=new family();
        if(isset($_GET['id'])){
            $p=$this->modelo->have($_GET['id']);
            $titulo="Actualizar";
        }
        require_once "Views/family/family-edit.php";
    }

    public function sendelete()
    {
        $titulo = "Ingresar";
        $p=new family();
        if(isset($_GET['id'])){
            $p=$this->modelo->have($_GET['id']);
            $titulo="Actualizar";
        }
        require_once "Views/family/family-delete.php";
    }

    // public function delete(){
    //     $this->modelo->Delete($_Get["id"]);

    //     header("location:?c=family&a=family");
    // }
    public function Borrar(){
        $this->modelo->Eliminar($_GET['id']);
        header("location:?c=family&a=family");
    }

  

}
