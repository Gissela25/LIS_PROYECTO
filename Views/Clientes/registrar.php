<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="<?=PATH?>Assets/css/registrar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Cliente</title>
</head>

<body>

    <div class="row mx-5 mt-5 my-4">
        <div class="col ml-5">
            <div class="row mt-3">
                <form method="POST" action="<?=PATH?>Clientes/Registrar" enctype="multipart/form-data" class="">
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
                    <table class="table table-borderless">
                        <thead>
                            <tr>

                                <th scope="col"></th>
                                <th scope="col" style="color:#084594">INFORMACION PERSONAL</th>
                                <th scope="col"></th>
                                <th scope="col" style="color:#084594">
                                    DATOS DE INICIO DE SESIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td>
                                    <div class="form-group mx-sm-4 pt-3">
                                        <label for="exampleInputPassword1" class="form-label">DUI</label>
                                        <input type="text" class="form-control" placeholder="00470129-3" name="DUI"
                                            id="DUI" value="<?=isset($cliente)?$cliente['DUI']:''?>">
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <div class="form-group mx-sm-4 pt-3">
                                        <label for="exampleInputPassword1" class="form-label">Correo</label>
                                        <input type="text" class="form-control"
                                            placeholder="Ingrese su Correo Electronico" name="Correo" id="Correo" value="<?=isset($cliente)?$cliente['Correo']:''?>"> 
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>
                                    <div class="form-group mx-sm-4 pt-3">
                                        <label for="exampleInputPassword1" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" placeholder="Ingrese su nombre"
                                            name="Nombre" id="Nombre" value="<?=isset($cliente)?$cliente['Nombre']:''?>">
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <div class="form-group mx-sm-4 pt-3">                            
                                        <label for="exampleInputPassword1" class="form-label">Clave</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" placeholder="Ingrese su Clave" name="Clave" id="Clave">
                                        <div class="input-group-append">
                                        <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()">
                                         <span class="fa fa-eye-slash icon"></span> </button>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>
                                    <div class="form-group mx-sm-4 pt-3">
                                        <label for="exampleInputPassword1" class="form-label">Apellido</label>
                                        <input type="text" class="form-control" placeholder="Ingrese Apellido" value="<?=isset($cliente)?$cliente['Apellido']:''?>"
                                            name="Apellido" id="Apellido">
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <!-- <div class="form-group mx-sm-4 pt-3">
                                        <label for="exampleInputPassword1" class="form-label">Confirmar clave</label>
                                        <input type="text" class="form-control" placeholder="Confirme su clave"
                                            name="SPassword" id="SPassword">
                                    </div> -->
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>
                                    <div class="form-group mx-sm-4 pt-3">
                                        <label for="exampleInputPassword1" class="form-label">Numero De Telefono</label>
                                        <input type="text" class="form-control"
                                        value="<?=isset($cliente)?$cliente['Telefono']:''?>"    placeholder="7083-6536" name="Telefono" id="Telefono">
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <div class="my-2">
                                            <input type="submit" name="Registrar" id="Registrar" class="btn boton "></input>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>
                                    <div class="form-group mx-sm-4 pt-3">
                                        <label for="exampleInputPassword1" class="form-label">Direccion</label>
                                        <input type="text" class="form-control" placeholder="Ingrese su direccion"
                                            name="Direccion" id="Direccion" value="<?=isset($cliente)?$cliente['Direccion']:''?>">
                                    </div>
                                </td>
                                <td><div class="form-group mx-sm-4 pt-3">
                                        <input type="hidden" class="form-control" placeholder="Ingrese su direccion"
                                            name="Verificar" id="Verificar" value="0">
                                    </div></td>
                                <td>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            </form>
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