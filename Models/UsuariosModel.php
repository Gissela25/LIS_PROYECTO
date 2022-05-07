<?php
require_once 'ConexionModel.php';
class UsuariosModel extends ModelPDO{
    public function get($id=''){
        $query='';
        if($id==''){
            // retornar todos
            $query="SELECT * FROM usuario U INNER JOIN tipo_usuario T ON U.Acceso=T.id_tipo_usuario
            INNER JOIN sucursal S ON U.ID_Sucursal=S.ID_Sucursal;";
            return $this->get_query($query);
        }
        else{
            //Retorno por llave primaria
            $query= "SELECT * FROM usuario U INNER JOIN tipo_usuario T ON U.Acceso=T.id_tipo_usuario 
              INNER JOIN sucursal S ON U.ID_Sucursal=S.ID_Sucursal
              WHERE ID_Usuario =:ID_Usuario";
             return $this->get_query($query,[":ID_Usuario"=>$id]);
        }
       
    }

    public function ActualizarPassword($Clave,$Correo,$Tabla)
    {
        $query = "UPDATE $Tabla SET Clave=Clave WHERE Correo=:Correo";
        return $this->set_query($query,[":Clave"=>$Clave,":Correo"=>$Correo]);
    }

    public function Validate($id='')
    {
       $query= "SELECT * FROM usuario WHERE Correo=:Correo AND Estado='1'";
       return $this->get_query($query,[":Correo"=>$id]);
    }

    public function getData($id='')
    {
        $query= "SELECT * FROM usuario WHERE Correo=:Correo";
        return $this->get_query($query,[":Correo"=>$id]);
    }
    public function create($arreglo=array()){
        $query = "INSERT INTO usuario(ID_Usuario, Nombre, Apellido, Correo, Clave, ID_Sucursal, Hash_Active) VALUES(:ID_Usuario, :Nombre, :Apellido, :Correo, :Clave, :ID_Sucursal, :Hash_Active)";
        return $this->set_query($query,$arreglo);
    }
    public function delete($id=''){
        $query = "UPDATE usuario SET Estado='0' WHERE ID_Usuario=:ID_Usuario";
        return $this->set_query($query,[":ID_Usuario"=>$id]);
    }

    public function activar($id=''){
        $query = "UPDATE usuario SET Estado='1' WHERE ID_Usuario=:ID_Usuario";
        return $this->set_query($query,[":ID_Usuario"=>$id]);
    }
    public function update($arreglo=array()){
        extract($arreglo);
        $query = "UPDATE usuario SET Nombre=:Nombre, Apellido=:Apellido, Correo=:Correo, Acceso=:Acceso, ID_Sucursal=:ID_Sucursal WHERE ID_Usuario=:ID_Usuario;";
        return $this->set_query($query,$arreglo);
    }

    public function editme($arreglo=array()){
        extract($arreglo);
        $query = "UPDATE usuario SET Nombre=:Nombre, Apellido=:Apellido, Correo=:Correo, Clave=:Clave WHERE ID_Usuario=:ID_Usuario;";
        return $this->set_query($query,$arreglo);
    }

    public function update_pass($arreglo=array())
    {
        $query = "UPDATE usuario SET Nombre=:Nombre, Apellido=:Apellido, Correo=:Correo, Clave=:Clave WHERE ID_Usuario=:ID_Usuario;";
        return $this->set_query($query,$arreglo);
    }

    public function update_verified($id)
    {
        $query = "UPDATE usuario SET Verificado = '1' WHERE Correo=:Correo;";
        return $this->set_query($query,[":Correo"=>$id]);
    }

    public function validate_user($correo,$clave)
    {
        $query = "SELECT * FROM usuario WHERE Correo=:Correo AND Clave=SHA2(:Clave,256)";
        return $this->get_query($query,[":Correo"=>$correo,":Clave"=>$clave]);
    }

    public function validate_access($correo,$clave)
    {
        $query = "SELECT U.ID_Usuario,U.Nombre, U.Apellido, U.Correo, U.ID_Sucursal, U.Acceso,U.Clave, S.ID_Sucursal,S.Nombre_Sucursal, S.Siglas FROM usuario U
        INNER JOIN sucursal S ON U.ID_Sucursal=S.ID_Sucursal 
        WHERE Correo=:Correo AND Clave=SHA2(:Clave,256)
        AND Verificado='1' AND Estado='1';";
        return $this->get_query($query,[":Correo"=>$correo,":Clave"=>$clave]);
    }

    public function getTipoUsuario($id=''){
        $query='';
        if($id==''){
            // retornar todos
            $query="SELECT * FROM tipo_usuario;";
            return $this->get_query($query);
        }
        else{
            //Retorno por llave primaria
            $query= "SELECT * FROM tipo_usuario
              WHERE id_tipo_usuario =:id_tipo_usuario";
             return $this->get_query($query,[":ID_Usuario"=>$id]);
        }
       
    }
}

?>