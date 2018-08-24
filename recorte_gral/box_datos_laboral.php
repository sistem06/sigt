<?php
echo '
<div class="col-xs-12 col-sm-6 col-md-3">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title"><span class="glyphicon glyphicon-wrench"></span>Historia Laboral</h3>
    </div>
    <div class="panel-body">
      <table class="table table-striped">';
      echo '<thead><tr>';
      echo '<th><strong>Tipo</strong></th>
            <th><strong>Lugar</strong></th>
            <th><strong>Puesto</strong></th>';
      echo '</tr></thead>';
      $ttx = "select * from tb_antecedentes_laborales where al_dp_id = ".$_GET['dp_id'];
      $list = mysql_query($ttx);
      while($lis_dat = mysql_fetch_array($list)){
        echo '<tr><td>'. BuscaRegistroM ("tb_tipo_trabajo", "tt_id", $lis_dat['al_tipo_trabajo'], "tt_name") .'</br>';
        echo     '<br> Desde:'. fecha_dev($lis_dat['al_in']) .' ';
        echo     '<br> Hasta:'; if($lis_dat['al_actual'] != 1){ echo fecha_dev($lis_dat['al_out']);} echo '</td>';
        echo     '<td>'. $lis_dat['al_lugar_trabajo'] .'</td>';
        echo     '<td>'. BuscaRegistroM ("tb_puestos", "pu_id", $lis_dat['al_puesto'], "pu_name") .'</td>';
        echo '</tr>';
      }
      echo '
      </table>
      <a href="datos_laboral.php?dp_id='.$_GET["dp_id"].'&em_id='.$em_id.'&acc=M"><button type="button" class="btn btn-info">Modificar</button></a>
    </div>
  </div>
</div>';
?>
