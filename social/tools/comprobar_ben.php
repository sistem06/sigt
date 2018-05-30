<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
	$n = NroRegistro ($_GET['tabla'], $_GET['valorbusc'], $_GET['dnii']);
	if ($n==0){
		$res = "A";
	} else {
		$txt = "select bs_dp_id, bs_sis from tb_beneficiarios_sistema where (bs_dni = '".$_GET['dnii']."' and bs_sis = '3')";
		$txt1 = "select bs_dp_id, bs_sis from tb_beneficiarios_sistema where (bs_dni = '".$_GET['dnii']."')";
		$query = mysql_query($txt);
		$query1 = mysql_query($txt1);
		if(mysql_num_rows($query) == 0){
			$dat = mysql_fetch_array($query1);
			$dp_id = $dat['bs_dp_id'];
			$dat_dp = mysql_fetch_array(mysql_query("select dp_name from tb_datos_personales where dp_id = '$dp_id'"));
			$res = $dp_id.'|'.$dat_dp['dp_name'];
		} else {
			$res = "B";
		}
	}
	echo $res;
	?>