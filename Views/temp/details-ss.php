<?php
    $codigo_prod=$_GET["id"];
    require_once "Views/Constant/temp/const.php";
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
    <link rel="stylesheet" href="Assets/css/detail-st.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
<?php 
 require_once "Views/Constant/temp/nav.php";
?>
    <div class="container">
        <?php foreach($this->modelo->showssall() as $row)
                        if($row->ID_Producto==$codigo_prod)
                        {
                                $path="img/".$row->Imagen;
                                if(file_exists($path))
                        {
                            ?>
        <div class="row justify  mt-4 mr-1">
            <div class="col-md-6">



                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <?php echo "<img src='img/$row->Imagen'  class='rounded float-start col-md-10'>"?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <form method="POST" action="?c=productos&a=detailsst&cod=<?=$codigo_prod?>">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <h1 class=""><?=$row->Nombrep?></h1>



                        </div>
                    </div>
                    <h3 class="text-primary mx-3">$<?=$row->Precio_SS?></h3>
                    <p class="card-text text-justify">CODIGO: <?=$row->ID_Producto?> / FAMILIA: <?=$row->Nombre?></p>
                    <div class="form-group row ">
                        <div class="col-md-2 my-3 "> <input type="number" name="cantidad"  id="cantidad" class="number">
                        </div>
                        <!-- <div class="col-md-6"> <input type="submit" value="Agregar al carrito" name="adquirir"
                                id="adquirir" class="btn btn-primary btn-block"></div> -->
                        <a href="" class="col-md-8 btn btn-primary btn-block boton"></i>Agregar al Carrito</a>
                    </div>

                </form>

                <div class="row">
                    <div class="card">
                        <h5 class="card-header">Información</h5>
                        <div class="card-body">
                            <?php
                                    if(($row->Cantidad_SS)>0)
                                    {
                                        ?>
                            <h5 class="card-text ">Disponibilidad: <span class="text-success"> En existencia</span></h5>
                            <?php
                                    }
                                    else{
                                        ?>
                            <p class="card-text ">Disponibilidad: <span class="text-danger"> Fuera de stock</span></p>
                            <?php
                                    }
                                    ?>
                            <h6 class="card-text text-justify">Descripcion: <?=$row->Descripcion?></h6>
                        </div>

                    </div>
                </div>
            </div>



        </div>
        <?php
                        }
                }
            ?>
    </div>
</body>

</html>