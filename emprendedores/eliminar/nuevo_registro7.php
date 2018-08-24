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
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"
</head>
<body>
<?php include("../recorte_gral/encabezado.php"); ?>
<div class="container-fluid">
<?php include("recortes/navegacion.php"); ?>
  <!-- comienza contenido -->
</div>
<div class="container">

<!-- aca comienza el calendario -->

<div class="paso_in"><div class="numb1">2</div><div class="numb2">7</div> Datos del Emprendimiento de
<span class="nombre_emp">
<?php
echo DatoRegistro ('tb_datos_personales', 'dp_name', 'dp_id', $_GET['dp_id'], $conn).' ('.DatoRegistro ('tb_datos_personales', 'dp_nro_doc', 'dp_id', $_GET['dp_id'], $conn).')';
?>
</span><?php
echo ' "'.DatoRegistro ('tb_datos_emprendimiento', 'em_nombre', 'em_id', $_GET['em_id'], $conn).'"';
?>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-list"></span>  Ingresos</div>
  </h3>
</div>



          <form id="parte1" action="tools/add_registro1.php" method="post" role="form">

<div class="row">
  <div class="col-xs-12 col-md-4">

<div class="form-group  has-success">
<?php //echo InputGeneralVal("text", "nro_porcentaje", "form-control", "porcentaje", "escriba el porcentaje", "Porcentaje del ingreso familiar del Emprendimiento:",BuscaRegistro("tb_ingresos","in_dp_id",$_GET['dp_id'],"in_por")); ?>
<label for="porcentaje">Porcentaje de Ingreso Familiar</label>
<?php
	$sel1 = "";
	$sel2 = "";
	$sel3 = "";
	$sel4 = "";
	$qu = mysql_query("select * from tb_ingresos where in_dp_id = ".$_GET['dp_id']);
	while($a = mysql_fetch_array($qu)){
		switch ($a['in_por']) {
			case '1':
				$sel1 = 'selected="selected"';
				break;
			case '2':
				$sel2 = 'selected="selected"';
				break;
			case '3':
				$sel3 = 'selected="selected"';
				break;
			case '4':
				$sel4 = 'selected="selected"';
				break;
		}
	}
 ?>
<select class="form-control" name="nro_porcentaje" id="porcentaje">
	<option value="0"></option>
	<option value="1" <?php echo $sel1; ?> >Muy Poco &nbsp(&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp	< 24% )</option>
	<option value="2" <?php echo $sel2; ?> >Poco &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp(25% a 49% )</option>
	<option value="3" <?php echo $sel3; ?> >Bastante &nbsp&nbsp&nbsp(50% a 74% )</option>
	<option value="4" <?php echo $sel4; ?> >Mucho &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp(75% a 100%)</option>
</select>
<div class="requerido" id="falta_porcentaje">Falta completar este campo</div>
</div>
  </div>

  <div class="col-xs-12 col-md-4">
    <div class="form-group  has-success">
<?php echo SelectGeneralVal("ea_tipo_relacion", "form-control", "estadoiva", "Estado ante la Afip:", "tb_tipo_iva", "ti_id", "ti_name",BuscaRegistro("tb_estado_afip","ea_dp_id",$_GET['dp_id'],"ea_tipo_relacion")); ?>
<div class="requerido" id="falta_iva">Falta completar este campo</div>
</div>
  </div>
      <div class="col-xs-12 col-md-4">
      <div id="aa1" style="display:none">
  <div class="form-group">
<?php echo InputGeneralVal("date", "ea_vencimiento", "form-control", "ea_vencimiento", "escriba el vencimiento", "Vigencia del Comprobante:",BuscaRegistro("tb_estado_afip","ea_dp_id",$_GET['dp_id'],"ea_vencimiento")); ?>
</div>
</div>
      </div>

  </div>

<div class="form-group">
<label>Otros ingresos familiares:</label>
<div class="checkbox">
  <?php
      $qu = mysql_query("select * from tb_tipo_ingresos");
      while($a = mysql_fetch_array($qu)){
    echo '<label>';
    echo '<input type="checkbox" name="'.$a['ti_id'].'" value="si"';
    if(NroRegistroDoble ("tb_ingresos_otros", "io_dp_id", $_GET['dp_id'], "io_ti_id", $a['ti_id'])>0){
      echo ' checked ';
    }
    echo '>';
    echo $a['ti_name'].' |    </label>';

}
?>
</div>
</div>


<div class="row">
  <div class="col-xs-12 col-md-6">
<div class="form-group">
<label>Es Efector Social:</label>
<div class="radio">
   <label> <input type="radio" name="efe_so" value="si" <?php if(BuscaRegistro ("tb_ingresos", "in_dp_id", $_GET['dp_id'], "in_efector")=="si") echo 'checked'; ?>> Si | </label>
   <label> <input type="radio" name="efe_so" value="no" <?php if(BuscaRegistro ("tb_ingresos", "in_dp_id", $_GET['dp_id'], "in_efector")=="no") echo 'checked'; ?>> No</label>
</div>
</div>
</div>

<div class="col-xs-12 col-md-6">
<div id="aa2" style="display:none">
  <div class="form-group">
<?php echo InputGeneralVal("text", "efector_expediente", "form-control", "efector_expediente", "escriba el nro de expediente", "Nro de expediente:",BuscaRegistro("tb_ingresos","in_dp_id",$_GET['dp_id'],"in_efector_expediente")); ?>
</div>
</div>
</div>
</div>

<input type="hidden" name="paso" value="13">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="em_id" value="<?php echo $_GET['em_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
<button type="submit" class="btn btn-info" id="envia1">Guardar y Volver</button>
</form>


  <!-- fin contenido -->
</div>
<br><br><br><br>
<?php include("../recorte_gral/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>


  <script type="text/javascript" language="javascript">
    $(document).ready(function() {
     $("#parte1").submit(function(event) {
    if($("#porcentaje").val()=="" || $("#porcentaje").val()>100){
      $("#falta_porcentaje").show();
      event.preventDefault();
    }
     if($("#estadoiva").val()==""){
      $("#falta_iva").show();
      event.preventDefault();
    }
  });

     if ($("input[name=efe_so]").val()=='si') {
      $("#aa2").show();
      } else {
      $("#aa2").hide();
      }

  $("input[name=efe_so]").change(function () {
      if ($(this).val()=='si') {
      $("#aa2").show();
      } else {
      $("#aa2").hide();
      }
      });

  $("#estadoiva").change(function () {
      if ($(this).val() == 99) {
      $("#aa1").hide();
      } else {
      $("#aa1").show();
      }
      });
  $("#porcentaje").keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });

  if ($("#estadoiva").val() == 99) {
      $("#aa1").hide();
      } else {
      $("#aa1").show();
      }
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

</body>
</html>
