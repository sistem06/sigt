<?php
	if (!isset($_SESSION)) { session_start(); }
	include ("../../conecta.php");
	include ("../../funciones/funciones_generales.php");
	mysql_set_charset('utf8');
	header("Content-Type: text/html;charset=utf-8");

	if($_POST['tabla']=="tbp_prestaciones_lista"){

			if(isset($_POST['tbp_in_compartida'])){ $tbp_in_compartida = 1; } else { $tbp_in_compartida = 0; }

		$txt = "SELECT tbp_pr_id FROM tbp_prestaciones_lista where (tbp_sis_id = '".$_SESSION['sistema']."' and tbp_pr_name = '".$_POST['tbp_pr_name']."' and tbp_pr_id != '".$_POST['tbp_pr_id']."')";
		$n = mysql_num_rows(mysql_query($txt));
		if($n == 0){

		if($_POST['accion']=="A"){


			if($_POST['tipo'] != "" and $_POST['tbp_pr_name'] != ""){
			$texto = "Se creo la prestación exitosamente";
			$error = "";
			$txt = "INSERT INTO tbp_prestaciones_lista (tbp_pt_id, tbp_pr_name, tbp_sis_id, tbp_in_compartida, tbp_pr_fecha_in, tbp_pr_fecha_out) VALUES ('".$_POST['tipo']."', '".strtoupper($_POST['tbp_pr_name'])."', '".$_POST['sistema']."', '".$tbp_in_compartida."', '".$_POST['tbp_pr_fecha_in']."', '".$_POST['tbp_pr_fecha_out']."')";
			mysql_query($txt);
			}
		} else {
			if($_POST['tipo'] != "" and $_POST['tbp_pr_name'] != ""){
			$texto = "Se modifico la prestación exitosamente";
			$error = "";
			$txt = "UPDATE tbp_prestaciones_lista SET tbp_pt_id = '".$_POST['tipo']."' where tbp_pr_id = '".$_POST['tbp_pr_id']."'";
			mysql_query($txt);
			$txt = "UPDATE tbp_prestaciones_lista SET tbp_pr_name = '".$_POST['tbp_pr_name']."' where tbp_pr_id = '".$_POST['tbp_pr_id']."'";
			mysql_query($txt);
			$txt = "UPDATE tbp_prestaciones_lista SET tbp_in_compartida = '".$tbp_in_compartida."' where tbp_pr_id = '".$_POST['tbp_pr_id']."'";
			mysql_query($txt);
			$txt = "UPDATE tbp_prestaciones_lista SET tbp_pr_fecha_in = '".$_POST['tbp_pr_fecha_in']."' where tbp_pr_id = '".$_POST['tbp_pr_id']."'";
			mysql_query($txt);
			$txt = "UPDATE tbp_prestaciones_lista SET tbp_pr_fecha_out = '".$_POST['tbp_pr_fecha_out']."' where tbp_pr_id = '".$_POST['tbp_pr_id']."'";
			mysql_query($txt);
		}
		}
		BajaPrestacion();
	} else {
		$texto = "";
			$error = "Ya existe una prestacion con ese nombre";
	}
	}

	if($_POST['tabla']=="tbp_capacitaciones"){

		$texto = "Se completarion los datos de la capacitación exitosamente";
		$error = "";

		$txt = "UPDATE tbp_capacitaciones SET pbcap_asistencia = '".$_POST['pbcap_asistencia']."' where pcap_pb_id = '".$_POST['pb_id']."'";
			mysql_query($txt);

		if(isset($_POST['pcap_aprobo'])){
			$txt = "UPDATE tbp_capacitaciones SET pcap_aprobo = '1' where pcap_pb_id = '".$_POST['pb_id']."'";
			mysql_query($txt);
		}

		if(isset($_POST['finaliza'])){
			$txt = "UPDATE tbp_capacitaciones SET pbcap_estado = '9' where pcap_pb_id = '".$_POST['pb_id']."'";
			mysql_query($txt);
			$txt = "UPDATE tbp_prestaciones_beneficiarios SET pb_state = '9' where pb_id = '".$_POST['pb_id']."'";
			mysql_query($txt);
		}

	}

	if($_POST['tabla']=="tbp_seg_temp"){

		$texto = "Se completaron los datos de la capacitación exitosamente";
		$error = "";

		$txt = "UPDATE tbp_seg_temp SET st_estado = '".$_POST['st_estado']."' where st_pb_id = '".$_POST['pb_id']."'";
			mysql_query($txt);

		$txt = "UPDATE tbp_prestaciones_beneficiarios SET pb_state = '".$_POST['st_estado']."' where pb_id = '".$_POST['pb_id']."'";
			mysql_query($txt);

		$txt = "UPDATE tbp_seg_temp SET st_detalle = '".$_POST['st_detalle']."' where st_pb_id = '".$_POST['pb_id']."'";
			mysql_query($txt);

	}

	if($_POST['tabla']=="tbp_creditos"){

		$texto = "Se completaron los datos del credito exitosamente";
		$error = "";

	}
	?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div style="color:#468E2F; font-size: 20px; text-align: center;"><?php echo $texto; ?></div>
<div style="color:#EE3424; font-size: 20px; text-align: center;"><?php echo $error; ?></div>
</body>
</html>
<script type="text/javascript">
	function cierra(){
parent.jQuery.fancybox.close();
}
setTimeout("cierra()",3000)

	</script>
