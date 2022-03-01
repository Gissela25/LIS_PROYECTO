<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../../Estilos/css/registro_empleado.css">
</head>

<body>
<div class="row justify-content-center pt-5 mt-5 mr-1">
        <div class="col-md-4 formulario">
            <div class="row">
                <div class="col">
                    <input type="text" color="Y" class="form-control" placeholder="Nombre" aria-label="First name">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Apellido" aria-label="Last name">
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center pt-3 mt-3 mr-1">
        <div class="col-md-4 formulario">
            <div class="col">
                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                            <option value="1">Alemania</option>
                            <option value="2">Santa Tecla</option>
                            <option value="3">Lourdes</option>
                            <option value="4">Opico</option>
                            <option value="5">Zaragoza</option>
                            <option value="6">Aldea</option>
                        </select>
                        <label for="floatingSelectGrid">SUCURSAL</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center pt-3 mt-3 mr-1">
        <div class="col-md-4 formulario">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Puesto" aria-label="First name">
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center pt-3 mt-3 mr-1">
        <div class="col-md-4 formulario">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Password" aria-label="First name">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Confirmar password" aria-label="Last name">
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center pt-4 mt-4 mr-1">
        <div class="col-md-4 formulario">
            <div class="d-grid gap-2">
                <button class="btn btn-warning" type="button">INGRESAR</button>

            </div>
        </div>
    </div>
</body>
</html>