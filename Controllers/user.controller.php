<?php

require "Models/log.php";

    class UserController{
        public function __construct()
        {
          
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