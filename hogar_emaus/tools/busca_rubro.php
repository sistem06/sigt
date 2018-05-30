<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
	$txt = "select sr_name from tb_subrubros where sr_name like '%".$_GET['busca']."%'";
	$resp ="";

	$query = mysql_query($txt);
		while($dat = mysql_fetch_array($query)){
			$resp .= '<a href="" class="cada_elemento" title="'.utf8_encode($dat['sr_name']).'">'.utf8_encode($dat['sr_name']).'</a>';
		}
	echo $resp;
	?>