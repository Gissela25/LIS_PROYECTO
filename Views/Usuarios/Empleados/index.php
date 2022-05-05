<?php
require_once('./Core/config.php'); 
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
<link rel="stylesheet" href="<?=PATH?>Assets/css/home.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
    <?php 
    require_once "./Views/menu.php";
    ?>
    <div>
        <div class="d-grid gap-3 mt-3 mx-5">

            <div class="col-xs-6 col-xs-offset-3 tamano">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>
                    </div>
                    <div class="container">
                        <div class="titl">
                        <?php
                                if(isset($_SESSION['login_buffer'])){
                                ?>
                            <h2 class="display-4">Hola <?=$_SESSION['login_buffer']['Nombre'];?>, bienvenid@ a la sucursal de
                                
                                    <?=$_SESSION['login_buffer']['Nombre_Sucursal'];?>
                               
                            </h2>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <br>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?=PATH?>Assets/img/mesa.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?=PATH?>Assets/img/tenasa.webp" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?=PATH?>Assets/img/cemento.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?=PATH?>Assets/img/gris.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <br>
</div>
<div class="container">
    <div class="title">
        <h1 class="display-4 carta">PRODUCTOS</h1>
    </div>
    <div class="titl">
        <h4 class="display-6 carta">CONSTRUCCIÓN</h4>
    </div>
    <br>
    <div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">HIERROS REDONDOS, CUADRADO Y ENTORCHADO CORRUGADOS, LISOS</li>
            <li class="list-group-item">TUBERÍA INDUSTRIAL Y ESTRUCTURAL</li>
            <li class="list-group-item">TELA METÁLICA CICLON</li>
        </ul>
    </div>
    <div>
        <div class="row justify-content-md-center">
            <div class="col-md-auto carta">
                <img src="<?=PATH?>Assets/img/contruccion.jpg" height="200px">
            </div>
            <div class="col-md-auto carta">
                <img src="<?=PATH?>Assets/img/cemento.png" height="200px">
            </div>
        </div>
    </div>
    <br>
    <div class="titl">
        <h4 class="display-6 carta">FERRETERÍA</h4>
    </div>
    <div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">TORNILLOS, PERNOS Y OTROS (ANCLAS, TUERCAS, ARANDELAS, TRAMOS, CAPUCH)</li>
            <li class="list-group-item">HERRAJES (BISAGRA, PASADOR,CHAPAS, CANDADOS)</li>
            <li class="list-group-item">DESTORNILLADORES,LLAVES, CUBOS, ETC</li>
        </ul>
    </div>
    <br>
    <div>
        <div class="row justify-content-md-center">
            <div class="col-md-auto carta">
                <img src="<?=PATH?>Assets/img/tornillos.jpg" height="200px">
            </div>
            <div class="col-md-auto carta">
                <img src="<?=PATH?>Assets/img/sogas.jpg" height="200px">
            </div>
        </div>
    </div>
    <br>
    <div class="titl">
        <h4 class="display-6 carta ">PINTURA</h4>
    </div>
    <div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">PINTURAS ACEITE</li>
            <li class="list-group-item">SPRAY</li>
            <li class="list-group-item">SHERWIN WILLIAMS</li>
        </ul>
    </div>
    <br>
    <div>
        <div class="row justify-content-md-center">
            <div class="col-md-auto carta">
                <img src="<?=PATH?>Assets/img/pintura.jpg" height="200px">
            </div>
            <div class="col-md-auto carta">
                <img src="<?=PATH?>Assets/img/brochas.jpg" height="200px">
            </div>
        </div>
    </div>
</div>
</body>
<?php 
    require_once "./Views/footer.php";
    ?>
</html>