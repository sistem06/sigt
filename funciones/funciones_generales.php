<?php
	function BuscaRegistro ($tabla, $valor_id, $valor, $campo){
		$txt_q = "select ".$campo." from ".$tabla." where ".$valor_id."='".$valor."' LIMIT 1";
		$result = mysql_query ($txt_q);
		$ddat = mysql_fetch_array ($result);
/*SK01**	return utf8_encode ($ddat[$campo]); */
/*SK01*/	return ($ddat[$campo]);
	}

	function BuscaRegistroSu ($tabla, $valor_id, $valor, $campo){
		$txt_q = "select ".$campo." from ".$tabla." where ".$valor_id."='".$valor."' LIMIT 1";
		$result = mysql_query ($txt_q);
		$ddat = mysql_fetch_array ($result);
		return strtoupper($ddat[$campo]);
	}

	function BuscaRegistroM ($tabla, $valor_id, $valor, $campo){
		$txt_q = "select ".$campo." from ".$tabla." where ".$valor_id."='".$valor."' LIMIT 1";
		$result = mysql_query ($txt_q);
		$ddat = mysql_fetch_array ($result);
		return strtoupper($ddat[$campo]);
	}

	function BuscaRegistroDoble ($tabla, $valor_id, $valor, $valor_id1, $valor1, $campo){
		$txt_q = "select ".$campo." from ".$tabla." where ".$valor_id."='".$valor."' and ".$valor_id1."='".$valor1."' LIMIT 1";
		$result = mysql_query ($txt_q);
		$ddat = mysql_fetch_array ($result);
 		return $ddat[$campo];
	}

	function BuscaRegistroTriple ($tabla, $valor_id, $valor, $valor_id1, $valor1, $valor_id2, $valor2, $campo){
		$txt_q = "select ".$campo." from ".$tabla." where ".$valor_id."='".$valor."' and ".$valor_id1."='".$valor1."' and ".$valor_id2."='".$valor2."' LIMIT 1";
		$result = mysql_query ($txt_q);
		$ddat = mysql_fetch_array ($result);
 		return $ddat[$campo];
	}

	function NroRegistroDoble ($tabla, $valor1, $valorN1, $valor2, $valorN2){
		$txt_q = "select * from ".$tabla." where ".$valor1."='".$valorN1."' and ".$valor2."='".$valorN2."'";
		$result = mysql_query ($txt_q);
		$nro = mysql_num_rows ($result);
		return $nro;
	}

	function NroRegistroTriple ($tabla, $valor1, $valorN1, $valor2, $valorN2, $valor3, $valorN3){
		$txt_q = "select * from ".$tabla." where ".$valor1."='".$valorN1."' and ".$valor2."='".$valorN2."' and ".$valor3."='".$valorN3."'";
		$result = mysql_query ($txt_q);
		$nro = mysql_num_rows ($result);
		return $nro;
	}

	function NroRegistro4 ($tabla, $valor1, $valorN1, $valor2, $valorN2, $valor3, $valorN3, $valor4, $valorN4){
		$txt_q = "select * from ".$tabla." where ".$valor1."='".$valorN1."' and ".$valor2."='".$valorN2."' and ".$valor3."='".$valorN3."' and ".$valor4."='".$valorN4."'";
		$result = mysql_query ($txt_q);
		$nro = mysql_num_rows ($result);
		return $nro;
	}

	function NroRegistro ($tabla, $valor_id, $valor){
		$txt_q = "select * from ".$tabla." where ".$valor_id."='".$valor."'";
		$result = mysql_query ($txt_q);
		$nro = mysql_num_rows ($result);
		return $nro;
	}

	function ElUltimo ($tabla, $campo_muestra, $criterio, $conn){
	$texto = "select ".$campo_muestra." from ".$tabla." order by ".$criterio." desc LIMIT 1";
	$pul =mysqli_fetch_array(mysqli_query($conn, $texto));
	return $pul[$campo_muestra];
	}

	function fecha_dev1 ($fecha){
	$fecha = substr($fecha,5,4).'/'.substr($fecha,3,2).'/'.substr($fecha,0,2);
	return $fecha;
}
function fecha_dev ($fecha){
	$fecha = substr($fecha,8,2).'/'.substr($fecha,5,2).'/'.substr($fecha,0,4);
	return $fecha;
}

