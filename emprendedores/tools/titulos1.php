<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
		$txt = "select * from tb_titulo_secundario where (ts_nivel = '".$_POST['nivel']."' and ts_name = '".utf8_decode($_POST['titulo'])."')";

	$query = mysql_fetch_array(mysql_query($txt));
		
	echo $query['ts_id'];
	?>