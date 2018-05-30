<?php
	require_once '_conexion.php';

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

			$userS = UsuarioSistema::find_by_uss_us_id_and_uss_sistema($_POST['us_id'], 4);
			$userS-> uss_tipo = $_POST['funcion'];
			$userS-> save();
		}
	}
	if($_POST['tabla']=="tb_obras_sociales"){
		if($_POST['accion']=="A"){
			$texto = "Se agrego la obra social exitosamente";
			$orga = new ObraSocial();
			$orga-> os_name = $_POST['os_name'];
			$orga-> os_location = $_POST['os_location'];
			$orga-> os_telefonos = $_POST['os_telefonos'];
			$orga-> save();
		} else {
			$texto = "Se modifico la organizacion exitosamente";
			$orga = Organizacion::find($_POST['or_id']);
			$orga-> or_name = $_POST['or_name'];
			$orga-> save();
		}
	}
	if($_POST['tabla']=="tb_cursos_externos"){
		if($_POST['accion']=="A"){
			$texto = "Se agrego el curso exitosamente";
			$feri = new CursoExterno();
			$feri-> ce_name = $_POST['ce_name'];
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
			$fp-> fp_name = $_POST['fp_name'];
			$fp-> save();
		} else {
			$texto = "Se modifico la zona exitosamente";
			$zo = Zona::find($_POST['zo_id']);
			$zo-> zo_name = $_POST['zo_name'];
			$zo-> save();
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