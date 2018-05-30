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
<?php include("../recorte_gral/encabezado.php"); ?>
<div class="container-fluid">
<?php include("recortes/navegacion.php"); ?>
	<!-- comienza contenido -->
</div>
<div class="container">
      <h3>Nuevo Llamado</h3>
<!-- aca comienza el calendario -->
          
<form id="parte1" action="tools/add_registro.php" method="post" role="form">

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title" data-toggle="collapse" data-target="#datallamada">
  <span class="glyphicon glyphicon-phone-alt"></span>  Identificación de la llamada <span class="caret" ></span></div>
  </h3>
</div>

<div id="datallamada" class="collapse">
    <div class="row">
  <div class="col-xs-12 col-md-6">
  <div class="form-group">
   <?php echo InputGeneral("text", "la_102_apellido", "form-control", "idapellidollama", "escriba el apellido", "Apellido del que llama:",""); ?>
</div>
   </div>
   <div class="col-xs-12 col-md-6">
   <div class="form-group">
   <?php echo InputGeneral("text", "la_102_nombre", "form-control", "idnombrellama", "escriba el nombre", "Nombre del que llama:",""); ?>
</div>
   </div>
   </div>


   <div class="row">
  <div class="col-xs-12 col-md-4">
  <div class="form-group">
   <?php echo SelectGeneral("la_102_relacion", "form-control", "idtiporelacion", "Relación con la persona en situación de violencia:","tb_relacion_danmificado", "rd_id", "rd_name"); ?>
</div>
   </div>
   <div class="col-xs-12 col-md-4">
   <div class="form-group">
   <?php echo InputGeneral("text", "la_102_especifico", "form-control", "idespecifica", "Especifique la relacion con la persona en situacion de violencia", "Especifique la relacion:",""); ?>
</div>
   </div>

   <div class="col-xs-12 col-md-4">
   <div class="form-group">
   <?php echo SelectFiltroMenorNro("la_102_tipo_llamado", "form-control", "idtipollamado", "Tipo de llamado:","tb_motivo_llamado", "ml_id", "ml_name","5"); ?>
</div>
   </div>
   </div>
<div class="row">
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneral("tel", "la_102_telefono1", "form-control", "nrotel_llamado", "escriba el nro de telefono", "Teléfono fijo:",""); ?>
  </div>
  </div>
<div class="col-xs-12 col-md-4">
  <div class="form-group">
   <?php echo InputGeneral("text", "la_102_telefono2", "form-control", "nrocelu_llamado", "escriba el nro de celular", "Teléfono Celular:",""); ?>
  </div>
</div>

<div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneral("text", "la_102_mail", "form-control", "dpmail_llamado", "escriba el correo electronico", "Correo Electrónico:",""); ?>
  </div>
</div>
</div>

</div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title" data-toggle="collapse" data-target="#datapersonal">
  <span class="glyphicon glyphicon-user"></span>  Datos de la Persona en situacion de Violencia <span class="caret"></span></div>
  </h3>
</div>

<div id="datapersonal" class="collapse">
<div class="row">
  <div class="col-xs-12 col-md-6">
  <div class="form-group">
   <?php echo InputGeneral("text", "dp_apellido", "form-control", "idapellido", "escriba el apellido", "Apellido:",""); ?>

</div>
   </div>
   <div class="col-xs-12 col-md-6">
   <div class="form-group">
   <?php echo InputGeneral("text", "dp_nombre", "form-control", "idnombre", "escriba el nombre", "Nombre:",""); ?>

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
<div class="form-group">
   <?php echo InputGeneral("date", "dp_nacimiento", "form-control", "nacim", "aaaa/mm/dd", "Fecha de Nacimiento:",""); ?>

  </div>
  </div>
  <div class="col-xs-12 col-md-6">
      
      <div class="form-group">
  <label class="control-label">Edad</label>
  <input type="text" class="form-control" id="muestra_edad">
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

    

    
    
<!-- Comienza Cuil -->
<div class="row">
  <div class="col-xs-12 col-md-6">
  <div class="form-group">
   <?php echo SelectGeneral("dp_pais_nacimiento", "form-control", "idpaisnacimiento", "Pais de nacimiento:","tb_paises", "pa_id", "pa_name"); ?>
  </div>
</div>
  <div class="col-xs-12 col-md-6">
  <div class="form-group">
    <?php echo SelectGeneral("dp_nacionalidad", "form-control", "idnacionalidad", "Nacionalidad:","tb_paises", "pa_id", "pa_name"); ?>
  </div>
</div>
</div>





<div class="row">
  <div class="col-xs-12 col-md-6">
  <div class="form-group">
   <?php echo SelectFiltro("dom_pr_dpto", "form-control", "iddepartamento", "Departamento Provincial del domicilio:","tb_departamentos", "dep_id", "dep_name","dep_mostrar","1"); ?>
