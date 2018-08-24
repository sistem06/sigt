<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
		$txt = "select * from tb_zonas order by zo_name";
		$query = mysql_query($txt);
			$res = "";
			$res .= '<option></option>';

			$res .= '<optgroup label="Accion">';
			$res .= '<option>Agregar</option>';

			$res .= '<optgroup label="Zonas">';
			while($a=mysql_fetch_array($query)){
				$res .= '<option value="'.$a['zo_id'].'">'.$a['zo_name'].'</option>';
			}
	echo $res;
	?>
