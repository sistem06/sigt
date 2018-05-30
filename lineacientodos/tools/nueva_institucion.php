<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
		$txt = "insert into tb_derivaciones_102 (der_name, der_es) values ('".$_POST['nuevo_val']."','0')";
		$query = mysql_query($txt);
		echo $_POST['nuevo_val'];
	?>