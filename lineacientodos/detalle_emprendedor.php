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
<?php include("recortes/encabezado.php"); ?>
<div class="container-fluid">
<?php include("recortes/navegacion.php"); ?>
	<!-- comienza contenido -->

      <h1><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_name"); ?> <small><?php echo BuscaRegistro ("tb_datos_emprendimiento", "em_dp_id", $_GET["dp_id"], "em_nombre"); ?></small></h1>
<!-- aca comienza el calendario -->
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span>Datos Personales</h3>
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
                    $ca = BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_calle");
                    echo BuscaRegistro ("tb_calle", "ca_id", $ca, "ca_name").' '.BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_nro"); 
                    ?></strong></p>
                     <p>Telefono: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_telefono"); ?></strong></p>
                    <p>Celular: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_movil"); ?></strong></p>
                       <p>Mail: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_mail"); ?></strong></p>
                        <p>Facebook: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_facebook"); ?></strong></p>
                         <p>Web: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_web"); ?></strong></p>
                    <a href=""><button type="button" class="btn btn-primary">Modificar</button></a>
                </div>
              </div>
        </div>
<?php $em_id = BuscaRegistro ("tb_datos_emprendimiento", "em_dp_id", $_GET["dp_id"], "em_id"); ?>
      <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-wrench"></span>Datos del Emprendimiento</h3>
                </div>
                <div class="panel-body">
                    <p>Nombre: <strong><?php echo BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_nombre"); ?></strong></p>
                    <p>Rubro: <strong><?php 
                    $ru = BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_subrubro");
                    echo BuscaRegistro ("tb_subrubros", "sr_id", $ru, "sr_name"); 
                    ?></strong></p>
                    <p>Descripción: <i><?php echo BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_descripcion"); ?></i></p>
                    <p>Fecha de Inicio: <strong><?php echo fecha_dev(BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_fecha_inicio")); ?></strong></p>
                    <p>Domicilio: <strong><?php echo BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_domicilio"); ?></strong></p>
                    <a href=""><button type="button" class="btn btn-success">Modificar</button></a>
                </div>
              </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-link"></span>Instituciones Asociadas</h3>
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
                  <h3 class="panel-title"><span class="glyphicon glyphicon-home"></span>Lugares de Venta</h3>
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
    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span>Capacitaciones Recibidas</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <?php
$ttx = "select * from tb_emprendedor_capacitaciones INNER JOIN tb_organizaciones ON tb_emprendedor_capacitaciones.ec_or_id = tb_organizaciones.or_id INNER JOIN tb_tipo_capacitaciones ON tb_emprendedor_capacitaciones.ec_motivo = tb_tipo_capacitaciones.tc_id where tb_emprendedor_capacitaciones.ec_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<tr><td><?php echo utf8_encode($lis_dat['or_name']); ?></td><td><?php echo utf8_encode($lis_dat['tc_name']); ?></td>
</tr>
<?php
}
?>
                    </table>
                   <a href=""><button type="button" class="btn btn-info">Modificar</button></a>
                </div>
              </div>
        </div>


        <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-usd"></span>Subsidios/Créditos Recibidos</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <?php
$ttx = "select * from tb_emprendedor_credito INNER JOIN tb_organizaciones ON tb_emprendedor_credito.ec_or = tb_organizaciones.or_id INNER JOIN tb_motivo_credito ON tb_emprendedor_credito.ec_mo = tb_motivo_credito.mc_id where tb_emprendedor_credito.ec_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<tr><td><?php echo utf8_encode($lis_dat['or_name']); ?></td><td><?php echo utf8_encode($lis_dat['mc_name']); ?></td>
</tr>
<?php
}
?>
                    </table>
                   <a href=""><button type="button" class="btn btn-danger">Modificar</button></a>
                </div>
              </div>
        </div>

         <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-barcode"></span>Necesidades del Emprendimiento</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <?php
$ttx = "select * from tb_emprendedor_credito_nec INNER JOIN tb_motivo_credito ON tb_emprendedor_credito_nec.ecn_rubro = tb_motivo_credito.mc_id where tb_emprendedor_credito_nec.ecn_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<tr><td><?php echo utf8_encode($lis_dat['mc_name']); ?></td><td><?php if ($lis_dat['ecn_rubro_cap'] >0){
  echo DatoRegistro ('tb_tipo_capacitaciones', 'tc_name', 'tc_id', $lis_dat['ecn_rubro_cap']); } ?></td>
</tr>
<?php
}
?>
                    </table>
                   <a href=""><button type="button" class="btn btn-warning">Modificar</button></a>
                </div>
              </div>
        </div>

         <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span>Ingresos</h3>
                </div>
                <div class="panel-body">
                    <p>Porcentaje del ingreso familiar que representa el Emprendimiento: <strong><?php echo BuscaRegistro ("tb_ingresos", "in_dp_id", $_GET['dp_id'], "in_por").' %'; ?></strong></p>
                    <p>Otros Ingresos: <strong></strong></p>
                   
                    <p>Es Monotributista Social: <strong><?php echo BuscaRegistro ("tb_ingresos", "in_dp_id", $_GET['dp_id'], "in_mono"); ?></strong></p>

                    <p>Es Efector Social: <strong><?php echo BuscaRegistro ("tb_ingresos", "in_dp_id", $_GET['dp_id'], "in_efector"); ?></strong></p>
                    <a href=""><button type="button" class="btn btn-success">Modificar</button></a>
                </div>
              </div>
        </div>
<!-- fin row 2 -->
       </div>
  <!-- fin contenido -->
</div>
<br><br><br><br><br><br>
<?php include("recortes/pie.php"); ?>

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