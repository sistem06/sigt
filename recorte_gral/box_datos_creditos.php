<?php
echo '
<div class="col-xs-12 col-sm-6 col-md-3">
  <div class="panel panel-danger">
    <div class="panel-heading">
      <h3 class="panel-title"><span class="glyphicon glyphicon-usd"></span>Subsidios/Créditos Recibidos</h3>
    </div>
    <div class="panel-body">
      <table class="table table-striped">';

        $ttx = "select * from tb_emprendedor_credito INNER JOIN tb_organizaciones ON tb_emprendedor_credito.ec_or = tb_organizaciones.or_id INNER JOIN tb_motivo_credito ON tb_emprendedor_credito.ec_mo = tb_motivo_credito.mc_id where tb_emprendedor_credito.ec_dp_id = ".$_GET['dp_id'];
        $list = mysql_query($ttx);
        while($lis_dat = mysql_fetch_array($list)){
          echo '
          <tr><td>'.$lis_dat['or_name'].'</td><td>'.$lis_dat['mc_name'].'</td><td>';
          if($lis_dat['ec_vigente']=="SI"){
            echo '<span class="label label-danger">VIGENTE</span>';
          }
          echo '
          </td></tr>';
        }
      echo '
      </table>
      <a href="nuevo_registro5.php?dp_id='.$_GET["dp_id"].'&em_id='.$em_id.'&estado=E"><button type="button" class="btn btn-danger">Modificar</button></a>
    </div>
  </div>
</div>';
?>
