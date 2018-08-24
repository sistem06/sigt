<?php
	include ("../../conecta.php");
	include ("../../funciones/funciones_generales.php");
	mysql_set_charset('utf8');
	header("Content-Type: text/html;charset=utf-8");
	//echo $_POST['paso'];
	if($_POST['paso']==1){
		if($_POST['prestacion'] != ""){
			$text_add = "INSERT INTO tbp_prestaciones (pre_pr_id, pre_us_id) VALUES ('".$_POST['prestacion']."', '".$_POST['id_us']."')";
			mysql_query($text_add);

		//	$dp_id = BuscaRegistro("tb_datos_personales","dp_nro_doc",$_POST['dni'],"dp_id");

			$dat = mysql_fetch_array(mysql_query("SELECT pre_id FROM tbp_prestaciones order by pre_id desc limit 1"));
			$pre_id = $dat['pre_id'];

			if(isset($_POST['pre_tema'])){
				$pre_tema = $_POST['pre_tema'];
				mysql_query("UPDATE tbp_prestaciones SET pre_tema = '$pre_tema' WHERE pre_id = '$pre_id'");
			}

			
			if(isset($_POST['pre_responsable'])){
				$pre_responsable = $_POST['pre_responsable'];
			 mysql_query("UPDATE tbp_prestaciones SET pre_responsable = '$pre_responsable' WHERE pre_id = '$pre_id'");
			}

			
			if(isset($_POST['pre_ubicacion'])){
				$pre_ubicacion = $_POST['pre_ubicacion'];
			 mysql_query("UPDATE tbp_prestaciones SET pre_ubicacion = '$pre_ubicacion' WHERE pre_id = '$pre_id'");
			}

			
			if(isset($_POST['pre_fecha'])){ 
				$pre_fecha = $_POST['pre_fecha'];
				mysql_query("UPDATE tbp_prestaciones SET pre_fecha = '$pre_fecha' WHERE pre_id = '$pre_id'");}

			
			if(isset($_POST['pre_fecha_out'])){
				$pre_fecha_out = $_POST['pre_fecha_out'];
			 mysql_query("UPDATE tbp_prestaciones SET pre_fecha_out = '$pre_fecha_out' WHERE pre_id = '$pre_id'");
			}

			
			if(isset($_POST['pre_observaciones'])){
				$pre_observaciones = $_POST['pre_observaciones'];
			 mysql_query("UPDATE tbp_prestaciones SET pre_observaciones = '$pre_observaciones' WHERE pre_id = '$pre_id'");
			}

			
			if(isset($_POST['pre_monto'])){
				$pre_monto = $_POST['pre_monto'];
			 mysql_query("UPDATE tbp_prestaciones SET pre_monto = '$pre_monto' WHERE pre_id = '$pre_id'");
			}

			
			if(isset($_POST['pre_cuotas'])){
			$pre_cuotas = $_POST['pre_cuotas'];
			 mysql_query("UPDATE tbp_prestaciones SET pre_cuotas = '$pre_cuotas' WHERE pre_id = '$pre_id'");
			 }

			
			if(isset($_POST['pre_hora'])){
			$pre_hora = $_POST['pre_hora'];
			mysql_query("UPDATE tbp_prestaciones SET pre_hora = '$pre_hora' WHERE pre_id = '$pre_id'");
		}

			
			if(isset($_POST['pre_hora_out'])){
			$pre_hora_out = $_POST['pre_hora_out'];
			 mysql_query("UPDATE tbp_prestaciones SET pre_hora_out = '$pre_hora_out' WHERE pre_id = '$pre_id'");
			}

			if(isset($_POST['nm_hora'])){
			$pre_hora = $_POST['nm_hora'].':'.$_POST['nm_minutos'].':00';
			 mysql_query("UPDATE tbp_prestaciones SET pre_hora = '$pre_hora' WHERE pre_id = '$pre_id'");
			}

		

			header("Location: ../alta_prestacion_grupal.php?pre_id=$pre_id");

	//	$pt_id = BuscaRegistro("tbp_prestaciones_lista","tbp_pr_id",$_POST['prestacion'],"tbp_pt_id");
		} else {
			header("Location: ../alta_prestacion_grupal.php");
		}
	}
	if($_POST['paso']==2){
			$pre_id = $_POST['pre_id'];
			$dp_id = BuscaRegistro("tb_datos_personales","dp_nro_doc",$_POST['dni'],"dp_id");
			$text_add = "INSERT INTO tbp_prestaciones_beneficiarios (pb_pre_id, pb_dp_id) VALUES ('".$pre_id."', '".$dp_id."')";
			mysql_query($text_add);
			header("Location: ../alta_prestacion_grupal.php?pre_id=$pre_id");
	}
	exit();
	?>