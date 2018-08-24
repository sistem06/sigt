<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
/*
$qu = mysql_query("select * from tb_postulaciones_laborales INNER JOIN tb_puestos ON tb_postulaciones_laborales.pl_puesto = tb_puestos.pu_id group by tb_postulaciones_laborales.pl_puesto order by tb_puestos.pu_name");
                        $nu = mysql_num_rows($qu);
*/
                        $informe = $_GET['informe'];

$query_in = mysql_query("select * from tb_informes_listado_items where ili_inl_id = '$informe' and ili_variante = 'dne_nivel' and ili_tabla = 'tb_datos_nivel_educativo' and ili_item > 4");
$filtro = "";
  while ($dd = mysql_fetch_array($query_in)) {
    $filtro .= " tb_titulo_secundario.ts_nivel = '".$dd['ili_item']."' or";
  }
 $filtro = substr($filtro, 0, -3);


                        $dat = $_GET['dat'];
                        $txtx = "SELECT ts_id, ts_name FROM tb_titulo_secundario INNER JOIN tb_datos_nivel_educativo ON tb_datos_nivel_educativo.dne_titulo = tb_titulo_secundario.ts_id WHERE (tb_titulo_secundario.ts_name like '".$dat."%' and (".$filtro.")) group by tb_datos_nivel_educativo.dne_titulo order by tb_titulo_secundario.ts_name";
                        $qu = mysql_query($txtx);
                       
                        $nu = mysql_num_rows($qu);
                        while($a = mysql_fetch_array($qu)){
                      ?>
 <div class="col-xs-12 col-md-3">
                  <div class="form-group">

                  <div class="checkbox">
                   
                      <label>
                      <input type="checkbox" id="<?php echo $a['ts_id']; ?>" class="elemento_car" name="dper"
                      <?php 
                      $n = NroRegistro4 ("tb_informes_listado_items", "ili_item", $a['ts_id'], "ili_inl_id", $_GET['informe'], "ili_tabla", $_GET['tabla'], "ili_variante", "dne_titulo");
                      if($n>0) echo ' checked';
                      ?>
                      > 
                      <?php echo utf8_encode($a['ts_name']); ?></label>

                  </div>

                  </div>
</div>
                  <?php
                  }
                  ?>
                  <div class="col-xs-12 col-md-3">
                  <div class="form-group">
                  <div class="checkbox">
                      <label>
                      <input type="checkbox" id="todos_car" class="elemento_car"> 
                      <b>Todos</b></label>
                  </div>
                  </div>
</div>