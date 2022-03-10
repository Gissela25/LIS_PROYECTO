<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Recuperar Cuenta</title>
    <link rel="stylesheet" href="Assets/css/account.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5 mr-1">
            <div class="col-md-5 formulario">
                <form action="?c=user&a=Recover" method="POST" role="form"> 
                    <div class="form-group text-center">
                        <h1 class="text-light">Recuperar Contraseña</h1>
                    </div>        
                    <?php require 'Tools/procesar-datos-recover.php'?>
                    <?php
                    if(count($errores_rec)>0&&isset($_POST['confirmar']))
                    {
                        echo "<ul>";
                        foreach($errores_rec as $error)
                        {
                          echo "<li>$error</li>";
                        }
                        echo "</ul>";

                    }
                    ?>
                    <div class="form-group mx-sm-4 pb-3">
                        <input type="text" class="form-control"  placeholder="Ingrese su Email" name="correo" id="correo">
                    </div>
                    <div class="form-group mx-sm-4 pb-2">
                        <input type="submit" value="Confirmar" name="confirmar" id="confirmar" class="btn btn-block ingresar">
                    </div>
                    <div class="form-group text-center">
                        <span class=""><a href="?c=user&a=Ingresar" class="olvide1">Regresar</a></span>
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