<?php
require_once('Core/config.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferreteria Sumersa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="<?=PATH?>Assets/css/empresa.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
<?php 
 require_once "Views/menu.php";
?>
        <div>
        <div class="d-grid gap-1 mt-1 mx-1">

            <div class="col-xs-6 col-xs-offset-3 tamano">
                <div class="fondo">
                    <div class="fondo2">
                     </div> 
                </div>
            </div>
        </div>
            <br>
        <div class="d-grid gap-1 mt-5 mx-5">
            <div class="row" style="text-align:center">
            <div class="col-lg-1 col-lg-offset-3 tamano">
                </div>
                <div class="col-lg-6 col-lg-offset-3 tamano">
                <div>   
                <br>
                <h1>QUIENES SOMOS</h1>
                <br>
                 <p>Sumersa es una empresa importadora y comercializadora de materiales para la construcción,
                     destacándose en la distribución de productos de hierro tales como láminas, ángulos, polines, vigas y canales entre otros.</p>

                 <p>Además ofertamos una gran variedad de productos de ferretería y diversos materiales para la construcción de techos y
                     cielos falsos entre los que contamos con lámina Standard de Asbesto Cemento y Amanco Súper Eureka.</p>

                <p>Nuestra empresa cuenta con más de 30 años de experiencia durante los cuales hemos mantenido como política de servicio
                     el valorar a nuestros clientes a partir de un servicio eficaz y personalizado con productos de alta calidad y economía</p>
                     <br><br><br>                   
                </div>
                </div>
                <div class="col-lg-1 col-lg-offset-3 tamano">
                </div>
                <div class="col-lg-3 col-lg-offset-3 tamano">
                <div>
                <img src="<?=PATH?>Assets/img/empresa.png" width = "310px" height = "440px">
                <br>
                <br><br><br>
                </div>
                </div>
                </div>
               
            </div>
        </div>
</body>
</html>