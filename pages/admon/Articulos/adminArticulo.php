<?php 
include_once("Model/mArticulo.php");
$article = new Articulo;

if (!isset($_SESSION['tipo']) && (!isset($_POST['tipo']))){
  $_SESSION['tipo']=1;
} elseif (!isset($_POST['tipo'])){
  $_POST['tipo']=1;
}else{
  $_SESSION['tipo']=$_POST['tipo'];
}

if(isset($_GET['a'])){
  $article->BuscarArticulo($_GET['a']);
}

?> 

<div class="row ficha">

<div class="col-3">

<div class="container">
<form action="" method="post">
    <div class="form-group row">
      <select name="tipo" id="tipo"  class="form-control float-right">
        <option value="0"></option>
        <option value="1">Parasha</option>
        <option value="2">Segula</option>
        <option value="3">Articulo</option>
        <option value="4">Recetas</option>
        <option value="5">Tziniut</option>
      </select>
      <br/>  <br/>
      <button type="submit" class="btn btn-secondary btn-block">Cambiar Listado de Articulos</button>
    </div>
  </form>
  <?php   echo "<h2>".$article->flistado($_SESSION['tipo'])."</h2>";
   $article->ListadoArticulos($_SESSION['tipo']);
  ?>
</div>

</div>

<div class="col-9">
<?php
include_once('Config/msg.php');
?>
<form action="Articulos/upArticulo.php" method="post" enctype="multipart/form-data">
    <fieldset>
    <legend class="text-center">Actualizar Articulo de Texto</legend>
    </fieldset>
    
    <div class="form-group row">
      <label for="titulo" class="col-xs-12  col-lg-2 col-form-label">Titulo</label>
      <div class="col-xs-12  col-lg-10">
        <input type="text" class="form-control col-8 float-left" id="titulo" name="titulo"  value="<?php $article->gTitulo() ?>">
        <input type="file" class="form-control col-4" name="fname">
      </div>
    </div>

    <div class="form-group row">
      <label for="subtitulo" class="col-xs-12  col-lg-2 col-form-label">SubTitulo</label>
      <div class="col-xs-12  col-lg-10">
        <input type="text" class="form-control col-8 float-left" id="subtitulo" name="subtitulo" value="<?php $article->gSubtitulo() ?>">
        <input type="text" class="form-control col-4" name="filename" value="<?php if(isset($article->nfile)){$article->gNimg();}?>" >
      </div>
    </div>

    <div class="form-group row">
      <label for="autor" class="col-xs-12  col-lg-2 col-form-label">Autor</label>
      <div class="col-xs-12  col-lg-10">
        <input type="text" class="form-control col-8 float-left" id="autor" name="autor" value="<?php $article->gAutor() ?>">
        <input type="date" class="form-control col-4" id="fecha" name="fecha" value="<?php $article->gFecha() ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="tcr" class="col-xs-12  col-lg-2 col-form-label">Texto de Derechos de Autor</label>
      <div class="col-xs-12  col-lg-10">
        <textarea rows="3" class="form-control" id="tcr" name="tcr"><?php $article->gTcr() ?></textarea>
      </div>
    </div>

    <div class="form-group row">
      <label for="tcr" class="col-xs-12  col-lg-2 col-form-label">Contenido</label>
      <div class="col-xs-12  col-lg-10">
        <textarea rows="6" class="form-control" id="contenido" name="contenido"><?php $article->gContenido() ?></textarea>
      </div>
    </div>

    <input type="hidden" class="form-control" name="id" value="<?php $article->gId();?>">

    <div class="form-group row d-flex justify-content-between">
    <a class="lbnt btn btn-danger btn-lg" href="?p=<?php $article->gId();?>&a=delArticulo&n=<?php $article->gNimg();?>">Eliminar Articulo</a>
        <button type="submit" class="btn btn-primary btn-lg">Actualzar Articulo</button>
    </div>
  </form>


</div>
</div>