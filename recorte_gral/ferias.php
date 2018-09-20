<?php
if (!isset($_SESSION)) { session_start(); }
include("../".$_SESSION["dir_sis"]."/secure.php");
include ("../conecta.php");
include ("../funciones/funciones_generales.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo BuscaRegistro ("tb_sistemas", "sis_id", $_SESSION["sistema"], "sis_name"); ?> - Ferias</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/estilos_ss.css">
  <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="../source/jquery.fancybox.css?v=2.1.5" media="screen" />
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"
</head>
<body>
<?php include("encabezado.php"); ?>
<div class="container-fluid">
<?php include("../".$_SESSION["dir_sis"]."/recortes/navegacion.php"); ?>
	<!-- comienza contenido -->

      <h3>Listado de Ferias</h3>
<!-- aca comienza el calendario -->
     <a href="tools/cambios_ferias.php" class="fancybox fancybox.iframe" title="agregar feria">
      <button type="button" class="btn btn-success">Agregar Feria</button>
     </a>
     <br><br>
<table id="list_emprendedores" class="display" cellspacing="0" width="100%">
       <thead>
          <tr>
      <th>Feria</th>
      <th>Modificar</th>
      <th>Quitar</th>
    </tr>
    </thead>

            <tbody>
      <?php

      $qe=mysql_query("select * from tb_ferias order by fe_name");
        while($row = mysql_fetch_array($qe)){
  echo '<tr>';
  echo '<td>'.$row['fe_name'].'</td>';

   echo '<td><a href="tools/cambios_ferias.php?fe_id='.$row['fe_id'].'"  title="modificar" class="fancybox fancybox.iframe"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></button></a></td>';
    echo '<td><a href="tools/quitar.php?val='.$row['fe_id'].'&id=fe_id&tabla=tb_ferias"  title="eliminar" class="fancybox fancybox.iframe"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>';
  echo '</tr>';
  }
               ?>


            </tbody>
        </table>
  <!-- fin contenido  prueba utf8-->
	<br><br><br><br>
  <!-- fin prueba -->

</div>

<?php include("pie.php"); ?>

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
