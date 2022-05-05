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
            <a class="edit" href="<?=PATH?>Productos/Agregar"><i class="bi bi-plus-square-fill"></i> Insertar</a>
            <div class="row mt-3">
                <table class="table table-bordered" id="data">
                    <thead class="Te" style="background-color: #084594">
                        <tr>
                            <th>Codigo Producto</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Imagen</th>
                            <th>Familia</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                   
                   foreach ($productos as $producto)
                   {
                        $img=$producto['Imagen'];
                        $path="img/".$img;
                        if(file_exists($path))
                      
                   ?>
                        <tr < id="id_<?=$producto['ID_Producto']?>">
                            <td><?=$producto['ID_Producto']?></td>
                            <td><?=$producto['Nombrep']?></td>
                            <td><?=$producto['Descripcion']?></td>
                            <td><?php echo "<img src='".PATH."img/$img' width='200px' height='200px'>"?></td>
                            <td><?=$producto['Nombre_Familia']?></td>
                            <td>
                                <center>
                                <form action="<?=PATH?>Productos/Operaciones/<?=$producto['ID_Producto']?>" method="post">
                                <a class="edit mx-2" href="<?=PATH?>Productos/Editar/<?=$producto['ID_Producto']?>"><i
                                        class="bi bi-pencil-square"></i></a>
                                        <?php
                                        if($producto['Estado_Producto']==1)
                                        {
                                        ?>
                                <button class="edit mx-2 boton" type="submit" name="Eliminar" id="Eliminar"><i class="bi bi-trash-fill"></i></button>
                                        <?php
                                        }
                                        else{
                                        ?>
                                <button class="edit mx-2 boton" type="submit" name="Recuperar" id="Recuperar"><i class="bi bi-check-circle-fill"></i></button>   
                                        <?php
                                        }
                                        ?>
                                </form>
                                </center>
                            </td>
                        </tr>
                        <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <script>
                 $(document).ready(function() {
                 $('#data').DataTable();
                 } );
            </script>
            <?php
            require_once "./Views/footer.php";
            ?>
</body>

</html>