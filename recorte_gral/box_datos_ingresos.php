<?php
echo '
<div class="col-xs-12 col-sm-6 col-md-3">
  <div class="panel panel-success">
    <div class="panel-heading">
     <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span>Ingresos</h3>
    </div>
    <div class="panel-body">
      <p>Porcentaje del ingreso familiar que representa el Emprendimiento: <strong>'.BuscaRegistro ("tb_ingresos", "in_dp_id", $_GET['dp_id'], "in_por").' %</strong></p>
      <p>Otros Ingresos: <strong>';
       $io_dp_id = $_GET['dp_id'];
       $query_otros = mysql_query("select * from tb_ingresos_otros where io_dp_id = '$io_dp_id'");
       while($a_otros = mysql_fetch_array($query_otros)){
         echo '<br>';
         echo BuscaRegistro ("tb_tipo_ingresos", "ti_id", $a_otros['io_ti_id'], "ti_name");
       }
       echo '
      </strong></p>
      <p>Estado ante la AFIP: <strong>';
      $bafip = BuscaRegistro ("tb_estado_afip", "ea_dp_id", $_GET['dp_id'], "ea_tipo_relacion");
      echo BuscaRegistro ("tb_tipo_iva", "ti_id", $bafip, "ti_name").'</strong></p>
      <p>Es Efector Social: <strong>'.BuscaRegistro ("tb_ingresos", "in_dp_id", $_GET['dp_id'], "in_efector").'</strong></p>
      <a href="nuevo_registro7.php?dp_id='.$_GET['dp_id'].'&em_id='.$em_id.'"><button type="button" class="btn btn-success">Modificar</button></a>
    </div>
  </div>
</div>';
?>
