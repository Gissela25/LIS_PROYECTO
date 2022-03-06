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
                    echo "<ul> <li>Cuenta de cliente activa</li></ul>";
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
                    echo "<ul> <li>Cuenta de cliente inactiva</li></ul>";
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

    }