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
          
<div class="paso_in"> Datos de Salud 
<span class="nombre_emp">
<?php
echo DatoRegistro ('tb_datos_personales', 'dp_name', 'dp_id', $_GET['dp_id'], $conn).' ('.DatoRegistro ('tb_datos_personales', 'dp_nro_doc', 'dp_id', $_GET['dp_id'], $conn).')';
?>
</span>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-file"></span>  Datos de Salud</div>
  </h3>
</div>



          <form id="parte1" action="tools/add_registro.php" method="post" role="form">

          <div class="form-group">
<label>Tiene Obra Social:</label>
<div class="radio">
  <label>
<input name="ds_tiene_os" type="radio" value="1" <?php if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET["dp_id"], "ds_tiene_os")==1) echo 'checked="checked"'; ?>> Si | 
</label>
<label>
<input name="ds_tiene_os" type="radio" value="0" <?php if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET["dp_id"], "ds_tiene_os")==0) echo 'checked="checked"'; ?>> No
</label>
</div>
</div>

<div id="aa1" style="display:none;">
    <div class="form-group">
<?php echo SelectGeneralVal("ds_os", "form-control", "os", "Obra Social:", "tb_obras_sociales", "os_id", "os_name",BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET["dp_id"], "ds_os")); ?>
  <div class="requerido" id="falta_os">Falta completar este campo</div>
</div>
</div>

<div class="form-group">
<label>Tiene Certificado de Discapacidad:</label>
<div class="radio">
  <label>
<input name="ds_tiene_cud" type="radio" value="1" <?php if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET["dp_id"], "ds_tiene_cud")==1) echo 'checked="checked"'; ?>> Si | 
</label>
<label>
<input name="ds_tiene_cud" type="radio" value="0" <?php if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET["dp_id"], "ds_tiene_cud")==0) echo 'checked="checked"'; ?>> No
</label>
</div>
</div>


<div id="aa2" style="display:none;">
 <div class="form-group">
   <?php echo InputGeneralVal("text", "ds_nro_cud", "form-control", "nrocud", "escriba el numero de CUD", "Nro de CUD:",BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET["dp_id"], "ds_nro_cud")); ?>
  <div class="requerido" id="falta_nrocud">Falta completar este campo</div>
</div>
<div class="form-group">
   <?php echo InputGeneralVal("date", "ds_vencimiento_cud", "form-control", "dsvencimiento", "escriba la fecha de vencimiento del CUD", "Vencimiento del CUD:",BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET["dp_id"], "ds_vencimiento_cud")); ?>
  <div class="requerido" id="falta_vencecud">Falta completar este campo</div>
</div>
</div>
<div class="form-group">
<?php echo TextAreaGeneralVal("ds_observaciones", "form-control", "idmotivo", "3", "Observaciones:",BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET["dp_id"], "ds_observaciones")); ?>
</div>




<button type="submit" class="btn btn-info" id="envia1">Modificar</button>
<input type="hidden" name="paso" value="102">
<input type="hidden" name="ds_dp_id" value="<?php echo $_GET['dp_id']; ?>">
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

      if($("input[name=ds_tiene_os]").val()==1){
          $("#aa1").show(); 
      }

      if ($("input[name=ds_tiene_cud]").val()==1) {
      $("#aa2").show(); 
      }

     $("#envia1").click(function() {
    if($("#emnombre").val()==""){
      $("#falta_nombre").show();
      return false;
    }
    if($("#subrubroid").val()==""){
      $("#falta_subrubro").show();
      return false;
    }
    if($("#tipoemp").val()==""){
      $("#falta_tipo").show();
      return false;
    }
  });
  
  $("input[name=ds_tiene_os]").change(function () {  
      if ($(this).val()==1) {
      $("#aa1").show(); 
      } else {
      $("#aa1").hide(); 
      }
      });
  

  $("input[name=ds_tiene_cud]").change(function () {   
      if ($(this).val()==1) {
      $("#aa2").show(); 
      } else {
      $("#aa2").hide(); 
      }
      });
  });
  
  </script>
   


</body>
</html>