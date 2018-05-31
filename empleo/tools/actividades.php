<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
		$txt = "select * from tb_actividades order by act_name";
		$query = mysql_query($txt);
			$res = "";
			$res .= '<option></option>';
			
			$res .= '<optgroup label="Accion">';
			$res .= '<option>Agregar</option>';
			
			$res .= '<optgroup label="Actividades">';
			while($a=mysql_fetch_array($query)){
				$res .= '<option value="'.$a['act_id'].'">'.utf8_encode($a['act_name']).'</option>';
			}
	echo $res;
	?>