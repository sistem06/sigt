<?php
include ("../conecta.php");
include ("../funciones/funciones_generales.php");
	$n = NroRegistro ($_GET['tabla'], $_GET['valorbusc'], $_GET['dnii']);
	if ($n==0){
		$res = "A";
	} else {
		$txt1 = "select * from ".$_GET['tabla']." where (dp_nro_doc = '".$_GET['dnii']."')";
		
		$query1 = mysql_query($txt1);
		$dat = mysql_fetch_array($query1);
		$res = 'C|'.$_GET['dnii'].'|'.$dat['dp_apellido'].'|'.$dat['dp_nombre'].'|'.$dat['dp_id'];
	}
	echo $res;
	?>