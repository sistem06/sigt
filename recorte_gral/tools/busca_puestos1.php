<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
	$txt = "select pu_id from tb_puestos where pu_name = '".$_GET['busca1']."'";
	$query = mysql_query($txt);
		$dat = mysql_fetch_array($query);
		$resp = $dat['pu_id'];

	echo $resp;
	?>
