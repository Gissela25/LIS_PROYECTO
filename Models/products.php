<?php

class products{
    
    private $ID_Producto;
    private $ID_Productop;
    private $ID_Productoc;
    private $Descripcion;
    private $Nombrep;
    private $Imagen;
    private $ID_Familia;
    private $ID_PC;
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

    public function getPro_idpp(): ?string{
        return $this->ID_Productop;

    }

    public function setPro_idpp(string $idpp){
        $this->ID_Productop=$idpp;
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

    public function getPro_idpc(): ?string{
        return $this->ID_PC;

    }

    public function setPro_idpc(string $idpc){
        $this->ID_PC=$idpc;
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

    public function getPro_prest(): ?float{
        return $this->Precio_ST;

    }

    public function setPro_prest(float $prest){
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

    public function showstall(){
        try{
            $consulta=$this->pdo->prepare("SELECT producto.ID_Producto,producto.Nombrep,producto.Descripcion,producto.Imagen,familia.Nombre,precio_cantidad.Precio_ST,precio_cantidad.Cantidad_ST FROM producto,familia,precio_cantidad WHERE producto.ID_Producto = precio_cantidad.ID_Producto AND producto.ID_Familia = familia.ID_Familia AND precio_cantidad.Precio_ST IS NOT NULL;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    // public function showst(){
    //     try{
    //         $consulta=$this->pdo->prepare("SELECT * FROM producto,familia WHERE producto.ID_Familia = familia.ID_Familia;");
    //         $consulta->execute();
    //         return $consulta->fetchAll(PDO::FETCH_OBJ);
    //     }catch(Exception $e){
    //         die($e->getMessage());
    //     }
    // }

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
            $consulta=$this->pdo->prepare("SELECT producto.ID_Producto, producto.Nombrep, producto.Descripcion, producto.Imagen, familia.Nombre FROM producto,familia WHERE producto.ID_Familia = familia.ID_Familia;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function generate_code($lenght=5)
    {
        $key = "";
        $pattern = "1234567890";
        $max = strlen($pattern)-1;
        do {
            for($i = 0; $i < $lenght; $i++){
                $key .= substr($pattern, mt_rand(0,$max), 1);
            }
            $complement="PROD";
            $complement.=$key;
            $consulta = $this->pdo->prepare("SELECT COUNT(*) FROM producto WHERE ID_Producto ='$complement'");
            $consulta ->execute(array($complement));
            $rows=$consulta->fetchColumn();
        } while ($rows > 0);
        return $complement;            
    }

    public function showfamilia(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM familia;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function generate_codep($lenght=3)
    {
        $key = "";
        $pattern = "1234567890";
        $max = strlen($pattern)-1;
        do {
            for($i = 0; $i < $lenght; $i++){
                $key .= substr($pattern, mt_rand(0,$max), 1);
            }
            $complement="PC";
            $complement.=$key;
            $consulta = $this->pdo->prepare("SELECT COUNT(*) FROM producto WHERE ID_Producto ='$complement'");
            $consulta ->execute(array($complement));
            $rows=$consulta->fetchColumn();
        } while ($rows > 0);
        return $complement;            
    }

    // public function Insert(products $p){
    //     try{
    //     $consulta = "Insert INTO producto(ID_Producto,Descripcion,Nombrep,Imagen,ID_Familia) values (?,?,?,?,?);";
    //     $ejecutar = $this->pdo->prepare($consulta)
    //                 ->execute(array(
    //                     $p->getPro_id(),
    //                     $p->getPro_des(),
    //                     $p->getPro_nom(),
    //                     $p->getPro_ima(),
    //                     $p->getPro_idf()
    //                 ));
        
    //                 if($ejecutar == 1)
    //                 {
    //                 $consulta = "Insert INTO precio_cantidad(ID_PC,Precio_ST,Precio_SS,Precio_LO,Precio_OP,Precio_ZA,Precio_SA,Cantidad_ST,Cantidad_SS,Cantidad_LO,Cantidad_OP,Cantidad_ZA,Cantidad_SA,ID_Producto) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
    //                 $ejecutar = $this->pdo->prepare($consulta)
    //                             ->execute(array(
    //                             $p->getPro_idpc(),
    //                             $p->getPro_prest(),
    //                             $p->getPro_press(),
    //                             $p->getPro_prelo(),
    //                             $p->getPro_preop(),
    //                             $p->getPro_preza(),
    //                             $p->getPro_presa(),
    //                             $p->getPro_canst(),
    //                             $p->getPro_canss(),
    //                             $p->getPro_canlo(),
    //                             $p->getPro_canop(),
    //                             $p->getPro_canza(),
    //                             $p->getPro_cansa(),
    //                             $p->getPro_id()
    //                 ));
    //                 }
    //     }catch(exception $e){
    //     die($e->getMessage());
    //     }
    // }

    // public function Insert(products $p){
    //     try{
    //     $consulta = "Insert INTO producto(ID_Producto,Descripcion,Nombrep,Imagen,ID_Familia) values (?,?,?,?,?);";
    //     $ejecutar = $this->pdo->prepare($consulta)
    //                 ->execute(array(
    //                     $p->getPro_id(),
    //                     $p->getPro_des(),
    //                     $p->getPro_nom(),
    //                     $p->getPro_ima(),
    //                     $p->getPro_idf()
    //                 ));
    //                 if($ejecutar == 1)
    //                                 {
    //                                 $consulta = "Insert INTO precio_cantidad(ID_PC,ID_Producto) values (?,?);";
    //                                 $ejecutar = $this->pdo->prepare($consulta)
    //                                             ->execute(array(
    //                                             $p->getPro_idpc(),
    //                                             $p->getPro_id()
    //                                 ));
    //                                 }
        
    //     }catch(exception $e){
    //     die($e->getMessage());
    //     }
    // }

    public function Updatest(products $p){
        try{
        $consulta = "UPDATE precio_cantidad SET 
           Precio_ST=?,
           Cantidad_ST=?,
           ID_Producto=?
           WHERE ID_PC=?;
        ";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_prest(),
                        $p->getPro_canst(),
                        $p->getPro_id(),
                        $p->getPro_idpc()
                        
                    ));
        }catch(exception $e){
        die($e->getMessage());
        }
    }

    public function havest($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM precio_cantidad WHERE ID_Producto=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new products();
            $p->setPro_id($r->ID_Producto);
            $p->setPro_idpc($r->ID_PC);
            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function havess($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM precio_cantidad WHERE ID_Producto=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new products();
            $p->setPro_id($r->ID_Producto);
            $p->setPro_idpc($r->ID_PC);
            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function haveop($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM precio_cantidad WHERE ID_Producto=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new products();
            $p->setPro_id($r->ID_Producto);
            $p->setPro_idpc($r->ID_PC);
            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function havelo($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM precio_cantidad WHERE ID_Producto=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new products();
            $p->setPro_id($r->ID_Producto);
            $p->setPro_idpc($r->ID_PC);
            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function havesa($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM precio_cantidad WHERE ID_Producto=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new products();
            $p->setPro_id($r->ID_Producto);
            $p->setPro_idpc($r->ID_PC);
            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function haveza($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM precio_cantidad WHERE ID_Producto=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new products();
            $p->setPro_id($r->ID_Producto);
            $p->setPro_idpc($r->ID_PC);
            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function showstw(){
        try{
            $consulta=$this->pdo->prepare("SELECT producto.ID_Producto,producto.Nombrep,producto.Descripcion,producto.Imagen,familia.Nombre FROM producto,precio_cantidad,familia WHERE familia.ID_Familia = producto.ID_Familia AND producto.ID_Producto = precio_cantidad.ID_Producto AND precio_cantidad.Precio_ST IS NULL;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function showssw(){
        try{
            $consulta=$this->pdo->prepare("SELECT producto.ID_Producto,producto.Nombrep,producto.Descripcion,producto.Imagen,familia.Nombre FROM producto,precio_cantidad,familia WHERE familia.ID_Familia = producto.ID_Familia AND producto.ID_Producto = precio_cantidad.ID_Producto AND precio_cantidad.Precio_SS IS NULL;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function showopw(){
        try{
            $consulta=$this->pdo->prepare("SELECT producto.ID_Producto,producto.Nombrep,producto.Descripcion,producto.Imagen,familia.Nombre FROM producto,precio_cantidad,familia WHERE familia.ID_Familia = producto.ID_Familia AND producto.ID_Producto = precio_cantidad.ID_Producto AND precio_cantidad.Precio_OP IS NULL;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function showlow(){
        try{
            $consulta=$this->pdo->prepare("SELECT producto.ID_Producto,producto.Nombrep,producto.Descripcion,producto.Imagen,familia.Nombre FROM producto,precio_cantidad,familia WHERE familia.ID_Familia = producto.ID_Familia AND producto.ID_Producto = precio_cantidad.ID_Producto AND precio_cantidad.Precio_LO IS NULL;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function showsaw(){
        try{
            $consulta=$this->pdo->prepare("SELECT producto.ID_Producto,producto.Nombrep,producto.Descripcion,producto.Imagen,familia.Nombre FROM producto,precio_cantidad,familia WHERE familia.ID_Familia = producto.ID_Familia AND producto.ID_Producto = precio_cantidad.ID_Producto AND precio_cantidad.Precio_SA IS NULL;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function showzaw(){
        try{
            $consulta=$this->pdo->prepare("SELECT producto.ID_Producto,producto.Nombrep,producto.Descripcion,producto.Imagen,familia.Nombre FROM producto,precio_cantidad,familia WHERE familia.ID_Familia = producto.ID_Familia AND producto.ID_Producto = precio_cantidad.ID_Producto AND precio_cantidad.Precio_ZA IS NULL;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    public function showssall(){
        try{
            $consulta=$this->pdo->prepare("SELECT producto.ID_Producto,producto.Nombrep,producto.Descripcion,producto.Imagen,familia.Nombre,precio_cantidad.Precio_SS,precio_cantidad.Cantidad_SS FROM producto,familia,precio_cantidad WHERE producto.ID_Producto = precio_cantidad.ID_Producto AND producto.ID_Familia = familia.ID_Familia AND precio_cantidad.Precio_SS IS NOT NULL;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function showopall(){
        try{
            $consulta=$this->pdo->prepare("SELECT producto.ID_Producto,producto.Nombrep,producto.Descripcion,producto.Imagen,familia.Nombre,precio_cantidad.Precio_OP,precio_cantidad.Cantidad_OP FROM producto,familia,precio_cantidad WHERE producto.ID_Producto = precio_cantidad.ID_Producto AND producto.ID_Familia = familia.ID_Familia AND precio_cantidad.Precio_OP IS NOT NULL;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function showloall(){
        try{
            $consulta=$this->pdo->prepare("SELECT producto.ID_Producto,producto.Nombrep,producto.Descripcion,producto.Imagen,familia.Nombre,precio_cantidad.Precio_LO,precio_cantidad.Cantidad_LO FROM producto,familia,precio_cantidad WHERE producto.ID_Producto = precio_cantidad.ID_Producto AND producto.ID_Familia = familia.ID_Familia AND precio_cantidad.Precio_LO IS NOT NULL;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function showsaall(){
        try{
            $consulta=$this->pdo->prepare("SELECT producto.ID_Producto,producto.Nombrep,producto.Descripcion,producto.Imagen,familia.Nombre,precio_cantidad.Precio_SA,precio_cantidad.Cantidad_SA FROM producto,familia,precio_cantidad WHERE producto.ID_Producto = precio_cantidad.ID_Producto AND producto.ID_Familia = familia.ID_Familia AND precio_cantidad.Precio_SA IS NOT NULL;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function showzaall(){
        try{
            $consulta=$this->pdo->prepare("SELECT producto.ID_Producto,producto.Nombrep,producto.Descripcion,producto.Imagen,familia.Nombre,precio_cantidad.Precio_ZA,precio_cantidad.Cantidad_ZA FROM producto,familia,precio_cantidad WHERE producto.ID_Producto = precio_cantidad.ID_Producto AND producto.ID_Familia = familia.ID_Familia AND precio_cantidad.Precio_ZA IS NOT NULL;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Updatess(products $p){
        try{
        $consulta = "UPDATE precio_cantidad SET 
           Precio_SS=?,
           Cantidad_SS=?,
           ID_Producto=?
           WHERE ID_PC=?;
        ";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_press(),
                        $p->getPro_canss(),
                        $p->getPro_id(),
                        $p->getPro_idpc()
                        
                    ));
        }catch(exception $e){
        die($e->getMessage());
        }
    }

    public function Updateop(products $p){
        try{
        $consulta = "UPDATE precio_cantidad SET 
           Precio_OP=?,
           Cantidad_OP=?,
           ID_Producto=?
           WHERE ID_PC=?;
        ";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_preop(),
                        $p->getPro_canop(),
                        $p->getPro_id(),
                        $p->getPro_idpc()
                        
                    ));
        }catch(exception $e){
        die($e->getMessage());
        }
    }

    public function Updatelo(products $p){
        try{
        $consulta = "UPDATE precio_cantidad SET 
           Precio_LO=?,
           Cantidad_LO=?,
           ID_Producto=?
           WHERE ID_PC=?;
        ";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_prelo(),
                        $p->getPro_canlo(),
                        $p->getPro_id(),
                        $p->getPro_idpc()
                        
                    ));
        }catch(exception $e){
        die($e->getMessage());
        }
    }

    public function Updatesa(products $p){
        try{
        $consulta = "UPDATE precio_cantidad SET 
           Precio_SA=?,
           Cantidad_SA=?,
           ID_Producto=?
           WHERE ID_PC=?;
        ";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_presa(),
                        $p->getPro_cansa(),
                        $p->getPro_id(),
                        $p->getPro_idpc()
                        
                    ));
        }catch(exception $e){
        die($e->getMessage());
        }
    }

    public function Updateza(products $p){
        try{
        $consulta = "UPDATE precio_cantidad SET 
           Precio_ZA=?,
           Cantidad_ZA=?,
           ID_Producto=?
           WHERE ID_PC=?;
        ";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_preza(),
                        $p->getPro_canza(),
                        $p->getPro_id(),
                        $p->getPro_idpc()
                        
                    ));
        }catch(exception $e){
        die($e->getMessage());
        }
    }

    public function Updatelop(products $p){
        try{
        $consulta = "UPDATE precio_cantidad SET 
           Precio_LO=?,
           Cantidad_LO=?,
           ID_Producto=?
           WHERE ID_PC=?;
        ";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_prelo(),
                        $p->getPro_canlo(),
                        $p->getPro_id(),
                        $p->getPro_idpc()
                        
                    ));
        }catch(exception $e){
        die($e->getMessage());
        }
    }

    public function havelop($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM precio_cantidad WHERE ID_Producto=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new products();
            $p->setPro_id($r->ID_Producto);
            $p->setPro_idpc($r->ID_PC);
            $p->setPro_prelo($r->Precio_LO);
            $p->setPro_canlo($r->Cantidad_LO);
            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Updateopp(products $p){
        try{
        $consulta = "UPDATE precio_cantidad SET 
           Precio_OP=?,
           Cantidad_OP=?,
           ID_Producto=?
           WHERE ID_PC=?;
        ";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_preop(),
                        $p->getPro_canop(),
                        $p->getPro_id(),
                        $p->getPro_idpc()
                        
                    ));
        }catch(exception $e){
        die($e->getMessage());
        }
    }

    public function haveopp($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM precio_cantidad WHERE ID_Producto=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new products();
            $p->setPro_id($r->ID_Producto);
            $p->setPro_idpc($r->ID_PC);
            $p->setPro_preop($r->Precio_OP);
            $p->setPro_canop($r->Cantidad_OP);
            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Updatessp(products $p){
        try{
        $consulta = "UPDATE precio_cantidad SET 
           Precio_SS=?,
           Cantidad_SS=?,
           ID_Producto=?
           WHERE ID_PC=?;
        ";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_press(),
                        $p->getPro_canss(),
                        $p->getPro_id(),
                        $p->getPro_idpc()
                        
                    ));
        }catch(exception $e){
        die($e->getMessage());
        }
    }

    public function havessp($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM precio_cantidad WHERE ID_Producto=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new products();
            $p->setPro_id($r->ID_Producto);
            $p->setPro_idpc($r->ID_PC);
            $p->setPro_press($r->Precio_SS);
            $p->setPro_canss($r->Cantidad_SS);
            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Updatesap(products $p){
        try{
        $consulta = "UPDATE precio_cantidad SET 
           Precio_SA=?,
           Cantidad_SA=?,
           ID_Producto=?
           WHERE ID_PC=?;
        ";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_presa(),
                        $p->getPro_cansa(),
                        $p->getPro_id(),
                        $p->getPro_idpc()
                        
                    ));
        }catch(exception $e){
        die($e->getMessage());
        }
    }

    public function havesap($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM precio_cantidad WHERE ID_Producto=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new products();
            $p->setPro_id($r->ID_Producto);
            $p->setPro_idpc($r->ID_PC);
            $p->setPro_presa($r->Precio_SA);
            $p->setPro_cansa($r->Cantidad_SA);
            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Updatestp(products $p){
        try{
        $consulta = "UPDATE precio_cantidad SET 
           Precio_ST=?,
           Cantidad_ST=?,
           ID_Producto=?
           WHERE ID_PC=?;
        ";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_prest(),
                        $p->getPro_canst(),
                        $p->getPro_id(),
                        $p->getPro_idpc()
                        
                    ));
        }catch(exception $e){
        die($e->getMessage());
        }
    }

    public function havestp($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM precio_cantidad WHERE ID_Producto=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new products();
            $p->setPro_id($r->ID_Producto);
            $p->setPro_idpc($r->ID_PC);
            $p->setPro_prest($r->Precio_ST);
            $p->setPro_canst($r->Cantidad_ST);
            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Updatezap(products $p){
        try{
        $consulta = "UPDATE precio_cantidad SET 
           Precio_ZA=?,
           Cantidad_ZA=?,
           ID_Producto=?
           WHERE ID_PC=?;
        ";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_preza(),
                        $p->getPro_canza(),
                        $p->getPro_id(),
                        $p->getPro_idpc()
                        
                    ));
        }catch(exception $e){
        die($e->getMessage());
        }
    }

    public function havezap($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM precio_cantidad WHERE ID_Producto=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new products();
            $p->setPro_id($r->ID_Producto);
            $p->setPro_idpc($r->ID_PC);
            $p->setPro_preza($r->Precio_ZA);
            $p->setPro_canza($r->Cantidad_ZA);
            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Update_product()
    {
        try{
            if($this->getPro_ima()==""){
                    if($this->getPro_idf()==""){
                        $consulta="UPDATE producto SET Descripcion ='{$this->getPro_des()}',Nombrep= '{$this->getPro_nom()}' WHERE ID_Producto='{$this->getPro_id()}';";
                        $this->pdo->prepare($consulta)->execute(array($this->getPro_id(),$this->getPro_des(),$this->getPro_nom(),$this->getPro_ima(),
                        $this->getPro_idf()));
                    }
                    else{
                        $consulta="UPDATE producto SET Descripcion ='{$this->getPro_des()}',Nombrep= '{$this->getPro_nom()}',ID_Familia='{$this->getPro_idf()}' WHERE ID_Producto='{$this->getPro_id()}';";
                        $this->pdo->prepare($consulta)->execute(array($this->getPro_id(),$this->getPro_des(),$this->getPro_nom(),$this->getPro_ima(),
                        $this->getPro_idf()));
                    }
            }
            else{
                if($this->getPro_idf()==""){

                    
                    $consulta="UPDATE producto SET Descripcion ='{$this->getPro_des()}',Nombrep= '{$this->getPro_nom()}',Imagen='{$this->getPro_ima()}' WHERE ID_Producto='{$this->getPro_id()}';";
                    $this->pdo->prepare($consulta)->execute(array($this->getPro_id(),$this->getPro_des(),$this->getPro_nom(),$this->getPro_ima(),
                    $this->getPro_idf()));
                }
                else{


                    $consulta="UPDATE producto SET Descripcion ='{$this->getPro_des()}',Nombrep= '{$this->getPro_nom()}',Imagen='{$this->getPro_ima()}',ID_Familia='{$this->getPro_idf()}' WHERE ID_Producto='{$this->getPro_id()}';";
                    $this->pdo->prepare($consulta)->execute(array($this->getPro_id(),$this->getPro_des(),$this->getPro_nom(),$this->getPro_ima(),
                    $this->getPro_idf()));
                }

            }
               
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Input_Product(){
        try{

            $consulta = "INSERT INTO producto(ID_Producto,Descripcion,Nombrep,Imagen,ID_Familia)".
            "VALUES ('{$this->getPro_id()}','{$this->getPro_des()}','{$this->getPro_nom()}','{$this->getPro_ima()}','{$this->getPro_idf()}')";
            $ejecutar = $this->pdo->prepare($consulta)->execute(array($this->getPro_id(),$this->getPro_des(),$this->getPro_nom(),$this->getPro_ima(),
            $this->getPro_idf()));

            if($ejecutar == 1){
                $consulta = "INSERT INTO precio_cantidad(ID_PC,ID_Producto)".
            "VALUES ('{$this->getPro_idpc()}','{$this->getPro_id()}')";
            $ejecutar = $this->pdo->prepare($consulta)->execute(array($this->getPro_idpc(),$this->getPro_id()));

            }

        }catch(Exception $e)
        {
            die($e->getMessage());
        }
}




}