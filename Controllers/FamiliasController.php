<?php
include_once './Controllers/Controller.php';
include_once './Core/config.php';
include_once './Core/validaciones.php';
include_once './Models/FamiliasModel.php';
class FamiliasController extends Controller{
    private $modelo;

    public function __construct()
    {
        $this->modelo= new FamiliasModel();
    }

    public function Index()
    {
        if(isset($_SESSION['login_buffer']))
        {
            if($_SESSION['login_buffer']['Acceso']==1)
            {
        $viewBag = [];
        $viewBag['familias']= $this->modelo->get();
        $this->render("index.php",$viewBag);
            }
            else
            {
                if($_SESSION['login_buffer']['Acceso']==0)
                {
                    header('Location: '.PATH.'Usuarios/Inicio');
                }
                elseif($_SESSION['login_buffer']['Acceso']==2)
                {
                    header('Location: '.PATH);
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

    public function Editar($id)
    {
        if(isset($_SESSION['login_buffer']))
        {
            if($_SESSION['login_buffer']['Acceso']==1)
            {
        $viewBag = [];
        $viewBag['familias']= $this->modelo->get($id);
        $this->render("editar.php",$viewBag);
            }
            else
            {
                if($_SESSION['login_buffer']['Acceso']==0)
                {
                    header('Location: '.PATH.'Usuarios/Inicio');
                }
                elseif($_SESSION['login_buffer']['Acceso']==2)
                {
                    header('Location: '.PATH);
                }
                elseif($_SESSION['login_buffer']['Acceso']==4)
                {
                    header('Location: '.PATH.'Usuarios/Main');
                }
            }
        }else
        {
            header('Location: '.PATH);
        }
    }

    public function GenerarCodigo()
    {
        do{
            $codigo=rand(000,999);
            $id="F";
            $id.=$codigo;
            if(strlen($id)==4)
            {
            $rows = count($this->modelo->get($id));
            }
            else{
                $rows=1;
            }

        }while($rows>0);
        return $id;
    }
    public function Guardar()
    {
        if(isset($_SESSION['login_buffer']))
        {
            if($_SESSION['login_buffer']['Acceso']==1)
            {
        $viewBag = array();
        $errores = array();
        if(isset($_POST['Guardar']))
        {
            extract($_POST);
            if(!isset($Nombre_Familia)||estaVacio($Nombre_Familia))
                {
                    array_push($errores,"Debes ingresar un nombre");
                }elseif(!esOnlyText($Nombre_Familia))
                {
                    array_push($errores,"Solo debes incluir letras");
                }
                $familia['ID_Familia']=$ID_Familia;
                $familia['Nombre_Familia']=$Nombre_Familia;
            if(count($errores)>0)
            {           
                $viewBag['familia']=$familia;
                $viewBag['errores']=$errores;
                $this->render("insertar.php",$viewBag);
            }
            else{
                if($this->modelo->create($familia)>0)
            {
                array_push($errores,"Ha ocurrido un error");
                $viewBag['familia']=$familia;
                $this->render("insertar.php",$viewBag);
            }
            else{
                header('Location: '.PATH.'Familias');
            }
           
            }
        }
    }
    else
            {
                if($_SESSION['login_buffer']['Acceso']==0)
                {
                    header('Location: '.PATH.'Usuarios/Inicio');
                }
                elseif($_SESSION['login_buffer']['Acceso']==2)
                {
                    header('Location: '.PATH);
                }
                elseif($_SESSION['login_buffer']['Acceso']==4)
                {
                    header('Location: '.PATH.'Usuarios/Main');
                }
            }
}else
{
    header('Location: '.PATH);
}
    }

    public function Agregar()
    {
        
        if(isset($_SESSION['login_buffer']))
        {
            if($_SESSION['login_buffer']['Acceso']==1)
            {
        $viewBag=array();
        $familia['ID_Familia']=$this->GenerarCodigo();
        $viewBag['familia']=$familia;
        $this->render("insertar.php",$viewBag);
            }
            else
            {
                if($_SESSION['login_buffer']['Acceso']==0)
                {
                    header('Location: '.PATH.'Usuarios/Inicio');
                }
                elseif($_SESSION['login_buffer']['Acceso']==2)
                {
                    header('Location: '.PATH);
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
    public function Operaciones($id)
    {
        if(isset($_POST['Desactivar']))
        {
            if($this->modelo->delete($id))
            {
                header('Location: '.PATH.'Familias');
            }
        }

        if(isset($_POST['Activar']))
        {
            if($this->modelo->activar($id))
            {
                header('Location: '.PATH.'Familias');
            }
        }
    }

    public function Actualizar($id){
        $viewBag = array();
        $errores = array();
        if(isset($_POST['Actualizar']))
        {
            extract($_POST);
            if(!isset($Nombre_Familia)||estaVacio($Nombre_Familia))
                {
                    array_push($errores,"Debes ingresar un nombre");
                }elseif(!esOnlyText($Nombre_Familia))
                {
                    array_push($errores,"Solo debes incluir letras");
                }
            $sucursal['ID_Familia']=$id;
            $sucursal['Nombre_Familia']=$Nombre_Familia;
            if(count($errores)>0)
            {
                $viewBag['familias']=$this->modelo->get($ID_Familia);
                $viewBag['errores']=$errores;
                $this->render("editar.php",$viewBag);
            }
            else{
                if($this->modelo->update($sucursal)>0)
            {
                header('Location: '.PATH.'Familias');
            }
            $viewBag['familias']=$this->modelo->get();
            $this->render("index.php",$viewBag);
            }
        }
    }

}
?>