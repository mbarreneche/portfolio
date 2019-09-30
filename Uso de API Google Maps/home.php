<?php  
require_once("datos.php");
if ($_POST) {

$marcador = armarMarcador($_POST);
guardarMarcador($marcador);?>
<script src="fetch.js"></script>
<?php 
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="scripts.js"></script>
    <link href="style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Evaluacion Tecnica</title>
  </head>
  <body>
    <div class="main">
      <div class="main_form">
        <form id="elForm" action="home.php" method="post">
         <div class="form_divs">
          <label for="nombre">Nombre</label>
          <input id="nombre" type="text" name="nombre" value="">
          </div>
          <div class="form_divs">
          <label for="direccion">Direccion</label>
          <input id="direccion" type="text" name="direccion" value="">
        </div>
        <div class="form_divs">
          <label for="ciudad">Ciudad</label>
          <input id="ciudad" type="text" name="ciudad" value="">
        </div>
        <div class="form_divs">
          <label for="codigo_postal">Codigo Postal</label>
          <input id="codigo_postal" type="text" name="codigo_postal" value="">
            
          </div>
          <div class="form_divs">
          <label for="pais">Pais</label>
          <input id="pais" type="text" name="pais" value="">
        </div>
          <button type="submit" name="submit">Agregar</button>
</div>
        </form>
      </div>
    <div id="map"></div>
    </div>

  
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAYsjtFYAVApwbctcfMlVVcliRwKVpv0Y&callback=initMap">
    </script>
    
  </body>
</html>
