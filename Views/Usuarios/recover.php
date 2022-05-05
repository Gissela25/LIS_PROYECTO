<?php 
require_once('./Core/config.php');?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Recuperar Cuenta</title>
    <link rel="stylesheet" href="<?=PATH?>Assets/css/recoverr.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5 mr-1">
            <div class="col-md-5 ">
            <img src="<?=PATH?>Assets/img/logo.PNG" class="rounded mx-auto d-block mb-3" alt="..." height="65px" width="200px">
                <form class="formulario" action="<?=PATH?>Usuarios/Recuperando" method="POST" role="form"> 
                
                    <div class="form-group text-center">
                    <h3 class="text-" style="color:#084594">Recuperar Contraseña</h3>
                    </div>      
                    
                    <?php
                   if(isset($errores))
                   {
                       if(count($errores)>0)
                       {
                        echo "<div style='color:#343a40' ><ul>";
                           foreach ($errores as $error) {
                               echo "<li style='color:#343a40'>$error</li>";
                           }
                           echo "</ul></div>";
                       }
                   }
                   ?>  
                    <div class="form-group mx-sm-4 pb-3">
                        <input type="text" class="form-control"  placeholder="Ingrese su Email" name="Correo" id="Correo">
                    </div>
                    <div class="form-group mx-sm-4 pb-2">
                        <input type="submit" value="Confirmar" name="Confirmar" id="Confirmar" class="btn btn-block ingresar">
                    </div>
                    <div class="form-group text-center">
                        <a href="<?=PATH?>Usuarios/Login" class="edit"><i class="bi bi-reply-fill"></i>Regresar</a>
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