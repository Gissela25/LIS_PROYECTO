<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Login</title>
    <link rel="stylesheet" href="Assets/css/Login.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5 mr-1">
            <div class="col-md-4 formulario">
                <form action="?c=user&a=Ingresar" method="POST" role="form">
                    <div class="form-group text-center">
                        <h1 class="text-light">Iniciar Sesión</h1>
                    </div>
                    <?php require 'Tools/procesar-datos-log.php';?>
                    <?php
                     if(count($errores_log)>0&&isset($_POST['ingresar']))
                     {
                         echo "<ul>";
                         foreach($errores_log as $error)
                         {
                           echo "<li>$error</li>";
                         }
                         echo "</ul>";
 
                     }
                    ?>
                    <div class="form-group mx-sm-4 pt-3">
                        <input type="text" class="form-control" placeholder="Ingrese su Correo Electronico" name="i_email"
                            id="i_email">
                    </div>
                    <div class="form-group mx-sm-4 pb-3">
                        <input type="password" class="form-control" placeholder="Ingrese su Contraseña" name="i_pass"
                            id="i_pass">
                    </div>
                    <div class="form-group mx-sm-4 pb-2">
                        <input type="submit" value="Ingresar" name="ingresar" id="ingresar"
                            class="btn btn-block ingresar">
                    </div>
                    <div class="form-group mx-sm-4 text-right olv">
                        <span class=""><a href="?c=user&a=Recover" class="olvide">Olvide mi
                                contraseña?</a></span> &nbsp;&nbsp;&nbsp;&nbsp;
                                <span class=""><a href="?c=user&a=Activar" class="olvide">Activar Cuenta</a></span>
                    </div>
                    <div class="form-group text-center">
                        <span class=""><a href=""
                                class="olvide1">Registrarse</a></span>
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