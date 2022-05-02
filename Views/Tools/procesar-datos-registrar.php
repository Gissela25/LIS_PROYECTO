<?php
    require_once 'validaciones.php';
    $errores=array();
    if(isset($_POST['add']))
    {
        extract($_POST);
        if(!isset($dui)||isVoid($dui))
        {
            array_push($errores,"Debes ingresar un número de DUI");
        }
        elseif(!isdui($dui))
        {
            array_push($errores,"Debes ingresar un número de DUI valido");
        }
        if(!isset($Nombre)||isVoid($Nombre))
        {
            array_push($errores,"Debes ingresar un Nombre");
        }
        elseif(!isText($Nombre))
        {
            array_push($errores,"Debes ingresar un Nombre valido");
        }
        if(!isset($Apellido)||isVoid($Apellido))
        {
            array_push($errores,"Debes ingresar una Apellido");
        }
        elseif(!isText($Apellido))
        {
            array_push($errores,"Debes ingresar un Apellido valido");
        }
        if(!isset($Telefono)||isVoid($Telefono))
        {
            array_push($errores,"Debes ingresar un telefono");
        }
        elseif(!istel($Telefono))
        {
            array_push($errores,"Debes ingresar un telefono valido");
        }
        if(!isset($correo)||isVoid($correo))
        {
            array_push($errores,"Debes ingresar una dirección de correo");
        }
        elseif(!isMail($correo))
        {
            array_push($errores,"Debes ingresar una dirección de correo válida");
        }
        if(!isset($Direccion)||isVoid($Direccion))
        {
            array_push($errores,"Debes ingresar una Direccion");
        }
        elseif(!isText($Direccion))
        {
            array_push($errores,"Debes ingresar una Direccion valida");
        }
        if(!isset($Clave)||isVoid($Clave))
        {
            array_push($errores,"Debes ingresar una contraseña");
        }
        elseif(!isPass($Clave))
        {
            array_push($errores,"Debes ingresar una contraseña válida");
        }
        if(isMail($correo)&&isPass($Clave)&&isdui($DUI)&&istel($Telefono)&&isText($Nombre)&&isText($Apellido)&&isText($Direccion))
        {          
            $pwd_encrypt=  password_hash($Clave,PASSWORD_DEFAULT, ['cost' => 10]);    
            $modelo = new client();
            $modelo->setPro_idc($DUI);
            $modelo->setPro_nom($Nombre);
            $modelo->setPro_ape($Apellido);
            $modelo->setPro_tel($Telefono);
            $modelo->setPro_correo($correo);
            $modelo->setPro_Clave($Clave);
            $modelo->setPro_address($Direccion);
            $modelo->setPro_ver($Verificar);
            $modelo->setPro_Clave($pwd_encrypt);
            $modelo->Save();
            header("location:?c=inicio");
        }
    }