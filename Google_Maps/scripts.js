
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyB28voGViXZXdV3ptq1AKqr1Vpppimu1FQ"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> 
<script type="text/javascript">

$(document).ready(function() {

  var myOptions = {
    zoom: 13,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    mapTypeControl: false
  }

  var map;
  var marker;

  var geocoder = new google.maps.Geocoder();
  var address = document.getElementById("direccion").value + document.getElementById("codigo_postal").value + document.getElementById("ciudad").value + document.getElementById("provincia").value + document.getElementById("pais").value + 
    
    // Info de Direccion
    
   var infowindow = new google.maps.InfoWindow({
    content: document.getElementById("nombre").value 
  });
    
    // Crear Mapa
    map = new google.maps.Map(document.getElementById("map"), myOptions);
    
    geocoder.geocode( { address: address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK && results.length) {
      if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {

          
        
          
          // Centrado mapa
        map.setCenter(results[0].geometry.location);

        // Creacion de marcador
        marker = new google.maps.Marker({
            position: results[0].geometry.location,
            map: map,
            title: Direccion
        });

        //Listeners
        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map,marker);
        });
        google.maps.event.addListener(infowindow, 'closeclick', function() {
          map.setCenter(marker.getPosition()); 
        });
  
    //       $("#factura").on('click', function (){
    //     map.setCenter(results[0].geometry.location);  
	// });
      }

    } else {
      $('#map').css({'height' : '15px'});
      $('#map').html("Oops! La direccion de facturacion de " {}  " no puede ser encontrada. Modifiquela y vuelva a intentarlo.");
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
     </script>