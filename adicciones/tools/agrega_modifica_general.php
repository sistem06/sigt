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

			$userS = UsuarioSistema::find_by_uss_us_id_and_uss_sistema($_POST['us_id'], 3);
			$userS-> uss_tipo = $_POST['funcion'];
			$userS-> save();
		}
	}
	if($_POST['tabla']=="tb_instituciones_cpa"){
		if($_POST['accion']=="A"){
			$texto = "Se registro la institucion exitosamente";
			$orga = new Institucion();
			$orga-> ins_name = $_POST['ins_name'];
			$orga-> ins_direccion = utf8_encode($_POST['ins_direccion']);
			$orga-> ins_contacto = utf8_encode($_POST['ins_contacto']);
			$orga-> ins_telefono = $_POST['ins_telefono'];
			$orga-> ins_mail = $_POST['ins_mail'];
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