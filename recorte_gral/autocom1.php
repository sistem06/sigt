<?php
     include("../conecta.php");
     $txt = "SELECT * FROM tb_calle where ca_name = '".$_POST['busca']."'";
	$query = mysql_query($txt);
		$dat = mysql_fetch_array($query);
			echo $dat['ca_name'];
?>
