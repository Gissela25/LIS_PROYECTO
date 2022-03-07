<?php
    include_once 'validaciones.php';
    $errores_rec=array();
    if(isset($_POST['confirmar']))
    {
        extract($_POST);
        if(!isset($correo)||isVoid($correo))
        {
            array_push($errores_rec,"Debes ingresar una dirección de correo");
        }
        if(isMail($correo))
        {
            $modelo = new User();
            $modelo->setEmail($correo);
            $modelo->activarCuenta();
        }
      
    }
