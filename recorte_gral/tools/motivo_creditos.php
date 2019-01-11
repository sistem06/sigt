<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
		$txt = "select * from tb_motivo_credito order by mc_name";
		$query = mysql_query($txt);
			$res = "";
			$res .= '<option></option>';

			// RF057
			// $res .= '<optgroup label="Accion">';
			// $res .= '<option>Agregar</option>';

			$res .= '<optgroup label="Destino">';
			while($a=mysql_fetch_array($query)){
				$res .= '<option value="'.$a['mc_id'].'">'.$a['mc_name'].'</option>';
			}
	echo $res;
	?>
