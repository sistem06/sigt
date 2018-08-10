<?php
include("secure.php");
include ("../conecta.php");
include ("../funciones/funciones_generales.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo BuscaRegistro ("tb_sistemas", "sis_id", $_SESSION["sistema"], "sis_name"); ?>	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/estilos_ss.css">
  <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
</head>
<body>
<?php include("../recorte_gral/encabezado.php"); ?>
<div class="container-fluid">
<?php include("recortes/navegacion.php"); ?>
	<!-- comienza contenido -->

      <h3>Listado de Atenciones</h3>
<!-- aca comienza el calendario -->

<table id="list_emprendedores" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
          <th>Fecha</th>
          <th>Operador</th>
          <th>Tipo</th>
          <th>Victima</th>
          <th>Origen</th>
          <th>Detalle</th>
          </tr>
        </thead>

          <tbody>
			      <?php
			      $qe=mysql_query("select * from tb_102_llamados");
			        while($row = mysql_fetch_array($qe)){
							  echo '<tr>';
								  echo '<td>'.$row['la_102_fecha'].'</td>';
								  echo '<td>'.BuscaRegistro ("tb_usuarios", "us_id", $row['la_102_us'], "us_name").'</td>';
								  echo '<td>'.BuscaRegistro ("tb_motivo_llamado", "ml_id", $row['la_102_tipo_llamado'], "ml_name").'</td>';
								  echo '<td>'.BuscaRegistro ("tb_datos_personales", "dp_id", $row['la_dp_id'], "dp_name").'</td>';
								  //echo '<td>'.TirameOrigen($row['la_102_id']).'</td>';
									if (null !== TirameOrigen($row['la_102_id'])) { echo "<td>".TirameOrigen($row['la_102_id'])."</td>"; } else { echo "<td></td>"; }
								  echo '<td><a href="detalle_llamado.php?la_102_id='.$row['la_102_id'].'&dp_id='.$row['la_dp_id'].'"><button class="btn btn-warning">Ver</button></a></td>';
							  echo '</tr>';
						  }
			     ?>
          </tbody>
        </table>
  <!-- fin contenido -->
</div>
<br><br><br><br><br><br>
<?php include("../recorte_gral/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>

  <script type="text/javascript" language="javascript" class="init">
  $(document).ready(function() {
  $('#list_emprendedores').DataTable();
});
  </script>
  <script type="text/javascript" language="javascript">
    $('#list_emprendedores').DataTable( {
        responsive: true
    } );
  </script>
  <script type="text/javascript" language="javascript" src="../js/navbar.js"></script>
</body>
</html>
