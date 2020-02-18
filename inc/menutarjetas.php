<?php
if(isset($_COOKIE['item'])){
  $item = $_COOKIE['item'];
}
?>  
  <div class = "row ficha d-flex flex-wrap">
    <div class="tg carta color5 flex-fill">
       <a href="<?php echo $_SESSION['sr'] ?>Parashat/" tabindex="4">
        <div class="" id="sdc">
          <div class="card-encabezado text-center"><i class="material-icons md50 cfi7">local_parking</i></div>
            <div class="card-body">
              <h4 id="contenido" class="text-center"></h4>
            </div>
          </div>
      </a>
    </div>

    <div class="tg carta color5 flex-fill">
    <a href="<?php echo $_SESSION['sr'] ?>eventos/" tabindex="4">
      <div class="" id="sdc">
              <div class="card-encabezado text-center"><i class="material-icons md50 cfi7">today</i></div>
              <div class="card-body">
                <h4 class="text-center">Eventos</h4>
              </div>
            </div>
      </a>
    </div>

    <div class="tg carta color5 flex-fill">
    <a href="<?php echo $_SESSION['sr'] ?>article/2/" tabindex="4">
      <div class="" id="sdc">
              <div class="card-encabezado text-center"><i class="material-icons md50 cfi7">leak_add</i></div>
              <div class="card-body">
                <h3 id="contenido" class="text-center">Segulot</h3>
              </div>
            </div>
      </a>
    </div>

    <div class="tg carta color5 flex-fill">
    <a href="<?php echo $_SESSION['sr'] ?>galeria/" tabindex="4">
      <div class="" id="sdc">
        <div class="card-encabezado text-center"><i class="material-icons md50 cfi7">photo_camera</i></div>
        <div class="card-body">
          <h3 id="contenido" class="text-center">Galeria</h3>
        </div>
      </div>
    </a>
    </div>

    <div class="tg carta color5 flex-fill">
    <a href="<?php echo $_SESSION['sr'] ?>recetas/4/" tabindex="4">
      <div class="" id="sdc">
        <!--div-- class="card-encabezado text-center"><i class="material-icons md50 cfi7">golf_course</i></!--div-->
        <div class="card-encabezado text-center"><i class="material-icons md50 cfi7">restaurant_menu</i></div>
        <div class="card-body">
          <h3 id="contenido" class="text-center">Recetas</h3>
        </div>
      </div>
    </a>
    </div>

    <div class="tg carta color5 flex-fill">
    <a href="<?php echo $_SESSION['sr'] ?>article/3/" tabindex="4">
        <div class="" id="sdc">
          <div class="card-encabezado text-center"><i class="material-icons md50 cfi7">fitness_center</i></div>
            <div class="card-body">
              <h3 class="text-center">Emuná y Bitajón</h3>
            </div>
          </div>
        <div><?php include "inc/mpropuesta.php"?></div>
      </a>
    </div>

  </div>

<script>
  let contenido = document.getElementById('#contenido')  
  fetch('https://www.hebcal.com/shabbat/?cfg=json&geonameid=281184&m=50&leyning=on')
  .then(res=>res.json()).then(data=> {
      for (let i = 1; i < data.items.length; i++){     
        if(data.items[i].category == "parashat"){
          let item = data.items[i].title
          document.getElementById("contenido").innerHTML = item
          document.cookie='item='+item
          console.log(item)
        }
        }    
      })
    
</script>