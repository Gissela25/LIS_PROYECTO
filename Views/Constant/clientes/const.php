<?php
session_start();
extract($_SESSION);
require_once('Core/config.php');
if(!isset($correo)||!isset($usuario)||!isset($nombre)||!isset($apellido)||!isset($telefono)||!isset($direccion))
{
    echo "<script>location.href='".PATH."'</script>";
    die();
}
?>