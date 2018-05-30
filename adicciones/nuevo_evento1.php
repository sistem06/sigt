<?php
include("secure.php");
include ("../conecta.php");
include ("../funciones/funciones_generales.php");
include ("../funciones/funciones_form.php");
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
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
</head>
<body>
<?php include("../recorte_gral/encabezado.php"); ?>
<div class="container-fluid">
<?php include("recortes/navegacion.php"); ?>
  <!-- comienza contenido -->
</div>
<div class="container">

      
<!-- aca comienza el calendario -->
<div class="paso_in">
<span class="nombre_emp">          
Evento en <?php echo BuscaRegistro("tb_eventos","ev_id",$_GET['ev_id'],"ev_domicilio").' '.BuscaRegistro("tb_eventos","ev_id",$_GET['ev_id'],"ev_fecha").' '.BuscaRegistro("tb_eventos","ev_id",$_GET['ev_id'],"ev_hora"); ?></span>

</div>

<?php
  $tx_m = "select * from tb_institucion_coorg where (ic_ev_id = '".$_GET['ev_id']."')";
  $query_m = mysql_query($tx_m);
  $num_m = mysql_num_rows($query_m);
  if($num_m == 0){
  ?>
<div class="panel panel-danger">
  <div class="panel-heading">
  <h3 class="panel-title">No se ha agregado ninguna Institucion co-organizante a este evento</h3></div>
</div>
<?php
  } else {
?>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Nombre Institucion Co-organizante</th>
    
      <th>Quitar</th>
    <tr>
  </thead>
  <tbody>
    <?php
    while($ar_m = mysql_fetch_array($query_m)){
     
      
      echo '<tr>';
        
        echo '<td>'.DatoRegistro ('tb_instituciones_cpa', 'ins_name', 'ins_id',$ar_m['ic_ins_id'], $conn).'</td>';
        echo '<td><a href="tools/quitar.php?val='.$ar_m['ic_id'].'&id=ic_id&tabla=tb_institucion_coorg"  title="eliminar" class="fancybox fancybox.iframe"><button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a></td>';
      echo '</tr>';
    }
    ?>
  </tbody>
</table>
<?php
  }
  ?>
 <form id="parte1" action="tools/add_registro.php" method="post" role="form" class="form-inline" style="padding:10px;">
    

<div class="form-group">
<?php echo SelectGeneralAccion("ic_ins_id", "form-control", "org", "Institucion co-organizante:  ", "tb_instituciones_cpa", "ins_id", "ins_name", "Instituciones"); ?>
<div class="requerido" id="falta_org">Falta completar este campo</div>
</div>
<a href="tools/cambios_organizaciones.php" class="fancybox fancybox.iframe" id="agregaorg" style="display:none">agrega organizacion</a>


<input type="hidden" name="paso" value="7">
<input type="hidden" name="ic_ev_id" value="<?php echo $_GET['ev_id']; ?>">
<button type="submit" class="btn btn-success" id="envia1">Agregar</button>
</form>

<form id="parte2" action="tools/add_registro.php" method="post" role="form">
<br>
<button type="submit" class="btn btn-info" id="envia2">Continuar al siguiente paso</button>
<input type="hidden" name="paso" value="101">
<input type="hidden" name="ev_id" value="<?php echo $_GET['ev_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
 </form>



  <!-- fin contenido -->
  
</div>
</div>
<br><br><br><br><br><br><br><br>

<?php include("../recorte_gral/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

 
  <script type="text/javascript" language="javascript">
    $(document).ready(function() {
     $("#envia1").click(function() {
    if($("#evedomicilio").val()==""){
      $("#falta_domicilio").show();
      return false;
    }
    if($("#evefecha").val()==""){
      $("#falta_fecha").show();
      return false;
    }
    if($("#evehora").val()==""){
      $("#falta_hora").show();
      return false;
    }
    if($("#condicionorg").val()==""){
      $("#falta_orga").show();
      return false;
    }
    if($("#tipo").val()==""){
      $("#falta_tipo").show();
      return false;
    }
  });
  
 $("#org").change(function(){
      if($("#org").val()=="Agregar"){
          $("#agregaorg").trigger("click");
      }
    });
  
  
  });
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
        $(".fancybox").fancybox({
        afterClose  : function() { 
            window.location.reload();
        }
    });
});
  </script>
   
</body>
</html>