<div class="requerido" id="falta_departamento">Falta completar este campo</div>
</div>
   </div>
   <div class="col-xs-12 col-md-6">
   <div class="form-group">
   <label>Localidad del domicilio:</label>
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




<div class="row">
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneral("tel", "dp_telefono", "form-control", "nrotel", "escriba el nro de telefono", "Teléfono fijo:",""); ?>
  </div>
  </div>
<div class="col-xs-12 col-md-4">
  <div class="form-group">
   <?php echo InputGeneral("text", "dp_movil", "form-control", "nrocelu", "escriba el nro de celular", "Teléfono Celular:",""); ?>
  </div>
</div>

<div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneral("text", "dp_mail", "form-control", "dpmail", "escriba el correo electronico", "Correo Electrónico:",""); ?>
  </div>
</div>
</div>

<div class="row">
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneral("text", "dla_actividad", "form-control", "actividadlaboral", "escriba la actividad laboral", "Actividad Laboral:",""); ?>
  </div>
  </div>
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneral("text", "dla_domicilio", "form-control", "domiciliolaboral", "domicilio laboral", "Domicilio Laboral:",""); ?>
  </div>
  </div>
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneral("text", "ds_discapacidad", "form-control", "discapacidad", "discapacidad", "Discapacidad:",""); ?>
  </div>
  </div>
  </div>
<div class="row">
  <div class="col-xs-12 col-md-4">
<div class="form-group">
<label>Convive con el agresor</label>
<div class="checkbox">
  <label>
<input name="sv_convive" type="checkbox" value="1"> Convive con el agresor 
</label>
</div>
</div>
</div>
<div class="col-xs-12 col-md-4">
 <div class="form-group">
    <?php echo SelectGeneral("sv_vinculo", "form-control", "vinculo", "Vinculo con el Agresor:","tb_vinculo_agresor", "va_id", "va_name"); ?>
  </div>
</div>
<div class="col-xs-12 col-md-4">
 <div class="form-group">
    <?php echo SelectGeneral("sv_red", "form-control", "red", "Red de Contención Segura:","tb_red_contencion", "rc_id", "rc_name"); ?>
  </div>
</div>
<div class="col-xs-12 col-md-4">
</div>
</div>


</div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title" data-toggle="collapse" data-target="#datarelacion">
  <span class="glyphicon glyphicon-retweet"></span>  Información sobre el/la Agresor/a <span class="caret" ></span></div>
  </h3>
</div>
<div id="datarelacion" class="collapse">
  
            <div class="row">
  <div class="col-xs-12 col-md-6">
  <div class="form-group">
   <?php echo InputGeneral("text", "dpa_apellido", "form-control", "idapellidoa", "escriba el apellido", "Apellido:",""); ?>

</div>
   </div>
   <div class="col-xs-12 col-md-6">
   <div class="form-group">
   <?php echo InputGeneral("text", "dpa_nombre", "form-control", "idnombrea", "escriba el nombre", "Nombre:",""); ?>

</div>
   </div>
   </div>
   <div class="row">
  <div class="col-xs-12 col-md-6">
   <div class="form-group has-success">
   <?php echo SelectGeneral("dpa_tipo_doc", "form-control", "idtipodoca", "Tipo de documento:","tb_docs", "do_id", "do_name"); ?>
<div class="requerido" id="falta_tipo_doc">Falta completar este campo</div>
</div>
   </div>
   <div class="col-xs-12 col-md-6">
   <div class="form-group has-success">
    <label for="nrodni">Nro de Documento:</label>
    <input type="text" class="form-control" id="nrodnia" name="dpa_nro_doc"
           placeholder="escriba el nro de Documento" maxlength="8">
    <div class="requerido" id="falta_dni">Falta completar este campo o nro incorrecto</div>
    
    </div>
   </div>
   </div>

<div class="row">
  <div class="col-xs-12 col-md-6">
<div class="form-group">
   <?php echo InputGeneral("date", "dp_nacimiento", "form-control", "nacim", "aaaa/mm/dd", "Fecha de Nacimiento:",""); ?>

  </div>
  </div>
  <div class="col-xs-12 col-md-6">
      
      <div class="form-group">
  <label class="control-label">Edad</label>
  <input type="text" class="form-control" id="muestra_edada">
</div>
  </div>
  </div>

<div class="row">
  <div class="col-xs-12 col-md-6">
  <div class="form-group">
   <?php echo SelectGeneral("dpa_sexo", "form-control", "idsexoa", "Sexo:","tb_sexos", "sx_id", "sx_name"); ?>
  </div>
