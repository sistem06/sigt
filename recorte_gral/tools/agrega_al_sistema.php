<?php
	require_once '../../_conexion.php';

		$dp = DatosPersonales::find($_GET['dp_id']);
		$dp_dni = $dp->dp_nro_doc;

		$alto = new BenSistema();
	   $alto->bs_us = $_GET['id_us'];
	   $alto->bs_dni = $dp_dni;
	   $alto->bs_dp_id = $_GET['dp_id'];
	   $alto->bs_sis = '1';
	   $alto->save();


	$prox = "../detalle_persona.php?dp_id=".$_GET['dp_id'];
   	header("location: $prox");
?>
