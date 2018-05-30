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
          
<div class="paso_in"><div class="numb1">2</div><div class="numb2">3</div> Datos del Emprendimiento de 
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
  <span class="glyphicon glyphicon-home"></span>  Lugares de Venta</div>
  </h3>
</div>



          <form id="parte1" action="add_registro.php" method="post" role="form">
    

<div class="form-group">
<?php echo SelectGeneral("ev_tipo", "form-control", "tipo_compra", "Tipo:", "tb_tipo_punto_venta", "tpv_id", "tpv_name"); ?>
<div class="requerido" id="falta_tipo">Falta completar este campo</div>
</div>

<div id="op1" style="display:none">
<div class="form-group">
<?php echo SelectGeneral("nro_feria", "form-control", "feria", "Feria:", "tb_ferias", "fe_id", "fe_name"); ?>
<div class="requerido" id="falta_feria">Falta completar este campo</div>
</div>
</div>

<div id="op2" style="display:none">
<div class="form-group">
<?php echo SelectGeneral("nro_barrio", "form-control", "barrio", "Barrio:", "tb_barrios", "bar_id", "bar_name"); ?>
<div class="requerido" id="falta_barrio">Falta completar este campo</div>
</div>
</div>

<div id="op3" style="display:none">
<div class="form-group">
<?php echo InputGeneral("text","nro_comercio", "form-control", "comercio","escriba el nombre del comercio", "Nombre del Comercio:"); ?>
<div class="requerido" id="falta_comercio">Falta completar este campo</div>
</div>
<div class="form-group">
<?php echo SelectGeneral("nro_calle", "form-control", "calle", "Calle:", "tb_calle", "ca_id", "ca_name"); ?>
<div class="requerido" id="falta_calle">Falta completar este campo</div>
</div>
<div class="form-group">
<?php echo InputGeneral("number","nro_nro", "form-control", "altura","escriba la altura del domicilio", "Altura:"); ?>
</div>
</div>

<div id="op4" style="display:none">
<div class="form-group">
<?php echo SelectGeneral("nro_zona", "form-control", "zona", "Zona de Ventas:", "tb_zonas", "zo_id", "zo_name"); ?>
<div class="requerido" id="falta_zona">Falta completar este campo</div>
</div>
</div>

<div id="op5" style="display:none">
<div class="form-group">
<?php echo SelectGeneral("nro_org", "form-control", "org", "Organización:", "tb_organizaciones", "or_id", "or_name"); ?>
<div class="requerido" id="falta_org">Falta completar este campo</div>
</div>
</div>


<input type="hidden" name="paso" value="5">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="em_id" value="<?php echo $_GET['em_id']; ?>">
<button type="submit" class="btn btn-success" id="envia1">Agregar</button>
</form>
<br>
<table class="table table-striped">
<?php
$ttx = "select * from tb_emprendedor_ventas INNER JOIN tb_tipo_punto_venta ON tb_emprendedor_ventas.ev_tipo = tb_tipo_punto_venta.tpv_id where tb_emprendedor_ventas.ev_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<tr><td><?php echo utf8_encode($lis_dat['tpv_name']); ?></td><td>
  
<?php 
switch($lis_dat['ev_tipo']){
    case 1:
    echo DatoRegistro ('tb_ferias', 'fe_name', 'fe_id', $lis_dat['ev_det_tipo'], $conn);
    break;  
    
    case 2:
    echo 'Barrio '.DatoRegistro ('tb_barrios', 'bar_name', 'bar_id', $lis_dat['ev_det_tipo'], $conn);
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



</td><td><a href="quitar.php?val=<?php echo $lis_dat['ev_id']; ?>&id=ev_id&tabla=tb_emprendedor_ventas"  title="eliminar" class="fancybox fancybox.iframe"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
</tr>
<?php
}
?>
</table>
<a href="nuevo_registro4.php?dp_id=<?php echo $_GET['dp_id']; ?>&em_id=<?php echo $_GET['em_id']; ?>" title="continuar">
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
    if($("#tipo_compra").val()==""){
      $("#falta_tipo").show();
      return false;
    }
    if($("#tipo_compra").val()==1 && $("#feria").val()==""){
      $("#falta_feria").show();
      return false;
    }
    if($("#tipo_compra").val()==2 && $("#barrio").val()==""){
      $("#falta_barrio").show();
      return false;
    }
    if($("#tipo_compra").val()==3 && $("#comercio").val()==""){
      $("#falta_comercio").show();
      return false;
    }
    if($("#tipo_compra").val()==3 && $("#calle").val()==""){
      $("#falta_calle").show();
      return false;
    }
    if($("#tipo_compra").val()==4 && $("#zona").val()==""){
      $("#falta_zona").show();
      return false;
    }
    if($("#tipo_compra").val()==5 && $("#comercio").val()==""){
      $("#falta_comercio").show();
      return false;
    }
    if($("#tipo_compra").val()==5 && $("#calle").val()==""){
      $("#falta_calle").show();
      return false;
    }
    if($("#tipo_compra").val()==6 && $("#org").val()==""){
      $("#falta_org").show();
      return false;
    }
  });
  
  $("#tipo_compra").change(function() {
    if($("#tipo_compra").val()==1){
      $("#op1").show();
      $("#op2, #op3, #op4, #op5").hide();
    }
    if($("#tipo_compra").val()==2){
      $("#op2").show();
      $("#op1, #op3, #op4, #op5").hide();
    }
    if($("#tipo_compra").val()==3 || $("#tipo_compra").val()==5){
      $("#op3").show();
      $("#op1, #op2, #op4, #op5").hide();
    }
    if($("#tipo_compra").val()==4){
      $("#op4").show();
      $("#op1, #op2, #op3, #op5").hide();
    }
    if($("#tipo_compra").val()==6){
      $("#op5").show();
      $("#op1, #op2, #op4, #op3").hide();
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