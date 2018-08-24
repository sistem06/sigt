<?php
if (!isset($_SESSION)) { session_start(); }
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");

	$txt = "SELECT dp_name, dp_nro_doc, dp_id FROM tb_datos_personales INNER JOIN tb_beneficiarios_sistema ON tb_datos_personales.dp_id = tb_beneficiarios_sistema.bs_dp_id where ((tb_datos_personales.dp_name like '%".$_GET['busca']."%' or tb_datos_personales.dp_nro_doc like '%".$_GET['busca']."%') and tb_beneficiarios_sistema.bs_sis = '".$_SESSION['sistema']."' )";
	$resp ="";

	$query = mysql_query($txt);
		while($dat = mysql_fetch_array($query)){
			$resp .= '<div class = "cada_elemento"><a href="" value="'.$dat['dp_name'].' ('.$dat['dp_nro_doc'].')">'.$dat['dp_name'].' ('.$dat['dp_nro_doc'].')</a></div>';
		}
	echo $resp;
	?>
