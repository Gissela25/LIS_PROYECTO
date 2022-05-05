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
    <link rel="stylesheet" href="<?=PATH?>Assets/css/family-edit.css">
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
                    <?php foreach($familias as $familia)
                        {
                        ?>
        <form class="formulario" method="POST" action="<?=PATH?>Familias/Actualizar/<?=$familia['ID_Familia']?>"">
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
              <legend style="color:#084594" class="text-center">Actualizar Familia</legend>    
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">ID Familia</label>
                    <input type="name" class="form-control" name="ID_Familia"  id="ID_Familia" value="<?=isset($familia)?$familia['ID_Familia']:''?>" readonly>
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Familia</label>
                    <input type="name" class="form-control" name="Nombre_Familia" id="Nombre_Familia" value="<?=isset($familia)?$familia['Nombre_Familia']:''?>">
                </div>
                <div class="d-flex justify-content-center">
                    <div class="my-2">
                            <input type="submit" class="btn " name="Actualizar" id="Actualizar"></input> 
                            </div>
              </form>
              <?php
                        }
              ?>
        </div>
    </div>
</body>

</html>