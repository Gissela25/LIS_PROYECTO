<?php
include_once './Controllers/Controller.php';
include_once './Core/config.php';
include_once './Core/validaciones.php';
include_once './Models/SucursalesModel.php';
class SucursalesController extends Controller{
    private $modelo;

    public function __construct()
    {
        $this->modelo= new SucursalesModel();
    }

    public function Index()
    {
        $viewBag = [];
        $viewBag['sucursales']=$this->modelo->get();
        $this->render("index.php",$viewBag);
    }

    public function Editar($id)
    {
        $viewBag = [];
        $viewBag['sucursales'] = $this->modelo->get($id);
        $viewBag['acciones']="3";
        $this->render("editar.php",$viewBag);
    }

    public function Operaciones($id)
    {
        if(isset($_POST['Desactivar']))
        {
            if($this->modelo->delete($id))
            {
                header('Location: '.PATH.'Sucursales');
            }
        }

        if(isset($_POST['Activar']))
        {
            if($this->modelo->activar($id))
            {
                header('Location: '.PATH.'Sucursales');
            }
        }
    }

    public function Guardar($id)
    {
        $viewBag = array();
        $errores = array();
        if(isset($_POST['Actualizar']))
        {
            extract($_POST);
            if(!isset($Nombre_Sucursal)||estaVacio($Nombre_Sucursal))
                {
                    array_push($errores,"Debes ingresar un nombre");
                }elseif(!esOnlyText($Nombre_Sucursal))
                {
                    array_push($errores,"Solo debes incluir letras");
                }
            $sucursal['ID_Sucursal']=$id;
            $sucursal['Nombre_Sucursal']=$Nombre_Sucursal;
            if(count($errores)>0)
            {
                $viewBag['sucursales']=$this->modelo->get($ID_Sucursal);
                $viewBag['errores']=$errores;
                $this->render("editar.php",$viewBag);
            }
            else{
                if($this->modelo->update($sucursal)>0)
            {
                header('Location: '.PATH.'Sucursales');
            }
            $viewBag['sucursales']=$this->modelo->get();
            $this->render("index.php",$viewBag);
            }
        }
    
    }
}
?>