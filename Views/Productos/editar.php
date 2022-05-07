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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="<?=PATH?>Assets/css/update-products.css">
</head>

<body>
    <?php
    require_once "./Views/menu.php";
    ?>
    <div class="d-flex justify-content-center">
        <div class="col-md-4 my-5">
            <?php
            foreach($productos as $producto)
            {
            ?>

            <form method="POST" action="<?=PATH?>Productos/Editando/<?=$producto['ID_Producto']?>" enctype="multipart/form-data"
                class="formulario">
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
                <div class="card-body">
                    <?php 
                            $img = $producto['Imagen'];
                                $path="img/".$img;
                                if(file_exists($path))
                        {
                            ?>
                    <?php echo "<img src='".PATH."img/$img' width='300px' height='300px' class='card-img-top'>"?>
                    <div class="card-body">
                        <div class="card-title">
                            <div class="form-group text-center">
                                <h1 class="text-black py-1 text-warning"><?=$producto['Nombrep']?></h1>
                            </div>
                        </div>
                        <div class="mb-3" style="color:#084594">
                            <label class="control-label" for="ID_Producto">Codigo:</label>
                            <input type="text" class="form-control" readonly value="<?=$producto['ID_Producto']?>" 
                                name="ID_Producto" id="ID_Producto">
                        </div>
                        <div class="mb-3" style="color:#084594">
                            <label class="control-label" for="Nombrep">Nombre:</label>
                            <input type="text" class="form-control" name="Nombrep" id="Nombrep" value="<?=$producto['Nombrep']?>"
                                >
                        </div>

                        <div class="mb-3" style="color:#084594">
                            <label class="control-label" for="Descripcion">Descripcion:</label>
                            <input type="text" class="form-control" name="Descripcion" id="Descripcion"
                                value="<?=$producto['Descripcion']?>">
                        </div>
                        <div class="mb-3" style="color:#084594">
                            <label class="control-label" for="nimg_p">Nueva Img(opcional):</label>
                            <input type="file" class="form-control" name="Imagen" id="Imagen">
                        </div>
                        <label for="exampleInputPassword1" class="form-label" style="color:#084594">Sucursal</label>
                        <div class="form-floating">
                            <select class="form-select" name="ID_Familia" id="ID_Familia"
                                aria-label="Floating label select example">
                                <?php
							foreach($familias as $familia)
							{
							?>


                                <?php if($producto['Nombre_Familia']==$familia['Nombre_Familia'])
							{

								?>
                                <option selected value="<?=$familia['ID_Familia']?>"><?=$familia['Nombre_Familia']?></option>
                                <?php
							} 
							else
							{
								?>
                                
                                <option value="<?=$familia['ID_Familia']?>"><?=$familia['Nombre_Familia']?></option>
                                <?php
							}
							?>
                                <?php
                            }
						
                        ?>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="my-2">
                        <input type="submit" name="Guardar" id="Guardar" class="btn "></input>
                    </div>
                </div>

        </div>


        <?php
                        }
                
            ?>

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