<?php
if (!isset($_SESSION)) { session_start(); }
include("../".$_SESSION["dir_sis"]."/secure.php");
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
<?php include("encabezado.php"); ?>
<div class="container-fluid">
<?php include("../".$_SESSION["dir_sis"]."/recortes/navegacion.php"); ?>
  <!-- comienza contenido -->
</div>
<div class="container">


<!-- aca comienza el calendario -->

<div class="paso_in">Instituciones Asociadas de
<span class="nombre_emp">
<?php
echo DatoRegistro ('tb_datos_personales', 'dp_name', 'dp_id', $_GET['dp_id'], $conn).' ('.DatoRegistro ('tb_datos_personales', 'dp_nro_doc', 'dp_id', $_GET['dp_id'], $conn).')';
?>
</span>
<?php
if (!empty($_GET['em_id'])) {
	$emp_nom = DatoRegistro ('tb_datos_emprendimiento', 'em_nombre', 'em_id', $_GET['em_id'], $conn);
	echo ' "'.$emp_nom.'"';
};
?>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-link"></span> Asociación con Organizaciones
  </h3></div>




          <form id="parte1" action="add_registro.php" method="post" role="form" class="form-inline" style="padding:10px;">


<div class="form-group">
<label>Organización:</label>
<select name="eo_or_id" class="form-control" id="nombrins">
</select>
<div class="requerido" id="falta_institucion">Falta completar este campo</div>
</div>

<a href="tools/cambios_organizaciones.php"  id="agrega_organizacion" class="fancybox fancybox.iframe" style="display:none;">nueva carrera</a>




<div class="form-group">
<?php echo SelectGeneral("eo_fa_id", "form-control", "motivoins", "Relación:", "tb_forma_asociacion", "fa_id", "fa_name"); ?>
<div class="requerido" id="falta_motivo">Falta completar este campo</div>
</div>
<button type="submit" class="btn btn-success" id="envia1">Agregar</button>
<input type="hidden" name="paso" value="3">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="em_id" value="<?php echo $_GET['em_id']; ?>">
<input type="hidden" name="estado" value="<?php echo $_GET['estado']; ?>">

</form>
</div>
<br>
<table class="table table-striped">
<?php
$ttx = "select * from tb_emprendedor_organizacion INNER JOIN tb_organizaciones ON tb_emprendedor_organizacion.eo_or_id = tb_organizaciones.or_id INNER JOIN tb_tipo_asociacion ON tb_emprendedor_organizacion.eo_fa_id = tb_tipo_asociacion.ta_id where tb_emprendedor_organizacion.eo_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<tr><td><?php echo $lis_dat['or_name']; ?></td><td><?php echo $lis_dat['ta_name']; ?></td><td><a href="tools/quitar.php?val=<?php echo $lis_dat['eo_id']; ?>&id=eo_id&tabla=tb_emprendedor_organizacion"  title="eliminar" class="fancybox fancybox.iframe" id="quita_org"><button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a></td>
</tr>
<?php
}
?>
</table>

<form id="parte2" action="add_registro.php" method="post" role="form">
<button type="submit" class="btn btn-info" id="envia1">Guardar y Volver</button>
<input type="hidden" name="paso" value="4">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="em_id" value="<?php echo $_GET['em_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
 </form>
  <!-- fin contenido -->

</div>
<br><br><br><br>
<?php include("pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>


  <script type="text/javascript" language="javascript">
    $(document).ready(function() {

      $("#parte1").keypress(function(e) {
          if (e.which == 13) {
          return false;
          }
      });


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

     $.post("tools/organizaciones.php",  function(datacurso){
            $("#nombrins").html(datacurso);
            });

      $("#nombrins").change(function(){
      if($("#nombrins").val()=="Agregar"){
          $("#agrega_organizacion").trigger("click");
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
        $("#agrega_organizacion").fancybox({
        afterClose  : function() {
            $.post("tools/organizaciones.php",  function(datacurso){
            $("#nombrins").html(datacurso);
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
