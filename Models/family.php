<?php

class family{

    private $pdo;
    private $r;
    private $ID_Familia;
    private $Nombre;
    private $rows;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    public function getPro_id(): ?string{
        return $this->ID_Familia;

    }

    public function setPro_id(string $id){
        $this->ID_Familia=$id;
    }

    public function getPro_nom(): ?string{
        return $this->Nombre;

    }

    public function setPro_nom(string $nom){
        $this->Nombre=$nom;
    }

    public function show(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM familia;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Insert(family $p){
        try{
        $consulta = "Insert INTO familia(ID_Familia,Nombre) values (?,?);";
        $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getPro_id(),
                        $p->getPro_nom()
                    ));
        }catch(exception $e){
        die($e->getMessage());
        }
    }

    public function have($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM familia WHERE ID_Familia=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p = new family();
            $p->setPro_id($r->ID_Familia);
            $p->setPro_nom($r->Nombre);

            return $p;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Update(family $p){
        try{
        $consulta = "UPDATE familia SET 
           Nombre=?
           WHERE ID_Familia=?;
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

    public function generate_code($lenght=3)
    {
        $key = "";
        $pattern = "1234567890";
        $max = strlen($pattern)-1;
        do {
            for($i = 0; $i < $lenght; $i++){
                $key .= substr($pattern, mt_rand(0,$max), 1);
            }
            $complement="F";
            $complement.=$key;
            $consulta = $this->pdo->prepare("SELECT COUNT(*) FROM familia WHERE ID_Familia ='$complement'");
            $consulta ->execute(array($complement));
            $rows=$consulta->fetchColumn();
        } while ($rows > 0);
        return $complement;            
    }

    public function Eliminar($id){
        try{
            $consulta="DELETE FROM familia WHERE ID_Familia=?;";
            $this->pdo->prepare($consulta)
                 ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }



}
