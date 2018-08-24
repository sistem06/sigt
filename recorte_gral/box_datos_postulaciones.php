<?php
echo '
<div class="col-xs-12 col-sm-6 col-md-3">
  <div class="panel panel-warning">
   <div class="panel-heading">
     <h3 class="panel-title"><span class="glyphicon glyphicon-road"></span>Postulaciones</h3>
   </div>
   <div class="panel-body">
    <p><strong>Postulaciones Laborales: </strong> </p>
    <table class="table table-striped">';
      $ttx = "select * from tb_postulaciones_laborales where pl_dp_id = ".$_GET['dp_id'];
      $list = mysql_query($ttx);
      while($lis_dat = mysql_fetch_array($list)){
        echo '<tr><td>'.BuscaRegistroM("tb_puestos", "pu_id", $lis_dat['pl_puesto'], "pu_name").'</td></tr>';
      }
      echo '
    </table>
    <p><strong>Postulaciones a Cursos: </strong></p>
      <table class="table table-striped">';
        $ttx = "select * from tb_postulaciones_cursos where pc_dp_id = ".$_GET['dp_id'];
        $list = mysql_query($ttx);
        while($lis_dat = mysql_fetch_array($list)){
          echo '<tr><td>'.BuscaRegistroM("tb_formacion_profesional", "fp_id", $lis_dat['pc_curso'], "fp_name").'</td></tr>';
        }
        echo '
      </table>
      <a href="datos_postulaciones.php?dp_id='.$_GET["dp_id"].'&em_id='.$em_id.'&acc=M">
         <button type="button" class="btn btn-warning">Modificar</button></a>
    </div>
  </div>
 </div>';
