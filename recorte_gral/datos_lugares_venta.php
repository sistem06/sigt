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
  <link rel="stylesheet" type="text/css" href="../source/chosen/chosen.css" media="screen" />
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

<div class="paso_in">Lugares de Venta de
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
  <span class="glyphicon glyphicon-home"></span>  Lugares de Venta</div>
  </h3>




          <form id="parte1" action="add_registro.php" method="post" role="form" class="form-inline" style="padding:10px;">


<div class="form-group">
<?php echo SelectGeneral("ev_tipo", "form-control", "tipo_compra", "Tipo:", "tb_tipo_punto_venta", "tpv_id", "tpv_name"); ?>

<div class="requerido" id="falta_tipo">Falta completar este campo</div>
</div>

<div id="op1" style="display:none;">
<div class="form-group">
<label>Feria:</label>
<select name="nro_feria" class="form-control" id="feria">
</select>
<div class="requerido" id="falta_feria">Falta completar este campo</div>
</div>
<a href="tools/cambios_ferias.php" class="fancybox fancybox.iframe" id="agregaferia" style="display:none;">agregar feria</a>
</div>

<div id="op2" style="display:none">
<div class="form-group">
<?php echo SelectGeneral("nro_barrio", "form-control", "barrio", "Barrio:", "tb_barrios", "bar_id", "bar_name"); ?>
<div class="requerido" id="falta_barrio">Falta completar este campo</div>
</div>
</div>

<div id="op3" style="display:none">
<div class="form-group">
<label>Comercio Propio:</label>
<select name="nro_comercio" class="form-control" id="comercio">
</select>

<div class="requerido" id="falta_comercio">Falta completar este campo</div>
</div>
<a href="tools/cambios_comercios.php?co_dp_id=<?php echo $_GET['dp_id']; ?>" class="fancybox fancybox.iframe" id="agregacomerciopropio" style="display:none;">agrega comercio propio</a>
</div>

<div id="op4" style="display:none">
<div class="form-group">
<label>Zona de Ventas:</label>
<select name="nro_zona" class="form-control" id="zona">
</select>

<div class="requerido" id="falta_zona">Falta completar este campo</div>
</div>
<a href="tools/cambios_zonas.php?co_dp_id=<?php echo $_GET['dp_id']; ?>" class="fancybox fancybox.iframe" id="agregazona" style="display:none;">agregar zona</a>
</div>

<div id="op6" style="display:none">
<div class="form-group">
<label>Comercio:</label>
<select name="nro_comercio1" class="form-control" id="comercio_gral">
</select>
<div class="requerido" id="falta_comercio">Falta completar este campo</div>
</div>
<a href="tools/cambios_comercios.php?co_dp_id=0" class="fancybox fancybox.iframe" id="agregacomercioestablecido" style="display:none;">agregar comercio</a>
</div>

<div id="op5" style="display:none">
<div class="form-group">
<label>Organización:</label>
<select name="nro_org" class="form-control" id="org">
</select>
<div class="requerido" id="falta_org">Falta completar este campo</div>
</div>
<a href="tools/cambios_organizaciones.php?co_dp_id=0" class="fancybox fancybox.iframe" id="agregaorg" style="display:none">Agregar organizacion</a>
</div>


<input type="hidden" name="paso" value="5">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="em_id" value="<?php echo $_GET['em_id']; ?>">
<button type="submit" class="btn btn-success" id="envia1">Agregar</button>
<input type="hidden" name="estado" value="<?php echo $_GET['estado']; ?>">
</form>
</div>
<br>
<table class="table table-striped">
<?php
$ttx = "select * from tb_emprendedor_ventas INNER JOIN tb_tipo_punto_venta ON tb_emprendedor_ventas.ev_tipo = tb_tipo_punto_venta.tpv_id where tb_emprendedor_ventas.ev_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<tr><td><?php echo $lis_dat['tpv_name']; ?></td><td>

<?php
switch($lis_dat['ev_tipo']){
    case 1:
    echo DatoRegistro ('tb_ferias', 'fe_name', 'fe_id', $lis_dat['ev_det_tipo'], $conn);
    break;

    case 2:
    //IS021 echo 'Barrio '.DatoRegistro ('tb_barrios', 'bar_name', 'bar_id', $lis_dat['ev_det_tipo'], $conn);
		echo 'Zona '.DatoRegistro ('tb_zonas', 'zo_name', 'zo_id', $lis_dat['ev_det_tipo'], $conn);
    break;

    case 3:
    echo DatoRegistro ('tb_comercios', 'co_name', 'co_id', $lis_dat['ev_det_tipo'], $conn);
    break;

    case 4:
    echo 'Zona '.DatoRegistro ('tb_zonas', 'zo_name', 'zo_id', $lis_dat['ev_det_tipo'], $conn);
    break;

    case 5:
    echo DatoRegistro ('tb_comercios', 'co_name', 'co_id', $lis_dat['ev_det_tipo'], $conn);
    break;

    case 6:
    echo DatoRegistro ('tb_organizaciones', 'or_name', 'or_id', $lis_dat['ev_det_tipo'], $conn);
    break;
  }
 ?>



