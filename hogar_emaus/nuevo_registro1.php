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
          
<div class="paso_in"> Datos de Salud 
<span class="nombre_emp">
<?php
echo DatoRegistro ('tb_datos_personales', 'dp_name', 'dp_id', $_GET['dp_id'], $conn).' ('.DatoRegistro ('tb_datos_personales', 'dp_nro_doc', 'dp_id', $_GET['dp_id'], $conn).')';
?>
</span>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-file"></span>  Datos de Salud</div>
  </h3>
</div>



          <form id="parte1" action="tools/add_registro.php" method="post" role="form">
        <div class="row">
    <div class="col-xs-12 col-md-6">

          <div class="form-group">
<label>Tiene Obra Social:</label>
<div class="radio">
  <label>
<input name="ds_tiene_os" type="radio" value="1"> Si | 
</label>
<label>
<input name="ds_tiene_os" type="radio" value="0" checked="checked"> No
</label>
</div>
</div>
</div>

<div class="col-xs-12 col-md-6">
<div id="aa1" style="display:none;">
    <div class="form-group">
<?php echo SelectGeneralAccion("ds_os", "form-control", "obrasocial", "Obra Social:", "tb_obras_sociales", "os_id", "os_name","Obras Sociales"); ?>
 
</div>
</div>
</div>
</div>

<a href="tools/cambios_obras_sociales.php"  id="agrega_os" class="fancybox fancybox.iframe" style="display:none;">nueva carrera</a>


<div class="form-group">
<label>Tiene Certificado de Discapacidad:</label>
<div class="radio">
  <label>
<input name="ds_tiene_cud" type="radio" value="1"> Si | 
</label>
<label>
<input name="ds_tiene_cud" type="radio" value="0" checked="checked"> No
</label>
</div>
</div>


<div id="aa2" style="display:none;">
 <div class="form-group">
   <?php echo InputGeneral("text", "ds_nro_cud", "form-control", "nrocud", "escriba el numero de CUD", "Nro de CUD:",""); ?>
  <div class="requerido" id="falta_nrocud">Falta completar este campo</div>
</div>
<div class="form-group">
   <?php echo InputGeneral("date", "ds_vencimiento_cud", "form-control", "dsvencimiento", "escriba la fecha de vencimiento del CUD", "Vencimiento del CUD:",""); ?>
  <div class="requerido" id="falta_vencecud">Falta completar este campo</div>
</div>
</div>

<div class="form-group">
<label>Tiene Pension o Jubilacion:</label>
<div class="radio">
  <label>
<input name="ds_pension_jubilacion" type="radio" value="1"> Si | 
</label>
<label>
<input name="ds_pension_jubilacion" type="radio" value="0" checked="checked"> No
</label>
</div>
</div>

<div class="form-group">
<label>Tiene Problemas de Salud:</label>
<div class="radio">
  <label>
<input name="ds_problemas_salud" type="radio" value="1"> Si | 
</label>
<label>
<input name="ds_problemas_salud" type="radio" value="0" checked="checked"> No
</label>
</div>
</div>

<div id="aa3" style="display:none;">
<div class="form-group">
<?php echo TextAreaGeneral("ds_cuales_problemas_salud", "form-control", "idprobsalud", "3", "Detalle de los problemas de Salud:"); ?>
</div>


  <div class="form-group">
   <?php echo InputGeneral("text", "ds_lugar_atencion", "form-control", "lugaratencion", "escriba el lugar donde se atiende", "Lugar de Atención médoca habitual:",""); ?>
  </div>
</div>
<div class="form-group">
<?php echo TextAreaGeneral("ds_observaciones", "form-control", "idmotivo", "3", "Observaciones:"); ?>
</div>




<button type="submit" class="btn btn-info" id="envia1">Continuar</button>
<input type="hidden" name="paso" value="2">
<input type="hidden" name="ds_dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION['id_us']; ?>">
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

  $("input[name=ds_problemas_salud]").change(function () {   
      if ($(this).val()==1) {
      $("#aa3").show(); 
      } else {
      $("#aa3").hide(); 
      }
      });

  $("#obrasocial").change(function(){
      if($("#obrasocial").val()=="Agregar"){
          $("#agrega_os").trigger("click");
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
        $(".fancybox").fancybox({
        afterClose  : function() { 
            window.location.reload();
        }
    });
});
  </script>

  <script type="text/javascript" language="javascript" src="../js/navbar.js"></script>


</body>
</html>