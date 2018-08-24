<?php
echo '
<div class="col-xs-12 col-sm-6 col-md-3">
  <div class="panel panel-danger">
    <div class="panel-heading">
      <h3 class="panel-title"><span class="glyphicon glyphicon-book"></span>Datos Clínicos</h3>
    </div>
    <div class="panel-body">';
      echo '<p><strong>Tiene Discapacidad: '.SiNo(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tiene_discapacidad")).'</strong></p>';

      if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tiene_discapacidad")==1){
        echo '<p><strong>Nro de CUD: '.BuscaRegistro("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_nro_cud").'</strong></p>';
        echo '<p><strong>Ley que Certifica: '.BuscaRegistro("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_ley_cud").'</strong></p>';

        if(!empty(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_descripcion_cud"))){
          echo '<p><strong>Descripcion del Certificado: '.BuscaRegistro("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_descripcion_cud").'</strong></p>';
        }

        echo '<p><strong>Vigencia Desde: '.fecha_dev(BuscaRegistro("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_desde_cud")).'</strong></p>';
        echo '<p><strong>Vigencia Hasta: '.fecha_dev(BuscaRegistro("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_vencimiento_cud")).'</strong></p>';

        if(!empty(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_ente_cud"))){
          echo '<p><strong>Ente Certificador: '.BuscaRegistro("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_ente_cud").'</strong></p>';
        }

        if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tipo_discapacidad")>0){
          $td_id = BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tipo_discapacidad");
          $td_name = BuscaRegistro ("tb_tipo_discapacidad", "td_id", $td_id, "td_name");
          echo '<p><strong>Tipo de discapacidad: '.$td_name.'</strong></p>';
        }

        if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_origen_discapacidad")>0){
          $od_id = BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_origen_discapacidad");
          $od_name = BuscaRegistro ("tb_origen_discapacidad", "od_id", $od_id, "od_name");
          echo '<p><strong>Origen de discapacidad: '.$od_name.'</strong></p>';
        }

        if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tipo_retraso")>0){
          $tr_id = BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tipo_retraso");
          $tr_name = BuscaRegistro ("tb_tipo_retraso", "tr_id", $tr_id, "tr_name");
          echo '<p><strong>Tipo de Retraso: '.$tr_name.'</strong></p>';
        }

        if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_situacion_discapacidad")>0){
          $sd_id = BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_situacion_discapacidad");
          $sd_name = BuscaRegistro ("tb_situacion_discapacidad", "sd_id", $sd_id, "sd_name");
          echo '<p><strong>Situación de Discapacidad: '.$sd_name.'</strong></p>';
        }

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

        if(!empty(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_descripcion_diagnostico"))){
          echo '<p><strong>Descripción del Diagnóstico:</strong>'.BuscaRegistro("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_descripcion_diagnostico").'</p>';
        }
      }

      echo '<a href="datos_salud.php?dp_id='.$_GET["dp_id"].'&em_id='.$em_id.'&acc=M"><button type="button" class="btn btn-danger">Modificar</button></a>
    </div>
  </div>
</div>';
?>
