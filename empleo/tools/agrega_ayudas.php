<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
if($_GET['modo']=="Q"){
	$tx = "delete from tb_ayudas_discapacidad where ad_dp_id = ".$_GET['dp_id'];
	mysql_query($tx);
} else {
	$n = NroRegistroDoble ("tb_ayudas_discapacidad", "ad_dp_id", $_GET['dp_id'], "ad_dat_id", $_GET['id']);
		if($n==0){
		$tx = "insert into tb_ayudas_discapacidad (ad_dp_id, ad_dat_id) values (".$_GET['dp_id'].", '".$_GET['id']."')";
		mysql_query($tx);
	} else {
		$tx = "delete from tb_ayudas_discapacidad where (ad_dp_id = ".$_GET['dp_id']." and  ad_dat_id = '".$_GET['id']."')";
		mysql_query($tx);
	}
}
?>