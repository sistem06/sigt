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
	<?php include("../recorte_gral/datos_change_domicilio.php"); ?>

<br><br><br><br>
<?php include("../recorte_gral/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/combinado_localidades.js"></script>
<script type="text/javascript" src="../js/geolocaliza.js"></script>
<script type="text/javascript" src="../js/validacion_calle.js"></script>
<script type="text/javascript" src="../js/predictivo_calles.js"></script>
<script type="text/javascript" src="../js/busca_barrio.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
  	$("#parte1").submit(function(event) {
		   if($("#dpcalle").val() != "" && $("#dpcalle").val() != $("#valor_calle").val()){
		          $("#falta_calle").show();
		          event.preventDefault();
       }
    });

	  var elegido=$("#iddepartamento").val();
		localidad=$("#idlocalidad").val();
	  $.post("../recorte_gral/localidades.php", { elegido: elegido, localidad: localidad }, function(data){
	        $("#idlocalidad").html(data);
    });
  });
</script>

<script type="text/javascript" language="javascript" src="../js/navbar.js"></script>

</body>
</html>
