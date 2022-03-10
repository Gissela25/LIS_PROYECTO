<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucursales</title>
</head>
<body>
<<<<<<< Updated upstream
<div class="row mx-5 mt-5">
    <div class="col ml-5">
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($this->modelo->show() as $r):?>
                <tr>
                    <td><?=$r->ID_Sucursal?></td>
                    <td><?=$r->Nombre_Sucursal?></td>
                    <td>
                        <!-- <a class="btn btn btn-light btn-flat" href="FormCrear/<?=$r->ID?>">Editar
                            <i class="fa fa-lg fa-refresh"></i></a>
                        <a class="btn btn-secondary btn-flat" href="Borrar/<?=$r->ID?>">Eliminar
                            <i class="fa fa-lg fa-trash"></i></a> -->
                    </td>
                    </td>
                </tr>
                <?php endforeach;?>
                <tr>
                </tr>
            </tbody>
        </table>
    </div>
=======
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
            <a class="edit" href="?c=branch&a=Insert"><i class="bi bi-plus-square-fill"></i> Insertar</a>
            <div class="row mt-3">
                <table class="table table-bordered">
                    <thead class="Te" style="background-color: #084594">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($this->modelo->show() as $r):?>
                        <tr>
                            <td><?=$r->ID_Sucursal?></td>
                            <td><?=$r->Nombre_Sucursal?></td>
                            <td>
                                <a class="edit mx-3" href="?c=branch&a=Insert&id=<?=$r->ID_Sucursal?>"><i
                                        class="bi bi-pencil-square"></i> Editar
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
>>>>>>> Stashed changes
</body>
</html>