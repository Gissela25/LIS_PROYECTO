<?php
require_once 'ConexionModel.php';
class ProductosModel extends ModelPDO{
    public function get($id=''){
        $query = '';
        if($id==''){
            $query="SELECT * FROM producto P INNER JOIN familia F ON P.ID_Familia=F.ID_Familia;";
            return $this->get_query($query);
        }
        else{
            $query= "SELECT * FROM producto P INNER JOIN familia F ON P.ID_Familia=F.ID_Familia
            WHERE ID_Producto=:ID_Producto";
            return $this->get_query($query,[":ID_Producto"=>$id]);
        }
       
    }
    public function createPrecioCantidad($arreglo=array()){
        $query = "INSERT INTO precio_cantidad(ID_PC, ID_Producto) VALUES(:ID_PC, :ID_Producto)";
        return $this->set_query($query,$arreglo);
    }

    public function getpc($id='')
    {
        if($id='')
        {
            $query= "SELECT * FROM precio_cantidad WHERE ID_PC=:ID_PC";
            return $this->get_query($query,[":ID_PC"=>$id]);
        }

    }

    public function getPCbyProducto($id='')
    {
        $query= "SELECT * FROM precio_cantidad WHERE ID_Producto=:ID_Producto";
        return $this->get_query($query,[":ID_Producto"=>$id]);
    }

    public function createPC($arreglo=array(),$siglas){
        $query = "UPDATE precio_cantidad SET Precio_$siglas=:Precio_$siglas, Cantidad_$siglas=:Cantidad_$siglas, ID_Producto=:ID_Producto WHERE ID_PC=:ID_PC;";
        return $this->set_query($query,$arreglo);
    }

    public function getallProducts($id=''){
        $query = '';
        if($id==''){
            // retornar todos
            $query="SELECT * FROM producto ";
            return $this->get_query($query);
        }
        else{
            //Retorno por llave primaria
            $query= "SELECT * FROM producto WHERE ID_Producto=:ID_Producto";
            return $this->get_query($query,[":ID_Producto"=>$id]);
        }
       
    }

    public function create($arreglo=array()){
        $query = "INSERT INTO producto(ID_Producto, Nombrep, Descripcion, Imagen, ID_Familia) VALUES(:ID_Producto, :Nombrep, :Descripcion, :Imagen, :ID_Familia)";
        return $this->set_query($query,$arreglo);
    }
    public function delete($id=''){
        $query = "UPDATE producto SET Estado_Producto='0' WHERE ID_Producto=:ID_Producto";
        return $this->set_query($query,[":ID_Producto"=>$id]);
    }

    public function activar($id=''){
        $query = "UPDATE producto SET Estado_Producto='1' WHERE ID_Producto=:ID_Producto";
        return $this->set_query($query,[":ID_Producto"=>$id]);
    }

    public function update($arreglo=array()){
        $query = "UPDATE producto SET Nombrep=:Nombrep, Descripcion=:Descripcion, Imagen=:Imagen, ID_Familia=:ID_Familia WHERE ID_Producto=:ID_Producto;";
        return $this->set_query($query,$arreglo);
    }

    public function updatepc($arreglo=array(),$Cantidad_Actual){
        $query = "UPDATE precio_cantidad SET $Cantidad_Actual=:$Cantidad_Actual WHERE ID_Producto=:ID_Producto;";
        return $this->set_query($query,$arreglo);
    }

    public function updateImgNone($arreglo=array()){
        $query = "UPDATE producto SET Nombrep=:Nombrep, Descripcion=:Descripcion, ID_Familia=:ID_Familia WHERE ID_Producto=:ID_Producto;";
        return $this->set_query($query,$arreglo);
    }

    public function getBySucursal($var){
        $query="SELECT P.ID_Producto,P.Nombrep,P.Descripcion,P.Imagen,F.Nombre_Familia,C.Precio_$var,C.Cantidad_$var FROM producto P 
        INNER JOIN precio_cantidad C ON P.ID_Producto=C.ID_Producto
        INNER JOIN familia F ON P.ID_Familia=F.ID_Familia
        WHERE C.Precio_$var IS NOT NULL AND C.Cantidad_$var IS NOT NULL
        AND P.Estado_Producto = '1' AND F.Estado_Familia='1'";
        return $this->get_query($query);
    }

    public function GetQuantity($id,$cantidad)
    {
        $query="SELECT Precio_$cantidad,Cantidad_$cantidad FROM precio_cantidad WHERE ID_Producto=:ID_Producto;";
        return $this->get_query($query,[":ID_Producto"=>$id]);
    }

    public function ComprobarCorrelativo($var)
    {
        $query= "SELECT * FROM carrito WHERE correlativo=:correlativo;";
         return $this->get_query($query,[":correlativo"=>$var]);
    }

    public function getPrecioCantidad()
    {
        $query="SELECT * FROM precio_cantidad;";
        return $this->get_query($query);
    }

    public function getByID($var,$id)
    {
        $query="SELECT P.ID_Producto,P.Nombrep,P.Descripcion,P.Imagen,F.Nombre_Familia,C.Precio_$var,C.Cantidad_$var FROM producto P 
        INNER JOIN precio_cantidad C ON P.ID_Producto=C.ID_Producto
        INNER JOIN familia F ON P.ID_Familia=F.ID_Familia
        WHERE C.Precio_$var IS NOT NULL AND C.Cantidad_$var IS NOT NULL AND P.ID_Producto = :ID_Producto";
        return $this->get_query($query,[":ID_Producto"=>$id]);
    }

    public function getNull($var)
    {
        $query="SELECT P.ID_Producto,P.Nombrep,P.Descripcion,P.Imagen,F.Nombre_Familia, C.Precio_$var,C.Cantidad_$var FROM producto P 
        INNER JOIN precio_cantidad C ON P.ID_Producto=C.ID_Producto
        INNER JOIN familia F ON P.ID_Familia=F.ID_Familia
        WHERE C.Precio_$var IS NULL AND C.Cantidad_$var IS NULL
        AND P.Estado_Producto = '1' AND F.Estado_Familia='1'";
        return $this->get_query($query);
    }

}

?>