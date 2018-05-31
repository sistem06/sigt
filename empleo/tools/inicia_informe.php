<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
	if(!isset($_POST['accion'])){
	$txt = "insert into tb_informes_listado (inl_autor) values ('".$_GET['usuario']."')";
	mysql_query($txt);
	$txt1 = "select inl_id from tb_informes_listado order by inl_id desc";
	$d = mysql_fetch_array(mysql_query($txt1));
	$resp =$d['inl_id'];
	echo $resp;
    } else {
    //	echo $_POST['inl_id'];
    	$txt = "update tb_informes_listado set inl_titulo = '".utf8_decode($_POST['inl_titulo'])."' where inl_id = '". $_POST['inl_id']."'";
    	mysql_query($txt);
    	$txt = "update tb_informes_listado set inl_estado = '1' where inl_id = '". $_POST['inl_id']."'";
    	mysql_query($txt);
    	$inl_id = $_POST['inl_id'];
    	header("Location:../detalle_informe.php?inl_id=$inl_id");
    	exit();
    }
	?>