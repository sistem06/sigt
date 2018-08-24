<?php
echo '
<div class="col-xs-12 col-sm-6 col-md-3">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title"><span class="glyphicon glyphicon-link"></span>Instituciones Asociadas</h3>
    </div>
  <div class="panel-body">
    <table class="table table-striped">';

    $ttx = "select * from tb_emprendedor_organizacion INNER JOIN tb_organizaciones ON tb_emprendedor_organizacion.eo_or_id = tb_organizaciones.or_id INNER JOIN tb_tipo_asociacion ON tb_emprendedor_organizacion.eo_fa_id = tb_tipo_asociacion.ta_id where tb_emprendedor_organizacion.eo_dp_id = ".$_GET['dp_id'];
    $list = mysql_query($ttx);
    while($lis_dat = mysql_fetch_array($list)){
      echo '
      <tr>
        <td>'.$lis_dat['or_name'].'</td>
        <td>'.$lis_dat['ta_name'].'</td>
      </tr>';
    }
    echo '
    </table>
    <a href="datos_instituciones_asoc.php?dp_id='.$_GET["dp_id"].'&em_id='.$em_id.'&estado=E"><button type="button" class="btn btn-info">Modificar</button></a>
  </div>
  </div>
</div>';
?>
