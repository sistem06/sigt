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

     
<!-- aca comienza el calendario -->
          
<div class="paso_in"> Familiares o Referentes 
<span class="nombre_emp">
<?php
echo DatoRegistro ('tb_datos_personales', 'dp_name', 'dp_id', $_GET['dp_id'], $conn).' ('.DatoRegistro ('tb_datos_personales', 'dp_dni', 'dp_id', $_GET['dp_id'], $conn).')';
?>
</span>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-link"></span>  Datos del Familiar o Referente</div>
  </h3>
</div>



          <form id="parte1" action="add_registro.php" method="post" role="form">
    <div class="form-group">
   <?php echo InputGeneral("text", "fam_name", "form-control", "medicacios", "escriba la medicacion que toma", "Nombre del Familiar o Referente:",""); ?>
  </div>

<div class="form-group">
<?php echo SelectGeneral("fam_parentesco", "form-control", "nombrins", "Parentesco:", "tb_parentesco", "par_id", "par_name"); ?>

</div>

<div class="form-group">
   <?php echo InputGeneral("text", "fam_ciudad", "form-control", "medicacios", "ciudad en la que vive", "Ciudad:",""); ?>
  </div>

  <div class="form-group">
   <?php echo InputGeneral("text", "fam_calle", "form-control", "medicacios", "calle en la que vive", "Calle:",""); ?>
  </div>

  <div class="form-group">
   <?php echo InputGeneral("text", "fam_nro", "form-control", "medicacios", "altura de la calle", "Altura:",""); ?>
  </div>

  <div class="form-group">
   <?php echo InputGeneral("text", "fam_telefono", "form-control", "telfam", "telefono del familiar", "Telefono del Familiar o Referente:",""); ?>
  </div>
<input type="hidden" name="paso" value="3">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<button type="submit" class="btn btn-success" id="envia1">Agregar</button>
</form>
<br>
<table class="table table-striped">
<?php
$ttx = "select * from tb_emprendedor_organizacion INNER JOIN tb_organizaciones ON tb_emprendedor_organizacion.eo_or_id = tb_organizaciones.or_id INNER JOIN tb_tipo_asociacion ON tb_emprendedor_organizacion.eo_fa_id = tb_tipo_asociacion.ta_id where tb_emprendedor_organizacion.eo_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<tr><td><?php echo utf8_encode($lis_dat['or_name']); ?></td><td><?php echo utf8_encode($lis_dat['ta_name']); ?></td><td><a href="quitar.php?val=<?php echo $lis_dat['eo_id']; ?>&id=eo_id&tabla=tb_emprendedor_organizacion"  title="eliminar" class="fancybox fancybox.iframe"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
</tr>
<?php
}
?>
</table>
<?php if(isset($_GET['acc']) and $_GET['acc']=="M"){ ?>
<a href="detalle_emprendedor.php?dp_id=<?php echo $_GET['dp_id']; ?>" title="volver">
<button type="button" class="btn btn-info" id="envia1">Volver</button></a>
<?php } else { ?>
<a href="nuevo_registro3.php?dp_id=<?php echo $_GET['dp_id']; ?>&em_id=<?php echo $_GET['em_id']; ?>" title="continuar">
<button type="button" class="btn btn-info" id="envia1">Continuar</button></a>
  <?php } ?>
  <!-- fin contenido -->

</div>
<br><br><br><br>
<?php include("recortes/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

 
  <script type="text/javascript" language="javascript">
    $(document).ready(function() {
     $("#envia1").click(function() {
    if($("#nombrins").val()==""){
      $("#falta_institucion").show();
      return false;
    }
    if($("#motivoins").val()==""){
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