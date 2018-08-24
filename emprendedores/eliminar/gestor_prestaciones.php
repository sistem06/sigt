<?php
include("secure1.php");
include ("../conecta.php");
include ("../funciones/funciones_generales.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo BuscaRegistro ("tb_sistemas", "sis_id", $_SESSION["sistema"], "sis_name"); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/estilos_ss.css">
  <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="../source/jquery.fancybox.css?v=2.1.5" media="screen" />
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
</head>
<body>
<?php include("../recorte_gral/encabezado.php"); ?>
<div class="container-fluid">
<?php include("recortes/navegacion.php"); ?>
	<!-- comienza contenido -->

      <h3>Listado de Prestaciones del Sistema</h3>
<!-- aca comienza el calendario -->
     <a href="tools/cambios_gestor_prestaciones.php" class="fancybox fancybox.iframe" title="agregar prestación">
      <button type="button" class="btn btn-success">Agregar Nueva Prestación</button>
     </a>
     <br><br>
<table id="list_emprendedores" class="display" cellspacing="0" width="100%">
       <thead>
          <tr>
      <th>Nombre</th>
      <th>Tipo</th>
      <th>Compartido</th>
      <th>Modificar</th>
      <th>Quitar</th>
    </tr>
    </thead>

            <tbody>
      <?php

      $qe=mysql_query("select * from tbp_prestaciones_lista where tbp_sis_id='".$_SESSION["sistema"]."'");
        while($row = mysql_fetch_array($qe)){
  echo '<tr>';
  echo '<td>'.$row['tbp_pr_name'].'</td>';
  echo '<td>'.BuscaRegistro("tbp_prestacion_type","pt_id",$row['tbp_pt_id'],"pt_name").'</td>';
  if($row['tbp_in_compartida']==1) { $compartido='si'; } else { $compartido='no'; }
   echo '<td>'.$compartido.'</td>';
   echo '<td><a href="tools/cambios_gestor_prestaciones.php?tbp_pr_id='.$row['tbp_pr_id'].'"  title="modificar" class="fancybox fancybox.iframe"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></button></a></td>';
   echo '<td>';
   echo '<a href="tools/quitar_prestacion.php?val='.$row['tbp_pr_id'].'&id=tbp_pr_id&tabla=tbp_prestaciones_lista"  title="eliminar" class="fancybox fancybox.iframe"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>';
   echo '</td></tr>';
  }
               ?>


            </tbody>
        </table>
        <br><br><br><br><br><br>
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
  <script type="text/javascript" src="../source/jquery.fancybox.js?v=2.1.5"></script>
  <script type="text/javascript">
    $(document).ready(function() {
          $('.fancybox').fancybox();
      $("#fancybox-manual-b").click(function() {
        $.fancybox.open({
          href : 'iframe.html',
          type : 'iframe',
          padding : 5
        });
      });
        $(".fancybox").fancybox({
        afterClose  : function() {
            window.location.reload();
        }
    });
});
  </script>
</body>
</html>
