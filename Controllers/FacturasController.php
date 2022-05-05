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

            $viewBag=[];
            $viewBag['datos']=$this->modelo->GetSpecificSales($id);
            $this->render("factura.php",$viewBag);
        
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
        $id_carrito=sha1($_SESSION['login_buffer']['DUI']);
        $viewBag['facturas']=$this->modelo->GetMySales($id_carrito);
        $this->render("index.php",$viewBag);
    }
}
?>