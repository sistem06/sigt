<?php
	function ActualizaEstado ($sistema){
		$hoy = date("Y-m-d");
		$tx ="UPDATE tbp_capacitaciones INNER JOIN tbp_prestaciones_beneficiarios ON tbp_capacitaciones.pcap_pb_id = tbp_prestaciones_beneficiarios.pb_id INNER JOIN tbp_prestaciones ON tbp_prestaciones_beneficiarios.pb_pre_id = tbp_prestaciones.pre_id INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones.pre_pr_id = tbp_prestaciones_lista.tbp_pr_id SET tbp_capacitaciones.pbcap_estado = '2'  WHERE (tbp_capacitaciones.pbcap_estado = '0' and tbp_prestaciones.pre_fecha_out <= '$hoy' and tbp_prestaciones_lista.tbp_pt_id = '3' and tbp_prestaciones_lista.tbp_sis_id = '$sistema')";
		mysql_query($tx);

		$tx ="UPDATE tbp_prestaciones_beneficiarios INNER JOIN tbp_prestaciones ON tbp_prestaciones_beneficiarios.pb_pre_id = tbp_prestaciones.pre_id INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones.pre_pr_id = tbp_prestaciones_lista.tbp_pr_id SET tbp_prestaciones_beneficiarios.pb_state = '2'  WHERE (tbp_prestaciones_beneficiarios.pb_state = '0' and tbp_prestaciones.pre_fecha_out <= '$hoy' and tbp_prestaciones_lista.tbp_pt_id = '3' and tbp_prestaciones_lista.tbp_sis_id = '$sistema')";
		mysql_query($tx);

		$tx ="UPDATE tbp_capacitaciones INNER JOIN tbp_prestaciones_beneficiarios ON tbp_capacitaciones.pcap_pb_id = tbp_prestaciones_beneficiarios.pb_id INNER JOIN tbp_prestaciones ON tbp_prestaciones_beneficiarios.pb_pre_id = tbp_prestaciones.pre_id INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones.pre_pr_id = tbp_prestaciones_lista.tbp_pr_id SET tbp_capacitaciones.pbcap_estado = '3'  WHERE (tbp_capacitaciones.pbcap_estado = '0' and tbp_prestaciones.pre_fecha_out > '$hoy' and tbp_prestaciones_lista.tbp_pt_id = '3' and tbp_prestaciones_lista.tbp_sis_id = '$sistema')";
		mysql_query($tx);

		$tx ="UPDATE tbp_prestaciones_beneficiarios INNER JOIN tbp_prestaciones ON tbp_prestaciones_beneficiarios.pb_pre_id = tbp_prestaciones.pre_id INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones.pre_pr_id = tbp_prestaciones_lista.tbp_pr_id SET  tbp_prestaciones_beneficiarios.pb_state = '3'  WHERE (tbp_prestaciones_beneficiarios.pb_state = '0' and tbp_prestaciones.pre_fecha_out > '$hoy' and tbp_prestaciones_lista.tbp_pt_id = '3' and tbp_prestaciones_lista.tbp_sis_id = '$sistema')";
		mysql_query($tx);

		$tx ="UPDATE tbp_seg_temp INNER JOIN tbp_prestaciones_beneficiarios ON tbp_seg_temp.st_pb_id = tbp_prestaciones_beneficiarios.pb_id INNER JOIN tbp_prestaciones ON tbp_prestaciones_beneficiarios.pb_pre_id = tbp_prestaciones.pre_id INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones.pre_pr_id = tbp_prestaciones_lista.tbp_pr_id SET tbp_seg_temp.st_estado = '2' WHERE (tbp_seg_temp.st_estado = '0' and tbp_prestaciones.pre_fecha_out <= '$hoy' and (tbp_prestaciones_lista.tbp_pt_id = '5' or tbp_prestaciones_lista.tbp_pt_id = '10' or tbp_prestaciones_lista.tbp_pt_id = '11') and tbp_prestaciones_lista.tbp_sis_id = '$sistema')";
		mysql_query($tx);

		$tx ="UPDATE tbp_prestaciones_beneficiarios INNER JOIN tbp_prestaciones ON tbp_prestaciones_beneficiarios.pb_pre_id = tbp_prestaciones.pre_id INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones.pre_pr_id = tbp_prestaciones_lista.tbp_pr_id SET tbp_prestaciones_beneficiarios.pb_state = '2' WHERE (tbp_prestaciones_beneficiarios.pb_state = '0' and tbp_prestaciones.pre_fecha_out <= '$hoy' and (tbp_prestaciones_lista.tbp_pt_id = '5' or tbp_prestaciones_lista.tbp_pt_id = '10' or tbp_prestaciones_lista.tbp_pt_id = '11') and tbp_prestaciones_lista.tbp_sis_id = '$sistema')";
		mysql_query($tx);

		$tx ="UPDATE tbp_seg_temp INNER JOIN tbp_prestaciones_beneficiarios ON tbp_seg_temp.st_pb_id = tbp_prestaciones_beneficiarios.pb_id INNER JOIN tbp_prestaciones ON tbp_prestaciones_beneficiarios.pb_pre_id = tbp_prestaciones.pre_id INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones.pre_pr_id = tbp_prestaciones_lista.tbp_pr_id SET tbp_seg_temp.st_estado = '3' WHERE (tbp_seg_temp.st_estado = '0' and tbp_prestaciones.pre_fecha_out > '$hoy' and (tbp_prestaciones_lista.tbp_pt_id = '5' or tbp_prestaciones_lista.tbp_pt_id = '10' or tbp_prestaciones_lista.tbp_pt_id = '11') and tbp_prestaciones_lista.tbp_sis_id = '$sistema')";
		mysql_query($tx);

		$tx ="UPDATE tbp_prestaciones_beneficiarios INNER JOIN tbp_prestaciones ON tbp_prestaciones_beneficiarios.pb_pre_id = tbp_prestaciones.pre_id INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones.pre_pr_id = tbp_prestaciones_lista.tbp_pr_id SET  tbp_prestaciones_beneficiarios.pb_state = '3' WHERE (tbp_prestaciones_beneficiarios.pb_state = '0' and tbp_prestaciones.pre_fecha_out > '$hoy' and (tbp_prestaciones_lista.tbp_pt_id = '5' or tbp_prestaciones_lista.tbp_pt_id = '10' or tbp_prestaciones_lista.tbp_pt_id = '11') and tbp_prestaciones_lista.tbp_sis_id = '$sistema')";
		mysql_query($tx);

		$tx ="UPDATE tbp_seg_temp INNER JOIN tbp_prestaciones_beneficiarios ON tbp_seg_temp.st_pb_id = tbp_prestaciones_beneficiarios.pb_id INNER JOIN tbp_prestaciones ON tbp_prestaciones_beneficiarios.pb_pre_id = tbp_prestaciones.pre_id INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones.pre_pr_id = tbp_prestaciones_lista.tbp_pr_id SET tbp_seg_temp.st_estado = '2' WHERE (tbp_seg_temp.st_estado = '0' and tbp_prestaciones_lista.tbp_pt_id = '4' and tbp_prestaciones_lista.tbp_sis_id = '$sistema')";
		mysql_query($tx);

		$tx ="UPDATE tbp_prestaciones_beneficiarios INNER JOIN tbp_prestaciones ON tbp_prestaciones_beneficiarios.pb_pre_id = tbp_prestaciones.pre_id INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones.pre_pr_id = tbp_prestaciones_lista.tbp_pr_id SET  tbp_prestaciones_beneficiarios.pb_state = '2' WHERE (tbp_prestaciones_beneficiarios.pb_state = '0' and tbp_prestaciones_lista.tbp_pt_id = '4' and tbp_prestaciones_lista.tbp_sis_id = '$sistema')";
		mysql_query($tx);

		$txc = "SELECT * FROM tbp_prestaciones_beneficiarios INNER JOIN tbp_prestaciones ON tbp_prestaciones_beneficiarios.pb_pre_id = tbp_prestaciones.pre_id INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones.pre_pr_id = tbp_prestaciones_lista.tbp_pr_id WHERE (tbp_prestaciones_lista.tbp_pt_id = '2' and tbp_prestaciones_lista.tbp_sis_id = '$sistema' and tbp_prestaciones_beneficiarios.pb_state != '9')";

		$queryc = mysql_query($txc);

			while($datc = mysql_fetch_array($queryc)){
				$pcre_pb_id = $datc['pb_id'];
				$query1 = mysql_query("SELECT pcre_id FROM tbp_creditos WHERE pcre_pb_id = '$pcre_pb_id' and pcre_estado = '0' ");
				if(mysql_num_rows($query1)==0){
					$clave = 9;
				} else {
					$query2 = mysql_query("SELECT pcre_id FROM tbp_creditos WHERE pcre_pb_id = '$pcre_pb_id' and pcre_estado = '0' and pcre_fecha < '$hoy'");
					if(mysql_num_rows($query2) >= 3){
						if(mysql_num_rows($query2) >= 6){
							$clave = 5;
						} else {
							$clave = 6;
						}
					} else {
						$clave = 3;
					}
				}
				mysql_query("UPDATE tbp_prestaciones_beneficiarios SET pb_state = '$clave' WHERE pb_id = '$pcre_pb_id'");
			}
	}

	function RetornaEstado ($pb_id, $tipo){
		/*if($tipo == 3 or $tipo == 11 or $tipo == 10 or $tipo == 4 or $tipo == 5 or $tipo == 2){
			if($tipo == 2){
				$query1 = mysql_query("SELECT pcre_id FROM tbp_creditos WHERE pcre_pb_id = '$pb_id' and pcre_estado = '0' ");
				if(mysql_num_rows($query1)==0){
					$clave = 9;
				} else {
					$hoy = date("Y-m-d");
					$query2 = mysql_query("SELECT pcre_id FROM tbp_creditos WHERE pcre_pb_id = '$pb_id' and pcre_estado = '0' and pcre_fecha < '$hoy'");
					if(mysql_num_rows($query2) >= 3){
						if(mysql_num_rows($query2) >= 6){
							$clave = 5;
						} else {
							$clave = 6;
						}
					} else {
						$clave = 3;
					}
				}
			}

			if($tipo == 3){
			$dat = mysql_fetch_array(mysql_query("SELECT pbcap_estado FROM tbp_capacitaciones WHERE pcap_pb_id = '$pb_id'"));
				$clave = $dat['pbcap_estado'];
			}

			if($tipo == 11 or $tipo == 10  or $tipo == 4 or $tipo == 5){
			$dat = mysql_fetch_array(mysql_query("SELECT st_estado FROM tbp_seg_temp WHERE st_pb_id = '$pb_id'"));
				$clave = $dat['st_estado'];
			}*/
			$clave = BuscaRegistro("tbp_prestaciones_beneficiarios","pb_id",$pb_id,"pb_state");
			switch ($clave) {
				case '3':
					echo '<td><span style="color:#46C12D; border: solid 1px #46C12D; padding: 5px;">EN CURSO</span></td>';
					break;

				case '2':
					echo '<td><span style="color:#EE3424; border: solid 1px #EE3424; padding: 5px;">PENDIENTE</span></td>';
					break;			

				case '9':
					echo '<td><span style="color:#fff; background: #3B7DC8; padding: 5px;">FINALIZADO</span></td>';
					break;

				case '4':
					echo '<td><span style="color:#fff; background: #EE3424; padding: 5px;">BAJA</span></td>';
					break;	

				case '5':
					echo '<td><span style="color:#fff; background: #EE3424; padding: 5px;">INCOBRABLE</span></td>';
					break;

				case '6':
					echo '<td><span style="color:#EE3424; border: solid 1px #EE3424; padding: 5px;">MOROSO</span></td>';
					break;
			}
	/*	} else {
			echo '<td><span style="color:#3B7DC8; border: solid 1px #3B7DC8; padding: 5px;">FINALIZADO</span></td>';
		}*/
	}

	function LinkEstado ($pb_id, $tipo){
		switch ($tipo) {
				case '2':
					echo '<a href="tools/mod_creditos.php?pb_id='.$pb_id.'" class="fancybox fancybox.iframe"><button type="button" class="btn btn-success btn-sm">
    <span class="glyphicon glyphicon-list"></span></button></a>';
					break;

				case '3':
					echo '<a href="tools/mod_capacitacion.php?pb_id='.$pb_id.'" class="fancybox fancybox.iframe"><button type="button" class="btn btn-success btn-sm">
    <span class="glyphicon glyphicon-list"></span></button></a>';
					break;
			
			case '5':
					echo '<a href="tools/mod_seg_temp.php?pb_id='.$pb_id.'" class="fancybox fancybox.iframe"><button type="button" class="btn btn-success btn-sm">
    <span class="glyphicon glyphicon-list"></span></button></a>';
					break;

			case '10':
					echo '<a href="tools/mod_seg_temp.php?pb_id='.$pb_id.'" class="fancybox fancybox.iframe"><button type="button" class="btn btn-success btn-sm">
    <span class="glyphicon glyphicon-list"></span></button></a>';
					break;

			case '11':
					echo '<a href="tools/mod_seg_temp.php?pb_id='.$pb_id.'" class="fancybox fancybox.iframe"><button type="button" class="btn btn-success btn-sm">
    <span class="glyphicon glyphicon-list"></span></button></a>';
					break;
			}

	}
?>