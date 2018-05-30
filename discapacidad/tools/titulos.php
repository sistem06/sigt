<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
		$txt = "select * from tb_titulo_secundario where ts_nivel = '".$_POST['elegido']."'";
		$query = mysql_query($txt);
			$res = "";
			$res .= '<option></option>';
			while($a=mysql_fetch_array($query)){
				$res .= '<option value="'.$a['ts_id'].'">'.utf8_encode($a['ts_name']).'</option>';
			}
	echo $res;
	?>