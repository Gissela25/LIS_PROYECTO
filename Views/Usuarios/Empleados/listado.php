<?php
require_once('./Core/config.php');
?>
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
    <link rel="stylesheet" href="<?=PATH?>Assets/css/branch.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Empleados</title>
    <?php 
    require_once "./Views/datatables.php";
    ?>
        <style>
        .boton{
            border: none;
            background-color: white;
            text-decoration: underline;
        }
    </style>
</head>

<body>
<?php 
 require_once "./Views/menu.php";
?>

    <div class="row mx-5 mt-5">
        <div class="col ml-5">
            <h5 style="text-align:center">Usuarios Activos</h5>
            <a class="edit" href="<?=PATH?>Usuarios/Agregar"><i class="bi bi-plus-square-fill"></i> Insertar</a>
            <div class="row mt-3">
                <table class="table table-bordered" id="data1">
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
                        <?php foreach($empleados as $empleado){
                            if($empleado['Estado']==1){
                            ?>
                            <tr id="id_<?=$empleado['ID_Usuario']?>">
                        <td><?=$empleado['ID_Usuario']?></td>
                        <td><?=$empleado['Nombre']?></td>
                        <td><?=$empleado['Apellido']?></td>
                        <td><?=$empleado['Correo']?></td>
                        <td><?=$empleado['Nombre_Sucursal']?></td>
                        <td>
                        <form action="<?=PATH?>Usuarios/Operaciones/<?=$empleado['ID_Usuario']?>" method="post">
                            <a class="edit mx-3" href="<?=PATH?>Usuarios/Editar/<?=$empleado['ID_Usuario']?>"><i class="bi bi-pencil-square"></i> Editar
                                <i class="fa fa-lg fa-refresh"></i></a>
                            <button id="Desactivar" name="Desactivar" type="submit" class="edit mx-3 boton"><i class="bi bi-trash-fill"></i> Desactivar</button> 
                        </form>
                        </td>
                        </tr>

                        <?php
                    } }?>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row mx-5 mt-5">
        <div class="col ml-5">
        <h5 style="text-align:center">Usuarios Inactivos</h5>
            <!-- <a class="edit" href="?c=branch&a=Insert"><i class="bi bi-plus-square-fill"></i> Insertar</a> -->
            <div class="row mt-3">
                <table class="table table-bordered" id="data2">
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
                    <?php foreach($empleados as $empleado){
                            if($empleado['Estado']==0){
                            ?>
                            <tr id="id_<?=$empleado['ID_Usuario']?>">
                            <td><?=$empleado['ID_Usuario']?></td>
                        <td><?=$empleado['Nombre']?></td>
                        <td><?=$empleado['Apellido']?></td>
                        <td><?=$empleado['Correo']?></td>
                        <td><?=$empleado['Nombre_Sucursal']?></td>
                        <td>
                            <form action="<?=PATH?>Usuarios/Operaciones/<?=$empleado['ID_Usuario']?>" method="post">
                            <a class="edit mx-3" href="?c=worker&a=workeredit&idu=<?=$empleado['ID_Usuario']?>"><i class="bi bi-pencil-square"></i> Editar
                                <i class="fa fa-lg fa-refresh"></i></a>
                            <button type="submit" id="Activar" name="Activar" class="edit mx-3 boton"><i class="bi bi-check-circle-fill"></i> Activar</button>
                        </td>
                        </tr>
                        <?php }}?>
                        <tr>
                        </tr>
                            </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
        $('#data1').DataTable();
        } );
        $(document).ready(function() {
        $('#data2').DataTable();
        } );
    </script>
    <?php
    require_once "./Views/footer.php";
    ?>
</body>

</html>