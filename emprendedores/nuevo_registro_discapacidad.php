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
  <link rel="stylesheet" type="text/css" href="../source/jquery.fancybox.css?v=2.1.5" media="screen" />
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
</head>
<body>
<?php include("../recorte_gral/encabezado.php"); ?>
<div class="container-fluid">
<?php include("recortes/navegacion.php"); ?>
  <!-- comienza contenido -->
</div>
<div class="container">


<!-- aca comienza el calendario -->

<div class="paso_in"><div class="numb1">2</div><div class="numb2">4</div> Datos de discapacidad de
<span class="nombre_emp">
<?php
echo DatoRegistro ('tb_datos_personales', 'dp_name', 'dp_id', $_GET['dp_id'], $conn).' ('.DatoRegistro ('tb_datos_personales', 'dp_nro_doc', 'dp_id', $_GET['dp_id'], $conn).')';
?>
</span>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-book"></span>  Discapacidad</div>
  </h3>
<div class="panel-body">











          <form id="parte1" action="tools/add_registro.php" method="post" role="form">
<div class="row">
<div class="col-xs-12 col-md-12">
<div class="form-group">
<label>Tiene Discapacidad:</label>
<div class="radio">
  <label>
<input name="ds_tiene_discapacidad" type="radio" value="1" class="dis" <?php if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tiene_discapacidad")==1) echo 'checked'; ?> > Si |
</label>
<label>
<input name="ds_tiene_discapacidad" type="radio" value="0"  class="dis" <?php if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tiene_discapacidad")==0 or NroRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'])==0) echo 'checked'; ?> > No
</label>
</div>
</div>
</div>
</div>


<div id="data_discapacidad" style="display:none;">
<div class="row">
<div class="col-xs-12 col-md-6">


      <div class="form-group">
  <label>Nro de Certificado:</label>
 <input id="nrocer" type="text" class="form-control" placeholder="escriba nro de certificado" autocomplete="off" name="ds_nro_cud" value="<?php echo BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_nro_cud"); ?>" />
</div>

  </div>
  <div class="col-xs-12 col-md-6">


      <div class="form-group">
  <label>Otorgado por ley:</label>
 <select id="otorgaley" class="form-control" name="ds_ley_cud"/>

 <?php
 if(NroRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'])==0){
  echo '<option selected="selected"></option>';
 }
 if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_ley_cud")=="22431"){
  echo '<option selected="selected">22431</option>';
 } else {
  echo '<option>22431</option>';
 }
 if(NroRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'])==1 and BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_ley_cud")!="22431"){
  echo '<option selected="selected">Otra</option>';
 } else {
  echo '<option>Otra</option>';
 }
?>
 </select>
</div>

  </div>
</div>

<div id="data_ley" style="display:none;">
        <div class="row">
<div class="col-xs-12 col-md-6">


      <div class="form-group">
  <label>Ley o disposición Nro:</label>
 <input id="nrocer" type="nro" class="form-control" placeholder="escriba el nro de la ley que certifica" autocomplete="off" name="ds_ley_cud1" value="<?php echo BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_ley_cud"); ?>" />
</div>

  </div>
  <div class="col-xs-12 col-md-6">


      <div class="form-group">
  <label>Descripción:</label>
 <input id="nrocer" type="text" class="form-control" placeholder="descripcion del certificado" autocomplete="off" name="ds_descripcion_cud" value="<?php echo BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_descripcion_cud"); ?>" />
</div>

  </div>

  </div>
</div>
<div class="row">
 <div class="col-xs-12 col-md-4">


      <div class="form-group">
  <label>Vigencia Desde:</label>
 <input id="nrocer" type="date" class="form-control" autocomplete="off" name="ds_desde_cud" value="<?php echo BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_desde_cud"); ?>" />
</div>

  </div>

   <div class="col-xs-12 col-md-4">


      <div class="form-group">
  <label>Vigencia Hasta:</label>
 <input id="nrocer" type="date" class="form-control" autocomplete="off" name="ds_vencimiento_cud" value="<?php echo BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_vencimiento_cud"); ?>" />
