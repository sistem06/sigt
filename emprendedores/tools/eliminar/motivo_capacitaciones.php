<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
		$txt = "select * from tb_tipo_capacitaciones order by tc_name";
		$query = mysql_query($txt);
			$res = "";
			$res .= '<option></option>';

			$res .= '<optgroup label="Accion">';
			$res .= '<option>Agregar</option>';

			$res .= '<optgroup label="Motivos">';
			while($a=mysql_fetch_array($query)){
				$res .= '<option value="'.$a['tc_id'].'">'.$a['tc_name'].'</option>';
			}
	echo $res;
	?>