</td><td><a href="tools/quitar.php?val=<?php echo $lis_dat['ev_id']; ?>&id=ev_id&tabla=tb_emprendedor_ventas"  title="eliminar" class="fancybox fancybox.iframe" id="quitar_venta"><button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a></td>
</tr>
<?php
}
?>
</table>

<form id="parte1" action="add_registro.php" method="post" role="form">
<button type="submit" class="btn btn-info" id="envia1">Guardar y Volver</button>
<input type="hidden" name="paso" value="6">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>" id="empe">
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
   $("#envia1").click(function() {
    if($("#tipo_compra").val()==""){
      $("#falta_tipo").show();
      return false;
    }
    if($("#tipo_compra").val()==1 && $("#feria").val()==""){
      $("#falta_feria").show();
      return false;
    }
    if($("#tipo_compra").val()==2 && $("#zona").val()==""){
      $("#falta_barrio").show();
      return false;
    }
    if($("#tipo_compra").val()==3 && $("#comercio").val()==""){
      $("#falta_comercio").show();
      return false;
    }
    if($("#tipo_compra").val()==4 && $("#zona").val()==""){
      $("#falta_zona").show();
      return false;
    }
    if($("#tipo_compra").val()==5 && $("#comercio_gral").val()==""){
      $("#falta_comercio").show();
      return false;
    }
    if($("#tipo_compra").val()==6 && $("#org").val()==""){
      $("#falta_org").show();
      return false;
    }
  });

  $("#tipo_compra").change(function() {
    if($("#tipo_compra").val()==1){
      $("#op1").css("display", "inline");
      $("#op2, #op3, #op4, #op5, #op6").hide();
    }
    if($("#tipo_compra").val()==2){
      $("#op4").css("display", "inline");
      $("#op1, #op3, #op2, #op5, #op6").hide();
    }
    if($("#tipo_compra").val()==3){
      $("#op3").css("display", "inline");
      $("#op1, #op2, #op4, #op5, #op6").hide();
    }
    if($("#tipo_compra").val()==4){
      $("#op4").css("display", "inline");
      $("#op1, #op2, #op3, #op5, #op6").hide();
    }
    if($("#tipo_compra").val()==6){
      $("#op5").css("display", "inline");
      $("#op1, #op2, #op4, #op3, #op6").hide();
    }
    if($("#tipo_compra").val()==5){
      $("#op6").css("display", "inline");
      $("#op1, #op2, #op4, #op5, #op3").hide();
    }
    });
  $.post("tools/ferias.php",  function(datacurso){
            $("#feria").html(datacurso);
            });
  $("#feria").change(function(){
      if($("#feria").val()=="Agregar"){
          $("#agregaferia").trigger("click");
      }
    });

  $.post("tools/comercios_propios.php",{val:$("#empe").val()},  function(datacom){
            $("#comercio").html(datacom);
            });
  $("#comercio").change(function(){
      if($("#comercio").val()=="Agregar"){
          $("#agregacomerciopropio").trigger("click");
      }
    });

  $.post("tools/zonas.php",  function(datazona){
		$("#zona").html(datazona);
	});
  $("#zona").change(function(){
      if($("#zona").val()=="Agregar"){
          $("#agregazona").trigger("click");
      }
    });

  $.post("tools/comercios_gral.php",{val:$("#empe").val()},  function(datacomag){
            $("#comercio_gral").html(datacomag);
            });
  $("#comercio_gral").change(function(){
      if($("#comercio_gral").val()=="Agregar"){
          $("#agregacomercioestablecido").trigger("click");
      }
    });

$.post("tools/organizaciones.php",  function(dataorg){
            $("#org").html(dataorg);
            });
   $("#org").change(function(){
      if($("#org").val()=="Agregar"){
          $("#agregaorg").trigger("click");
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
        $("#agregaferia").fancybox({
        afterClose  : function() {
            $.post("tools/ferias.php",  function(datacurso){
            $("#feria").html(datacurso);
            });
        }
    });

        $("#agregacomerciopropio").fancybox({
        afterClose  : function() {
            $.post("tools/comercios_propios.php",{val:$("#empe").val()},  function(datacom){
            $("#comercio").html(datacom);
            });
        }
    });

         $("#agregazona").fancybox({
        afterClose  : function() {
             $.post("tools/zonas.php",  function(datazona){
            $("#zona").html(datazona);
            });

              }
    });

         $("#agregacomercioestablecido").fancybox({
        afterClose  : function() {
             $.post("tools/comercios_gral.php",{val:$("#empe").val()},  function(datacomag){
            $("#comercio_gral").html(datacomag);
            });

        }
    });

         $("#agregaorg").fancybox({
        afterClose  : function() {
            $.post("tools/organizaciones.php",  function(dataorg){
            $("#org").html(dataorg);
            });

        }
    });

        $("#quitar_venta").fancybox({
        afterClose  : function() {
            window.location.reload();
        }
    });
});
  </script>
  <script type="text/javascript" src="../source/chosen/chosen.jquery.min.js"></script>
</body>
</html>
