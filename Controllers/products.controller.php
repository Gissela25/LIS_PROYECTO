<?php

require_once "Models/products.php";

class productscontroller{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new products;
    }

    public function Showst()
    {
        require_once "views/SantaTecla/products-st.php";
    }

    public function Showss()
    {
        require_once "views/SanSalvador/products-ss.php";
    }

    public function Showlo()
    {
        require_once "views/Lourdes/products-lo.php";
    }

    
    public function Showop()
    {
        require_once "views/Opico/products-op.php";
    }

    public function Showza()
    {
        require_once "views/Zaragoza/products-za.php";
    }

    public function Showsa()
    {
        require_once "views/SantaAna/products-sa.php";
    }

    public function Show()
    {
        require_once "views/products/products-show.php";
    }

    public function Insert()
    {
        require_once "views/products/products-insert.php";
    }

    public function Add()
    {
        require_once "views/products/products-insert.php";    
    }

    public function Update()
    {
        require_once "views/products/products-update.php";
    }
    // public function Save(){
    //     $p=new products(); 
    //     $p->setPro_id($_POST['ID_Producto']);
    //     $p->setPro_des($_POST['Descripcion']);
    //     $p->setPro_nom($_POST['Nombrep']);
    //     $p->setPro_ima($_POST['Imagen']);
    //     $p->setPro_idf($_POST['ID_Familia']);
    //     $p->setPro_idpc($_POST['ID_PC']);
    //     $this->modelo->Insert($p);


    //     header("location:?c=products&a=show");
    // }

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
        require_once "views/SantaTecla/products-insert-st.php";
    }

    public function Insertss()
    {
        $p=new products();
        if(isset($_GET['id'])){
            $p=$this->modelo->havess($_GET['id']);
        }
        require_once "views/SanSalvador/products-insert-ss.php";
    }

    public function Insertop()
    {
        $p=new products();
        if(isset($_GET['id'])){
            $p=$this->modelo->haveop($_GET['id']);
        }
        require_once "views/Opico/products-insert-op.php";
    }

    public function Insertlo()
    {
        $p=new products();
        if(isset($_GET['id'])){
            $p=$this->modelo->haveop($_GET['id']);
        }
        require_once "views/Lourdes/products-insert-lo.php";
    }

    public function editlo()
    {
        $p=new products();
        if(isset($_GET['id'])){
            $p=$this->modelo->havelop($_GET['id']);
        }
        require_once "views/Lourdes/products-edit-lo.php";
    }

    public function editop()
    {
        $p=new products();
        if(isset($_GET['id'])){
            $p=$this->modelo->haveopp($_GET['id']);
        }
        require_once "views/Opico/products-edit-op.php";
    }

    public function editss()
    {
        $p=new products();
        if(isset($_GET['id'])){
            $p=$this->modelo->havessp($_GET['id']);
        }
        require_once "views/SanSalvador/products-edit-ss.php";
    }

    public function editsa()
    {
        $p=new products();
        if(isset($_GET['id'])){
            $p=$this->modelo->havesap($_GET['id']);
        }
        require_once "views/SantaAna/products-edit-sa.php";
    }

    public function editst()
    {
        $p=new products();
        if(isset($_GET['id'])){
            $p=$this->modelo->havestp($_GET['id']);
        }
        require_once "views/SantaTecla/products-edit-st.php";
    }

    public function editza()
    {
        $p=new products();
        if(isset($_GET['id'])){
            $p=$this->modelo->havezap($_GET['id']);
        }
        require_once "views/Zaragoza/products-edit-za.php";
    }

    public function Insertsa()
    {
        $p=new products();
        if(isset($_GET['id'])){
            $p=$this->modelo->haveop($_GET['id']);
        }
        require_once "views/SantaAna/products-insert-sa.php";
    }

    public function Insertza()
    {
        $p=new products();
        if(isset($_GET['id'])){
            $p=$this->modelo->haveop($_GET['id']);
        }
        require_once "views/Zaragoza/products-insert-za.php";
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


        header("location:?c=products&a=showstall");
    }
    public function Savess(){
        $p=new products(); 
        $p->setPro_id($_POST['ID_Producto']);
        // $p->setPro_des($_POST['Descripcion']);
        // $p->setPro_nom($_POST['Nombrep']);
        // $p->setPro_ima($_POST['Imagen']);
        // $p->setPro_idf($_POST['ID_Familia']);
        $p->setPro_idpc($_POST['ID_PC']);
        // $p->setPro_idc($_POST['ID_Cantidad']);
        //$p->setPro_prest($_POST['Precio_ST']);
        $p->setPro_press($_POST['Precio_SS']);
       // $p->setPro_prelo($_POST['Precio_LO']);
        //$p->setPro_preop($_POST['Precio_OP']);
        //$p->setPro_preza($_POST['Precio_ZA']);
        //$p->setPro_presa($_POST['Precio_SA']);
        //$p->setPro_canst($_POST['Cantidad_ST']);
        $p->setPro_canss($_POST['Cantidad_SS']);
        //$p->setPro_canlo($_POST['Cantidad_LO']);
        //$p->setPro_canop($_POST['Cantidad_OP']);
        //$p->setPro_canza($_POST['Cantidad_ZA']);
        //$p->setPro_cansa($_POST['Cantidad_SA']);
        //$p->setPro_id($_POST['ID_Producto']);

        $this->modelo->Updatess($p);


        header("location:?c=products&a=showssall");
    }

    public function Saveop(){
        $p=new products(); 
        $p->setPro_id($_POST['ID_Producto']);
        // $p->setPro_des($_POST['Descripcion']);
        // $p->setPro_nom($_POST['Nombrep']);
        // $p->setPro_ima($_POST['Imagen']);
        // $p->setPro_idf($_POST['ID_Familia']);
        $p->setPro_idpc($_POST['ID_PC']);
        // $p->setPro_idc($_POST['ID_Cantidad']);
        //$p->setPro_prest($_POST['Precio_ST']);
        //$p->setPro_press($_POST['Precio_SS']);
       // $p->setPro_prelo($_POST['Precio_LO']);
        $p->setPro_preop($_POST['Precio_OP']);
        //$p->setPro_preza($_POST['Precio_ZA']);
        //$p->setPro_presa($_POST['Precio_SA']);
        //$p->setPro_canst($_POST['Cantidad_ST']);
        //$p->setPro_canss($_POST['Cantidad_SS']);
        //$p->setPro_canlo($_POST['Cantidad_LO']);
        $p->setPro_canop($_POST['Cantidad_OP']);
        //$p->setPro_canza($_POST['Cantidad_ZA']);
        //$p->setPro_cansa($_POST['Cantidad_SA']);
        //$p->setPro_id($_POST['ID_Producto']);

        $this->modelo->Updateop($p);


        header("location:?c=products&a=showopall");
    }

    
    public function Savelo(){
        $p=new products(); 
        $p->setPro_id($_POST['ID_Producto']);
        // $p->setPro_des($_POST['Descripcion']);
        // $p->setPro_nom($_POST['Nombrep']);
        // $p->setPro_ima($_POST['Imagen']);
        // $p->setPro_idf($_POST['ID_Familia']);
        $p->setPro_idpc($_POST['ID_PC']);
        // $p->setPro_idc($_POST['ID_Cantidad']);
        //$p->setPro_prest($_POST['Precio_ST']);
        //$p->setPro_press($_POST['Precio_SS']);
        $p->setPro_prelo($_POST['Precio_LO']);
        //$p->setPro_preop($_POST['Precio_OP']);
        //$p->setPro_preza($_POST['Precio_ZA']);
        //$p->setPro_presa($_POST['Precio_SA']);
        //$p->setPro_canst($_POST['Cantidad_ST']);
        //$p->setPro_canss($_POST['Cantidad_SS']);
        $p->setPro_canlo($_POST['Cantidad_LO']);
        //$p->setPro_canop($_POST['Cantidad_OP']);
        //$p->setPro_canza($_POST['Cantidad_ZA']);
        //$p->setPro_cansa($_POST['Cantidad_SA']);
        //$p->setPro_id($_POST['ID_Producto']);

        $this->modelo->Updatelo($p);


        header("location:?c=products&a=showloall");
    }

    public function Savesa(){
        $p=new products(); 
        $p->setPro_id($_POST['ID_Producto']);
        // $p->setPro_des($_POST['Descripcion']);
        // $p->setPro_nom($_POST['Nombrep']);
        // $p->setPro_ima($_POST['Imagen']);
        // $p->setPro_idf($_POST['ID_Familia']);
        $p->setPro_idpc($_POST['ID_PC']);
        // $p->setPro_idc($_POST['ID_Cantidad']);
        //$p->setPro_prest($_POST['Precio_ST']);
        //$p->setPro_press($_POST['Precio_SS']);
        //$p->setPro_prelo($_POST['Precio_LO']);
        //$p->setPro_preop($_POST['Precio_OP']);
        //$p->setPro_preza($_POST['Precio_ZA']);
        $p->setPro_presa($_POST['Precio_SA']);
        //$p->setPro_canst($_POST['Cantidad_ST']);
        //$p->setPro_canss($_POST['Cantidad_SS']);
        //$p->setPro_canlo($_POST['Cantidad_LO']);
        //$p->setPro_canop($_POST['Cantidad_OP']);
        //$p->setPro_canza($_POST['Cantidad_ZA']);
        $p->setPro_cansa($_POST['Cantidad_SA']);
        //$p->setPro_id($_POST['ID_Producto']);

        $this->modelo->Updatesa($p);


        header("location:?c=products&a=showsaall");
    }

    public function Saveza(){
        $p=new products(); 
        $p->setPro_id($_POST['ID_Producto']);
        // $p->setPro_des($_POST['Descripcion']);
        // $p->setPro_nom($_POST['Nombrep']);
        // $p->setPro_ima($_POST['Imagen']);
        // $p->setPro_idf($_POST['ID_Familia']);
        $p->setPro_idpc($_POST['ID_PC']);
        // $p->setPro_idc($_POST['ID_Cantidad']);
        //$p->setPro_prest($_POST['Precio_ST']);
        //$p->setPro_press($_POST['Precio_SS']);
        //$p->setPro_prelo($_POST['Precio_LO']);
        //$p->setPro_preop($_POST['Precio_OP']);
        $p->setPro_preza($_POST['Precio_ZA']);
        //$p->setPro_presa($_POST['Precio_SA']);
        //$p->setPro_canst($_POST['Cantidad_ST']);
        //$p->setPro_canss($_POST['Cantidad_SS']);
        //$p->setPro_canlo($_POST['Cantidad_LO']);
        //$p->setPro_canop($_POST['Cantidad_OP']);
        $p->setPro_canza($_POST['Cantidad_ZA']);
        //$p->setPro_cansa($_POST['Cantidad_SA']);
        //$p->setPro_id($_POST['ID_Producto']);

        $this->modelo->Updateza($p);


        header("location:?c=products&a=showsaall");
    }

    public function Showstall()
    {
        require_once "views/SantaTecla/products-show-st.php";
    }

    public function Showssall()
    {
        require_once "views/SanSalvador/products-show-ss.php";
    }

    public function Showopall()
    {
        require_once "views/Opico/products-show-op.php";
    }

    public function Showloall()
    {
        require_once "views/Lourdes/products-show-lo.php";
    }

    public function Showsaall()
    {
        require_once "views/SantaAna/products-show-sa.php";
    }

    public function Showzaall()
    {
        require_once "views/Zaragoza/products-show-za.php";
    }

    public function stokest()
    {
        require_once "views/SanSalvador/stoke-st-ss.php";
    }

    public function stokeop()
    {
        require_once "views/SanSalvador/stoke-op-ss.php";
    }

    public function stokelo()
    {
        require_once "views/SanSalvador/stoke-lo-ss.php";
    }

    public function stokesa()
    {
        require_once "views/SanSalvador/stoke-sa-ss.php";
    }
    
    public function stokeza()
    {
        require_once "views/SanSalvador/stoke-za-ss.php";
    }

    public function stokelosa()
    {
        require_once "views/SantaAna/stoke-lo-sa.php";
    }

    public function stokeopsa()
    {
        require_once "views/SantaAna/stoke-op-sa.php";
    }

    public function stokesssa()
    {
        require_once "views/SantaAna/stoke-ss-sa.php";
    }

    public function stokestsa()
    {
        require_once "views/SantaAna/stoke-st-sa.php";
    }

    public function stokezasa()
    {
        require_once "views/SantaAna/stoke-za-sa.php";
    }

    public function stokessst()
    {
        require_once "views/SantaTecla/stoke-ss-st.php";
    }

    public function stokesast()
    {
        require_once "views/SantaTecla/stoke-sa-st.php";
    }

    public function stokeopst()
    {
        require_once "views/SantaTecla/stoke-op-st.php";
    }

    public function stokelost()
    {
        require_once "views/SantaTecla/stoke-lo-st.php";
    }

    public function stokezast()
    {
        require_once "views/SantaTecla/stoke-za-st.php";
    }

    public function stokestop()
    {
        require_once "views/Opico/stoke-st-op.php";
    }

    public function stokessop()
    {
        require_once "views/Opico/stoke-ss-op.php";
    }

    public function stokesaop()
    {
        require_once "views/Opico/stoke-sa-op.php";
    }

    public function stokeloop()
    {
        require_once "views/Opico/stoke-lo-op.php";
    }

    public function stokezaop()
    {
        require_once "views/Opico/stoke-za-op.php";
    }

    public function stokezalo()
    {
        require_once "views/Lourdes/stoke-za-lo.php";
    }
    
    public function stokesalo()
    {
        require_once "views/Lourdes/stoke-sa-lo.php";
    }
    
    public function stokesslo()
    {
        require_once "views/Lourdes/stoke-ss-lo.php";
    }
    
    public function stokeoplo()
    {
        require_once "views/Lourdes/stoke-op-lo.php";
    }

    public function stokestlo()
    {
        require_once "views/Lourdes/stoke-st-lo.php";
    }

    public function stokestza()
    {
        require_once "views/Zaragoza/stoke-st-za.php";
    }

    
    public function stokessza()
    {
        require_once "views/Zaragoza/stoke-ss-za.php";
    }

    
    public function stokesaza()
    {
        require_once "views/Zaragoza/stoke-sa-za.php";
    }

    
    public function stokeopza()
    {
        require_once "views/Zaragoza/stoke-op-za.php";
    }

    
    public function stokeloza()
    {
        require_once "views/Zaragoza/stoke-lo-za.php";
    }

    public function stokestad()
    {
        require_once "views/products/stock-st.php";
    }

    public function stokessad()
    {
        require_once "views/products/stock-ss.php";
    }

    public function stokesaad()
    {
        require_once "views/products/stock-sa.php";
    }

    public function stokezaad()
    {
        require_once "views/products/stock-za.php";
    }

    public function stokeload()
    {
        require_once "views/products/stock-lo.php";
    }

    public function stokeopad()
    {
        require_once "views/products/stock-op.php";
    }

    public function Savelop(){
        $p=new products(); 
        $p->setPro_id($_POST['ID_Producto']);
        // $p->setPro_des($_POST['Descripcion']);
        // $p->setPro_nom($_POST['Nombrep']);
        // $p->setPro_ima($_POST['Imagen']);
        // $p->setPro_idf($_POST['ID_Familia']);
        $p->setPro_idpc($_POST['ID_PC']);
        // $p->setPro_idc($_POST['ID_Cantidad']);
        //$p->setPro_prest($_POST['Precio_ST']);
        //$p->setPro_press($_POST['Precio_SS']);
        $p->setPro_prelo($_POST['Precio_LO']);
        //$p->setPro_preop($_POST['Precio_OP']);
        //$p->setPro_preza($_POST['Precio_ZA']);
        //$p->setPro_presa($_POST['Precio_SA']);
        //$p->setPro_canst($_POST['Cantidad_ST']);
        //$p->setPro_canss($_POST['Cantidad_SS']);
        $p->setPro_canlo($_POST['Cantidad_LO']);
        //$p->setPro_canop($_POST['Cantidad_OP']);
        //$p->setPro_canza($_POST['Cantidad_ZA']);
        //$p->setPro_cansa($_POST['Cantidad_SA']);
        //$p->setPro_id($_POST['ID_Producto']);

        $this->modelo->Updatelop($p);


        header("location:?c=products&a=showloall");
    }

    public function Saveopp(){
        $p=new products(); 
        $p->setPro_id($_POST['ID_Producto']);
        // $p->setPro_des($_POST['Descripcion']);
        // $p->setPro_nom($_POST['Nombrep']);
        // $p->setPro_ima($_POST['Imagen']);
        // $p->setPro_idf($_POST['ID_Familia']);
        $p->setPro_idpc($_POST['ID_PC']);
        // $p->setPro_idc($_POST['ID_Cantidad']);
        //$p->setPro_prest($_POST['Precio_ST']);
        //$p->setPro_press($_POST['Precio_SS']);
        //$p->setPro_prelo($_POST['Precio_LO']);
        $p->setPro_preop($_POST['Precio_OP']);
        //$p->setPro_preza($_POST['Precio_ZA']);
        //$p->setPro_presa($_POST['Precio_SA']);
        //$p->setPro_canst($_POST['Cantidad_ST']);
        //$p->setPro_canss($_POST['Cantidad_SS']);
        //$p->setPro_canlo($_POST['Cantidad_LO']);
        $p->setPro_canop($_POST['Cantidad_OP']);
        //$p->setPro_canza($_POST['Cantidad_ZA']);
        //$p->setPro_cansa($_POST['Cantidad_SA']);
        //$p->setPro_id($_POST['ID_Producto']);

        $this->modelo->Updateopp($p);


        header("location:?c=products&a=showopall");
    }

    public function Savessp(){
        $p=new products(); 
        $p->setPro_id($_POST['ID_Producto']);
        // $p->setPro_des($_POST['Descripcion']);
        // $p->setPro_nom($_POST['Nombrep']);
        // $p->setPro_ima($_POST['Imagen']);
        // $p->setPro_idf($_POST['ID_Familia']);
        $p->setPro_idpc($_POST['ID_PC']);
        // $p->setPro_idc($_POST['ID_Cantidad']);
        //$p->setPro_prest($_POST['Precio_ST']);
        $p->setPro_press($_POST['Precio_SS']);
        //$p->setPro_prelo($_POST['Precio_LO']);
        //$p->setPro_preop($_POST['Precio_OP']);
        //$p->setPro_preza($_POST['Precio_ZA']);
        //$p->setPro_presa($_POST['Precio_SA']);
        //$p->setPro_canst($_POST['Cantidad_ST']);
        $p->setPro_canss($_POST['Cantidad_SS']);
        //$p->setPro_canlo($_POST['Cantidad_LO']);
        //$p->setPro_canop($_POST['Cantidad_OP']);
        //$p->setPro_canza($_POST['Cantidad_ZA']);
        //$p->setPro_cansa($_POST['Cantidad_SA']);
        //$p->setPro_id($_POST['ID_Producto']);

        $this->modelo->Updatessp($p);


        header("location:?c=products&a=showssall");
    }

    public function Savesap(){
        $p=new products(); 
        $p->setPro_id($_POST['ID_Producto']);
        // $p->setPro_des($_POST['Descripcion']);
        // $p->setPro_nom($_POST['Nombrep']);
        // $p->setPro_ima($_POST['Imagen']);
        // $p->setPro_idf($_POST['ID_Familia']);
        $p->setPro_idpc($_POST['ID_PC']);
        // $p->setPro_idc($_POST['ID_Cantidad']);
        //$p->setPro_prest($_POST['Precio_ST']);
        //$p->setPro_press($_POST['Precio_SS']);
        //$p->setPro_prelo($_POST['Precio_LO']);
        //$p->setPro_preop($_POST['Precio_OP']);
        //$p->setPro_preza($_POST['Precio_ZA']);
        $p->setPro_presa($_POST['Precio_SA']);
        //$p->setPro_canst($_POST['Cantidad_ST']);
        //$p->setPro_canss($_POST['Cantidad_SS']);
        //$p->setPro_canlo($_POST['Cantidad_LO']);
        //$p->setPro_canop($_POST['Cantidad_OP']);
        //$p->setPro_canza($_POST['Cantidad_ZA']);
        $p->setPro_cansa($_POST['Cantidad_SA']);
        //$p->setPro_id($_POST['ID_Producto']);

        $this->modelo->Updatesap($p);


        header("location:?c=products&a=showsaall");
    }

    public function Savestp(){
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
        //$p->setPro_prelo($_POST['Precio_LO']);
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

        $this->modelo->Updatestp($p);


        header("location:?c=products&a=showstall");
    }

    public function Savezap(){
        $p=new products(); 
        $p->setPro_id($_POST['ID_Producto']);
        // $p->setPro_des($_POST['Descripcion']);
        // $p->setPro_nom($_POST['Nombrep']);
        // $p->setPro_ima($_POST['Imagen']);
        // $p->setPro_idf($_POST['ID_Familia']);
        $p->setPro_idpc($_POST['ID_PC']);
        // $p->setPro_idc($_POST['ID_Cantidad']);
        //$p->setPro_prest($_POST['Precio_ST']);
        //$p->setPro_press($_POST['Precio_SS']);
        //$p->setPro_prelo($_POST['Precio_LO']);
        //$p->setPro_preop($_POST['Precio_OP']);
        $p->setPro_preza($_POST['Precio_ZA']);
        //$p->setPro_presa($_POST['Precio_SA']);
        //$p->setPro_canst($_POST['Cantidad_ST']);
        //$p->setPro_canss($_POST['Cantidad_SS']);
        //$p->setPro_canlo($_POST['Cantidad_LO']);
        //$p->setPro_canop($_POST['Cantidad_OP']);
        $p->setPro_canza($_POST['Cantidad_ZA']);
        //$p->setPro_cansa($_POST['Cantidad_SA']);
        //$p->setPro_id($_POST['ID_Producto']);

        $this->modelo->Updatezap($p);


        header("location:?c=products&a=showzaall");
    }

    public function clientsst()
    {
        require_once "views/products/show-st-c.php";
    }

    public function clientsss()
    {
        require_once "views/products/show-ss-c.php";
    }

    public function clientssa()
    {
        require_once "views/products/show-sa-c.php";
    }

    public function clientsza()
    {
        require_once "views/products/show-za-c.php";
    }

    public function clientslo()
    {
        require_once "views/products/show-lo-c.php";
    }

    public function clientsop()
    {
        require_once "views/products/show-op-c.php";
    }

    public function Detailsst()
    {
        require_once "views/products/details-st.php";
    }

    public function Detailssa()
    {
        require_once "views/products/details-sa.php";
    }

    public function Detailsss()
    {
        require_once "views/products/details-ss.php";
    }

    public function Detailslo()
    {
        require_once "views/products/details-lo.php";
    }

    public function Detailsza()
    {
        require_once "views/products/details-za.php";
    }

    public function Detailsop()
    {
        require_once "views/products/details-op.php";
    }

    public function showstu()
    {
        require_once "views/clients/show-st.php";
    }
    public function showsau()
    {
        require_once "views/clients/show-sa.php";
    }

    public function showssu()
    {
        require_once "views/clients/show-ss.php";
    }

    public function showzau()
    {
        require_once "views/clients/show-za.php";
    }

    public function showlou()
    {
        require_once "views/clients/show-lo.php";
    }

    public function showopu()
    {
        require_once "views/clients/show-op.php";
    }

    public function empresa()
    {
        require_once "views/empresa.php";
    }

    public function inicioc()
    {
        require_once "views/clients/index.php";
    }
    
    public function Detailsstc()
    {
        require_once "views/clients/details-st.php";
    }

    public function Detailssac()
    {
        require_once "views/clients/details-sa.php";
    }

    public function Detailsssc()
    {
        require_once "views/clients/details-ss.php";
    }

    public function Detailsloc()
    {
        require_once "views/clients/details-lo.php";
    }

    public function Detailszac()
    {
        require_once "views/clients/details-za.php";
    }

    public function Detailsopc()
    {
        require_once "views/clients/details-op.php";
    }

    public function Maintemp()
    {
        require_once "Views/temp/index.php";
    }
    public function St()
    {
        require_once "Views/temp/show-st.php";
    }
    public function Sa()
    {
        require_once "Views/temp/show-sa.php";
    }
    public function Za()
    {
        require_once "Views/temp/show-za.php";
    }
    public function Lo()
    {
        require_once "Views/temp/show-lo.php";
    }
    public function Op()
    {
        require_once "Views/temp/show-op.php";
    }
    public function Ss()
    {
        require_once "Views/temp/show-ss.php";
    }

    public function Dst()
    {
        require_once "Views/temp/details-st.php";
    }
    public function Dsa()
    {
        require_once "Views/temp/details-sa.php";
    }
    public function Dza()
    {
        require_once "Views/temp/details-za.php";
    }
    public function Dlo()
    {
        require_once "Views/temp/details-lo.php";
    }
    public function Dop()
    {
        require_once "Views/temp/details-op.php";
    }
    public function Dss()
    {
        require_once "Views/temp/details-ss.php";
    }
    


}