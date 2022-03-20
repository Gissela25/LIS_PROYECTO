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
</head>

<body>
    <div class="d-flex justify-content-center">
        <div class="col-md-4 my-5">
            <img src="Assets/img/logo.PNG" class="rounded mx-auto d-block mb-3" alt="..." height="65px" width="200px">
            <form class="formulario" method="POST" action="?c=products&a=Savest">
                <legend style="color:#084594" class="text-center">Stoke Santa Tecla</legend>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Codigo Producto</label>
                    <input type="name" class="form-control" name="ID_Producto" 
                        value="<?=$p->getPro_id()?>" readonly>
                </div> 
               
                <!-- <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Producto</label>
                    <input type="name" class="form-control" name="Nombrep">
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Descripcion</label>
                    <textarea type="name" class="form-control" name="Descripcion"></textarea>
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Imagen</label>
                    <input type="file" class="form-control" name="Imagen">
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Categoria</label>
                    <div class="form-floating">
                        <select class="form-select" name="ID_Familia" id="floatingSelect"
                            aria-label="Floating label select example">
                            <?php foreach($this->modelo->showfamilia() as $r):?>
                            <option value="<?=$r->ID_Familia?>"><?=$r->Nombre?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div> -->
                <div class="mb-3" style="color:#084594">
                    <input type="name" class="form-control" name="ID_PC" 
                        value="<?=$p->getPro_idpc()?>" readonly>
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Precio Santa Tecla</label>
                    <input type="numbers" class="form-control" name="Precio_ST">
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Existencias Santa Tecla</label>
                    <input type="numbers" class="form-control" name="Cantidad_ST">
                </div>
                <div class="mb-3" style="color:#084594">
                    <!-- <label for="exampleInputPassword1" class="form-label">Precio Santa Salvador</label> -->
                    <input type="hidden" class="form-control" name="Precio_SS">
                </div>
                <div class="mb-3" style="color:#084594">
                    <!-- <label for="exampleInputPassword1" class="form-label">Existencias Santa Salvador</label> -->
                    <input type="hidden" class="form-control" name="Cantidad_SS">
                </div>
                <div class="mb-3" style="color:#084594">
                    <!-- <label for="exampleInputPassword1" class="form-label">Precio Lourdes</label> -->
                    <input type="hidden" class="form-control" name="Precio_LO">
                </div>
                <div class="mb-3" style="color:#084594">
                    <!-- <label for="exampleInputPassword1" class="form-label">Existencias Lourdes</label> -->
                    <input type="hidden" class="form-control" name="Cantidad_LO">
                </div>
                <div class="mb-3" style="color:#084594">
                    <!-- <label for="exampleInputPassword1" class="form-label">Precio Opico</label> -->
                    <input type="hidden" class="form-control" name="Precio_OP">
                </div>
                <div class="mb-3" style="color:#084594">
                    <!-- <label for="exampleInputPassword1" class="form-label">Existencias Opico</label> -->
                    <input type="hidden" class="form-control" name="Cantidad_OP">
                </div>
                <div class="mb-3" style="color:#084594">
                    <!-- <label for="exampleInputPassword1" class="form-label">Precio Zaragoza</label> -->
                    <input type="hidden" class="form-control" name="Precio_ZA">
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Existencias Zaragoza</label>
                    <input type="numbers" class="form-control" name="Cantidad_ZA">
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Precio Santa Ana</label>
                    <input type="numbers" class="form-control" name="Precio_SA">
                </div>
                <div class="mb-3" style="color:#084594">
                    <label for="exampleInputPassword1" class="form-label">Existencias Santa Ana</label>
                    <input type="numbers" class="form-control" name="Cantidad_SA">
                </div> --> 
                <div class="d-flex justify-content-center">
                    <div class="my-2">
                        <input type="submit" class="btn "></input>
                    </div>
                </div>
            </form>
        </div>
    </div>

    </div>
</body>

</html>