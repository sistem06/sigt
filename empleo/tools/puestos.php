<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
		$txt = "select * from tb_puestos order by pu_name";
		$query = mysql_query($txt);
			$res = "";
			$res .= '<option></option>';
			
			$res .= '<optgroup label="Accion">';
			$res .= '<option>Agregar</option>';
			
			$res .= '<optgroup label="Puestos">';
			while($a=mysql_fetch_array($query)){
				$res .= '<option value="'.$a['pu_id'].'">'.utf8_encode($a['pu_name']).'</option>';
			}
	echo $res;
	?>