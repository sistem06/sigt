<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-map-marker"></span>  Domicilio</div>
  </h3>
</div>

<div class="row">
  <div class="col-xs-12 col-md-6">
  <div class="form-group  has-success">
   <?php echo SelectFiltro("dom_pr_dpto", "form-control", "iddepartamento", "Departamento Provincial:","tb_departamentos", "dep_id", "dep_name","dep_mostrar","1"); ?>
<div class="requerido" id="falta_departamento">Falta completar este campo</div>
</div>
   </div>
   <div class="col-xs-12 col-md-6">
   <div class="form-group  has-success">
   <label>Localidad:</label>
<select name="dom_localidad" class="form-control" id="idlocalidad">
</select>
<div class="requerido" id="falta_localidad">Falta completar este campo</div>
</div>
   </div>
   </div>
<div class="form-group">
  <label>Calle:</label>
 <input id="dpcalle" type="text" class="form-control" placeholder="escriba la calle" autocomplete="off" name="dp_calle"/>
</div>

<div class="row">
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneral("number", "dom_nro", "form-control", "nrolocac", "escriba el nro del domicilio", "Altura:",""); ?>
  </div>
  </div>
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneral("text", "dom_piso", "form-control", "idpiso", "escriba el piso", "Piso:",""); ?>
  </div>
  </div>
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneral("text", "dom_depto", "form-control", "iddepto", "escriba el departamento", "Departamento:",""); ?>
  </div>
  </div>
  </div>

<div class="row">
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneral("text", "dom_edificio", "form-control", "idedificio", "escriba el Edificio", "Edificio:",""); ?>
  </div>
  </div>
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneral("text", "dom_escalera", "form-control", "idescalera", "nro de escalera", "Escalera:",""); ?>
  </div>
  </div>
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneral("text", "dom_casa", "form-control", "idcasa", "nro de casa", "Casa:",""); ?>
  </div>
  </div>
  </div>

<div class="form-group">
      <input id="address" type="hidden" value="">
      <button type="button" class="btn btn-warning" id="geoloc">Ubicar en el mapa</button>
    </div>
    <div id="map" style="width=100%; height: 500px; margin-bottom:20px;"></div>
    <script>
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: {lat: -41.1334722, lng: -71.310778}
  });
  var geocoder = new google.maps.Geocoder();
   document.getElementById('geoloc').addEventListener('click', function() {
    geocodeAddress(geocoder, map);
  });
}

function geocodeAddress(geocoder, resultsMap) {
  var address = document.getElementById('address').value;
  geocoder.geocode({'address': address}, function(results, status) {
    // ver si hay una marca existente y borrarla
  
    if (status === google.maps.GeocoderStatus.OK) {
      resultsMap.setCenter(results[0].geometry.location);
      var ubica = results[0].geometry.location;
      var marca = new google.maps.Marker({
        map: resultsMap,
        position: results[0].geometry.location,
        draggable: true,
      });

      /// draggable: true,
    } else {
      var marca = new google.maps.Marker({
        map: resultsMap,
        position: {lat: -41.1334722, lng: -71.310778},
        draggable: true,
      });
      var ubica = "-41.1334722, -71.310778";
    }
    marca.addListener('dragend', function() 
{
 var ubica = this.getPosition().lat()+","+ this.getPosition().lng();
document.getElementById("latid").value=ubica;
});
    document.getElementById("latid").value=ubica;
  });
}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgYSMpv4ijxs_HCxoXiJlQyGTl5nlBIOQ&callback=initMap"
        async defer></script>
        <input type="hidden" name="latitud" id="latid">
        <div class="requerido" id="falta_mapa">Falta ubicar en el Mapa</div>