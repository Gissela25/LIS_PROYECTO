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
    <title>Sucursales</title>
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

<?php require_once "./Views/menu.php";?>
    <div class="row mx-5 mt-5">
        <div class="col ml-5">
            <!-- <a class="edit" href="?c=branch&a=Insert"><i class="bi bi-plus-square-fill"></i> Insertar</a> -->
            <div class="row mt-3">
                <table class="table table-bordered" id="data">
                    <thead class="Te" style="background-color: #084594">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($sucursales as $sucursal)
                        {
                        ?>
                            <form action="<?=PATH?>Sucursales/Operaciones/<?=$sucursal['ID_Sucursal']?>" method="POST">
                        <tr id="id_<?=$sucursal['ID_Sucursal']?>">
                            <td><?=$sucursal['ID_Sucursal']?></td>
                            <td><?=$sucursal['Nombre_Sucursal']?></td>
                            <td>
                                <a class="edit ss mx-3" href="<?=PATH?>Sucursales/Editar/<?=$sucursal['ID_Sucursal']?>"><i
                                        class="bi bi-pencil-square"></i> Editar</a>
                                    <?php
                                    if($sucursal['Estado_Sucursal']==1)
                                    {
                                    ?>
                                    <button name="Desactivar" id="Desactivar" type="submit" class="mx-3 boton"> <i class="bi bi-trash-fill"></i> Desactivar</button>


                                    <?php
                                    }
                                    elseif($sucursal['Estado_Sucursal']==0){
                                    ?>

                                    <button id="Activar" name="Activar" type="submit" class="mx-3  boton"><i class="bi bi-check-circle-fill"></i> Activar

                                

                                    <?php
                                    }
                                    ?>
                            </td>
                        </tr>
                            </form>
                        <?php }?>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
            <script>
                $(document).ready(function() {
                $('#data').DataTable();
                } );
            </script>
            <?php require_once "./Views/footer.php";?>
</body>

</html>