<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="Assets/css/branch.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Empleados</title>
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
                        <a class="nav-link active" aria-current="page" href="?c=products&a=showss">Inventario
                            General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?c=products&a=showssall">San Salvador</a>
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
                            <li><a class="dropdown-item" href="?c=products&a=stokest">Santa Tecla</a></li>
                            <li><a class="dropdown-item" href="?c=products&a=stokelo">Lourdes</a></li>
                            <li><a class="dropdown-item" href="?c=products&a=stokeop">Opico</a></li>
                            <li><a class="dropdown-item" href="?c=products&a=stokeza">Zaragoza</a></li>
                            <li><a class="dropdown-item" href="?c=products&a=stokesa">Santa Ana</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row mx-5 mt-5">
        <div class="col ml-5">
            <!-- <a class="edit" href="?c=products&a=Insert"><i class="bi bi-plus-square-fill"></i> Insertar</a> -->
            <div class="row mt-3">
                <table class="table table-bordered">
                    <thead class="Te" style="background-color: #084594">
                        <tr>
                            <th>Codigo Producto</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Imagen</th>
                            <th>Familia</th>
                            <th>Precio</th>
                            <th>Existencias</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                   
                   foreach ($this->modelo->Showopall() as $r)
                   {
                      $path="img/".$r->Imagen;
                      if(file_exists($path))
                      
                   ?>
                        <tr < id="id_<?=$r->ID_Producto?>">
                            <td><?=$r->ID_Producto?></td>
                            <td><?=$r->Nombrep?></td>
                            <td><?=$r->Descripcion?></td>
                            <td><?php echo "<img src='img/$r->Imagen' width='200px' height='200px'>"?></td>
                            <td><?=$r->Nombre?></td>
                            <td>$<?=$r->Precio_OP?></td>
                            <td><?=$r->Cantidad_OP?></td>
                        </tr>
                        <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
</body>

</html>