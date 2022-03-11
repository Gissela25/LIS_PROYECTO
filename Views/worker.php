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
    <link rel="stylesheet" href="../Assets/css/branch.css">
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
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Sucursales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Productos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row mx-5 mt-5">
        <div class="col ml-5">
            <h5 style="text-align:center">Usuarios Activos</h5>
            <a class="edit" href="?c=worker&a=Insert"><i class="bi bi-plus-square-fill"></i> Insertar</a>
            <div class="row mt-3">
                <table class="table table-bordered">
                    <thead class="Te" style="background-color: #084594">
                        <tr>
                            <th>ID Usuario</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Sucursal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($this->modelo->showactive() as $r):?>
                        <td><?=$r->ID_Usuario?></td>
                        <td><?=$r->Nombre?></td>
                        <td><?=$r->Apellido?></td>
                        <td><?=$r->Correo?></td>
                        <td><?=$r->Nombre_Sucursal?></td>
                        <td>
                            <a class="edit mx-3" href="?c=worker&a=workeredit&idu=<?=$r->ID_Usuario?>"><i class="bi bi-pencil-square"></i> Editar
                                <i class="fa fa-lg fa-refresh"></i></a>
                            <!-- <a class="edit mx-3" href=""><i class="bi bi-trash-fill"></i> Eliminar
                                <i class="fa fa-lg fa-refresh"></i></a> -->
                        </td>
                        </tr>
                        <?php endforeach;?>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row mx-5 mt-5">
        <div class="col ml-5">
        <h5 style="text-align:center">Usuarios Desactivos</h5>
            <!-- <a class="edit" href="?c=branch&a=Insert"><i class="bi bi-plus-square-fill"></i> Insertar</a> -->
            <div class="row mt-3">
                <table class="table table-bordered">
                    <thead class="Te" style="background-color: #084594">
                        <tr>
                            <th>ID Usuario</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Sucursal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($this->modelo->showdactive() as $r):?>
                        <td><?=$r->ID_Usuario?></td>
                        <td><?=$r->Nombre?></td>
                        <td><?=$r->Apellido?></td>
                        <td><?=$r->Correo?></td>
                        <td><?=$r->Nombre_Sucursal?></td>
                        <td>
                            <a class="edit mx-3" href="?c=worker&a=workeredit&idu=<?=$r->ID_Usuario?>"><i class="bi bi-pencil-square"></i> Editar
                                <i class="fa fa-lg fa-refresh"></i></a>
                            <!-- <a class="edit mx-3" href=""><i class="bi bi-trash-fill"></i> Eliminar
                                <i class="fa fa-lg fa-refresh"></i></a> -->
                        </td>
                        </tr>
                        <?php endforeach;?>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>