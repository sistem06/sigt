<?php
include ("../conecta.php");
include ("../funciones/funciones_generales.php");

			$txt = "select * from tb_localidades where lo_depto = '".$_POST['elegido']."'";
		  $query = mysql_query($txt);
			$res = "";
			//$res .= '<option value="25" selected="selected">San Carlos de Bariloche</option>';
			$dep_default = 3; //Bariloche
			$loc_default = 25; //San Carlos de Bariloche
			while($a=mysql_fetch_array($query)){
				if ($a['lo_depto'] == $dep_default) {
					$res .= '<option value="25" selected="selected">San Carlos de Bariloche</option>';
				}
				$res .= '<option value="'.$a['lo_id'].'">'.$a['lo_name'].'</option>';
			}
	echo $res;
	?>
