<?php

class products{
    
    private $ID_Producto;
    private $Descripcion;
    private $Nombrep;
    private $Imagen;
    private $ID_Familia;
    private $ID_Precio;
    private $ID_Cantidad;
    private $pdo;
    private $r;
    private $Cantidad_ST;
    private $Precio_ST;
    private $Cantidad_SS;
    private $Precio_SS;
    private $Cantidad_LO;
    private $Precio_LO;
    private $Cantidad_OP;
    private $Precio_OP;
    private $Cantidad_ZA;
    private $Precio_ZA;
    private $Cantidad_SA;
    private $Precio_SA;


    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();

    }

    public function getPro_id(): ?string{
        return $this->ID_Producto;

    }

    public function setPro_id(string $id){
        $this->ID_Producto=$id;
    }

    public function getPro_des(): ?string{
        return $this->Descripcion;

    }

    public function setPro_des(string $des){
        $this->Descripcion=$des;
    }

    public function getPro_nom(): ?string{
        return $this->Nombrep;

    }

    public function setPro_nom(string $nom){
        $this->Nombrep=$nom;
    }

    public function getPro_ima(): ?string{
        return $this->Imagen;

    }

    public function setPro_ima(string $ima){
        $this->Imagen=$ima;
    }

    public function getPro_idf(): ?string{
        return $this->ID_Familia;

    }

    public function setPro_idf(string $idf){
        $this->ID_Familia=$idf;
    }

    public function getPro_idp(): ?string{
        return $this->ID_Precio;

    }

    public function setPro_idp(string $idp){
        $this->ID_Precio=$idp;
    }

    public function getPro_idc(): ?string{
        return $this->ID_Cantidad;

    }

    public function setPro_idc(string $idc){
        $this->ID_Cantidad=$idc;
    }

    public function getPro_canst(): ?string{
        return $this->Cantidad_ST;

    }

    public function setPro_canst(string $cantst){
        $this->Cantidad_ST=$cantst;
    }

    public function getPro_prest(): ?string{
        return $this->Precio_ST;

    }

    public function setPro_prest(string $prest){
        $this->Precio_ST=$prest;
    }

    public function getPro_canss(): ?string{
        return $this->Cantidad_SS;

    }

    public function setPro_canss(string $cantss){
        $this->Cantidad_SS=$cantss;
    }

    public function getPro_press(): ?string{
        return $this->Precio_SS;

    }

    public function setPro_press(string $press){
        $this->Precio_SS=$press;
    }

    public function getPro_canlo(): ?string{
        return $this->Cantidad_LO;

    }

    public function setPro_canlo(string $cantlo){
        $this->Cantidad_LO=$cantlo;
    }

    public function getPro_prelo(): ?string{
        return $this->Precio_LO;

    }

    public function setPro_prelo(string $prelo){
        $this->Precio_LO=$prelo;
    }

    public function getPro_canop(): ?string{
        return $this->Cantidad_OP;

    }

    public function setPro_canop(string $cantop){
        $this->Cantidad_OP=$cantop;
    }

    public function getPro_preop(): ?string{
        return $this->Precio_OP;

    }

    public function setPro_preop(string $preop){
        $this->Precio_OP=$preop;
    }

    public function getPro_canza(): ?string{
        return $this->Cantidad_ZA;

    }

    public function setPro_canza(string $cantza){
        $this->Cantidad_ZA=$cantza;
    }

    public function getPro_preza(): ?string{
        return $this->Precio_ZA;

    }

    public function setPro_preza(string $preza){
        $this->Precio_ZA=$preza;
    }

    public function getPro_cansa(): ?string{
        return $this->Cantidad_SA;

    }

    public function setPro_cansa(string $cantsa){
        $this->Cantidad_SA=$cantsa;
    }

    public function getPro_presa(): ?string{
        return $this->Precio_SA;

    }

    public function setPro_presa(string $presa){
        $this->Precio_SA=$presa;
    }

    public function showst(){
        try{
            $consulta=$this->pdo->prepare("SELECT producto.ID_Producto,producto.Nombrep,producto.Descripcion,producto.Imagen,familia.Nombre,precio_sucursal.Precio_ST,cantidad_sucursal.Cantidad_ST FROM producto,cantidad_sucursal,precio_sucursal,familia WHERE producto.ID_Familia = familia.ID_Familia;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function showss(){
        try{
            $consulta=$this->pdo->prepare("SELECT producto.ID_Producto,producto.Nombrep,producto.Descripcion,producto.Imagen,familia.Nombre,precio_sucursal.Precio_SS,cantidad_sucursal.Cantidad_SS FROM producto,cantidad_sucursal,precio_sucursal,familia WHERE producto.ID_Familia = familia.ID_Familia;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function showlo(){
        try{
            $consulta=$this->pdo->prepare("SELECT producto.ID_Producto,producto.Nombrep,producto.Descripcion,producto.Imagen,familia.Nombre,precio_sucursal.Precio_LO,cantidad_sucursal.Cantidad_LO FROM producto,cantidad_sucursal,precio_sucursal,familia WHERE producto.ID_Familia = familia.ID_Familia;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function showop(){
        try{
            $consulta=$this->pdo->prepare("SELECT producto.ID_Producto,producto.Nombrep,producto.Descripcion,producto.Imagen,familia.Nombre,precio_sucursal.Precio_OP,cantidad_sucursal.Cantidad_OP FROM producto,cantidad_sucursal,precio_sucursal,familia WHERE producto.ID_Familia = familia.ID_Familia;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function showza(){
        try{
            $consulta=$this->pdo->prepare("SELECT producto.ID_Producto,producto.Nombrep,producto.Descripcion,producto.Imagen,familia.Nombre,precio_sucursal.Precio_ZA,cantidad_sucursal.Cantidad_ZA FROM producto,cantidad_sucursal,precio_sucursal,familia WHERE producto.ID_Familia = familia.ID_Familia;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function showsa(){
        try{
            $consulta=$this->pdo->prepare("SELECT producto.ID_Producto,producto.Nombrep,producto.Descripcion,producto.Imagen,familia.Nombre,precio_sucursal.Precio_SA,cantidad_sucursal.Cantidad_SA FROM producto,cantidad_sucursal,precio_sucursal,familia WHERE producto.ID_Familia = familia.ID_Familia;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function show(){
        try{
            $consulta=$this->pdo->prepare("SELECT producto.ID_Producto,producto.Nombrep,producto.Imagen,familia.Nombre,precio_sucursal.Precio_SS,cantidad_sucursal.Cantidad_SS,precio_sucursal.Precio_ST,cantidad_sucursal.Cantidad_ST,precio_sucursal.Precio_LO,cantidad_sucursal.Cantidad_LO,precio_sucursal.Precio_OP,cantidad_sucursal.Cantidad_OP,precio_sucursal.Precio_ZA,cantidad_sucursal.Cantidad_ZA,precio_sucursal.Precio_SA,cantidad_sucursal.Cantidad_SA FROM producto,cantidad_sucursal,precio_sucursal,familia WHERE producto.ID_Familia = familia.ID_Familia;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}