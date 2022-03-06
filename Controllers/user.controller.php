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
    }