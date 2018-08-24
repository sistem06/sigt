<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");

	$txt = "SELECT us_id, us_name FROM tb_usuarios where (us_name like '%".$_GET['busca']."%') group by us_name order by us_name";
	$resp ="";

	$query = mysql_query($txt);
		while($dat = mysql_fetch_array($query)){
			$resp .= '<div class = "cada_elemento"><a href="" value="'.$dat['us_name'].'|'.$dat['us_id'].'">'.$dat['us_name'].'</a></div>';
		}
	echo $resp;
	?>
