<?php
     include("../../conecta.php");
     $txt = "UPDATE tb_datos_personales SET dp_vigente ='0' where dp_id = ".$_GET['dp_id'];
     $query = mysql_query($txt);
	header("Location:../beneficiarios.php");
?>