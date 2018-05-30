<?php
include ("../../conecta.php");
	$txt = "insert into tb_hogar_caracteristicas (hc_ho_id, hc_tipo_familia, hc_edad_padres, hc_ingresos_importes) values ('".$_POST['ho_id']."', '".$_POST['hc_tipo_familia']."', '".$_POST['hc_edad_padres']."', '".$_POST['hc_ingresos_importes']."')";
	mysql_query($txt);
$ho_id = $_POST['ho_id'];
$dp_id = $_POST['dp_id'];
	$qq = mysql_query("select ti_id from tb_tipo_ingresos");
	
	while($aa = mysql_fetch_array($qq) ){
		$vara = $aa['ti_id'];
			if (isset($_POST[$vara])){
			if($_POST[$vara]=='si'){
				$txtx = "insert into tb_ingresos_hogar (ih_ho_id, ih_ti_id) values ('".$ho_id."','".$vara."')";
				mysql_query($txtx);
			}}
	}
//	header("location: ../nuevo_registro2.php?dp_id=$dp_id&ho_id=$ho_id");
	header("location: ../detalle_beneficiario.php?dp_id=$dp_id");
?>