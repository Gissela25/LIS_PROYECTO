<?php
require_once './Core/config.php';
require_once './Core/validaciones.php';
require_once './Controllers/Controller.php';
require_once './Models/ClientesModel.php';
require_once './Controllers/CarritosController.php';
    class ClientesController extends Controller{

        private $modelo;
        public function __construct()
        {
           $this->modelo = new ClientesModel();
        }

        public function Singin()
        {
            $this->render("registrar.php");
        }

        public function Index()
        {
            var_dump($this->modelo->get());
        }

        public function Details($id)
        {
            var_dump($this->modelo->get($id));
        }

        public function Editar()
        {
            if(isset($_SESSION['login_buffer']))
            {
                if($_SESSION['login_buffer']['Acceso']==2)
                {
            $carritosModel = new CarritosModel();
            $id_carrito=sha1($_SESSION['login_buffer']['DUI']);
            $viewBag['carritos']=$carritosModel->CountQuantity($id_carrito);
            $clientes=$this->modelo->get($_SESSION['login_buffer']['DUI']);
            $viewBag['clientes']=$clientes;
            $this->render("editar.php",$viewBag);
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

        public function Actualizando()
        {
            if(isset($_POST['Guardar']))
            {
                extract($_POST);
                $errores=array();
                $viewBag=array();
                if(!isset($DUI)||estaVacio($DUI))
                {
                    array_push($errores,"Debes ingresar tu DUI");
                }elseif(!esDUI($DUI))
                {
                    array_push($errores,"El DUI no cumple con el estandar");
                }
                if(!isset($Nombre)||estaVacio($Nombre))
                {
                    array_push($errores,"Debes ingresar tu nombre");
                }
                elseif(!esOnlyText($Nombre))
                {
                  array_push($errores,"Debes ingresar un nombre válido");
                }
                if(!isset($Apellido)||estaVacio($Apellido))
                {
                    array_push($errores,"Debes ingresar tu apellido");
                }
                elseif(!esOnlyText($Apellido))
                {
                  array_push($errores,"Debes ingresar un apellido válido");
                }
                if(!isset($Telefono)||estaVacio($Telefono))
                {
                    array_push($errores,"Debes ingresar tu número de teléfono");
                }
                elseif(!esTelefono($Telefono))
                {
                  array_push($errores,"Debes ingresar un número válido");
                }
                if(!isset($Direccion)||estaVacio($Direccion))
                {
                    array_push($errores,"Debes ingresar una direccion");
                }
                elseif(!esText($Direccion))
                {
                  array_push($errores,"Direccion no válida");
                }
                if(!isset($Correo)||estaVacio($Correo))
                {
                    array_push($errores,"Debes ingresar tu correo");
                }
                elseif(!esMail($Correo))
                {
                  array_push($errores,"Correo no válido");
                }
                $cliente['Nombre']=$Nombre;
                $cliente['Apellido']=$Apellido;
                $cliente['Telefono']=$Telefono;
                $cliente['Correo']=$Correo;

                if(!isset($Clave)||estaVacio($Clave))
                {
                    $cliente['Clave']=$_SESSION['login_buffer']['Clave'];
                }
                else{
                    if(!esClave($Clave))
                    {
                      array_push($errores,"Clave invalida");
                    }
                    else{
                        $cliente['Clave']=hash('sha256',$Clave);
                    }
                }
                $cliente['Direccion']=$Direccion;
                $cliente['DUI']=$DUI;
                if(count($errores)>0)
                {
                    $viewBag['errores']=$errores;
                    $clientes=$this->modelo->get($_SESSION['login_buffer']['DUI']);
                    $viewBag['clientes']=$clientes;
                    $this->render("editar.php",$viewBag);
                }
                else{
                    if($this->modelo->update($cliente)>0)
                    {
                        header('Location: '.PATH);
                    }
                    else{
                         header('Location: '.PATH);
                    }
                }       
            }
        }

        public function Registrar()
        {
            if(isset($_POST['Registrar']))
            {
                extract($_POST);
                $errores=array();
                $viewBag=array();
                if(!isset($DUI)||estaVacio($DUI))
                {
                    array_push($errores,"Debes ingresar tu DUI");
                }elseif(!esDUI($DUI))
                {
                    array_push($errores,"El DUI no cumple con el estandar");
                }
                if(!isset($Nombre)||estaVacio($Nombre))
                {
                    array_push($errores,"Debes ingresar tu nombre");
                }
                elseif(!esOnlyText($Nombre))
                {
                  array_push($errores,"Debes ingresar un nombre válido");
                }
                if(!isset($Apellido)||estaVacio($Apellido))
                {
                    array_push($errores,"Debes ingresar tu apellido");
                }
                elseif(!esOnlyText($Apellido))
                {
                  array_push($errores,"Debes ingresar un apellido válido");
                }
                if(!isset($Telefono)||estaVacio($Telefono))
                {
                    array_push($errores,"Debes ingresar tu número de teléfono");
                }
                elseif(!esTelefono($Telefono))
                {
                  array_push($errores,"Debes ingresar un número válido");
                }
                if(!isset($Direccion)||estaVacio($Direccion))
                {
                    array_push($errores,"Debes ingresar una direccion");
                }
                elseif(!esText($Direccion))
                {
                  array_push($errores,"Direccion no válida");
                }
                if(!isset($Correo)||estaVacio($Correo))
                {
                    array_push($errores,"Debes ingresar tu correo");
                }
                elseif(!esMail($Correo))
                {
                  array_push($errores,"Correo no válido");
                }
                if(!isset($Clave)||estaVacio($Clave))
                {
                    array_push($errores,"Debes ingresar una clave");
                }
                elseif(!esClave($Clave))
                {
                  array_push($errores,"Clave invalida");
                }
                $cliente['Nombre']=$Nombre;
                $cliente['DUI']=$DUI;
                $cliente['Apellido']=$Apellido;
                $cliente['Correo']=$Correo;
                $cliente['Direccion']=$Direccion;
                $cliente['Clave']=hash('sha256',$Clave);
                $cliente['Telefono']=$Telefono;
                $cliente['Hash_Active']=md5(rand(1,1000));
                if(count($errores)>0)
                {
                    $viewBag['errores']=$errores;
                    $viewBag['clientes']=$cliente;
                    $this->render("registrar.php",$viewBag);
                }
                else{
                    if($this->modelo->create($cliente)>0)
                    {
                        header('Location: '.PATH.'Usuarios/Activar');
                    }
                    else{
                        array_push($errores, "Ha ocurrido un error al intentar registrarse");
                        $viewBag['errores']=$errores;
                        $viewBag['cliente']=$cliente;
                        $this->render("registrar.php",$viewBag);
                    }
                }
            }
        }
        
    
    }
?>