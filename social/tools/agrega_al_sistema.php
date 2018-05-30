<?php
	require_once '_conexion.php';

		$dp = DatosPersonales::find($_GET['dp_id']);
		$dp_dni = $dp->dp_nro_doc;

		$alto = new BenSistema();
	   $alto->bs_us = $_GET['id_us'];
	   $alto->bs_dni = $dp_dni;
	   $alto->bs_dp_id = $_GET['dp_id'];
	   $alto->bs_sis = '4';
	   $alto->save();


	$prox = "../nuevo_registro1.php?dp_id=".$_GET['dp_id'];
	$prox1 = "nuevo_registro1.php?dp_id=".$ult;

	$recor = new AltaEntrevista();
   $recor->ent_sis = '4';
   $recor->ent_fin = '0';
   $recor->ent_dp_id = $dp_dni;
   $recor->ent_proxima = $prox1;
   $recor->ent_us = $_POST['id_us'];
   $recor->save();

   	header("location: $prox");
?>