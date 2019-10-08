
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

$(document).ready(function(){

  var myOptions = {
    zoom: 13,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    mapTypeControl: false
  }

  var map;
  var marker;
  var geocoder = new google.maps.Geocoder();
  var direccion = "Reconquista 129, " + "Chacabuco, " + "6740, " + "Argentina";
    
    // Dirreciones de Facturacion
    
   var infowindow = new google.maps.InfoWindow({
    content: direccion;
  });
    
    // Crear Mapa

   
    map = new google.maps.Map(document.getElementById("map"), myOptions);
    
    geocoder.geocode( { address: direccion}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK && results.length) {
      if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {

          // Centrado mapa
        map.setCenter(results[0].geometry.location);

        // Creacion de marcador
        marker = new google.maps.Marker({
            position: results[0].geometry.location,
            map: map,
            title: "Direccion"
        });

        //Listeners
        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map,marker);
        });
        google.maps.event.addListener(infowindow, 'closeclick', function() {
          map.setCenter(marker.getPosition()); 
        });
  
  //         $("#factura").on('click', function (){
  //       map.setCenter(results[0].geometry.location);  
	// });
      }

    } else {
      $('#map').css({'height' : '15px'});
      $('#map').html("Oops! La direccion no puede ser encontrada. Modifiquela y vuelva a intentarlo.");
      resizeIframe();
    }
  });
    
    
  function resizeIframe() {
    var me = window.name;
    if (me) {
      var iframes = parent.document.getElementsByName(me);
      if (iframes && iframes.length == 1) {
        height = document.body.offsetHeight;
        iframes[0].style.height = height + "px";
      }
    }
  }
    
});