</div>

  </div>

   <div class="col-xs-12 col-md-4">


      <div class="form-group">
  <label>Ente Certificador:</label>
 <input id="nrocer" type="text" class="form-control" placeholder="escriba el ente que certifica" autocomplete="off" name="ds_ente_cud" value="<?php echo BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_ente_cud"); ?>" />
</div>

  </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-3">
            <div class="form-group">
                <?php echo SelectGeneralVal("ds_tipo_discapacidad", "form-control", "tipo_disc", "Tipo de Discapacidad","tb_tipo_discapacidad", "td_id", "td_name",BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tipo_discapacidad")); ?>
            </div>
    </div>

     <div class="col-xs-12 col-md-3">
            <div class="form-group">
            <?php echo SelectGeneralVal("ds_origen_discapacidad", "form-control", "origen_disc", "Origen:","tb_origen_discapacidad", "od_id", "od_name",BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_origen_discapacidad")); ?>
            </div>
    </div>

    <div class="col-xs-12 col-md-3">
            <div class="form-group">
                <?php echo SelectGeneralVal("ds_tipo_retraso", "form-control", "tipo_retraso", "Tipo de Retraso","tb_tipo_retraso", "tr_id", "tr_name",BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tipo_retraso")); ?>
            </div>
    </div>

    <div class="col-xs-12 col-md-3">
            <div class="form-group">
                <?php echo SelectGeneralVal("ds_situacion_discapacidad", "form-control", "situacion_disc", "Situación","tb_situacion_discapacidad", "sd_id", "sd_name",BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_situacion_discapacidad")); ?>
            </div>
    </div>

</div>

<div class="row">
<div class="col-xs-12 col-md-12" id="ayudas">
</div>
</div>

<div class="row">
                <div class="col-xs-12 col-md-12">
                    <?php echo TextAreaGeneralVal("ds_descripcion_diagnostico", "form-control", "diagnostico", "3", "Descripción del Diagnóstico", BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_descripcion_diagnostico")); ?>
                </div>
</div>
<h4 style="color:#fff; background:#79A9D2;  text-align:center; padding:5px;">Datos Adicionales</h4>


<!-- parte nueva -->
<div class="row">
<div class="col-xs-12 col-md-4">
<div class="form-group">
<label>Ha realizado proceso de rehabilitación:</label>
<div class="radio">
  <label>
<input name="ds_rehabilitacion" type="radio" value="1" <?php if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_rehabilitacion")==1) echo 'checked'; ?> > Si |
</label>
<label>
<input name="ds_rehabilitacion" type="radio" value="0" <?php if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_rehabilitacion")==0 or NroRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'])==0) echo 'checked'; ?> > No
</label>
</div>
</div>
</div>

<div class="col-xs-12 col-md-4">
<div class="form-group">
<label>Toma medicación?:</label>
<div class="radio">
  <label>
<input name="ds_toma_medicacion" type="radio" value="1" class="toma_med" <?php if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_toma_medicacion")==1) echo 'checked'; ?> > Si |
</label>
<label>
<input name="ds_toma_medicacion" type="radio" value="0" class="toma_med" <?php if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_toma_medicacion")==0 or NroRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'])==0) echo 'checked'; ?> > No
</label>
</div>
</div>
</div>

<div class="col-xs-12 col-md-4">
<div class="form-group" id="frecuencia_med">
<label>Con que frecuencia?:</label>
<div class="radio">
  <label>
<input name="ds_frecuencia_medicacion" type="radio" value="1" <?php if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_frecuencia_medicacion")==1) echo 'checked'; ?> > Permanente |
</label>
<label>
<input name="ds_frecuencia_medicacion" type="radio" value="2" <?php if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_frecuencia_medicacion")==2) echo 'checked'; ?> > Temporal
</label>
</div>
</div>
</div>

</div>

<div class="row">

    <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <?php echo SelectGeneralVal("ds_traslado", "form-control", "traslado_disc", "Traslado:","tb_transporte_disc", "td_id", "td_name",BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_traslado")); ?>
            </div>
    </div>

  <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <?php echo SelectGeneralVal("ds_asistente_trabajo", "form-control", "asistente_disc", "Asistencia personalizada en el puesto de trabajo:","tb_asistente_disc", "ad_id", "ad_name",BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_asistente_trabajo")); ?>
            </div>
    </div>
</div>

<div class="row">
        <div class="col-xs-12 col-md-12">
                    <?php echo TextAreaGeneralVal("ds_tratamientos_medicos", "form-control", "tratamiento_medico", "3", "Tratamientos médicos actuales:", BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tratamientos_medicos")); ?>
                </div>
</div>

<div class="row">

<div class="col-xs-12 col-md-3">
<div class="form-group">
<label>Cuenta con seguridad social?:</label>
<div class="radio">
  <label>
<input name="ds_tiene_ss" type="radio" value="1" class="tiene_ss" <?php if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tiene_ss")==1) echo 'checked'; ?> > Si |
</label>
<label>
<input name="ds_tiene_ss" type="radio" value="0" class="tiene_ss" <?php if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tiene_ss")==0 or NroRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'])==0) echo 'checked'; ?> > No
</label>
</div>
</div>
</div>

<div class="col-xs-12 col-md-3">
<div class="form-group" id="id_ss">
  <label>Seguridad Social:</label>
 <input id="seguridad_social" type="text" class="form-control" name="ds_ss" value="<?php echo BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_ss"); ?>" />
</div>
</div>

<div class="col-xs-12 col-md-3">
<div class="form-group">
<label>Cuenta con otros subsidios?:</label>
<div class="radio">
  <label>
<input name="ds_tiene_subsidios" type="radio" value="1" class="con_sub" <?php if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tiene_subsidios")==1) echo 'checked'; ?> > Si |
</label>
<label>
<input name="ds_tiene_subsidios" type="radio" value="0" class="con_sub" <?php if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tiene_subsidios")==0 or NroRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'])==0) echo 'checked'; ?> > No
</label>
</div>
</div>
</div>

<div class="col-xs-12 col-md-3">
<div class="form-group" id="id_subsidios">
  <label>Subsidios:</label>
 <input id="subsidios" type="text" class="form-control" name="ds_subsidios" value="<?php echo BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_subsidios"); ?>" />
</div>
</div>

</div>

<div class="row">
        <div class="col-xs-12 col-md-12">
                    <?php echo TextAreaGeneralVal("ds_informacion_importante", "form-control", "informacion_importante", "3", "Otra información que considere importante", BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_informacion_importante")); ?>
                </div>
</div>
<!-- siguiente div fin oculto -->
</div>
<br>
<button type="submit" class="btn btn-info" id="envia4">Guardar y Volver</button>
<input type="hidden" name="paso" value="777">
<input type="hidden" name="acc" value="<?php echo $_GET['acc']; ?>">
<input type="hidden" name="dp_id" id="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
<!-- <input type="text" id="espuesto" name="espuesto"> -->
</form>

</div>

</div>




  <!-- fin contenido -->
</div>
<br><br><br><br><br><br><br><br><br><br>
<?php include("../recorte_gral/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>


  <script type="text/javascript" language="javascript">
    $(document).ready(function() {

      if($("input:radio[name=ds_tiene_subsidios]:checked").val()==1){
            $("#id_subsidios").show();
        } else {
            $("#id_subsidios").hide();
        }

        $(".con_sub").click(function(){
            if($("input:radio[name=ds_tiene_subsidios]:checked").val()==1){
            $("#id_subsidios").show();
        } else {
            $("#id_subsidios").hide();
        }
        });

      if($("input:radio[name=ds_tiene_ss]:checked").val()==1){
            $("#id_ss").show();
        } else {
            $("#id_ss").hide();
        }

        $(".tiene_ss").click(function(){
            if($("input:radio[name=ds_tiene_ss]:checked").val()==1){
            $("#id_ss").show();
        } else {
            $("#id_ss").hide();
        }
        });

      if($("input:radio[name=ds_toma_medicacion]:checked").val()==1){
            $("#frecuencia_med").show();
        } else {
            $("#frecuencia_med").hide();
        }

    $(".toma_med").click(function(){
        if($("input:radio[name=ds_toma_medicacion]:checked").val()==1){
            $("#frecuencia_med").show();
        } else {
            $("#frecuencia_med").hide();
        }
    });

      var tipo = $("#tipo_disc").val();

     if(tipo==""){
        $("#origen_disc").prop('disabled', true);
        $("#tipo_retraso").prop('disabled', true);
        $("#situacion_disc").prop('disabled', true);
        $("#diagnostico").prop('disabled', true);
     }
     if(tipo==1){
                  $("#origen_disc").prop('disabled', false);
                  $("#tipo_retraso").prop('disabled', true);
                  $("#situacion_disc").prop('disabled', true);
                  $("#diagnostico").prop('disabled', false);
               }

               if(tipo==2){
                  $("#origen_disc").prop('disabled', true);
                  $("#tipo_retraso").prop('disabled', true);
                  $("#situacion_disc").prop('disabled', true);
                  $("#diagnostico").prop('disabled', false);
               }

               if(tipo==3){
                  $("#origen_disc").prop('disabled', false);
                  $("#tipo_retraso").prop('disabled', true);
                  $("#situacion_disc").prop('disabled', true);
                  $("#diagnostico").prop('disabled', false);
               }

               if(tipo==4){
                  $("#origen_disc").prop('disabled', false);
                  $("#tipo_retraso").prop('disabled', true);
                  $("#situacion_disc").prop('disabled', true);
                  $("#diagnostico").prop('disabled', false);
               }

               if(tipo==5){
                  $("#origen_disc").prop('disabled', false);
                  $("#tipo_retraso").prop('disabled', false);
                  $("#situacion_disc").prop('disabled', true);
                  $("#diagnostico").prop('disabled', false);
               }

                if(tipo==6){
                  $("#origen_disc").prop('disabled', false);
                  $("#tipo_retraso").prop('disabled', true);
                  $("#situacion_disc").prop('disabled', true);
                  $("#diagnostico").prop('disabled', false);
               }

               if(tipo==7){
                  $("#origen_disc").prop('disabled', false);
                  $("#tipo_retraso").prop('disabled', true);
                  $("#situacion_disc").prop('disabled', true);
                  $("#diagnostico").prop('disabled', false);
               }

               if(tipo==8){
                  $("#origen_disc").prop('disabled', false);
                  $("#tipo_retraso").prop('disabled', true);
                  $("#situacion_disc").prop('disabled', false);
                  $("#diagnostico").prop('disabled', false);
               }

               if(tipo==3 || tipo==4 || tipo==7){
                      var dp_id = $("#dp_id").val();
                      $.get("tools/ayudas_discapacidad.php",{filtro:tipo, dp_id:dp_id},function(data){
                                            $("#ayudas").html(data);
                                        });
               } else {
                      $("#ayudas").html("");
               }

      $("#tipo_disc").change(function(){
          var tipo = $("#tipo_disc").val();
                if(tipo==""){
                  $("#origen_disc").prop('disabled', true);
                  $("#tipo_retraso").prop('disabled', true);
                  $("#situacion_disc").prop('disabled', true);
                  $("#diagnostico").prop('disabled', true);
               }

               if(tipo==1){
                  $("#origen_disc").prop('disabled', false);
                  $("#tipo_retraso").prop('disabled', true);
                  $("#tipo_retraso").val(0);
                  $("#situacion_disc").prop('disabled', true);
                  $("#situacion_disc").val(0);
                  $("#diagnostico").prop('disabled', false);
               }

               if(tipo==2){
                  $("#origen_disc").prop('disabled', true);
                  $("#origen_disc").val(0);
                  $("#tipo_retraso").prop('disabled', true);
                  $("#tipo_retraso").val(0);
                  $("#situacion_disc").prop('disabled', true);
                  $("#situacion_disc").val(0);
                  $("#diagnostico").prop('disabled', false);
               }

               if(tipo==3){
                  $("#origen_disc").prop('disabled', false);
                  $("#tipo_retraso").prop('disabled', true);
                  $("#tipo_retraso").val(0);
                  $("#situacion_disc").prop('disabled', true);
                  $("#situacion_disc").val(0);
                  $("#diagnostico").prop('disabled', false);
               }

               if(tipo==4){
                  $("#origen_disc").prop('disabled', false);
                  $("#tipo_retraso").prop('disabled', true);
                  $("#tipo_retraso").val(0);
                  $("#situacion_disc").prop('disabled', true);
                  $("#situacion_disc").val(0);
                  $("#diagnostico").prop('disabled', false);
               }

               if(tipo==5){
                  $("#origen_disc").prop('disabled', false);
                  $("#tipo_retraso").prop('disabled', false);
                  $("#situacion_disc").prop('disabled', true);
                  $("#situacion_disc").val(0);
                  $("#diagnostico").prop('disabled', false);
               }

                if(tipo==6){
                  $("#origen_disc").prop('disabled', false);
                  $("#tipo_retraso").prop('disabled', true);
                  $("#tipo_retraso").val(0);
                  $("#situacion_disc").prop('disabled', true);
                  $("#situacion_disc").val(0);
                  $("#diagnostico").prop('disabled', false);
               }

               if(tipo==7){
                  $("#origen_disc").prop('disabled', false);
                  $("#tipo_retraso").prop('disabled', true);
                  $("#tipo_retraso").val(0);
                  $("#situacion_disc").prop('disabled', true);
                  $("#situacion_disc").val(0);
                  $("#diagnostico").prop('disabled', false);
               }

               if(tipo==8){
                  $("#origen_disc").prop('disabled', false);
                  $("#tipo_retraso").prop('disabled', true);
                  $("#tipo_retraso").val(0);
                  $("#situacion_disc").prop('disabled', false);
                  $("#diagnostico").prop('disabled', false);
               }

               if(tipo==3 || tipo==4 || tipo==7){
                      var dp_id = $("#dp_id").val();
                      $.get("tools/ayudas_discapacidad.php",{filtro:tipo, dp_id:dp_id},function(data){
                                            $("#ayudas").html(data);
                                        });
               } else {
                      $("#ayudas").html("");
                      var dp_id = $("#dp_id").val();
                      $.get("tools/agrega_ayudas.php",{dp_id:dp_id, modo:"Q"});
               }
      });

      $("#ayudas").on('click','.elemento', function() {
        var dp_id = $("#dp_id").val();
        var id_funcion = $(this).attr("id");
        $.get("tools/agrega_ayudas.php",{dp_id:dp_id, id:id_funcion, modo:"M"});
      });

      if($("input:radio[name=ds_tiene_discapacidad]:checked").val()==1){
            $("#data_discapacidad").show(100);
        }

    $(".dis").click(function(){
        if($("input:radio[name=ds_tiene_discapacidad]:checked").val()==1){
            $("#data_discapacidad").show(100);
        } else {
            $("#data_discapacidad").hide(100);
        }
  });
    if($("#otorgaley").val()=="Otra"){
            $("#data_ley").show(100);
        }
     $("#otorgaley").change(function(){
        if($("#otorgaley").val()=="Otra"){
            $("#data_ley").show(100);
        } else {
            $("#data_ley").hide(100);
        }
  });
  });

  </script>
   <script type="text/javascript" src="../source/jquery.fancybox.js?v=2.1.5"></script>
    <script type="text/javascript">
    $(document).ready(function() {
          $('.fancybox').fancybox();
      $("#fancybox-manual-b").click(function() {
        $.fancybox.open({
          href : 'iframe.html',
          type : 'iframe',
          padding : 5
        });
      });
        $("#agrega_puesto").fancybox({
        afterClose  : function() {
        //     $.post("tools/puestos.php",  function(datapuesto){
            $("#puesto").val("");
        //    });

        }
    });

         $("#agrega_categoria").fancybox({
        afterClose  : function() {
             $.post("tools/categorias.php",  function(datacategoria){
            $("#categoria").html(datacategoria);
            });

        }
    });

         $("#agrega_actividad").fancybox({
        afterClose  : function() {
      //       $.post("tools/actividades.php",  function(datacactividad){
            $("#actividad").val("");
      //      });

        }
    });

         $("#quita_dato").fancybox({
        afterClose  : function() {
            window.location.reload();
        }
    });

         $("#quita_curso").fancybox({
        afterClose  : function() {
            window.location.reload();
        }
    });

         $("#agrega_curso_propio").fancybox({
        afterClose  : function() {
       //     $.post("tools/curso_propio.php",  function(datacurso){
            $("#cursopropio").val("");
       //     });

        }
    });

         $("#modifica_dato").fancybox({
        afterClose  : function() {
            window.location.reload();
        }
    });
});
  </script>

<script type="text/javascript" language="javascript" src="../js/navbar.js"></script>
</body>
</html>
