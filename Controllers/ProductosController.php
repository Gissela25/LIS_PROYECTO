<?php
    require_once './Core/config.php';
    require_once './Core/validaciones.php';
    require_once './Controllers/Controller.php';
    require_once './Models/ProductosModel.php';
    require_once './Models/FamiliasModel.php';
    require_once './Models/SucursalesModel.php';
    require_once './Models/CarritosModel.php';
    class ProductosController extends Controller{
        private $modelo;
        public function __construct()
        {
            $this->modelo= new ProductosModel();
        }

        public function index()
        {
            if(isset($_SESSION['login_buffer']))
            {
                if($_SESSION['login_buffer']['Acceso']==1)
                {
            $viewBag = [];
            $viewBag['productos'] = $this->modelo->get();
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
            $familiasModel = new FamiliasModel();
            $viewBag['familias'] = $familiasModel->getNotNull();
            $viewBag['productos'] = $this->modelo->get($id);
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
                }
            }
            else
            {
                header('Location: '.PATH);
            }
        }

        public function Anexando($siglas,$id)
        {
            if(isset($_POST['Guardar']))
            {
                $viewBag = array();
                $errores=array();
                extract($_POST);
                $sucursalesModel = new SucursalesModel();
                if(!isset($Cantidad)||estaVacio($Cantidad))
                {
                    array_push($errores,"Debes ingresar la cantidad");
                }elseif(!esEntero($Cantidad))
                {
                    array_push($errores,"Ingresa numeros enteros");
                }

                if(!isset($Precio)||estaVacio($Precio))
                {
                    array_push($errores,"Debes ingresar el precio del libro");
                }elseif(!esFloat($Precio))
                {
                    array_push($errores,"Ingresa el precio en enteros o decimales");
                }
                
                $existencias="Cantidad_";
                $existencias.=$siglas;
                $precio="Precio_";
                $precio.=$siglas;
                $producto[$precio]=$Precio;
                $producto[$existencias]=$Cantidad;
                $producto['ID_Producto']=$id;
                $producto['ID_PC']=$ID_PC;
                if(count($errores)>0)
                {
                    $viewBag['complementos']=$this->modelo->getPCbyProducto($id);
                    $viewBag['errores']=$errores;
                    $viewBag['productos']=$this->modelo->get($id);
                    $sucursal= $sucursalesModel->get();
                    $viewBag['sucursales']=$sucursal;
                    $this->render("Empleados/agregar.php",$viewBag);    
                }
                else{
                    if($this->modelo->createPC($producto,$siglas)>0)
                {
                    header('Location: '.PATH.'Productos/Inventario/'.$siglas);
                }
                else{
                    header('Location: '.PATH.'Productos/Disponibles/'.$siglas);
                }
                }
            }
        }

        public function Comprar($ID_Sucursal,$ID_Producto)
        {
            $carritosModel= new CarritosModel();
            if(isset($_POST['Comprar']))
            {
                $errores=array();
                $viewBag=array();
                extract($_POST);
                //$carritosModel = new CarritosModel();
                if(!isset($Cantidad)||estaVacio($Cantidad))
                {
                array_push($errores,"No haz ingresado la cantidad que deseas de este producto");
                }elseif(!esEntero($Cantidad))
                {
                array_push($errores,"Debes ingresar un número entero mayor a cero");
                }
                if($Cantidad>$Existencias)
                {
                    array_push($errores,"La cantidad electa de productos sobrepasa las existencias");
                }
                $carrito['id_carrito']=sha1($_SESSION['login_buffer']['DUI']);
                $carrito['correlativo']=$this->GenerarCorrelativo();
                $carrito['codigo_producto']=$ID_Producto;
                $carrito['cantidad']=$Cantidad;
                $carrito['precio']=$Precio;
                $carrito['siglas_sucursal']=$ID_Sucursal;
                if(count($errores)>0)
                {
                    $viewBag=[];
                    $id_carrito=sha1($_SESSION['login_buffer']['DUI']);
                    $viewBag['carritos']=$carritosModel->CountQuantity($id_carrito);
                    $viewBag['errores']=$errores;
                    $viewBag['productos']=$this->modelo->getByID($ID_Sucursal,$ID_Producto);
                    $this->render("Clientes/detalles.php",$viewBag);
                }
                else{

                    if($carritosModel->create($carrito)>0)
                    {
                        header('Location: '.PATH.'Carritos');
                    }
                }
            }

            if(isset($_POST['Iniciar']))
            {
                header('Location: '.PATH.'Usuarios/Login');
            }
        }

        public function Anexar($sucursal,$id)
        {
            if(isset($_SESSION['login_buffer']))
            {
                if($_SESSION['login_buffer']['Acceso']==0)
                {
                    if($_SESSION['login_buffer']['Siglas']==$sucursal)
                    {
            $sucursalesModel = new SucursalesModel();
            $sucursal= $sucursalesModel->get();
            $productos=$this->modelo->get($id);
            $viewBag['complementos']=$this->modelo->getPCbyProducto($id);
            $viewBag['productos']=$productos;
            $viewBag['sucursales']=$sucursal;
            $this->render("Empleados/agregar.php",$viewBag);
                    }
                    else
                    {
                        header('Location: '.PATH.'Usuarios/Inicio');
                    }
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
                }
            }
            else
            {
                header('Location: '.PATH);
            }
        }

        public function Editando($id)
        {
            if(isset($_POST['Guardar']))
            {
                $familiasModel = new FamiliasModel();
                extract($_POST);
                $filename=$_FILES['Imagen']['name'];
                $size = $_FILES['Imagen']['size'];
                $temp = $_FILES['Imagen']['tmp_name'];
                $explode=explode('.',$filename);
                $extension=array_pop($explode);
                $errores=array();
                $viewBag=array();
                if(!isset($ID_Producto)||estaVacio($ID_Producto))
                {
                    array_push($errores,"Debes ingresar el codigo");
                }elseif(!esProducto($ID_Producto))
                {
                    array_push($errores,"El codigo del producto es inválido");
                }
                if(!isset($Nombrep)||estaVacio($Nombrep))
                {
                    array_push($errores,"Debes ingresar el nombre del  producto");
                }
                elseif(!esVar($Nombrep))
                {
                  array_push($errores,"Debes ingresar un nombre válido");
                }
                if(!isset($Descripcion)||estaVacio($Descripcion))
                {
                 array_push($errores,"Debes ingresar ingresar una descripcion");
                }
                elseif(!esDescripcion($Descripcion))
                {
                array_push($errores,"Debes ingresar la descripcion válida");
                }
                if(!isset($ID_Familia)||estaVacio($ID_Familia))
                {
                 array_push($errores,"Debes elegir una categoria de producto");
                }
                $producto['Nombrep']=$Nombrep;
                $producto['ID_Producto']=$ID_Producto;
                $producto['ID_Familia']=$ID_Familia;
                $producto['Descripcion']=$Descripcion;
                if(count($errores)>0)
                {
               
                    $viewBag['errores']=$errores;
                    $viewBag['productos']=$this->modelo->get($ID_Producto);
                    $viewBag['familias']=$familiasModel->getNotNull();
                    $this->render("editar.php",$viewBag);    
                }
                else{
                    if (empty($filename))
                {
    
                    if($this->modelo->updateImgNone($producto)>0){
                        header('Location: '.PATH.'Productos');}
                        else{
                            header('Location: '.PATH.'Productos');
                        }
                }
                elseif(!empty($filename)){
                    if (!( ($extension == "png" || $extension == "jpg" || $extension == "jpeg") && ($size < 2000000))) {
                        array_push($errores,"Debes ingresar una imagen válida (png/jpg)");
                    }
                    else{
                        $producto['Imagen']=$ID_Producto.'.'.$extension;
                        $path="img";
                        if(file_exists($path))
                        {
                            $dir=$path.'/'.$producto['Imagen'];
                            if(move_uploaded_file($temp,$dir))
                            {
                        if($this->modelo->update($producto)>=0){
                        header('Location: '.PATH.'Productos');}
                        }
                        else{
                             header('Location: '.PATH.'Productos');
                        }
                    }
                    }
                    
                }
                }
            }
        }

        public function Operaciones($id)
        {
            if(isset($_POST['Eliminar']))
            {
                if($this->modelo->delete($id))
                {
                    header('Location: '.PATH.'Productos');
                }
            }
    
            if(isset($_POST['Recuperar']))
            {
                if($this->modelo->activar($id))
                {
                    header('Location: '.PATH.'Productos');
                }
            }
        }

        public function GenerarCodigoPC()
        {
            do{
                $codigo=rand(000,999);
                $id="PC";
                $id.=$codigo;
                if(strlen($id)==5)
                {
                $rows = count($this->modelo->getpc($id));
                }
                else{
                    $rows=1;
                }
    
            }while($rows>0);
            return $id;
        }

        public function Insertando()
        {
            if(isset($_POST['Guardar']))
            {
                $familiasModel = new FamiliasModel();
                extract($_POST);
                $filename=$_FILES['Imagen']['name'];
                $size = $_FILES['Imagen']['size'];
                $temp = $_FILES['Imagen']['tmp_name'];
                $explode=explode('.',$filename);
                $extension=array_pop($explode);
                $errores=array();
                $viewBag=array();
                if(!isset($ID_Producto)||estaVacio($ID_Producto))
                {
                    array_push($errores,"Debes ingresar el codigo");
                }elseif(!esProducto($ID_Producto))
                {
                    array_push($errores,"El codigo del producto es inválido");
                }
                if(!isset($Nombrep)||estaVacio($Nombrep))
                {
                    array_push($errores,"Debes ingresar el nombre del  producto");
                }
                elseif(!esVar($Nombrep))
                {
                  array_push($errores,"Debes ingresar un nombre válido");
                }
                if(!isset($Descripcion)||estaVacio($Descripcion))
                {
                 array_push($errores,"Debes ingresar ingresar una descripcion");
                }
                elseif(!esDescripcion($Descripcion))
                {
                array_push($errores,"Debes ingresar la descripcion válida");
                }
                if(!isset($ID_Familia)||estaVacio($ID_Familia))
                {
                 array_push($errores,"Debes elegir una categoria de producto");
                }
                if (empty($filename))
                {
                    array_push($errores,"Debes ingresar una imagen");
                }
                elseif(!empty($filename)){
                    if (!( ($extension == "png" || $extension == "jpg" || $extension == "jpeg") && ($size < 2000000))) {
                        array_push($errores,"Debes ingresar una imagen válida (png/jpg)");
                       }
                }
                $pc['ID_PC']=$this->GenerarCodigoPC();
                $pc['ID_Producto']=$ID_Producto;
                $producto['Nombrep']=$Nombrep;
                $producto['ID_Producto']=$ID_Producto;
                $producto['ID_Familia']=$ID_Familia;
                $producto['Descripcion']=$Descripcion;
                if(count($errores)>0)
                {
                  $viewBag['errores']=$errores;
                  $viewBag['producto']=$producto;
                  $viewBag['familias']=$familiasModel->getNotNull();
                  $this->render("insertar.php",$viewBag);    
                }
                else{
                    $producto['Imagen']=$ID_Producto.'.'.$extension;
                    $path="img";
                    if(file_exists($path))
                    {
                        $dir=$path.'/'.$producto['Imagen'];
                        if(move_uploaded_file($temp,$dir))
                        {
                            
                            
                                if($this->modelo->create($producto)>0){
                                    if($this->modelo->createPrecioCantidad($pc)>0)
                                    {
                                    header('Location: '.PATH.'Productos');}
                                    else
                                    {
                                      array_push($errores,"Ha ocurrido un error");
                                      $viewBag['errores']=$errores;
                                      $viewBag['familias']=$familiasModel->getNotNull();
                                      $viewBag['producto']=$producto;
                                      $this->render("insertar.php",$viewBag);
                            
                                    }
                                }
              
                                

                    }
                }
            
                  }
            }
        }

        public function GenerarCodigo()
        {
            do{
                $codigo=rand(00000,99999);
                $id="PROD";
                $id.=$codigo;
                if(strlen($id)==9)
                {
                $rows = count($this->modelo->getallProducts($id));
                }
                else{
                    $rows=1;
                }
    
            }while($rows>0);
            return $id;
        }

        public function GenerarCorrelativo()
        {
            do{
                $codigo=rand(100000000,999999999);
                $id="C";
                $id.=$codigo;
                if(strlen($id)==10)
                {
                $rows = count($this->modelo->ComprobarCorrelativo($id));
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
            $familiasModel = new FamiliasModel();
            $producto['ID_Producto']=$this->GenerarCodigo();
            $viewBag['familias'] = $familiasModel->getNotNull();
            $viewBag['producto']=$producto;
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
                }
            }
            else
            {
                header('Location: '.PATH);
            }
        }



        public function Available($sucursal)
        {
            
            $viewBag=[];
            if(isset($_SESSION['login_buffer']))
            {
                if($_SESSION['login_buffer']['Acceso']==2)
                {
                $carritosModel = new CarritosModel();
                $id_carrito=sha1($_SESSION['login_buffer']['DUI']);
                $viewBag['carritos']=$carritosModel->CountQuantity($id_carrito);
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
                }
            }

            $sucursalesModel = new SucursalesModel();
            $viewBag['sucursales'] = $sucursalesModel->getSucursalNotNull();
            $viewBag['productos']=$this->modelo->getBySucursal($sucursal);
            $this->render("Clientes/index.php",$viewBag);
        }

        public function Detalles($var,$id)
        {
            $viewBag=[];
            if(isset($_SESSION['login_buffer']))
            {
                if($_SESSION['login_buffer']['Acceso']==2)
                {
            $carritosModel = new CarritosModel();
            $id_carrito=sha1($_SESSION['login_buffer']['DUI']);
            $viewBag['carritos']=$carritosModel->CountQuantity($id_carrito);
                }
            }
            $viewBag['productos']=$this->modelo->getByID($var,$id);
            $this->render("Clientes/detalles.php",$viewBag);
        }

        public function Inventario($var)
        {
            if(isset($_SESSION['login_buffer']))
            {
                if($_SESSION['login_buffer']['Acceso']==0)
                {
                    if($_SESSION['login_buffer']['Siglas']==$var)
                    {
                        $viewBag=[];
                        $viewBag['productos']=$this->modelo->getNull($var);
                        $this->render("Empleados/index.php",$viewBag);
                    }
                    else
                    {
                        header('Location: '.PATH.'Usuarios/Inicio');
                    }
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
                }
            }
            else
            {
                header('Location: '.PATH);
            }
        }
        

        public function Disponibles($var)
        {
            if(isset($_SESSION['login_buffer']))
            {
                if($_SESSION['login_buffer']['Acceso']==0)
                {
                    if($_SESSION['login_buffer']['Siglas']==$var)
                    {
            $viewBag=[];
            $viewBag['productos']=$this->modelo->getBySucursal($var);
            $this->render("Empleados/disponibles.php",$viewBag);
                    }
                    else
                    {
                        header('Location: '.PATH.'Usuarios/Inicio');
                    }
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
                }
            }
            else
            {
                header('Location: '.PATH);
            }
        }

        public function Stock($var)
        {
            if(isset($_SESSION['login_buffer']))
            {
                if($_SESSION['login_buffer']['Acceso']==1)
                {
            $viewBag=[];
            $viewBag['productos']=$this->modelo->getBySucursal($var);
            $this->render("Empleados/stock.php",$viewBag);
                }
                elseif($_SESSION['login_buffer']['Acceso']==0){
                    $viewBag=[];
            $viewBag['productos']=$this->modelo->getBySucursal($var);
            $this->render("Empleados/stock.php",$viewBag);
                }
                else
                {
                    if($_SESSION['login_buffer']['Acceso']==2)
                    {
                        header('Location: '.PATH);
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