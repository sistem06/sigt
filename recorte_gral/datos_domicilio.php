
<?php
  $modif = FALSE;
  if (isset($_GET['dp_id'])) {
    $modif = TRUE;
    $dp_id = $_GET['dp_id'];

    // SK: traigo los datos personales y dirección para inicializar formulario
    $regDp = mysql_fetch_array(mysql_query("select * from tb_datos_personales where dp_id = ".$dp_id));
    $dom_emp_id = BuscaRegistro("tb_datos_emprendimiento","em_dp_id",$dp_id,"em_domicilio");
    if (isset($dom_emp_id)) {
      $regDom = mysql_fetch_array(mysql_query("select * from tb_domicilios where dom_id = ".$dom_emp_id));
    }
  }
?>


<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-map-marker"></span>  Domicilio</div>
  </h3>
</div>

<div class="row">
  <div class="col-xs-12 col-md-6">
    <div class="form-group  has-success">
    <?php
      if ($modif && isset($dom_emp_id)) {
        echo SelectFiltroVal("dom_pr_dpto", "form-control", "iddepartamento", "Departamento Provincial:","tb_departamentos", "dep_id", "dep_name","dep_mostrar","1",$regDom['dom_pr_dpto']);
      } else {
        echo SelectFiltroVal("dom_pr_dpto", "form-control", "iddepartamento", "Departamento Provincial:","tb_departamentos", "dep_id", "dep_name","dep_mostrar","1","3");
      }
    ?>
      <div class="requerido" id="falta_departamento">Falta completar este campo</div>
    </div>
  </div>

  <div class="col-xs-12 col-md-6">
   <div class="form-group  has-success">
   <?php
     if ($modif && isset($dom_emp_id)) {
       echo SelectFiltroVal("dom_localidad", "form-control", "idlocalidad", "Localidad:","tb_localidades", "lo_id", "lo_name","lo_depto",$regDom['dom_localidad'],$regDom['dom_pr_dpto']);
     } else {
       echo SelectFiltroVal("dom_localidad", "form-control", "idlocalidad", "Localidad:","tb_localidades", "lo_id", "lo_name","lo_depto",1,"");
     }
   ?>
   <div class="requerido" id="falta_localidad">Falta completar este campo</div>
   </div>
  </div>
</div> <!-- class="row" -->

<div class="form-group">
  <?php
    if ($modif && isset($dom_emp_id)) {
      echo InputGeneralVal("text", "dp_calle", "form-control", "dpcalle", "escriba calle", "Calle:",$regDom['dom_calle']);
    } else {
      echo InputGeneralVal("text", "dp_calle", "form-control", "dpcalle", "escriba calle", "Calle:","");
    }
    ?>
  <div id="listado_calles" class="listado_rubros"></div>
  <div id="falta_calle" class="requerido">debe elegir un elemento de la lista</div>
<?php
if ($modif && isset($dom_emp_id) && $regDom['dom_calle'] != "") {
  echo '<input id="valor_calle" name="valor_calle" type="hidden" value="'.$regDom['dom_calle'].'">';
} else {
  echo '<input id="valor_calle" name="valor_calle" type="hidden"';
}
?>
</div>
<div class="row">
  <div class="col-xs-12 col-md-4">
    <div class="form-group">
    <?php
      if ($modif && isset($dom_emp_id)) {
        echo InputGeneralVal("number", "dom_nro", "form-control", "nrolocac", "escriba el nro del domicilio", "Altura:",$regDom['dom_nro']);
      } else {
        echo InputGeneralVal("number", "dom_nro", "form-control", "nrolocac", "escriba el nro del domicilio", "Altura:","");
      }
    ?>
    </div>
  </div>

  <div class="col-xs-12 col-md-4">
    <div class="form-group">
    <?php
      if ($modif && isset($dom_emp_id)) {
        echo InputGeneralVal("text", "dom_piso", "form-control", "idpiso", "escriba el piso", "Piso:",$regDom['dom_piso']);
      } else {
        echo InputGeneralVal("text", "dom_piso", "form-control", "idpiso", "escriba el piso", "Piso:","");
      }
    ?>
    </div>
  </div>

  <div class="col-xs-12 col-md-4">
    <div class="form-group">
    <?php
      if ($modif && isset($dom_emp_id)) {
        echo InputGeneralVal("text", "dom_depto", "form-control", "iddepto", "escriba el departamento", "Departamento:",$regDom['dom_depto']);
      } else {
        echo InputGeneralVal("text", "dom_depto", "form-control", "iddepto", "escriba el departamento", "Departamento:","");
      }
    ?>
    </div>
  </div>
</div> <!-- class="row" -->

<div class="row">
  <div class="col-xs-12 col-md-4">
    <div class="form-group">
    <?php
    if ($modif && isset($dom_emp_id)) {
      echo InputGeneralVal("text", "dom_edificio", "form-control", "idedificio", "escriba el Edificio", "Edificio:",$regDom['dom_edificio']);
    } else {
      echo InputGeneralVal("text", "dom_edificio", "form-control", "idedificio", "escriba el Edificio", "Edificio:","");
    }
    ?>
    </div>
  </div>

  <div class="col-xs-12 col-md-4">
    <div class="form-group">
    <?php
      if ($modif && isset($dom_emp_id)) {
        echo InputGeneralVal("text", "dom_escalera", "form-control", "idescalera", "nro de escalera", "Escalera:",$regDom['dom_escalera']);
      } else {
        echo InputGeneralVal("text", "dom_escalera", "form-control", "idescalera", "nro de escalera", "Escalera:","");
      }
    ?>
    </div>
  </div>

  <div class="col-xs-12 col-md-4">
    <div class="form-group">
    <?php
      if ($modif && isset($dom_emp_id)) {
        echo InputGeneralVal("text", "dom_casa", "form-control", "idcasa", "nro de casa", "Casa:",$regDom['dom_casa']);
      } else {
        echo InputGeneralVal("text", "dom_casa", "form-control", "idcasa", "nro de casa", "Casa:","");
      }
    ?>
    </div>
  </div>
</div> <!-- class="row" -->

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
