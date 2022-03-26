<?php

require_once "Models/user.php";

    class UserController{
        private $modelo;
        public function __construct()
        {
          $this->modelo= new User;
        }

        public function Ingresar()
        {
            require_once "Views/login.php";
        }

        public function Recover()
        {
            require_once "Views/recover.php";
        }

        public function Activar()
        {
            require_once "Views/active.php";
        }

        public function Comprobar()
        {
            require_once "Views/comprobate.php";
        }
        public function Close()
        {
            session_start();
            
            if(session_destroy())
            {
             echo "<script>location.href='?c=inicio'</script>";
            }
        }

        public function registrar()
        {
            require_once "Views/Registrar.php";
        }

        public function Main()
        {
            require_once "Views/Constant/admin/index.php";
        }
        public function Mainss()
        {
            require_once "Views/Constant/empleados/index.php";
        }
        public function Mainst()
        {
            require_once "Views/Constant/empleados/index.php";
        }
        public function Mainsa()
        {
            require_once "Views/Constant/empleados/index.php";
        }
        public function Mainop()
        {
            require_once "Views/Constant/empleados/index.php";
        }
        public function Mainlo()
        {
            require_once "Views/Constant/empleados/index.php";
        }
        public function Mainza()
        {
            require_once "Views/Constant/empleados/index.php";
        }
    }