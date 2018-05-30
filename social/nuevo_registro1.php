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

      
<!-- aca comienza el calendario -->
          
<div class="paso_in"> Datos del Hogar 
<span class="nombre_emp">
<?php
$dom = DatoRegistro ('tb_hogar', 'ho_dom_id', 'ho_id', $_GET['dp_id'], $conn);
echo DatoRegistro ('tb_domicilios', 'dom_calle', 'dom_id', $dom, $conn).' '.DatoRegistro ('tb_domicilios', 'dom_nro', 'dom_id', $dom, $conn).' (Vivienda '.DatoRegistro ('tb_hogar', 'ho_vivienda_lote_nro', 'ho_id', $_GET['dp_id'], $conn).' - Hogar '.DatoRegistro ('tb_hogar', 'ho_hogar_lote_nro', 'ho_id', $_GET['dp_id'], $conn).')';
?>
</span>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-home"></span>  Caracteristas de la Vivienda</div>
  </h3>
</div>



          <form id="parte1" action="tools/add_registro.php" method="post" role="form">

          <div class="row">
  <div class="col-xs-12 col-md-6">
  <div class="form-group">
   <?php echo InputGeneral("text", "hog_miembros", "form-control", "idmiembros", "escriba el numero de miembros del hogar", "Nro de personas que componen el hogar:",""); ?>
<div class="requerido" id="falta_nromiembros">Falta completar este campo</div>
</div>
   </div>
   <div class="col-xs-12 col-md-6">
   <div class="form-group">
   <?php echo InputGeneral("text", "hog_habitaciones", "form-control", "idhabitaciones", "escriba el numero de habitaciones del hogar", "Nro de habitaciones exclusivas que tiene el hogar:",""); ?>
<div class="requerido" id="falta_nrohabitaciones">Falta completar este campo</div>
</div>
   </div>
   </div>


            


    <div class="row">

  <div class="col-xs-12 col-md-4">
  <div class="form-group">
<?php echo SelectGeneral("hog_ubicacion_urbana", "form-control", "uu", "Ubicacion:", "tb_ubicaciones_urbanas", "uu_id", "uu_name"); ?>
  <div class="requerido" id="falta_uu">Falta completar este campo</div>
</div>
</div>

<div class="col-xs-12 col-md-4">
  <div class="form-group">
<?php echo SelectGeneral("hog_tipo_casa", "form-control", "idtipocasa", "Este hogar vive en:", "tb_tipo_casa", "tc_id", "tc_name"); ?>
  <div class="requerido" id="falta_tipo_casa">Falta completar este campo</div>
</div>
</div>

<div class="col-xs-12 col-md-4">
  <div class="form-group">
<?php echo SelectGeneral("hog_material_piso", "form-control", "idmpiso", "Material predominante en los pisos:", "tb_material_piso", "mp_id", "mp_name"); ?>
  <div class="requerido" id="falta_mpiso">Falta completar este campo</div>
</div>
</div>



</div>


<div class="row">

<div class="col-xs-12 col-md-4">
  <div class="form-group">
<?php echo SelectGeneral("hog_material_paredes", "form-control", "idmparedes", "Material predominante en las paredes exteriores:", "tb_material_paredes", "mpe_id", "mpe_name"); ?>
  <div class="requerido" id="falta_mparedes">Falta completar este campo</div>
</div>
</div>


  <div class="col-xs-12 col-md-4">

    <div id="aa1" style="display:none;">
<div class="form-group">
<label>Las paredes exteriores tienen revestimiento?</label>
<div class="radio">
  <label>
<input name="hog_revestimiento_externo" type="radio" value="1"> Si | 
</label>
<label>
<input name="hog_revestimiento_externo" type="radio" value="0"> No
</label>
</div>
</div>
  </div>

  <div id="aa2" style="display:none;">
  <div class="form-group">
<?php echo SelectGeneral("hog_revestimiento_techo", "form-control", "oss", "Cual es el material predominante en el techo:", "tb_cubierta_techo", "ct_id", "ct_name"); ?>
</div>
  </div>

</div>

<div class="col-xs-12 col-md-4">
  <div class="form-group">
<label>En el techo ¿Tiene cielorraso o revestimiento?</label>
<div class="radio">
  <label>
<input name="hog_cielorraso" type="radio" value="1"> Si | 
</label>
<label>
<input name="hog_cielorraso" type="radio" value="0"> No | 
</label>
<label>
<input name="hog_cielorraso" type="radio" value="3"> Ignorado
</label>
</div>
  <div class="requerido" id="falta_cielorraso">Falta completar este campo</div>
</div>
</div>
</div>

<div class="row">
<div class="col-xs-12 col-md-6">
  <div class="form-group">
<?php echo InputGeneral("text", "hog_sup_pb", "form-control", "idsuppb", "Superficie de la planta baja en metros cuadrados", "Superficie de la planta baja (m2):",""); ?>
</div>
</div>

<div class="col-xs-12 col-md-6">
  <div class="form-group">
<?php echo InputGeneral("text", "hog_sup_viv", "form-control", "idsupviv", "Superficie total de la vivienda en metros cuadrados", "Superficie total de la vivienda (m2):",""); ?>
</div>
</div>

</div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-phone-alt"></span>  Servicios</div>
  </h3>
</div>

<div class="row">
  <div class="col-xs-12 col-md-6">
          <div class="form-group">
<label>Tiene Electricidad?</label>
<div class="radio">
  <label>
