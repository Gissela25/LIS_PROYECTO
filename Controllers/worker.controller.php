<?php

require_once "Models/worker.php";

class workercontroller{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new worker;
    }

    public function worker(){
        require_once "Views/worker/worker.php";
    }

    public function Insert(){
        $titulo = "Ingresar";
        $p=new worker();
        if(isset($_GET['idu'])){
        $p=$this->modelo->have($_GET['idu']);
        $titulo="Actualizar";
        }
        require_once "Views/worker/worker-insert.php";
    }

    public function Save(){
        $p=new worker();
        $Clave=$_POST['Clave'];
        $pwd_encrypt=  password_hash($Clave,PASSWORD_DEFAULT, ['cost' => 10]);  
        $p->setPro_idu($_POST['ID_Usuario']);
        $p->setPro_nom($_POST['Nombre']);
        $p->setPro_ape($_POST['Apellido']);
        $p->setPro_correo($_POST['Correo']);
        $p->setPro_Clave($_POST['Clave']);
        $p->setPro_ver(intval($_POST['Verificado']));
        $p->setPro_estado(intval($_POST['Estado']));
        $p->setPro_acce(intval($_POST['Acceso']));
        $p->setPro_id(intval($_POST['ID_Sucursal']));
        $p->setPro_Clave($pwd_encrypt);

        $this->modelo->Insert($p);


        header("location:?c=worker&a=worker");
    }

    public function workeredit(){
        $titulo = "Ingresar";
        $p=new worker();
        if(isset($_GET['idu'])){
        $p=$this->modelo->have($_GET['idu']);
        $titulo="Actualizar";
        }
        require_once "Views/worker/worker-edit.php";
    }

    
     public function Saveedit()
     {
        $p=new worker();
        $pwd_encrypt=  password_hash($Clave,PASSWORD_DEFAULT, ['cost' => 10]);
        $p->setPro_idu($_POST['ID_Usuario']);
        $p->setPro_nom($_POST['Nombre']);
        $p->setPro_ape($_POST['Apellido']);
        $p->setPro_correo($_POST['Correo']);
        $p->setPro_Clave($_POST['Clave']);
        $p->setPro_ver(intval($_POST['Verificado']));
        $p->setPro_estado(intval($_POST['Estado']));
        $p->setPro_acce(intval($_POST['Acceso']));
        $p->setPro_id(intval($_POST['ID_Sucursal']));
        $p->setPro_Clave($pwd_encrypt);
        
        $this->modelo->Update($p);
        header("location:?c=worker&a=worker");
 }
}