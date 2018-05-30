<?php
     include("../../conecta.php");
     $txt = 'SELECT ca_id,ca_name FROM tb_calle where ca_name like "%'.$_POST['busca'].'%"  LIMIT 0,10';
     $resp ="";

	$query = mysql_query($txt);
		while($dat = mysql_fetch_array($query)){
			$resp .= '<div class = "cada_elemento"><a href="" value="'.utf8_encode($dat['ca_name']).'">'.utf8_encode($dat['ca_name']).'</a></div>';
		}
	echo $resp;
?>