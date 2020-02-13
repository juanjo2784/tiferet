<div class = "container col-sx-12 col-md-12 cartag color2 clearfix">
  <div class="row">

  <div class="col-4 d-none d-sm-none d-md-block card-encabezado text-center">
    <i class="material-icons md50 cfm cfm">local_post_office</i>
    <h3 class="text-center">Escríbenos</h3>
    <p class="text-justify">Nos puedes escribir a nuestro <a class="correo" href="mailto:<?php echo $mailf; ?>?&subject=Información%20adicional&body=Móvil:%0d%0aNombre:%0d%0a" title="Link de acceso para enviar correo electrónico" tabindex="14">e-mail</a>, también puedes llenar el formulario de CONTACTANOS y además puedes comunicarte con nuestro Representante <?php echo $representante; ?>, al número <a href="tel:<?php echo $telefono1; ?>" title="Telefono de contacto" tabindex="15"> (+972) <?php echo $telefono; ?></a>, estamos presto a contestar tus preguntas, ten presente que también puedes ser parte de la solución. </p>
  </div>

  <div class="card-body col-8">
  <div class="container  form-group frmEnviar">
            <form action="inc/enviar.php" onsubmit="return validar();" method="post" id="contact-form">
              <fieldset>
                <legend>CONTACTANOS</legend>
                <label for="Nombre">Nombre</label>
                <input type="text" id="Nombre" tabindex="8" name="nombre" class="form-control" placeholder="Nombre" >
                <label for="Telefono">Telefono</label>
                <input type="text" id="Telefono" tabindex="9" name="telefono" class="form-control" placeholder="Móvil o celular" >
                <label for="Correo">Correo</label>
                <input type="text" id="Correo" tabindex="10" name="correo" class="form-control" placeholder="E-mail" >
                <label for="Asunto">Asunto</label>
                <input type="text" id="Asunto" tabindex="11" name="asunto" class="form-control" placeholder="Asunto" >
                <label for="Mensaje">Mensaje</label>
                <textarea id="Mensaje" tabindex="12" name="mensaje" class="form-control" placeholder="Por favor escriba el mensaje" rows="4"></textarea><br/>
                <input id="mailf" name="mailf" type="hidden" value="<?php echo $mailf;?>">
                <button type="submit" class="btn btn-<?php echo $cboton; ?> d-flex ml-auto" id="btnenviar" title="Botón para enviar Informacion de contacto" tabindex="13">Enviar</button>
              </fieldset>
              <?php 
                    if (isset($_GET['p'])==1) {
                      echo "<h5>Gracias por escribirnos, envio exitoso!!<h5>";
                    }
              ?>
            </form>
          </div>
  </div>

  </div>
</div>