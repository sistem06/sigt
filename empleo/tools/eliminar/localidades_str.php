<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
		$txt = "select * from tb_localidades where lo_id = '".$_POST['id_loc']."'";
		$query = mysql_query($txt);
		$a=mysql_fetch_array($query);
		if(empty($_POST['es_calle']) or empty($_POST['es_nro'])){
		$loc = $a['lo_name'].' , Rio Negro';
	} else {
		$calle = utf8_encode($_POST['es_calle']);
		$query_cl = mysql_query("select * from tb_calle where ca_name = '$calle'");
		$data_cl = mysql_fetch_array($query_cl);
		if(!empty($data_cl['ca_gm'])){
			$es_calle = $data_cl['ca_gm'];
		} else {
			$es_calle = $_POST['es_calle'];
		}
		$loc = $es_calle.' '.$_POST['es_nro'].', '.$a['lo_name'].' , Rio Negro';
	}
	echo $loc;
	?>