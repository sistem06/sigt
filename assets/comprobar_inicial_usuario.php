<?php
include ("../conecta.php");
include ("../funciones/funciones_generales.php");
	$n = NroRegistro ($_GET['tabla'], $_GET['valorbusc'], $_GET['username']);
	if ($n==0){
		$res = "A";
	} else {

		$us_id = BuscaRegistro ("tb_usuarios", "us_name", $_GET['username'], "us_id");

		$login = BuscaRegistro ("tb_usuarios", "us_id", $us_id, "us_login");
		if ($login == 0) {
			$res = "N";
		} else {
			$txt = "select uss_id from tb_usuarios_sistemas where (uss_us_id = '".$us_id."' and uss_sistema = '".$_GET['actual']."')";

			$query = mysql_query($txt);

			if(mysql_num_rows($query) == 0){
				$nombre = BuscaRegistro ("tb_usuarios", "us_id", $us_id, "us_nombre");
				$nombre .= " ".BuscaRegistro ("tb_usuarios", "us_id", $us_id, "us_apellido");
				$id_tipo_usr = BuscaRegistro ("tb_usuarios_sistemas", "uss_us_id", $us_id, "uss_tipo");
				$tipo_usr = 0;
				if ($id_tipo_usr <> 0) {
					$tipo_usr = BuscaRegistro ("tb_tipo_usuarios", "tus_id", $id_tipo_usr, "tus_name");
				}
				$res = 'C|'.$us_id.'|'.$nombre.'|'.$tipo_usr.'|'.$id_tipo_usr;
			} else {
				$res = "B|../usuarios.php?verusr=1";
			}
		}
	}
	echo $res;
?>
