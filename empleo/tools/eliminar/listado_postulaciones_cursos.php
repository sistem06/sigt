<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");

                        $dat = $_GET['dat'];
                        $qu = mysql_query("SELECT fp_id, fp_name from tb_formacion_profesional INNER JOIN tb_postulaciones_cursos ON tb_postulaciones_cursos.pc_curso = tb_formacion_profesional.fp_id WHERE (tb_formacion_profesional.fp_name like '$dat%') group by tb_postulaciones_cursos.pc_curso order by tb_formacion_profesional.fp_name");
                        $nu = mysql_num_rows($qu);
                        while($a = mysql_fetch_array($qu)){
                      ?>
 <div class="col-xs-12 col-md-3">
                  <div class="form-group">

                  <div class="checkbox">
                   
                      <label>
                      <input type="checkbox" id="<?php echo $a['fp_id']; ?>" class="elemento1" name="dper"
                      <?php 
                      $n = NroRegistroTriple ("tb_informes_listado_items", "ili_item", $a['fp_id'], "ili_inl_id", $_GET['informe'], "ili_tabla", $_GET['tabla']);
                      if($n>0) echo ' checked';
                      ?>
                      > 
                      <?php echo utf8_encode($a['fp_name']); ?></label>

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
                      <input type="checkbox" id="todos1" class="elemento1"> 
                      <b>Todos</b></label>
                  </div>
                  </div>
</div>