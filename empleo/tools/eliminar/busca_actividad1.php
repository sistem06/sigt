<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
	$txt = "select act_id from tb_actividades where act_name = '".utf8_decode($_GET['busca'])."'";
	
	$query = mysql_query($txt);
		$dat = mysql_fetch_array($query);
		$resp = $dat['act_id'];
		
	echo $resp;
	?>