<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");

	$txt = "SELECT * FROM tbp_rubro2 WHERE rb1_id = ".$_GET['rubro'];
	$resp ="";

	$query = mysql_query($txt);
		while($dat = mysql_fetch_array($query)){
			$resp .= '<option value="'.$dat['rb2_id'].'">'.$dat['rb2_name'].'</option>';
		}
	echo $resp;
	?>
