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
          
<h3>Alta de prestación individual</h3>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-inbox"></span>  Alta de prestación individual</h3>
  </div>
  
</div>



          <form id="parte1" action="tools/add_registro_prestaciones.php" method="post" role="form">
      
<div class="row">
<div class="col-xs-12 col-md-6">
<div class="form-group has-success">
  <label>Beneficiario:</label>
  <input type="text" id="beneficiario" name="beneficiario" class="form-control" autocomplete="off">
 <div id="listado_beneficiarios" class="listado_rubros"></div>
 <div class="requerido" id="falta_beneficiario">Falta completar este campo</div>
</div>
</div>

<div class="col-xs-12 col-md-6">
<div class="form-group has-success">
  <label>Prestación:</label>
 <select id="prestacion" class="form-control" name="prestacion"/>
  <option></option>
  <?php
  $sis = $_SESSION['sistema'];
    $query_pre = mysql_query("SELECT * FROM tbp_prestaciones_lista INNER JOIN tbp_prestacion_type ON tbp_prestaciones_lista.tbp_pt_id = tbp_prestacion_type.pt_id WHERE (tbp_prestaciones_lista.tbp_sis_id = '$sis' and tbp_prestacion_type.pt_gr = '0') order by tbp_prestaciones_lista.tbp_pr_name");
    while($data_pre = mysql_fetch_array($query_pre)){
        echo '<option value="'.$data_pre['tbp_pr_id'].'">'.$data_pre['tbp_pr_name'].'</option>';
    }
  ?>
 </select>
 <div class="requerido" id="falta_prestacion">Falta completar este campo</div>
</div>
</div>
</div>

<div id="agrega"></div>



<button type="submit" class="btn btn-info" id="envia1">Agregar Prestación</button>
<input type="hidden" name="paso" value="1">
<input type="hidden" name="id_us" value="<?php echo $_SESSION['id_us']; ?>">
<input type="hidden" name="dni" id="dni">
<input type="hidden" name="tipo" id="tipo">
</form>

  <!-- fin contenido -->
</div>
<br><br><br><br>
<?php include("../recorte_gral/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

 
  <script type="text/javascript" language="javascript">
    $(document).ready(function() {
     $("#parte1").submit(function(event) {
    if($("#beneficiario").val()==""){
      $("#falta_beneficiario").show();
     event.preventDefault();
    }
    if($("#prestacion").val()==""){
      $("#falta_prestacion").show();
      event.preventDefault();
    }
    var tipo = $("#tipo").val();
    switch(tipo){
       case '1':
            if($("#motivo").val()==""){
                $("#falta_motivo").show();
                event.preventDefault();
              }

            if($("#ubicacion").val()==""){
                $("#falta_ubicacion").show();
                event.preventDefault();
              }

            if($("#fecha").val()==""){
                $("#falta_fecha").show();
                event.preventDefault();
              }
      break;

      case '2':
            if($("#motivo").val()==""){
                $("#falta_motivo").show();
                event.preventDefault();
              }

            if($("#monto").val()==""){
                $("#falta_monto").show();
                event.preventDefault();
              }

      break;

      case '10':
            if($("#motivo").val()==""){
                $("#falta_motivo").show();
                event.preventDefault();
              }

            if($("#monto").val()==""){
                $("#falta_monto").show();
                event.preventDefault();
              }

      break;

      case '11':
            if($("#motivo").val()==""){
                $("#falta_motivo").show();
                event.preventDefault();
              }

            if($("#monto").val()==""){
                $("#falta_monto").show();
                event.preventDefault();
              }

            if($("#responsable").val()==""){
                $("#falta_responsable").show();
                event.preventDefault();
              }

            if($("#dni_responsable").val()==""){
                $("#falta_dni_responsable").show();
                event.preventDefault();
              }

      break;

      case '12':
            if($("#responsable").val()==""){
                $("#falta_responsable").show();
                event.preventDefault();
              }

            if($("#fecha").val()==""){
                $("#falta_fecha").show();
                event.preventDefault();
              }

            if($("#motivo").val()==""){
                $("#falta_motivo").show();
                event.preventDefault();
              }

      break;

       case '13':
            if($("#responsable").val()==""){
                $("#falta_responsable").show();
                event.preventDefault();
              }

            if($("#fecha").val()==""){
                $("#falta_fecha").show();
                event.preventDefault();
              }

            if($("#motivo").val()==""){
                $("#falta_motivo").show();
                event.preventDefault();
              }

      break;

      case '14':
            if($("#responsable").val()==""){
                $("#falta_responsable").show();
                event.preventDefault();
              }

            if($("#fecha").val()==""){
                $("#falta_fecha").show();
                event.preventDefault();
              }

            if($("#motivo").val()==""){
                $("#falta_motivo").show();
                event.preventDefault();
              }

      break;
    }
  });
  
  
                
          $("#prestacion").change(function(){
                  $.get("tools/busca_datos.php",{busca: $("#prestacion").val()}, function(data){
                      $("#agrega").html(data);
                  });
                  $.get("tools/busca_tipo.php",{busca: $("#prestacion").val()}, function(data1){
                      $("#tipo").val(data1);
                  });  
          });

          $("#beneficiario").keyup(function(){
            if($("#beneficiario").val().length>1){
                $("#listado_beneficiarios").show();
                 $.get("tools/busca_ben_pres.php",{busca: $("#beneficiario").val()}, function(htmlexterno){
                      $("#listado_beneficiarios").html(htmlexterno);
                  });
                 $("#listado_beneficiarios").on("click", ".cada_elemento a", function(){
                      var dato = $(this).attr("value");
                        $("#beneficiario").val(dato);
                        $("#listado_beneficiarios").hide();
                        var partes = dato.split("(");
                        var esdni = partes[1].slice(0,-1);
                        $("#dni").val(esdni);
                        return false;
                 });
            } else {
              $("#listado_beneficiarios").hide();
                $("#dni").val("");
            }
          });
   
  });
  
  </script>
  <script src="../js/bootstrap-typeahead.js"></script>
 
</body>
</html>