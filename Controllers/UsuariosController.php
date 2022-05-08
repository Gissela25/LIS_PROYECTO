<?php
require_once './Core/config.php';
require_once './Controllers/Controller.php';
require_once './Models/UsuariosModel.php';
require_once './Models/ClientesModel.php';
require_once './Models/SucursalesModel.php';
    class UsuariosController extends Controller{

        private $modelo;
        public function __construct()
        {
           $this->modelo = new UsuariosModel();
        }

        public function Invitado()
        {
            $this->render("google.php");
        }

        public function Main()
        {
            if($_SESSION['login_buffer']['Acceso']==4)
                {
            $this->render("Google/index.php");
                }
                else
                {
                    if($_SESSION['login_buffer']['Acceso']==1)
                    {
                        header('Location: '.PATH.'Usuarios/Inicio');
                    }
                    elseif($_SESSION['login_buffer']['Acceso']==2)
                    {
                        header('Location: '.PATH);
                    }
                    elseif($_SESSION['login_buffer']['Acceso']==0)
                {
                    header('Location: '.PATH.'Usuarios/Main');
                }
                }
        }

        public function Index()
        {
            if(isset($_SESSION['login_buffer']))
            {
                if($_SESSION['login_buffer']['Acceso']==1)
                {
                    $viewBag = [];
                    $viewBag['empleados'] = $this->modelo->get();
                    $this->render("Empleados/listado.php",$viewBag);
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

        public function Login()
        {
            $this->render("login.php");
        }

        public function Logout()
        {
            session_unset();
            session_destroy();
            header('Location: '.PATH);
        }

        public function Inicio()
        {
            if(isset($_SESSION['login_buffer']))
            {
                if($_SESSION['login_buffer']['Acceso']==0)
                {
            $this->render("Empleados/index.php");
                }
                else
                {
                    if($_SESSION['login_buffer']['Acceso']==1)
                    {
                        header('Location: '.PATH.'Usuarios/Home');
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

        public function Home()
        {
            if(isset($_SESSION['login_buffer']))
            {
                if($_SESSION['login_buffer']['Acceso']==1)
                {
            $this->render("Administradores/index.php");
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

        public function Details($id)
        {
            var_dump($this->modelo->get($id));
        }

        public function Recuperar()
        {
            $this->render("recover.php");
        }

        public function Singin()
        {
            $this->render("Clientes/registrar.php");
        }

        public function Activar()
        {
            $this->render("activar.php");
        }

        public function Editar($id)
        {
            if(isset($_SESSION['login_buffer']))
            {
                if($_SESSION['login_buffer']['Acceso']==1)
                {
            $sucursalesModel = new SucursalesModel();
            $viewBag = [];
            $viewBag['empleados'] = $this->modelo->get($id);
            $viewBag['usuarios'] = $this->modelo->getTipoUsuario();
            $viewBag['sucursales']=$sucursalesModel->getSucursalNotNull();
            $this->render("actualizar.php",$viewBag);
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

        public function GenerarCodigo()
    {
        do{
            $codigo=rand(000,999);
            $id="E";
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

        public function Agregar()
        {
            if(isset($_SESSION['login_buffer']))
            {
                if($_SESSION['login_buffer']['Acceso']==1)
                {
            $sucursalesModel = new SucursalesModel();
            $viewBag = [];
            $empleado['ID_Usuario']=$this->GenerarCodigo();
            $viewBag['empleado'] = $empleado;
            $viewBag['sucursales']=$sucursalesModel->getSucursalNotNull();
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
                    header('Location: '.PATH.'Usuarios');
                }
            }
    
            if(isset($_POST['Activar']))
            {
                if($this->modelo->activar($id))
                {
                    header('Location: '.PATH.'Usuarios');
                }
            }
        }

        public function Actualizando()
        {
            if(isset($_POST['Guardar']))
            {
                extract($_POST);
                $errores=array();
                $viewBag=array();
                $sucursalesModel = new SucursalesModel();
                if(!isset($ID_Usuario)||estaVacio($ID_Usuario))
                {
                    array_push($errores,"Debes ingresar un codigo de usuario");
                }elseif(!esUsuario($ID_Usuario))
                {
                    array_push($errores,"El codigo no es válido");
                }
                if(!isset($Nombre)||estaVacio($Nombre))
                {
                    array_push($errores,"Debes ingresar un nombre");
                }
                elseif(!esOnlyText($Nombre))
                {
                  array_push($errores,"Solo letras");
                }

                if(!isset($Apellido)||estaVacio($Apellido))
                {
                    array_push($errores,"Debes ingresar tu apellido");
                }
                elseif(!esOnlyText($Apellido))
                {
                  array_push($errores,"Solo letras");
                }
                if(!isset($Correo)||estaVacio($Correo))
                {
                    array_push($errores,"Debes ingresar tu correo");
                }
                elseif(!esMail($Correo))
                {
                  array_push($errores,"Correo no válido");
                }

                if(!isset($ID_Sucursal)||estaVacio($ID_Sucursal))
                {
                    array_push($errores,"Debes seleccionar una sucursal");
                }
                $usuario['ID_Usuario']=$ID_Usuario;
                $usuario['Nombre']=$Nombre;
                $usuario['Apellido']=$Apellido;
                $usuario['ID_Sucursal']=$ID_Sucursal;
                $usuario['Correo']=$Correo;
                $usuario['Acceso']=$id_tipo_usuario;
                $usuario['id_tipo_usuario']=$id_tipo_usuario;

                if(count($errores)>0)
                {
                    $viewBag['usuarios'] = $this->modelo->getTipoUsuario();
                    $viewBag['empleados']=$this->modelo->get($ID_Usuario);
                    $viewBag['errores']=$errores;
                    $viewBag['sucursales']=$sucursalesModel->getSucursalNotNull();
                    $this->render("actualizar.php",$viewBag);
                }
                else
                {
                    $usuarios['Nombre']=$Nombre;
                    $usuarios['Apellido']=$Apellido;
                    $usuarios['Correo']=$Correo;
                    $usuarios['Acceso']=$id_tipo_usuario;
                    $usuarios['ID_Sucursal']=$ID_Sucursal;
                    $usuarios['ID_Usuario']=$ID_Usuario;
                    if($this->modelo->update($usuarios)>0)
                    {
                        header('Location: '.PATH.'Usuarios');
                    }
                    else{
                        header('Location: '.PATH.'Usuarios');
                    }
                }
                

            }
        }

        public function Agregando()
        {
            if(isset($_POST['Guardar']))
            {
                extract($_POST);
                $errores=array();
                $viewBag=array();
                $sucursalesModel = new SucursalesModel();
                if(!isset($ID_Usuario)||estaVacio($ID_Usuario))
                {
                    array_push($errores,"Debes ingresar un codigo de usuario");
                }elseif(!esUsuario($ID_Usuario))
                {
                    array_push($errores,"El codigo no es válido");
                }
                if(!isset($Nombre)||estaVacio($Nombre))
                {
                    array_push($errores,"Debes ingresar un nombre");
                }
                elseif(!esOnlyText($Nombre))
                {
                  array_push($errores,"Solo letras");
                }

                if(!isset($Apellido)||estaVacio($Apellido))
                {
                    array_push($errores,"Debes ingresar tu apellido");
                }
                elseif(!esOnlyText($Apellido))
                {
                  array_push($errores,"Solo letras");
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

                if(!isset($ID_Sucursal)||estaVacio($ID_Sucursal))
                {
                    array_push($errores,"Debes seleccionar una sucursal");
                }
                $usuario['Nombre']=$Nombre;
                $usuario['ID_Usuario']=$ID_Usuario;
                $usuario['Apellido']=$Apellido;
                $usuario['ID_Sucursal']=$ID_Sucursal;
                $usuario['Correo']=$Correo;
                $usuario['Apellido']=$Apellido;
                $usuario['Clave']=hash('sha256',$Clave);
                $usuario['Hash_Active']=md5(rand(1,1000));
                if(count($errores))
                {

                    $viewBag['empleado']=$usuario;
                    $viewBag['errores']=$errores;
                    $viewBag['sucursales']=$sucursalesModel->getSucursalNotNull();
                    $this->render("insertar.php",$viewBag);
                }
                else
                {
                    if($this->modelo->create($usuario)>0)
                    {
                        header('Location: '.PATH.'Usuarios');
                    }
                    else{
                        array_push($errores, "Ha ocurrido un error al intentar registrarse");
                        $viewBag['errores']=$errores;
                        $viewBag['empleado']=$usuario;
                        $viewBag['sucursales']=$sucursalesModel->getSucursalNotNull();
                        $this->render("insertar.php",$viewBag);
                    }
                }
            
        }
        }

        public function Actualizar()
        {
            if(isset($_SESSION['login_buffer']))
            {
                if($_SESSION['login_buffer']['Acceso']==1)
                {
            $clientes=$this->modelo->get($_SESSION['login_buffer']['ID_Usuario']);
            $viewBag['usuarios']=$clientes;
            $this->render("editar.php",$viewBag);
                }
                elseif($_SESSION['login_buffer']['Acceso']==0)
                {
                    $clientes=$this->modelo->get($_SESSION['login_buffer']['ID_Usuario']);
                    $viewBag['usuarios']=$clientes;
                    $this->render("editar.php",$viewBag);
                }
                else
                {
                    if($_SESSION['login_buffer']['Acceso']==2)
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
        

        public function Modificando()
        {
            if(isset($_POST['Guardar']))
            {
                extract($_POST);
                $errores=array();
                $viewBag=array();
                if(!isset($Nombre)||estaVacio($Nombre))
                {
                    array_push($errores,"Debes ingresar un nombre");
                }
                elseif(!esOnlyText($Nombre))
                {
                  array_push($errores,"Solo letras");
                }

                if(!isset($Apellido)||estaVacio($Apellido))
                {
                    array_push($errores,"Debes ingresar tu apellido");
                }
                elseif(!esOnlyText($Apellido))
                {
                  array_push($errores,"Solo letras");
                }
                if(!isset($Correo)||estaVacio($Correo))
                {
                    array_push($errores,"Debes ingresar tu correo");
                }
                elseif(!esMail($Correo))
                {
                  array_push($errores,"Correo no válido");
                }
                $usuario['Nombre']=$Nombre;
                $usuario['Apellido']=$Apellido;
                $usuario['Correo']=$Correo;
                if(!isset($Clave)||estaVacio($Clave))
                {
                    $usuario['Clave']=$_SESSION['login_buffer']['Clave'];
                }
                else{
                    if(!esClave($Clave))
                    {
                      array_push($errores,"Clave invalida");
                    }
                    else{
                        $usuario['Clave']=hash('sha256',$Clave);
                    }
                }
                $usuario['ID_Usuario']=$_SESSION['login_buffer']['ID_Usuario'];
                if(count($errores)>0)
                {
                    $viewBag['errores']=$errores;
                    $viewBag['usuarios']=$this->modelo->get($_SESSION['login_buffer']['ID_Usuario']);
                    $this->render("editar.php",$viewBag);
                }
                else{
                    if($this->modelo->editme($usuario)>0)
                    {
                        if($_SESSION['login_buffer']['Acceso']==0)
                        {
                            header('Location: '.PATH.'Usuarios/Inicio');
                        }
                        else{
                            header('Location: '.PATH.'Usuarios/Home');
                        }
                    }
                    else{
                        if($_SESSION['login_buffer']['Acceso']==0)
                        {
                            header('Location: '.PATH.'Usuarios/Inicio');
                        }
                        else{
                            header('Location: '.PATH.'Usuarios/Home');
                        }
                    }
                }

            }
        }

        public function generarCorreoActivacion($i_nombre,$i_apellido,$i_correo,$hash_active)
        {
            date_default_timezone_set("America/El_Salvador");
            $paraCliente = $i_correo;
            $emailCliente=$i_correo;
            $tituloCliente =  "Activando Cuenta...";
            $mensajeCliente= "<!doctype html>
    <html lang='es'>".
            "<head><title>Recuperando Cuenta</title>".
          "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css'
                    integrity='sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn' crossorigin='anonymous'>
                <style>
                    *{
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                    }
                    body{
                        font-size: 16px;
                        font-weight: 300;
                        color: white;
                        
                        line-height: 30px;
                        text-align: center;
                    }
                    .contenedor{
                    width: 85%;
                    min-height:auto;
                    text-align: center;
                    margin: 0 auto;
                    background: #ececec;
                    border-top: 5px solid #ced831;
                    border-bottom:5px solid #ced831 ;
                }
                .bold{
                    color:white;
                    font-size:25px;
                    font-weight:bold;
                }
                .saludo{
                    color: white;
                    font-size:20px;
                    font-weight:bold;
                }
                img{
                    margin-left: auto;
                    margin-right: auto;
                    display: block;
                    padding:0px 0px 20px 0px;
                }
                .text-dis{
                    text-align: left;
                    color:white;
                }
                .seccion1{
                    color: white;
                    padding: 10px;
                    background-color:  #1b2433;
                }
                .seccion2{
                    background-color:#ced831;
                    color: #1b2433;
                    
                }
                .indicaciones
                {
                    font-weight:bold;
                    font-size:25px;
                    text-align: left;
                }
                .seccion3{
                    color: #1b2433;
                    pad: 10px;
                    background-color: white;
                    font-size:35px;
                    font-weight:bold;
                }
                a{
                        text-decoration: none;
                }
                p{
                    color:white;
                }
                .btn-activate{
                    background-color:#ced831;
                    color: #1b2433;
                    font-weight:bold;
                }
                .btn-activate:hover{
                    background-color: white;
                    color: #1b2433;
                }
                </style>
            </head>".
            "<body>".
                "<div class='container'>".
                "<div class='contenedor'>".
                    "<div class='seccion1'>".
                    "<span class='bold'>Activando Cuenta</span>".
                    "<p>&nbsp;</p>".
                    "<span class='saludo'>Hola<strong > $i_nombre $i_apellido</strong></span>".
                    "<p>&nbsp;</p>".
                    "<div class='text-dis'>".
                    "<p>Has hecho una solicitud para activar tu cuenta, detalles: </p>".
                    "<p>Usuario: $emailCliente</p>".
                    "<p>Fecha y hora de solicitud: ".date('d/m/Y h:i: s a', time())."</p>".       
                    "</div>".
                    "<p class='text-dis'>Para poder activar tu cuenta debes cliquear  el botón activar</p>".
                    "<p>&nbsp;</p>".
                    "<a href='".PATH."Usuarios/Comprobar/$emailCliente/$hash_active' target='_blank' class='btn-activate btn btn-primary btn-block'>Activar</a>".
                    "</div>".   
                    "<div class='seccion3'>".
                    "<p>&nbsp;</p>".
                    "<a title='Sumersa' href='https://www.sumersa.com.sv/' target='_blank'>".
                        "<img src='https://textil-export.000webhostapp.com/img/logo2.jpg' alt='Logo_Sumersa'>".
                    "</a>".
                    "<p>&nbsp;</p>".
                    "</div>". 
                "</div>".
                "</div>".
            "</body>".
            "</html>";
            $cabecerasCliente  = 'MIME-Version: 1.0' . "\r\n";
            $cabecerasCliente .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $cabecerasCliente .= 'From: Sumersa. Tienda en Linea<noreply@sumersa.com>'."\r\n";
            $cabecerasCliente .= 'Reply-To: noresponder@pruebaroyalcanin.com' . "\r\n";
            $cabecerasCliente .=  'X-Mailer: PHP/'.phpversion();
            $enviadoCliente   = @mail($paraCliente, $tituloCliente, $mensajeCliente, $cabecerasCliente);
            if($enviadoCliente)
            {
                echo "<ul> <li>Hemos enviado un correo de activación a tu cuenta</li></ul>";
                
            }
            else{
                echo "<ul> <li>Necesitamos el host</li></ul>";                  
            }

        }
        public function GeneratePassword()
        {
            $codigo=rand(10000000,99999999);
            return $codigo;

        }

        public function Comprobando($Correo,$Hash_Active)
        {            
            $clientesModel = new ClientesModel();
            $login_buffer =$clientesModel->update_verified($Correo,$Hash_Active);
            if(count($login_buffer)>0)
            {
                header("Location: ".PATH."Usuarios/Login");
            }
            else{
                header("Location: ".PATH);
            }
        }

        public function generarCorreo($i_nombre,$i_apellido,$i_correo,$i_table){
            date_default_timezone_set("America/El_Salvador");
            $pwd = $this->generatePassword();
            $paraCliente = $i_correo;
                $tituloCliente =  "Recuperando Cuenta...";
                $mensajeCliente= "<!doctype html>
        <html lang='es'>".
                "<head><title>Recuperando Cuenta</title>".
              "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css'
                        integrity='sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn' crossorigin='anonymous'>
                    <style>
                        *{
                            margin: 0;
                            padding: 0;
                            box-sizing: border-box;
                        }
                        body{
                            font-size: 16px;
                            font-weight: 300;
                            color: white;
                            
                            line-height: 30px;
                            text-align: center;
                        }
                        .contenedor{
                        width: 85%;
                        min-height:auto;
                        text-align: center;
                        margin: 0 auto;
                        background: #ececec;
                        border-top: 5px solid #ced831;
                        border-bottom:5px solid #ced831 ;
                    }
                    .bold{
                        color:white;
                        font-size:25px;
                        font-weight:bold;
                    }
                    .saludo{
                        color: white;
                        font-size:20px;
                        font-weight:bold;
                    }
                    img{
                        margin-left: auto;
                        margin-right: auto;
                        display: block;
                        padding:0px 0px 20px 0px;
                    }
                    .text-dis{
                        text-align: left;
                        color:white;
                    }
                    .seccion1{
                        color: white;
                        padding: 10px;
                        background-color:  #1b2433;
                    }
                    .seccion2{
                        color: #1b2433;
                        pad: 10px;
                        background-color: white;
                        font-size:35px;
                        font-weight:bold;
                    }
                    a{
                            text-decoration: none;
                    }
                    p{
                        color:white;
                    }
                    </style>
                </head>".
                "<body>".
                    "<div class='container'>".
                    "<div class='contenedor'>".
                        "<div class='seccion1'>".
                        "<span class='bold'>Recuperando Clave</span>".
                        "<p>&nbsp;</p>".
                        "<span class='saludo'>Hola<strong > $i_nombre $i_apellido</strong></span>".
                        "<p>&nbsp;</p>".
                        "<div class='text-dis'>".
                        "<p>Has hecho una solicitud para recuperar tu contraseña, detalles: </p>".
                        "<p>Se te asignará una nueva clave que podrás cambiar al ingresar a tu cuenta *</p>".      
                        "<p>&nbsp;</p>".
                        "<p>Usuario: $i_correo</p>".
                         "<p>Clave: $pwd</p>".
                        "<p>Fecha y hora de solicitud: ".date('d/m/Y h:i: s a', time())."</p>".  
                        "</div>".
                        "</div>".    
                        "<div class='seccion2'>".
                        "<p>&nbsp;</p>".
                        "<a title='Sumersa' href='https://www.sumersa.com.sv/' target='_blank'>".
                            "<img src='https://textil-export.000webhostapp.com/img/logo2.jpg' alt='Logo_Sumersa'>".
                        "</a>".
                        "<p>&nbsp;</p>".
                        "</div>". 
                    "</div>".
                    "</div>".
                "</body>".
                "</html>";
                $pwd_encrypt= hash('sha256',$pwd);  
                $cabecerasCliente  = 'MIME-Version: 1.0' . "\r\n";
                $cabecerasCliente .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                $cabecerasCliente .= 'From: Sumersa. Tienda en Linea<noreply@sumersa.com>'."\r\n";
                $cabecerasCliente .= 'Reply-To: noresponder@pruebaroyalcanin.com' . "\r\n";
                $cabecerasCliente .=  'X-Mailer: PHP/'.phpversion();
                $enviadoCliente   = @mail($paraCliente, $tituloCliente, $mensajeCliente, $cabecerasCliente);
                if($enviadoCliente)
                {
                   
                    if($this->modelo->ActualizarPassword($pwd_encrypt,$i_correo,$i_table)>0)
                    {
                        echo "<ul> <li>Correo enviado exitosamente</li></ul>";
                    }
                }
                else{
                    echo "<ul> <li>Necesitamos el host</li></ul>";
                }
        }

        public function Comprobar()
        {
            $this->render("comprobate.php");
        }

        public function Recuperando()
        {
            extract($_POST);
            $errores=array();
            if(isset($_POST['Confirmar']))
            {
                $clientesModel = new ClientesModel();
                if(!isset($Correo)||estaVacio($Correo))
                {
                    array_push($errores,"Debes ingresar tu correo");
                }
                elseif(!esMail($Correo))
                {
                  array_push($errores,"El correo no es válido");
                }
                if(count($errores)>0)
                {     
                $viewBag['errores']=$errores;
                $viewBag['correo']=$Correo;
                  $this->render("recover.php",$viewBag);         
                }
                else{
                    $login_buffer=$clientesModel->ValidateForRecover($Correo);
                    $login_buffer_empleado=$this->modelo->Validate($Correo);
                    if(count($login_buffer)>0)
                    {
                        $login_buffer=$clientesModel->getData($Correo);
                        if(count($login_buffer)>0)
                        {
                            extract($login_buffer[0]);
                            $this->generarCorreo($Nombre,$Apellido,$Correo,"cliente");
                        }
                    }elseif(count($login_buffer_empleado)>0)
                    {
                        $login_buffer_empleado=$this->modelo->getData($Correo);
                        if(count($login_buffer_empleado)>0)
                        {
                            extract($login_buffer_empleado[0]);
                            $this->generarCorreo($Nombre,$Apellido,$Correo,"usuario");
                        }
                    }
                    else{
                    array_push($errores,"Cuenta no verificada o inexistente");
                    $viewBag['errores']=$errores;
                    $viewBag['correo']=$Correo;
                    $this->render("activar.php",$viewBag);
                    }
                }
            }
        }

        public function Verificando()
        {
            extract($_POST);
            $errores=array();
            if(isset($_POST['Confirmar']))
            {
                $clientesModel = new ClientesModel();
                if(!isset($Correo)||estaVacio($Correo))
                {
                    array_push($errores,"Debes ingresar tu correo");
                }
                elseif(!esMail($Correo))
                {
                  array_push($errores,"El correo no es valido");
                }
                if(count($errores)>0)
                {     
                $viewBag['errores']=$errores;
                $viewBag['correo']=$Correo;
                  $this->render("activar.php",$viewBag);         
                }
                else{

                $login_buffer=$clientesModel->Validate($Correo);
                if(count($login_buffer)>0)
                {
                    $login_buffer=$clientesModel->getData($Correo);
                    if(count($login_buffer)>0)
                    {
                        extract($login_buffer[0]);
                        $this->generarCorreoActivacion($Nombre,$Apellido,$Correo,$Hash_Active);
                    }
                }
                else{
                    array_push($errores,"Cuenta verificada o inexistente");
                    $viewBag['errores']=$errores;
                    $viewBag['correo']=$Correo;
                    $this->render("activar.php",$viewBag);
                }
                }
            }
        }


        public function Validate()
        {
            extract($_POST);
            $errores=array();
            $viewBag=array();
            if(isset($_POST['Ingresar']))
            {
                $clientesModel = new  ClientesModel();
                if(!isset($Correo)||estaVacio($Correo))
                {
                    array_push($errores,"Debes ingresar tu correo");
                }
                if(!isset($Clave)||estaVacio($Clave))
                {
                    array_push($errores,"Debes ingresar tu clave");
                }
                if(count($errores)>0)
          {     
            $viewBag['errores']=$errores;
            $this->render("login.php",$viewBag);     
          }
          else{
              $login_buffer=$this->modelo->validate_user($Correo,$Clave);
              if(count($login_buffer)>0)
              {
                $login_buffer=$this->modelo->validate_access($Correo,$Clave);
                if(count($login_buffer)>0)
                {
                    if($login_buffer[0]['Acceso']==1)
                    {
                        session_start();
                        $_SESSION['login_buffer']=$login_buffer[0];
                        header('Location: '.PATH.'Usuarios/Home');
                    }
                    elseif($login_buffer[0]['Acceso']==0){
                    session_start();
                    $_SESSION['login_buffer']=$login_buffer[0];
                    header('Location: '.PATH.'Usuarios/Inicio');
                    }
                    
                }

                else{
                    array_push($errores,"Cuenta deshabilitada/no verificada");
                    $viewBag['errores']=$errores;
                    $this->render("login.php",$viewBag);
                      header('Location: '.PATH);
                }
              }
              else{
                $login_buffer=$clientesModel->validate_user($Correo,$Clave);
                if(count($login_buffer)>0)
                {
                    $login_buffer=$clientesModel->validate_access($Correo,$Clave);
                    if(count($login_buffer)>0)
                    {
                        session_start();
                        $_SESSION['login_buffer']=$login_buffer[0];
                        header('Location: '.PATH);
                    }
                    else{
                        array_push($errores,"Cuenta deshabilitada/no verificada");
                        $viewBag['errores']=$errores;
                        $this->render("login.php",$viewBag);
                    }
                }
                else{
                array_push($errores,"Usuario y/o contraseña incorrecta");
                $viewBag['errores']=$errores;
                $this->render("login.php",$viewBag);
                }
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
                if(!isset($ID_Usuario)||estaVacio($ID_Usuario))
                {
                    array_push($errores,"Debes ingresar un codigo de usuario");
                }elseif(!esUsuario($ID_Usuario))
                {
                    array_push($errores,"El codigo no es válido");
                }
                if(!isset($nickname)||estaVacio($nickname))
                {
                    array_push($errores,"Debes ingresar un nickname");
                }
                elseif(!esOnlyText($nickname))
                {
                  array_push($errores,"El nickname es inváldo");
                }
                if(!isset($telefono)||estaVacio($telefono))
                {
                    array_push($errores,"Debes ingresar tu número de teléfono");
                }
                elseif(!esTelefono($telefono))
                {
                  array_push($errores,"Debes ingresar un número válido");
                }
                if(!isset($correo)||estaVacio($correo))
                {
                    array_push($errores,"Debes ingresar tu correo");
                }
                elseif(!esMail($correo))
                {
                  array_push($errores,"Correo no válido");
                }
                if(!isset($clave)||estaVacio($clave))
                {
                    array_push($errores,"Debes ingresar una clave");
                }
                elseif(!esClave($clave))
                {
                  array_push($errores,"Clave invalida");
                }
            }
        }
    
    }
?>