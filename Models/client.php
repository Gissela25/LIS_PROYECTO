<?php

class client{

    private $pdo;
    private $r;
    private $DUI;
    private $Nombre;
    private $Apellido;
    private $Telefono;
    private $Correo;
    private $Clave;
    private $Direccion;
    private $Verificado;
    //private $Estado;
    //private $Acceso;
    //private $ID_Sucursal;
    private $p;
    private $pwd_encrypt;
    private $rows;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    public function getPro_idc(): ?string{
        return $this->DUI;

    }

    public function setPro_idc(string $idc){
        $this->DUI=$idc;
    }

    public function getPro_tel(): ?string{
        return $this->Telefono;

    }
    public function setPro_tel(string $tel){
        $this->Telefono=$tel;
    }
   

    //public function getPro_id(): ?int{
        //return $this->ID_Sucursal;

    //}

    //public function setPro_id(int $id){
        //$this->ID_Sucursal=$id;
    //}

    public function getPro_nom(): ?string{
        return $this->Nombre;

    }

    public function setPro_nom(string $nom){
        $this->Nombre=$nom;
    }

    public function getPro_ape(): ?string{
        return $this->Apellido;

    }

    public function setPro_ape(string $ape){
        $this->Apellido=$ape;
    }

    public function getPro_correo(): ?string{
        return $this->Correo;

    }

    public function setPro_correo(string $corre){
        $this->Correo=$corre;
    }

    public function getPro_Clave(): ?string{
        return $this->Clave;

    }

    public function setPro_Clave(string $clave){
        $this->Clave=$clave;
    }

   public function getPro_address(): ?string{
        return $this->Direccion;

    }

    public function setPro_address(string $Direccion){
        $this->Direccion=$Direccion;
    }
    
    public function getPro_ver(): ?string{
        return $this->Verificado;
    }

    public function setPro_ver(string $ver){
        $this->Verificado=$ver;
    }

    
    //public function getPro_estado(): ?string{
        //return $this->Estado;

    //}

    //public function setPro_estado(string $es){
        //$this->Estado=$es;
    //}

    //public function getPro_acce(): ?string{
        //return $this->Acceso;

    //}

    //public function setPro_acce(string $acce){
        //$this->Acceso=$acce;
    //}

    // public function Insert(client $p){
    //     try{
    //     $hash=$this->GenerarHash();
    //     $consulta = "Insert INTO cliente(dui,Nombre,Apellido,Telefono,Correo,Clave,Direccion,Verificado,Hash_Active) values (?,?,?,?,?,?,?,?,?);";
    //     $this->pdo->prepare($consulta)
    //                 ->execute(array(
    //                     $p->getPro_idc(),
    //                     $p->getPro_nom(),
    //                     $p->getPro_ape(),
    //                     $p->getPro_phone(),
    //                     $p->getPro_correo(),
    //                     $p->getPro_Clave()
    //                     $p->getPro_address(),,
    //                     $p->getPro_ver(),
    //                     //$p->getPro_estado(),
    //                     //$p->getPro_acce(),
    //                     //$p->getPro_id(),
    //                     $hash
    //                 ));
    //     }catch(exception $e){
    //     die($e->getMessage());
    //     }
    // }

    public function have($idc){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM cliente WHERE dui=?;");
            $consulta->execute(array($idc));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new client();
            $p->setPro_idc($r->dui);
            $p->setPro_nom($r->Nombre);
            $p->setPro_ape($r->Apellido);
            $p->setPro_phone($r->Telefono);
            $p->setPro_correo($r->Correo);
            $p->setPro_Clave($r->Clave);
            $p->setPro_address($r->Direccion);
            $p->setPro_ver($r->Verificado);
            //$p->setPro_estado($r->Estado);
            //$p->setPro_acce($r->Acceso);
            //$p->setPro_id($r->ID_Sucursal);

            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Update(client $p){
        try{
        $consulta = "UPDATE cliente SET 
           Nombre=?,
           Apellido=?,
           Telefono=?,
           Correo=?,
           Clave=?,
           Direccion=?,
           Verificado=?,
           --Estado=?,
           --Acceso=?,
           --ID_Sucursal=? --
           WHERE dui=?;
        ";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_nom(),
                        $p->getPro_ape(),
                        $p->getPro_phone(),
                        $p->getPro_correo(),
                        $p->getPro_Clave(),
                        $p->getPro_address(),
                        $p->getPro_ver(),
                        //$p->getPro_estado(),
                        //$p->getPro_acce(),
                        //$p->getPro_id(),
                        $p->getPro_idc()
                        
                    ));
        }catch(exception $e){
        die($e->getMessage());
        }
    }

    //public function showsucursal(){
        //try{
            //$consulta=$this->pdo->prepare("SELECT * FROM sucursal;");
            //$consulta->execute();
            //return $consulta->fetchAll(PDO::FETCH_OBJ);
        //}catch(Exception $e){
            //die($e->getMessage());
        //}
    //}

    public function show()
        {
            try{
                $consulta = $this->pdo->prepare("SELECT * FROM cliente;");
                $consulta->execute();           
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function GenerarHash()
        {
            $hash = md5(rand(1,100000));
            return $hash;
        }

        public function Save(){
            try{
                $hash=$this->GenerarHash();
                $consulta=$this->pdo->prepare("SELECT COUNT(*) from cliente WHERE DUI='{$this->getPro_idc()}' OR Correo='{$this->getPro_correo()}';");
                $consulta->execute(array($this->getPro_idc(),$this->getPro_correo()));
                $filas= $consulta ->fetchColumn();
                
                if($filas==0)
                {
                    $consulta=$this->pdo->prepare("INSERT INTO cliente VALUES('{$this->getPro_idc()}', '{$this->getPro_nom()}','{$this->getPro_ape()}','{$this->getPro_tel()}','{$this->getPro_correo()}','{$this->getPro_Clave()}','{$this->getPro_address()}','{$this->getPro_ver()}','$hash');");
                    $consulta->execute(array($this->getPro_idc(), $this->getPro_nom(), $this->getPro_ape(),$this->getPro_tel(),$this->getPro_correo(),$this->getPro_Clave(),$this->getPro_address(),$this->getPro_correo(),$this->getPro_ver(),$hash));
                    echo "<div class='alert alert-success'>Usuario ingresado con exito</div>";
                }
                else{
                    echo "<div class='alert alert-danger'><ul> <li>Credenciales en uso</li><li>Las credenciales coinciden con un usuario en existencia.</li></ul></div>";
                }

            }catch(Exception $e){
                die($e->getMessage());
            }
        }
 
}