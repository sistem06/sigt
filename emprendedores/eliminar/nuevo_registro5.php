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

<div class="paso_in"><div class="numb1">2</div><div class="numb2">5</div> Datos del Emprendimiento de
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
  <span class="glyphicon glyphicon-usd"></span>  Subsidios/Créditos Recibidos</div>
  </h3>

          <form id="parte1" action="tools/add_registro.php" method="post" role="form" class="form-inline" style="padding:10px;">

<div class="row">
  <div class="col-xs-12 col-md-3">
		<div class="form-group">
			<label>Entidad Otorgante:</label>
			<select name="nro_org" class="form-control" id="org"></select>
			<div class="requerido" id="falta_org">Falta completar este campo</div>
		</div>
		<a href="tools/cambios_organizaciones.php" class="fancybox fancybox.iframe" id="agregaorg" style="display:none">agrega org</a></div>

<div class="col-xs-12 col-md-3">
	<div class="form-group">
		<label>Destino del Crédito:</label>
		<select name="nro_destino" class="form-control" id="destino"></select>
		<div class="requerido" id="falta_destino">Falta completar este campo</div>
	</div>
	<a href="tools/cambios_motivo_credito.php" class="fancybox fancybox.iframe" id="agregamotivo" style="display:none">motivo</a>
</div>

<div class="col-xs-12 col-md-3">
	<div class="form-group">
	<label>Monto:</label>
		<?php echo InputGeneral("number", "monto", "form-control", "monto", "", "",""); ?>
	</div>
</div>

<div class="col-xs-12 col-md-1">
	<div class="form-group">
		<label>Año:</label>
		<select name="ano" class="form-control" id="idano">
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
</div>

<div class="col-xs-12 col-md-3">
	<div class="checkbox">
		<label>
			Esta Vigente el Crédito?
	 <input name="vigente" type="checkbox" value="SI"> </label>
	</div>
</div>

</div> <!-- div class="row" -->
<br>

<input type="hidden" name="paso" value="9">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="em_id" value="<?php echo $_GET['em_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
<button type="submit" class="btn btn-success" id="envia1">Agregar</button>
<input type="hidden" name="estado" value="<?php echo $_GET['estado']; ?>">
</form>
</div>

<table class="table table-striped">
	<tr>
		<td><b>Entidad Otorgante</b></td>
		<td><b>Destino del Crédito</b></td>
		<td><b>Monto</b></td>
		<td><b>Año</b></td>
		<td><b>Estado</b></td>
		<td><b>Eliminar</b></td>
	</tr>
<?php
$ttx = "select * from tb_emprendedor_credito INNER JOIN tb_organizaciones ON tb_emprendedor_credito.ec_or = tb_organizaciones.or_id INNER JOIN tb_motivo_credito ON tb_emprendedor_credito.ec_mo = tb_motivo_credito.mc_id where tb_emprendedor_credito.ec_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<tr><td><?php echo $lis_dat['or_name']; ?></td><td><?php echo $lis_dat['mc_name']; ?></td>
	<td><?php if (isset($lis_dat['ec_monto'])) { echo "$".$lis_dat['ec_monto'];	} ?></td>
	<td><?php echo $lis_dat['ec_año']; ?></td>
	<td><?php if($lis_dat['ec_vigente']=="SI"){ ?> <span class="label label-danger">VIGENTE</span> <?php } ?></td>
	<td><a href="tools/quitar.php?val=<?php echo $lis_dat['ec_id']; ?>&id=ec_id&tabla=tb_emprendedor_credito"  title="eliminar" class="fancybox fancybox.iframe" id="quita_org"><button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a></td>
</tr>
<?php
}
?>
</table>

<form id="parte1" action="tools/add_registro.php" method="post" role="form">
<button type="submit" class="btn btn-info" id="envia1">Guardar y Volver</button>
<input type="hidden" name="paso" value="10">
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
    if($("#destino").val()==""){
      $("#falta_destino").show();
      return false;
    }
  });

     $.post("tools/organizaciones.php",  function(datacurso){
            $("#org").html(datacurso);
            });
     $.post("tools/motivo_creditos.php",  function(datamotivo){
            $("#destino").html(datamotivo);
            });

     $("#org").change(function(){
      if($("#org").val()=="Agregar"){
          $("#agregaorg").trigger("click");
      }
    });

     $("#destino").change(function(){
      if($("#destino").val()=="Agregar"){
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
            $.post("tools/motivo_creditos.php",  function(datamotivo){
            $("#destino").html(datamotivo);
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
