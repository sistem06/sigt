<?php
include ("../conecta.php");
include ("../funciones/funciones_generales.php");
	$n = NroRegistro ($_GET['tabla'], $_GET['valorbusc'], $_GET['dnii']);
	if ($n==0){
		$res = "A";
	} else {
		$txt = "select bs_dp_id, bs_sis from tb_beneficiarios_sistema where (bs_dni = '".$_GET['dnii']."' and bs_sis = '".$_GET['actual']."')";
		
		$query = mysql_query($txt);
		
		if(mysql_num_rows($query) == 0){
		
			$dnii = $_GET['dnii'];
			$dat_dp = mysql_fetch_array(mysql_query("select * from tb_datos_personales where dp_nro_doc = '$dnii'"));
			$res = 'C|'.$dat_dp['dp_id'].'|'.$dat_dp['dp_name'];
		} else {
			$dat = mysql_fetch_array($query);
			$res = "B|detalle_beneficiario.php?dp_id=".$dat['bs_dp_id'];
		}
	}
	echo $res;
	?>