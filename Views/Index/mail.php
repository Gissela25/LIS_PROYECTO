<?php

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$phone = $_POST['phone'];
$cont = "<!doctype html>
<html lang='es'>".
        "<head><title>Recuperando Cuenta</title>".
      "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css'
                integrity='sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn' crossorigin='anonymous'>
            <style>
                *{
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }
                body{
                    font-size: 16px;
                    font-weight: 300;
                    color: white;
                    
                    line-height: 30px;
                    text-align: center;
                }
                .contenedor{
                width: 85%;
                min-height:auto;
                text-align: center;
                margin: 0 auto;
                background: #ececec;
                border-top: 5px solid #ced831;
                border-bottom:5px solid #ced831 ;
            }
            .bold{
                color:white;
                font-size:25px;
                font-weight:bold;
            }
            .saludo{
                color: white;
                font-size:20px;
                font-weight:bold;
            }
            img{
                margin-left: auto;
                margin-right: auto;
                display: block;
                padding:0px 0px 20px 0px;
            }
            .text-dis{
                text-align: left;
                color:white;
            }
            .seccion1{
                color: white;
                padding: 10px;
                background-color:  #1b2433;
            }
            .seccion2{
                color: #1b2433;
                pad: 10px;
                background-color: white;
                font-size:35px;
                font-weight:bold;
            }
            a{
                    text-decoration: none;
            }
            p{
                color:white;
            }
            </style>
        </head>".
        "<body>".
            "<div class='container'>".
            "<div class='contenedor'>".
                "<div class='seccion1'>".
                "<span class='bold'>Consultas de Usuarios</span>".
                "<p>&nbsp;</p>".
                "<span class='saludo'><strong ></strong></span>".
                "<p>&nbsp;</p>".
                "<div class='text-dis'>".
                "<p>Nombre: $name</p>".
                 "<p>Mensaje: $message</p>".
                "<p>Fecha de envio del mensaje: ".date('d/m/Y h:i: s a')."</p>". 
                "<p>Forma de contactar al usuario: $phone</p>". 
                "</div>".
                "</div>".    
                "<div class='seccion2'>".
                "<p>&nbsp;</p>".
                "<a title='Sumersa' href='https://www.sumersa.com.sv/' target='_blank'>".
                    "<img src='https://sumersalis.000webhostapp.com/img/caru.jpg' alt='Logo_Sumersa'>".
                "</a>".
                "<p>&nbsp;</p>".
                "</div>". 
            "</div>".
            "</div>".
        "</body>".
        "</html>";

$mailheader = "From:".$name."<".$email.">\r\n";
$mailheader .= 'Content-type: text/html; charset=utf-8' . "\r\n";

$recipient = "gisselaverenice@gmail.com";

mail($recipient, $subject, $cont, $mailheader) or die("Error!");

echo'

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact form</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Assets/css/mail.css">
</head>
<body>
    <div class="container">
        <h1>Gracias por contactarnos le escribiremos lo antes posible</h1>
        <p class="back"> <a href="Contacts.php">Regresar</a>.</p>
        
    </div>
</body>
</html>



';


?>