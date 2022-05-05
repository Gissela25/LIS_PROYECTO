<?php
require_once "./Core/config.php";
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
    margin: 0 auto;
    padding: 0px;
    width: 100%;
    min-width: 650px;
    font-size: 10;
}

.table{float: center;}
#header{
    width: 100%;
    height: 20%;
    padding: 3px;
    border: 0;
    margin: 0;
    background-color: white;
}

#container{
    width: 100%;
    height: 60%;
    padding: 3px;
    border: 0;
    margin: 0;
    background-color: white;
}

#footer{
    width: auto;
    height: auto;
    padding: 3px;
    border: 0;
    margin: 0;
    background-color: white;
}

#logo{
    width: auto;
    height: auto;
    padding: 3px;
    border: 0;
    margin: auto;
    background-color: white;
}

#empresa{
    width: auto;
    height: auto;
    padding: 3px;
    border: 0;
    margin: 0;
    text-align: center;
    position: absolute;
    left:590px;
    top: 25px;
}

#tipofactura{
    width: 150px;
    height: auto;
    padding: 3px;
    border: 0;
    margin: 0;
    position: absolute;
    left: 880px;
    top: 0px;
}

.recuadro{
    border: 1px;
}

#datoscliente{
    width: 90%;
    height: 20%;
    padding: 10px;
    border: 1px;
    margin: 0;
    background-color: white;
    border-radius: 10%;
    -webkit-border-radius: 10%;
    -moz-border-radius: 10%;
    -ms-border-radius: 10%;
    -o-border-radius: 10%;
}

#lineasfactura{
    width: 90%;
    height: 20px;
    padding: 3px;
    border: 1px;
    margin: 0;
    margin-top: 10px;
    margin-left: 20px;
    background-color: white;
}

#pago{
    left: 600px;
}
/* 
#st{
    width: auto;
    height: auto;
    padding: 3px;
    border: 0;
    margin: 0;
    background-color: white;
    text-align: center;
    position: absolute;
    left:570px;
    top: 25px;
} */

#st{
    width: auto;
    height: auto;
    padding: 1px;
    border: 0;
    margin: 0;
    text-align: center;
    position: absolute;
}
#ss{
    width: auto;
    height: auto;
    padding: 1px;
    border: 0;
    margin: 0;
    text-align: center;
}
#za{
    width: auto;
    height: auto;
    padding: 1px;
    border: 0;
    margin: 0;
    position: absolute;
    left: 790px;
    text-align: center;
    top: 512px;
}
#sa{
    width: auto;
    height: auto;
    padding: 1px;
    border: 0;
    margin: 0;
    text-align: center;
    position: absolute;
    top: 575px;
    left: 280px;
}
#lo{
    width: auto;
    height: auto;
    padding: 1px;
    border: 0;
    margin: 0;
    text-align: center;
    position: absolute;
    top: 575px;
    left: 550px;
}
#op{
    width: auto;
    height: auto;
    padding: 1px;
    border: 0;
    margin: 0;
    position: absolute;
    left: 810px;
    text-align: center;
    top: 575px;
}


    </style>
</head>

<body>
    <div class="container">
    <?php foreach($datos as $dato)
    {?>
    <fieldset style="width:850px; height: 600px; margin: auto; margin-top: 2px;">

        <div id="header">
            <div id="logo">
                <img src="<?=PATH?>Views/Facturas/logo.PNG" height="65px" width="200px">
            </div>

            <div id="empresa">
                Ferreteria Sumersa<br>
                Tel:2277-0823<br>
                El Salvador<br>
            </div>

            <div id="tipofactura">
                <h3>Factura</h3>
                <table border="0">
                    <tr>
                        <td><?=$dato['codigo_factura']?></td>
                        <td colspan="2" border="1">1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?=$dato['fecha']?></td>
                        <td colspan="2" border="1">04/05/2022</td>
                        <td></td>
                    </tr>
                </table>
            </div>

        </div>

        <div id="container">
            <fieldset style="width: 660px; border-radius: 0.5%; height: 150px; margin: auto;">
                <div id="datoscliente">
                    <table style="min-width: 660px; border: 0px; padding: 1px; margin: 3px;">
                        <tr>
                            <td colspan="4">
                                <h3 align="center">Datos Cliente</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>Cliente:</td>
                            <td class="recuadro"><?=$dato['Nombre']?> <?=$dato['Apellido']?></td>
                            <td>DUI:</td>
                            <td class="recuadro"><?=$dato['DUI']?></td>
                        </tr>
                        <tr>
                            <td>Direccion:</td>
                            <td class="recuadro">San Salvador,El Salvador</td>
                            <td>Telefono:</td>
                            <td class="recuadro">7083-5687</td>
                        </tr>
                    </table>
                </div>
            </fieldset>
            <!-- <fieldset style="width: 660px; border-radius: 4%;"> -->
            <div id="lineasfactura">
                <table style="min-width: 660px; border: 1px; padding: 1px; margin: auto;" border="1">
                    <tr>
                        <td>Cantidad</td>
                        <td align="center">Producto</td>
                        <td>Precio</td>
                        <td>Subtotal</td>
                    </tr>
                    <tr>
                        <?php
                        $precio = $dato['total']/$dato['cantidad']?>;
                        ?>
                        <td><?=$dato['cantidad']?></td>
                        <td><?=$dato['Nombrep']?></td>
                        <td><?=$precio?></td>
                        <td><?=$dato['total']?></td>
                    </tr>

                </table>
            </div>

            <div id="pago">
                <table style="margin-left: 510px; margin-top: 20px; margin-bottom: 0%;">
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <h2>Total</h2>
                        </td>
                        <td>
                            <h2>$<?=$dato['total']?></h2>
                        </td>
                    </tr>
                </table>
                <div>
                    <p style="text-align: center;">¡Gracias por su Compra!</p>
                    <p style="text-align: center;">Email:info@sumersa.com.sv</p>

                    <div id="st">
                        Santa Tecla<br>
                        2da Calle Pte entre 12 y 14 Av Sur No 7<br>
                    </div>
                    <div id="ss">
                        San Salvador<br>
                        Avenida Federal de Alemania No. 216<br>
                    </div>
                    <div id="za">
                        Zaragoza<br>
                        Calle Principal Oscar Arnulfo Romero #18<br>
                    </div>
                    <div id="sa">
                        Santa Ana<br>
                        Calle las cruces<br>
                    </div>
                    <div id="lo">
                        Lourdes Colon<br>
                        4ª. Calle Poniente No. 1-15<br>
                    </div>
                    <div id="op">
                        Opico<br>
                        Km. 36 ½ Carretera a Quezaltepeque<br>
                    </div>
                </div>
            </div>
            <!-- </fieldset> -->
        </div>

    </fieldset>
    <?php 
    }?>
    </div>
</body>

</html>
<?php
$html=ob_get_clean();
include_once ("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=>true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('letter');

$dompdf->render();
$dompdf->stream("factura_".$dato['codigo_factura'].".pdf", array("Attachment"=>false))
?>