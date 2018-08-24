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
  <span class="glyphicon glyphicon-phone"></span>  Equipamiento de la Vivienda</div>
  </h3>
</div>



          <form id="parte1" action="tools/add_registro.php" method="post" role="form">

          <div class="row">
  <div class="col-xs-12 col-md-3">
          <div class="form-group">
<label>Tiene Heladera?</label>
<div class="radio">
  <label>
<input name="eq_heladera" type="radio" value="1"> Si | 
</label>
<label>
<input name="eq_heladera" type="radio" value="0"> No
</label>
</div>
<div class="requerido" id="falta_heladera">Falta completar este campo</div>
</div>
</div>

<div class="col-xs-12 col-md-3">
          <div class="form-group">
<label>Tiene Cocina?</label>
<div class="radio">
  <label>
<input name="eq_cocina" type="radio" value="1"> Si | 
</label>
<label>
<input name="eq_cocina" type="radio" value="0"> No
</label>
</div>
<div class="requerido" id="falta_cocina">Falta completar este campo</div>
</div>
</div>

  <div class="col-xs-12 col-md-3">
          <div class="form-group">
<label>Tiene Salamandra / Tacho?</label>
<div class="radio">
  <label>
<input name="eq_salamandra" type="radio" value="1"> Si | 
</label>
<label>
<input name="eq_salamandra" type="radio" value="0"> No
</label>
</div>
<div class="requerido" id="falta_salamandra">Falta completar este campo</div>
</div>
</div>

<div class="col-xs-12 col-md-3">
          <div class="form-group">
<label>Tiene Teléfono fijo?</label>
<div class="radio">
  <label>
<input name="eq_telefono" type="radio" value="1"> Si | 
</label>
<label>
<input name="eq_telefono" type="radio" value="0"> No
</label>
</div>
<div class="requerido" id="falta_telefono">Falta completar este campo</div>
</div>
</div>


</div>

<div class="row">
  <div class="col-xs-12 col-md-3">
          <div class="form-group">
<label>Tiene Celular?</label>
<div class="radio">
  <label>
<input name="eq_celular" type="radio" value="1"> Si | 
</label>
<label>
<input name="eq_celular" type="radio" value="0"> No
</label>
</div>
<div class="requerido" id="falta_celular">Falta completar este campo</div>
</div>
</div>

<div class="col-xs-12 col-md-3">
          <div class="form-group">
<label>Tiene Lavarropas?</label>
<div class="radio">
  <label>
<input name="eq_lavarropa" type="radio" value="1"> Si | 
</label>
<label>
<input name="eq_lavarropa" type="radio" value="0"> No
</label>
</div>
<div class="requerido" id="falta_lavarropa">Falta completar este campo</div>
</div>
</div>

  <div class="col-xs-12 col-md-3">
          <div class="form-group">
<label>Tiene DVD o Videocassetera?</label>
<div class="radio">
  <label>
<input name="eq_dvd" type="radio" value="1"> Si | 
</label>
<label>
<input name="eq_dvd" type="radio" value="0"> No
</label>
</div>
<div class="requerido" id="falta_dvd">Falta completar este campo</div>
</div>
</div>

<div class="col-xs-12 col-md-3">
          <div class="form-group">
<label>Tiene Televisión por cable?</label>
<div class="radio">
  <label>
<input name="eq_tvcable" type="radio" value="1"> Si | 
</label>
<label>
<input name="eq_tvcable" type="radio" value="0"> No
</label>
</div>
<div class="requerido" id="falta_tvcable">Falta completar este campo</div>
</div>
</div>


</div>

<div class="row">
  <div class="col-xs-12 col-md-3">
          <div class="form-group">
<label>Tiene Direct TV?</label>
<div class="radio">
  <label>
<input name="eq_directv" type="radio" value="1"> Si | 
</label>
<label>
<input name="eq_directv" type="radio" value="0"> No
</label>
</div>
<div class="requerido" id="falta_directv">Falta completar este campo</div>
</div>
</div>

<div class="col-xs-12 col-md-3">
          <div class="form-group">
<label>Tiene Horno microondas?</label>
<div class="radio">
  <label>
