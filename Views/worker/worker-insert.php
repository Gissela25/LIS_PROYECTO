<?php
require_once('Core/config.php');
 require_once "Views/Constant/admin/const.php";
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
    <link rel="stylesheet" href="Assets/css/worker-insert.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <div class="d-flex justify-content-center">
        <div class="col-md-4 my-5">
            <img src="Assets/img/logo.PNG" class="rounded mx-auto d-block mb-3" alt="..." height="65px" width="200px">
            <form class="formulario" method="POST" action="?c=worker&a=Save">
                <legend style="color:#084594" class="text-center"><?=$titulo?> Empleado</legend>
                <!-- <div class="form-group">
                    <div class="col-lg-10">
                        <input class="form-control" name="ID_Sucursal" type="hidden" value="">
                    </div>
                </div> -->
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">ID Usuario</label>
                    <input type="name" class="form-control" name="ID_Usuario"
                        value="<?=$this->modelo->generate_code();?>" readonly>
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Nombre</label>
                    <input type="name" class="form-control" name="Nombre">
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Apellido</label>
                    <input type="name" class="form-control" name="Apellido">
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Correo</label>
                    <input type="name" class="form-control" name="Correo">
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Clave</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="Clave" id="Clave">
                            <div class="input-group-append">
                            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()">
                             <span class="fa fa-eye-slash icon"></span> </button>
                            </div>
                     </div>
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
                    <label for="exampleInputPassword1" class="form-label">Sucursal</label>
                    <div class="form-floating">
                        <select class="form-select" name="ID_Sucursal" id="floatingSelect"
                            aria-label="Floating label select example">
                            <?php foreach($this->modelo->showsucursal() as $r):?>
                            <option value="<?=$r->ID_Sucursal?>"><?=$r->Nombre_Sucursal?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="d-flex justify-content-center">
                    <div class="my-2">
                            <input type="submit" class="btn "></input>
                        </div>
                        
            </form>
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