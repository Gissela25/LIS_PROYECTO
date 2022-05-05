<?php
require_once('./Core/config.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="<?=PATH?>Assets/css/insert-products.css">
</head>

<body>
    <?php
    require_once "./Views/menu.php";
    ?>
    <div class="d-flex justify-content-center">
        <div class="col-md-4 my-5">
            <img src="<?=PATH?>Assets/img/logo.PNG" class="rounded mx-auto d-block mb-3" alt="..." height="65px" width="200px">
            <form method="POST" action="<?=PATH?>Productos/Insertando" enctype="multipart/form-data" class="formulario">
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
                <div class="form-group text-center">
                    <legend style="color:#084594" class="text-center">Ingresar Producto</legend>
                </div>
                <div class="mb-3" style="color:#084594">
                    <label class="control-label" for="ID_Producto">Codigo:</label>
                    <input type="text" class="form-control" value="<?=isset($producto)?$producto['ID_Producto']:''?>" readonly
                        name="ID_Producto" id="ID_Producto" required>
                </div>
                <div class="mb-3" style="color:#084594">
                    <label class="control-label" for="Nombrep">Nombre:</label>
                    <input type="text" class="form-control" value="<?=isset($producto['Nombrep'])?$producto['Nombrep']:''?>" name="Nombrep" id="Nombrep">
                </div>
                <div class="mb-3" style="color:#084594">
                    <label class="control-label" for="Descripcion">Descripcion:</label>
                    <textarea class="form-control" name="Descripcion" id="Descripcion" cols="35" rows="2"><?=isset($producto['Descripcion'])?$producto['Descripcion']:''?></textarea>
                </div>

                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label" for="Imagen">Imagen</label>
                    <input type="file" class="form-control" name="Imagen">
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label" for="ID_Familia">Categoria</label>
                    <div class="form-floating">
                        <select class="form-select" name="ID_Familia"  id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected value=""></option>
                            <?php
                            foreach($familias as $familia)
                            {
                            ?>
                            <option value="<?=$familia['ID_Familia']?>"><?=$familia['Nombre_Familia']?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3" style="color:#084594">
                    <input type="hidden" class="form-control" value="" readonly
                        name="ID_PC" id="ID_PC">
                </div>
                <div class="d-flex justify-content-center">
                    <div class="my-2">
                        <input type="submit" name="Guardar" id="Guardar" class="btn "></input>
                    </div>
                </div>
        </div>
    </div>



    </form>
    </div>


    </div>
    </div>
    <?php
    require_once "./Views/footer.php";
    ?>
</body>

</html>