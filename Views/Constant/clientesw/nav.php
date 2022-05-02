<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <a href="?c=inicio"><img src="<?=PATH?>Assets/img/logo.PNG" alt="" width="150" height="50" class="d-inline-block align-text-top"></a>
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?=PATH?>?c=inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?=PATH?>?c=products&a=empresa">Quienes Somos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i> Mi Cuenta
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?=PATH?>?c=user&a=Ingresar">Iniciar Sesion</a></li>
                            <li><a class="dropdown-item" href="<?=PATH?>?c=client&a=registrar">Registrarse</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-geo-alt-fill"></i> Sucursales
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?=PATH?>?c=products&a=clientsst">Santa Tecla</a></li>
                            <li><a class="dropdown-item" href="<?=PATH?>?c=products&a=clientsss">San Salvador</a></li>
                            <li><a class="dropdown-item" href="<?=PATH?>?c=products&a=clientslo">Lourdes</a></li>
                            <li><a class="dropdown-item" href="<?=PATH?>?c=products&a=clientsop">Opico</a></li>
                            <li><a class="dropdown-item" href="<?=PATH?>?c=products&a=clientsza">Zaragoza</a></li>
                            <li><a class="dropdown-item" href="<?=PATH?>?c=products&a=clientssa">Santa Ana</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?=PATH?>?c=inicio&a=contacto">Contactanos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>