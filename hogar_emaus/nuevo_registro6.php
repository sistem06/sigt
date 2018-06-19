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
<?php include("recortes/encabezado.php"); ?>
<div class="container-fluid">
<?php include("recortes/navegacion.php"); ?>
  <!-- comienza contenido -->
</div>
<div class="container">

      <h3>Nuevo Emprendedor</h3>
<!-- aca comienza el calendario -->
          
<div class="paso_in"><div class="numb1">2</div><div class="numb2">6</div> Datos del Emprendimiento de 
<span class="nombre_emp">
<?php
echo DatoRegistro ('tb_datos_personales', 'dp_name', 'dp_id', $_GET['dp_id'], $conn).' ('.DatoRegistro ('tb_datos_personales', 'dp_dni', 'dp_id', $_GET['dp_id'], $conn).')';
?>
</span><?php
echo ' "'.DatoRegistro ('tb_datos_emprendimiento', 'em_nombre', 'em_id', $_GET['em_id'], $conn).'"';
?>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-barcode"></span>  Necesidades del Emprendimiento</div>
  </h3>
</div>



          <form id="parte1" action="add_registro.php" method="post" role="form">
    

<div class="form-group">
<?php echo SelectGeneral("nro_destino", "form-control", "destino", "Necesita Préstamo para:", "tb_motivo_credito", "mc_id", "mc_name"); ?>
<div class="requerido" id="falta_destino">Falta completar este campo</div>
</div>

<div id="op1" style="display:none;">
<div class="form-group">
<?php echo SelectGeneral("nro_capacitacion", "form-control", "capacitacion", "Aspecto a Capacitarse:", "tb_tipo_capacitaciones", "tc_id", "tc_name"); ?>
<div class="requerido" id="falta_capacitacion">Falta completar este campo</div>
</div>
</div>


<input type="hidden" name="paso" value="11">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="em_id" value="<?php echo $_GET['em_id']; ?>">
<button type="submit" class="btn btn-success" id="envia1">Agregar</button>
</form>
<br>
<table class="table table-striped">
<?php
$ttx = "select * from tb_emprendedor_credito_nec INNER JOIN tb_motivo_credito ON tb_emprendedor_credito_nec.ecn_rubro = tb_motivo_credito.mc_id where tb_emprendedor_credito_nec.ecn_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<tr><td><?php echo utf8_encode($lis_dat['mc_name']); ?></td><td><?php if ($lis_dat['ecn_rubro_cap'] >0){
  echo DatoRegistro ('tb_tipo_capacitaciones', 'tc_name', 'tc_id', $lis_dat['ecn_rubro_cap']); } ?></td><td><a href="quitar.php?val=<?php echo $lis_dat['ecn_id']; ?>&id=ecn_id&tabla=tb_emprendedor_credito_nec"  title="eliminar" class="fancybox fancybox.iframe"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
</tr>
<?php
}
?>
</table>
<a href="nuevo_registro7.php?dp_id=<?php echo $_GET['dp_id']; ?>&em_id=<?php echo $_GET['em_id']; ?>" title="continuar">
<button type="button" class="btn btn-info" id="envia1">Continuar</button></a>
  <!-- fin contenido -->
</div>
<br><br><br><br>
<?php include("recortes/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

 
  <script type="text/javascript" language="javascript">
    $(document).ready(function() {
     $("#envia1").click(function() {
    if($("#destino").val()==""){
      $("#falta_destino").show();
      return false;
    }
    if($("#destino").val()==1 && $("#capacitacion").val()==""){
      $("#falta_capacitacion").show();
      return false;
    }
  });
  
  $("#destino").change(function() {
      if($("#destino").val()==1){
      $("#op1").show();
    } else {
      $("#op1").hide();
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