function DatoRegistro ($tabla, $campo_muestra, $campo_id, $id){
	$texto = "select ".$campo_muestra." from ".$tabla." where  ".$campo_id."=".$id;
	$pul =mysql_fetch_array(mysql_query($texto));
/*sk01** return utf8_encode ($pul[$campo_muestra]); */
/*sk01*/ return $pul[$campo_muestra];
	}

	function DatoRegistroSU ($tabla, $campo_muestra, $campo_id, $id){
	$texto = "select ".$campo_muestra." from ".$tabla." where  ".$campo_id."=".$id;
	$pul =mysql_fetch_array(mysql_query($texto));
	return $pul[$campo_muestra];
	}

	function BuscaAgregaComercio ($co_name, $co_calle, $co_nro, $co_tipo){
	$texto = "insert into tb_comercios (co_name, co_calle, co_nro, co_tipo) values ( '".$co_name."', '".$co_calle."', '".$co_nro."', '".$co_tipo."')";
	mysql_query($texto);
	$texto1 = "select co_id from tb_comercios order by co_id desc LIMIT 1";
	$pul =mysql_fetch_array(mysqli_query($texto1));
	return $pul['co_id'];
	}

	function SiNo ($valor){
		switch ($valor) {
			case 0:
			$dev = "No";
			break;

			case 1:
			$dev = "Si";
			break;
		}
		return $dev;
	}

	function SiNoM ($valor){
		$dev = "";
		switch ($valor) {
			case 0:
			$dev = "NO";
			break;

			case 1:
			$dev = "SI";
			break;
		}
		return $dev;
	}

	function TirameVive ($dp_id){
		$vive_en = BuscaRegistro ("tb_vive_beneficiario", "vb_dp_id", $dp_id, "vb_dv_id");
		if($vive_en == 3){
			$vive = TirameDomicilio ($dp_id);
		} else {
			$vive = BuscaRegistro ("tb_donde_vive", "dv_id", $vive_en, "dv_name");
		}
		return $vive;
	}

	function TirameOrigen ($dp_id){
		$divide = BuscaRegistro ("tb_102_llamados", "la_102_id", $dp_id, "la_102_relacion");
		$clave = BuscaRegistro ("tb_102_llamados", "la_102_id", $dp_id, "la_clave_ex");
		$origen = "";
		switch($divide){
			case 1:
				$origen = BuscaRegistro ("tb_datos_personales", "dp_id", $clave, "dp_name");
				break;
			case 2:
				$origen = BuscaRegistro ("tb_102_llamados_dp", "dp_102_id", $clave, "dp_102_apellido").', '.BuscaRegistro ("tb_102_llamados_dp", "dp_102_id", $clave, "dp_102_nombre");
				break;
			case 3:
				$origen = BuscaRegistro ("tb_derivaciones_102", "der_id", $clave, "der_name");
				break;
		}
		return $origen;
	}

	function TirameDomicilio ($dp_id){
		$es_hogar = BuscaRegistro ("tb_hogar_beneficiario", "hb_dp_id", $dp_id, "hb_ho_id");
		$es_nro_domicilio = BuscaRegistro ("tb_hogar", "ho_id", $es_hogar, "ho_dom_id");
		$es_domicilio = BuscaRegistro ("tb_domicilios", "dom_id", $es_nro_domicilio, "dom_domicilio");
		$es_nro_localidad = BuscaRegistro ("tb_domicilios", "dom_id", $es_nro_domicilio, "dom_localidad");
		$es_domicilio = $es_domicilio.' ('.BuscaRegistro ("tb_localidades", "lo_id", $es_nro_localidad, "lo_name").')';
		return $es_domicilio;
	}
	function TirameBarrio ($dp_id){
		$es_hogar = BuscaRegistro ("tb_hogar_beneficiario", "hb_dp_id", $dp_id, "hb_ho_id");
		$es_nro_domicilio = BuscaRegistro ("tb_hogar", "ho_id", $es_hogar, "ho_dom_id");
		$es_barrio = BuscaRegistro ("tb_domicilios", "dom_id", $es_nro_domicilio, "dom_barrio");
		if($es_barrio == 0){
			$bara = "Sin Especificar";
		} else {
			$bara = BuscaRegistro ("tb_barrios_gloc", "bar_id", $es_barrio, "bar_name");
		}
		return $bara;
	}
	function TirameCaat ($dp_id){
		$es_hogar = BuscaRegistro ("tb_hogar_beneficiario", "hb_dp_id", $dp_id, "hb_ho_id");
		$es_nro_domicilio = BuscaRegistro ("tb_hogar", "ho_id", $es_hogar, "ho_dom_id");
		$es_caat = BuscaRegistro ("tb_domicilios", "dom_id", $es_nro_domicilio, "dom_caat");
		if($es_caat == 0){
			$bara = "Sin Especificar";
		} else {
			$bara = BuscaRegistro ("tb_caats", "ca_id", $es_caat, "ca_name");
		}
		return $bara;
	}
	function TirameDomicilioNro ($dp_id){
		$es_hogar = BuscaRegistro ("tb_hogar_beneficiario", "hb_dp_id", $dp_id, "hb_ho_id");
		$es_nro_domicilio = BuscaRegistro ("tb_hogar", "ho_id", $es_hogar, "ho_dom_id");
		return $es_nro_domicilio;
	}
	function TirameDomicilioLat ($dp_id){
		$es_hogar = BuscaRegistro ("tb_hogar_beneficiario", "hb_dp_id", $dp_id, "hb_ho_id");
		$es_nro_domicilio = BuscaRegistro ("tb_hogar", "ho_id", $es_hogar, "ho_dom_id");
		$es_lat = BuscaRegistro ("tb_domicilios", "dom_id", $es_nro_domicilio, "dom_lat");
		return $es_lat;
	}
	function TirameDomicilioLng ($dp_id){
		$es_hogar = BuscaRegistro ("tb_hogar_beneficiario", "hb_dp_id", $dp_id, "hb_ho_id");
		$es_nro_domicilio = BuscaRegistro ("tb_hogar", "ho_id", $es_hogar, "ho_dom_id");
		$es_lng = BuscaRegistro ("tb_domicilios", "dom_id", $es_nro_domicilio, "dom_lng");
		return $es_lng;
	}
	function Limpiar($String){
    $String = str_replace(' ','_',$String);
    $String = str_replace('ñ','n',$String);
    $String = str_replace('ñ','n',$String);
    $String = str_replace('á','a',$String);
    $String = str_replace('é','e',$String);
    $String = str_replace('í','i',$String);
    $String = str_replace('ó','o',$String);
    $String = str_replace('ú','u',$String);
    return $String;
}
function Edad($fecha){
   $anio = substr($fecha,0,4);
	$mes = substr($fecha,5,2);
	$dia = substr($fecha,8,2);
	if ($mes < date("m")){
		$edad = date("Y") - $anio;
	} else {
		if($mes == date("m")){
			if($dia <= date("d")){
				$edad = date("Y") - $anio;
			} else {
				$edad = (date("Y") - $anio) - 1;
			}
		} else {
			$edad = (date("Y") - $anio) - 1;
		}
	}
    return $edad;
}
function BajaPrestacion(){
	$hoy = date("Y-m-d");
   mysql_query("UPDATE tbp_prestaciones_lista SET tbp_pr_activo = '1' WHERE tbp_pr_fecha_out < '$hoy'");
   mysql_query("UPDATE tbp_prestaciones_lista SET tbp_pr_activo = '0' WHERE tbp_pr_fecha_out >= '$hoy'");
}

?>
