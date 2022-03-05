<?php
    class Log{
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

        public function Login($i_email)
        {
            try{
                $consulta1=$this->pdo->prepare("SELECT COUNT(*) FROM usuario WHERE Correo='$i_email';");
                $consulta1->execute(array($i_email));
                $filas= $consulta1->fetchColumn();
                $sql=$this->pdo->prepare("SELECT Correo,Clave,Activo,Acceso FROM usuario WHERE Correo='$i_email';");
                $sql->execute(array($i_email));
                $r=$sql->fetch(PDO::FETCH_ASSOC);
                if($filas>0)
                {
                   if($r['Activo']==1)
                   {
                    header('Location:http://localhost/LIS_PROYECTO/ ');
                   }
                   elseif($r['Activo']==0)
                   {
                    echo "<ul> <li>Esta cuenta se encuentra desactivada: Activela con su correo.</li></ul>";
                   }
                }
                else{

                }
              
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }

    }