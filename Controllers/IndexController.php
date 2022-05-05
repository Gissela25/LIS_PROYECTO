<?php
include_once './Controllers/Controller.php';
include_once './Core/config.php';
include_once './Controllers/CarritosController.php';
class IndexController extends Controller{
    private $modelo;

    public function __construct()
    {
        
    }

    public function Index()
    {
        $viewBag = array();
        if(isset($_SESSION['login_buffer']))
        {
            $carritosModel = new CarritosModel();
            $id_carrito=sha1($_SESSION['login_buffer']['DUI']);
            $viewBag['carritos']=$carritosModel->CountQuantity($id_carrito);
        }
        $this->render("index.php",$viewBag);
    }

    public function Empresa()
    {
        $viewBag = array();
        if(isset($_SESSION['login_buffer']))
        {
            if($_SESSION['login_buffer']['Acceso']==2)
            {
            $carritosModel = new CarritosModel();
            $id_carrito=sha1($_SESSION['login_buffer']['DUI']);
            $viewBag['carritos']=$carritosModel->CountQuantity($id_carrito);
            }
        }
        $this->render("empresa.php",$viewBag);
    }

    public function Contacto()
    {
        $this->render("contacto.php");
    }
}
?>