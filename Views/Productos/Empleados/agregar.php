<?php require_once('./Core/config.php');
require_once('./Views/server_config.php');
$precio="Precio_$sucursal_uri";
$cantidad="Cantidad_$sucursal_uri";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucursales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="<?=PATH?>Assets/css/worker-insert.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
    <?php
    require_once "./Views/menu.php";
    ?>
    <div class="d-flex justify-content-center">
        <div class="col-md-4 my-5">
            <img src="<?=PATH?>Assets/img/logo.PNG" class="rounded mx-auto d-block mb-3" alt="..." height="65px" width="200px">
            <?php
            foreach($productos as $producto)
            {
            ?>
            <form class="formulario" method="POST" action="<?=PATH?>Productos/Anexando/<?=$sucursal_uri?>/<?=$producto['ID_Producto']?>">
            <?php
                   if(isset($errores))
                   {
                       if(count($errores)>0)
                       {
                        echo "<div class='alert alert-danger' style='color:#343a40' ><ul>";
                           foreach ($errores as $error) {
                               echo "<li style='color:#343a40'>$error</li>";
                           }
                           echo "</ul></div>";
                       }
                   }
                   ?>
                <legend style="color:#084594" class="text-center">Stock <?php
                foreach($sucursales as $sucursal){
                    if($sucursal['Siglas']==$sucursal_uri){
                $nombre =$sucursal['Nombre_Sucursal'];
                echo $nombre;
                    }
                }
                ?></legend>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Codigo Producto</label>
                    <input type="name" class="form-control" name="ID_Producto" 
                        value="<?=$producto['ID_Producto']?>" readonly>
                </div> 
                <?php
                foreach($complementos as $complemento)
                {
                ?>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Precio <?=$nombre?></label>
                    <input type="numbers" class="form-control" name="Precio" id="Precio" value="<?=isset($complemento[$precio])?$complemento[$precio]:''?>">
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Existencias <?=$nombre?></label>
                    <input type="numbers" class="form-control" name="Cantidad" id="Cantidad" value="<?=isset($complemento[$cantidad])?$complemento[$cantidad]:''?>">
                </div>
                <div class="d-flex justify-content-center">
                    <div class="my-2">
                        <input type="submit" class="btn" id="Guardar" name="Guardar" ></input>
                    </div>
                </div>

                    <input type="hidden" name="ID_PC" id="ID_PC" value="<?=$complemento['ID_PC']?>">
                <?php }?>
            </form>
           <?php
            }
           ?> 
        </div>
    </div>

    </div>
    <?php
    require_once "./Views/footer.php";
    ?>
</body>

</html>