<?php
require_once('./Core/config.php');
$url = explode("/", $_SERVER['REQUEST_URI']);
$Correo = $url[4];
$Hash_Active = $url[5];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Recuperar Cuenta</title>
    <link rel="stylesheet" href="<?=PATH?>Assets/css/comprobante.css">
</head>

<body>
<div class="d-flex justify-content-center">
        <div class="col-md-6 my-5">
        <img src="<?=PATH?>Assets/img/logo.PNG" class="rounded mx-auto d-block mb-3" alt="..." height="85px"
                    width="230px">   
                <form action="<?=PATH?>Usuarios/Comprobando/<?=$Correo?>/<?=$Hash_Active?>" class="formulario" method="POST" role="form"> 
                    <div class="form-group text-center">
                    </div>
                    <br>        
                    <div class="form-group text-center" >
                        <input type="submit" value="Iniciar Sesión" class="boton" id="Iniciar" name="Iniciar">
                    </div>

                    <div class="form-group text-center">
                        <a href="?c=inicio" class="edit"><i class="bi bi-reply-fill"></i>Regresar</a>
                    </div>
                </form>
            </div> 
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

</html>