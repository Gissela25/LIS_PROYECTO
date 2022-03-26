<?php
require 'validaciones.php';
$errores=array();
if(isset($_POST['add']))
{
    extract($_POST);
    if(!isset($ID_Producto)||isVoid($ID_Producto))
    {
        array_push($errores,"Debes ingresar un codigo");
    }
    elseif(!isProduct($ID_Producto))
    {
        array_push($errores,"Debes ingresar un codigo válido.");
    }
    if(!isset($Nombrep)||isVoid($Nombrep))
    {
        array_push($errores,"Debes ingresar nombre de producto ");
    }
    elseif(!isText($Nombrep))
    {
        array_push($errores,"Debes ingresar nombre válido.");
    }
    if(!isset($Descripcion)||isVoid($Descripcion))
    {
        array_push($errores,"Debes ingresar una descripcion");
    }
    elseif(!isText($Descripcion))
    {
        array_push($errores,"Debes ingresar una descripción válida.");
    }
    if(!isset($ID_Familia)||isVoid($ID_Familia))
    {
        array_push($errores,"Debes seleccionar una categoria");
    }
    // if(!isset($price)||isVoid($price))
    // {
    //     array_push($errores,"Debes ingresar ");
    // }
    // elseif(!isFloat($price))
    // {
    //     array_push($errores,"Debes ingresar precio.");
    // }
    // if(!isset($existencias_p)||isVoid($existencias_p))
    // {
    //     array_push($errores,"Debes ingresar ");
    // }
    // elseif(!isInteger($existencias_p))
    // {
    //     array_push($errores,"Debes ingresar un número válido.");
    // }
    if(isText(isset($Nombrep))&&isText($Descripcion)&&isProduct($ID_Producto))
    {
       $filename=$_FILES['Imagen']['name'];
        if (isset($filename)) {
            //Obtenemos algunos datos necesarios sobre el archivo
            $size = $_FILES['Imagen']['size'];
            $temp = $_FILES['Imagen']['tmp_name'];
            $explode=explode('.',$filename);
            $extension=array_pop($explode);
           if (!( ($extension == "webp"|| $extension == "png" || $extension == "jpg" || $extension == "jpeg" || $extension == "PNG" || $extension == "JPEG" || $extension == "JPG") && ($size < 2000000))) {
            array_push($errores,"Ingresar imagen válida");
           }
           else {
               $img_new_name=$ID_Producto.'.'.$extension;

               $path="img";
               if(file_exists($path))
               {
                   $dir=$path.'/'.$img_new_name;
                   if(move_uploaded_file($temp,$dir))
                   {
                       $modelo = new products();
                       $modelo->setPro_id($ID_Producto);
                       $modelo->setPro_nom($Nombrep);
                       $modelo->setPro_des($Descripcion);
                       $modelo->setPro_ima($img_new_name);
                       $modelo->setPro_idf($ID_Familia);
                       $modelo->setPro_idpc($ID_PC);
                       $modelo->Input_Product();
                       header("location:?c=products&a=show");
                    //    header("location: http://localhost/IMGs_SUMERSA/?c=productos&a=show");
                   }
               }


            }
         }
    }
}

// if(isset($_POST['eliminar']))
// {
//     extract($_GET);
//     $model=new ProductosModel();
//     $model->setCodigo_P($cod);
//     $model->Delete_product();
   
// }

$errores_upt=array();
if(isset($_POST['update']))
{
    extract($_POST);
    if(!isset($Nombrep)||isVoid($Nombrep))
    {
        array_push($errores_upt,"Debes ingresar nombre de producto ");
    }
    elseif(!isText($Nombrep))
    {
        array_push($errores_upt,"Debes ingresar nombre válido.");
    }
    if(!isset($Descripcion)||isVoid($Descripcion))
    {
        array_push($errores_upt,"Debes ingresar una descripcion");
    }
    elseif(!isText($Descripcion))
    {
        array_push($errores_upt,"Debes ingresar una descripción válida.");
    }
    // if(!isset($price)||isVoid($price))
    // {
    //     array_push($errores_upt,"Debes ingresar ");
    // }
    // elseif(!isFloat($price))
    // {
    //     array_push($errores_upt,"Debes ingresar precio.");
    // }
    // if(!isset($existencias_p)||isVoid($existencias_p))
    // {
    //     array_push($errores_upt,"Debes ingresar ");
    // }
    // elseif(!isInteger($existencias_p))
    // {
    //     array_push($errores_upt,"Debes ingresar un número válido.");
    // }
    if(isText(isset($Nombrep))&&isText($Descripcion)&&isProduct($ID_Producto))
    {
       $filename=$_FILES['nimg_p']['name'];
       if(!empty($filename))
       {
                   //Obtenemos algunos datos necesarios sobre el archivo
                   $size = $_FILES['nimg_p']['size'];
                   $temp = $_FILES['nimg_p']['tmp_name'];
                   $explode=explode('.',$filename);
                   $extension=array_pop($explode);
                  if (!( ($extension == "webp"|| $extension == "png" || $extension == "jpg" || $extension == "jpeg" || $extension == "PNG" || $extension == "JPEG" || $extension == "JPG") && ($size < 2000000))) {
                   array_push($errores_upt,"Ingresar imagen válida");
                  }
                  else {
                      $img_new_name=$ID_Producto.'.'.$extension;
       
                      $path="img";
                      if(file_exists($path))
                      {
                          $dir=$path.'/'.$img_new_name;
                          if(move_uploaded_file($temp,$dir))
                          {

                            
                               $modelo = new products();
                               $modelo->setPro_id($ID_Producto);
                               $modelo->setPro_nom($Nombrep);
                               $modelo->setPro_des($Descripcion);
                               $modelo->setPro_ima($img_new_name);
                               $modelo->setPro_idf($ID_Familia);
                               $modelo->Update_product();
                            //    header("location: http://localhost/IMGs_SUMERSA_bk/?c=productos&a=show#id_$codigo_p");
                            header("location:?c=products&a=show");
                      }
                    }
       
       
                   }
       }
       else{
            $modelo = new products();
            $modelo->setPro_id($ID_Producto);
            $modelo->setPro_nom($Nombrep);
            $modelo->setPro_des($Descripcion);
            $modelo->setPro_idf($ID_Familia);
            $modelo->Update_product();
            // header("location: http://localhost/IMGs_SUMERSA_bk/?c=productos&a=show#id_$codigo_p");
            header("location:?c=products&a=show");
     }
     
    }
}

?>