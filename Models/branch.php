<?php

class branch{

    private $pdo;
    private $r;
    private $ID_Sucursal;
    private $Nombre_Sucursal;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    public function getPro_id(): ?int{
        return $this->ID_Sucursal;

    }

    public function setPro_id(int $id){
        $this->ID_Sucursal=$id;
    }

    public function getPro_nom(): ?string{
        return $this->Nombre_Sucursal;

    }

    public function setPro_nom(string $nom){
        $this->Nombre_Sucursal=$nom;
    }

    public function show(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM sucursal;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Insert(branch $p){
        try{
        $consulta = "Insert INTO sucursal(Nombre_Sucursal) values (?);";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_nom()
                    ));
        }catch(exception $e){
        die($e->getMessage());
        }
    }

    public function have($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM sucursal WHERE ID_Sucursal=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new branch();
            $p->setPro_id($r->ID_Sucursal);
            $p->setPro_nom($r->Nombre_Sucursal);

            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Update(branch $p){
        try{
        $consulta = "UPDATE sucursal SET 
           Nombre_Sucursal=?
           WHERE ID_Sucursal=?;
        ";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_nom(),
                        $p->getPro_id()
                    ));
        }catch(exception $e){
        die($e->getMessage());
        }
    }

}
