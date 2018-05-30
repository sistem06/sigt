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
          
<div class="paso_in">
<span class="nombre_emp">
<?php
echo "Datos del Hogar de ".DatoRegistro ('tb_datos_personales', 'dp_name', 'dp_id', $_GET['dp_id'], $conn).' ('.DatoRegistro ('tb_datos_personales', 'dp_nro_doc', 'dp_id', $_GET['dp_id'], $conn).')';
?>
</span>

</div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-link"></span>  Mas datos de la familia</div>
  </h3>
</div>



          <form id="parte1" action="tools/add_registro1.php" method="post" role="form">
    
<div class="row">
 
<div class="col-xs-12 col-md-4">
    <div class="form-group has-success">
<?php echo SelectGeneral("hc_tipo_familia", "form-control", "tipofamilia", "Tipo de Familia:", "tb_tipo_familia", "tf_id", "tf_name"); ?>
<div class="requerido" id="falta_tipofamilia">Falta completar este campo</div>
</div>
  </div>

  <div class="col-xs-12 col-md-4">
    <div class="form-group has-success">
<?php echo SelectGeneral("hc_edad_padres", "form-control", "edadpadres", "Edad de los padres o cuidadores principales:", "tb_edad_padres", "ep_id", "ep_name"); ?>
<div class="requerido" id="falta_edadpadres">Falta completar este campo</div>
</div>
  </div>
      <div class="col-xs-12 col-md-4">
    <div class="form-group has-success">
<?php echo SelectGeneral("hc_ingresos_importes", "form-control", "ingresosimportes", "Ingresos familiares:", "tb_ingresos_importes", "ii_id", "ii_name"); ?>
<div class="requerido" id="falta_ingresosimportes">Falta completar este campo</div>
</div>
  </div>

  </div>
<div id="aa2" style="display:none">
<div class="form-group">
<label>Origen de los ingresos familiares:</label>
<div class="checkbox">
  <?php
      $qu = mysql_query("select * from tb_tipo_ingresos");
      while($a = mysql_fetch_array($qu)){
    ?>
    <label>
    <input type="checkbox" name="<?php echo $a['ti_id']; ?>" value="si"> 
    <?php
    echo utf8_encode($a['ti_name']).' |    </label>';
}
?>
</div>
</div>
</div>



<input type="hidden" name="paso" value="13">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="ho_id" value="<?php echo $_GET['ho_id']; ?>">
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
    if($("#tipofamilia").val()==""){
      $("#falta_tipofamilia").show();
      return false;
    }
     if($("#edadpadres").val()==""){
      $("#falta_edadpadres").show();
      return false;
    }
    if($("#ingresosimportes").val()==""){
      $("#falta_ingresosimportes").show();
      return false;
    }
  });
  
  

  $("#ingresosimportes").change(function () {  
      if ($(this).val() > 1) {
      $("#aa2").show(); 
      } else {
      $("#aa2").hide(); 
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
  
</body>
</html>