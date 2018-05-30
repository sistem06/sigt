<?php
include("conecta.php");
include ("funciones/funciones_generales.php");
session_start();
	$us_sistema=$_SESSION["sistema"];
	$id_us=$_SESSION["id_us"];
	$usuario =  $_SESSION["usuario"];
	$motivo = "Cerro Sesion en ".BuscaRegistro ("tb_sistemas", "sis_id", $us_sistema, "sis_name");
	mysql_query("insert into tb_historial (hi_us_id, hi_detalle) values ('$id_us','$motivo')");
	mysql_query("update tb_usuarios_sistemas set uss_conectado = 0 where uss_us_id = '$id_us' and uss_sistema = '$us_sistema'");
	session_destroy();


	$us_sistema=$_GET['sis_id'];
	$uv1 = mysql_query("select * from tb_usuarios_sistemas where uss_us_id = '$id_us' and uss_sistema = '$us_sistema'");
	$dat1=mysql_fetch_array($uv1);
	$sector=$dat1['uss_tipo'];
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
?>