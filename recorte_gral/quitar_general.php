<?php
include ("../conecta.php");
$val = $_GET['val'];
$id = $_GET['id'];
$tabla = $_GET['tabla'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	color: #333;
	line-height: 20px;
}
.quita_acc {
	line-height: 24px;
	font-weight: bold;
	text-transform: uppercase;
	color: #FFF;
	background-color: #F00;
	text-align: center;
	width: 120px;
	margin-right: 10px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}
.noquita_acc {
	line-height: 24px;
	font-weight: bold;
	text-transform: uppercase;
	color: #FFF;
	background-color: #0C0;
	text-align: center;
	width: 120px;
	margin-right: 10px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}
</style>
</head>

<body>
<?php
if (empty($_POST['accion'])){
	?>
<form action="" method="post">
<div class="pregunta">
<?php
$ttx = "select * from ".$tabla." where ".$id." = '".$val."'";


$ppre = mysql_fetch_array(mysql_query($ttx));
switch($tabla){
	case 'tb_usuarios':
	$id_us = $val;
	$preg ="Desea quitar el usuario <b>".$ppre['us_name']."</b> ?";
	break;

	case 'tb_datos_nivel_educativo':
	$preg ="Desea quitar este dato educativo?";
	break;

	case 'tb_beneficiario_curso_externo':
	$preg ="Desea quitar este curso de este beneficiario?";
	break;

	case 'tb_beneficiario_formacion_profesional':
	$preg ="Desea quitar este curso de formacion profesional de este beneficiario?";
	break;

	case 'tb_organizaciones':
	$ttx2 = "select * from ".$tabla." where ".$id." = '".$val."'";
	$ppre = mysql_fetch_array(mysql_query($ttx2));
	$preg ="Desea quitar la organización <b>".$ppre['or_name']."</b> ?";
	break;

	case 'tb_antecedentes_laborales':
	$preg ="Desea quitar este antecedente laboral ?";
	break;

	case 'tb_titulo_secundario':
	$preg ="Desea quitar este Titulo ?";
	break;

	case 'tb_formacion_profesional':
	$preg ="Desea quitar este Curso ?";
	break;

	case 'tb_actividades':
	$preg ="Desea quitar esta actividad ?";
	break;

	case 'tb_puestos':
	$preg ="Desea quitar este puesto ?";
	break;

	case 'tb_categorias':
	$preg ="Desea quitar esta Jerarquia ?";
	break;

	case 'tb_licencias_beneficiario':
	$preg ="Desea quitar esta licencia?</b> ?";
	break;

	case 'tb_beneficiario_idioma':
	$preg ="Desea quitar el dato de este idioma?";
	break;

	case 'tb_postulaciones_laborales':
	$preg ="Desea quitar esta postulacion laboral?";
	break;

	case 'tb_postulaciones_cursos':
	$preg ="Desea quitar esta postulacion al curso?";
	break;

	case 'tb_hogar_beneficiario':
	$preg ="Desea quitar a este miembro del hogar?";
	break;

	case 'tb_imagenes':
	$preg ="Desea quitar esta imagen?";
	break;

}
echo $preg;
?>
</div>
<input type="submit" value="remover" name="accion" class="quita_acc">
<input type="submit" value="mantener" name="accion" class="noquita_acc">
</form>
<?php
} else {
	$ttx1 = "delete from ".$tabla." where ".$id." = '".$val."'";
	if ($_POST['accion']=="remover"){

			if($tabla=='tb_usuarios'){
				$txt_1 = "select * from tb_usuarios_sistemas where uss_us_id = ".$val;
				$n_us = mysql_num_rows(mysql_query($txt_1));
				if($n_us == 1){
		//		mysql_query($ttx1);
				$txt_2 = "delete from tb_usuarios_sistemas where uss_us_id = '".$val."' and uss_sistema = '".$_GET['sis']."'";
				mysql_query($txt_2);
			} else {
				$txt_2 = "delete from tb_usuarios_sistemas where uss_us_id = '".$val."' and uss_sistema = '".$_GET['sis']."'";
				mysql_query($txt_2);
			}
			}


		if($tabla=='tb_datos_nivel_educativo'){

				mysql_query($ttx1);

			}

		if($tabla=='tb_organizaciones'){

				mysql_query($ttx1);

			}

		if($tabla=='tb_postulaciones_laborales'){

				mysql_query($ttx1);

			}

		if($tabla=='tb_postulaciones_cursos'){

				mysql_query($ttx1);

			}

			if($tabla=='tb_beneficiario_idioma'){

				mysql_query($ttx1);

			}

			if($tabla=='tb_licencias_beneficiario'){

				mysql_query($ttx1);

			}

			if($tabla=='tb_titulo_secundario'){
				mysql_query($ttx1);
			}

			if($tabla=='tb_formacion_profesional'){
				mysql_query($ttx1);
			}

			if($tabla=='tb_actividades'){
				mysql_query($ttx1);
			}

			if($tabla=='tb_puestos'){
				mysql_query($ttx1);
			}

			if($tabla=='tb_categorias'){
				mysql_query($ttx1);
			}

			if($tabla=='tb_beneficiario_curso_externo'){
				mysql_query($ttx1);
			}

			if($tabla=='tb_beneficiario_formacion_profesional'){
				mysql_query($ttx1);
			}

			if($tabla=='tb_antecedentes_laborales'){
				mysql_query($ttx1);
			}

			if($tabla=='tb_hogar_beneficiario'){
				mysql_query($ttx1);
			}
			if($tabla=='tb_imagenes'){
				$ttx2 = "delete from ".$tabla." where img_dp_id = '".$val."'";
				mysql_query("$ttx2");
				unlink("../imagenes/dni_".$val.".jpg");
				unlink("../imagenes/dni_th_".$val.".jpg");
			}


		}

	echo ' <script type="text/javascript">
parent.jQuery.fancybox.close();
	</script>';

}
	?>
</body>
</html>
