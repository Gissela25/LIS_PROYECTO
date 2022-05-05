<?php
require_once('./Core/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucursales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?=PATH?>Assets/css/worker-edi.css">
</head>
<body>
<?php
    require_once "./Views/menu.php";
    ?>
    <div class="d-flex justify-content-center">
        <div class="col-md-4 my-5">
        <img src="<?=PATH?>Assets/img/logo.PNG" class="rounded mx-auto d-block mb-3" alt="..." height="85px"
                    width="230px">
                    <?php
                foreach($usuarios as $usuario)
                {
                ?>
                    <form class="formulario" method="POST" action="<?=PATH?>Usuarios/Modificando">
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
              <legend style="color:#084594" class="text-center">Editar Empleado</legend>    
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Editar Nombre</label>
                    <input type="name" class="form-control" name="Nombre" id="Nombre" value="<?=$usuario['Nombre']?>" >
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Editar Apellido</label>
                    <input type="name" class="form-control" name="Apellido" id="Apellido" value="<?=$usuario['Apellido']?>" >
                </div>

                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Editar Correo</label>
                    <input type="name" class="form-control" name="Correo" id="Correo" value="<?=$usuario['Correo']?>" >
                </div>

                <div class="mb-3"  style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Clave</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="Clave" id="Clave">
                    <div class="input-group-append">
                    <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()">
                     <span class="fa fa-eye-slash icon"></span> </button>
                    </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="my-2">
                            <input type="submit" class="btn" id="Guardar" name="Guardar"></input> 
                            </div>
                </div>
              </form>
              <?php
                }
              ?>
        </div>
    </div>
</body>
<script type="text/javascript">
            function mostrarPassword(){
		    var cambio = document.getElementById("Clave");
		    if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		    }else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		    }
	        } 
</script>
</html>