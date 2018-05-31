<div class="container">
      <h3>Modifica Domicilio de <?php echo BuscaRegistro("tb_datos_personales","dp_id",$_GET['dp_id'],"dp_name"); ?> (<?php echo BuscaRegistro("tb_datos_personales","dp_id",$_GET['dp_id'],"dp_nro_doc"); ?>)</h3>       
        <?php
        $ho_id = BuscaRegistro("tb_hogar_beneficiario","hb_dp_id",$_GET['dp_id'],"hb_ho_id");
        $dom_id = BuscaRegistro("tb_hogar","ho_id",$ho_id,"ho_dom_id");
        ?>

<form id="parte1" action="tools/add_registro.php" method="post" role="form">
<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-map-marker"></span>  Domicilio </h3>
</div>
</div>


      <div class="row">
  <div class="col-xs-12 col-md-6">
  <div class="form-group  has-success">
   <?php echo SelectFiltroVal("dom_pr_dpto", "form-control", "iddepartamento", "Departamento Provincial:","tb_departamentos", "dep_id", "dep_name","dep_mostrar","1","3"); ?>
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
 <div id="listado_calles" class="listado_rubros"></div>
<div id="falta_calle" class="requerido">debe elegir un elemento de la lista</div>
</div> 
<input id="valor_calle" name="valor_calle" type="hidden" class="form-control">

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
    var nro = 0;
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
 
  if(nro > 1){
    marca.setMap(null);
  }
  var address = document.getElementById('address').value;
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      resultsMap.setCenter(results[0].geometry.location);
      var ubica = results[0].geometry.location;
        marca = new google.maps.Marker({
        map: resultsMap,
        position: results[0].geometry.location,
        draggable: true,
      });

      /// draggable: true,
    } else {
        marca = new google.maps.Marker({
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
   nro++;
}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgYSMpv4ijxs_HCxoXiJlQyGTl5nlBIOQ&callback=initMap"
        async defer></script>
        <input type="hidden" name="latitud" id="latid">
        <input type="hidden" name="barrioid" id="barrioid">
        <input type="hidden" name="caatid" id="caatid">
        
        
        <div class="requerido" id="falta_mapa">Falta ubicar en el Mapa</div>

          <div class="form-group">
<button type="submit" class="btn btn-success" id="envia1">Guardar Cambios</button>
<input type="hidden" name="dom_id" value="<?php echo $dom_id; ?>">
<input type="hidden" name="paso" value="8">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
</div>


        </form>

</div>