<?php
session_start();
extract($_SESSION);
require_once('Core/config.php');
if(!isset($correo)||!isset($usuario)||!isset($nombre)||!isset($apellido))
{
   require_once "Views/index.php";
    die();
}
?>