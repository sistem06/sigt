<?php
echo '
<div class="col-xs-12 col-sm-6 col-md-3">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span>Datos Personales</h3>
    </div>
    <div class="panel-body">
    <div style="background:#999; padding:5px;margin-top:5px; margin-bottom:10px; text-align:center; color:#fff;">';

        $qh_tx = "SELECT hi_us_id FROM tb_historial WHERE hi_dp_id = ".$_GET["dp_id"];
        $qh = mysql_query($qh_tx);
        $ah = mysql_fetch_array($qh);
        echo "Agregado por ".BuscaRegistro ("tb_usuarios", "us_id", $ah["hi_us_id"], "us_name");
    echo '
    </div>';
        echo '<p><a href="../pdf/informe.php?dp_id='.$_GET['dp_id'].'" target="_blank"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>Ver PDF</button></a></p>';
        echo '<p>Nombre: <strong>'.BuscaRegistroM("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_name").'</strong></p>';
        echo '<p>Documento: <strong>'.BuscaRegistro("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_nro_doc").'</strong></p>';
        echo '<p>Nacimiento: <strong>'.fecha_dev(BuscaRegistro("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_nacimiento")).'</strong></p>';
        $ec = BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_estado_civil");
        echo '<p>Estado Civil: <strong>'.BuscaRegistroM("tb_estado_civil", "ec_id", $ec, "ec_name").'</strong></p>';
        echo '<p>Domicilio: <strong>'.TirameDomicilio($_GET["dp_id"]).'</strong></p>';
        echo '<p>Barrio: <strong>'.TirameBarrio($_GET["dp_id"]).'</strong></p>';
        echo '<p>CAAT: <strong>'.TirameCaat($_GET["dp_id"]).'</strong></p>';
        echo '<p>Latitud: <strong>'.TirameDomicilioLat($_GET["dp_id"]).'</strong></p>';
        echo '<p>Longitud: <strong>'.TirameDomicilioLng($_GET["dp_id"]).'</strong></p>';
        echo '<p>Telefono: <strong>'.BuscaRegistro("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_telefono").'</strong></p>';
        echo '<p>Celular: <strong>'.BuscaRegistro("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_movil").'</strong></p>';
        echo '<p>Telefono alternativo: <strong>'.BuscaRegistro("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_telefono1").'</strong></p>';
        echo '<p>Celular alternativo: <strong>'.BuscaRegistro("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_movil1").'</strong></p>';
        echo '<p>Mail: <strong>'.BuscaRegistro("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_mail").'</strong></p>';
        echo '<p>Facebook: <strong>'.BuscaRegistro("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_facebook").'</strong></p>';
        echo '<p>Web: <strong>'.BuscaRegistro("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_web").'</strong></p>';
        echo '<p>Veterano de la Guerra de Malvinas: <strong>'.SiNoM(BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_veterano")).'</strong></p>';
        echo '<p>Es familiar de un Veterano de la Guerra de Malvinas: <strong>'.SiNoM(BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_fam_veterano")).'</strong></p>';

        if(BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_pueblo_originario")== 1){
          echo "<p>Se reconoce perteneciente al pueblo originario <b>";
          if(BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_nombre_pueblo_originario") != 0){
            echo BuscaRegistroM ("tb_pueblos_originarios", "po_id", BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_nombre_pueblo_originario"),"po_name");
          };
          echo "</b></p>";
        }

        echo '<p>Observaciones: <strong>'.BuscaRegistroSu("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_observaciones").'</strong></p>';
        echo '<iframe class="map2" width="100%" height="350" src="https://maps.google.com/maps?q='.TirameDomicilioLat($_GET['dp_id']).','.TirameDomicilioLng($_GET['dp_id']).'&amp;num=1&amp;ie=UTF8&amp;ll='.TirameDomicilioLat($_GET['dp_id']).','.TirameDomicilioLng($_GET['dp_id']).'&amp;spn=0.041038,0.077162&amp;t=m&amp;z=14&amp;output=embed"></iframe>';
        echo '<p><a href="nuevo_registro_mod.php?dp_id='.$_GET['dp_id'].'"><button type="button" class="btn btn-primary">Modificar Datos Personales</button></a></p>';
        echo '<p><a href="nuevo_domicilio_mod.php?dp_id='.$_GET['dp_id'].'"><button type="button" class="btn btn-primary">Modificar Domicilio</button></a></p>';

        if($_SESSION["sector"]==5){
          echo '<p><a href="nuevo_registro_mod_dp.php?dp_id='.$_GET['dp_id'].'"><button type="button" class="btn btn-primary">Modificar Nombre o DNI</button></a></p>';
        }
    echo '    
    </div>
  </div>
</div>';
?>
