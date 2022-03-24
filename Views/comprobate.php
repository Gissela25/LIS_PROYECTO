<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Recuperar Cuenta</title>
    <link rel="stylesheet" href="Assets/css/comprobantee.css">
</head>

<body>
<div class="d-flex justify-content-center">
        <div class="col-md-4 my-5">
        <img src="Assets/img/logo.PNG" class="rounded mx-auto d-block mb-3" alt="..." height="85px"
                    width="230px">   
        <!-- <div class="col-md-5 formulario"> -->
                <form action="?c=user&a=Activar" class="formulario" method="POST" role="form"> 
                    <div class="form-group text-center">
                        <?php require_once 'Tools/procesar-datos-comprobate.php'; 
                        ?>
                    </div>
                    <br>        
                    <div class="form-group text-center" >
                        <a  value="Iniciar Sesión" name="iniciar" id="iniciar" href="http://localhost/LIS_PROYECTO/?c=user&a=Ingresar" class="boton"> Iniciar Sesión </a>
                    </div>

                    <div class="form-group text-center" >
                        <span type="submit" ><a href="http://localhost/LIS_PROYECTO/" class="boton">Regresar</a></span>
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