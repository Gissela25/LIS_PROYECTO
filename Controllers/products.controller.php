<?php

require_once "Models/products.php";

class productscontroller{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new products;
    }

    public function Showst()
    {
        require_once "views/products-st.php";
    }

    public function Showss()
    {
        require_once "views/products-ss.php";
    }

    public function Showlo()
    {
        require_once "views/products-lo.php";
    }

    
    public function Showop()
    {
        require_once "views/products-op.php";
    }

    public function Showza()
    {
        require_once "views/products-za.php";
    }

    public function Showsa()
    {
        require_once "views/products-sa.php";
    }

    public function Show()
    {
        require_once "views/products-show.php";
    }
}