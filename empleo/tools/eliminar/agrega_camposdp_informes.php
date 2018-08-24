<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
	
		$n = NroRegistroDoble ("tb_informes_listado_detalles", "ild_tab_id", $_GET['id_funcion'], "ild_inl_id", $_GET['informe']);
		if($n==0){
		$tx = "insert into tb_informes_listado_detalles (ild_tab_id, ild_inl_id) values (".$_GET['id_funcion'].", '".$_GET['informe']."')";
		mysql_query($tx);
	} else {
		$tx = "delete from tb_informes_listado_detalles where (ild_tab_id = ".$_GET['id_funcion']." and  ild_inl_id = '".$_GET['informe']."')";
		mysql_query($tx);
	}
	
	$res = NroRegistro("tb_informes_listado_detalles", "ild_inl_id", $_GET['informe']);
	echo $res;
?>