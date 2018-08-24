<?php
echo '
<div class="col-xs-12 col-sm-6 col-md-3">
  <div class="panel panel-success">
    <div class="panel-heading">
      <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span>Datos Educativos</h3>
    </div>
    <div class="panel-body">
      <strong>Nivel educativo alcanzado: </strong>
      <table class="table table-striped">';

      $txt_ne = "select * from tb_datos_nivel_educativo where dne_dp_id = ".$_GET["dp_id"];
      $query_ne = mysql_query($txt_ne);
      while($a_ne = mysql_fetch_array($query_ne)){
         echo '<tr>';
           echo '<td>'.BuscaRegistroM ("tb_nivel_educativo", "ne_id", $a_ne["dne_nivel"], "ne_name").'</td>';
           echo '<td>'.BuscaRegistroM ("tb_estado_titulo", "et_id", $a_ne["dne_termino"], "et_name").'</td>';
           echo '<td>'.BuscaRegistroM ("tb_titulo_secundario", "ts_id", $a_ne["dne_titulo"], "ts_name").'</td>';
         echo '</tr>';
      }
      echo '</table>';

      echo '
      <strong>Idiomas que maneja: </strong>
      <table class="table table-striped">';

      $ttx2 = "select * from tb_beneficiario_idioma where bi_dp_id = ".$_GET['dp_id'];
      $list2 = mysql_query($ttx2);
      while($lis_dat2 = mysql_fetch_array($list2)){
         echo '<tr>';
           echo '<td>'.(BuscaRegistroM ("tb_idiomas", "idi_id", $lis_dat2['bi_idi_id'], "idi_name")).'</td>';
           echo '<td>'.BuscaRegistroM ("tb_niveles_idiomas", "ni_id", $lis_dat2['bi_nivel'], "ni_name").'</td>';
         echo '</tr>';
      }
      echo '
      </table>';

      echo '
      <strong>Permisos / Licencias / Matriculas </strong>
      <table class="table table-striped">
      <thead>
      <tr>
       <th>Licencia</th>
       <th>Vencimiento</th>
       <th>Entidad Emisora</th>';
      /*<th>Lugar</th>*/
      echo '
      </tr>
      </thead>
      <tbody>';

      $ttx_lic = "select * from tb_licencias_beneficiario where lb_dp_id = ".$_GET['dp_id'];
      $list_lic = mysql_query($ttx_lic);
      while($lis_dat_lic = mysql_fetch_array($list_lic)){
      echo '
      <tr>
         <td>'.BuscaRegistroM ("tb_licencias", "lic_id", $lis_dat_lic['lb_lic_id'], "lic_name").'</td>
         <td>'.fecha_dev ($lis_dat_lic['lb_vencimiento']).'</td>
         <td>'.strtoupper($lis_dat_lic['lb_emisora']).'</td>';
       /*<td>'.BuscaRegistroM ("tb_localidades_pais", "loc_id", $lis_dat_lic['lb_municipio'], "loc_name").', '.BuscaRegistro ("tb_provincias", "pr_id", $lis_dat_lic['lb_provincia'], "pr_name").'</td>*/
       echo '
         </tr>';
      }
      echo '
      </tbody>
      </table>';

      echo '
      <p>Manejo de PC: <strong>';
      $ru = BuscaRegistro ("tb_datos_educativos", "de_dp_id", $_GET["dp_id"], "de_pc");
      echo BuscaRegistroM ("tb_manejo_pc", "mp_id", $ru, "mp_name");
      echo '</strong></p>';

      echo '
      <p>Desea seguir estudiando: <strong>';
      $co = BuscaRegistro ("tb_datos_educativos", "de_dp_id", $_GET["dp_id"], "de_continuar");
      echo SiNoM ($co);
      echo '</strong></p>';
      echo '<p>Observaciones: <i>'.BuscaRegistroM("tb_datos_educativos", "de_dp_id", $_GET["dp_id"], "de_observaciones").'</i></p>';
      echo '<p>Fecha de Carga: <b>'.fecha_dev(BuscaRegistro ("tb_datos_educativos", "de_dp_id", $_GET["dp_id"], "de_fecha_actualizacion")).'</b></p>';
      echo '<a href="datos_educativos.php?dp_id='.$_GET["dp_id"].'"><button type="button" class="btn btn-success">Modificar</button></a>

     </div>
   </div>
 </div>';
 ?>
