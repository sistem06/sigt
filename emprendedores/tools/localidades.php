<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
		
			$txt = "select * from tb_localidades where lo_depto = '".$_POST['elegido']."'";
		$query = mysql_query($txt);
			$res = "";
			$res .= '<option value="25" selected="selected">San Carlos de Bariloche</option>';
			while($a=mysql_fetch_array($query)){
				$res .= '<option value="'.$a['lo_id'].'">'.utf8_encode($a['lo_name']).'</option>';
			}
		
		
		
	echo $res;
	?>