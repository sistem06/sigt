<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
/*
$qu = mysql_query("select * from tb_postulaciones_laborales INNER JOIN tb_puestos ON tb_postulaciones_laborales.pl_puesto = tb_puestos.pu_id group by tb_postulaciones_laborales.pl_puesto order by tb_puestos.pu_name");
                        $nu = mysql_num_rows($qu);
*/
                        $dat = $_GET['dat'];
                        $qu = mysql_query("SELECT pu_id, pu_name from tb_puestos INNER JOIN tb_antecedentes_laborales ON tb_antecedentes_laborales.al_puesto = tb_puestos.pu_id WHERE (tb_puestos.pu_name like '$dat%') group by tb_antecedentes_laborales.al_puesto order by tb_puestos.pu_name");
                        $nu = mysql_num_rows($qu);
                        while($a = mysql_fetch_array($qu)){
                      ?>
 <div class="col-xs-12 col-md-3">
                  <div class="form-group">

                  <div class="checkbox">
                   
                      <label>
                      <input type="checkbox" id="<?php echo $a['pu_id']; ?>" class="elemento3" name="dper"
                      <?php 
                      $n = NroRegistro4 ("tb_informes_listado_items", "ili_item", $a['pu_id'], "ili_inl_id", $_GET['informe'], "ili_tabla", $_GET['tabla'], "ili_variante", "al_puesto");
                      if($n>0) echo ' checked';
                      ?>
                      > 
                      <?php echo utf8_encode($a['pu_name']); ?></label>

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
                      <input type="checkbox" id="todos3" class="elemento3"> 
                      <b>Todos</b></label>
                  </div>
                  </div>
</div>