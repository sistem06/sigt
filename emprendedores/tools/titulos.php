<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
		$txt = "select * from tb_titulo_secundario where ((ts_nivel = '".$_POST['elegido']."' or ts_nivel = 0) and ts_name like '%".$_POST['busca']."%') order by ts_name";
		$resp ="";

	$query = mysql_query($txt);
		while($dat = mysql_fetch_array($query)){
			$resp .= '<div class = "cada_elemento"><a href="" value="'.$dat['ts_name'].'">'.$dat['ts_name'].'</a></div>';
		}
	echo $resp;
	?>
