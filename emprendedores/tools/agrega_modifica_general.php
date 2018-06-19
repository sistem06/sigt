<?php
	require_once '_conexion.php';
	/*sk01** mysql_set_charset('utf8'); */
	header("Content-Type: text/html;charset=utf-8");
	if($_POST['tabla']=="tb_usuarios"){
		if($_POST['accion']=="A"){
			$texto = "Se creo el usuario exitosamente";
			$user = new Usuario();
			$user-> us_name = $_POST['usuario'];
			$user-> us_pass = md5($_POST['pass']);
			$user-> save();

			$bookii = Usuario::last();
			$ult_us = $bookii->us_id;

			$userS = new UsuarioSistema();
			$userS-> uss_us_id = $ult_us;
			$userS-> uss_sistema = $_POST['sistema'];
			$userS-> uss_tipo = $_POST['funcion'];
			$userS-> save();

		} else {
			$texto = "Se modifico el usuario exitosamente";
			$user = Usuario::find($_POST['us_id']);
			$user-> us_name = $_POST['usuario'];
			$user-> us_pass = md5($_POST['pass']);
			$user-> save();

			$userS = UsuarioSistema::find_by_uss_us_id_and_uss_sistema($_POST['us_id'], 1);
			$userS-> uss_tipo = $_POST['funcion'];
			$userS-> save();
		}
	}
	if($_POST['tabla']=="tb_titulo_secundario"){
		if($_POST['accion']=="A"){
			$texto = "Se agrego el titulo exitosamente";
			$orga = new TituloEducativo();
			$orga-> ts_name = strtoupper($_POST['ts_name']);
			$orga-> ts_nivel = $_POST['ts_nivel'];
			$orga-> save();

			$bdat = TituloEducativo::last();
			$ult = $bdat->ts_id;

			$histabla = new HistorialTabla();
			$histabla-> ht_us = $_POST['id_us'];
			$histabla-> ht_tabla = $_POST['tabla'];
			$histabla-> ht_item = $ult;
			$histabla-> ht_motivo = "Agrego";
			$histabla-> save();
		} else {
			$texto = "Se modifico la carrera exitosamente";
			$orga = TituloEducativo::find($_POST['ts_id']);
			$orga-> ts_name = strtoupper($_POST['ts_name']);
			$orga-> ts_nivel = $_POST['ts_nivel'];
			$orga-> save();

			$histabla = new HistorialTabla();
			$histabla-> ht_us = $_POST['id_us'];
			$histabla-> ht_tabla = $_POST['tabla'];
			$histabla-> ht_item = $_POST['ts_id'];
			$histabla-> ht_motivo = "Modifico";
			$histabla-> save();
		}
	}
	if($_POST['tabla']=="tb_idiomas"){
		if($_POST['accion']=="A"){
			$texto = "Se agrego el idioma exitosamente";
			$aup = new IdiomasAdd();
			$aup-> idi_name = strtoupper($_POST['idi_name']);
			$aup-> save();
		} else {
			$texto = "Se modifico la zona exitosamente";
			$zo = Zona::find($_POST['zo_id']);
			$zo-> zo_name = strtoupper($_POST['zo_name']);
			$zo-> save();
		}
	}
	if($_POST['tabla']=="tb_organizaciones"){
		if($_POST['accion']=="A"){
			$texto = "Se registro la organizacion exitosamente";
			$orga = new Organizacion();
			$orga-> or_name = $_POST['or_name'];
			$orga-> or_depto_provincial = $_POST['or_depto_provincial'];
			$orga-> or_localidad = $_POST['or_localidad'];
			$orga-> or_calle = $_POST['or_calle'];
			$orga-> or_altura = $_POST['or_altura'];
			$orga-> or_piso = $_POST['or_piso'];
			$orga-> or_depto = $_POST['or_depto'];
			$orga-> or_cuit = $_POST['or_cuit'];
			$orga-> save();
		} else {
			$texto = "Se modifico la organizacion exitosamente";
			$orga = Organizacion::find($_POST['or_id']);
			$orga-> or_name = $_POST['or_name'];
			$orga-> save();
		}
	}
	if($_POST['tabla']=="tb_ferias"){
		if($_POST['accion']=="A"){
			$texto = "Se registro la feria exitosamente";
			$feri = new Feria();
			$feri-> fe_name = $_POST['fe_name'];
			if($_POST['fe_municipal']==1){
				$feri-> fe_municipal = 1;
			}
			$feri-> save();
		} else {
			$texto = "Se modifico la feria exitosamente";
			$feri = Feria::find($_POST['fe_id']);
			$feri-> fe_name = $_POST['fe_name'];
			if(isset($_POST['fe_municipal']) && $_POST['fe_municipal'] == 1){
				$feri-> fe_municipal = 1;
			} else {
				$feri-> fe_municipal = 0;
			}
			$feri-> save();
		}
	}
	if($_POST['tabla']=="tb_zonas"){
		if($_POST['accion']=="A"){
			$texto = "Se agrego la zona exitosamente";
			$zo = new Zona();
			$zo-> zo_name = $_POST['zo_name'];
			$zo-> save();
		} else {
			$texto = "Se modifico la zona exitosamente";
			$zo = Zona::find($_POST['zo_id']);
			$zo-> zo_name = $_POST['zo_name'];
			$zo-> save();
		}
	}

	if($_POST['tabla']=="tb_comercios"){
		if($_POST['accion']=="A"){
			$texto = "Se agrego el comercio exitosamente";
			$comer = new Comercio();
		$comer->co_name = $_POST['co_name'];
		$comer->co_depto_provincial = $_POST['co_depto_provincial'];
		$comer->co_localidad = $_POST['co_localidad'];
		$comer->co_calle = $_POST['co_calle'];
		$comer->co_altura = $_POST['co_altura'];
		$comer->co_piso = $_POST['co_piso'];
		$comer->co_depto = $_POST['co_depto'];
		$comer->co_cuit = $_POST['co_cuit'];
		$comer->co_dp_id = $_POST['co_dp_id'];
		$comer->co_tipo = "P";
		$comer->save();
		} else {
			$texto = "Se modifico el comercio exitosamente";
			$zo = Zona::find($_POST['zo_id']);
			$zo-> zo_name = $_POST['zo_name'];
			$zo-> save();
		}
	}

	if($_POST['tabla']=="tb_tipo_capacitaciones"){
		if($_POST['accion']=="A"){
			$texto = "Se agrego el motivo de capacitación exitosamente";
			$moca = new MotivoCapacitacion();
			$moca-> tc_name = $_POST['tc_name'];
			$moca-> save();
		} else {
			$texto = "Se modifico la zona exitosamente";
			$moca = MotivoCapacitacion::find($_POST['tc_id']);
			$moca-> tc_name = $_POST['tc_name'];
			$moca-> save();
		}
	}

	if($_POST['tabla']=="tb_motivo_credito"){
		if($_POST['accion']=="A"){
			$texto = "Se agrego el motivo del crédito exitosamente";
			$mocre = new MotivoCredito();
			$mocre-> mc_name = $_POST['mc_name'];
			$mocre-> save();
		} else {
			$texto = "Se modifico la zona exitosamente";
			$mocre = MotivoCapacitacion::find($_POST['tc_id']);
			$mocre-> tc_name = $_POST['tc_name'];
			$mocre-> save();
		}
	}
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
