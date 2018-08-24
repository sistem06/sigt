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

<div class="paso_in"><div class="numb1">2</div><div class="numb2">4</div> Datos del Emprendimiento de
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
  <span class="glyphicon glyphicon-pencil"></span>  Capacitaciones Recibidas</div>
  </h3>




          <form id="parte1" action="tools/add_registro.php" method="post" role="form" class="form-inline" style="padding:10px;">


<div class="form-group">
<label>Organización:</label>
<select name="nro_org" class="form-control" id="org">
</select>
<div class="requerido" id="falta_org">Falta completar este campo</div>
</div>
<a href="tools/cambios_organizaciones.php" class="fancybox fancybox.iframe" id="agregaorg" style="display:none">agrega organizacion</a>
<div class="form-group">
<label>Motivo de Capacitación:</label>
<select name="nro_motivo" class="form-control" id="motivo">
</select>
<div class="requerido" id="falta_motivo">Falta completar este campo</div>
</div>
<a href="tools/cambios_motivo_capacitacion.php" class="fancybox fancybox.iframe" id="agregamotivo" style="display:none">agrega motivo</a>

<div class="form-group">
<label for="anio">Año: </label>
    <select name="ec_anio" class="form-control">
        <?php
					echo "<option>".$aa."</option>";
          $aa = date("Y");
          while ($aa > 1969){
              echo "<option>".$aa."</option>";
              $aa--;
          }
          ?>
    </select>
</div>

<input type="hidden" name="paso" value="7">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="em_id" value="<?php echo $_GET['em_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
<button type="submit" class="btn btn-success" id="envia1">Agregar</button>
<input type="hidden" name="estado" value="<?php echo $_GET['estado']; ?>">
</form>
</div>

<table class="table table-striped">
<?php
$ttx = "select * from tb_emprendedor_capacitaciones INNER JOIN tb_organizaciones ON tb_emprendedor_capacitaciones.ec_or_id = tb_organizaciones.or_id INNER JOIN tb_tipo_capacitaciones ON tb_emprendedor_capacitaciones.ec_motivo = tb_tipo_capacitaciones.tc_id where tb_emprendedor_capacitaciones.ec_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<tr><td><?php echo $lis_dat['or_name']; ?></td><td><?php echo $lis_dat['tc_name']; ?></td><td>
			  <?php if ($lis_dat['ec_anio'] <> 0) { echo $lis_dat['ec_anio']; } else { echo ""; } ?></td><td><a href="tools/quitar.php?val=<?php echo $lis_dat['ec_id']; ?>&id=ec_id&tabla=tb_emprendedor_capacitaciones"  title="eliminar" class="fancybox fancybox.iframe" id="quita_org"><button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a></td>
</tr>
<?php
}
?>
</table>

<form id="parte1" action="tools/add_registro.php" method="post" role="form">
<button type="submit" class="btn btn-info" id="envia1">Guardar y Volver</button>
<input type="hidden" name="paso" value="8">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="em_id" value="<?php echo $_GET['em_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
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
    if($("#org").val()==""){
      $("#falta_org").show();
      return false;
    }
    if($("#motivo").val()==""){
      $("#falta_motivo").show();
      return false;
    }


  });
      $.post("tools/organizaciones.php",  function(datacurso){
            $("#org").html(datacurso);
            });

      $.post("tools/motivo_capacitaciones.php",  function(datamotivo){
            $("#motivo").html(datamotivo);
            });

     $("#org").change(function(){
      if($("#org").val()=="Agregar"){
          $("#agregaorg").trigger("click");
      }
    });

     $("#motivo").change(function(){
      if($("#motivo").val()=="Agregar"){
          $("#agregamotivo").trigger("click");
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
        $("#agregaorg").fancybox({
        afterClose  : function() {
            $.post("tools/organizaciones.php",  function(datacurso){
            $("#org").html(datacurso);
            });
        }
    });
        $("#agregamotivo").fancybox({
        afterClose  : function() {
           $.post("tools/motivo_capacitaciones.php",  function(datamotivo){
            $("#motivo").html(datamotivo);
            });
        }
    });
        $("#quita_org").fancybox({
        afterClose  : function() {
            window.location.reload();
        }
    });
});
  </script>

</body>
</html>
