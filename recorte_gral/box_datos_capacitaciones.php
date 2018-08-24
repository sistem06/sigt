<?php
echo '
<div class="col-xs-12 col-sm-6 col-md-3">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span>Capacitaciones Recibidas</h3>
    </div>
    <div class="panel-body">
      <table class="table table-striped">';

      $ttx = "select * from tb_emprendedor_capacitaciones INNER JOIN tb_organizaciones ON tb_emprendedor_capacitaciones.ec_or_id = tb_organizaciones.or_id INNER JOIN tb_tipo_capacitaciones ON tb_emprendedor_capacitaciones.ec_motivo = tb_tipo_capacitaciones.tc_id where tb_emprendedor_capacitaciones.ec_dp_id = ".$_GET['dp_id'];
      $list = mysql_query($ttx);
      while($lis_dat = mysql_fetch_array($list)){
        echo '
        <tr><td>'.$lis_dat['or_name'].'</td><td>'.$lis_dat['tc_name'].'</td>
        </tr>';
      }
      echo '
      </table>
      <a href="datos_capacitaciones.php?dp_id='.$_GET["dp_id"].'&em_id='.$em_id.'&estado=E"><button type="button" class="btn btn-info">Modificar</button></a>
    </div>
  </div>
</div>';
?>
