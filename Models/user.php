<?php
    class User{
        private $pdo;
        private $i_email;
        private $pwd_encrypt;
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

        public function Into()
        {
            try{
                //Usuario -> Empleado
                $consulta1=$this->pdo->prepare("SELECT COUNT(*) FROM usuario WHERE Correo='{$this->getEmail()}';");
                $consulta1->execute(array($this->getEmail()));
                $filas1= $consulta1->fetchColumn();
                $sql1=$this->pdo->prepare("SELECT Correo,Clave,Activo,Acceso FROM usuario WHERE Correo='{$this->getEmail()}';");
                $sql1->execute(array($this->getEmail()));
                $ru=$sql1->fetch(PDO::FETCH_ASSOC);
               
                //Usuario -> Cliente
                $consulta2=$this->pdo->prepare("SELECT COUNT(*) FROM cliente WHERE Correo='{$this->getEmail()}';");
                $consulta2->execute(array($this->getEmail()));
                $filas2= $consulta2->fetchColumn();
                $sql2=$this->pdo->prepare("SELECT Correo,Clave,Activo FROM cliente WHERE Correo='{$this->getEmail()}';");
                $sql2->execute(array($this->getEmail()));
                $rc=$sql2->fetch(PDO::FETCH_ASSOC);
              

                if($filas1>0)
                {
                    $estado=$ru['Activo'];               
                   if($estado==1)
                   {
                    echo "<ul> <li>Cuenta de usuario activa</li></ul>";
                    $acceso1=$ru['Acceso'];
                    $pwd_user=$ru['Clave'];
                    if($acceso1==1){
                        echo "<ul> <li>Cuenta de usuario admin</li></ul>";
                        if(password_verify($this->getPass(),$pwd_user))
                        {
                            echo "<ul> <li>Entrada válida</li></ul>";
                        }
                        else{
                            echo "<ul> <li>Entrada inválida</li></ul>";
                        }
                    }
                    elseif($acceso1==0){
                        echo "<ul> <li>Cuenta de usuario estándar</li></ul>";
                        if(password_verify($this->getPass(),$pwd_user))
                        {
                            echo "<ul> <li>Entrada válida</li></ul>";
                        }
                        else{
                            echo "<ul> <li>Entrada inválida</li></ul>";
                        }
                    }
                   }
                   elseif($estado==0){
                    echo "<ul> <li>Cuenta de usuario inactiva</li></ul>";
                   }
                }
                else{
                    if($filas2>0)
                {
                    $estado2=$rc['Activo'];        
                   if($estado2==1)
                   {
                    echo "<ul> <li>Cuenta de usuario activa</li></ul>";
                    $pwd_client=$rc['Clave'];
                    if(password_verify($this->getPass(),$pwd_client))
                    {
                        echo "<ul> <li>Entrada válida</li></ul>";
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
                $consulta1=$this->pdo->prepare("SELECT COUNT(*) FROM usuario WHERE Correo='{$this->getEmail()}';");
                $consulta1->execute(array($this->getEmail()));
                $filas1= $consulta1->fetchColumn();
                $sql1=$this->pdo->prepare("SELECT Nombre,Apellido,Correo,Clave,Activo,Acceso FROM usuario WHERE Correo='{$this->getEmail()}';");
                $sql1->execute(array($this->getEmail()));
                $ru=$sql1->fetch(PDO::FETCH_ASSOC);
                //Busqueda -> Cliente
                $consulta2=$this->pdo->prepare("SELECT COUNT(*) FROM cliente WHERE Correo='{$this->getEmail()}';");
                $consulta2->execute(array($this->getEmail()));
                $filas2= $consulta2->fetchColumn();
                $sql2=$this->pdo->prepare("SELECT Nombre,Apellido,Correo,Clave,Activo FROM cliente WHERE Correo='{$this->getEmail()}';");
                $sql2->execute(array($this->getEmail()));
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

    }