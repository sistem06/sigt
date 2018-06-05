<?php
/*sk01** error_reporting(0); */
include ("conecta.php");
include ("funciones/funciones_generales.php");
$usuario=$_POST['usuario'];
$clave=  md5 ($_POST['clave']);
if (empty($usuario) or empty($clave)){
header ("location: index.php?error=1");
exit();
} else {
	$uv = mysql_query("select * from tb_usuarios where ((us_name='$usuario') and (us_pass='$clave'))");
	$nu = mysql_num_rows($uv);
	if ($nu==0){
	header("Location:index.php?error=1");
	exit();
	} else {
		$dat=mysql_fetch_array($uv);
		$id_us=$dat['us_id'];

		$uv1 = mysql_query("select * from tb_usuarios_sistemas where uss_us_id = '$id_us' order by uss_tipo asc");
		$dat1=mysql_fetch_array($uv1);

		$sector=$dat1['uss_tipo'];
		$us_sistema=$dat1['uss_sistema'];
		session_start();
		$_SESSION["autenticado"] = 'si';
		$_SESSION["usuario"] = $usuario;
		$_SESSION["sector"] = $sector;
		$_SESSION["id_us"] = $id_us;
		$_SESSION["sistema"] = $us_sistema;

		$motivo = "Inicio Sesion en ".BuscaRegistro ("tb_sistemas", "sis_id", $us_sistema, "sis_name");
		mysql_query("insert into tb_historial (hi_us_id, hi_detalle) values ('$id_us','$motivo')");
			include("listado_sistemas.php");
		mysql_query("update tb_usuarios_sistemas set uss_conectado = 1 where uss_us_id = '$id_us' and uss_sistema = '$us_sistema'");
		header("Location:$dir");
		exit();
	}
}
?>
