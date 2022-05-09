<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <a><img src="<?=PATH?>Assets/img/logo.PNG" alt="" width="150" height="50"
                class="d-inline-block align-text-top"></a>
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <?php
                    if((isset($_SESSION['login_buffer']))&&$_SESSION['login_buffer']['Acceso']!=2)
                    {
                        if($_SESSION['login_buffer']['Acceso']==0)
                        {
                            ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=PATH?>Usuarios/Inicio">Inicio</a>
                </li>
                <?php
                        }
                            elseif($_SESSION['login_buffer']['Acceso']==1){
                                ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=PATH?>Usuarios/Home">Inicio</a>
                </li>
                <?php                              
                            }               
                    }
                    if((!isset($_SESSION['login_buffer']))||$_SESSION['login_buffer']['Acceso']==2)
                    {
                    ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=PATH?>">Inicio</a>
                </li>
                <?php
                }
                if(isset($_SESSION['login_buffer'])&&$_SESSION['login_buffer']['Acceso']==4){
                    ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=PATH?>Usuarios/Main">Inicio</a>
                </li>
                <?php
                }
                    ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=PATH?>Index/Empresa">Quienes Somos</a>
                </li>
                <?php
                    if(isset($_SESSION['login_buffer']))
                    {
                        if($_SESSION['login_buffer']['Acceso']==0)
                        {
                    ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                        href="<?=PATH?>Productos/Inventario/<?=$_SESSION['login_buffer']['Siglas']?>">Inventario
                        General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                        href="<?=PATH?>Productos/Disponibles/<?=$_SESSION['login_buffer']['Siglas']?>"><?=$_SESSION['login_buffer']['Nombre_Sucursal']?></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-archive-fill"></i> Stock
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="<?=PATH?>Productos/Stock/ST">Santa Tecla</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>Productos/Stock/SS">San Salvador</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>Productos/Stock/LO">Lourdes</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>Productos/Stock/OP">Opico</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>Productos/Stock/ZA">Zaragoza</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>Productos/Stock/SA">Santa Ana</a></li>
                    </ul>
                </li>

                <?php
                        }
                    }
                    if(isset($_SESSION['login_buffer']))
                    {
                        if($_SESSION['login_buffer']['Acceso']==1){
                    ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=PATH?>Sucursales">Sucursales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=PATH?>Usuarios">Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=PATH?>Familias">Familia</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-geo-alt-fill"></i> Productos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="<?=PATH?>Productos">Inventario General</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>Productos/Stock/ST">Santa Tecla</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>Productos/Stock/SS">San Salvador</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>Productos/Stock/LO">Lourdes</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>Productos/Stock/OP">Opico</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>Productos/Stock/ZA">Zaragoza</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>Productos/Stock/SA">Santa Ana</a></li>
                    </ul>
                </li>
                <?php
                        }
                    }
                    ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-fill"></i>
                        <?php
                                         if(!isset($_SESSION['login_buffer'])){
                            ?>
                        Mi cuenta
                        <?php 
                            }
                            else{
                                echo $_SESSION['login_buffer']['Nombre'];
                            }?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php
                                         if(!isset($_SESSION['login_buffer'])){
                            ?>
                        <li><a class="dropdown-item" href="<?=PATH?>Usuarios/Login">Iniciar Sesion</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>Clientes/Singin">Registrarse</a></li>
                        <?php
                                         }
                                         else{
                                             if($_SESSION['login_buffer']['Acceso']==2){
                            ?>
                        <li><a class="dropdown-item" href="<?=PATH?>Clientes/Editar">Editar Cuenta</a></li>
                        <?php
                                             }elseif($_SESSION['login_buffer']['Acceso']==1||$_SESSION['login_buffer']['Acceso']==0){
                            ?>
                        <li><a class="dropdown-item" href="<?=PATH?>Usuarios/Actualizar">Editar Cuenta</a></li>
                        <?php
                                             }elseif($_SESSION['login_buffer']['Acceso']==4)
                                             {
                            ?>
                        <li><a class="dropdown-item" href="<?=PATH?>Clientes/Singin">Registrarse</a></li>
                        <?php
                                             }
                            ?>
                        <li><a class="dropdown-item" href="<?=PATH?>Usuarios/Logout">Cerrar Sesión</a></li>
                        <?php
                                         }
                            ?>
                    </ul>
                </li>
                <?php
                    if(isset($_SESSION['login_buffer'])&&$_SESSION['login_buffer']['Acceso']==2||isset($_SESSION['login_buffer'])&&$_SESSION['login_buffer']['Acceso']==4){
                    ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-geo-alt-fill"></i> Sucursales
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="<?=PATH?>Productos/Available/ST">Santa Tecla</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>Productos/Available/SS">San Salvador</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>Productos/Available/LO">Lourdes</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>Productos/Available/OP">Opico</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>Productos/Available/ZA">Zaragoza</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>Productos/Available/SA">Santa Ana</a></li>
                    </ul>
                </li>

                <?php
                    }
                    if(!isset($_SESSION['login_buffer'])){
                    ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=PATH?>Index/Contacto">Contactanos</a>
                </li>
                <?php }
                    elseif(isset($_SESSION['login_buffer'])){
                        if($_SESSION['login_buffer']['Acceso']==2||$_SESSION['login_buffer']['Acceso']==0||$_SESSION['login_buffer']['Acceso']==4)
                        {
                    ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=PATH?>Index/Contacto">Contactanos</a>
                </li>
                <?php
                } }
                if(isset($_SESSION['login_buffer'])){
                    if($_SESSION['login_buffer']['Acceso']==2){
                
                ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=PATH?>Carritos">
                        <i class="bi bi-cart-fill"></i> Carrito
                        <?php 
                   if(count($carritos)>0){
                    echo "( ".count($carritos)." )";
                   }
                    ?>
                    </a>
                </li>
                </a>
                </li>
                <?php }} 

                 if(isset($_SESSION['login_buffer'])){
                    if($_SESSION['login_buffer']['Acceso']==2){
                ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=PATH?>Facturas">
                        <i class="bi bi-bookmark-fill"></i> Comprobantes
                    </a>
                </li>
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" method="POST"
                    action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                    <input type="search" name='look' class="form-control" placeholder="Search..." aria-label="Search">
                </form>
                <?php }} 
                    if(isset($_SESSION['login_buffer'])&&$_SESSION['login_buffer']['Acceso']==1)
                    {
                    ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=PATH?>Facturas/Listado">
                        <i class="bi bi-bookmark-fill"></i> Ventas
                    </a>
                </li>
                <?php 
                    }
                    ?>
            </ul>
        </div>
    </div>
</nav>