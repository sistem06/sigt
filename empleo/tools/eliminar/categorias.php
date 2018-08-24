<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
		$txt = "select * from tb_categorias order by cat_name";
		$query = mysql_query($txt);
			$res = "";
			$res .= '<option></option>';
			
			$res .= '<optgroup label="Accion">';
			$res .= '<option>Agregar</option>';
			
			$res .= '<optgroup label="Categorias">';
			while($a=mysql_fetch_array($query)){
				$res .= '<option value="'.$a['cat_id'].'">'.utf8_encode($a['cat_name']).'</option>';
			}
	echo $res;
	?>