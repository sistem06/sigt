<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
		$txt = "select * from tb_obras_sociales order by os_name";
		$query = mysql_query($txt);
			$res = "";
			$res .= '<option></option>';
			
			$res .= '<optgroup label="Accion">';
			$res .= '<option>Agregar</option>';
			
			$res .= '<optgroup label="Obras Sociales">';
			while($a=mysql_fetch_array($query)){
				$res .= '<option value="'.$a['os_id'].'">'.utf8_encode($a['os_name']).'</option>';
			}
	echo $res;
	?>