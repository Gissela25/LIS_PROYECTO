<?php
require_once('./Core/config.php'); 
require_once('./Views/server_uri.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=PATH?>Assets/css/detail-st.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
<?php 
 require_once "./Views/menu.php";
?>
    <div class="container">
        <?php foreach($productos as $producto)
                                $img=$producto['Imagen'];
                                $path="img/".$img;
                                if(file_exists($path))
                        {
                            $cantidad='Cantidad_'.$sucursal;
                            $precio='Precio_'.$sucursal;
                            ?>
        <div class="row justify  mt-4 mr-1">
            <div class="col-md-6">



                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <?php echo "<img src='".PATH."img/$img'  class='rounded float-start col-md-10'>"?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <form method="POST" action="<?=PATH?>Productos/Comprar/<?=$sucursal?>/<?=$producto['ID_Producto']?>" role="form">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <h1 class=""><?=$producto['Nombrep']?></h1>
                        </div>
                    </div>
                    <h3 class="text-primary mx-3">$<?=$producto[$precio]?></h3>
                    <p class="card-text text-justify">CODIGO: <?=$producto['ID_Producto']?> / FAMILIA: <?=$producto['Nombre_Familia']?></p>
                    <div class="form-group row ">

                        <div class="col-md-2 my-3 "> <input type="number" name="Cantidad" id="Cantidad" class="number">
                        </div>
                        <input type="hidden" name="Precio" id="Precio" value="<?=$producto[$precio]?>">
                            <input type="hidden" name="Existencias" id="Existencias" value="<?=$producto[$cantidad]?>">
                            <?php
                            if(isset($_SESSION['login_buffer']['Acceso']))
                            {
                                if($_SESSION['login_buffer']['Acceso']==2)
                                {
                            ?>
                        <button type="submit" id="Comprar" name="Comprar" class="col-md-8 btn btn-primary btn-block boton"></i>Agregar al Carrito</button>
                            <?php }
                            elseif(isset($_SESSION['login_buffer'])&&$_SESSION['login_buffer']['Acceso']==4)
                            {                          
                            ?>
                        <button type="submit" id="Iniciar" name="Iniciar" class="col-md-8 btn btn-primary btn-block boton"></i>Agregar al Carrito</button>
                            <?php
                            }
                        }
                            ?>
                    </div>

                </form>

                <div class="row">
                    <div class="card">
                        <h5 class="card-header">Información</h5>
                        <div class="card-body">
                            <?php
                                    if(($producto[$cantidad])>0)
                                    {
                                        ?>
                            <h5 class="card-text ">Disponibilidad: <span class="text-success"> <?=$producto[$cantidad]?> en existencia</span></h5>
                            <?php
                                    }
                                    else{
                                        ?>
                            <p class="card-text ">Disponibilidad: <span class="text-danger"> Fuera de stock</span></p>
                            <?php
                                    }
                                    ?>
                            <h6 class="card-text text-justify">Descripcion: <?=$producto['Descripcion']?></h6>
                        </div>

                    </div>
                </div>
                <div class="row my-2">
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
                </div>
            </div>



        </div>
        <?php
                        }
                
            ?>
    </div>
    <?php
    require_once './Views/footer.php';
    ?>

</body>

</html>