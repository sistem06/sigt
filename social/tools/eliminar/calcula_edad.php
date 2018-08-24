<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
	$anio = substr($_GET['fecha_in'],0,4);
	$mes = substr($_GET['fecha_in'],5,2);
	$dia = substr($_GET['fecha_in'],8,2);
	if ($mes < date("m")){
		$edad = date("Y") - $anio;
	} else {
		if($mes == date("m")){
			if($dia <= date("d")){
				$edad = date("Y") - $anio;
			} else {
				$edad = (date("Y") - $anio) - 1;
			}
		} else {
			$edad = (date("Y") - $anio) - 1;
		}
	}
	echo $edad;
	?>