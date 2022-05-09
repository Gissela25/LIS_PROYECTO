<?php

include_once './Controllers/Controller.php';
include_once './Core/config.php';
include_once './Controllers/CarritosController.php';
include_once './Models/FacturasModel.php';
class FacturasController extends Controller{

    private $modelo;
    public function __construct()
    {
        $this->modelo= new FacturasModel();
    }
    public function Ver($id)
    {
        if(isset($_SESSION['login_buffer']))
        {
            if($_SESSION['login_buffer']['Acceso']==2||$_SESSION['login_buffer']['Acceso']==1)
            {
            $viewBag=[];
            $viewBag['datos']=$this->modelo->GetSpecificSales($id);
            $this->render("factura.php",$viewBag);
            }
            else
            {

                if($_SESSION['login_buffer']['Acceso']==0)
                {
                    header('Location: '.PATH.'Usuarios/Inicio');
                }
                elseif($_SESSION['login_buffer']['Acceso']==4)
                {
                    header('Location: '.PATH.'Usuarios/Main');
                }
            }
        }
        else
        {
            header('Location: '.PATH);
        }
    }

    public function Listado()
    {
        if($_SESSION['login_buffer']['Acceso']==1)
        {
        $viewBag['facturas']=$this->modelo->getAllSales();
        $this->render("listado.php",$viewBag);
        }
        else{
            if($_SESSION['login_buffer']['Acceso']==0)
                {
                    header('Location: '.PATH.'Usuarios/Inicio');
                }
                elseif($_SESSION['login_buffer']['Acceso']==4)
                {
                    header('Location: '.PATH.'Usuarios/Main');
                }
                elseif($_SESSION['login_buffer']['Acceso']==2)
                {
                    header('Location: '.PATH);
                }
        }
    }

    public function Index()
    {
        if(isset($_SESSION['login_buffer']))
        {
            if($_SESSION['login_buffer']['Acceso']==2)
            {
        $viewBag = array();
        if(isset($_SESSION['login_buffer']))
        {
            $carritosModel = new CarritosModel();
            $id_carrito=sha1($_SESSION['login_buffer']['DUI']);
            $viewBag['carritos']=$carritosModel->CountQuantity($id_carrito);
        }
        $id_carrito=sha1($_SESSION['login_buffer']['DUI']);
        $viewBag['facturas']=$this->modelo->GetMySales($id_carrito);
        $this->render("index.php",$viewBag);
            }
            else
            {
                if($_SESSION['login_buffer']['Acceso']==0)
                {
                    header('Location: '.PATH.'Usuarios/Inicio');
                }
                elseif($_SESSION['login_buffer']['Acceso']==1)
                {
                    header('Location: '.PATH.'Usuarios/Home');
                }
                elseif($_SESSION['login_buffer']['Acceso']==4)
                {
                    header('Location: '.PATH.'Usuarios/Main');
                }
            }
        }
        else
        {
            header('Location: '.PATH);
        }

    }
}
?>