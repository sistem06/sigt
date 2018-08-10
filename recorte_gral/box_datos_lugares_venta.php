<?php
echo '
<div class="col-xs-12 col-sm-6 col-md-3">
  <div class="panel panel-warning">
    <div class="panel-heading">
      <h3 class="panel-title"><span class="glyphicon glyphicon-home"></span>Lugares de Venta</h3>
    </div>
    <div class="panel-body">
      <table class="table table-striped">';

      $ttx = "select * from tb_emprendedor_ventas INNER JOIN tb_tipo_punto_venta ON tb_emprendedor_ventas.ev_tipo = tb_tipo_punto_venta.tpv_id where tb_emprendedor_ventas.ev_dp_id = ".$_GET['dp_id'];
      $list = mysql_query($ttx);
      while($lis_dat = mysql_fetch_array($list)){

        echo '<tr><td>'.$lis_dat['tpv_name'].'</td><td>';

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
        echo '
        </td>
        </tr>';
      }
      echo '
      </table>
      <a href="nuevo_registro3.php?dp_id='.$_GET["dp_id"].'&em_id='.$em_id.'&estado=E"><button type="button" class="btn btn-warning">Modificar</button></a>
    </div>
  </div>
</div>';
?>
