<?php
include ("../conecta.php");
	$txt = "insert into tb_ingresos (in_dp_id, in_por, in_mono, in_mono_det, in_efector, in_efector_expediente) values ('".$_POST['dp_id']."', '".$_POST['nro_porcentaje']."', '".$_POST['mon_so']."', '".$_POST['mon_com']."', '".$_POST['efe_so']."', '".$_POST['efector_expediente']."')";
	mysql_query($txt);
	
	$qq = mysql_query("select ti_id from tb_tipo_ingresos");
	$dp_id = $_POST['dp_id'];
	while($aa = mysql_fetch_array($qq) ){
		$vara = $aa['ti_id'];
			if($_POST[$vara]=='si'){
				$txtx = "insert into tb_ingresos_otros (io_dp_id, io_td_id) values ('".$dp_id."','".$vara."')";
				mysql_query($txtx);
			}
	}
	$em_id = $_POST['em_id'];
	header("location: detalle_emprendedor.php?dp_id=$dp_id");
?>