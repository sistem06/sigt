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

      <h1>Detalle del Evento</h1>
<!-- aca comienza el calendario -->
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-calendar"></span>Datos del Evento</h3>
                </div>
                <div class="panel-body">
                    <p>Fecha: <strong><?php echo BuscaRegistro ("tb_eventos", "ev_id", $_GET["ev_id"], "ev_fecha"); ?></strong></p>
                    <p>Hora: <strong><?php echo BuscaRegistro ("tb_eventos", "ev_id", $_GET["ev_id"], "ev_hora"); ?></strong></p>
                    <p>Domicilio: <strong><?php echo BuscaRegistro ("tb_eventos", "ev_id", $_GET["ev_id"], "ev_domicilio"); ?></strong></p>
                    <p>Usuario: <strong><?php 
                    $us = BuscaRegistro ("tb_eventos", "ev_id", $_GET["ev_id"], "ev_usuario");
                    echo BuscaRegistro ("tb_usuarios", "us_id", $us, "us_name"); 
                    ?></strong></p>
                    <p>Condición de Organización: <strong><?php 
                    $co_id = BuscaRegistro ("tb_eventos", "ev_id", $_GET["ev_id"], "ev_condicion_org");
                    echo BuscaRegistro ("tb_condiciones_organizacion", "co_id", $co_id, "co_name"); 
                    ?></strong></p>
                    <p>Tipo de evento: <strong><?php 
                    $te_id = BuscaRegistro ("tb_eventos", "ev_id", $_GET["ev_id"], "ev_tipo");
                    echo BuscaRegistro ("tb_tipo_eventos", "te_id", $te_id, "te_name"); 
                    ?></strong></p>
                    <p>Observaciones: <strong><?php 
                    echo BuscaRegistro ("tb_eventos", "ev_id", $_GET["ev_id"], "ev_observaciones"); 
                    ?></strong></p>
                    
                        
                    <a href=""><button type="button" class="btn btn-primary">Modificar</button></a>
                </div>
              </div>
        </div>

      <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-retweet"></span>Instituciones Participantes</h3>
                </div>
                <div class="panel-body">
                    
<table class="table table-striped">
                        <?php
$ttx = "select * from tb_institucion_participantes INNER JOIN tb_instituciones_cpa ON tb_institucion_participantes.ip_ins_id = tb_instituciones_cpa.ins_id where tb_institucion_participantes.ip_ev_id = ".$_GET['ev_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<tr><td><?php echo utf8_encode($lis_dat['ins_name']); ?></td>
</tr>
<?php
}
?>
                    </table>



                    <a href=""><button type="button" class="btn btn-success">Modificar</button></a>
                </div>
              </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-random"></span>Instituciones co-organizantes</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <?php
$ttx = "select * from tb_institucion_coorg INNER JOIN tb_instituciones_cpa ON tb_institucion_coorg.ic_ins_id = tb_instituciones_cpa.ins_id where tb_institucion_coorg.ic_ev_id = ".$_GET['ev_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<tr><td><?php echo utf8_encode($lis_dat['ins_name']); ?></td>
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