<?php
session_start(); 
include("conecta.php");
include ("funciones/funciones_generales.php");
$id_us = $_SESSION["id_us"]; 
$us_sistema = $_SESSION["sistema"];
$motivo = "Cerro Sesion en ".BuscaRegistro ("tb_sistemas", "sis_id", $us_sistema, "sis_name");
mysql_query("insert into tb_historial (hi_us_id, hi_detalle) values ('$id_us','$motivo')");
mysql_query("update tb_usuarios_sistemas set uss_conectado = 0 where uss_id ='$id_us' and uss_sistema = '$us_sistema'");
session_destroy();
header("Location:index.php");
exit();
?>