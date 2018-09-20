<?php
	if (!isset($_SESSION)) { session_start(); }
	include ("../../".$_SESSION["dir_sis"]."/secure.php");	
	include ("../../conecta.php");
	include ("../../funciones/funciones_generales.php");
	include ("../../funciones/funciones_form.php");
	mysql_set_charset('utf8');
	header("Content-Type: text/html;charset=utf-8");
	if($_POST['tabla']=="tb_titulo_secundario"){

			$tabla = $_POST['tabla'];
			$borra = $_POST['ts_id'];
			$cambio = $_POST['seagrupa'];

			mysql_query("update tb_datos_nivel_educativo set dne_titulo = '$cambio' where dne_titulo = '$borra'");
			mysql_query("delete from tb_titulo_secundario where ts_id = '$borra'");
	}

	if($_POST['tabla']=="tb_formacion_profesional"){


			$borra = $_POST['fp_id'];
			$cambio = $_POST['seagrupa'];

			mysql_query("update tb_beneficiario_formacion_profesional set bfp_fp_id = '$cambio' where bfp_fp_id = '$borra'");
			mysql_query("delete from tb_formacion_profesional where fp_id = '$borra'");
	}

	if($_POST['tabla']=="tb_actividades"){


			$borra = $_POST['act_id'];
			$cambio = $_POST['seagrupa'];

			mysql_query("update tb_antecedentes_laborales set al_actividad = '$cambio' where al_actividad = '$borra'");
			mysql_query("delete from tb_actividades where act_id = '$borra'");
	}

	if($_POST['tabla']=="tb_puestos"){


			$borra = $_POST['pu_id'];
			$cambio = $_POST['seagrupa'];

			mysql_query("update tb_antecedentes_laborales set al_puesto = '$cambio' where al_puesto = '$borra'");
			mysql_query("delete from tb_puestos where pu_id = '$borra'");
	}

	if($_POST['tabla']=="tb_categorias"){


			$borra = $_POST['cat_id'];
			$cambio = $_POST['seagrupa'];

			mysql_query("update tb_antecedentes_laborales set al_categoria = '$cambio' where al_categoria = '$borra'");
			mysql_query("delete from tb_categorias where cat_id = '$borra'");
	}
	$texto = "Se agruparon los datos exitosamente";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div style="color:#468E2F; font-size: 20px; text-align: center;"><?php echo $texto; ?></div>
</body>
</html>
<script type="text/javascript">
	function cierra(){
parent.jQuery.fancybox.close();
}
setTimeout("cierra()",3000)

	</script>
