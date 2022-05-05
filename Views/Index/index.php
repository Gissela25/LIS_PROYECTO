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
    <link rel="stylesheet" href="<?=PATH?>Assets/css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
    <?php 
 require_once "Views/menu.php";
?>
    <div>
        <div class="d-grid gap-3 mt-3 mx-5">
        
                            <?php
                                if(isset($_SESSION['login_buffer'])){
                                    if($_SESSION['login_buffer']['Acceso']==2){
                                ?>
                                <div class="titl">
                            <h2 class="display-3 carta">Hola <?=$_SESSION['login_buffer']['Nombre'];?>, bienvenid@
                               
                            </h2>
                            </div>
                            <?php
                                    }
                                }
                            ?>


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
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="Assets/img/fontaneria.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="Assets/img/electrico.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="Assets/img/contruccion.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="Assets/img/pintura.jpg" class="d-block w-100" alt="...">
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
            <div class="row" style="text-align:center">
                <div class="col-md-4">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d424.3146555618816!2d-89.17801794990542!3d13.70756091405031!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f6330b701cd3779%3A0x947ab584b0a2c3ef!2sFerreteria%20SUMERSA%2C%20San%20Salvador!5e1!3m2!1ses-419!2ssv!4v1647737427070!5m2!1ses-419!2ssv"
                        width="385" height="235" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <div style="font-family:Anton; font-size:260%; color: rgb(40, 68, 116);"><b>San Salvador</b></div>
                    <span style="font-family:Open Sans; font-size:120%;">Teléfono: (503) 2286 - 4000</span>
                    <p style="font-family:Open Sans;font-size:120%;">Email: elmer.calderon@sumersa.com.sv</p>
                    <a href="https://web.whatsapp.com/send?phone=50370391256&text=" target="_blank">
                        <img src="Assets/img/whatsapp.svg" height="50px" width="50px">
                    </a>
                </div>
                <div class="col-md-4">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d777.0474469332613!2d-89.29564760341782!3d13.673871466142495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2ccce09c136cd1f9!2sSumersa!5e1!3m2!1ses-419!2ssv!4v1647737564160!5m2!1ses-419!2ssv"
                        width="385" height="235" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <div style="font-family:Anton; font-size:260%; color: rgb(40, 68, 116);"><b>Santa Tecla</b></div>
                    <span style="font-family:Open Sans; font-size:120%;">Teléfono: (503) 2250 - 7200</span>
                    <p style="font-family:Open Sans; font-size:120%;"> PBX: (503) 2250 - 7200 / (503) 2228 - 4444</p>
                    <a href="https://web.whatsapp.com/send?phone=50370391262&text=" target="_blank">
                        <img src="Assets/img/whatsapp.svg" height="50px" width="50px">
                    </a>
                </div>
                <div class="col-md-4">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d457.61147098487874!2d-89.28759146977266!3d13.587609227829821!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f632cff74f21bc5%3A0xd0c610f73005c09b!2sFerreter%C3%ADa%20Sumersa!5e1!3m2!1ses-419!2ssv!4v1647737657375!5m2!1ses-419!2ssv"
                        width="385" height="235" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <div style="font-family:Anton; font-size:260%; color: rgb(40, 68, 116);"><b>Zaragoza</b></div>
                    <p style="font-family:Open Sans; font-size:120%;">Teléfono: (503) 2314 - 1100</p>
                    <br>
                    <a href="https://web.whatsapp.com/send?phone=50370391247&text=" target="_blank">
                        <img src="Assets/img/whatsapp.svg" height="50px" width="50px">
                    </a>
                </div>
                <div class="col-md-4">
                    <br>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d941.9268234464838!2d-89.36914424637418!3d13.723702771350661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f632879951751cd%3A0x1cf5a484bc942856!2sSUMERSA!5e1!3m2!1ses-419!2ssv!4v1647738719523!5m2!1ses-419!2ssv"
                        width="385" height="235" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <div style="font-family:Anton; font-size:260%; color: rgb(40, 68, 116);"><b>Lourdes Colón</b></div>
                    <span style="font-family:Open Sans; font-size:120%;">Teléfono: (503) 2338 - 4821</span>
                    <p style="font-family:Open Sans; font-size:120%;"> Fax: (503) 2338 - 6843</p>
                    <a href="https://web.whatsapp.com/send?phone=50370391253&text=" target="_blank">
                        <img src="Assets/img/whatsapp.svg" height="50px" width="50px">
                    </a>
                </div>
                <div class="col-md-4">
                    <br>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1342.98830731772!2d-89.36870840515611!3d13.782475524235661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f632705ae79df2d%3A0xed3db52b72bc1f0c!2sFerreteria%20Sumersa!5e1!3m2!1ses-419!2ssv!4v1647738866410!5m2!1ses-419!2ssv"
                        width="385" height="235" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <div style="font-family:Anton; font-size:260%; color: rgb(40, 68, 116);"><b>Desvío a Opico</b></div>
                    <span style="font-family:Open Sans; font-size:120%;">Teléfono: (503) 2319 - 3564</span>
                    <p style="font-family:Open Sans; font-size:120%;"> Fax: (503) 2319 - 3563</p>
                    <a href="https://web.whatsapp.com/send?phone=50370391254&text=" target="_blank">
                        <img src="Assets/img/whatsapp.svg" height="50px" width="50px">
                    </a>
                </div>
                <div class="col-md-4">
                    <br>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d945.8393216921178!2d-89.57566721445782!3d13.982003549261588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f62e8e9b6bc14e3%3A0xf9267fd28da0b711!2sSumersa!5e1!3m2!1ses-419!2ssv!4v1647739030547!5m2!1ses-419!2ssv"
                        width="385" height="235" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <div style="font-family:Anton; font-size:260%; color: rgb(40, 68, 116);"><b>Santa Ana</b></div>
                    <p style="font-family:Open Sans; font-size:120%;">Teléfono: (503) 2440 - 5555 / (503) 2440 - 5048
                    </p>
                    <br>
                    <a href="https://web.whatsapp.com/send?phone=50370392286&text=" target="_blank">
                        <img src="Assets/img/whatsapp.svg" height="50px" width="50px">
                    </a>
                </div>
            </div>
        </div>
        <?php
        include_once './Views/footer.php';
        ?>
</body>

</html>