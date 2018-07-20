<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
	$pt_id = BuscaRegistro("tbp_prestaciones_lista","tbp_pr_id",$_GET['busca'],"tbp_pt_id");
	echo $pt_id;
	?>