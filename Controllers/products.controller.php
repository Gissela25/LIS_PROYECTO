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

    public function Insert()
    {
        require_once "views/products-insert.php";
    }

    public function Save(){
        $p=new products(); 
        $p->setPro_id($_POST['ID_Producto']);
        $p->setPro_des($_POST['Descripcion']);
        $p->setPro_nom($_POST['Nombrep']);
        $p->setPro_ima($_POST['Imagen']);
        $p->setPro_idf($_POST['ID_Familia']);
        $p->setPro_idpc($_POST['ID_PC']);
        // $p->setPro_idc($_POST['ID_Cantidad']);
        // $p->setPro_prest($_POST['Precio_ST']);
        // $p->setPro_press($_POST['Precio_SS']);
        // $p->setPro_prelo($_POST['Precio_LO']);
        // $p->setPro_preop($_POST['Precio_OP']);
        // $p->setPro_preza($_POST['Precio_ZA']);
        // $p->setPro_presa($_POST['Precio_SA']);
        // $p->setPro_canst($_POST['Cantidad_ST']);
        // $p->setPro_canss($_POST['Cantidad_SS']);
        // $p->setPro_canlo($_POST['Cantidad_LO']);
        // $p->setPro_canop($_POST['Cantidad_OP']);
        // $p->setPro_canza($_POST['Cantidad_ZA']);
        // $p->setPro_cansa($_POST['Cantidad_SA']);
        // $p->setPro_idpp($_POST['ID_Productop']);

        $this->modelo->Insert($p);


        header("location:?c=products&a=show");
    }

    // public function Save(){
    //     $p=new products(); 
    //     $p->setPro_id($_POST['ID_Producto']);
    //     $p->setPro_des($_POST['Descripcion']);
    //     $p->setPro_nom($_POST['Nombrep']);
    //     $p->setPro_ima($_POST['Imagen']);
    //     $p->setPro_idf($_POST['ID_Familia']);
    //     // $p->setPro_idpc($_POST['ID_PC']);
    //     // $p->setPro_idc($_POST['ID_Cantidad']);
    //     // $p->setPro_prest($_POST['Precio_ST']);
    //     // $p->setPro_press($_POST['Precio_SS']);
    //     // $p->setPro_prelo($_POST['Precio_LO']);
    //     // $p->setPro_preop($_POST['Precio_OP']);
    //     // $p->setPro_preza($_POST['Precio_ZA']);
    //     // $p->setPro_presa($_POST['Precio_SA']);
    //     // $p->setPro_canst($_POST['Cantidad_ST']);
    //     // $p->setPro_canss($_POST['Cantidad_SS']);
    //     // $p->setPro_canlo($_POST['Cantidad_LO']);
    //     // $p->setPro_canop($_POST['Cantidad_OP']);
    //     // $p->setPro_canza($_POST['Cantidad_ZA']);
    //     // $p->setPro_cansa($_POST['Cantidad_SA']);
    //     // $p->setPro_idpp($_POST['ID_Productop']);

    //     $this->modelo->Insert($p);


    //     header("location:?c=products&a=show");
    // }

    public function Insertst()
    {
        $p=new products();
        if(isset($_GET['id'])){
            $p=$this->modelo->havest($_GET['id']);
        }
        require_once "views/products-insert-st.php";
    }

    public function Savest(){
        $p=new products(); 
        $p->setPro_id($_POST['ID_Producto']);
        // $p->setPro_des($_POST['Descripcion']);
        // $p->setPro_nom($_POST['Nombrep']);
        // $p->setPro_ima($_POST['Imagen']);
        // $p->setPro_idf($_POST['ID_Familia']);
        $p->setPro_idpc($_POST['ID_PC']);
        // $p->setPro_idc($_POST['ID_Cantidad']);
        $p->setPro_prest($_POST['Precio_ST']);
        //$p->setPro_press($_POST['Precio_SS']);
       // $p->setPro_prelo($_POST['Precio_LO']);
        //$p->setPro_preop($_POST['Precio_OP']);
        //$p->setPro_preza($_POST['Precio_ZA']);
        //$p->setPro_presa($_POST['Precio_SA']);
        $p->setPro_canst($_POST['Cantidad_ST']);
        //$p->setPro_canss($_POST['Cantidad_SS']);
        //$p->setPro_canlo($_POST['Cantidad_LO']);
        //$p->setPro_canop($_POST['Cantidad_OP']);
        //$p->setPro_canza($_POST['Cantidad_ZA']);
        //$p->setPro_cansa($_POST['Cantidad_SA']);
        //$p->setPro_id($_POST['ID_Producto']);

        $this->modelo->Updatest($p);


        header("location:?c=products&a=show");
    }
}