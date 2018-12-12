<?php
     include ("../../conecta.php");
     $txt = "SELECT * FROM tbp_creditos WHERE pcre_id = ".$_GET['este'];
     $dd = mysql_fetch_array(mysql_query($txt));

     if($dd['pcre_estado']==0){
     	$tx = "UPDATE tbp_creditos SET pcre_estado = '1' WHERE pcre_id = ".$_GET['este'];
     	mysql_query($tx);
     } else {
     	$tx = "UPDATE tbp_creditos SET pcre_estado = '0' WHERE pcre_id = ".$_GET['este'];
     	mysql_query($tx);
     }
?>
