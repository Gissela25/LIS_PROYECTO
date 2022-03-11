<?php

require_once "Models/worker.php";

class workercontroller{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new worker;
    }

    public function worker(){
        require_once "Views/worker.php";
    }

    public function Insert(){
        // $titulo = "Ingresar";
        // $p=new branch();
        // if(isset($_GET['id'])){
        //     $p=$this->modelo->have($_GET['id']);
        //     $titulo="Actualizar";
        // }
        require_once "Views/worker-insert.php";
    }

    public function Save(){
        $p=new worker();
        $p->setPro_idu($_POST['ID_Usuario']);
        $p->setPro_nom($_POST['Nombre']);
        $p->setPro_ape($_POST['Apellido']);
        $p->setPro_correo($_POST['Correo']);
        $p->setPro_Clave($_POST['Clave']);
        $p->setPro_id(intval($_POST['ID_Sucursal']));

        // $p->getPro_idu() > 0 ?
        // $this->modelo->Update($p) :
        $this->modelo->Insert($p);

        header("location:?c=worker&a=worker");
    }

    public function workeredit(){
        $p=new worker();
        if(isset($_GET['idu'])){
             $p=$this->modelo->have($_GET['idu']);
         }
        require_once "Views/worker-edit.php";
    }

    
    public function Saveedit(){
        $p=new worker();
        $p->setPro_idu($_POST['ID_Usuario']);
        $p->setPro_nom($_POST['Nombre']);
        $p->setPro_ape($_POST['Apellido']);
        $p->setPro_correo($_POST['Correo']);
        $p->setPro_Clave($_POST['Clave']);
        $p->setPro_act(intval($_POST['Activo']));
        $p->setPro_acce(intval($_POST['Acceso']));
        $p->setPro_id(intval($_POST['ID_Sucursal']));

    
        $this->modelo->Update($p);
    

        header("location:?c=worker&a=worker");
    }
}