<input name="eq_hornom" type="radio" value="1"> Si | 
</label>
<label>
<input name="eq_hornom" type="radio" value="0"> No
</label>
</div>
<div class="requerido" id="falta_hornom">Falta completar este campo</div>
</div>
</div>

  <div class="col-xs-12 col-md-3">
          <div class="form-group">
<label>Tiene Computadora con Internet?</label>
<div class="radio">
  <label>
<input name="eq_pc_web" type="radio" value="1"> Si | 
</label>
<label>
<input name="eq_pc_web" type="radio" value="0"> No
</label>
</div>
<div class="requerido" id="falta_pc_web">Falta completar este campo</div>
</div>
</div>

<div class="col-xs-12 col-md-3">
          <div class="form-group">
<label>Tiene Computadora sola?</label>
<div class="radio">
  <label>
<input name="eq_pc" type="radio" value="1"> Si | 
</label>
<label>
<input name="eq_pc" type="radio" value="0"> No
</label>
</div>
<div class="requerido" id="falta_pc">Falta completar este campo</div>
</div>
</div>


</div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-paperclip"></span>  Datos del Lote</div>
  </h3>
</div>

<div class="row">

  <div class="col-xs-12 col-md-4">
  <div class="form-group">
<?php echo SelectGeneral("pr_propiedad", "form-control", "idpropiedad", "Propiedad del terreno:", "tb_tipo_propiedad", "tp_id", "tp_name"); ?>
  <div class="requerido" id="falta_propiedad">Falta completar este campo</div>
</div>
</div>

<div class="col-xs-12 col-md-4">
  <div class="form-group">
<?php echo SelectGeneral("pr_ocupacion", "form-control", "idocupacion", "Condición de ocupación:", "tb_condicion_ocupacion", "co_id", "co_name"); ?>
  <div class="requerido" id="falta_ocupacion">Falta completar este campo</div>
</div>
</div>

<div class="col-xs-12 col-md-4">
  <div class="form-group">
<?php echo SelectGeneral("pr_uso", "form-control", "iduso", "Condición de uso:", "tb_condicion_uso", "cu_id", "cu_name"); ?>
  <div class="requerido" id="falta_uso">Falta completar este campo</div>
</div>
</div>



</div>



<button type="submit" class="btn btn-info" id="envia1">Continuar</button>
<input type="hidden" name="paso" value="3">
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
    
    if(typeof $("input[name='eq_heladera']:checked").val() === "undefined"){
                      $("#falta_heladera").show();
                      return false;
                    }
    if(typeof $("input[name='eq_cocina']:checked").val() === "undefined"){
                      $("#falta_cocina").show();
                      return false;
                    }
    if(typeof $("input[name='eq_salamandra']:checked").val() === "undefined"){
                      $("#falta_salamandra").show();
                      return false;
                    }
    if(typeof $("input[name='eq_telefono']:checked").val() === "undefined"){
                      $("#falta_telefono").show();
                      return false;
                    }
    if(typeof $("input[name='eq_celular']:checked").val() === "undefined"){
                      $("#falta_celular").show();
                      return false;
                    }
    if(typeof $("input[name='eq_lavarropa']:checked").val() === "undefined"){
                      $("#falta_lavarropa").show();
                      return false;
                    }
    if(typeof $("input[name='eq_dvd']:checked").val() === "undefined"){
                      $("#falta_dvd").show();
                      return false;
                    }
    if(typeof $("input[name='eq_tvcable']:checked").val() === "undefined"){
                      $("#falta_tvcable").show();
                      return false;
                    }
    if(typeof $("input[name='eq_directv']:checked").val() === "undefined"){
                      $("#falta_directv").show();
                      return false;
                    }
    if(typeof $("input[name='eq_hornom']:checked").val() === "undefined"){
                      $("#falta_hornom").show();
                      return false;
                    }
    if(typeof $("input[name='eq_pc_web']:checked").val() === "undefined"){
                      $("#falta_pc_web").show();
                      return false;
                    }
    if(typeof $("input[name='eq_pc']:checked").val() === "undefined"){
                      $("#falta_pc").show();
                      return false;
                    }
    if($("#idpropiedad").val()==""){
      $("#falta_propiedad").show();
      return false;
    }
    if($("#idocupacion").val()==""){
      $("#falta_ocupacion").show();
      return false;
    }
    if($("#iduso").val()==""){
      $("#falta_uso").show();
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