<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
error_reporting(0);
	$totnros = strlen($_POST['coor']);
				$corte = strpos($_POST['coor'], ',');
						if(substr($_POST['coor'],0,1)=="("){
							$dom_lat = substr($_POST['coor'], 1, $corte-1);
							$dom_lng = substr($_POST['coor'], $corte + 1, ($totnros-$corte)-2);
						} else {
							$dom_lat = substr($_POST['coor'], 0, $corte);
							$dom_lng = substr($_POST['coor'], $corte + 1, ($totnros-$corte)-1);
						}
			$txt = "select ca_id, ca_name from tb_caats where (ca_min_lng <= '".$dom_lng."' and ca_max_lng >= '".$dom_lng."' and ca_min_lat <= '".$dom_lat."' and ca_max_lat >= '".$dom_lat."' and ca_id != '9')";
		$query = mysql_query($txt);
		while($dat = mysql_fetch_array($query)){
			$cc_ca_id = $dat['ca_id'];
				$txt_coor = "select cc_ca_id, cc_lng, cc_lat from tb_caats_coordenadas where (cc_ca_id = '".$cc_ca_id."')";
				$query_coor = mysql_query($txt_coor);
				// genero los puntos en dos arrays
			
					for($i=0; $i<mysql_num_rows($query_coor); $i++){
						$dat_coor = mysql_fetch_array($query_coor);
						$pos_X[$i] = $dat_coor['cc_lng'];
						$pos_Y[$i] = $dat_coor['cc_lat'];
					}
						$cortes = 0;
						
					for($j=0; $j<(mysql_num_rows($query_coor)-1); $j++){
						$h = $j+1;
							$A = ($pos_Y[$h]-$pos_Y[$j])/($pos_X[$h]-$pos_X[$j]);
							$inter_Y = ($A * ($dom_lng - $pos_X[$j])) + $pos_Y[$j];
							if(($dom_lat >= $inter_Y) and (($inter_Y >= $pos_Y[$j] and $inter_Y <= $pos_Y[$h]) or ($inter_Y >= $pos_Y[$h] and $inter_Y <= $pos_Y[$j]))){
								$cortes = $cortes + 1;
							}
					}
					if(($cortes/2) != floor($cortes/2)){
							$res = $dat['ca_id'];
						}
		}
		if(!isset($res)) $res=0;
	echo $res;
	?>