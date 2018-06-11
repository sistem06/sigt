<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
		$txt = "select * from tb_organizaciones order by or_name";
		$query = mysql_query($txt);
			$res = "";
			$res .= '<option></option>';

			$res .= '<optgroup label="Accion">';
			$res .= '<option>Agregar</option>';

			$res .= '<optgroup label="Organizaciones">';
			while($a=mysql_fetch_array($query)){
				$res .= '<option value="'.$a['or_id'].'">'.$a['or_name'].'</option>';
			}
	echo $res;
	?>
