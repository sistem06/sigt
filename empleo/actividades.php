<?php
include("secure2.php");
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
  <link rel="stylesheet" type="text/css" href="../source/jquery.fancybox.css?v=2.1.5" media="screen" />
  <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
</head>
<body>
<?php include("../recorte_gral/encabezado.php"); ?>
<div class="container-fluid">
<?php include("recortes/navegacion.php"); ?>
	<!-- comienza contenido -->

      <h3>Listado de Actividades laborales del Sistema</h3>
<!-- aca comienza el calendario -->
          
<table id="list_emprendedores" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>       
          <th>Actividad</th>
          
          <th>Modificar</th>
          <th>Agrupar con Otra</th>
          <th>Beneficiarios</th>
          <th>Eliminar</th>
          
          </tr>
        </thead>
            
            <tbody>
      <?php
    
      $qe=mysql_query("select * from tb_actividades where act_name != 'Agregar Nueva' order by act_name");
        while($row = mysql_fetch_array($qe)){
  echo '<tr>';
  echo '<td>'.utf8_encode($row['act_name']).'</td>';
  
 echo '<td><a href="tools/cambios_actividades.php?act_id='.$row['act_id'].'"  title="modificar" class="fancybox fancybox.iframe" id="modifica"><button type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></a></td>';
   echo '<td><a href="tools/agrupar_actividades.php?act_id='.$row['act_id'].'"  title="agrupar" class="fancybox fancybox.iframe" id="agrupa"><button type="button" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-link"></span></button></a></td>';
   echo '<td>';
   if(NroRegistro ("tb_antecedentes_laborales", "al_actividad", $row['act_id'])>0){
         echo '<a href="tools/beneficiarios_asociados.php?ts_id='.$row['act_id'].'&tabla=tb_actividades"  title="listado" class="fancybox fancybox.iframe" id="asociados"><button type="button" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-list"></span></button></a>';
   }
   echo '</td>';
   echo '<td>';
   if(NroRegistro ("tb_antecedentes_laborales", "al_actividad", $row['act_id'])==0){
        echo '<a href="tools/quitar.php?val='.$row['act_id'].'&id=act_id&tabla=tb_actividades"  title="quitar" class="fancybox fancybox.iframe" id="elimina"><button type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button></a>';
   }
   echo '</td>';
    
  echo '</tr>';
  }
               ?> 
               
               
            </tbody>
        </table>
  <!-- fin contenido -->
  <br><br><br><br>
</div>
<br><br><br><br>
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
        

        $("#modifica").fancybox({
        afterClose  : function() { 
            window.location.reload();
        }
    }); 

        $("#agrupa").fancybox({
        afterClose  : function() { 
            window.location.reload();
        }
    }); 

        $("#elimina").fancybox({
        afterClose  : function() { 
            window.location.reload();
        }
    });

        
});
  </script>
  <script type="text/javascript" language="javascript" src="../js/navbar.js"></script>
</body>
</html>