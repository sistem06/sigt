<?php
include("secure.php");
include ("../conecta.php");
include ("../funciones/funciones_generales.php");
include ("../funciones/funciones_form.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo BuscaRegistro ("tb_sistemas", "sis_id", $_SESSION["sistema"], "sis_name"); ?>	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/estilos_ss.css">
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"
</head>
<body>
<?php include("recortes/encabezado.php"); ?>
<div class="container-fluid">
<?php include("recortes/navegacion.php"); ?>
	<!-- comienza contenido -->
</div>
<div class="container">
      <h3>Datos del Hogar Encuestado</h3>
<!-- aca comienza el calendario -->
          
<form id="parte1" action="tools/add_registro.php" method="post" role="form">

<div class="form-group has-success">
   <?php echo SelectGeneral("enc_caat", "form-control", "idcaat", "CAAT que realiza la encuesta:","tb_caats", "ca_id", "ca_name"); ?>
<div class="requerido" id="falta_caat">Falta completar este campo</div>
</div>
<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-user"></span>  Datos Personales</div>
  </h3>
</div>


<div class="row">
  <div class="col-xs-12 col-md-6">
  <div class="form-group has-success">
   <?php echo InputGeneral("text", "dp_apellido", "form-control", "idapellido", "escriba el apellido", "Apellido:",""); ?>
<div class="requerido" id="falta_apellido">Falta completar este campo</div>
</div>
   </div>
   <div class="col-xs-12 col-md-6">
   <div class="form-group has-success">
   <?php echo InputGeneral("text", "dp_nombre", "form-control", "idnombre", "escriba el nombre", "Nombre:",""); ?>
<div class="requerido" id="falta_nombre">Falta completar este campo</div>
</div>
   </div>
   </div>
   <div class="row">
  <div class="col-xs-12 col-md-6">
   <div class="form-group has-success">
   <?php echo SelectGeneral("dp_tipo_doc", "form-control", "idtipodoc", "Tipo de documento:","tb_docs", "do_id", "do_name"); ?>
<div class="requerido" id="falta_tipo_doc">Falta completar este campo</div>
</div>
   </div>
   <div class="col-xs-12 col-md-6">
   <div class="form-group has-success">
    <label for="nrodni">Nro de Documento:</label>
    <input type="text" class="form-control" id="nrodni" name="dp_nro_doc"
           placeholder="escriba el nro de Documento" maxlength="8">
    <div class="requerido" id="falta_dni">Falta completar este campo o nro incorrecto</div>
    
    </div>
   </div>
   </div>
 <div class="yasta">Ya existe un Beneficiario con este DNI </div>
<div class="row">
  <div class="col-xs-12 col-md-6">
<div class="form-group has-success">
   <?php echo InputGeneral("date", "dp_nacimiento", "form-control", "nacim", "aaaa/mm/dd", "Fecha de Nacimiento:",""); ?>
   <div class="requerido" id="falta_nacim">Falta completar este campo</div>
  </div>
  </div>
  <div class="col-xs-12 col-md-6">
      
      <div class="form-group has-success">
  <label class="control-label" for="has-success">Edad</label>
  <input type="text" class="form-control" id="muestra_edad" disabled="disabled">
</div>
  </div>
  </div>

<div class="row">
  <div class="col-xs-12 col-md-6">
  <div class="form-group">
   <?php echo SelectGeneral("dp_sexo", "form-control", "idsexo", "Sexo:","tb_sexos", "sx_id", "sx_name"); ?>
  </div>
</div>
  <div class="col-xs-12 col-md-6">
  <div class="form-group">
   <?php echo SelectGeneral("dp_estado_civil", "form-control", "dpestadocivil", "Estado Civil:","tb_estado_civil", "ec_id", "ec_name"); ?>
  </div>
</div>
</div>
<!-- Comienza Cuil -->

    
  <div class="form-group has-success">
  <label for="nrocuil">Nro de CUIL:</label>
    <input type="text" class="form-control" id="nrocuil" name="dp_cuil"
           placeholder="escriba el nro de CUIL" maxlength="13">
    <div class="requerido" id="falta_cuil">Falta completar este campo o nro incorrecto</div>
    </div>
    
    <div class="form-group">
 <a href="https://micuilonline.com.ar/averiguar-cuil-cuit" target="blank"><button type="button" class="btn btn-warning">Ver en ANSES</button></a>
     </div>
<!-- Comienza Cuil -->
<div class="row">
  
  <div class="col-xs-12 col-md-4">
  <div class="form-group">
    <?php echo SelectGeneral("dp_nacionalidad", "form-control", "idnacionalidad", "Nacionalidad:","tb_tipo_nacionalidad", "tn_id", "tn_name"); ?>
  </div>
</div>
<div class="col-xs-12 col-md-4">
  <div class="form-group">
   <?php echo SelectGeneral("dp_pais_nacimiento", "form-control", "idpaisnacimiento", "Pais de nacimiento:","tb_paises", "pa_id", "pa_name"); ?>
  </div>
</div>
<div class="col-xs-12 col-md-4">
  

<div class="form-group">
   <?php echo InputGeneral("tel", "dp_anos_residencia", "form-control", "anos_residencia", "Años de residencia en el pais", "Años de Residencia:",""); ?>
  </div>

</div>
</div>
<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-map-marker"></span>  Domicilio</div>
  </h3>
</div>

<div class="row">
  <div class="col-xs-12 col-md-6">
  <div class="form-group">
   <?php echo SelectFiltro("dom_pr_dpto", "form-control", "iddepartamento", "Departamento Provincial:","tb_departamentos", "dep_id", "dep_name","dep_mostrar","1"); ?>
<div class="requerido" id="falta_departamento">Falta completar este campo</div>
</div>
   </div>
   <div class="col-xs-12 col-md-6">
   <div class="form-group">
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


<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-list"></span>  Otros Datos</div>
  </h3>
</div>


<div class="form-group">
<label>Fecha de fijación del domicilio:</label>
<div class="row">
  <div class="col-xs-12 col-md-6">
   Mes:
   <select name="ho_inicio_mes" class="form-control">
   <?php
   $mes = 1;
      while($mes < 13){
        if($mes < 10){
          $mesa = '0'.$mes;
        } else {
          $mesa = $mes;
        }
        echo '<option value="'.$mesa.'">'.$mesa.'</option>';
        $mes++;
      }
      ?>
   </select>
   </div>
   <div class="col-xs-12 col-md-6">
   Año:
   <select name="ho_inicio_ano" class="form-control">
   <?php
   $ano = date("Y");
      while($ano > 1900){
        echo '<option value="'.$ano.'">'.$ano.'</option>';
        $ano--;
      }
      ?>
   </select>
   </div>
  </div>
  </div>
<div class="row">
  <div class="col-xs-12 col-md-6">
<div class="form-group">
   <?php echo InputGeneral("text", "dp_telefono", "form-control", "nrotel", "escriba el nro de telefono", "Teléfono fijo:",""); ?>
  </div>
  </div>
<div class="col-xs-12 col-md-6">
  <div class="form-group">
   <?php echo InputGeneral("text", "dp_movil", "form-control", "nrocelu", "escriba el nro de celular", "Teléfono Celular:",""); ?>
  </div>
</div>
</div>

<div class="form-group">
   <?php echo InputGeneral("text", "dp_mail", "form-control", "dpmail", "escriba el correo electronico", "Correo Electrónico:",""); ?>
  </div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-check"></span>  Identificación del Hogar</div>
  </h3>
</div>

<div class="row">
  <div class="col-xs-12 col-md-6">
<div class="form-group">
   <?php echo InputGeneral("text", "ho_viviendas_lote", "form-control", "nroviv", "escriba el nro del domicilio", "Cantidad de Viviendas en el lote:",""); ?>
  </div>
  </div>
  <div class="col-xs-12 col-md-6">
<div class="form-group">
   <?php echo InputGeneral("text", "ho_vivienda_lote_nro", "form-control", "nrovives", "escriba el piso", "Esta Cedula corresponde a la Vivienda N°:",""); ?>
  </div>
  </div>
  </div>
  <div class="row">
  <div class="col-xs-12 col-md-6">
<div class="form-group">
   <?php echo InputGeneral("text", "ho_hogares_lote", "form-control", "nrolote", "escriba el nro del domicilio", "Cantidad de Hogares en el lote:",""); ?>
  </div>
  </div>
  <div class="col-xs-12 col-md-6">
<div class="form-group">
   <?php echo InputGeneral("text", "ho_hogar_lote_nro", "form-control", "nrolotees", "escriba el piso", "Esta Cedula corresponde al Hogar N°:",""); ?>
  </div>
  </div>
  </div>
<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-education"></span>  Datos Educativos</div>
  </h3>
</div>

<div class="form-group">
   <?php echo SelectGeneral("des_nivel", "form-control", "desnivel", "Nivel de Estudios:","tb_nivel_estudios_social", "nes_id", "nes_name"); ?>
  </div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-wrench"></span>  Datos Laborales</div>
  </h3>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-plus"></span>  Datos de Salud</div>
  </h3>
</div>
<div class="form-group">
<button type="submit" class="btn btn-info" id="envia1">Continuar</button>
</div>
<input type="hidden" name="paso" value="1">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
</form>
  <!-- fin contenido -->
</div>
<br><br><br><br>

<?php include("recortes/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

 <script type="text/javascript" language="javascript">
    $(document).ready(function() {

      $("#parte1").keypress(function(e) {
          if (e.which == 13) {
          return false;
          }
      });

      $("#envia1").click(function() {

        if($("#idcaat").val()==""){
          $("#falta_caat").show();
          $("#falta_caat").focus();
          return false;
        }

        if($("#idapellido").val()==""){
          $("#falta_apellido").show();
          $("#idapellido").focus();
          return false;
        }
         if($("#idnombre").val()==""){
          $("#falta_nombre").show();
          $("#idnombre").focus();
          return false;
        }
        if($("#idtipodoc").val() == ""){
          $("#falta_tipo_doc").show();
          $("#idtipodoc").focus();
          return false;
        }
        if($("#nrodni").val().length < 8){
          $("#falta_dni").show();
          $("#nrodni").focus();
          return false;
        } else {
             $.get("tools/comprobar_ben.php", {dnii: $("#nrodni").val(), tabla: "tb_datos_personales", valorbusc: "dp_nro_doc"}, function(respuesta){
                    if (respuesta == "B"){
                        $(".yasta").show();
                        $('#envia1').attr("disabled", true);
                        $(".yasta").focus();
                         return false;
                    } 
                    if (respuesta != "B" && respuesta != "A"){
                        $(".yasta").show();
                        $('.yasta').html('Con el nro de documento ingresado ya esta en el sistema <a href="tools/agrega_al_sistema.php?dp_id='+respuesta+'&id_us='+<?php echo $_SESSION["id_us"]; ?>+'"><button type="button" class="btn btn-danger">Agregar este Beneficiario</button></a>');
                        $('#envia1').attr("disabled", true);
                         return false;
                          $(".yasta").focus();
                    } 
              })

        }
         if($("#nacim").val()==""){
          $("#falta_nacim").show();
          $("#nacim").focus();
          return false;
        }
        if($("#nrocuil").val().length < 13){
          $("#falta_cuil").show();
          $("#nrocuil").focus();
          return false;
        }
        if($("#latid").val()==""){
          $("#falta_mapa").show();
          $("#falta_mapa").focus();
          return false;
        }
        
      });

      $("#nrodni").keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });
      $("#anos_residencia").keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });

        $("#idnacionalidad").change(function(){
        if($("#idnacionalidad").val() == 1){
          $("#idpaisnacimiento").attr('disabled','disabled');
          $("#anos_residencia").attr('disabled','disabled');
        } else {
            $("#idpaisnacimiento").removeAttr('disabled','disabled');
            $("#anos_residencia").removeAttr('disabled','disabled');
        }
    });

      $("#nrodni").focusout(function() {
        if($("#nrodni").val().length == 8) {
              $.get("tools/comprobar_ben.php", {dnii: $("#nrodni").val(), tabla: "tb_datos_personales", valorbusc: "dp_nro_doc"}, function(respuesta){
                    if (respuesta == "B"){
                        $(".yasta").show();
                        $('#envia1').attr("disabled", true);
                    } 
                    if (respuesta == "A"){
                        $(".yasta").hide();
                        $('#envia1').attr("disabled", false);
                    }
                    if (respuesta != "B" && respuesta != "A"){
                        var res = respuesta.split("|");
                        $(".yasta").show();
                        $('.yasta').html('Con el nro de documento ingresado ya esta en el sistema '+res[1]+' <a href="tools/agrega_al_sistema.php?dp_id='+res[0]+'&id_us='+<?php echo $_SESSION["id_us"]; ?>+'"><button type="button" class="btn btn-danger">Agregar este Beneficiario</button></a>');
                        $('#envia1').attr("disabled", true);
                    } 
              })
        }
    });
    
      $("#idsexo").change(function(){
          if($("#idsexo").val() != 3 && $("#idtipodoc").val()==1 && $("#nrodni").val().length ==8){
            if($("#idsexo").val() == 1){
              var nro_in = 27;
              var pte1 = 38;
            } else {
              var nro_in = 20;
              var pte1 = 10;
            }
            var nr1 = Math.floor($("#nrodni").val()/10000000);
            var nr2 = Math.floor($("#nrodni").val()/1000000)-(nr1 * 10);
            var nr3 = Math.floor($("#nrodni").val()/100000)-((nr1 * 100)+(nr2 * 10));
            var nr4 = Math.floor($("#nrodni").val()/10000)-((nr1 * 1000)+(nr2 * 100)+(nr3 * 10));
            var nr5 = Math.floor($("#nrodni").val()/1000)-((nr1 * 10000)+(nr2 * 1000)+(nr3 * 100)+(nr4 * 10));
            var nr6 = Math.floor($("#nrodni").val()/100)-((nr1 * 100000)+(nr2 * 10000)+(nr3 * 1000)+(nr4 * 100)+(nr5 * 10));
            var nr7 = Math.floor($("#nrodni").val()/10)-((nr1 * 1000000)+(nr2 * 100000)+(nr3 * 10000)+(nr4 * 1000)+(nr5 * 100)+(nr6 * 10));
            var nr8 = $("#nrodni").val()-((nr1 * 10000000)+(nr2 * 1000000)+(nr3 * 100000)+(nr4 * 10000)+(nr5 * 1000)+(nr6 * 100)+(nr7 * 10));
            var sum_nro = pte1 + nr1*3 + nr2*2 + nr3*7 + nr4*6 + nr5*5 + nr6*4 + nr7*3 + nr8*2;
            var cosi = Math.floor(sum_nro / 11);
            var resto = sum_nro - (cosi*11);
              if(resto == 0){
                var zz=0;
              } else {
                  if(resto==1){
                            if($("#idsexo").val() == 1){
                                var nro_in = 23;
                                var zz = 4;
                              } else {
                                var nro_in = 23;
                                var zz = 9;
                              }
                  } else {
                    var zz = 11 - resto;
                  }
              }

            $("#nrocuil").val(nro_in+'-'+$("#nrodni").val()+'-'+zz);
          }
      });

      $("#nacim").focusout(function(){
        var fecha = $("#nacim").val();
        if($("#nacim").val() != ""){
          $.get("tools/calcula_edad.php", {fecha_in: fecha}, function(htmlexterno){
              $("#muestra_edad").val(htmlexterno);
          });
        }
      });

  });
  </script>
  <script src="../js/bootstrap-typeahead.js"></script>

