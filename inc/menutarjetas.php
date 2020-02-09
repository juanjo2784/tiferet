<?php
if(isset($_COOKIE['item'])){
  $item = $_COOKIE['item'];
}
?>  
  <div class = "row ficha">
    <div class = "col-xs-12 col-lg-4">
       <a href="?a=Parashat" tabindex="4">
        <div class="carta color5" id="sdc">
          <div class="card-encabezado text-center"><i class="material-icons md50 cfi7">local_parking</i></div>
            <div class="card-body">
              <h4 id="contenido" class="text-center"></h4>
            </div>
          </div>
      </a>
    </div>

    <div class = "col-xs-12 col-lg-4">
    <a href="?a=eventos" tabindex="4">
      <div class="carta color5" id="sdc">
              <div class="card-encabezado text-center"><i class="material-icons md50 cfi7">today</i></div>
              <div class="card-body">
                <h4 class="text-center">Eventos</h4>
              </div>
            </div>
      </a>
    </div>

    <div class = "col-xs-12 col-lg-4">
    <a href="?a=article&p=2" tabindex="4">
      <div class="carta color5" id="sdc">
              <div class="card-encabezado text-center"><i class="material-icons md50 cfi7">leak_add</i></div>
              <div class="card-body">
                <h3 id="contenido" class="text-center">Segulot</h3>
              </div>
            </div>
      </a>
    </div>

  </div>

  <div class = "row ficha">

    <div class = "col-xs-12 col-lg-4 ">
    <a href="?a=galeria" tabindex="4">
      <div class="carta color5 cartap" id="sdc">
        <div class="card-encabezado text-center"><i class="material-icons md50 cfi7">photo_camera</i></div>
        <div class="card-body">
          <h3 id="contenido" class="text-center">Galeria</h3>
        </div>
      </div>
    </a>
    </div>

    <div class = "col-xs-12 col-lg-4">
    <a href="?a=juegos" tabindex="4">
      <div class="carta color5 cartap" id="sdc">
        <div class="card-encabezado text-center"><i class="material-icons md50 cfi7">golf_course</i></div>
        <div class="card-body">
          <h3 id="contenido" class="text-center">Juegos</h3>
        </div>
      </div>
    </a>
    </div>

    <div class = "col-xs-12 col-lg-4">
    <a href="?a=article&p=3" tabindex="4">
        <div class="carta color5 cartap" id="sdc">
          <div class="card-encabezado text-center"><i class="material-icons md50 cfi7">fitness_center</i></div>
            <div class="card-body">
              <h3 class="text-center">Emuná y Bitajón</h3>
              <h6 class="text-center">Artículos y videos</h6>
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