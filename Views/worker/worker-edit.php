<?php
require_once('Core/config.php');
 require_once "Views/Constant/admin/const.php";
    $ID_Usuario=$_GET["idu"];
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
    <link rel="stylesheet" href="Assets/css/worker-edit.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="d-flex justify-content-center">
        <div class="col-md-4 my-5">
        <img src="Assets/img/logo.PNG" class="rounded mx-auto d-block mb-3" alt="..." height="85px"
                    width="230px">
            <form class="formulario" method="POST" action="?c=worker&a=Saveedit">
                <?php foreach($this->modelo->show() as $row)
            if($row->ID_Usuario==$ID_Usuario)
            {
            {
                ?>
                <legend style="color:#084594" class="text-center"><?=$titulo?> Empleado</legend>
                 <div class="" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label" value="">ID Usuario</label>
                    <input type="name" class="form-control" name="ID_Usuario" value="<?=$p->getPro_idu()?>">
                </div>
                <div class="" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Nombre</label>
                    <input type="name" class="form-control" name="Nombre" value="<?=$p->getPro_nom()?>">
                </div>
                <div class="" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Apellido</label>
                    <input type="name" class="form-control" name="Apellido" value="<?=$p->getPro_ape()?>">
                </div>
                <div class="" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Correo</label>
                    <input type="name" class="form-control" name="Correo" value="<?=$p->getPro_correo()?>">
                </div>
                <div class="" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label"></label>
                    <input type="hidden" class="form-control" name="Clave" value="<?=$p->getPro_Clave()?>">
                </div>
                <div class="form-group">
                    <div class="col-lg-10">
                        <input class="form-control" name="Verificado" type="hidden" value="">
                    </div>
                </div>
                <label for="exampleInputPassword1" class="form-label" style="color:#084594">Sucursal</label>
                <div class="form-floating">
                    <select class="form-select" name="ID_Sucursal" id="floatingSelect"
                        aria-label="Floating label select example">
                        <?php
							foreach($this->modelo->showsucursal() as $r)
							{
							?>


                        <?php if($row->ID_Sucursal==$r->ID_Sucursal)
							{
								?>
                        <option selected value="<?=$row->ID_Sucursal?>"><?=$r->Nombre_Sucursal?></option>
                        <?php
							} 
							else
							{
								?>
                        <option value="<?=$r->ID_Sucursal?>"><?=$r->Nombre_Sucursal?></option>
                        <?php
							}
							?>
                        <?php
						}
                        ?>
                    </select>
                </div>
                <div class="" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label" style="color:#084594">Estado</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Estado" id="flexRadioDefault1" value="1" checked>
                    <label class="form-check-label" style="color:#084594" for="flexRadioDefault1">Activo</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Estado" id="flexRadioDefault2" value="0">
                    <label class="form-check-label" style="color:#084594" for="flexRadioDefault2">Inactivo</label>
                </div>
                <!-- <label for="exampleInputPassword1" class="form-label" style="color:#084594">Acceso</label>
                <div class="form-floating">
                    <select class="form-select" name="Acceso" id="floatingSelect"
                        aria-label="Floating label select example" value="<?=$p->getPro_acce()?>">
                        <option value="0">Empleado</option>
                        <option value="1">Administrador</option>
                    </select>
                </div> -->
                <div class="d-flex justify-content-center">
                    <div class="col-md-3 my-4">
                    <input type="submit" class="btn "></input>
                    </div>
                        <?php
            }
            }
            ?>
            </form>
        </div>
    </div>

    </div>
    </div>
</body>

</html>