<script>
            $(function() {
                function displayResult(item) {
                    $('.alert').show().html('You selected <strong>' + item.value + '</strong>: <strong>' + item.text + '</strong>');
                }
                $('#dpcalle').typeahead({
                    ajax: {
                        url: 'tools/autocom.php?query=%QUERY',
                        method: 'post',
                        triggerLength: 1
                    },
                    onSelect: displayResult
                });

  });
        </script>

<script src="../js/jquery.mask.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function(){
  $('#nrocelu').mask('000-0000000');
  $('#nrotel').mask('000-0000000');
  $('#nrocuil').mask('00-00000000-0');

   $("#iddepartamento").change(function () {  
                $("#iddepartamento option:selected").each(function () {
            elegido=$(this).val();
            $.post("tools/localidades.php", { elegido: elegido }, function(data){
            $("#idlocalidad").html(data);
            });           
        }); 
      });

   $("#idlocalidad").on("change",Buscaloc);
   $("#dpcalle").on("change",Buscaloc);
   $("#geoloc").on("mouseover",Buscaloc);
   $("#nrolocac").on("change",Buscaloc);
               
            
   function Buscaloc (){
        var id_loc = $("#idlocalidad").val();
            var es_calle = $("#dpcalle").val();
            var es_nro = $("#nrolocac").val();
          //  alert(id_loc+es_calle+es_nro);
            $.post("tools/localidades_str.php", { id_loc: id_loc, es_calle: es_calle, es_nro: es_nro }, function(datos){
              $("#address").attr("value",datos);
            });           
         
      };
  

});
    </script>
  <script type="text/javascript" language="javascript" src="../js/navbar.js"></script>
</body>
</html>