<?php
require_once 'ConexionModel.php';
class FamiliasModel extends ModelPDO{
    public function get($id=''){
        $query='';
        if($id==''){
            // retornar todos
            $query="SELECT * FROM familia;";
            return $this->get_query($query);
        }
        else{
            //Retorno por llave primaria
            $query= "SELECT * FROM familia WHERE ID_Familia =:ID_Familia";
             return $this->get_query($query,[":ID_Familia"=>$id]);
        }
       
    }
    public function create($arreglo=array()){
        $query = "INSERT INTO familia(ID_Familia, Nombre_Familia) VALUES(:ID_Familia, :Nombre_Familia)";
        return $this->set_query($query,$arreglo);
    }
    public function delete($id=''){
        $query = "UPDATE familia SET Estado_Familia='0' WHERE ID_Familia=:ID_Familia";
        return $this->set_query($query,[":ID_Familia"=>$id]);
    }
    public function update($arreglo=array()){
        $query = "UPDATE familia SET Nombre_Familia=:Nombre_Familia WHERE ID_Familia=:ID_Familia;";
        return $this->set_query($query,$arreglo);
    }

    public function  getNotNull()
    {
        $query="SELECT * FROM familia WHERE Estado_Familia='1';";
        return $this->get_query($query);
    }
    public function activar($id=''){
        $query = "UPDATE familia SET Estado_Familia='1' WHERE ID_Familia=:ID_Familia";
        return $this->set_query($query,[":ID_Familia"=>$id]);
    }

}

?>