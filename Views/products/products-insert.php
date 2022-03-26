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
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="<?=PATH?>Assets/css/insert-products.css">
</head>

<body>
    <div class="d-flex justify-content-center">
        <div class="col-md-4 my-5">
            <img src="<?=PATH?>Assets/img/logo.PNG" class="rounded mx-auto d-block mb-3" alt="..." height="65px" width="200px">
            <form method="POST" action="<?=PATH?>?c=products&a=add" enctype="multipart/form-data" class="formulario">
                <div class="form-group text-center">
                    <legend style="color:#084594" class="text-center">Ingresar Producto</legend>
                </div>
                <?php require 'Views/Tools/procesar-datos-products.php'?>
                <?php
                    if(count($errores)>0&&isset($_POST['add']))
                    {
                        echo "<div> <ul>";
                        foreach($errores as $error)
                        {
                          echo "<li>$error</li>";
                        }
                        echo "</ul></div>";

                    }
        ?>
                <div class="mb-3" style="color:#084594">
                    <label class="control-label" for="ID_Producto">Codigo:</label>
                    <input type="text" class="form-control" value="<?=$this->modelo->generate_code();?>" readonly
                        name="ID_Producto" id="ID_Producto" required>
                </div>
                <div class="mb-3" style="color:#084594">
                    <label class="control-label" for="Nombrep">Nombre:</label>
                    <input type="text" class="form-control" name="Nombrep" id="Nombrep" required>
                </div>
                <div class="mb-3" style="color:#084594">
                    <label class="control-label" for="Descripcion">Descripcion:</label>
                    <textarea class="form-control" name="Descripcion" id="Descripcion" cols="35" rows="2"></textarea>
                </div>

                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label" for="Imagen">Imagen</label>
                    <input type="file" class="form-control" name="Imagen">
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label" for="ID_Familia">Categoria</label>
                    <div class="form-floating">
                        <select class="form-select" name="ID_Familia" id="floatingSelect"
                            aria-label="Floating label select example">
                            <?php foreach($this->modelo->showfamilia() as $r):?>
                            <option value="<?=$r->ID_Familia?>"><?=$r->Nombre?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="mb-3" style="color:#084594">
                    <input type="hidden" class="form-control" value="<?=$this->modelo->generate_codep();?>" readonly
                        name="ID_PC" id="ID_PC" required>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="my-2">
                        <input type="submit" name="add" id="add" class="btn "></input>
                    </div>
                </div>
        </div>
    </div>



    </form>
    </div>


    </div>
    </div>
</body>

</html>