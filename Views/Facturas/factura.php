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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    body {
        margin: 0 auto;
        padding: 0px;
        width: 100%;
        min-width: 650px;
        font-size: 10;
    }

    /* .table{float: center;}
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

st{
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
} 
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
}  */
    #empresa {
        color: #214673;
        font-size: 30px;
    }

    #dc {
        font-size: 20px;
        text-align: center;
    }

    #ad {
        text-align: right;
        font-size: 10px
    }

    #top {
        width: 25%;
        text-align: left;
        vertical-align: top;
        border: 1px solid #000;
        border-spacing: 0;
    }

    #info {
        width: 100%;
        border: 1px solid #000;
    }

    #pro {}

    /* #tipofactura{
    position: absolute;
    top: 70px;
} */
    #total {
        font-size: 15px
    }

    #gra {
        font-size: 25px;
        text-align: center;
    }

    #st {
        width: auto;
        height: auto;
        padding: 3px;
        border: 0;
        margin: 0;
        background-color: white;
        text-align: center;
        position: absolute;
        left: 100px;
        top: 750px;
    }

    #ss {
        width: auto;
        height: auto;
        padding: 3px;
        border: 0;
        margin: 0;
        background-color: white;
        text-align: center;
        position: absolute;
        left: 400px;
        top: 750px;
    }

    #za {
        width: auto;
        height: auto;
        padding: 3px;
        border: 0;
        margin: 0;
        background-color: white;
        text-align: center;
        position: absolute;
        left: 100px;
        top: 800px;
    }

    #sa {
        width: auto;
        height: auto;
        padding: 3px;
        border: 0;
        margin: 0;
        background-color: white;
        text-align: center;
        position: absolute;
        left: 455px;
        top: 800px;
    }

    #op {
        width: auto;
        height: auto;
        padding: 3px;
        border: 0;
        margin: 0;
        background-color: white;
        text-align: center;
        position: absolute;
        left: 100px;
        top: 850px;
    }

    #lo{
        width: auto;
        height: auto;
        padding: 3px;
        border: 0;
        margin: 0;
        background-color: white;
        text-align: center;
        position: absolute;
        left: 350px;
        top: 850px;
    }

    
    </style>
</head>

<body>
    <div class="container">
        <?php foreach($datos as $dato)
    {?>

        <div id="header">
            <div id="empresa">
                Ferreteria Sumersa<br>
                <div id="ad">
                    (503) 2250-7200 / (503) 2286-4000<br>
                    (503) 2250-7204 / (503) 7039-1262<br>
                    Email:info@sumersa.com.sv<br>
                </div>
                <hr>
            </div>

            <div id="tipofactura">
                <table border="0">
                    <tr>

                        <td>NÚMERO DE FACTURA:</td>
                        <td></td>
                        <td colspan="2" border="1"><?=$dato['codigo_factura']?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>FECHA Y HORA:</td>
                        <td></td>
                        <td colspan="2" border="1"><?=$dato['fecha']?></td>
                        <td></td>
                    </tr>
                </table>
            </div>

        </div>

        <div id="container">
            <div id="datoscliente">
                <table style="min-width: 500px; border: 0px; padding: 1px; margin: 3px;">
                    <tr>
                        <td colspan="4">
                            <div id="dc">
                                <br>DATOS CLIENTE<br><br>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>CLIENTE:</td>
                        <td class="recuadro"><?=$dato['Nombre']?> <?=$dato['Apellido']?></td>

                    </tr>
                    <tr>
                        <td>DIRRECIÓN:</td>
                        <td class="recuadro">San Salvador,El Salvador</td>
                    </tr>
                    <tr>
                        <td>DUI:</td>
                        <td class="recuadro"><?=$dato['DUI']?></td>
                    </tr>
                    <tr>
                        <td>TELEFONO:</td>
                        <td class="recuadro"><?=$dato['Telefono']?></td>
                    </tr>
                </table>
            </div>
            <br>

            <!-- <div id="lineasfactura">
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
            </div>  -->
            <div id="pro">
                <table id="info">
                    <tr id="top">
                        <td id="text"><strong>CANTIDAD</strong></td>
                        <td id="pro"><strong>PRODUCTO</strong></td>
                        <td id="text"><strong>PRECIO</strong></td>
                        <td id="text"><strong>SUBTOTAL</strong></td>
                    </tr>

                    <tr id="top">
                        <td id="text"><?=$dato['cantidad']?></td>
                        <td id="pro"><?=$dato['Nombrep']?></td>
                        <td id="text">$<?=$precio?></td>
                        <td id="text">$<?=$dato['total']?></td>
                    </tr>
                </table>
            </div>
            <div id="pago">
                <table style="margin-left: 410px; margin-top: 20px; margin-bottom: 0%;">
                    <tr>
                        <td></td>
                        <td id="total">
                            <br>TOTAL: $<?=$dato['total']?><br> <br>
                        </td>
                    </tr>
                </table>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <hr>
                <div>
                    <p id="gra">¡Gracias por su Compra!</p>
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
                        4ª. Calle Poniente No. 1-15, contiguo al Banco Agrícola<br>
                    </div>
                    <div id="op">
                        Opico<br>
                        Km. 36 ½ Carretera a Quezaltepeque<br>
                    </div>
                </div>
            </div>

        </div>


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