<?php
include ("../../conecta.php");
$val = $_GET['val'];
$id = $_GET['id'];
$tabla = $_GET['tabla'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	color: #333;
	line-height: 20px;
}
.quita_acc {
	line-height: 24px;
	font-weight: bold;
	text-transform: uppercase;
	color: #FFF;
	background-color: #F00;
	text-align: center;
	width: 120px;
	margin-right: 10px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;	
}
.noquita_acc {
	line-height: 24px;
	font-weight: bold;
	text-transform: uppercase;
	color: #FFF;
	background-color: #0C0;
	text-align: center;
	width: 120px;
	margin-right: 10px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}
</style>
</head>

<body>
<?php
if (empty($_POST['accion'])){
	?>
<form action="" method="post">
<div class="pregunta">
<?php
$ttx = "select * from ".$tabla." where ".$id." = '".$val."'";


$ppre = mysql_fetch_array(mysql_query($ttx));
switch($tabla){
	
	case 'tbp_prestaciones_lista':
	$preg ="Desea quitar esta prestación?";
	break;

	case 'tbp_prestaciones_beneficiarios':
	$preg ="Desea quitar este beneficiario de esta prestación?";
	break;

	case 'tbp_prestaciones_usuarios':
	$preg ="Desea quitar este usuario de esta prestación?";
	break;
	
}
echo $preg;
?>
</div>
<input type="submit" value="remover" name="accion" class="quita_acc">
<input type="submit" value="mantener" name="accion" class="noquita_acc">
</form>
<?php
} else {
	$ttx1 = "delete from ".$tabla." where ".$id." = '".$val."'";
	if ($_POST['accion']=="remover"){
		
			
		
		if($tabla=='tbp_prestaciones_lista'){
			
				mysql_query($ttx1);
			
			}

		if($tabla=='tbp_prestaciones_beneficiarios'){
			
				mysql_query($ttx1);

				if($_GET['tipo']=='0'){
					$tx = "DELETE FROM tbp_prestaciones WHERE pre_id = ".$_GET['pre_id'];
					mysql_query($tx);
				}
			
			}

		if($tabla=='tbp_prestaciones_usuarios'){
			
				mysql_query($ttx1);
			
			}

			
		}
	
	echo ' <script type="text/javascript">
parent.jQuery.fancybox.close();
	</script>';
	
}
	?>
</body>
</html>