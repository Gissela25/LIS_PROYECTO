<?php

class worker{

    private $pdo;
    private $r;
    private $ID_Usuario;
    private $Nombre;
    private $Apellido;
    private $Correo;
    private $Clave;
    private $Activo;
    private $Acceso;
    private $ID_Sucursal;
    private $p;
    private $rows;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    public function getPro_idu(): ?string{
        return $this->ID_Usuario;

    }

    public function setPro_idu(string $idu){
        $this->ID_Usuario=$idu;
    }

    public function getPro_id(): ?int{
        return $this->ID_Sucursal;

    }

    public function setPro_id(int $id){
        $this->ID_Sucursal=$id;
    }

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

    public function getPro_act(): ?string{
        return $this->Activo;

    }

    public function setPro_act(string $act){
        $this->Activo=$act;
    }

    public function getPro_acce(): ?string{
        return $this->Acceso;

    }

    public function setPro_acce(string $acce){
        $this->Acceso=$acce;
    }
    public function showactive(){
        try{
            $consulta=$this->pdo->prepare("SELECT usuario.ID_Usuario, usuario.Nombre, usuario.Apellido, usuario.Correo, sucursal.Nombre_Sucursal 
            FROM usuario, sucursal 
            WHERE usuario.ID_Sucursal = sucursal.ID_Sucursal AND usuario.Activo = 0;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function showdactive(){
        try{
            $consulta=$this->pdo->prepare("SELECT usuario.ID_Usuario, usuario.Nombre, usuario.Apellido, usuario.Correo, sucursal.Nombre_Sucursal 
            FROM usuario, sucursal 
            WHERE usuario.ID_Sucursal = sucursal.ID_Sucursal AND usuario.Activo = 1;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function generate_code($lenght=3)
    {
        $key = "";
        $pattern = "1234567890";
        $max = strlen($pattern)-1;
        do {
            for($i = 0; $i < $lenght; $i++){
                $key .= substr($pattern, mt_rand(0,$max), 1);
            }
            $complement="E";
            $complement.=$key;
            $consulta = $this->pdo->prepare("SELECT COUNT(*) FROM usuario WHERE ID_Usuario ='$complement'");
            $consulta ->execute(array($complement));
            $rows=$consulta->fetchColumn();
        } while ($rows > 0);
        return $complement;            
    }

    public function Insert(worker $p){
        try{
        $consulta = "Insert INTO usuario(ID_Usuario,Nombre,Apellido,Correo,Clave,ID_Sucursal) values (?,?,?,?,?,?);";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_idu(),
                        $p->getPro_nom(),
                        $p->getPro_ape(),
                        $p->getPro_correo(),
                        $p->getPro_Clave(),
                        $p->getPro_id()
                    ));
        }catch(exception $e){
        die($e->getMessage());
        }
    }

    public function have($idu){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM usuario WHERE ID_Usuario=?;");
            $consulta->execute(array($idu));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new worker();
            $p->setPro_idu($r->ID_Usuario);
            $p->setPro_nom($r->Nombre);
            $p->setPro_ape($r->Apellido);
            $p->setPro_correo($r->Correo);
            $p->setPro_Clave($r->Clave);
            $p->setPro_act($r->Activo);
            $p->setPro_acce($r->Acceso);

            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Update(worker $p){
        try{
        $consulta = "UPDATE usuario SET 
           Nombre=?,
           Apellido=?,
           Correo=?,
           Clave=?,
           Activo=?,
           Acceso=?,
           ID_Sucursal=?
           WHERE ID_Usuario=?;
        ";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_nom(),
                        $p->getPro_id(),
                        $p->getPro_idu(),
                        $p->getPro_ape(),
                        $p->getPro_correo(),
                        $p->getPro_Clave(),
                        $p->getPro_acce(),
                        $p->getPro_act(),
                    ));
        }catch(exception $e){
        die($e->getMessage());
        }
    }

    public function showsucursal(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM sucursal;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
 

}
