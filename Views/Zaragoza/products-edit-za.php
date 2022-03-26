<?php 
require_once('Core/config.php');
require_once "Views/Constant/empleados/ZA/const.php";?>
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
    <div class="d-flex justify-content-center">
        <div class="col-md-4 my-5">
            <img src="<?=PATH?>Assets/img/logo.PNG" class="rounded mx-auto d-block mb-3" alt="..." height="65px" width="200px">
            <form class="formulario" method="POST" action="<?=PATH?>?c=products&a=Savezap">
                <legend style="color:#084594" class="text-center">Actualizar Stoke</legend>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Codigo Producto</label>
                    <input type="name" class="form-control" name="ID_Producto" 
                        value="<?=$p->getPro_id()?>" readonly>
                </div> 
                <div class="mb-3" style="color:#084594">
                    <input type="hidden" class="form-control" name="ID_PC" 
                        value="<?=$p->getPro_idpc()?>" readonly>
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Precio Zaragoza</label>
                    <input type="numbers" class="form-control" name="Precio_ZA" value="<?=$p->getPro_preza()?>">
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Existencias Zaragoza</label>
                    <input type="numbers" class="form-control" name="Cantidad_ZA" value="<?=$p->getPro_canza()?>">
                </div>
                <div class="d-flex justify-content-center">
                    <div class="my-2">
                        <input type="submit" class="btn "></input>
                    </div>
                </div>
            </form>
        </div>
    </div>

    </div>
</body>

</html>