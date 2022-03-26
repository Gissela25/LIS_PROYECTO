<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="?c=user&a=mainlo">
            <img src="<?=PATH?>Assets/img/logo.PNG" alt="" width="150" height="50"
                class="d-inline-block align-text-top"></a>
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
               
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?c=products&a=showlo">Inventario General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?c=products&a=showloall">Lourdes</a>
                </li>
                <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?c=worker&a=worker">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?c=family&a=family">Familia</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-geo-alt-fill"></i> Productos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="?c=products&a=show">Inventario General</a></li>
                            <li><a class="dropdown-item" href="#">Santa Tecla</a></li>
                            <li><a class="dropdown-item" href="#">San Salvador</a></li>
                            <li><a class="dropdown-item" href="#">Lourdes</a></li>
                            <li><a class="dropdown-item" href="#">Opico</a></li>
                            <li><a class="dropdown-item" href="#">Zaragoza</a></li>
                            <li><a class="dropdown-item" href="#">Santa Ana</a></li>
                        </ul>
                    </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-archive-fill"></i> Stoke
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="<?=PATH?>?c=products&a=stokestlo">Santa Tecla</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>?c=products&a=stokesslo">San Salvador</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>?c=products&a=stokeoplo">Opico</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>?c=products&a=stokezalo">Zaragoza</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>?c=products&a=stokesalo">Santa Ana</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-fill"></i>Hola, <?php echo $nombre." ".$apellido;?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Editar Cuenta</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>?c=user&a=close">Cerrar Sesion</a></li>
                    </ul>
                </li>
        </div>
    </div>
</nav>