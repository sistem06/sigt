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
				$pre_tema = strtoupper($_POST['pre_tema']);
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
				$fech = $_POST['pre_fecha'];
				} else {
				$fech = date("Y-m-d");
				}
			mysql_query("UPDATE tbp_prestaciones SET pre_fecha = '$fech' WHERE pre_id = '$pre_id'");
			

			if(isset($_POST['pre_fecha_out'])){
				$pre_fecha_out = $_POST['pre_fecha_out'];
			 mysql_query("UPDATE tbp_prestaciones SET pre_fecha_out = '$pre_fecha_out' WHERE pre_id = '$pre_id'");
			}

			
			if(isset($_POST['pre_observaciones'])){
				$pre_observaciones = strtoupper($_POST['pre_observaciones']);
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
				$pre_query = mysql_query("SELECT pb_id FROM tbp_prestaciones_beneficiarios WHERE (pb_pre_id = '$pre_id' and pb_dp_id = '$dp_id')");
					if(mysql_num_rows($pre_query)==0){
			$text_add = "INSERT INTO tbp_prestaciones_beneficiarios (pb_pre_id, pb_dp_id) VALUES ('".$pre_id."', '".$dp_id."')";
			mysql_query($text_add);

			$dat = mysql_fetch_array(mysql_query("SELECT pb_id FROM tbp_prestaciones_beneficiarios order by pb_id desc limit 1"));
				$pb_id = $dat['pb_id'];

			 if($_POST['pt_id'] == 3){
			 	mysql_query("INSERT INTO tbp_capacitaciones (pcap_pb_id) VALUES ('$pb_id')");
			 }

			 if($_POST['pt_id'] == 5 or $_POST['pt_id'] == 10){
			 	mysql_query("INSERT INTO tbp_seg_temp (st_pb_id) VALUES ('$pb_id')");
			 }

			 if($_POST['pt_id'] == 2){
				
				$i=1;
				$aa = substr($_POST['pre_fecha'],0,4);
				$mm = substr($_POST['pre_fecha'],5,2);
				$dd = substr($_POST['pre_fecha'],8,2);

				while($i<=$_POST['pre_cuotas']){
					$fecha = $aa.'-'.$mm.'-'.$dd;
					mysql_query("INSERT INTO tbp_creditos (pcre_pb_id, pcre_cuota, pcre_fecha) VALUES ('$pb_id', '$i', '$fecha')");
					$i++;
					$mm = $mm + 1;
					if($mm == 13){
						$mm = 1;
						$aa = $aa + 1;
					}
				}
				mysql_query("UPDATE tbp_prestaciones SET pre_fecha_out = '$fecha' WHERE pre_id = '$pre_id'");
			}

		}
			header("Location: ../alta_prestacion_grupal.php?pre_id=$pre_id");
	}

	if($_POST['paso']==3){
			$pre_id = $_POST['pre_id'];
			$us_id = $_POST['us_id'];
				$pre_query = mysql_query("SELECT pu_id FROM tbp_prestaciones_usuarios WHERE (pu_pre_id = '$pre_id' and pu_us_id = '$us_id')");
					if(mysql_num_rows($pre_query)==0){
			$text_add = "INSERT INTO tbp_prestaciones_usuarios (pu_pre_id, pu_us_id) VALUES ('".$pre_id."', '".$us_id."')";
			mysql_query($text_add);
		}
			header("Location: ../alta_prestacion_grupal.php?pre_id=$pre_id");
	}
	exit();
	?>