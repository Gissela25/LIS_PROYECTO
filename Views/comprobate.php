<?php
require_once('Core/config.php');
extract($_GET);
if(!isset($email))
{
    $email="noreply@gmail.com";
}
if(!isset($hash))
{
    $hash="c21f969b5f03d33d43e04f8f136e7682";
}
if(isset($_POST['iniciar']))
{
    if(isset($email)&&isset($hash))
    {
        $modelo=new User();
        $modelo->InstantSession($email,$hash);
    }

}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Recuperar Cuenta</title>
    <link rel="stylesheet" href="<?=PATH?>Assets/css/comprobante.css">
</head>

<body>
<div class="d-flex justify-content-center">
        <div class="col-md-6 my-5">
        <img src="<?=PATH?>Assets/img/logo.PNG" class="rounded mx-auto d-block mb-3" alt="..." height="85px"
                    width="230px">   
        <!-- <div class="col-md-5 formulario"> -->
                <form action="<?=PATH?>?c=user&a=Comprobar&email=<?=$email?>&hash=<?=$hash?>" class="formulario" method="POST" role="form"> 
                    <div class="form-group text-center">
                        <?php require_once 'Tools/procesar-datos-comprobate.php'; 
                        ?>
                    </div>
                    <br>        
                    <div class="form-group text-center" >
                        <input type="submit" value="Iniciar Sesión" class="boton" id="iniciar" name="iniciar">
                    </div>

                    <div class="form-group text-center">
                        <a href="?c=inicio" class="edit"><i class="bi bi-reply-fill"></i>Regresar</a>
                    </div>
                </form>
            </div> 
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

</html>