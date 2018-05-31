<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
	$txt = "select act_name from tb_actividades where act_name like '%".$_GET['busca']."%'";
	$resp ="";

	$query = mysql_query($txt);
		while($dat = mysql_fetch_array($query)){
			$resp .= '<div class = "cada_elemento"><a href="" value="'.utf8_encode($dat['act_name']).'">'.utf8_encode($dat['act_name']).'</a></div>';
		}
	echo $resp;
	?>