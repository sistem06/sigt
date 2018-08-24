<?php
	require_once '../../_conexion.php';
	if (!isset($_SESSION)) { session_start(); }
	
		$dp = DatosPersonales::find($_GET['dp_id']);
		$dp_dni = $dp->dp_nro_doc;

		$alto = new BenSistema();
	   $alto->bs_us = $_GET['id_us'];
	   $alto->bs_dni = $dp_dni;
	   $alto->bs_dp_id = $_GET['dp_id'];
	   $alto->bs_sis = $_SESSION['sistema'];
	   $alto->save();


	$prox = "../detalle_persona.php?dp_id=".$_GET['dp_id'];
   	header("location: $prox");
?>
