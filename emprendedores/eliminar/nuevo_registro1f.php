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

<div class="paso_in"><div class="numb1">2</div><div class="numb2">1</div> Datos del Emprendimiento de
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
  <span class="glyphicon glyphicon-random"></span>  Familiares Asociados</div>
  </h3>
</div>



          <form id="parte1" action="tools/add_registro.php" method="post" role="form">
    <div class="row">
<div class="col-xs-12 col-md-6">
<div class="form-group">
<?php echo InputGeneral("text","fam_name", "form-control", "name","escriba el nombre del familiar asociado", "Nombre del Familiar Asociado:"); ?>
<div class="requerido" id="falta_org">Falta completar este campo</div>
</div>
</div>
<div class="col-xs-12 col-md-6">
<div class="form-group">
<?php echo SelectGeneral("fam_parentesco", "form-control", "motivo", "Parentesco:", "tb_parentesco", "par_id", "par_name"); ?>
<div class="requerido" id="falta_motivo">Falta completar este campo</div>
</div>
</div>
</div>

<input type="hidden" name="paso" value="14">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="em_id" value="<?php echo $_GET['em_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
<button type="submit" class="btn btn-success" id="envia1">Agregar</button>
</form>
<br>
<table class="table table-striped">
<?php
$ttx = "select * from tb_familiares INNER JOIN tb_parentesco ON tb_familiares.fam_parentesco = tb_parentesco.par_id where tb_familiares.fam_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<!-- *sk01* quito utf8_encode(); -->
<tr><td><?php echo $lis_dat['fam_name']; ?></td><td>

<?php
echo $lis_dat['par_name'];
 ?>



</td><td><a href="tools/quitar.php?val=<?php echo $lis_dat['fam_id']; ?>&id=fam_id&tabla=tb_familiares"  title="eliminar" class="fancybox fancybox.iframe"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
</tr>
<?php
}
?>
</table>
<a href="detalle_beneficiario.php?dp_id=<?php echo $_GET['dp_id']; ?>&em_id=<?php echo $_GET['em_id']; ?>" title="continuar">
<button type="button" class="btn btn-info" id="envia1">Guardar y Volver</button></a>
  <!-- fin contenido -->
</div>
<br><br><br><br>
<?php include("../recorte_gral/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>


  <script type="text/javascript" language="javascript">
    $(document).ready(function() {
   $("#envia1").click(function() {
    if($("#name").val()==""){
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
