<?php
	switch($us_sistema){
				case 1:
				$dir = "emprendedores/beneficiarios.php";
				$_SESSION["dir_sis"] = "emprendedores";
				break;

				case 2:
				$dir = "empleo/beneficiarios.php";
				$_SESSION["dir_sis"] = "empleo";
				break;

				case 3:
				$dir = "social/beneficiarios.php";
				$_SESSION["dir_sis"] = "social";
				break;

				case 4:
				$dir = "discapacidad/beneficiarios.php";
				$_SESSION["dir_sis"] = "discapacidad";
				break;

				case 5:
				$dir = "hogar_emaus/beneficiarios.php";
				$_SESSION["dir_sis"] = "hogar_emaus";
				break;

				case 6:
				$dir = "adicciones/eventos.php";
				$_SESSION["dir_sis"] = "adicciones";
				break;

				case 7:
				$dir = "lineacientodos/listado.php";
				$_SESSION["dir_sis"] = "lineacientodos";
				break;

				case 8:
				$dir = "amulen/beneficiarios.php";
				$_SESSION["dir_sis"] = "amulen";
				break;

				case 9:
				$dir = "cdi/beneficiarios.php";
				$_SESSION["dir_sis"] = "cdi";
				break;
			}
			?>
