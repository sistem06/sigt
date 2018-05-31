<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
		$txt = "select * from tb_sexos";
		$query = mysql_query($txt);
			$res = "";
			$res .= '<option></option>';
				while($a=mysql_fetch_array($query)){
				$res .= '<option value="'.$a['sx_id'].'">'.utf8_encode($a['sx_name']).'</option>';
			}
	echo $res;
	?>