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
        if(!isset($i_pass)||isVoid($i_pass))
        {
            array_push($errores_log,"Debes ingresar una contraseña");
        }elseif(!isMail($i_email))
        {
            array_push($errores_log,"Debes ingresar una dirección de correo válida");
        }
        if(isMail(isset($i_email))&&isPass(isset($i_pass)))
        {
            $pwd_encrypt=  password_hash($i_email,PASSWORD_DEFAULT, ['cost' => 10]);    
            $model = new Log();
            $model->setEmail($i_email);
            $model->setPass($pwd_encrypt);
            $model->Login($i_email);
        }
    }