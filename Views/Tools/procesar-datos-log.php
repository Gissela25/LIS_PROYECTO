<?php
    require_once 'validaciones.php';
    $errores_log=array();
    if(isset($_POST['ingresar']))
    {
        extract($_POST);
        if(!isset($i_email)||isVoid($i_email))
        {
            array_push($errores_log,"Debes ingresar una dirección de correo");
        }
        elseif(!isMail($i_email))
        {
            array_push($errores_log,"Debes ingresar una dirección de correo válida");
        }
        if(!isset($i_pass)||isVoid($i_pass))
        {
            array_push($errores_log,"Debes ingresar una contraseña");
        }
        elseif(!isPass($i_pass))
        {
            array_push($errores_log,"Debes ingresar una contraseña válida");
        }
        if(isMail($i_email)&&isPass($i_pass))
        {          
            //$pwd_encrypt=  password_hash($i_email,PASSWORD_DEFAULT, ['cost' => 10]);    
            $modelo = new User();
            $modelo->setEmail($i_email);
            $modelo->setPass($i_pass);
            $modelo->Into();
        }
    }