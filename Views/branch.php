<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucursales</title>
</head>
<body>
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
</body>
</html>