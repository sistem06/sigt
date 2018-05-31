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
          
<div class="paso_in"><div class="numb1">2</div><div class="numb2">3</div> Datos del Beneficiario  
<span class="nombre_emp">
<?php
echo DatoRegistro ('tb_datos_personales', 'dp_name', 'dp_id', $_GET['dp_id'], $conn).' ('.DatoRegistro ('tb_datos_personales', 'dp_nro_doc', 'dp_id', $_GET['dp_id'], $conn).')';
?>
</span>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-wrench"></span>  Formación Profesional</div>
  </h3>
</div>



          <form id="parte1" action="tools/add_registro.php" method="post" role="form" class="form-inline">
    

<div class="form-group">
<?php echo SelectGeneral("bfp_fp_id", "form-control", "nombrins", "Curso:", "tb_formacion_profesional", "fp_id", "fp_name"); ?>
<div class="requerido" id="falta_nombre">Falta completar este campo</div>
</div>
<a href="tools/cambios_cursos_fp.php" class="fancybox fancybox.iframe"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-plus"></span></button></a>
<div class="form-group">
<?php echo SelectGeneral("bfp_situacion", "form-control", "situado", "Situación:", "tb_situaciones_curso", "sc_id", "sc_name"); ?>
</div>
<div class="form-group">
<label>Año</label>
<select name="bfp_year" class="form-control" id="motivoins">
<option></option>
   <?php
   $ano = date("Y");
      while($ano > 1959){
        echo '<option value="'.$ano.'">'.$ano.'</option>';
        $ano--;
      }
      ?>
   </select>

</div>
<input type="hidden" name="paso" value="5">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<button type="submit" class="btn btn-success" id="envia1">Agregar</button>
</form>
<br>
<table class="table table-striped">
<?php
$ttx = "select * from tb_beneficiario_formacion_profesional INNER JOIN tb_formacion_profesional ON tb_beneficiario_formacion_profesional.bfp_fp_id = tb_formacion_profesional.fp_id INNER JOIN tb_situaciones_curso ON tb_beneficiario_formacion_profesional.bfp_situacion = tb_situaciones_curso.sc_id where tb_beneficiario_formacion_profesional.bfp_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<tr><td><?php echo utf8_encode($lis_dat['fp_name']); ?></td><td><?php echo utf8_encode($lis_dat['sc_name']); ?></td><td><?php echo utf8_encode($lis_dat['bfp_year']); ?></td><td><a href="tools/quitar.php?val=<?php echo $lis_dat['bfp_id']; ?>&id=bfp_id&tabla=tb_beneficiario_formacion_profesional"  title="eliminar" class="fancybox fancybox.iframe"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
</tr>
<?php
}
?>
</table>
<?php if(isset($_GET['acc']) and $_GET['acc']=="M"){ ?>
<a href="detalle_emprendedor.php?dp_id=<?php echo $_GET['dp_id']; ?>" title="volver">
<button type="button" class="btn btn-info" id="envia1">Volver</button></a>
<?php } else { ?>
<a href="detalle_beneficiario.php?dp_id=<?php echo $_GET['dp_id']; ?>" title="continuar">
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
      $("#falta_nombre").show();
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