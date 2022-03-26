<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< Updated upstream
    <title>Registrar</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
=======
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
        <link rel="stylesheet" href="Assets/css/registrar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Cliente</title>
</head>

<body>

    <div class="row mx-5 mt-5 my-4">
        <div class="col ml-5">
            <div class="row mt-3">
            

                <table class="table table-borderless">
                    <thead>
                        <tr>
                        
                            <th scope="col"></th>
                            <th scope="col"style="color:#084594">INFORMACION PERSONAL</th>
                            <th scope="col"></th>
                            <th scope="col"style="color:#084594">
                                DATOS DE INICIO DE SESIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"></th>
                            <td>
                                <div class="form-group mx-sm-4 pt-3">
                                    <label for="exampleInputPassword1" class="form-label">DUI</label>
                                    <input type="text" class="form-control" placeholder="Ingrese su dui"
                                        name="dui" id="dui">
                                </div>
                            </td>
                            <td></td>
                            <td>
                                <div class="form-group mx-sm-4 pt-3">
                                    <label for="exampleInputPassword1" class="form-label">Correo</label>
                                    <input type="text" class="form-control" placeholder="Ingrese su Correo Electronico"
                                        name="i_email" id="i_email">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>
                                <div class="form-group mx-sm-4 pt-3">
                                    <label for="exampleInputPassword1" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" placeholder="Ingrese su nombre"
                                        name="Nombre" id="Nombre">
                                </div>
                            </td>
                            <td></td>
                            <td>
                                <div class="form-group mx-sm-4 pt-3">
                                    <label for="exampleInputPassword1" class="form-label">Clave</label>
                                    <input type="text" class="form-control" placeholder="Ingrese su Clave"
                                        name="Clave" id="Clave">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>
                                <div class="form-group mx-sm-4 pt-3">
                                    <label for="exampleInputPassword1" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" placeholder="Ingrese Apellido"
                                        name="Apellido" id="Apellido">
                                </div>
                            </td>
                            <td></td>
                            <td>
                                <div class="form-group mx-sm-4 pt-3">
                                    <label for="exampleInputPassword1" class="form-label">Confirmar clave</label>
                                    <input type="text" class="form-control" placeholder="Confirme su clave"
                                        name="SPassword" id="SPassword">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>
                                <div class="form-group mx-sm-4 pt-3">
                                    <label for="exampleInputPassword1" class="form-label">Numero De Telefono</label>
                                    <input type="text" class="form-control" placeholder="Ingrese su numero de telefono"
                                        name="Telefono" id="Telefono">
                                </div>
                            </td>
                            <td></td>
                            <td>
                                <a href="" class="btn btn-primary btn-block boton mx-5">Ingresar</a>
                            </td>
                            <?php require 'Tools/procesar-datos-registrar.php';?>
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
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>
                                <div class="form-group mx-sm-4 pt-3">
                                    <label for="exampleInputPassword1" class="form-label">Direccion</label>
                                    <input type="text" class="form-control" placeholder="Ingrese su direccion"
                                        name="Direccion" id="Direccion">
                                </div>
                            </td>
                            <td></td>
                            <td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
>>>>>>> Stashed changes

</head>
<body class="bg-secondary">
<section class="d-flex justify-content-center">
         <div class="card col-sm-4 p-5">
        <div class="nb-3">
            <h4>Resgistar</h4>
        </div>
        <div class="nd-2">
            <form action="">
                <div class="nd-2">
                    <label for="dui">DUI</label>
                    <input type="text"  class="form-control col-xs-6" name="nombre" id="nombre" placeholder="Ingrese su número de DUI">
                </div>
                <div class="nd-2">
                    <label for="nombre">Nombre</label>
                    <input type="text"  class="form-control col-xs-6" name="nombre" id="nombre" placeholder="Ingrese su nombre">
                </div>
                <div class="nd-2">
                    <label for="apellido">Apellido</label>
                    <input type="text"  class="form-control" name="nombre" id="nombre" placeholder="Ingrese su apellido">
                </div>
                <div class="nd-2">
                    <label for="telefono">Teléfono</label>
                    <input type="text"  class="form-control" name="nombre" id="nombre" placeholder="Ingrese su Número de teléfono">
                </div>
                <div class="nd-2">
                    <label for="dirección">Dirección</label>
                    <input type="text"  class="form-control" name="nombre" id="nombre" placeholder="Ingrese su dirección">
                </div>
        <div class="nd-2">
                <div class="nd-2">
                    <label for="correo">Correo</label>
                    <input type="text"  class="form-control" name="nombre" id="nombre" placeholder="Ingrese su E-mail">
                </div>
                <div class="nd-2">
                    <label for="contraseña">Contraseña</label>
                    <input type="text"  class="form-control" name="nombre" id="nombre" placeholder="Ingrese su contraseña">
                </div>
                <div class="nd-2">
                    <label for="verificar contraseña">Verificar contraseña</label>
                    <input type="text"  class="form-control" name="nombre" id="nombre" placeholder="verificar contraseña">
                </div>
               
                
                <div class="nd-2">
                    <button class="btn btn-primary">Registrarme</button>
                </div>
            </form>
        </div>
        </div>
        </section>
    
</body>
</html>