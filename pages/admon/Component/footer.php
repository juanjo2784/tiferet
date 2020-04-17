<div class="container-fluid color6 pt-3" id="myDiv" style="display:block;" >
<div class="row">

  <div class="col-xs-12 col-sm-3">
  <?php 
        if(!empty($_SESSION['user'])){
           echo '<h4>'.$_SESSION['user'].'</h4>';
        }
        ?>
  </div>

  <div class="col-xs-12 col-sm-4" >
    <div class="container">
      <h5>Administrador de Contenidos Develope by Appsher</h5>
    </div>
  </div>

  <div class="col-xs-12 col-sm-4">
    <div class="container">
        <p>2020-v3</p>
     </div>
  </div>

  <div class="col-sm-1 col-sm-offset-1"></div>

</div>
</div>