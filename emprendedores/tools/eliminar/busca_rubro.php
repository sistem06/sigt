<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
	$txt = "select sr_name, sr_id from tb_subrubros where sr_ru_id = '".$_GET['busca']."'";
	$resp ="<option></option>";

	$query = mysql_query($txt);
		while($dat = mysql_fetch_array($query)){
			$resp .= '<option value="'.$dat['sr_id'].'">'.$dat['sr_name'].'</option>';
		}
	echo $resp;
	?>
