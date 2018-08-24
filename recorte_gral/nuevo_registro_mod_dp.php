<?php
if (!isset($_SESSION)) { session_start(); }
include("../".$_SESSION["dir_sis"]."/secure2.php");
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
<?php include("/encabezado.php"); ?>
<div class="container-fluid">
<?php include("../".$_SESSION["dir_sis"]."/recortes/navegacion.php"); ?>

<div class="container">
      <h3>Modifica Persona</h3>

<?php include("datos_personales_mod_dp.php"); ?>



</div>
<br><br><br><br>
<?php include("pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/validacion_dp_sup.js"></script>
<script type="text/javascript" language="javascript">
    $(document).ready(function() {

      $("#parte1").keypress(function(e) {
          if (e.which == 13) {
          return false;
          }
      });


      $("#idtipodoc").attr('disabled','disabled');





      $("#nrodni").keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });
      $("#nro_doc").keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });




  });
  </script>
  <script src="../js/bootstrap-typeahead.js"></script>



<script src="../js/jquery.mask.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/navbar.js"></script>

</body>
</html>
