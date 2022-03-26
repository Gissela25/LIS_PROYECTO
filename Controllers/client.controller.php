<?php

require_once "Models/client.php";

class clientcontroller{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new client;
    }

    public function Add(){
        require_once "Views/Registrar.php";
    }

    public function registrar()
        {
            require_once "Views/Registrar.php";
        }

//     public function Insert(){
//         $titulo = "Ingresar";
//         $p=new client();
//         if(isset($_GET['idc'])){
//         $p=$this->modelo->have($_GET['idc']);
//         $titulo="Actualizar";
//         }
//         require_once "Views/client/client-insert.php";
//     }

//     public function Save(){
//         $p=new client();
//         $Clave=$_POST['Clave'];
//         $pwd_encrypt=  password_hash($Clave,PASSWORD_DEFAULT, ['cost' => 10]);  
//         $p->setPro_idc($_POST['dui']);
//         $p->setPro_nom($_POST['Nombre']);
//         $p->setPro_ape($_POST['Apellido']);
//         $p->setPro_phone($_POST['Telefono']);
//         $p->setPro_correo($_POST['Correo']);
//         $p->setPro_Clave($_POST['Clave']);
//         $p->setPro_address($_POST['Direccion']);
//         $p->setPro_ver(intval($_POST['Verificado']));
//         //$p->setPro_estado(intval($_POST['Estado']));
//         //$p->setPro_acce(intval($_POST['Acceso']));
//         //$p->setPro_id(intval($_POST['ID_Sucursal']));
//         $p->setPro_Clave($pwd_encrypt);

//         $this->modelo->Insert($p);


//         header("location:?c=client&a=client");
//     }

//     public function clientedit(){
//         $titulo = "Ingresar";
//         $p=new client();
//         if(isset($_GET['idc'])){
//         $p=$this->modelo->have($_GET['idc']);
//         $titulo="Actualizar";
//         }
//         require_once "Views/client/client-edit.php";
//     }

    
//      public function Saveedit()
//      {
//         $p=new client();
//         $pwd_encrypt=  password_hash($Clave,PASSWORD_DEFAULT, ['cost' => 10]);
//         $p->setPro_idc($_POST['dui']);
//         $p->setPro_nom($_POST['Nombre']);
//         $p->setPro_ape($_POST['Apellido']);
//         $p->setPro_correo($_POST['Correo']);
//         $p->setPro_Clave($_POST['Clave']);
//         $p->setPro_ver(intval($_POST['Verificado']));
//         $p->setPro_estado(intval($_POST['Estado']));
//         $p->setPro_acce(intval($_POST['Acceso']));
//         $p->setPro_id(intval($_POST['ID_Sucursal']));
//         $p->setPro_Clave($pwd_encrypt);
        
//         $this->modelo->Update($p);
//         header("location:?c=client&a=client");
//  }
}