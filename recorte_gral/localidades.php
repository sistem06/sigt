<?php
include ("../conecta.php");
include ("../funciones/funciones_generales.php");

			$txt = "select * from tb_localidades where lo_depto = '".$_POST['elegido']."'";
		  $query = mysql_query($txt);
			$res = "";

			$dep_default = 3; //Bariloche
			$loc_default = 25; //San Carlos de Bariloche
			if ($_POST['localidad'] == "" || $_POST['elegido'] = $dep_default) {
				$localidad = $loc_default;
			} else {
				$localidad = $_POST['localidad'];
			}

			$dep_loc = BuscaRegistro("tb_localidades","lo_id",$localidad,"lo_depto");

			while($a=mysql_fetch_array($query)){
				if ($a['lo_id'] == $loc_default) {
					$res .= '<option value="25" selected="selected">San Carlos de Bariloche</option>';
				} else {
					$res .= '<option value="'.$a['lo_id'].'">'.$a['lo_name'].'</option>';
				}
			}

	echo $res;
	?>
