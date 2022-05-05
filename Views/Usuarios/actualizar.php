<?php
require_once('./Core/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="<?=PATH?>Assets/css/worker-insert.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <?php
    require_once "./Views/menu.php";
    ?>
    <div class="d-flex justify-content-center">
        <div class="col-md-4 my-5">
            <img src="<?=PATH?>Assets/img/logo.PNG" class="rounded mx-auto d-block mb-3" alt="..." height="65px" width="200px">
            <?php
            foreach($empleados as $empleado){
            ?>
            <form class="formulario" method="POST" action="<?=PATH?>Usuarios/Actualizando">

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
                    <label for="exampleInputPassword1" class="form-label">ID Usuario</label>
                    <input type="name" class="form-control" name="ID_Usuario" name="ID_Usuario"
                        value="<?=isset($empleado)?$empleado['ID_Usuario']:''?>" readonly>
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Nombre</label>
                    <input type="name" class="form-control" name="Nombre" value="<?=isset($empleado['Nombre'])?$empleado['Nombre']:''?>" id="Nombre">
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Apellido</label>
                    <input type="name" class="form-control" name="Apellido" id="Apelldio" value="<?=isset($empleado['Apellido'])?$empleado['Apellido']:''?>">
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Correo</label>
                    <input type="name" class="form-control" name="Correo" id="Correo" value="<?=isset($empleado['Correo'])?$empleado['Correo']:''?>">
                </div>
                <div class="form-group">
                    <div class="col-lg-10">
                        <input class="form-control" name="Verificado" type="hidden" value="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10">
                        <input class="form-control" name="Estado" type="hidden" value="1">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10">
                        <input class="form-control" name="Acceso" type="hidden" value="">
                    </div>
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Tipo Usuario</label>
                    <div class="form-floating">
                        <select class="form-select" id="id_tipo_usuario" name="id_tipo_usuario" id="floatingSelect"
                            aria-label="Floating label select example">
                            <?php
                            foreach($usuarios as $usuario)
                            {
                                if($usuario['id_tipo_usuario']!=2)
                                {
                                if($usuario['nombre_tipo_usuario']==$empleado['nombre_tipo_usuario'])
                                {
                            ?>
                                    <option selected value="<?=$usuario['id_tipo_usuario']?>"><?=$usuario['nombre_tipo_usuario']?></option>
                            <?php
                                }else{
                                ?>
                                    <option value="<?=$usuario['id_tipo_usuario']?>"><?=$usuario['nombre_tipo_usuario']?></option>
                                <?php
                                }
                            }
                            }
                            ?>
                            
                        </select>
                    </div>
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Sucursal</label>
                    <div class="form-floating">
                        <select class="form-select" id="ID_Sucursal" name="ID_Sucursal" id="floatingSelect"
                            aria-label="Floating label select example">
                            <?php
                            foreach($sucursales as $sucursal)
                            {
                                if($sucursal['Nombre_Sucursal']==$empleado['Nombre_Sucursal'])
                                {
                            ?>
                                    <option selected value="<?=$sucursal['ID_Sucursal']?>"><?=$sucursal['Nombre_Sucursal']?></option>
                            <?php
                                }else{
                                ?>
                                    <option value="<?=$sucursal['ID_Sucursal']?>"><?=$sucursal['Nombre_Sucursal']?></option>
                                <?php
                                }
                            }
                            ?>
                            
                        </select>
                    </div>
                </div>
                    <div class="d-flex justify-content-center">
                    <div class="my-2">
                            <input type="submit" class="btn" name="Guardar" id="Guardar"></input>
                        </div>
                        
            </form>
            <?php
            }
            ?>
        </div>
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