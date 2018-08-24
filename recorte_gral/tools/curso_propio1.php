<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
		$txt = "select fp_id from tb_formacion_profesional where fp_name = '".$_POST['curso']."'";

	$aa = mysql_fetch_array(mysql_query($txt));
	echo $aa['fp_id'];
	?>
