<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");

	$txt = "SELECT bar_id, bar_name FROM tb_barrios_gloc where (bar_name like '%".$_GET['busca']."%') order by bar_name";
	$resp ="";

	$query = mysql_query($txt);
		while($dat = mysql_fetch_array($query)){
			$resp .= '<div class = "cada_elemento"><a href="" value="'.$dat['bar_name'].'|'.$dat['bar_id'].'">'.$dat['bar_name'].'</a></div>';
		}
	echo $resp;
	?>
