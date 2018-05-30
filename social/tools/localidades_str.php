<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
		$txt = "select * from tb_localidades where lo_id = '".$_POST['id_loc']."'";
		$query = mysql_query($txt);
		$a=mysql_fetch_array($query);
		if(empty($_POST['es_calle']) or empty($_POST['es_nro'])){
		$loc = $a['lo_name'].', Rio Negro';
	} else {
		$loc = $_POST['es_calle'].' '.$_POST['es_nro'].', '.$a['lo_name'];
	}
	echo $loc;
	?>