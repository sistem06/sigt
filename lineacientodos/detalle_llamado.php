<?php
include("secure.php");
include ("../conecta.php");
include ("../funciones/funciones_generales.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo BuscaRegistro ("tb_sistemas", "sis_id", $_SESSION["sistema"], "sis_name"); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/estilos_ss.css">
  <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="../source/jquery.fancybox.css?v=2.1.5" media="screen" />
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"
</head>
<body>
<?php include("../recorte_gral/encabezado.php"); ?>
<div class="container-fluid">
<?php include("recortes/navegacion.php"); ?>
	<!-- comienza contenido -->

      <h1><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_name"); ?> <small><?php echo BuscaRegistro ("tb_datos_emprendimiento", "em_dp_id", $_GET["dp_id"], "em_nombre"); ?></small></h1>
<!-- aca comienza el calendario -->
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span>Datos de la Victima</h3>
                </div>
                <div class="panel-body">
                    <p>Nombre: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_name"); ?></strong></p>
                    <p>Documento: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_nro_doc"); ?></strong></p>
                    <p>Nacimiento: <strong><?php echo fecha_dev(BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_nacimiento")); ?></strong></p>
                    <p>Estado Civil: <strong><?php 
                    $ec = BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_estado_civil");
                    echo BuscaRegistro ("tb_estado_civil", "ec_id", $ec, "ec_name"); 
                    ?></strong></p>
                    <p>Domicilio: <strong><?php 
                   
                    echo TirameDomicilio ($_GET["dp_id"]); 
                    ?></strong></p>
                     <p>Telefono: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_telefono"); ?></strong></p>
                    <p>Celular: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_movil"); ?></strong></p>
                       <p>Mail: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_mail"); ?></strong></p>
                        
                    <a href=""><button type="button" class="btn btn-primary">Modificar</button></a>
                </div>
              </div>
        </div>
<?php $em_id = BuscaRegistro ("tb_datos_emprendimiento", "em_dp_id", $_GET["dp_id"], "em_id"); ?>
      <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-phone-alt"></span>Datos del Llamado</h3>
                </div>
                <div class="panel-body">
                    <p>Fecha: <strong><?php echo BuscaRegistro ("tb_102_llamados", "la_102_id", $_GET['la_102_id'], "la_102_fecha"); ?></strong></p>
                    <p>Operador: <strong><?php 
                    $op = BuscaRegistro ("tb_102_llamados", "la_102_id", $_GET['la_102_id'], "la_102_us");
                    echo BuscaRegistro ("tb_usuarios", "us_id", $op, "us_name"); 
                    ?></strong></p>
                    
                    <p>Tipo de Llamado: <strong><?php 
                    $tl = BuscaRegistro ("tb_102_llamados", "la_102_id", $_GET['la_102_id'], "la_102_tipo_llamado");
                    echo BuscaRegistro ("tb_motivo_llamado", "ml_id", $tl, "ml_name"); ?></strong></p>
                    <p>Origen: <strong><?php 
                    $or = BuscaRegistro ("tb_102_llamados", "la_102_id", $_GET['la_102_id'], "la_102_relacion");
                    echo BuscaRegistro ("tb_relacion_danmificado", "rd_id", $or, "rd_name"); ?></strong></p>
                    <p>Detalle: <strong><?php 
                    echo TirameOrigen ($_GET['la_102_id']); ?></strong></p>
                    <a href=""><button type="button" class="btn btn-success">Modificar</button></a>
                </div>
              </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title">Datos del Agresor</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <?php
$ttx = "select * from tb_emprendedor_organizacion INNER JOIN tb_organizaciones ON tb_emprendedor_organizacion.eo_or_id = tb_organizaciones.or_id INNER JOIN tb_tipo_asociacion ON tb_emprendedor_organizacion.eo_fa_id = tb_tipo_asociacion.ta_id where tb_emprendedor_organizacion.eo_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<tr><td><?php echo utf8_encode($lis_dat['or_name']); ?></td><td><?php echo utf8_encode($lis_dat['ta_name']); ?></td>
</tr>
<?php
}
?>
                    </table>
                   <a href="nuevo_registro2.php?dp_id=<?php echo $_GET["dp_id"]; ?>&em_id=<?php echo $em_id; ?>&acc=M"><button type="button" class="btn btn-info">Modificar</button></a>
                </div>
              </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-info-sign"></span>Datos de la situacion de violencia</h3>
                </div>
                <div class="panel-body">
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
</td>
</tr>
<?php
}
?>
                    </table>
                    <a href=""><button type="button" class="btn btn-warning">Modificar</button></a>
                </div>
              </div>
        </div>

    </div>
    
  <!-- fin contenido -->
</div>
<br><br><br><br><br><br>
<?php include("../recorte_gral/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>
  
  <script type="text/javascript" language="javascript" class="init">
  $(document).ready(function() {
  $('#list_emprendedores').DataTable();
});
  </script> 
  <script type="text/javascript" language="javascript">
    $('#list_emprendedores').DataTable( {
        responsive: true
    } );
  </script>
  <script type="text/javascript" language="javascript" src="../js/navbar.js"></script>
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