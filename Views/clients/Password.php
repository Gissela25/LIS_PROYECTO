<?php
require_once('Core/config.php'); 
require_once "Views/Constant/clientes/const.php";
?>
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
    <link rel="stylesheet" href="Assets/css/registrar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Cliente</title>
</head>

<body>
<?php 
 require_once "Views/Constant/clientes/nav.php";
?>
    <div class="row mx-5 mt-1 my-4">
        <div class="col ml-5">
            <div class="row mt-3">
                <form method="POST" action="<?=PATH?>?c=client&a=psswrd&id=<?=$usuario?>" enctype="multipart/form-data" class="">
                    <?php require 'Views/Tools/procesar-datos-registrar.php'?>
                    <?php
                    if(count($errores)>0&&isset($_POST['psswrd']))
                    {
                        echo "<div> <ul>";
                        foreach($errores as $error)
                        {
                          echo "<li>$error</li>";
                        }
                        echo "</ul></div>";

                    }
        ?>

                    <table class="table table-borderless">
                        <thead>
                            <tr>

                                <th scope="col"></th>
                                <th scope="col" style="color:#084594"><i class="bi bi-pen-fill"></i> CAMBIAR CONTRASEÑA</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td>
                                    <div class="form-group mx-sm-4 pt-3">                            
                                        <label for="exampleInputPassword1" class="form-label"><i class="bi bi-lock"></i> Clave Actual</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" placeholder="Ingrese su Clave Actual" name="Clave" id="Clave">
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
                                        <label for="exampleInputPassword1" class="form-label"><i class="bi bi-lock-fill"></i> Clave Nueva</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" placeholder="Ingrese su Clave Nueva" name="Clave2" id="Clave2">
                                        <div class="input-group-append">
                                        <button id="show_password" class="btn btn-primary" type="button" onclick="mostrrPassword()">
                                         <span class="fa fa-eye-slash icon"></span> </button>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                                </tr>

                                <tr>
                                <th scope="row"></th>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <div class="my-2">
                                            <input type="submit" value="Cambiar Contraseña" name="psswrd" id="psswrd" class="btn boton "></input>
                                        </div>
                                    </div>
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
            function mostrrPassword(){
            var cambioPww = document.getElementById("Clave2");
		    if(cambioPww.type == "password"){
			cambioPww.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		    }else{
			cambioPww.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		    }
	        } 
            </script>
</html>