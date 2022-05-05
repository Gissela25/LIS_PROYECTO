<?php 
 require_once('./Core/config.php');
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
    <link rel="stylesheet" href="<?=PATH?>Assets/css/branch-insert.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
    <?php
    require_once "./Views/menu.php";
    ?>
    <div class="d-flex justify-content-center">
        <div class="col-md-4 my-5">
        <img src="<?=PATH?>Assets/img/logo.PNG" class="rounded mx-auto d-block mb-3" alt="..." height="85px"
                    width="230px">
                    <?php foreach($sucursales as $sucursal)
                        {
                        ?>
            <form class="formulario" method="POST" action="<?=PATH?>Sucursales/Guardar/<?=$sucursal['ID_Sucursal']?>" role="form">
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
                <div class="form-group">
                    <div class="col-lg-10">
                    <legend style="color:#084594" class="text-center">
                    Actualizar  Sucursal</legend>
                        <input class="form-control" name="ID_Sucursal" name="ID_Sucursal" type="hidden" value="<?=isset($sucursal)?$sucursal['ID_Sucursal']:''?>">
                    </div>
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Nombre Sucursal</label>
                    <input type="name" class="form-control" name="Nombre_Sucursal" id="Nombre_Sucursal" value="<?=isset($sucursal)?$sucursal['Nombre_Sucursal']:''?>">
                </div>
                <div class="d-flex justify-content-center">
                    <div class="my-2">
                            <input type="submit" class="btn" id="Actualizar" title="Enviar" name="Actualizar"></input>
                        </div>
                </div>
                
            </form>
            <?php
                        }
            ?>
        </div>
    </div>
    <?php
    require_once "./Views/footer.php";
    ?>
</body>

</html>