<div class="container-fluid color6 pt-3" id="myDiv" style="display:block;" >
<div class="row">

  <div class="col-xs-12 col-sm-3">
    <h4>Administrador de Contenidos Develope by Appsher</h4>
  </div>

  <div class="col-xs-12 col-sm-4" >
    <div class="container">

    </div>
  </div>

  <div class="col-xs-12 col-sm-4">
    <div class="container">
        <?php 
        if(!empty($_SESSION['user'])){
           echo '<h3>'.$_SESSION['user'].'</h3>';
        }
        ?>
     </div>
  </div>

  <div class="col-sm-1 col-sm-offset-1"></div>

</div>
</div>