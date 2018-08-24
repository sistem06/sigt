<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
	$txt = "select pu_name from tb_puestos where pu_name like '%".$_GET['busca']."%'";
	$resp ="";

	$query = mysql_query($txt);
		while($dat = mysql_fetch_array($query)){
			$resp .= '<div class = "cada_elemento"><a href="" value="'.$dat['pu_name'].'">'.$dat['pu_name'].'</a></div>';
		}
	echo $resp;
	?>
