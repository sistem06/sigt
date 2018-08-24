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

<div class="form-group">
<?php echo InputGeneral("text", "nro_porcentaje", "form-control", "porcentaje", "escriba el porcentaje", "Porcentaje del ingreso familiar del Emprendimiento:"); ?>
<div class="requerido" id="falta_porcentaje">Falta completar este campo</div>
</div>
  </div>

  <div class="col-xs-12 col-md-4">
    <div class="form-group">
<?php echo SelectGeneral("ea_tipo_relacion", "form-control", "estadoiva", "Estado ante la Afip:", "tb_tipo_iva", "ti_id", "ti_name"); ?>
<div class="requerido" id="falta_iva">Falta completar este campo</div>
</div>
  </div>
      <div class="col-xs-12 col-md-4">
      <div id="aa1" style="display:none">
  <div class="form-group">
<?php echo InputGeneral("date", "ea_vencimiento", "form-control", "ea_vencimiento", "escriba el vencimiento", "Vigencia del Comprobante:"); ?>
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
    ?>
    <label>
    <input type="checkbox" name="<?php echo $a['ti_id']; ?>" value="si">
    <?php
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
   <label> <input type="radio" name="efe_so" value="si"> Si | </label>
   <label> <input type="radio" name="efe_so" value="no"> No</label>
</div>
</div>
</div>

<div class="col-xs-12 col-md-6">
<div id="aa2" style="display:none">
  <div class="form-group">
<?php echo InputGeneral("text", "efector_expediente", "form-control", "efector_expediente", "escriba el nro de expediente", "Nro de expediente:"); ?>
</div>
</div>
</div>
</div>

<input type="hidden" name="paso" value="13">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="em_id" value="<?php echo $_GET['em_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
<button type="submit" class="btn btn-info" id="envia1">Continuar</button>
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
    if($("#porcentaje").val()=="" || $("#porcentaje").val()>100){
      $("#falta_porcentaje").show();
      return false;
    }
     if($("#estadoiva").val()==""){
      $("#falta_iva").show();
      return false;
    }
  });

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
