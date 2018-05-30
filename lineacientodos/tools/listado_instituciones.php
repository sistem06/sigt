<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
		if(!empty($_POST['nuevo_val'])){
			$txt = "insert into tb_derivaciones_102 (der_name, der_es) values ('".$_POST['nuevo_val']."','0')";
		$query = mysql_query($txt);
		}
		$txt = "select * from tb_derivaciones_102 where der_es=0";
		$query = mysql_query($txt);
			$res = "";
			$res .= '<option></option>';
			$res .= '<optgroup label="Especifico">';
			while($a=mysql_fetch_array($query)){
				$res .= '<option value="'.$a['der_id'].'">'.utf8_encode($a['der_name']).'</option>';
			}
			$res .= '</optgroup>';

			$txt1 = "select * from tb_derivaciones_102 where der_es=1";
		$query1 = mysql_query($txt1);
			$res .= '<optgroup label="General">';
			while($a1=mysql_fetch_array($query1)){
				$res .= '<option value="'.$a1['der_id'].'">'.utf8_encode($a1['der_name']).'</option>';
			}
			$res .= '</optgroup>';
	echo $res;
	?>