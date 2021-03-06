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
          
<div class="paso_in"><div class="numb1">2</div><div class="numb2">4</div> Datos del Emprendimiento de 
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
  <span class="glyphicon glyphicon-pencil"></span>  Capacitaciones Recibidas</div>
  </h3>
</div>



          <form id="parte1" action="add_registro.php" method="post" role="form">
    

<div class="form-group">
<?php echo SelectGeneral("nro_org", "form-control", "org", "Organización que lo capacitó:", "tb_organizaciones", "or_id", "or_name"); ?>
<div class="requerido" id="falta_org">Falta completar este campo</div>
</div>

<div class="form-group">
<?php echo SelectGeneral("nro_motivo", "form-control", "motivo", "Motivo de Capacitación:", "tb_tipo_capacitaciones", "tc_id", "tc_name"); ?>
<div class="requerido" id="falta_motivo">Falta completar este campo</div>
</div>
<input type="hidden" name="paso" value="7">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="em_id" value="<?php echo $_GET['em_id']; ?>">
<button type="submit" class="btn btn-success" id="envia1">Agregar</button>
</form>
<br>
<table class="table table-striped">
<?php
$ttx = "select * from tb_emprendedor_capacitaciones INNER JOIN tb_organizaciones ON tb_emprendedor_capacitaciones.ec_or_id = tb_organizaciones.or_id INNER JOIN tb_tipo_capacitaciones ON tb_emprendedor_capacitaciones.ec_motivo = tb_tipo_capacitaciones.tc_id where tb_emprendedor_capacitaciones.ec_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<tr><td><?php echo utf8_encode($lis_dat['or_name']); ?></td><td><?php echo utf8_encode($lis_dat['tc_name']); ?></td><td><a href="quitar.php?val=<?php echo $lis_dat['ec_id']; ?>&id=ec_id&tabla=tb_emprendedor_capacitaciones"  title="eliminar" class="fancybox fancybox.iframe"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
</tr>
<?php
}
?>
</table>
<a href="nuevo_registro5.php?dp_id=<?php echo $_GET['dp_id']; ?>&em_id=<?php echo $_GET['em_id']; ?>" title="continuar">
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
    if($("#org").val()==""){
      $("#falta_org").show();
      return false;
    }
    if($("#motivo").val()==""){
      $("#falta_motivo").show();
      return false;
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