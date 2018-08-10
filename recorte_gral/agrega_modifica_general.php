<?php
	require_once '_conexion.php';

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

			$userS = UsuarioSistema::find_by_uss_us_id_and_uss_sistema($_POST['us_id'], $_POST['sistema']);
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

	if($_POST['tabla']=="tb_formacion_profesional"){
		if($_POST['accion']=="A"){
			$texto = "Se agrego el curso exitosamente";
			$fp = new FormacionProfesional();
			$fp-> fp_name = strtoupper($_POST['fp_name']);
			$fp-> save();

			$bdat = FormacionProfesional::last();
			$ult = $bdat->fp_id;

			$histabla = new HistorialTabla();
			$histabla-> ht_us = $_POST['id_us'];
			$histabla-> ht_tabla = $_POST['tabla'];
			$histabla-> ht_item = $ult;
			$histabla-> ht_motivo = "Agrego";
			$histabla-> save();

		} else {
			$texto = "Se modifico el curso exitosamente";
			$fp = FormacionProfesional::find($_POST['fp_id']);
			$fp-> fp_name = strtoupper($_POST['fp_name']);
			$fp-> save();

			$histabla = new HistorialTabla();
			$histabla-> ht_us = $_POST['id_us'];
			$histabla-> ht_tabla = $_POST['tabla'];
			$histabla-> ht_item = $_POST['ts_id'];
			$histabla-> ht_motivo = "Modifico";
			$histabla-> save();
		}
	}

	if($_POST['tabla']=="tb_puestos"){
		if($_POST['accion']=="A"){
			$texto = "Se agrego el puesto exitosamente";
			$pu = new Puestos();
			$pu-> pu_name = strtoupper($_POST['pu_name']);
			$pu-> save();

			$bdat = Puestos::last();
			$ult = $bdat->pu_id;

			$histabla = new HistorialTabla();
			$histabla-> ht_us = $_POST['id_us'];
			$histabla-> ht_tabla = $_POST['tabla'];
			$histabla-> ht_item = $ult;
			$histabla-> ht_motivo = "Agrego";
			$histabla-> save();
		} else {
			$texto = "Se modifico la zona exitosamente";
			$pu = Puestos::find($_POST['pu_id']);
			$pu-> pu_name = strtoupper($_POST['pu_name']);
			$pu-> save();

			$histabla = new HistorialTabla();
			$histabla-> ht_us = $_POST['id_us'];
			$histabla-> ht_tabla = $_POST['tabla'];
			$histabla-> ht_item = $_POST['pu_id'];
			$histabla-> ht_motivo = "Modifico";
			$histabla-> save();
		}
	}

	if($_POST['tabla']=="tb_categorias"){
		if($_POST['accion']=="A"){
			$texto = "Se agrego la jerarquia exitosamente";
			$ca = new Categorias();
			$ca-> cat_name = strtoupper($_POST['cat_name']);
			$ca-> save();

			$bdat = Categorias::last();
			$ult = $bdat->cat_id;

			$histabla = new HistorialTabla();
			$histabla-> ht_us = $_POST['id_us'];
			$histabla-> ht_tabla = $_POST['tabla'];
			$histabla-> ht_item = $ult;
			$histabla-> ht_motivo = "Agrego";
			$histabla-> save();
		} else {
			$texto = "Se modifico la jerarquia exitosamente";
			$ca = Categorias::find($_POST['cat_id']);
			$ca-> cat_name = strtoupper($_POST['cat_name']);
			$ca-> save();

			$histabla = new HistorialTabla();
			$histabla-> ht_us = $_POST['id_us'];
			$histabla-> ht_tabla = $_POST['tabla'];
			$histabla-> ht_item = $_POST['cat_id'];
			$histabla-> ht_motivo = "Modifico";
			$histabla-> save();
		}
	}


	if($_POST['tabla']=="tb_cursos_externos"){
		if($_POST['accion']=="A"){
			$texto = "Se agrego el curso exitosamente";
			$feri = new CursoExterno();
			$feri-> ce_name = strtoupper($_POST['ce_name']);
			$feri-> ce_dictado = $_POST['ce_dictado'];
			$feri-> ce_ciudad = strtoupper($_POST['ce_ciudad']);
			$feri-> save();
		} else {
			$texto = "Se modifico la feria exitosamente";
			$feri = Feria::find($_POST['fe_id']);
			$feri-> fe_name = $_POST['fe_name'];
			$feri-> save();
		}
	}

	if($_POST['tabla']=="tb_actividades"){
		if($_POST['accion']=="A"){
			$texto = "Se agrego la actividad exitosamente";
			$ac = new Actividades();
			$ac-> act_name = strtoupper($_POST['act_name']);
			$ac-> save();

			$bdat = Actividades::last();
			$ult = $bdat->act_id;

			$histabla = new HistorialTabla();
			$histabla-> ht_us = $_POST['id_us'];
			$histabla-> ht_tabla = $_POST['tabla'];
			$histabla-> ht_item = $ult;
			$histabla-> ht_motivo = "Agrego";
			$histabla-> save();
		} else {
			$texto = "Se modifico la actividad exitosamente";
			$ac = Actividades::find($_POST['act_id']);
			$ac-> act_name = strtoupper($_POST['act_name']);
			$ac-> save();

			$histabla = new HistorialTabla();
			$histabla-> ht_us = $_POST['id_us'];
			$histabla-> ht_tabla = $_POST['tabla'];
			$histabla-> ht_item = $_POST['act_id'];
			$histabla-> ht_motivo = "Modifico";
			$histabla-> save();
		}
	}

	if($_POST['tabla']=="tb_calle"){
		if($_POST['accion']=="A"){
			$texto = "Se agrego la calle exitosamente";
			$ca = new Calles();
			$ca-> ca_gm = (utf8_decode($_POST['ca_gm']));
			$ca-> ca_name = strtoupper($_POST['ca_name']);
			$ca-> save();
		} else {
			$texto = "Se modifico la calle exitosamente";
			$ca = Calles::find($_POST['ca_id']);
			$ca-> ca_gm = (utf8_decode($_POST['ca_gm']));
			$ca-> ca_name = strtoupper($_POST['ca_name']);
			$ca-> save();
		}
	}
	if($_POST['tabla']=="tb_sexos"){
		if($_POST['accion']=="A"){
			$texto = "Se agrego el nuevo genero autopercibido exitosamente";
			$aup = new Autopercibido();
			$aup-> sx_name = strtoupper($_POST['sx_name']);
			$aup-> save();
		} else {
			$texto = "Se modifico la zona exitosamente";
			$zo = Zona::find($_POST['zo_id']);
			$zo-> zo_name = $_POST['zo_name'];
			$zo-> save();
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

	if($_POST['tabla']=="1100"){
		$texto = "Se modificaron los datos exitosamente";
		$capa = AntecedenteLaboral::find($_POST['al_id']);
		$capa->al_in= $_POST['al_in'];
		if(isset($_POST['al_actual'])){
			$capa->al_actual= $_POST['al_actual'];
		} else {
			$capa->al_out= $_POST['al_out'];
		}
		$capa->al_tipo_trabajo= $_POST['al_tipo_trabajo'];
		$capa->al_lugar_trabajo= $_POST['al_lugar_trabajo'];

		if(!empty($_POST['al_puesto'])){
			$pu = Puestos::find_by_pu_name($_POST['al_puesto']);
			$al_puesto = $pu->pu_id;
			$capa->al_puesto= $al_puesto;
		}

		$capa->al_categoria= $_POST['al_categoria'];

		if(!empty($_POST['al_actividad'])){
			$act = Actividades::find_by_act_name($_POST['al_actividad']);
			$al_actividad = $act->act_id;
			$capa->al_actividad= $al_actividad;
		}

		$capa->al_descripcion_puesto= $_POST['al_descripcion_puesto'];
		$capa->al_referencias= $_POST['al_referencias'];
		$capa->save();
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
			$orga-> or_depto_provincial = $_POST['or_depto_provincial'];
			$orga-> or_localidad = $_POST['or_localidad'];
			$orga-> or_calle = $_POST['or_calle'];
			$orga-> or_altura = $_POST['or_altura'];
			$orga-> or_piso = $_POST['or_piso'];
			$orga-> or_depto = $_POST['or_depto'];
			$orga-> or_cuit = $_POST['or_cuit'];
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
			$comer = Comercio::find($_POST['co_id']);
			$comer->co_name = $_POST['co_name'];
			$comer->co_depto_provincial = $_POST['co_depto_provincial'];
			$comer->co_localidad = $_POST['co_localidad'];
			$comer->co_calle = $_POST['co_calle'];
			$comer->co_altura = $_POST['co_altura'];
			$comer->co_piso = $_POST['co_piso'];
			$comer->co_depto = $_POST['co_depto'];
			$comer->co_cuit = $_POST['co_cuit'];
			$comer-> save();
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
