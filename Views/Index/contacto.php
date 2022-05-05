<?php
require_once('./Core/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactanos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=PATH?>Assets/css/mail.css">
</head>
<body>


    <div class="container">
        <h1>Contactanos</h1>
        <p>Escribenos en nuestro formulario de contacto sus dudas o preguntas con respecto a nuestros servicios</p>
        <form action="mail.php" method="POST">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name">
            <label for="phone">Telefono:</label>
            <input type="text" name="phone" id="phone">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <label for="subject">Asunto:</label>
            <input type="text" name="subject" id="subject">
            <label for="message">Mensaje</label>
            <textarea name="message" cols="30" rows="4"></textarea>
            <input type="submit" value="Enviar">
        </form>
  </div>
  <a href="https://web.whatsapp.com/send?phone=50370391253&text=" class="btn-wsp" target="_blank"><img src="<?=PATH?>Assets/img/whatsapp.svg" height="45px" width="45px"></i>
</a>   
</body>
</html>

