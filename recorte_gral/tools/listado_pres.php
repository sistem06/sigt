<?php
if (!isset($_SESSION)) { session_start(); }
include("../../".$_SESSION["dir_sis"]."/secure.php");
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
include ("../../funciones/funciones_prestaciones.php");
?>
<table class="table table-striped">
        <thead>
          <tr>
          <th>Prestación</th>
          <th>Estado</th>
          <th>Tipo</th>
       <!--   <th>Actual</th>-->
          <th>Tema</th>
          <th>Beneficiario</th>
          <th>Responsable</th>
          <th>Inicio</th>
          <th>Fin</th>
          <th></th>
          <th></th>
          <th></th>
          </tr>
        </thead>

            <tbody>
      <?php
      if($_POST['ben']==0){
      	$fil1 = "";
      } else {
      	$fil1 = " and tbp_prestaciones_beneficiarios.pb_dp_id = '".$_POST['ben']."'";
      }
      if($_POST['pres']==0){
      	$fil2 = "";
      } else {

      		$tx_1 = "SELECT pre_id FROM tbp_prestaciones WHERE pre_pr_id = ".$_POST['pres'];
      		$query_1 = mysql_query($tx_1);
      		if(mysql_num_rows($query_1)>0){
      		$fil2 = " and ( ";
      			while($a1 = mysql_fetch_array($query_1)){
      				$pre_id = $a1['pre_id'];
      				$fil2 .= " tbp_prestaciones_beneficiarios.pb_pre_id = '".$pre_id."' or ";
      			}
      		$fil2 = substr($fil2, 0, -3);
      	$fil2 = $fil2." ) ";
      } else {
      	$fil2 = "";
      }
      }


      $tx_f = "SELECT * FROM tbp_prestaciones_beneficiarios INNER JOIN tb_datos_personales ON tbp_prestaciones_beneficiarios.pb_dp_id = tb_datos_personales.dp_id INNER JOIN tbp_prestaciones ON tbp_prestaciones.pre_id = tbp_prestaciones_beneficiarios.pb_pre_id INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones_lista.tbp_pr_id = tbp_prestaciones.pre_pr_id WHERE (tbp_prestaciones_lista.tbp_sis_id = ".$_SESSION['sistema']." ".$fil1." ".$fil2.") order by tb_datos_personales.dp_name";

      $qe=mysql_query($tx_f);

      if($fil2 != "" or $fil1 != ""){
        while($row = mysql_fetch_array($qe)){
  echo '<tr>';

 echo '<td>'.$row['tbp_pr_name'].'</td>';
 RetornaEstado ($row['pb_id'], BuscaRegistro("tbp_prestacion_type","pt_id",$row['tbp_pt_id'],"pt_id"));

/* if(BuscaRegistro("tbp_prestacion_type","pt_id",$row['tbp_pt_id'],"pt_gr")==1) { $car='GRUPAL'; } else { $car='INDIVIDUAL'; }*/
  echo '<td>'.BuscaRegistro("tbp_prestacion_type","pt_id",$row['tbp_pt_id'],"pt_name").'</td>';
/*  if($row['tbp_pr_activo']==1) { $act='<b><span style="color:#AB2419;">NO</span></b>'; } else { $act='<b><span style="color:#459024;">SI</span></b>'; }
  echo '<td>'.$act.'</td>';*/
  echo '<td>'.$row['pre_tema'].'</td>';
  echo '<td><a href="detalle_persona.php?dp_id='.$row['dp_id'].'" title="detalle del beneficiario">'.$row['dp_name'].'</a></td>';
  if($row['pre_responsable']==0){
    $resp = "";
  } else {
    $resp = BuscaRegistro("tb_usuarios","us_id",$row['pre_responsable'],"us_name");
  }
  echo '<td>'.$resp.'</td>';
  echo '<td>'.$row['pre_fecha'].'</td>';
  if($row['pre_fecha_out']=="0000-00-00"){ $fecha_out = $row['pre_fecha']; } else { $fecha_out = $row['pre_fecha_out']; }
  echo '<td>'.$fecha_out.'</td>';
  echo '<td>';
    if(BuscaRegistro("tbp_prestacion_type","pt_id",$row['tbp_pt_id'],"pt_temp")==1){
      LinkEstado ($row['pb_id'], BuscaRegistro("tbp_prestacion_type","pt_id",$row['tbp_pt_id'],"pt_id"));
    }

  echo '</td>';
  echo '<td><button type="button" class="btn btn-info btn-sm">
    <span class="glyphicon glyphicon-pencil"></span></button></td>';
  echo '<td><a href="quitar_prestacion.php?tabla=tbp_prestaciones_beneficiarios&id=pb_id&val='.$row['pb_id'].'&tipo='.BuscaRegistro("tbp_prestacion_type","pt_id",$row['tbp_pt_id'],"pt_gr").'&pre_id='.$row['pre_id'].'" class="fancybox fancybox.iframe"><button type="button" class="btn btn-warning btn-sm">
    <span class="glyphicon glyphicon-trash"></span></button></a></td>';
  echo '</tr>';
  }
}
               ?>


            </tbody>
        </table>
