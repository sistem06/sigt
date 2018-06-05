<?php
include("secure.php");
include ("../conecta.php");
include ("../funciones/funciones_generales.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
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
      <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
    <?php
      $text_ent = "select * from tb_entrevista where (ent_sis = 1 and ent_dp_id ='".$_GET["dp_id"]."')";
      $q_ent = mysql_query($text_ent);
      while($a_ent = mysql_fetch_array($q_ent)){
        if($a_ent['ent_fin']==0){
        echo '<button type="button" class="btn btn-danger btn-sm">
    <span class="glyphicon glyphicon-bell"></span> ';
  } else{
    echo '<button type="button" class="btn btn-success btn-sm">
    <span class="glyphicon glyphicon-check"></span> ';
    }
    echo $a_ent['ent_proxima'];

  echo ' </button>  ';


      }
      ?>
      </div></div>
     <br>
<!-- aca comienza el calendario -->
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span>Datos Personales</h3>
                </div>
                <div class="panel-body">
                <div style="background:#999; padding:5px;margin-top:5px; margin-bottom:10px; text-align:center; color:#fff;">

                    <?php
                    $qh_tx = "SELECT hi_us_id FROM tb_historial WHERE hi_dp_id = ".$_GET["dp_id"];
                    $qh = mysql_query($qh_tx);
                    $ah = mysql_fetch_array($qh);
                    echo "Agregado por ".BuscaRegistro ("tb_usuarios", "us_id", $ah["hi_us_id"], "us_name");
                    ?>
                </div>
                    <p>  <a href="../pdf/informe.php?dp_id=<?php echo $_GET['dp_id']; ?>" target="_blank"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>Ver PDF</button></a></p>

                    <p>Nombre: <strong><?php echo BuscaRegistroM ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_name"); ?></strong></p>
                    <p>Documento: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_nro_doc"); ?></strong></p>
                    <p>Nacimiento: <strong><?php echo fecha_dev(BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_nacimiento")); ?></strong></p>
                    <p>Estado Civil: <strong><?php
                    $ec = BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_estado_civil");
                    echo BuscaRegistroM ("tb_estado_civil", "ec_id", $ec, "ec_name");
                    ?></strong></p>
                    <p>Domicilio: <strong><?php
                    echo TirameDomicilio($_GET["dp_id"]);
                    ?></strong></p>
                    <p>Barrio: <strong><?php
                    echo TirameBarrio($_GET["dp_id"]);
                    ?></strong></p>
                    <p>CAAT: <strong><?php
                    echo TirameCaat($_GET["dp_id"]);
                    ?></strong></p>
                     <p>Latitud: <strong><?php
                    echo TirameDomicilioLat($_GET["dp_id"]);
                    ?></strong></p>
                     <p>Longitud: <strong><?php
                    echo TirameDomicilioLng($_GET["dp_id"]);
                    ?></strong></p>
                     <p>Telefono: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_telefono"); ?></strong></p>
                    <p>Celular: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_movil"); ?></strong></p>
                    <p>Telefono alternativo: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_telefono1"); ?></strong></p>
                    <p>Celular alternativo: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_movil1"); ?></strong></p>
                       <p>Mail: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_mail"); ?></strong></p>
                        <p>Facebook: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_facebook"); ?></strong></p>
                         <p>Web: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_web"); ?></strong></p>
                         <p>Veterano de la Guerra de Malvinas: <strong><?php echo SiNoM (BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_veterano")); ?></strong></p>
                         <p>Es familiar de un Veterano de la Guerra de Malvinas: <strong><?php echo SiNoM (BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_fam_veterano")); ?></strong></p>

                            <?php
                            if(BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_pueblo_originario")== 1){
                              echo "<p>Se reconoce perteneciente al pueblo originario <b>";
                                  if(BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_nombre_pueblo_originario") != 0){
                                      echo BuscaRegistroM ("tb_pueblos_originarios", "po_id", BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_nombre_pueblo_originario"),"po_name");
                                  };
                              echo "</b></p>";
                            }
                            ?>
                         <p>Observaciones: <strong><?php echo (BuscaRegistroSu ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_observaciones")); ?></strong></p>

                          <iframe class="map2" width="100%" height="350" src="https://maps.google.com/maps?q=<?php echo TirameDomicilioLat($_GET['dp_id']).','.TirameDomicilioLng($_GET['dp_id']); ?>&amp;num=1&amp;ie=UTF8&amp;ll=<?php echo TirameDomicilioLat($_GET['dp_id']).','.TirameDomicilioLng($_GET['dp_id']); ?>&amp;spn=0.041038,0.077162&amp;t=m&amp;z=14&amp;output=embed"></iframe>


                  <p>  <a href="nuevo_registro_mod.php?dp_id=<?php echo $_GET['dp_id']; ?>"><button type="button" class="btn btn-primary">Modificar Datos Personales</button></a></p>

                  <p>  <a href="nuevo_domicilio_mod.php?dp_id=<?php echo $_GET['dp_id']; ?>"><button type="button" class="btn btn-primary">Modificar Domicilio</button></a></p>

                  <?php
                  if($_SESSION["sector"]==5){
                    ?>
                    <p>  <a href="nuevo_registro_mod_dp.php?dp_id=<?php echo $_GET['dp_id']; ?>"><button type="button" class="btn btn-primary">Modificar Nombre o DNI</button></a></p>
                  <?php } ?>

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
          $txt_grap = "select * from tb_imagenes where img_dp_id =".$_GET["dp_id"]." and img_front = 1";
          $query_grap = mysql_query($txt_grap);
          $n_grap = mysql_num_rows($query_grap);

          if($n_grap==0){

             echo '<p><a href="nuevo_archivos.php?dp_id='.$_GET["dp_id"].'&estado=E"><button type="button" class="btn btn-warning">Agregar frente DNI</button></a></p>';

          } else {

              while($a_grap = mysql_fetch_array($query_grap)){
                echo '<p><a class="single-image" href="../imagenes/'.$a_grap["img_dni_name"].'"><img src="../imagenes/'.$a_grap["img_dni_name"].'" width="100%"></a></p>';

                    echo '<a href="nuevo_archivos.php?dp_id='.$_GET["dp_id"].'&estado=E"><button type="button" class="btn btn-warning">Modificar</button></a>';

                echo '<br><br>';
              }
          }

          $txt_grap1 = "select * from tb_imagenes where img_dp_id =".$_GET["dp_id"]." and img_front = 0";
          $query_grap1 = mysql_query($txt_grap1);
          $n_grap1 = mysql_num_rows($query_grap1);

          if($n_grap1==0){


             echo '<p><a href="nuevo_archivos1.php?dp_id='.$_GET["dp_id"].'&estado=E"><button type="button" class="btn btn-warning">Agregar dorso DNI</button></a></p>';
          } else {

              while($a_grap1 = mysql_fetch_array($query_grap1)){
                echo '<p><a class="single-image" href="../imagenes/'.$a_grap1["img_dni_name"].'"><img src="../imagenes/'.$a_grap1["img_dni_name"].'" width="100%"></a></p>';

                    echo '<a href="nuevo_archivos1.php?dp_id='.$_GET["dp_id"].'&estado=E"><button type="button" class="btn btn-warning">Modificar</button></a>';

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
        while($a_hogar = mysql_fetch_array($query_hogar)){
            $n_dp_id = $a_hogar['hb_dp_id'];
            $n_parent = BuscaRegistro ("tb_datos_personales", "dp_id", $n_dp_id, "dp_parentesco");

          echo '<p>'.BuscaRegistro ("tb_datos_personales", "dp_id", $n_dp_id, "dp_name").'</p>';
        }


        ?>
        <br>
      <a href="nuevo_familiares.php?dp_id=<?php echo $_GET["dp_id"]; ?>&ho_id=<?php echo $hb_ho_id; ?>&estado=E"><button type="button" class="btn btn-danger">Modificar</button></a>

      </div>
      </div>

      </div>

      <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-wrench"></span>Datos del Emprendimiento</h3>
                </div>
                <div class="panel-body">
                    <p>Nombre: <strong><?php echo BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_nombre"); ?></strong></p>
                    <p>Rubro: <strong><?php
                    echo BuscaRegistro ("tb_rubros","ru_id",BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_rubro"),"ru_name");
                    ?></strong></p>
                    <p>Subrubro: <strong><?php
                    echo BuscaRegistro ("tb_subrubros","sr_id",BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_subrubro"),"sr_name");
                    ?></strong></p>
                    <p>Descripción: <i><?php echo BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_descripcion"); ?></i></p>
                    <p>Fecha de Inicio: <strong><?php echo fecha_dev(BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_fecha_inicio")); ?></strong></p>
                    <p>Domicilio: <strong><?php $dom_e = BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_domicilio");
                      echo BuscaRegistro ("tb_domicilios", "dom_id", $dom_e, "dom_domicilio");

                     ?></strong></p>
                     <?php
                     if(BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_tipo_lugar") != 0){
                      ?>
                       <p>El lugar es: <strong><?php $tipo_lugar = BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_tipo_lugar");
                      echo BuscaRegistro ("tb_tipo_locacion", "tl_id", $tipo_lugar, "tl_name");

                     ?></strong></p>
                      <?php
                     }
                     ?>
                     <p>Tiene espacio suficiente: <strong><?php
                      echo SiNo(BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_espacio"));
                     ?></strong></p>
                       <?php
                     if(BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_espacio") == 0){
                      ?>
                       <p>Motivo del poco espacio: <strong><?php
                      echo $tipo_lugar = BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_motivo_espacio");;

                     ?></strong></p>
                      <?php
                     }
                     ?>
                    <p>Tipo de emprendimiento: <strong><?php $tipo_empr = BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_tipo_empresa");
                      echo BuscaRegistro ("tb_tipo_emprendimiento", "te_id", $tipo_empr, "te_name");
                     ?></strong></p>
                     <?php
                     if($tipo_empr==2){
                      ?>
                      <table class="table table-striped">
                      <tr><td><b>Nombre</b></td><td><b>Parentezco</b></td></tr>
<?php
$ttx = "select * from tb_familiares INNER JOIN tb_parentesco ON tb_familiares.fam_parentesco = tb_parentesco.par_id where tb_familiares.fam_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>


<!--*sk01* quito utf8_encode()-->
<tr><td><?php echo $lis_dat['fam_name']; ?></td><td>

<?php
echo $lis_dat['par_name'];
 ?>
</td>
</tr>
<?php
}
?>
</table>
                      <?php
                     }
                     ?>
                     <?php
                     if($tipo_empr==3){
                      ?>
<table class="table table-striped">
 <tr><td><b>Nombre del Asociado</b></td></tr>
<?php
$ttx = "select * from tb_emprendedores_asociados where eas_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<!--*sk01* quito utf8_encode()-->
<tr><td><?php echo $lis_dat['eas_name']; ?></td>
</tr>
<?php
}
?>
</table>
                      <?php
                     }
                     ?>
                    <a href="nuevo_registro1.php?dp_id=<?php echo $_GET["dp_id"]; ?>&em_id=<?php echo $em_id; ?>&estado=E"><button type="button" class="btn btn-success">Modificar</button></a>
                </div>
              </div>
        </div>
  </div>
  <div class="row">
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
<!--*sk01* quito utf8_encode()-->
<tr><td><?php echo $lis_dat['or_name']; ?></td><td><?php echo $lis_dat['ta_name']; ?></td>
</tr>
<?php
}
?>
                    </table>
                   <a href="nuevo_registro2.php?dp_id=<?php echo $_GET["dp_id"]; ?>&em_id=<?php echo $em_id; ?>&estado=E"><button type="button" class="btn btn-info">Modificar</button></a>
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
<!--*sk01* quito utf8_encode()-->
<tr><td><?php echo $lis_dat['tpv_name']; ?></td><td>

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
                    <a href="nuevo_registro3.php?dp_id=<?php echo $_GET["dp_id"]; ?>&em_id=<?php echo $em_id; ?>&estado=E"><button type="button" class="btn btn-warning">Modificar</button></a>
                </div>
              </div>
        </div>


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
<!--*sk01* quito utf8_encode()-->
<tr><td><?php echo $lis_dat['or_name']; ?></td><td><?php echo $lis_dat['tc_name']; ?></td>
</tr>
<?php
}
?>
                    </table>
                   <a href="nuevo_registro4.php?dp_id=<?php echo $_GET["dp_id"]; ?>&em_id=<?php echo $em_id; ?>&estado=E"><button type="button" class="btn btn-info">Modificar</button></a>
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
<tr><td><?php echo $lis_dat['or_name']; ?></td><td><?php echo $lis_dat['mc_name']; ?></td><td><?php if($lis_dat['ec_vigente']=="SI"){ ?> <span class="label label-danger">VIGENTE</span> <?php } ?></td>
</tr>
<?php
}
?>
                    </table>
                   <a href="nuevo_registro5.php?dp_id=<?php echo $_GET["dp_id"]; ?>&em_id=<?php echo $em_id; ?>&estado=E"><button type="button" class="btn btn-danger">Modificar</button></a>
                </div>
              </div>
        </div>
</div>
    <div class="row">
         <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-barcode"></span>Necesidad del Emprendimiento</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <?php
$ttx = "select * from tb_emprendedor_credito_nec INNER JOIN tb_motivo_credito ON tb_emprendedor_credito_nec.ecn_rubro = tb_motivo_credito.mc_id where tb_emprendedor_credito_nec.ecn_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<!--*sk01* quito utf8_encode()-->
<tr><td><?php echo $lis_dat['mc_name']; ?></td><td><?php if ($lis_dat['ecn_rubro_cap'] >0){
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
                  <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span>Ingresos</h3>
                </div>
                <div class="panel-body">
                    <p>Porcentaje del ingreso familiar que representa el Emprendimiento: <strong><?php echo BuscaRegistro ("tb_ingresos", "in_dp_id", $_GET['dp_id'], "in_por").' %'; ?></strong></p>
                    <p>Otros Ingresos: <strong>
                      <?php
                      $io_dp_id = $_GET['dp_id'];
                      $query_otros = mysql_query("select * from tb_ingresos_otros where io_dp_id = '$io_dp_id'");
                      while($a_otros = mysql_fetch_array($query_otros)){
                        echo '<br>';
                        echo BuscaRegistro ("tb_tipo_ingresos", "ti_id", $a_otros['io_ti_id'], "ti_name");
                      }
                      ?>
                    </strong></p>

                    <p>Estado ante la AFIP: <strong><?php
                    $bafip = BuscaRegistro ("tb_estado_afip", "ea_dp_id", $_GET['dp_id'], "ea_tipo_relacion");
                    echo BuscaRegistro ("tb_tipo_iva", "ti_id", $bafip, "ti_name") ?></strong></p>

                    <p>Es Efector Social: <strong><?php echo BuscaRegistro ("tb_ingresos", "in_dp_id", $_GET['dp_id'], "in_efector"); ?></strong></p>
                    <a href="nuevo_registro7.php?dp_id=<?php echo $_GET['dp_id']; ?>&em_id=<?php echo $em_id; ?>"><button type="button" class="btn btn-success">Modificar</button></a>
                </div>
              </div>
        </div>

        <!-- comienza discapacidad -->
      <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-book"></span>Discapacidad</h3>
                </div>
                <div class="panel-body">
               <p> <strong>Tiene Discapacidad: <?php echo SiNo(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tiene_discapacidad")); ?></strong> </p>

            <?php if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tiene_discapacidad")==1){ ?>

        <p>  <strong>Nro de CUD: <?php echo BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_nro_cud"); ?></strong> </p>
        <p>  <strong>Ley que Certifica: <?php echo BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_ley_cud"); ?></strong> </p>
        <?php if(!empty(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_descripcion_cud"))){
          ?>
          <p>  <strong>Descripcion del Certificado: <?php echo BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_descripcion_cud"); ?></strong> </p>
        <?php } ?>
        <p>  <strong>Vigencia Desde: <?php echo fecha_dev(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_desde_cud")); ?></strong> </p>
        <p>  <strong>Vigencia Hasta: <?php echo fecha_dev(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_vencimiento_cud")); ?></strong> </p>
        <?php
        if(!empty(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_ente_cud"))){
          ?>
          <p>  <strong>Ente Certificador: <?php echo BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_ente_cud"); ?></strong> </p>
          <?php
        }
        ?>
         <?php
        if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tipo_discapacidad")>0){
          $td_id = BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tipo_discapacidad");
          $td_name = BuscaRegistro ("tb_tipo_discapacidad", "td_id", $td_id, "td_name");
          ?>
          <p>  <strong>Tipo de discapacidad: <?php echo $td_name; ?></strong> </p>
          <?php
        }
        ?>
        <?php
         if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_origen_discapacidad")>0){
          $od_id = BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_origen_discapacidad");
          $od_name = BuscaRegistro ("tb_origen_discapacidad", "od_id", $od_id, "od_name");
          ?>
          <p>  <strong>Origen de discapacidad: <?php echo $od_name; ?></strong> </p>
          <?php
        }
        ?>
         <?php
         if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tipo_retraso")>0){
          $tr_id = BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tipo_retraso");
          $tr_name = BuscaRegistro ("tb_tipo_retraso", "tr_id", $tr_id, "tr_name");
          ?>
          <p>  <strong>Tipo de Retraso: <?php echo $tr_name; ?></strong> </p>
          <?php
        }
        ?>
        <?php
         if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_situacion_discapacidad")>0){
          $sd_id = BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_situacion_discapacidad");
          $sd_name = BuscaRegistro ("tb_situacion_discapacidad", "sd_id", $sd_id, "sd_name");
          ?>
          <p>  <strong>Situación de Discapacidad: <?php echo $sd_name; ?></strong> </p>
          <?php
        }
        ?>
         <?php
        if(NroRegistro ("tb_ayudas_discapacidad", "ad_dp_id", $_GET['dp_id'])>0){
         echo '<p><strong>Ayudas Necesarias</strong></p>';
              echo '<ul>';
                $tx_aids = "select * from tb_ayudas_discapacidad where ad_dp_id =".$_GET['dp_id'];
                $query_aids = mysql_query($tx_aids);
                while($data_aids = mysql_fetch_array($query_aids)){
                  echo '<li>'.BuscaRegistro ("tb_discapacidad_ayuda_tecnica", "dat_id", $data_aids['ad_dat_id'], "dat_name").'</li>';
                }
              echo '</ul>';
        }
        ?>

        <?php
        if(!empty(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_descripcion_diagnostico"))){
          ?>
					<!--*sk01* quito utf8_encode()-->
          <p>  <strong>Descripción del Diagnóstico:</strong> <?php echo BuscaRegistro("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_descripcion_diagnostico"); ?> </p>
          <?php
        }
        ?>

            <?php } ?>

                   <a href="nuevo_registro_discapacidad.php?dp_id=<?php echo $_GET["dp_id"]; ?>&em_id=<?php echo $em_id; ?>&acc=M"><button type="button" class="btn btn-danger">Modificar</button></a>
                </div>
              </div>
        </div>

       <!-- fin discapacidad -->
       <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span>Datos Educativos</h3>
                </div>
                <div class="panel-body">
                    <strong>Nivel educativo alcanzado: </strong>
                    <table class="table table-striped">
                    <?php
                    $txt_ne = "select * from tb_datos_nivel_educativo where dne_dp_id = ".$_GET["dp_id"];
                    $query_ne = mysql_query($txt_ne);
                    while($a_ne = mysql_fetch_array($query_ne)){
                        echo '<tr>';
                          echo '<td>'.BuscaRegistroM ("tb_nivel_educativo", "ne_id", $a_ne["dne_nivel"], "ne_name").'</td>';
                          echo '<td>'.BuscaRegistroM ("tb_estado_titulo", "et_id", $a_ne["dne_termino"], "et_name").'</td>';
                          echo '<td>'.BuscaRegistroM ("tb_titulo_secundario", "ts_id", $a_ne["dne_titulo"], "ts_name").'</td>';
                        echo '</tr>';
                    }
                    ?>
                    </table>




                   <strong>Idiomas que maneja: </strong>
                    <table class="table table-striped">
                    <?php
                    $ttx2 = "select * from tb_beneficiario_idioma where bi_dp_id = ".$_GET['dp_id'];
                    $list2 = mysql_query($ttx2);
                    while($lis_dat2 = mysql_fetch_array($list2)){
                        echo '<tr>';

                          echo '<td>'.(BuscaRegistroM ("tb_idiomas", "idi_id", $lis_dat2['bi_idi_id'], "idi_name")).'</td>';
													/*sk01* quito utf8_encode() */
                          echo '<td>'.BuscaRegistroM ("tb_niveles_idiomas", "ni_id", $lis_dat2['bi_nivel'], "ni_name").'</td>';
                        echo '</tr>';
                    }
                    ?>
                    </table>
                    <strong>Permisos / Licencias / Matriculas </strong>
                    <table class="table table-striped">
          <thead>
            <tr>
              <th>Licencia</th>
              <th>Vencimiento</th>
              <th>Entidad Emisora</th>
              <th>Lugar</th>


            </tr>
           </thead>
           <tbody>
           <?php
                    $ttx_lic = "select * from tb_licencias_beneficiario where lb_dp_id = ".$_GET['dp_id'];
                    $list_lic = mysql_query($ttx_lic);
                    while($lis_dat_lic = mysql_fetch_array($list_lic)){
                    ?>
                  <tr><td><?php
									  /*sk01* quito utf8_encode() */
									  echo BuscaRegistroM ("tb_licencias", "lic_id", $lis_dat_lic['lb_lic_id'], "lic_name"); ?></td>
                    <td><?php echo fecha_dev ($lis_dat_lic['lb_vencimiento']); ?></td>
										<!--*sk01* quito utf8_encode()-->
                    <td><?php echo strtoupper($lis_dat_lic['lb_emisora']); ?></td>

                    <td><?php
										/*sk01* quito utf8_encode() */
										echo BuscaRegistroM ("tb_localidades_pais", "loc_id", $lis_dat_lic['lb_municipio'], "loc_name").', '.BuscaRegistro ("tb_provincias", "pr_id", $lis_dat_lic['lb_provincia'], "pr_name"); ?></td>
                    </tr>
                    <?php
                    }
                    ?>

            </tbody>
      </table>
                    <p>Manejo de PC: <strong><?php
                    $ru = BuscaRegistro ("tb_datos_educativos", "de_dp_id", $_GET["dp_id"], "de_pc");
                    echo BuscaRegistroM ("tb_manejo_pc", "mp_id", $ru, "mp_name");
                    ?></strong></p>

                    <p>Desea seguir estudiando: <strong><?php
                    $co = BuscaRegistro ("tb_datos_educativos", "de_dp_id", $_GET["dp_id"], "de_continuar");
                    echo SiNoM ($co);
                    ?></strong></p>
                    <p>Observaciones: <i><?php echo BuscaRegistroM ("tb_datos_educativos", "de_dp_id", $_GET["dp_id"], "de_observaciones"); ?></i></p>
                    <p>Fecha de Carga: <b><?php echo fecha_dev(BuscaRegistro ("tb_datos_educativos", "de_dp_id", $_GET["dp_id"], "de_fecha_actualizacion")); ?></b></p>
                    <a href="nuevo_registro_edu.php?dp_id=<?php echo $_GET["dp_id"]; ?>"><button type="button" class="btn btn-success">Modificar</button></a>

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
