<?php
include("secure.php");
include ("../conecta.php");
include ("../funciones/funciones_generales.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Prueba consulta	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/estilos_ss.css">
  <link rel="stylesheet" type="text/css" href="../source/jquery.fancybox.css?v=2.1.5" media="screen" />
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
</head>
<body>
<table class="table table-striped">
        <thead>
          <tr> 
          
          <th>Nombre</th>
          <th>DNI</th>
          <th>cuil</th>
          
          <th>Laboral</th>
          </tr>
          </thead>
          <tbody>
          		<?php
          		$txt = "select dp_nro_doc,dp_name,dp_nacimiento, pl_puesto from tb_datos_personales INNER JOIN tb_beneficiarios_sistema ON tb_datos_personales.dp_id = tb_beneficiarios_sistema.bs_dp_id INNER JOIN tb_postulaciones_laborales ON tb_datos_personales.dp_id = tb_postulaciones_laborales.pl_dp_id where (tb_beneficiarios_sistema.bs_sis = '2' and ( tb_postulaciones_laborales.pl_puesto = 4 or tb_postulaciones_laborales.pl_puesto = 5 ) ) "; 
          		$query = mysql_query($txt);
          		$i = 1;
          		while($dat = mysql_fetch_array($query)){
          			echo '<tr>';
          				echo '<td>'.$dat['dp_name'].'</td>';
          				echo '<td>'.$dat['dp_nro_doc'].'</td>';
          				echo '<td>'.$dat['dp_nacimiento'].'</td>';
          				echo '<td>'.$dat['pl_puesto'].'</td>';
          			echo '</tr>';
          			$i++;
          		}
          		?>

          </tbody>
</table>
</body>
</html>