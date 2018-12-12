<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
	$txt = "SELECT * FROM tb_localidades_pais WHERE loc_pr_id = '".$_GET['loc_pr_id']."'";
	$resp ="";

	$query = mysql_query($txt);
		while($dat = mysql_fetch_array($query)){
			$resp .= '<option value="'.$dat['loc_id'].'">'.$dat['loc_name'].'</option>';
		}
	echo $resp;
	?>
