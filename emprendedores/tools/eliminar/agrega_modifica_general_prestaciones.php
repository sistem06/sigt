<?php
	include ("../../conecta.php");
	mysql_set_charset('utf8');
	header("Content-Type: text/html;charset=utf-8");
	
	if($_POST['tabla']=="tbp_prestaciones_lista"){

			if(isset($_POST['tbp_in_compartida'])){ $tbp_in_compartida = 1; } else { $tbp_in_compartida = 0; }

		if($_POST['accion']=="A"){
			
			if($_POST['tipo'] != "" and $_POST['tbp_pr_name'] != ""){
			$texto = "Se creo la prestación exitosamente";
			$txt = "INSERT INTO tbp_prestaciones_lista (tbp_pt_id, tbp_pr_name, tbp_sis_id, tbp_in_compartida) VALUES ('".$_POST['tipo']."', '".$_POST['tbp_pr_name']."', '".$_POST['sistema']."', '".$tbp_in_compartida."')";
			mysql_query($txt);
			}
		} else {
			if($_POST['tipo'] != "" and $_POST['tbp_pr_name'] != ""){
			$texto = "Se modifico la prestación exitosamente";
			$txt = "UPDATE tbp_prestaciones_lista SET tbp_pt_id = '".$_POST['tipo']."' where tbp_pr_id = '".$_POST['tbp_pr_id']."'";
			mysql_query($txt);
			$txt = "UPDATE tbp_prestaciones_lista SET tbp_pr_name = '".$_POST['tbp_pr_name']."' where tbp_pr_id = '".$_POST['tbp_pr_id']."'";
			mysql_query($txt);
			$txt = "UPDATE tbp_prestaciones_lista SET tbp_in_compartida = '".$tbp_in_compartida."' where tbp_pr_id = '".$_POST['tbp_pr_id']."'";
			mysql_query($txt);
		}
		}
	}
	?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div style="color:#468E2F; font-size: 20px; text-align: center;"><?php echo $texto; ?></div>
</body>
</html>
<script type="text/javascript">
	function cierra(){
parent.jQuery.fancybox.close();
}
setTimeout("cierra()",3000)

	</script>