</div>
  <div class="col-xs-12 col-md-6">
 <div class="form-group">
   <?php echo InputGeneral("text", "dpa_nacimiento", "form-control", "nacima", "domicilio", "Domicilio:",""); ?>

  </div>
</div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-6">
<div class="form-group">
   <?php echo InputGeneral("text", "dpa_actividad", "form-control", "actividadlaborala", "escriba la actividad laboral", "Actividad Laboral:",""); ?>
  </div>
  </div>
  
  <div class="col-xs-12 col-md-6">
<div class="form-group">
   <?php echo InputGeneral("text", "dpa_discapacidad", "form-control", "discapacidada", "discapacidad", "Discapacidad:",""); ?>
  </div>
  </div>
  </div>

</div>




<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title" data-toggle="collapse" data-target="#datatipoviolencia">
  <span class="glyphicon glyphicon-exclamation-sign"></span>  Datos de Situación de Violencia <span class="caret"></span></div>
  </h3>
</div>
<div id="datatipoviolencia" class="collapse">

  <?php
  $q_text = "select * from tb_tipo_violencia";
  $q_query = mysql_query($q_text);
    while($dat = mysql_fetch_array($q_query)){
      ?>
  <label class="checkbox-inline">
  <input type="checkbox" name="<?php echo 'tv'.$dat['tv_id']; ?>" value="<?php echo $dat['tv_id']; ?>"> <?php echo utf8_encode($dat['tv_name']); ?> | 
</label>
<?php
}
?>
<div class="row">
  
<div class="col-xs-12 col-md-6">
 <div class="form-group">
    <?php echo SelectGeneral("sv_frecuencia", "form-control", "frecuencia", "Frecuencia del Maltrato:","tb_frecuencia_maltrato", "fm_id", "fm_name"); ?>
  </div>
</div>
<div class="col-xs-12 col-md-6">
 <div class="form-group">
    <?php echo SelectGeneral("sv_tiempo", "form-control", "tiempo", "Tiempo de Maltrato:","tb_tiempo_maltrato", "tm_id", "tm_name"); ?>
  </div>
</div>
<div class="col-xs-12 col-md-4">
</div>
</div>



</div>



<!-- evaluacion del riesgo -->
<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title" data-toggle="collapse" data-target="#datariesgo">
  <span class="glyphicon glyphicon-alert"></span>  Evaluación del Riesgo <span class="caret"></span></div>
  </h3>
</div>
<div id="datariesgo" class="collapse">

  <?php
  $q_text = "select * from tb_riesgo_102";
  $q_query = mysql_query($q_text);
    while($dat = mysql_fetch_array($q_query)){
      ?>
  <label class="checkbox-inline">
  <input type="checkbox" name="<?php echo 'tv'.$dat['er_id']; ?>" value="<?php echo $dat['er_id']; ?>"> <?php echo utf8_encode($dat['er_name']); ?> | 
</label>
<?php
}
?>


</div>


<!-- derivaciones de la linea -->
<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title" data-toggle="collapse" data-target="#dataderivaciones">
  <span class="glyphicon glyphicon-share-alt"></span>  Derivaciones de la linea <span class="caret"></span></div>
  </h3>
</div>
<div id="dataderivaciones" class="collapse">

  <?php
  $q_text = "select * from tb_derivaciones_102";
  $q_query = mysql_query($q_text);
    while($dat = mysql_fetch_array($q_query)){
      ?>
  <label class="checkbox-inline">
  <input type="checkbox" name="<?php echo 'tv'.$dat['der_id']; ?>" value="<?php echo $dat['der_id']; ?>"> <?php echo utf8_encode($dat['der_name']); ?> | 
</label>
<?php
}
?>




</div>



<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title" data-toggle="collapse" data-target="#dataobservaciones">
  <span class="glyphicon glyphicon-pencil"></span>  Información / Reseña del Llamado <span class="caret"></span></div>
  </h3>
</div>

<div id="dataobservaciones" class="collapse">
    <div class="form-group">
<?php echo TextAreaGeneral("em_descripcion", "form-control", "iddescripcion", "4", "Reseña:"); ?>
</div>
</div>

<div class="form-group">
<button type="submit" class="btn btn-info" id="envia2">Continuar</button>
</div>
<input type="hidden" name="paso" value="1">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
</form>
  <!-- fin contenido -->
</div>
<br><br><br><br>

<?php include("../recorte_gral/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>


 
  <script type="text/javascript" language="javascript">
    $(document).ready(function() {
      $("#envia1").click(function() {
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

       $("#idtiporelacion").change(function(){
       
        if($("#idtiporelacion").val() == 1){
              $("#idespecifica").prop('disabled', true);
        } else {
          $("#idespecifica").prop('disabled', false);
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
  $('#nrocelu_llamado').mask('000-0000000');
  $('#nrotel_llamado').mask('000-0000000');
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