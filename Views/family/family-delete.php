<?php
require_once('Core/config.php');
    require_once "Views/Constant/admin/const.php";
    $codigo_prod=$_GET["id"];
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
    <link rel="stylesheet" href="<?=PATH?>Assets/css/branch.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Sucursales</title>
</head>

<body>
    <div class="row mx-5 mt-5">
        <div class="col ml-5">
            <div class="row justify-content-center pt-5 mt-5 mr-1">
                <div class="col-md-12 formulario">
                    <div class="form-group text-center">
                        <form action="<?=PATH?>?c=family&a=Borrar&id=<?=$codigo_prod?>" method="post" role="form">
                            <h1 class="text-black my-3" style="color:#084594">¿Deseas borrar el siguiente producto?</h1>
                    </div>
                    <table class="table table-bordered">
                        <thead class="Te" style="background-color: #084594">
                            <tr>
                                <th>ID Familia</th>
                                <th>Familia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    
                    foreach ($this->modelo->show() as $r)
                     {
                         if($r->ID_Familia==$codigo_prod)
                         {
                                ?>
                            <tr>
                                <td><?=$r->ID_Familia?></td>
                                <td><?=$r->Nombre?></td>
                            </tr>
                            <?php
                            }
                         }
                       
                            
                    ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        <div class="col-md-3 my-4">
                            <a href="?c=family&a=family" class="btn btn-success btn-block">Regresar</a>
                            <input type="submit" value="Eliminar" id="eliminar" name="eliminar"
                                class="btn btn-danger btn-block">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>