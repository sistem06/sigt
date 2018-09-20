<div class="container">
  <div class="paso_in">Modifica Domicilio de
    <span class="nombre_emp">
      <?php echo BuscaRegistro("tb_datos_personales","dp_id",$_GET['dp_id'],"dp_name"); ?> (<?php echo BuscaRegistro("tb_datos_personales","dp_id",$_GET['dp_id'],"dp_nro_doc"); ?>)
    </span>
  </div>
  <?php
  $ho_id = BuscaRegistro("tb_hogar_beneficiario","hb_dp_id",$_GET['dp_id'],"hb_ho_id");
  $dom_id = BuscaRegistro("tb_hogar","ho_id",$ho_id,"ho_dom_id");

  // Coordenadas por defecto (C. Cívico, Bariloche)
  $lat = "-41.1334722";
  $lon = "-71.310778";
  // SK: traigo los datos personales para inicializar formulario
  $regDp = mysql_fetch_array(mysql_query("select * from tb_datos_personales where dp_id = ".$_GET['dp_id']));
  if (isset($dom_id)) {
    $regDom = mysql_fetch_array(mysql_query("select * from tb_domicilios where dom_id = ".$dom_id));
    $lat = $regDom['dom_lat'];
    $lon = $regDom['dom_lng'];
  } else {
    // Persona sin domicilio, creo array y lo vacío para que los campos del formulario
    // no tiren error al intentar recuperar un valor no existente.
    $regDom = mysql_fetch_array(mysql_query("select * from tb_domicilios limit 1"));
    foreach ($regDom as $i => $value) {
        $regDom[$i] = "";
    };
  };
  ?>

<form id="parte1" action="add_registro.php" method="post" role="form">
<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-map-marker"></span>  Domicilio </h3>
</div>
</div>

<input type="hidden" id="lista_id_miembros" name="lista_id_miembros">

  <div class="row">
    <div class="col-xs-12 col-md-6">
      <div class="form-group  has-success">
       <?php echo SelectFiltroVal("dom_pr_dpto", "form-control", "iddepartamento", "Departamento Provincial:","tb_departamentos", "dep_id", "dep_name","dep_mostrar","1",$regDom['dom_pr_dpto']); ?>
       <div class="requerido" id="falta_departamento">Falta completar este campo</div>
      </div>
    </div>

    <div class="col-xs-12 col-md-6">
      <div class="form-group  has-success">
<!-- <label>Localidad:</label>
<select name="dom_localidad" class="form-control" id="idlocalidad"> -->
<?php echo SelectFiltroVal("dom_localidad", "form-control", "idlocalidad", "Localidad:","tb_localidades", "lo_id", "lo_name","lo_depto",$regDom['dom_pr_dpto'],$regDom['dom_localidad']); ?>

</select>
<div class="requerido" id="falta_localidad">Falta completar este campo</div>
</div>
   </div>
   </div>

   <div class="form-group">
  <!-- <label>Calle:</label> -->
 <!-- <input id="dpcalle" type="text" class="form-control" placeholder="escriba la calle" autocomplete="off" name="dp_calle"/> -->
 <?php echo InputGeneralVal("text", "dp_calle", "form-control", "dpcalle", "escriba la calle", "Calle:",$regDom['dom_calle']); ?>
 <div id="listado_calles" class="listado_rubros"></div>
<div id="falta_calle" class="requerido">debe elegir un elemento de la lista</div>
</div>
<?php
if ($regDom['dom_calle'] != "") {
  echo '<input id="valor_calle" name="valor_calle" type="hidden" class="form-control" value="'.$regDom['dom_calle'].'">';
} else {
  echo '<input id="valor_calle" name="valor_calle" type="hidden" class="form-control">';
}
?>


    <div class="row">
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneralVal("number", "dom_nro", "form-control", "nrolocac", "escriba el nro del domicilio", "Altura:",$regDom['dom_nro']); ?>
  </div>
  </div>
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneralVal("text", "dom_piso", "form-control", "idpiso", "escriba el piso", "Piso:",$regDom['dom_piso']); ?>
  </div>
  </div>
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneralVal("text", "dom_depto", "form-control", "iddepto", "escriba el departamento", "Departamento:",$regDom['dom_depto']); ?>
  </div>
  </div>
  </div>

  <div class="row">
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneralVal("text", "dom_edificio", "form-control", "idedificio", "escriba el Edificio", "Edificio:",$regDom['dom_edificio']); ?>
  </div>
  </div>
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneralVal("text", "dom_escalera", "form-control", "idescalera", "nro de escalera", "Escalera:",$regDom['dom_escalera']); ?>
  </div>
  </div>
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneralVal("text", "dom_casa", "form-control", "idcasa", "nro de casa", "Casa:",$regDom['dom_casa']); ?>
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
  var latitud  = <?php echo $lat; ?>;
  var longitud = <?php echo $lon; ?>;

  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      //center: {lat: -41.1334722, lng: -71.310778}
      center: {lat: latitud, lng: longitud}
    });
    var geocoder = new google.maps.Geocoder();
    geocodeAddress(geocoder, map);
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
          //position: {lat: -41.1334722, lng: -71.310778},
          position: {lat: latitud, lng: longitud},
          draggable: true,
        });
        //var ubica = "-41.1334722, -71.310778";
        var ubica = latitud + ", " + longitud;
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
<input type="hidden" name="ho_id" value="<?php echo $ho_id ?>">
</div>


        </form>

</div>
