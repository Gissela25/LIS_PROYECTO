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
    <title>Mostrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="<?=PATH?>Assets/css/showc.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
    <?php 
 require_once "./Views/menu.php";
?>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 my-3">
            <?php
                      //Definiendo si el buscador ha sido usado
            $sear='';
            if(isset($_POST['look']))
            {
                $sea=$_POST['look'];
                $sear=strtoupper($sea);
            }
            $word='';
            $all=true;
            //Definir si deben mostrar todos los productos
            if ($sear != '') {
                $all=false;
                echo "<div class='col-12'><h5>Resultados para: " . $sear . "</h5><h6>Para eliminar la selección vuelva a la barra de búsqueda y de enter, sin ingresar texto</h6></div><br>";
            }
                    foreach ($productos as $producto)
                     {
                        if(isset($sear) && !empty($sear))
                        {
                            foreach ($producto as $rd) {
                                //Reconoce un string que contenga la palabra
                                if (strpos($rd, $sear) !== false && !(strpos($rd, 'PROD') !== false)) {
                                    $word = $rd;
                                    break;
                                }
                            }
                        }

                        if(($producto['Nombrep'] == $word) | ($all==true))
                        {
                        $img=$producto['Imagen'];
                        $path="img/".$img;
                        if(file_exists($path))
                        {
                            $cantidad='Cantidad_'.$sucursal;
                            $precio='Precio_'.$sucursal;
                            ?>
            <div class="col" id="id_<?=$producto['ID_Producto']?>">
                <div class="card shadow-sm">
                    <?php echo "<img src='".PATH."img/$img' width='300px' height='250px' class='card-img-top'>"?>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?=$producto['Nombrep']?>
                        </h5>
                        <p class="card-text">Precio <?=$producto[$precio]?> $</p>
                        <?php
                                    if(($producto[$cantidad])>0)
                                    {
                                        ?>
                        <p class="card-text ">Disponibilidad: <span style="color: green;"> en existencia</span></p>
                        <?php
                                    }
                                    else{
                                        ?>
                        <p class="card-text ">Disponibilidad: <span class="text-danger"> Fuera de stock</span></p>
                        <?php
                                    }
                                    ?>
                        <a href="<?=PATH?>Productos/Detalles/<?=$sucursal?>/<?=$producto['ID_Producto']?>"
                            class="btn btn-primary btn-block boton">Ver
                            más</a>
                    </div>
                </div>
            </div>

            <?php
                        }
                             
                    }
                }
                    ?>

        </div>
    </div>
    </div>
    <?php
    include_once './Views/footer.php';
    ?>

</body>

</html>