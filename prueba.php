<?php
	require_once "modelo.php";
 
	$db = new MySQL();
	$consulta = $db->consulta("SELECT bar_id FROM tb_barrios");
	if($db->num_rows($consulta)>0){
	  while($resultados = $db->fetch_array($consulta)){ 
	   echo "ID: ".$resultados['bar_id']."<br />"; 
	 }
	}
?>