<input name="hos_electricidad" type="radio" value="1"> Si | 
</label>
<label>
<input name="hos_electricidad" type="radio" value="0"> No
</label>
</div>
<div class="requerido" id="falta_electricidad">Falta completar este campo</div>
</div>
</div>

<div class="col-xs-12 col-md-6">
          <div class="form-group">
<label>Tiene Teléfono?</label>
<div class="radio">
  <label>
<input name="hos_telefono" type="radio" value="1"> Si | 
</label>
<label>
<input name="hos_telefono" type="radio" value="0"> No
</label>
</div>
<div class="requerido" id="falta_telefono">Falta completar este campo</div>
</div>
</div>

</div>


<div class="row">

  <div class="col-xs-12 col-md-4">
  <div class="form-group">
<?php echo SelectGeneral("hos_acceso_agua", "form-control", "idaccesoagua", "Acceso al Agua:", "tb_acceso_agua", "aa_id", "aa_name"); ?>
  <div class="requerido" id="falta_accesoagua">Falta completar este campo</div>
</div>
</div>

<div class="col-xs-12 col-md-4">
  <div class="form-group">
<?php echo SelectGeneral("hos_fuente_agua", "form-control", "idfuenteagua", "Fuente de agua que usa para beber o cocinar:", "tb_fuente_agua", "fa_id", "fa_name"); ?>
  <div class="requerido" id="falta_fuente_agua">Falta completar este campo</div>
</div>
</div>

<div class="col-xs-12 col-md-4">
  <div class="form-group">
<?php echo SelectGeneral("hos_combustible_cocina", "form-control", "idcoco", "Principal combustible que usa para cocinar:", "tb_combustible_cocina", "coco_id", "coco_name"); ?>
  <div class="requerido" id="falta_coco">Falta completar este campo</div>
</div>
</div>



</div>

<div class="row">

  <div class="col-xs-12 col-md-4">
  <div class="form-group">
<?php echo SelectGeneral("hos_combustible_calefaccion", "form-control", "idcoca", "Principal combustible que usa para calefaccionar:", "tb_combustible_cocina", "coco_id", "coco_name"); ?>
  <div class="requerido" id="falta_coca">Falta completar este campo</div>
</div>
</div>

<div class="col-xs-12 col-md-4">
  <div class="form-group">
<?php echo SelectGeneral("hos_desague", "form-control", "iddesague", "Tipo de desagüe del Inodoro:", "tb_desagues", "de_id", "de_name"); ?>
  <div class="requerido" id="falta_desague">Falta completar este campo</div>
</div>
</div>

<div class="col-xs-12 col-md-4">
  <div class="form-group">
<?php echo SelectGeneral("hos_banio", "form-control", "idbanio", "Baño (Tipo):", "tb_banios", "ban_id", "ban_name"); ?>
  <div class="requerido" id="falta_banio">Falta completar este campo</div>
</div>
</div>



</div>

<button type="submit" class="btn btn-info" id="envia1">Continuar</button>
<input type="hidden" name="paso" value="2">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION['id_us']; ?>">
</form>

  <!-- fin contenido -->
</div>
<br><br><br><br>
<?php include("recortes/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

 
  <script type="text/javascript" language="javascript">
    $(document).ready(function() {

      $("#idmiembros").keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });
      $("#idhabitaciones").keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });
      $("#idsupviv").keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });
      $("#idsuppb").keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });


     $("#envia1").click(function() {
    if($("#idmiembros").val()==""){
      $("#falta_nromiembros").show();
      return false;
    }
    if($("#idhabitaciones").val()==""){
      $("#falta_nrohabitaciones").show();
      return false;
    }
     
    if($("#uu").val()==""){
      $("#falta_uu").show();
      return false;
    }
    if($("#idtipocasa").val()==""){
      $("#falta_tipo_casa").show();
      return false;
    }
    if($("#idmpiso").val()==""){
      $("#falta_mpiso").show();
      return false;
    }
    if($("#idmparedes").val()==""){
      $("#falta_mparedes").show();
      return false;
    }
    if(typeof $("input[name='hog_cielorraso']:checked").val() === "undefined"){
                      $("#falta_cielorraso").show();
                      return false;
                    }
    if(typeof $("input[name='hos_electricidad']:checked").val() === "undefined"){
                      $("#falta_electricidad").show();
                      return false;
                    }
    if(typeof $("input[name='hos_telefono']:checked").val() === "undefined"){
                      $("#falta_telefono").show();
                      return false;
                    }
    if($("#idaccesoagua").val()==""){
      $("#falta_accesoagua").show();
      return false;
    }
    if($("#idfuenteagua").val()==""){
      $("#falta_fuente_agua").show();
      return false;
    }
    if($("#idcoco").val()==""){
      $("#falta_coco").show();
      return false;
    }
    if($("#idcoca").val()==""){
      $("#falta_coca").show();
      return false;
    }
    if($("#iddesague").val()==""){
      $("#falta_desague").show();
      return false;
    }
    if($("#idbanio").val()==""){
      $("#falta_banio").show();
      return false;
    }
  });
  
  $("#idmparedes").change(function () {  
      if ($(this).val()==1) {
      $("#aa1").show();
      $("#aa2").hide(); 
      } else {
      $("#aa1").hide(); 
      $("#aa2").show();
      }
      });
    
  });
  
  </script>
   


</body>
</html>