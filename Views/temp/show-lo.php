<?php  require_once "Views/Constant/temp/const.php";?>
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
    <link rel="stylesheet" href="Assets/css/showc.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
<?php 
 require_once "Views/Constant/temp/nav.php";
?>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 my-3">
            <?php
                   
                    foreach ($this->modelo->showloall() as $r)
                     {
                        $path="img/".$r->Imagen;
                        if(file_exists($path))
                        {
                            ?>
            <div class="col" id="id_<?=$r->ID_Producto?>">
                <div class="card shadow-sm">
                    <?php echo "<img src='img/$r->Imagen' width='300px' height='250px' class='card-img-top'>"?>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?=$r->Nombrep?>
                        </h5>
                        <p class="card-text">Precio <?=$r->Precio_LO?> $</p>
                        <?php
                                    if(($r->Cantidad_LO)>0)
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
                        <a href="?c=products&a=Dlo&id=<?=$r->ID_Producto?>" class="btn btn-primary btn-block boton">Ver
                            más</a>
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

</body>

</html>