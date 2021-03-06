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
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"
</head>
<body>
<?php include("../recorte_gral/encabezado.php"); ?>
<div class="container-fluid">
<?php include("recortes/navegacion.php"); ?>
	<!-- comienza contenido -->

      <h3>Listado de Emprendedores</h3>
<!-- aca comienza el calendario -->

<table id="list_emprendedores" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
          <th>Nombre</th>
          <th>DNI</th>
					<th>Emprendimiento</th>
          <th>Dirección</th>
          <th>Mail</th>
          <th>Teléfono</th>
          <th>Celular</th>
          </tr>
        </thead>

            <tbody>
      <?php

      $qe=mysql_query("select * from tb_datos_personales INNER JOIN tb_beneficiarios_sistema ON tb_datos_personales.dp_id = tb_beneficiarios_sistema.bs_dp_id where tb_beneficiarios_sistema.bs_sis = '".$_SESSION["sistema"]."'");
        while($row = mysql_fetch_array($qe)){
  echo '<tr>';
  echo '<td width="15%"><a href="../recorte_gral/detalle_persona.php?dp_id='.$row['dp_id'].'" title="Ver detalles">'.$row['dp_name'].'</a></td>';
  echo '<td width="10%" align="right">'.BuscaRegistro ("tb_docs", "do_id", $row['dp_tipo_doc'], "do_name").' '.$row['dp_nro_doc'].'</td>';
	echo '<td width="10%">'.BuscaRegistro ("tb_datos_emprendimiento", "em_dp_id", $row['dp_id'], "em_nombre").'</td>';
  echo '<td>'.TirameDomicilio($row['dp_id']).'</td>';
  echo '<td width="10%">'.$row['dp_mail'].'</td>';
  echo '<td>'.$row['dp_telefono'].'</td>';
  echo '<td width="8%">'.$row['dp_movil'].'</td>';
  echo '</tr>';
  }
               ?>

            </tbody>
        </table>
        <br><br><br><br><br>
  <!-- fin contenido -->
</div>
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
