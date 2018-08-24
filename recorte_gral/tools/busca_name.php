<?php
include ("../../conecta.php");
$txt = "SELECT tbp_pr_id FROM tbp_prestaciones_lista where (tbp_pr_name = '".$_GET['nom']."' and tbp_pr_id != '".$_GET['id']."')";
	$n = mysql_num_rows(mysql_query($txt));
          echo $n;
	?>