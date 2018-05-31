<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
$tx = "select * from tb_discapacidad_ayuda_tecnica where dat_td_id = ".$_GET['filtro'];
$query = mysql_query($tx);
$res = "";
$res .= '<div class="form-group">
                <label>Ayudas Necesarias:</label><br>';
	while($data = mysql_fetch_array($query)){
		$n = NroRegistroDoble ("tb_ayudas_discapacidad", "ad_dp_id", $_GET['dp_id'], "ad_dat_id", $data['dat_id']);
		if($n==0){
		$res .= '<label class="checkbox-inline">
  <input type="checkbox" id="'.$data['dat_id'].'" value="opcion_1" class="elemento"> '.utf8_encode($data['dat_name']).'  
</label>';
} else {
	$res .= '<label class="checkbox-inline">
  <input type="checkbox" id="'.$data['dat_id'].'" value="opcion_1" class="elemento" checked> '.utf8_encode($data['dat_name']).'  
</label>';
}
	}
	$res .= '</div>';
	echo $res;
?>