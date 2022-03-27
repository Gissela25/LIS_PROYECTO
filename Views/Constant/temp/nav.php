<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
           <a href="?c=products&a=maintemp"> <img src="<?=PATH?>Assets/img/logo.PNG" alt="" width="150" height="50" class="d-inline-block align-text-top"></a>
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?=PATH?>?c=products&a=maintemp">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-geo-alt-fill"></i> Sucursales
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?=PATH?>?c=products&a=St">Santa Tecla</a></li>
                            <li><a class="dropdown-item" href="<?=PATH?>?c=products&a=Ss">San Salvador</a></li>
                            <li><a class="dropdown-item" href="<?=PATH?>?c=products&a=Lo">Lourdes</a></li>
                            <li><a class="dropdown-item" href="<?=PATH?>?c=products&a=Op">Opico</a></li>
                            <li><a class="dropdown-item" href="<?=PATH?>?c=products&a=Za">Zaragoza</a></li>
                            <li><a class="dropdown-item" href="<?=PATH?>?c=products&a=Sa">Santa Ana</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?=PATH?>?c=inicio&a=contacto">Contactanos</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-fill"></i>Google User
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Actualizar datos</a></li>
                        <li><a class="dropdown-item" href="<?=PATH?>?c=user&a=close">Cerrar Sesion</a></li>
                    </ul>
                </li>
                </ul>
            </div>
        </div>
    </nav>