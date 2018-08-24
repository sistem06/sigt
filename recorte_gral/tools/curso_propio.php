<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
		$txt = "select * from tb_formacion_profesional where fp_name like '%".$_POST['busca']."%' order by fp_name";
		$resp ="";

	$query = mysql_query($txt);
		while($dat = mysql_fetch_array($query)){
			$resp .= '<div class = "cada_elemento"><a href="" value="'.$dat['fp_name'].'">'.$dat['fp_name'].'</a></div>';
		}
	echo $resp;
	?>
