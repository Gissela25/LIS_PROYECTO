<?php
require_once 'ConexionModel.php';
class SucursalesModel extends ModelPDO{
    public function get($id=''){
        $query='';
        if($id==''){
            // retornar todos
            $query="SELECT * FROM sucursal;";
            return $this->get_query($query);
        }
        else{
            //Retorno por llave primaria
            $query= "SELECT * FROM sucursal WHERE ID_Sucursal =:ID_Sucursal";
             return $this->get_query($query,[":ID_Sucursal"=>$id]);
        }
       
    }

    public function getBySiglas($id='')
    {
        $query= "SELECT Nombre_Sucursal FROM sucursal WHERE Siglas =:Siglas";
        return $this->get_query($query,[":Siglas"=>$id]);
    }
    public function create($arreglo=array()){
        $query = "INSERT INTO usuario(ID_Usuario, Nombre, Apellido, Correo, Clave, Verificado, Estado, Acceso, ID_Sucursal, Hash_Active) VALUES(:ID_Usuario, :Nombre, :Apellido, :Correo, :Clave, :Verificado, :Estado, :Acceso, :ID_Sucursal, :Hash_Active)";
        return $this->set_query($query,$arreglo);
    }
    public function delete($id=''){
        $query = "UPDATE sucursal SET Estado_Sucursal='0' WHERE ID_Sucursal=:ID_Sucursal";
        return $this->set_query($query,[":ID_Sucursal"=>$id]);
    }
    public function update($arreglo=array()){
        $query = "UPDATE sucursal SET Nombre_Sucursal=:Nombre_Sucursal WHERE ID_Sucursal=:ID_Sucursal;";
        return $this->set_query($query,$arreglo);
    }

    public function activar($id=''){
        $query = "UPDATE sucursal SET Estado_Sucursal='1' WHERE ID_Sucursal=:ID_Sucursal";
        return $this->set_query($query,[":ID_Sucursal"=>$id]);
    }

    public function getSucursalNotNull($id='')
    {
        $query="SELECT * FROM sucursal WHERE Estado_Sucursal='1';";
        return $this->get_query($query);
    }

}

?>