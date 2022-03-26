<?php
require_once('Core/config.php'); 
 require_once "Views/Constant/admin/const.php";
?>
<?php
    $codigo_prod=$_GET["id"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="<?=PATH?>Assets/css/update-products.css">
</head>

<body>
    <div class="d-flex justify-content-center">
        <div class="col-md-4 my-5">
            <form method="POST" action="<?=PATH?>?c=products&a=update&id=<?=$codigo_prod?>" enctype="multipart/form-data"
                class="formulario">
                <div class="card-body">
                    <?php require 'Views/Tools/procesar-datos-products.php'?>
                    <?php
                    if(count($errores_upt)>0&&isset($_POST['update']))
                    {
                        echo "<div> <ul>";
                        foreach($errores_upt as $error)
                        {
                          echo "<li>$error</li>";
                        }
                        echo "</ul></div>";

                    }
        ?>
                    <?php foreach($this->modelo->show() as $r)
                        if($r->ID_Producto==$codigo_prod)
                        {
                                $path="img/".$r->Imagen;
                                if(file_exists($path))
                        {
                            ?>
                    <?php echo "<img src='img/$r->Imagen' width='300px' height='300px' class='card-img-top'>"?>
                    <div class="card-body">
                        <div class="card-title">
                            <div class="form-group text-center">
                                <h1 class="text-black py-1 text-warning"><?=$r->Nombrep?></h1>
                            </div>
                        </div>
                        <div class="mb-3" style="color:#084594">
                            <label class="control-label" for="ID_Producto">Codigo:</label>
                            <input type="text" class="form-control" readonly value="<?=$r->ID_Producto?>" readonly
                                name="ID_Producto" id="ID_Producto" required>
                        </div>
                        <div class="mb-3" style="color:#084594">
                            <label class="control-label" for="Nombrep">Nombre:</label>
                            <input type="text" class="form-control" name="Nombrep" id="Nombrep" value="<?=$r->Nombrep?>"
                                required>
                        </div>

                        <div class="mb-3" style="color:#084594">
                            <label class="control-label" for="Descripcion">Descripcion:</label>
                            <input type="text" class="form-control" name="Descripcion" id="Descripcion"
                                value="<?=$r->Descripcion?>">
                        </div>
                        <div class="mb-3" style="color:#084594">
                            <label class="control-label" for="nimg_p">Nueva Img(opcional):</label>
                            <input type="file" class="form-control" name="nimg_p" id="nimg_p">
                        </div>
                        <label for="exampleInputPassword1" class="form-label" style="color:#084594">Sucursal</label>
                        <div class="form-floating">
                            <select class="form-select" name="ID_Familia" id="ID_Familia"
                                aria-label="Floating label select example">
                                <?php
							foreach($this->modelo->showfamilia() as $row)
							{
							?>


                                <?php if($row->Nombre==$r->Nombre)
							{
								?>
                                <option selected value="<?=$row->ID_Familia?>"><?=$row->Nombre?></option>
                                <?php
							} 
							else
							{
								?>
                                <option value="<?=$row->ID_Familia?>"><?=$row->Nombre?></option>
                                <?php
							}
							?>
                                <?php
						}
                        ?>
                            </select>
                        </div>

                    </div>
                </div>
                <!-- <div class="form-group mx-sm-4  ">
                            <center>
                                <a href="?c=productos&a=show" class="btn btn-danger">Cancelar</a>
                                <button type="submit" name="update" id="update" class="btn btn-success"><span
                                        class="glyphicon glyphicon-floppy-disk"></span> Actualizar</button>
                            </center>


                        </div> -->
                <div class="d-flex justify-content-center">
                    <div class="my-2">
                        <input type="submit" name="update" id="update" class="btn "></input>
                    </div>
                </div>

        </div>


        <?php
                        }
                }
            ?>

        </form>
    </div>


    </div>
    </div>
</body>

</html>