<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
	$dp_id = $_POST['dp_id'];

	$n1 = mysql_num_rows(mysql_query("select in_dp_id from tb_ingresos where in_dp_id = '$dp_id'"));

	if($n1 == 0){
	$txt = "insert into tb_ingresos (in_dp_id, in_por, in_efector, in_efector_expediente)
	        values ('".$_POST['dp_id']."', '".$_POST['nro_porcentaje']."', '".$_POST['efe_so']."', '".$_POST['efector_expediente']."')";
	mysql_query($txt);
	} else {
		$txt = "UPDATE tb_ingresos SET in_por = '".$_POST['nro_porcentaje']."', in_efector = '".$_POST['efe_so']."', in_efector_expediente = '".$_POST['efector_expediente']."' WHERE in_dp_id = '".$_POST['dp_id']."'";
	mysql_query($txt);
	}

	$n2 = mysql_num_rows(mysql_query("select ea_dp_id from tb_estado_afip where ea_dp_id = '$dp_id'"));

	if($n2 == 0){
	$txt1 = "insert into tb_estado_afip (ea_dp_id, ea_tipo_relacion, ea_vencimiento) values ('".$_POST['dp_id']."', '".$_POST['ea_tipo_relacion']."', '".$_POST['ea_vencimiento']."')";
	mysql_query($txt1);
} else {
	$txt1 = "UPDATE tb_estado_afip SET ea_tipo_relacion = '".$_POST['ea_tipo_relacion']."', ea_vencimiento = '".$_POST['ea_vencimiento']."' WHERE ea_dp_id ='".$_POST['dp_id']."'";
	mysql_query($txt1);
}

	$qq = mysql_query("select ti_id from tb_tipo_ingresos");
	$dp_id = $_POST['dp_id'];
	while($aa = mysql_fetch_array($qq) ){
		$vara = $aa['ti_id'];

			if($_POST[$vara]=='si'){
				if(NroRegistroDoble ("tb_ingresos_otros", "io_dp_id", $dp_id, "io_ti_id", $vara)==0){
				$txtx = "insert into tb_ingresos_otros (io_dp_id, io_ti_id) values ('".$dp_id."','".$vara."')";
				mysql_query($txtx);
			}
			} else {
				if(NroRegistroDoble ("tb_ingresos_otros", "io_dp_id", $dp_id, "io_ti_id", $vara)>0){
				$txtx = "delete from tb_ingresos_otros where (io_dp_id = '".$dp_id."' and io_ti_id = '".$vara."')";
				mysql_query($txtx);
			}

			}
	}

	//Cambio Flag entrevista realizada (Ingresos registrado)
	$txt2 = "update tb_entrevista set ent_fin = 1 where ent_dp_id = ".$dp_id." and ent_ten_id = 8";
	mysql_query($txt2);

	header("location: ../detalle_beneficiario.php?dp_id=$dp_id");
?>
