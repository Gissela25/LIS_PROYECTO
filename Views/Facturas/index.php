<?php 
require_once('./Core/config.php');
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
    <title>Facturas</title>
    <?php
    require_once "./Views/datatables.php";
    ?>
</head>

<body>
<?php require_once "./Views/menu.php";?>

    <div class="row mx-5 mt-5">
        <div class="col ml-5">
            <div class="row mt-3">
                <table class="table table-bordered" id="data">
                    <thead class="Te" style="background-color: #084594">
                        <tr>
                            <th>Fecha de compra</th>
                            <th>Codigo Producto</th>
                            <th>Precio/Unidad</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach($facturas as $factura)
                        {
                            $precio=$factura['total']/$factura['cantidad'];
                        ?>
                        <tr>
                            <input type="hidden" name="fecha" id="fecha" value="<?=$factura['fecha']?>">
                            <input type="hidden" name="codigo_factura" id="codigo_factura" value="<?=$factura['codigo_factura']?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?=$factura['Nombre']?>">
                            <input type="hidden" name="apellido" id="apellido" value="<?=$factura['Apellido']?>">
                            <input type="hidden" name="direccion" id="direccion" value="<?=$factura['Direccion']?>">
                            <input type="hidden" name="telefono" id="telefono" value="<?=$factura['Telefono']?>">
                            <input type="hidden" name="nombrep" id="nombrep" value="<?=$factura['Nombrep']?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?=$factura['cantidad']?>">
                            <input type="hidden" name="precio" id="precio" value="<?=$precio?>">
                            <input type="hidden" name="total" id="total" value="<?=$factura['total']?>">
                            <input type="hidden" name="codigo_cliente" id="codigo_cliente" value="<?=$factura['codigo_cliente']?>">
                        <td><?=$factura['fecha']?></td>
                        <td><?=$factura['ID_Producto']?></td>
                        <td><?=$precio?></td>
                        <td><?=$factura['cantidad']?></td>
                        <td><?=$factura['total']?></td>
                        <td> <center><a href="<?=PATH?>Facturas/Ver/<?=$factura['codigo_factura']?>" id="ver" name="ver" title="Ver más" class="btn btn-primary btn-circle"><i class="bi bi-eye-fill"></i></span></a></center></td>
                        </tr>
                       <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <script>
                $(document).ready(function() {
                $('#data').DataTable();
                } );
            </script>
            <?php
            require_once "./Views/footer.php";
            ?>
</body>
</html>