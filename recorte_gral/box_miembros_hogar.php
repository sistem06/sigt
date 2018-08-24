<?php
echo '
<div class="col-xs-12 col-sm-6 col-md-3">
  <div class="panel panel-info">
	  <div class="panel-heading">
	    <h3 class="panel-title"><span class="glyphicon glyphicon-home"></span>Miembros del Hogar</h3>
	  </div>
	  <div class="panel-body">
      <table class="table">';
    $query_hogar = mysql_query("select * from tb_hogar_beneficiario where hb_ho_id = '$hb_ho_id' and hb_dp_id <> '".$_GET["dp_id"]."'");
    while($a_hogar = mysql_fetch_array($query_hogar)){
        $n_dp_id = $a_hogar['hb_dp_id'];
        $n_parent = BuscaRegistro ("tb_datos_personales", "dp_id", $n_dp_id, "dp_parentesco");
      echo '<tr>';
      echo '<td><p>'.BuscaRegistro ("tb_datos_personales", "dp_id", $n_dp_id, "dp_name").'</p></td>';
      echo '<td><a href="detalle_persona.php?dp_id='.$n_dp_id.'"><button type="button" class="btn btn-light">Ver Detalle</button></a></td>';
      echo '</tr>';
    }
    echo '</table>';
    echo '<a href="miembros_hogar.php?dp_id='.$_GET["dp_id"].'&ho_id='.$hb_ho_id.'&estado=E"><button type="button" class="btn btn-info">Modificar</button></a>
  	</div>
	</div>
</div>';
?>
