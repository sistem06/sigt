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
                    <p>CUIL: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_cuil"); ?></strong></p>
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
                        <p>Facebook: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_facebook"); ?></strong></p>
                        
                    <a href="mod_registro.php?dp_id=<?php echo $_GET["dp_id"]; ?>"><button type="button" class="btn btn-primary">Modificar</button></a>
                </div>
              </div>
        </div>
<?php $ho_id = BuscaRegistro ("tb_hogar_beneficiario", "hb_dp_id", $_GET["dp_id"], "hb_ho_id"); ?>
      <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-home"></span>Datos del Hogar</h3>
                </div>
                <div class="panel-body">
                    <p>Encuesta realizada el: <strong><?php 
                    echo BuscaRegistro ("tb_encuestas", "enc_hogar", $ho_id, "enc_fecha"); 
                    ?></strong></p>
                    
                    <p>CAAT: <strong><?php 
                    echo BuscaRegistro ("tb_encuestas", "enc_hogar", $ho_id, "enc_caat"); 
                    ?></strong></p>
                    
                    
                          <p>Usuario: <strong><?php 
                          $uss = BuscaRegistro ("tb_encuestas", "enc_hogar", $ho_id, "enc_usuario");
                          echo BuscaRegistro ("tb_usuarios", "us_id", $uss, "us_name");
                      
                    ?></strong></p>
                    
                    <p>Fecha de fijación del domicilio: <strong><?php 
                    echo fecha_dev(BuscaRegistro ("tb_hogar", "ho_id", $ho_id, "ho_inicio")); 
                    ?></strong></p>
                       
                    <p>Cantidad de viviendas por lote: <strong><?php 
                    echo (BuscaRegistro ("tb_hogar", "ho_id", $ho_id, "ho_viviendas_lote")); 
                    ?></strong></p>

                    <p>Esta Cedula corresponde a la Vivienda N°: <strong><?php 
                    echo (BuscaRegistro ("tb_hogar", "ho_id", $ho_id, "ho_vivienda_lote_nro")); 
                    ?></strong></p>

                    <p>Cantidad de Hogares en el lote: <strong><?php 
                    echo (BuscaRegistro ("tb_hogar", "ho_id", $ho_id, "ho_hogares_lote")); 
                    ?></strong></p>

                    <p>Esta Cedula corresponde al Hogar N°: <strong><?php 
                    echo (BuscaRegistro ("tb_hogar", "ho_id", $ho_id, "ho_hogar_lote_nro")); 
                    ?></strong></p>

                                       
                    
                    <a href="mod_registro1.php?dp_id=<?php echo $_GET["dp_id"]; ?>"><button type="button" class="btn btn-success">Modificar</button></a>
                </div>
              </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3">
              
          <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-tint"></span>Datos del Hogar Servicios</h3>
                </div>
                <div class="panel-body">


                </div>
                </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3">
              
              <div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-check"></span>Datos del Hogar Infraestructura</h3>
                </div>
                <div class="panel-body">


                </div>
                </div>



        </div>

   
    
<!-- fin row 2 -->
       </div>

       <div class="row">

      <div class="col-xs-12 col-sm-6 col-md-3">
              
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-paperclip"></span>Datos del Hogar Propiedad</h3>
                </div>
                <div class="panel-body">


                </div>
                </div>



        </div>

        <div class="col-xs-12 col-sm-6 col-md-3">
              
              <div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-th-list"></span>Datos del Hogar Integrantes</h3>
                </div>
                <div class="panel-body">


                </div>
                </div>



        </div>

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