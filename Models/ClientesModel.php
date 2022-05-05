<?php
require_once 'ConexionModel.php';
class ClientesModel extends ModelPDO{
    public function get($id=''){
        $query='';
        if($id==''){
            // retornar todos
            $query="SELECT * FROM cliente C INNER JOIN tipo_usuario T ON C.Acceso=T.id_tipo_usuario;";
            return $this->get_query($query);
        }
        else{
            //Retorno por llave primaria
            $query= "SELECT * FROM cliente C INNER JOIN tipo_usuario T ON C.Acceso=T.id_tipo_usuario 
              WHERE DUI =:DUI";
             return $this->get_query($query,[":DUI"=>$id]);
        }
       
    }

    public function getData($id='')
    {
        $query= "SELECT * FROM cliente C INNER JOIN tipo_usuario T ON C.Acceso=T.id_tipo_usuario 
        WHERE Correo =:Correo";
       return $this->get_query($query,[":Correo"=>$id]);
    }

    public function create($arreglo=array()){
        $query = "INSERT INTO cliente(DUI, Nombre, Apellido, Telefono, Correo, Clave, Direccion,  Hash_Active) VALUES(:DUI, :Nombre, :Apellido, :Telefono, :Correo, :Clave, :Direccion, :Hash_Active)";
        return $this->set_query($query,$arreglo);
    }
    public function delete($id=''){
       // $query = "UPDATE usuario SET Estado='0' WHERE ID_Usuario=:ID_Usuario";
    }
    public function update($arreglo=array()){
        $query = "UPDATE cliente SET Nombre=:Nombre, Apellido=:Apellido, Telefono=:Telefono, Correo=:Correo, Clave=:Clave, Direccion=:Direccion WHERE DUI=:DUI;";
        return $this->set_query($query,$arreglo);
    }

    public function update_pass($arreglo=array())
    {
        $query = "UPDATE cliente SET Nombre=:Nombre, Apellido=:Apellido, Telefono=:Telefono, Correo=:Correo, Clave=:Clave, Direccion:=Direccion WHERE DUI=:DUI;";
        return $this->set_query($query,$arreglo);
    }

    public function update_verified($arreglo=array())
    {
        $query = "UPDATE cliente SET Verificado = '1' WHERE Correo=:Correo AND Hash_Active=:Hash_Active;";
        return $this->set_query($query,$arreglo);
    }

    public function Validate($correo)
    {
        $query = "SELECT * FROM cliente WHERE Correo=:Correo AND Verificado='0'";
        return $this->get_query($query,[":Correo"=>$correo]);
    }

    public function ValidateForRecover($correo)
    {
        $query = "SELECT * FROM cliente WHERE Correo=:Correo AND Verificado='1'";
        return $this->get_query($query,[":Correo"=>$correo]);
    }

    public function validate_user($correo,$clave)
    {
        $query = "SELECT * FROM cliente WHERE Correo=:Correo AND Clave=SHA2(:Clave,256)";
        return $this->get_query($query,[":Correo"=>$correo,":Clave"=>$clave]);
    }

    public function validate_access($correo,$clave)
    {
        $query = "SELECT DUI,Nombre, Apellido, Correo, Clave, Acceso FROM cliente WHERE Correo=:Correo AND Clave=SHA2(:Clave,256)
        AND Verificado='1'";
         return $this->get_query($query,[":Correo"=>$correo,":Clave"=>$clave]);
    }
}

?>