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
                    echo TirameDomicilio($_GET["dp_id"]); 
                    ?></strong></p>
                     <p>Telefono: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_telefono"); ?></strong></p>
                    <p>Celular: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_movil"); ?></strong></p>
                       <p>Mail: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_mail"); ?></strong></p>
                        <p>Facebook: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_facebook"); ?></strong></p>
                         <p>Web: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_web"); ?></strong></p>
                         
                         <iframe class="map2" width="100%" height="350" src="https://maps.google.com/maps?q=<?php echo TirameDomicilioLat($_GET['dp_id']).','.TirameDomicilioLng($_GET['dp_id']); ?>&amp;num=1&amp;ie=UTF8&amp;ll=<?php echo TirameDomicilioLat($_GET['dp_id']).','.TirameDomicilioLng($_GET['dp_id']); ?>&amp;spn=0.041038,0.077162&amp;t=m&amp;z=14&amp;output=embed"></iframe>

                    <a href="mod_registro.php?dp_id=<?php echo $_GET["dp_id"]; ?>"><button type="button" class="btn btn-primary">Modificar</button></a>
                </div>
              </div>
        </div>
<?php $em_id = BuscaRegistro ("tb_datos_emprendimiento", "em_dp_id", $_GET["dp_id"], "em_id"); ?>
      <div class="col-xs-12 col-sm-6 col-md-3">
      <div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-camera"></span>Documentos Graficos</h3>
                </div>
                <div class="panel-body">
          <?php
          $txt_grap = "select * from tb_imagenes where img_dp_id =".$_GET["dp_id"];
          $query_grap = mysql_query($txt_grap);
          $n_grap = mysql_num_rows($query_grap);

          if($n_grap==0){
            echo '<b>No hay imagenes para mostrar</b>';
          } else {
              while($a_grap = mysql_fetch_array($query_grap)){
                echo '<img src="../imagenes/dni_th_'.$_GET["dp_id"].'.jpg" width="100%">';
              }
          }
          ?>
          <br><br>
      <a href="nuevo_archivos.php?dp_id=<?php echo $_GET["dp_id"]; ?>"><button type="button" class="btn btn-warning">Modificar</button></a>
      </div>
      </div>
      </div>
    
      <div class="col-xs-12 col-sm-6 col-md-3">

      <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-home"></span>Miembros del Hogar</h3>
                </div>
                <div class="panel-body">

        <?php 
        $hb_ho_id = BuscaRegistro ("tb_hogar_beneficiario", "hb_dp_id", $_GET["dp_id"], "hb_ho_id"); 
        $query_hogar = mysql_query("select * from tb_hogar_beneficiario where hb_ho_id = '$hb_ho_id'");
        while($a_hogar = mysql_fetch_array($query_hogar)){
            $n_dp_id = $a_hogar['hb_dp_id'];
            $n_parent = BuscaRegistro ("tb_datos_personales", "dp_id", $n_dp_id, "dp_parentesco");
            
          echo '<p>'.BuscaRegistro ("tb_datos_personales", "dp_id", $n_dp_id, "dp_name").'</p>';
        }


        ?>
        <br>
      <a href="nuevo_familia.php?dp_id=<?php echo $_GET["dp_id"]; ?>"><button type="button" class="btn btn-danger">Modificar</button></a>

      </div>
      </div>

      </div>
      <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-file"></span>Datos de Salud</h3>
                </div>
                <div class="panel-body">
                    <p>Tiene Obra Social: <strong><?php 
                    echo SiNo(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET["dp_id"], "ds_tiene_os")); 
                    ?></strong></p>
                    <?php
                      if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET["dp_id"], "ds_tiene_os")==1){
                        ?>
                    <p>Obra Social: <strong><?php 
                    $ru = BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET["dp_id"], "ds_os");
                    echo BuscaRegistro ("tb_obras_sociales", "os_id", $ru, "os_name"); 
                    ?></strong></p>
                    <?php
                  }
                  ?>
                    <p>Tiene CUD: <strong><?php 
                    echo SiNo(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET["dp_id"], "ds_tiene_cud")); 
                    ?></strong></p>
                    
                    <?php
                      if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET["dp_id"], "ds_tiene_cud")==1){
                        ?>
                          <p>Nro CUD: <strong><?php 
                    echo BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET["dp_id"], "ds_nro_cud"); 
                    ?></strong></p>

                    <p>Vencimiento: <strong><?php 
                    echo fecha_dev(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET["dp_id"], "ds_vencimiento_cud")); 
                    ?></strong></p>
                        <?php
                  }
                  ?>

                    <p>Observaciones: <i><?php echo BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET["dp_id"], "ds_observaciones"); ?></i></p>
                    
                    <a href="mod_registro1.php?dp_id=<?php echo $_GET["dp_id"]; ?>"><button type="button" class="btn btn-success">Modificar</button></a>
                </div>
              </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3">
              
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3">
              
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