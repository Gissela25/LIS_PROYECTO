<?php
    class User{
        private $pdo;
        private $i_email;
        private $pwd_encrypt;
        private $code_v;
        public function __construct()
        {
            $this->pdo=BasedeDatos::Conectar();
        }

        public function getEmail(): ?string
        {
            return $this->i_email;
        }

        public function setEmail(string $email)
        {
            $this->i_email=$email;
        }

        public function getPass(): ?string
        {
            return $this->pwd_encrypt;
        }

        public function setPass(string $pwd)
        {
            $this-> pwd_encrypt = $pwd;
        }

        public function getCode(): ?string
        {
            return $this->code_v;
        }

        public function setCode(string $cd)
        {
            $this-> code_v = $cd;
        }

        public function SelectSucursal($i,$id_user,$name,$apellido,$Correo)
        {
            switch ($i) {
                case 1:
                    session_start();
                    $_SESSION['usuario']=$id_user;
                    $_SESSION['nombre']=$name;
                    $_SESSION['apellido']=$apellido;
                    $_SESSION['correo']=$Correo;
                    echo "<script>location.href='?c=user&a=Mainst'</script>";
                    break;
                case 2:
                    session_start();
                    $_SESSION['usuario']=$id_user;
                    $_SESSION['nombre']=$name;
                    $_SESSION['apellido']=$apellido;
                    $_SESSION['correo']=$Correo;
                    echo "<script>location.href='?c=user&a=Mainss'</script>";
                    break;
                case 3:
                    session_start();
                    $_SESSION['usuario']=$id_user;
                    $_SESSION['nombre']=$name;
                    $_SESSION['apellido']=$apellido;
                    $_SESSION['correo']=$Correo;
                    echo "<script>location.href='?c=user&a=Mainlo'</script>";
                    break;
                case 4:
                    session_start();
                    $_SESSION['usuario']=$id_user;
                    $_SESSION['nombre']=$name;
                    $_SESSION['apellido']=$apellido;
                    $_SESSION['correo']=$Correo;
                    echo "<script>location.href='?c=user&a=Mainop'</script>";
                    break;
                case 5:
                    session_start();
                    $_SESSION['usuario']=$id_user;
                    $_SESSION['nombre']=$name;
                    $_SESSION['apellido']=$apellido;
                    $_SESSION['correo']=$Correo;
                    echo "<script>location.href='?c=user&a=Mainza'</script>";
                    break;
                case 6:
                    session_start();
                    $_SESSION['usuario']=$id_user;
                    $_SESSION['nombre']=$name;
                    $_SESSION['apellido']=$apellido;
                    $_SESSION['correo']=$Correo;
                    echo "<script>location.href='?c=user&a=Mainsa'</script>";
                    break;
            }
        }
        public function Into()
        {
            try{
                //Usuario -> Empleado
                $Correo=$this->getEmail();
                $consulta1=$this->pdo->prepare($consulta1="SELECT COUNT(*) FROM usuario WHERE Correo=?");
                $consulta1->bindParam(1,$Correo);
                $consulta1->execute();
                $filas1= $consulta1->fetchColumn();
                $sql1=$this->pdo->prepare("SELECT ID_Usuario,Nombre,Apellido,Correo,Clave,Verificado,Estado,Acceso,ID_Sucursal FROM usuario WHERE Correo=?;");
                $sql1->bindParam(1,$Correo);
                $sql1->execute();
                $ru=$sql1->fetch(PDO::FETCH_ASSOC);
               
                //Usuario -> Cliente
                $consulta2=$this->pdo->prepare("SELECT COUNT(*) FROM cliente WHERE Correo=?;");
                $consulta2->bindParam(1,$Correo);
                $consulta2->execute();
                $filas2= $consulta2->fetchColumn();
                $sql2=$this->pdo->prepare("SELECT DUI,Nombre,Apellido,Correo,Clave,Verificado FROM cliente WHERE Correo=?;");
                $sql2->bindParam(1,$Correo);
                $sql2->execute();
                $rc=$sql2->fetch(PDO::FETCH_ASSOC);
              

                if($filas1>0)
                {
                    $estado=$ru['Verificado'];               
                   if($estado==1)
                   {
                    $acceso1=$ru['Acceso'];
                    $pwd_user=$ru['Clave'];
                    $ids=$ru['ID_Sucursal'];
                    $state=$ru['Estado'];
                    $id_user=$ru['ID_Usuario'];
                    $name=$ru['Nombre'];
                    $apellido=$ru['Apellido'];
                    if($acceso1==1){

                        if(password_verify($this->getPass(),$pwd_user))
                        {
                            //echo "<ul> <li>Entrada válida</li></ul>";
                            if($state==1){
                                session_start();
                                $_SESSION['usuario']=$id_user;
                                $_SESSION['nombre']=$name;
                                $_SESSION['apellido']=$apellido;
                                $_SESSION['correo']=$Correo;
                                echo "<script>location.href='?c=branch&a=inicio'</script>";
                            }
                            else
                            {
                                echo "<ul> <li>Su cuenta de administrador ha sido desactivada</li></ul>";
                            }
                          
                        }
                        else{
                            echo "<ul> <li>Credenciales inválidas</li></ul>";
                        }
                    }
                    elseif($acceso1==0){
                        if(password_verify($this->getPass(),$pwd_user))
                        {
                            if($state==1)
                            {
                                $this->SelectSucursal($ids,$id_user,$name,$apellido,$Correo);
                            }
                          else{
                            echo "<ul> <li>Su cuenta de empleado ha sido desactivada</li></ul>";
                          }
                        }
                        else{
                            echo "<ul> <li>Credenciales inválidas</li></ul>";
                        }
                    }
                   }
                   elseif($estado==0){
                    echo "<ul> <li>Cuenta no activada</li></ul>";
                   }
                }
                else{
                    if($filas2>0)
                {
                    $estado2=$rc['Verificado'];        
                   if($estado2==1)
                   {
                    $dui_user=$rc['DUI'];
                    $name=$rc['Nombre'];
                    $apellido=$rc['Apellido'];
                    $pwd_client=$rc['Clave'];
                    if(password_verify($this->getPass(),$pwd_client))
                    {
                        session_start();
                        $_SESSION['usuario']=$dui_user;
                        $_SESSION['nombre']=$name;
                        $_SESSION['apellido']=$apellido;
                        $_SESSION['correo']=$Correo;
                        echo "<script>location.href='?c=products&a=inicioc'</script>";
                    }
                    else{
                        echo "<ul> <li>Entrada inválida</li></ul>";
                    }
                   }
                   elseif($estado2==0){
                    echo "<ul> <li>Cuenta de usuario inactiva</li></ul>";
                   }
                }
                else{
                    echo "<ul> <li>No existe ningún usuario con esas credenciales</li></ul>";
                }
                }
              
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function generatePassword($length=10)
    {
        $key = "";
        $pattern = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ()._=|*#&@$";
        $max = strlen($pattern)-1;
        for($i = 0; $i < $length; $i++){
            $key .= substr($pattern, mt_rand(0,$max), 1);
        }
        return $key;
    }

    public function generateCode($length=6)
    {
        $key = "";
        $pattern = "1234567890";
        $max = strlen($pattern)-1;
        for($i = 0; $i < $length; $i++){
            $key .= substr($pattern, mt_rand(0,$max), 1);
        }
        return $key;
    }

    public function generarCorreo($i_nombre,$i_apellido,$i_correo,$i_table){
        date_default_timezone_set("America/El_Salvador");
        $pwd = $this->generatePassword();
        $paraCliente = $i_correo;
            $tituloCliente =  "Recuperando Cuenta...";
            $mensajeCliente= "<!doctype html>
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
                    "<span class='bold'>Recuperando Clave</span>".
                    "<p>&nbsp;</p>".
                    "<span class='saludo'>Hola<strong > $i_nombre $i_apellido</strong></span>".
                    "<p>&nbsp;</p>".
                    "<div class='text-dis'>".
                    "<p>Has hecho una solicitud para recuperar tu contraseña, detalles: </p>".
                    "<p>Se te asignará una nueva clave que podrás cambiar al ingresar a tu cuenta *</p>".      
                    "<p>&nbsp;</p>".
                    "<p>Usuario: $i_correo</p>".
                     "<p>Clave: $pwd</p>".
                    "<p>Fecha y hora de solicitud: ".date('d/m/Y h:i: s a', time())."</p>".  
                    "</div>".
                    "</div>".    
                    "<div class='seccion2'>".
                    "<p>&nbsp;</p>".
                    "<a title='Sumersa' href='https://www.sumersa.com.sv/' target='_blank'>".
                        "<img src='https://textil-export.000webhostapp.com/img/logo2.jpg' alt='Logo_Sumersa'>".
                    "</a>".
                    "<p>&nbsp;</p>".
                    "</div>". 
                "</div>".
                "</div>".
            "</body>".
            "</html>";
            $pwd_encrypt=  password_hash($pwd,PASSWORD_DEFAULT, ['cost' => 10]);    
            $cabecerasCliente  = 'MIME-Version: 1.0' . "\r\n";
            $cabecerasCliente .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $cabecerasCliente .= 'From: Sumersa. Tienda en Linea<noreply@sumersa.com>'."\r\n";
            $cabecerasCliente .= 'Reply-To: noresponder@pruebaroyalcanin.com' . "\r\n";
            $cabecerasCliente .=  'X-Mailer: PHP/'.phpversion();
            $enviadoCliente   = @mail($paraCliente, $tituloCliente, $mensajeCliente, $cabecerasCliente);
            if($enviadoCliente)
            {
                echo "<ul> <li>Correo enviado exitosamente</li></ul>";
            }
            else{
                echo "<ul> <li>Necesitamos el host</li></ul>";
                //Habilitado hasta subir a host
              /*  echo "<ul> <li>$i_correo</li></ul>";
                echo "<ul> <li>$i_nombre</li></ul>";
                echo "<ul> <li>$i_apellido</li></ul>";
                echo "<ul> <li>$pwd</li></ul>";
                echo "<ul> <li>$pwd_encrypt</li></ul>";
                echo "<ul> <li>Fecha y hora de solicitud: ".date('d/m/Y h:i: s a', time())."</li></ul>";
                $query=$this->pdo->prepare("UPDATE $i_table SET Clave='$pwd_encrypt' WHERE Correo = '$i_correo' ");
                $query->execute(array($i_correo));
                */
            }
    }
    // $DateAndTime = date('m-d-Y h:i:s a', time());  
    // echo "<ul><li>Fecha y hora de solicitud: ".$DateAndTime." </ul></li>";
        public function Recover()
        {
            try{
            
            //Busqueda -> Empleado / Admin
                $Correo=$this->getEmail();
                $consulta1=$this->pdo->prepare("SELECT COUNT(*) FROM usuario WHERE Correo=?;");
                $consulta1->bindParam(1,$Correo);
                $consulta1->execute();
                $filas1= $consulta1->fetchColumn();
                $sql1=$this->pdo->prepare("SELECT Nombre,Apellido,Correo,Verificado FROM usuario WHERE Correo=?;");
                $sql1->bindParam(1,$Correo);
                $sql1->execute();
                $ru=$sql1->fetch(PDO::FETCH_ASSOC);
                //Busqueda -> Cliente
                $consulta2=$this->pdo->prepare("SELECT COUNT(*) FROM cliente WHERE Correo=?;");
                $consulta2->bindParam(1,$Correo);
                $consulta2->execute();
                $filas2= $consulta2->fetchColumn();
                $sql2=$this->pdo->prepare("SELECT Nombre,Apellido,Correo,Verificado FROM cliente WHERE Correo=?;");
                $sql2->bindParam(1,$Correo);
                $sql2->execute();
                $rc=$sql2->fetch(PDO::FETCH_ASSOC);

                //Fecha y hora de la zona
                date_default_timezone_set("America/El_Salvador");
                if($filas1>0)
                {
                  $i_nombre = $ru['Nombre'];
                  $i_apellido = $ru['Apellido'];
                  $i_correo = $ru['Correo'];
                  $i_table = "usuario";
                  $this->generarCorreo($i_nombre,$i_apellido,$i_correo,$i_table);
           
                }
                else{
                    if($filas2>0)
                    {
                        $i_nombre = $rc['Nombre'];
                        $i_apellido = $rc['Apellido'];
                        $i_correo = $rc['Correo'];
                        $i_table = "cliente";
                        $this->generarCorreo($i_nombre,$i_apellido,$i_correo,$i_table);
                    }
                    else{
                        echo "<ul> <li>No existe ningún usuario asociado a este correo </li></ul>";
                    }
                }
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }

//      Aquí inicia el proceso de activacion de cuentas

        public function generarCorreoActivacion($i_nombre,$i_apellido,$i_correo,$i_table,$hash_active)
        {
            date_default_timezone_set("America/El_Salvador");
            $paraCliente = $i_correo;
            $emailCliente=$i_correo;
            $tituloCliente =  "Activando Cuenta...";
            $mensajeCliente= "<!doctype html>
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
                    background-color:#ced831;
                    color: #1b2433;
                    
                }
                .indicaciones
                {
                    font-weight:bold;
                    font-size:25px;
                    text-align: left;
                }
                .seccion3{
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
                .btn-activate{
                    background-color:#ced831;
                    color: #1b2433;
                    font-weight:bold;
                }
                .btn-activate:hover{
                    background-color: white;
                    color: #1b2433;
                }
                </style>
            </head>".
            "<body>".
                "<div class='container'>".
                "<div class='contenedor'>".
                    "<div class='seccion1'>".
                    "<span class='bold'>Activando Cuenta</span>".
                    "<p>&nbsp;</p>".
                    "<span class='saludo'>Hola<strong > $i_nombre $i_apellido</strong></span>".
                    "<p>&nbsp;</p>".
                    "<div class='text-dis'>".
                    "<p>Has hecho una solicitud para activar tu cuenta, detalles: </p>".
                    "<p>Usuario: $emailCliente</p>".
                    "<p>Fecha y hora de solicitud: ".date('d/m/Y h:i: s a', time())."</p>".       
                    "</div>".
                    "<p class='text-dis'>Para poder activar tu cuenta debes cliquear  el botón activar</p>".
                    "<p>&nbsp;</p>".
                    "<a href='https://www.sumersa.com.sv/?c=user&a=Comprobar&user=$emailCliente&hash=$hash_active' target='_blank' class='btn-activate btn btn-primary btn-block'>Activar</a>".
                    "</div>".   
                    "<div class='seccion3'>".
                    "<p>&nbsp;</p>".
                    "<a title='Sumersa' href='https://www.sumersa.com.sv/' target='_blank'>".
                        "<img src='https://textil-export.000webhostapp.com/img/logo2.jpg' alt='Logo_Sumersa'>".
                    "</a>".
                    "<p>&nbsp;</p>".
                    "</div>". 
                "</div>".
                "</div>".
            "</body>".
            "</html>";
            $cabecerasCliente  = 'MIME-Version: 1.0' . "\r\n";
            $cabecerasCliente .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $cabecerasCliente .= 'From: Sumersa. Tienda en Linea<noreply@sumersa.com>'."\r\n";
            $cabecerasCliente .= 'Reply-To: noresponder@pruebaroyalcanin.com' . "\r\n";
            $cabecerasCliente .=  'X-Mailer: PHP/'.phpversion();
            $enviadoCliente   = @mail($paraCliente, $tituloCliente, $mensajeCliente, $cabecerasCliente);
            if($enviadoCliente)
            {
                echo "<ul> <li>Correo enviado exitosamente</li></ul>";
                
            }
            else{
                echo "<ul> <li>Necesitamos el host</li></ul>";
                header('Location: http://localhost/LIS_PROYECTO/?c=user&a=Comprobar&email='.$paraCliente.'&hash='.$hash_active);  
                    

            }

        }
//A partir de acá se comprueba
        public function comprobarActivacion($email,$hash)
        {
            /*    $consulta2=$this->pdo->prepare("SELECT COUNT(*) FROM cliente WHERE Correo=?;");
                $consulta2->bindParam(1,$Correo);
                $consulta2->execute();
                $filas2= $consulta2->fetchColumn();
                $sql2=$this->pdo->prepare("SELECT Nombre,Apellido,Correo,Verificado FROM cliente WHERE Correo=?;");
                $sql2->bindParam(1,$Correo);
                $sql2->execute();
                $rc=$sql2->fetch(PDO::FETCH_ASSOC); */
            $consulta1=$this->pdo->prepare("SELECT COUNT(*) FROM usuario WHERE Correo=? AND Hash_Active=?;");
            $consulta1->bindParam(1,$email);
            $consulta1->bindParam(2,$hash);
            $consulta1->execute();
            $filas1= $consulta1->fetchColumn();
            $consulta2=$this->pdo->prepare("SELECT COUNT(*) FROM cliente WHERE Correo=? AND Hash_Active=?;");
            $consulta2->bindParam(1,$email);
            $consulta2->bindParam(2,$hash);
            $consulta2->execute();
            $filas2= $consulta2->fetchColumn();
            if($filas1>0)
            {
            $i_table = "usuario";
            $query=$this->pdo->prepare("UPDATE $i_table SET Verificado='1' WHERE Correo = ? ");
            $query->bindParam(1,$email);
            $query->execute();

            $consulta3=$this->pdo->prepare("SELECT COUNT(*) FROM $i_table WHERE Correo=? AND Verificado='1';");
            $consulta3->bindParam(1,$email);
            $consulta3->execute();
            $filas3= $consulta3->fetchColumn();
            if($filas3>0)
            {
                $sql1=$this->pdo->prepare("SELECT Nombre,Apellido,Correo,Clave,Verificado,Acceso,Hash_Active FROM usuario WHERE Correo=?;");
                $sql1->bindParam(1,$email);
                $sql1->execute();
                $ru=$sql1->fetch(PDO::FETCH_ASSOC);
                echo "<div class='contenedor'><div class='display-1'> <h1>Hola ".$ru['Nombre']." ".$ru['Apellido']."</h1> </div>
                <h1>Ya eres parte del grupo SUMERSA</h1></div>";
            }
            }
            elseif($filas2>0)
           {
                $i_table = "cliente";
                $query=$this->pdo->prepare("UPDATE $i_table SET Verificado='1' WHERE Correo = ? ");
                $query->bindParam(1,$email);
                $query->execute();
                $consulta3=$this->pdo->prepare("SELECT COUNT(*) FROM $i_table WHERE Correo=? AND Verificado='1';");
                $consulta3->bindParam(1,$email);
                $consulta3->execute();
                $filas3= $consulta3->fetchColumn();
                if($filas3>0)
                {
                $sql1=$this->pdo->prepare("SELECT Nombre,Apellido,Correo,Clave FROM cliente WHERE Correo=?;");
                $sql1->bindParam(1,$email);
                $sql1->execute();
                $ru=$sql1->fetch(PDO::FETCH_ASSOC);
                echo "<div class='contenedor'><div class='display-1'> <h1>Hola ".$ru['Nombre']." ".$ru['Apellido']."</h1> </div>
                <h1>Ya eres parte del grupo SUMERSA</h1></div>";
                }
           }

        }
        public function InstantSession($Correo,$hash)
        {

            $consulta1=$this->pdo->prepare($consulta1="SELECT COUNT(*) FROM usuario WHERE Correo=? ;");
            $consulta1->bindParam(1,$Correo);

            $consulta1->execute();
            $filas1=$consulta1->fetchColumn();
            $sql1=$this->pdo->prepare("SELECT ID_Usuario,Nombre,Apellido,Correo,Clave,Verificado,Estado,Acceso,ID_Sucursal FROM usuario WHERE Correo=?;");
            $sql1->bindParam(1,$Correo);

            $sql1->execute();
            $ru=$sql1->fetch(PDO::FETCH_ASSOC);

            //Usuario -> Cliente
            $consulta2=$this->pdo->prepare("SELECT COUNT(*) FROM cliente WHERE Correo=? ");
            $consulta2->bindParam(1,$Correo);

            $consulta2->execute();
            $filas2= $consulta2->fetchColumn();
            $sql2=$this->pdo->prepare("SELECT DUI,Nombre,Apellido,Correo,Clave,Verificado FROM cliente WHERE Correo=? ");
            $sql2->bindParam(1,$Correo);

            $sql2->execute();
            $rc=$sql2->fetch(PDO::FETCH_ASSOC);
            $filas1;
            if($filas1>0)
            {

                $acceso1=$ru['Acceso'];
                $ids=$ru['ID_Sucursal'];
                $state=$ru['Estado'];
                $id_user=$ru['ID_Usuario'];
                $name=$ru['Nombre'];
                $apellido=$ru['Apellido'];
                if($acceso1==1)
                {
                    if($state==1)
                    {
                        session_start();
                                $_SESSION['usuario']=$id_user;
                                $_SESSION['nombre']=$name;
                                $_SESSION['apellido']=$apellido;
                                $_SESSION['correo']=$Correo;
                                echo "<script>location.href='?c=branch&a=inicio'</script>";
                    }
                    else
                    {
                        header("Location: ?c=inicio");
                    }
                    
                }elseif($acceso1==0)
                {
                    if($state==1)
                    {
                    $this->SelectSucursal($ids,$id_user,$name,$apellido,$Correo);
                    }
                    else
                    {
                        header("Location: ?c=inicio");
                    }
                }
            }elseif($filas2>0)
            {
                $dui_user=$rc['DUI'];
                $name=$rc['Nombre'];
                $apellido=$rc['Apellido'];

                    session_start();
                    $_SESSION['usuario']=$dui_user;
                    $_SESSION['nombre']=$name;
                    $_SESSION['apellido']=$apellido;
                    $_SESSION['correo']=$Correo;
                    echo "<script>location.href='?c=products&a=inicioc'</script>";
            }
        }
        public function GenerarHash()
        {
            $hash = md5(rand(1,100000));
            return $hash;
        }

        public function activarCuenta()
        {
            try{
                // Búsqueda -> usuario
                /*     $consulta2=$this->pdo->prepare("SELECT COUNT(*) FROM cliente WHERE Correo=?;");
                $consulta2->bindParam(1,$Correo);
                $consulta2->execute();
                $filas2= $consulta2->fetchColumn();
                $sql2=$this->pdo->prepare("SELECT Nombre,Apellido,Correo,Verificado FROM cliente WHERE Correo=?;");
                $sql2->bindParam(1,$Correo);
                $sql2->execute();
                $rc=$sql2->fetch(PDO::FETCH_ASSOC);*/
                $Correo=$this->getEmail();
                $consulta1=$this->pdo->prepare("SELECT COUNT(*) FROM usuario WHERE Correo=?;");
                $consulta1->bindParam(1,$Correo);
                $consulta1->execute();
                $filas1= $consulta1->fetchColumn();
                $sql1=$this->pdo->prepare("SELECT Nombre,Apellido,Correo,Clave,Verificado,Acceso,Hash_Active FROM usuario WHERE Correo=?;");
                $sql1->bindParam(1,$Correo);
                $sql1->execute();
                $ru=$sql1->fetch(PDO::FETCH_ASSOC);
                // Búsqueda -> cliente
                $consulta2=$this->pdo->prepare("SELECT COUNT(*) FROM cliente WHERE Correo=?;");
                $consulta2->bindParam(1,$Correo);
                $consulta2->execute();
                $filas2= $consulta2->fetchColumn();
                $sql2=$this->pdo->prepare("SELECT Nombre,Apellido,Correo,Clave,Verificado,Hash_Active FROM cliente WHERE Correo=?;");
                $sql2->bindParam(1,$Correo);
                $sql2->execute();
                $rc=$sql2->fetch(PDO::FETCH_ASSOC);

                //Fecha y hora de la zona
                date_default_timezone_set("America/El_Salvador");
                if($filas1>0)
                {
                $estado=$ru['Verificado']; 
                if($estado==1)
                {
                    echo "<ul> <li>La cuenta ya ha sido activada </li></ul>";
                }
                elseif($estado==0){

                    $i_nombre = $ru['Nombre'];
                    $i_apellido = $ru['Apellido'];
                    $i_correo = $ru['Correo'];
                    $i_table = "usuario";
                    $i_hash=$ru['Hash_Active'];
                    $this->generarCorreoActivacion($i_nombre,$i_apellido,$i_correo,$i_table,$i_hash);
                }
                
           
                }
                else{
                    if($filas2>0)
                    {
                        $estado=$rc['Verificado'];
                        if($estado==1){
                            echo "<ul> <li>La cuenta  ya ha sido activada </li></ul>";
                        }
                        else{
                            $i_nombre = $rc['Nombre'];
                            $i_apellido = $rc['Apellido'];
                            $i_correo = $rc['Correo'];
                            $i_table = "cliente";
                            $i_hash=$rc['Hash_Active'];
                            $this->generarCorreoActivacion($i_nombre,$i_apellido,$i_correo,$i_table,$i_hash);
                        }
                       
                    }
                    else{
                        echo "<ul> <li>No existe ningún usuario asociado a este correo </li></ul>";
                    }
                }
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function show(){
            try{
                $consulta=$this->pdo->prepare("SELECT * FROM Usuario;");
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

    }
    ?>