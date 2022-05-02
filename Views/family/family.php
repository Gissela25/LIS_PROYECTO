<?php
require_once('Core/config.php');
 require_once "Views/Constant/admin/const.php";
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
    <title>Sucursales</title>
</head>

<body>
<?php 
 require_once "Views/Constant/admin/nav.php";
?>

    <div class="row mx-5 mt-5">
        <div class="col ml-5">
            <a class="edit" href="<?=PATH?>?c=family&a=Insert"><i class="bi bi-plus-square-fill"></i> Insertar</a>
            <div class="row mt-3">
                <table class="table table-bordered">
                    <thead class="Te" style="background-color: #084594">
                        <tr>
                            <th>ID Familia</th>
                            <th>Familia</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($this->modelo->show() as $r):?>
                        <tr>
                            <td><?=$r->ID_Familia?></td>
                            <td><?=$r->Nombre?></td>
                            <td>
                                <a class="edit mx-3" href="<?=PATH?>?c=family&a=edit&id=<?=$r->ID_Familia?>"><i
                                        class="bi bi-pencil-square"></i> Editar
                                    <i class="fa fa-lg fa-refresh"></i></a>
                                <a class="edit mx-3" href="<?=PATH?>?c=family&a=sendelete&id=<?=$r->ID_Familia?>"><i
                                        class="bi bi-trash-fill"></i> Eliminar
                                    <i class="fa fa-lg fa-refresh"></i></a>
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