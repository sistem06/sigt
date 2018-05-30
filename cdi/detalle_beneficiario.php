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
          $txt_grap = "select * from tb_imagenes where img_dp_id =".$_GET["dp_id"]." order by img_front desc";
          $query_grap = mysql_query($txt_grap);
          $n_grap = mysql_num_rows($query_grap);

          if($n_grap==0){
            echo '<b>No hay imagenes para mostrar</b>';
          } else {

              while($a_grap = mysql_fetch_array($query_grap)){
                echo '<p><a class="single-image" href="../imagenes/'.$a_grap["img_dni_name"].'"><img src="../imagenes/'.$a_grap["img_dni_name"].'" width="100%"></a></p>';
                if($a_grap["img_front"]==1){
                    echo '<a href="nuevo_archivos.php?dp_id='.$_GET["dp_id"].'&estado=E"><button type="button" class="btn btn-warning">Modificar</button></a>';
                } else {
                    echo '<a href="nuevo_archivos1.php?dp_id='.$_GET["dp_id"].'&estado=E"><button type="button" class="btn btn-warning">Modificar</button></a>';
                }
                echo '<br><br>';
              }
          }
          ?>
          <br><br>
      
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
        echo '<table class="table table-striped">';
        while($a_hogar = mysql_fetch_array($query_hogar)){
            $n_dp_id = $a_hogar['hb_dp_id'];
            $n_parent = BuscaRegistro ("tb_datos_personales", "dp_id", $n_dp_id, "dp_parentesco");
            echo '<tr>';
          echo '<td>'.BuscaRegistro ("tb_datos_personales", "dp_id", $n_dp_id, "dp_name").'</td>';
          echo '<td>'.BuscaRegistro ("tb_parentesco", "par_id", $n_parent, "par_name").'</td>';
          echo '<tr>';
        }
        echo '</table>';


        ?>
        <br>
      <a href="nuevo_familiares.php?dp_id=<?php echo $_GET["dp_id"]; ?>&ho_id=<?php echo $hb_ho_id; ?>&estado=E"><button type="button" class="btn btn-danger">Modificar</button></a>

      </div>
      </div>

      </div>

      <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-link"></span>Datos del Hogar</h3>
                  <?php
                  $ho_id = BuscaRegistro ("tb_hogar_beneficiario", "hb_dp_id", $_GET['dp_id'], "hb_ho_id");
                  $tx_ca_ho = "select * from tb_hogar_caracteristicas where hc_ho_id = ".$ho_id;
                  $a_ca_ho = mysql_fetch_array(mysql_query($tx_ca_ho));
                  ?>
                </div>
                <div class="panel-body">
                    <p>Tipo de Familia: <strong><?php echo BuscaRegistro ("tb_tipo_familia", "tf_id", $a_ca_ho['hc_tipo_familia'], "tf_name"); ?></strong></p>
                    <p>Edad de los padres o cuidadores principales: <strong><?php echo BuscaRegistro ("tb_edad_padres", "ep_id", $a_ca_ho['hc_edad_padres'], "ep_name"); ?></strong></p>
                    <p>Ingresos familiares: <strong><?php echo BuscaRegistro ("tb_ingresos_importes", "ii_id", $a_ca_ho['hc_ingresos_importes'], "ii_name"); ?></strong></p>
                    
                      <p>Estos Ingresos provienen de: <strong>
                      <?php
                      $io_dp_id = $_GET['dp_id'];
                      $query_otros = mysql_query("select * from tb_ingresos_hogar where ih_ho_id = '$ho_id'");
                      while($a_otros = mysql_fetch_array($query_otros)){
                        echo '<br>';
                        echo BuscaRegistro ("tb_tipo_ingresos", "ti_id", $a_otros['ih_ti_id'], "ti_name");
                      }
                      ?>
                    </strong></p>
                    <a href="nuevo_registro1.php?dp_id=<?php echo $_GET["dp_id"]; ?>&ho_id=<?php echo $ho_id; ?>&estado=E"><button type="button" class="btn btn-success">Modificar</button></a>
                </div>
              </div>
        </div>
  </div>

    <div class="row">
         <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>Infraestructura de la vivienda</h3>
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
                   <a href="nuevo_registro6.php?dp_id=<?php echo $_GET["dp_id"]; ?>&em_id=<?php echo $em_id; ?>&estado=E"><button type="button" class="btn btn-warning">Modificar</button></a>
                </div>
              </div>
        </div>

         <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-paperclip"></span>Datos de Salud</h3>
                </div>
                <div class="panel-body">
                    
                    <a href=""><button type="button" class="btn btn-success">Modificar</button></a>
                </div>
              </div>
        </div>
<!-- fin row 2 -->
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