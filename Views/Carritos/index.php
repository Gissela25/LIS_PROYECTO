<?php
require_once('./Core/config.php'); 
foreach($pcs as $pc){}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="<?=PATH?>Assets/css/carritos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        .operacion
        {
            background-color: #214673;
            border: #214673;
        }
    </style>
</head>
<body>
    <?php
    require_once "./Views/menu.php";
    ?>
<div class="container">
    <?php
    /*
    if(count($carritos)>0){
    ?>
        <div class="row">
            <div class="col-md-4 my-4">
            <form action="<?=PATH?>Carritos/Accion" method="post" role="form">
            <?php
            foreach($productos as $articulo){

                $cantidad_campo_all = "Precio_".$articulo['siglas_sucursal'];
                $cantidad_all=$pc[$cantidad_campo_all];
                $total_all=$articulo['precio']*$articulo['cantidad'];
            ?>
                            <input type="hidden" name="Existencias" id="Existencias" value="<?=$cantidad_all?>" >
                            <input type="hidden" name="N_Existencias" id="N_Existencias" value="<?=$cantidad_campo_all?>" >
                            <input type="hidden" name="Correlativo" id="Correlativo" value="<?=$articulo['correlativo']?>">
                            <input type="hidden" name="Total" id="Total" value="<?=$total_all?>">
                            <input type="hidden" name="ID_Sucursal" id="ID_Sucursal" value="<?=$articulo['siglas_sucursal']?>">
                            <input type="hidden" name="ID_Producto" id="ID_Producto" value="<?=$articulo['ID_Producto']?>">
                            <input type="hidden" name="Cantidad" id="Cantidad" value="<?=$articulo['cantidad']?>">
            <?php
            }
            ?>
            <button type="submit" class="btn btn-success btn-block boton" id="cancelar_todo" name="cancelar_todo" style="border: #214673;">Pagar todo</button>
            </form>   
            </div>
        </div>
        
        <?php

    }
       */ ?>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 my-3">

            <?php
                   
                    foreach ($productos as $producto)
                     {
                        $img=$producto['Imagen'];
                        $path="img/".$img;
                        if(file_exists($path))
                        {
                            $total=$producto['precio']*$producto['cantidad'];
                            ?>
            <div class="col" id="id_<?=$producto['ID_Producto']?>">
                <div class="card shadow-sm">
                    <?php echo "<img src='".PATH."img/$img' width='300px' height='250px' class='card-img-top'>"?>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?=$producto['Nombrep']?>
                        </h5>
                        <p class="card-text">Precio/Unidad: <?=$producto['precio']?>$<br> Total: <?=$producto['precio']*$producto['cantidad']?> $ </p>
                        <p class="card-text ">Estado: <span style="color: green;"> Pendiente</span></p>
                        <form action="<?=PATH?>Carritos/Accion" method="post">
                        <center>
                            <?php
                            $var = "Cantidad_".$producto['siglas_sucursal'];
                            // $cantidad=$pc[$cantidad_campo];
                            foreach($pcs as $pc){
                                if($producto['codigo_producto']==$pc['ID_Producto'])
                                {
                                    $quantity = $pc[$var];
                                }
                            }
                            ?>
                            <input type="hidden" name="Existencias" id="Existencias" value="<?=$quantity?>">
                            <input type="hidden" name="Cantidad_Actual" id="Cantidad_Actual" value="<?=$var?>" >
                            <input type="hidden" name="Correlativo" id="Correlativo" value="<?=$producto['correlativo']?>">
                            <input type="hidden" name="Total" id="Total" value="<?=$total?>">
                            <input type="hidden" name="ID_Sucursal" id="ID_Sucursal" value="<?=$producto['siglas_sucursal']?>">
                            <input type="hidden" name="ID_Producto" id="ID_Producto" value="<?=$producto['ID_Producto']?>">
                            <input type="hidden" name="Cantidad" id="Cantidad" value="<?=$producto['cantidad']?>">
                        <button  type="submit" id="Pagar" name="Pagar" class="btn btn-success btn-block operacion ">Pagar</button>
                        <a href="<?=PATH?>Carritos/Editar/<?=$producto['siglas_sucursal']?>/<?=$producto['ID_Producto']?>" class="btn btn-primary btn-block operacion">Editar</a>
                        <button  type="submit" id="Cancelar" name="Cancelar" class="btn btn-danger btn-block operacion">Cancelar</button>
                        </center>
                        </form>

                    </div>
                </div>
            </div>

            <?php
                        }
                             
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