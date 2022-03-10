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
    <link rel="stylesheet" href="../Assets/css/branch.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="d-flex justify-content-center">
        <div class="col-md-4 my-5">
            <legend style="color:#084594" class="text-center">Informacion Empleado</legend>
            <form class="formulario" method="POST" action="?c=branch&a=Save">
                <img src="Assets/img/logo.PNG" class="rounded mx-auto d-block mb-3" alt="..." height="85px"
                    width="230px">
                <div class="form-group">
                    <div class="col-lg-10">
                        <input class="form-control" name="ID_Sucursal" type="hidden" value="">
                    </div>
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
                    <label for="exampleInputPassword1" class="form-label">Clave</label>
                    <input type="name" class="form-control" name="Clave">
                </div>
                <div class="form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                <option value="1">Santa Tecla</option>
                <option value="2">Alemania</option>
                <option value="3">Zaragoza</option>
                <option value="4">Lourdes</option>
                <option value="5">Opico</option>
                <option value="6">Aldea</option>
                </select>
                <label for="floatingSelect">Sucursal</label>
                </div>
                 <div class="d-flex justify-content-center">
                 <div class="col-md-3 my-4">
                <button type="submit" class="btn btn-warning">Ingresar</button>
            </form>
            </div>
            </div>
            
    </div>
</body>

</html>