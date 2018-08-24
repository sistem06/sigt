<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
	echo NroRegistro ($_GET['tabla'], $_GET['valorbusc'], $_GET['dnii']);
	?>