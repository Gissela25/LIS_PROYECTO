<?php
include_once './Core/config.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Login</title>
    <link rel="stylesheet" href="<?=PATH?>Assets/css/loginn.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="seccion1">

        </div>
        <div class="row justify-content-center pt-5 mt-5 mr-1">
            <div class="col-md-4 ">
                <img src="<?=PATH?>Assets/img/logo.PNG" class="rounded mx-auto d-block mb-3" alt="..." height="65px"
                    width="200px">
                <form class="formulario" action="<?=PATH?>Usuarios/Validate" method="POST" role="form">
               
                    <div class="form-group text-center">
                        <h3 class="text-" style="color:#084594">Iniciar Sesion</h3>
                    </div>
                    <?php
                   if(isset($errores))
                   {
                       if(count($errores)>0)
                       {
                        echo "<div class='alert alert-danger' style='color:#343a40' ><ul>";
                           foreach ($errores as $error) {
                               echo "<li style='color:#343a40'>$error</li>";
                           }
                           echo "</ul></div>";
                       }
                   }
                   ?>
                    <div class="form-group mx-sm-4 pt-3">
                        <input type="text" class="form-control" placeholder="Ingrese su Correo Electronico"
                            name="Correo" id="Correo">
                    </div>

                    <div class="form-group mx-sm-4 pb-6">
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="Ingrese su Contraseña" name="Clave"
                            id="Clave">
                            <div class="input-group-append">
                    <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                    </div>
                    </div>
                    </div>

                    <div class="form-group mx-sm-3 text-center olv">
                            <span class=""><a href="<?=PATH?>Usuarios/Recuperar" class="olvide">¿Olvide mi
                                    contraseña?</a></span>
                    </div>

                    <div class="form-group mx-sm-5 pb-3">
                        <input type="submit" value="Ingresar" name="Ingresar" id="Ingresar"
                            class="btn btn-block ingresar">
                            <?php 
                            if(!isset($_SESSION['login_buffer'])||$_SESSION['login_buffer']['Acceso']!=4)
                            {
                            require_once('authentify.php'); ?>
                        <a class="google my-2 btn btn-block" href="<?php echo $client->createAuthUrl() ?>" id="lwg" name="lwg"><i class="bi bi-google"> </i>Log in with Google </a>
                    <?php
                            }
                    ?>
                    </div>




            <div class="form-group mx-sm-4 my-1 text-center olv">
                <span class=""><a href="<?=PATH?>Usuarios/Activar" class="olvide"><i class="bi bi-key-fill"></i>Activar
                        Cuenta</a></span>
            </div>
            <div class="form-group mx-sm-4 text-center olv">
                <div class="form-group text-center">
                    <span><a href="<?=PATH?>Clientes/Singin" class="olvide sing-up"><i class="bi bi-book-half"></i>Registrar</a></span>
                </div>
            </div>
            <div class="form-group text-center">
            <?php 
                            if(!isset($_SESSION['login_buffer'])||$_SESSION['login_buffer']['Acceso']!=4)
                            { ?>
                        <a href="<?=PATH?>" class="edit"><i class="bi bi-reply-fill"></i>Regresar</a>
                        <?php }elseif(isset($_SESSION['login_buffer'])&&$_SESSION['login_buffer']['Acceso']==4)
                        {
                        ?>
                        <a href="<?=PATH?>Usuarios/Main" class="edit"><i class="bi bi-reply-fill"></i>Regresar</a>
                        <?php
                        }
                        ?>
            </div>
            </form>
        </div>
    </div>


    <script type="text/javascript">
    function mostrarPassword(){
		var cambio = document.getElementById("i_pass");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

</html>