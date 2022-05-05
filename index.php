<?php
include_once "./Core/routing.php";
include_once "./Core/config.php";
include_once "./Controllers/IndexController.php";
include_once "./Controllers/UsuariosController.php";
include_once "./Controllers/ClientesController.php";
include_once "./Controllers/ProductosController.php";
include_once "./Controllers/FamiliasController.php";
include_once "./Controllers/SucursalesController.php";
include_once "./Controllers/CarritosController.php";
include_once "./Controllers/FacturasController.php";
$router = new Routing();
$controller=$router->controller;
$method=$router->method;
$param=$router->param;
$param2=$router->param2;
$param3=$router->param3;
session_start();
$controller=new $controller;
$controller->$method($param,$param2,$param3);
?>
