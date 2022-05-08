<?php
require_once "ConexionModel.php";
class FacturasModel extends ModelPDO{

    public function get($id=''){
        $query = '';
        if($id==''){
            // retornar todos
            $query="SELECT * FROM ventas V INNER JOIN cliente C ON V.codigo_cliente=C.codigo_cliente
            INNER JOIN carrito A ON V.id_carrito=A.id_carrito;";
        }
        else{
            //Retorno por llave primaria
            $query= "SELECT * FROM ventas WHERE id_factura=:id_factura";
        }
        return $this->get_query($query,[":id_categoria"=>$id]);
    }

    public function getAllSales()
    {
        $query= "SELECT * FROM detalles D INNER JOIN cliente C ON D.codigo_cliente=C.DUI
        INNER JOIN facturas F ON D.codigo_factura=F.id_factura 
        INNER JOIN producto P ON D.codigo_producto=P.ID_Producto";
        return $this->get_query($query);
    }
    public function GetMySales($id)
    {
        $query= "SELECT * FROM detalles D INNER JOIN cliente C ON D.codigo_cliente=C.DUI
        INNER JOIN facturas F ON D.codigo_factura=F.id_factura 
        INNER JOIN producto P ON D.codigo_producto=P.ID_Producto
        WHERE id_session=:id_session ";
  return $this->get_query($query,[":id_session"=>$id]);
    }

    public function create_detalles($arreglo=array())
    {
        extract($arreglo);
        $query="INSERT INTO detalles(id_session, codigo_producto, codigo_cliente, cantidad, total, codigo_factura) VALUES(:id_session, :codigo_producto, :codigo_cliente, :cantidad, :total, :codigo_factura);";
        return $this->set_query($query,$arreglo);
    }

    public function GetSpecificSales($idfact)
    {
        $query= "SELECT * FROM detalles D INNER JOIN cliente C ON D.codigo_cliente=C.DUI
        INNER JOIN facturas F ON D.codigo_factura=F.id_factura 
        INNER JOIN producto P ON D.codigo_producto=P.ID_Producto
        WHERE codigo_factura=:codigo_factura ";
  return $this->get_query($query,[":codigo_factura"=>$idfact]);
    }

    public function GetMySpecificSales($arreglo=array())
    {
        extract($arreglo);
        $query= "SELECT * FROM ventas V INNER JOIN cliente C ON V.codigo_cliente=C.codigo_cliente
        INNER JOIN carrito A ON V.id_carrito=A.id_carrito WHERE id_session=:id_session AND id_factura=:id_factura";
  return $this->get_query($query,$arreglo);
    }

    public function create($arreglo=array()){
        extract($arreglo);
        $query="INSERT INTO facturas(id_factura, codigo_cliente) VALUES(:id_factura, :codigo_cliente);";
        return $this->set_query($query,$arreglo);
    }

    public function delete($id=''){
        $query = "UPDATE categoria SET estado_categoria='0' WHERE id_categoria =:id_categoria ";
        return $this->set_query($query,[":id_categoria"=>$id]);
    }
    public function  update($libro=array()){
        extract($libro);
        $query = "UPDATE categoria SET nombre_categoria=:nombre_categoria WHERE id_categoria=:id_categoria";
      //  $query="INSERT INTO Editoriales(codigo_editorial, nombre_editorial, contacto, telefono) VALUES ('$codigo_editorial','$nombre_editorial','$contacto','$telefono')";
        return $this->set_query($query,$libro);
    }

    public function Comprobate($id)
    {

        $query= "SELECT * FROM ventas WHERE id_factura=:id_factura;";
                return $this->get_query($query,[":id_factura"=>$id]);
    }

}