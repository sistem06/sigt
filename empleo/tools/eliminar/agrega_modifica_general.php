<?php
	require_once '_conexion.php';
	mysql_set_charset('utf8');
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
			$orga-> ts_name = strtoupper(utf8_decode($_POST['ts_name']));
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
			$orga-> ts_name = strtoupper(utf8_decode($_POST['ts_name']));
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
	if($_POST['tabla']=="tb_cursos_externos"){
		if($_POST['accion']=="A"){
			$texto = "Se agrego el curso exitosamente";
			$feri = new CursoExterno();
			$feri-> ce_name = strtoupper(utf8_decode($_POST['ce_name']));
			$feri-> ce_dictado = $_POST['ce_dictado'];
			$feri-> ce_ciudad = strtoupper(utf8_decode($_POST['ce_ciudad']));
			$feri-> save();
		} else {
			$texto = "Se modifico la feria exitosamente";
			$feri = Feria::find($_POST['fe_id']);
			$feri-> fe_name = $_POST['fe_name'];
			$feri-> save();
		}
	}
	if($_POST['tabla']=="tb_formacion_profesional"){
		if($_POST['accion']=="A"){
			$texto = "Se agrego el curso exitosamente";
			$fp = new FormacionProfesional();
			$fp-> fp_name = strtoupper(utf8_decode($_POST['fp_name']));
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
			$fp-> fp_name = strtoupper(utf8_decode($_POST['fp_name']));
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
			$pu-> pu_name = strtoupper(utf8_decode($_POST['pu_name']));
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
			$pu-> pu_name = strtoupper(utf8_decode($_POST['pu_name']));
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
			$ca-> cat_name = strtoupper(utf8_decode($_POST['cat_name']));
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
			$ca-> cat_name = strtoupper(utf8_decode($_POST['cat_name']));
			$ca-> save();

			$histabla = new HistorialTabla();
			$histabla-> ht_us = $_POST['id_us'];
			$histabla-> ht_tabla = $_POST['tabla'];
			$histabla-> ht_item = $_POST['cat_id'];
			$histabla-> ht_motivo = "Modifico";
			$histabla-> save();
		}
	}
	if($_POST['tabla']=="tb_actividades"){
		if($_POST['accion']=="A"){
			$texto = "Se agrego la actividad exitosamente";
			$ac = new Actividades();
			$ac-> act_name = strtoupper(utf8_decode($_POST['act_name']));
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
			$ac-> act_name = strtoupper(utf8_decode($_POST['act_name']));
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
			$ca-> ca_name = strtoupper(utf8_decode($_POST['ca_name']));
			$ca-> save();
		} else {
			$texto = "Se modifico la calle exitosamente";
			$ca = Calles::find($_POST['ca_id']);
			$ca-> ca_gm = (utf8_decode($_POST['ca_gm']));
			$ca-> ca_name = strtoupper(utf8_decode($_POST['ca_name']));
			$ca-> save();
		}
	}
	if($_POST['tabla']=="tb_sexos"){
		if($_POST['accion']=="A"){
			$texto = "Se agrego el nuevo genero autopercibido exitosamente";
			$aup = new Autopercibido();
			$aup-> sx_name = strtoupper(utf8_decode($_POST['sx_name']));
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
			$aup-> idi_name = strtoupper(utf8_decode($_POST['idi_name']));
			$aup-> save();
		} else {
			$texto = "Se modifico la zona exitosamente";
			$zo = Zona::find($_POST['zo_id']);
			$zo-> zo_name = strtoupper(utf8_decode($_POST['zo_name']));
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
			$pu = Puestos::find_by_pu_name(utf8_decode($_POST['al_puesto']));
			$al_puesto = $pu->pu_id;
			$capa->al_puesto= $al_puesto;
		}

		$capa->al_categoria= $_POST['al_categoria'];

		if(!empty($_POST['al_actividad'])){
			$act = Actividades::find_by_act_name(utf8_decode($_POST['al_actividad']));
			$al_actividad = $act->act_id;
			$capa->al_actividad= $al_actividad;
		}

		$capa->al_descripcion_puesto= $_POST['al_descripcion_puesto'];
		$capa->al_referencias= $_POST['al_referencias'];
		$capa->save();
		
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