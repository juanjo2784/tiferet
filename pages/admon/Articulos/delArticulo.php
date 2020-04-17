<?php 
include_once("Model/mArticulo.php");
$registro = new Articulo;
$ruta=(isset($_GET['n']))?"../../upload/Imagenes/".$_GET['n']:null;
$id = $_GET['p'];
try {
    $registro->DelArticulo($id);
    if($ruta != null){
        unlink($ruta);
    }
    header("location: /pages/admon/admin.php?a=UpdateArticulo&msg=4");
} catch (\Throwable $th) {
    header("location: /pages/admon/admin.php?a=UpdateArticulo&msg=0");
}
?>