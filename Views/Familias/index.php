<?php
require_once "./Core/config.php";
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
    <?php
    require_once "./Views/datatables.php"
    ?>
    <title>Sucursales</title>
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
            <a class="edit" href="<?=PATH?>Familias/Agregar"><i class="bi bi-plus-square-fill"></i> Insertar</a>
            <div class="row mt-3">
                <table class="table table-bordered " id="datatable">
                    <thead class="Te" style="background-color: #084594">
                        <tr>
                            <th>ID Familia</th>
                            <th>Familia</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($familias as $familia):?>
                        <tr>
                            <td><?=$familia['ID_Familia']?></td>
                            <td><?=$familia['Nombre_Familia']?></td>
                            <td>
                                <form action="<?=PATH?>Familias/Operaciones/<?=$familia['ID_Familia']?>" method="post">
                                <a class="edit mx-3" href="<?=PATH?>Familias/Editar/<?=$familia['ID_Familia']?>"><i
                                        class="bi bi-pencil-square"></i> Editar</a>
                                    <?php
                                    if($familia['Estado_Familia']==1)
                                    {
                                    ?>
                                <button type="submit" id="Desactivar" name="Desactivar" class="edit mx-3 boton"><i
                                        class="bi bi-trash-fill"></i> Desactivar</button>
                                    <?php
                                    }
                                    elseif($familia['Estado_Familia']==0){
                                    ?>
                                    <button type="submit" id="Activar" name="Activar" class="edit mx-3 boton"><i class="bi bi-check-circle-fill"></i> Recuperar</button>
                                    <?php
                                    }
                                    ?>
                                    </form>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
            <script>
                $(document).ready(function() {
                $('#datatable').DataTable();
                } );
            </script>
            <?php
            require_once('./Views/footer.php');
            ?>
</body>

</html>