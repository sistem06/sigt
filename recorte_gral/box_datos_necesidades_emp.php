<?php
echo '
<div class="col-xs-12 col-sm-6 col-md-3">
  <div class="panel panel-warning">
    <div class="panel-heading">
     <h3 class="panel-title"><span class="glyphicon glyphicon-barcode"></span>Necesidad del Emprendimiento</h3>
    </div>
    <div class="panel-body">
      <table class="table table-striped">';

      $ttx = "select * from tb_emprendedor_credito_nec INNER JOIN tb_motivo_credito ON tb_emprendedor_credito_nec.ecn_rubro = tb_motivo_credito.mc_id where tb_emprendedor_credito_nec.ecn_dp_id = ".$_GET['dp_id'];
      $list = mysql_query($ttx);
      while($lis_dat = mysql_fetch_array($list)){
        echo '
        <tr><td>'.$lis_dat['mc_name'].'</td><td>';
        if ($lis_dat['ecn_rubro_cap'] >0){
          echo DatoRegistro ('tb_tipo_capacitaciones', 'tc_name', 'tc_id', $lis_dat['ecn_rubro_cap']);
        }
        echo '</td></tr>';
      }
      echo '
      </table>
      <a href="datos_necesidades_emp.php?dp_id='.$_GET["dp_id"].'&em_id='.$em_id.'&estado=E"><button type="button" class="btn btn-warning">Modificar</button></a>
    </div>
  </div>
</div>';
?>
