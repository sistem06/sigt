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
<?php include("recortes/encabezado.php"); ?>
<div class="container-fluid">
<?php include("recortes/navegacion.php"); ?>
	<!-- comienza contenido -->

      <h3>Listado de Hogares</h3>
<!-- aca comienza el calendario -->
          
<table id="list_emprendedores" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>       
          <th>Domicilio</th>
          <th>Fraccion</th>
          <th>Radio</th>
          <th>Area</th>
          <th>Catastro</th>
          <th>Nro Hogar en Lote</th>
          
         
          
          </tr>
        </thead>
            
            <tbody>
      <?php
    
      $qe=mysql_query("select * from tb_hogar INNER JOIN tb_domicilios ON tb_hogar.ho_dom_id = tb_domicilios.dom_id");
        while($row = mysql_fetch_array($qe)){
  echo '<tr>';
  echo '<td><a href="detalle_hogar.php?ho_id='.$row['ho_id'].'" title="Ver detalles">'.$row['dom_calle'].' '.$row['dom_nro'].'</a></td>';
  echo '<td>'.$row['dom_fraccion'].'</td>';
 echo '<td>'.$row['dom_radio'].'</td>';
  
   echo '<td>'.$row['dom_area'].'</td>';
    echo '<td>'.$row['dom_dc_manzana'].'-'.$row['dom_dc_parcela'].'-'.$row['dom_dc_lote'].'</td>';
    echo '<td>'.$row['ho_hogar_lote_nro'].'</td>';
    
     
  
  echo '</tr>';
  }
               ?> 
               
               
            </tbody>
        </table>
  <!-- fin contenido -->
</div>
<?php include("recortes/pie.php"); ?>

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