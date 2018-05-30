<?php
     include("../../conecta.php");
     $txt = "SELECT * FROM tb_calle where ca_name = '".utf8_decode($_POST['busca'])."'";
	$query = mysql_query($txt);
		$dat = mysql_fetch_array($query);
			echo utf8_encode($dat['ca_name']);
?>