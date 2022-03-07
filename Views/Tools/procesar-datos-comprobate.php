<?php
    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
    {
        $email = $_GET['email'];
        $hash = $_GET['hash'];
        $modelo = new User();
        $modelo->comprobarActivacion($email,$hash);
    }