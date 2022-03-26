<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="Assets/css/showc.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <img src="Assets/img/logo.PNG" alt="" width="150" height="50" class="d-inline-block align-text-top">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Views/empresa.php">Quienes Somos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i> Mi Cuenta
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="?c=user&a=Ingresar">Iniciar Sesion</a></li>
                            <li><a class="dropdown-item" href="#">Registrarse</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-geo-alt-fill"></i> Sucursales
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="?c=products&a=clientsst">Santa Tecla</a></li>
                            <li><a class="dropdown-item" href="?c=products&a=clientsss">San Salvador</a></li>
                            <li><a class="dropdown-item" href="?c=products&a=clientslo">Lourdes</a></li>
                            <li><a class="dropdown-item" href="?c=products&a=clientsop">Opico</a></li>
                            <li><a class="dropdown-item" href="?c=products&a=clientsza">Zaragoza</a></li>
                            <li><a class="dropdown-item" href="?c=products&a=clientssa">Santa Ana</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Views/Contacts.php">Contactanos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 my-3">
            <?php
                   
                    foreach ($this->modelo->showopall() as $r)
                     {
                        $path="img/".$r->Imagen;
                        if(file_exists($path))
                        {
                            ?>
            <div class="col" id="id_<?=$r->ID_Producto?>">
                <div class="card shadow-sm">
                    <?php echo "<img src='img/$r->Imagen' width='300px' height='250px' class='card-img-top'>"?>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?=$r->Nombrep?>
                        </h5>
                        <p class="card-text">Precio <?=$r->Precio_OP?> $</p>
                        <?php
                                    if(($r->Cantidad_OP)>0)
                                    {
                                        ?>
                        <p class="card-text ">Disponibilidad: <span style="color: green;"> en existencia</span></p>
                        <?php
                                    }
                                    else{
                                        ?>
                        <p class="card-text ">Disponibilidad: <span class="text-danger"> Fuera de stock</span></p>
                        <?php
                                    }
                                    ?>
                        <a href="?c=products&a=Detailsst&id=<?=$r->ID_Producto?>" class="btn btn-primary btn-block boton">Ver
                            más</a>
                    </div>
                </div>
            </div>

            <?php
                        }
                             
                    }
                    ?>
        </div>
    </div>
    </div>

</body>

</html>