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

			$userS = UsuarioSistema::find_by_uss_us_id_and_uss_sistema($_POST['us_id'], 5);
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
?>
<div style="color:#468E2F; font-size: 20px; text-align: center;"><?php echo $texto; ?></div>
<script type="text/javascript">
	function cierra(){
parent.jQuery.fancybox.close();
}
setTimeout("cierra()",3000)

	</script>