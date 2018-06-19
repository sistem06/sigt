<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");

			$txt = "select * from tb_localidades_pais where loc_pr_id = '".$_POST['elegido']."'";
		$query = mysql_query($txt);
			$res = "";
			$res .= '<option></option>';
			while($a=mysql_fetch_array($query)){
				$res .= '<option value="'.$a['loc_id'].'">'.$a['loc_name'].'</option>';
			}



	echo $res;
	?>
