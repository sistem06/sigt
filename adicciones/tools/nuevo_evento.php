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
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"
</head>
<body>
<?php include("../recorte_gral/encabezado.php"); ?>
<div class="container-fluid">
<?php include("recortes/navegacion.php"); ?>
  <!-- comienza contenido -->
</div>
<div class="container">

      
<!-- aca comienza el calendario -->
          
<h1>Nuevo Evento</h1>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-retweet"></span>  Datos del Evento</div>
  </h3>
</div>



          <form id="parte1" action="tools/add_registro.php" method="post" role="form">
      <div class="row">

<div class="col-xs-12 col-md-6">

<div class="form-group has-success">
   <?php echo InputGeneral("date", "ev_fecha", "form-control", "emnombre", "escriba el nombre del emprendimiento", "Fecha del Evento:",""); ?>
   <div class="requerido" id="falta_nombre">Falta completar este campo</div>
  </div>
</div>

<div class="col-xs-12 col-md-6">
<div class="form-group has-success">
   <?php echo InputGeneral("text", "em_hora", "form-control", "em_subrubro", "escriba la hora del evento", "Hora del Evento:",""); ?>
   <div class="requerido" id="falta_subrubro">Falta completar este campo</div>
  </div>


</div>
</div>

<div class="form-group">
<?php echo TextAreaGeneral("ev_observaciones", "form-control", "iddescripcion", "3", "Descripción del Emprendimiento:"); ?>
</div>


<div class="row">
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo SelectGeneral("ev_usuarios", "form-control", "usuario", "Usuario Responsable:", "tb_usuarios", "us_id", "us_name"); ?>
  </div>
  </div>
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo SelectGeneral("em_institucion", "form-control", "instituciones", "Institucion:", "tb_organizaciones", "or_id", "or_name"); ?>
  </div>
  </div>
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo SelectGeneral("ev_tipo", "form-control", "tipo", "Tipo de evento:", "tb_tipo_evento", "te_id", "te_name"); ?>
  </div>
  </div>
  </div>





<button type="submit" class="btn btn-info" id="envia1">Continuar</button>
<input type="hidden" name="paso" value="2">
<input type="hidden" name="em_dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="nro_dom" value="<?php echo TirameDomicilioNro($_GET['dp_id']); ?>">
</form>

  <!-- fin contenido -->
</div>
<br><br><br><br>
<?php include("../recorte_gral/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

 
  <script type="text/javascript" language="javascript">
    $(document).ready(function() {
     $("#envia1").click(function() {
    if($("#emnombre").val()==""){
      $("#falta_nombre").show();
      return false;
    }
    if($("#subrubroid").val()==""){
      $("#falta_subrubro").show();
      return false;
    }
    if($("#tipoemp").val()==""){
      $("#falta_tipo").show();
      return false;
    }
  });
  
  $("input[name=em_en_donde]").change(function () {  
      if ($(this).val()==1) {
      $("#aa1").show(); 
      } else {
      $("#aa1").hide(); 
      }
      });
  $("input[name=em_espacio]").change(function () {   
      if ($(this).val()==0) {
      $("#aa2").show(); 
      } else {
      $("#aa2").hide(); 
      }
      });
                
          $("#subrubroid").keyup(function(){
              if($("#subrubroid").val().length>3){
                $("#listado_rubros").show();
                  $.get("tools/busca_rubro.php",{busca: $("#subrubroid").val()}, function(htmlexterno){
                      $("#listado_rubros").html(htmlexterno);
                     
                  });

                   $("#listado_rubros").on("click", ".cada_elemento a", function(){
                    var dato = $(this).attr("value");
                        $("#subrubroid").val(dato);
                        $("#listado_rubros").hide();
                        return false;
                  });
              } else {
                $("#listado_rubros").hide();
              }
          });
     $("#iddepartamento").change(function () {  
                $("#iddepartamento option:selected").each(function () {
            elegido=$(this).val();
            $.post("tools/localidades.php", { elegido: elegido }, function(data){
            $("#idlocalidad").html(data);
            });           
        }); 
      });

   $("#idlocalidad").on("change",Buscaloc);
   $("#dpcalle").on("change",Buscaloc);
   $("#nrolocac").on("change",Buscaloc);
               
            
   function Buscaloc (){
        var id_loc = $("#idlocalidad").val();
            var es_calle = $("#dpcalle").val();
            var es_nro = $("#nrolocac").val();
          //  alert(id_loc+es_calle+es_nro);
            $.post("tools/localidades_str.php", { id_loc: id_loc, es_calle: es_calle, es_nro: es_nro }, function(datos){
              $("#address").attr("value",datos);
            });           
         
      };
  });
  
  </script>
  <script src="../js/bootstrap-typeahead.js"></script>
  <script>
            $(function() {
                function displayResult(item) {
                    $('.alert').show().html('You selected <strong>' + item.value + '</strong>: <strong>' + item.text + '</strong>');
                }
                $('#dpcalle').typeahead({
                    ajax: {
                        url: 'tools/autocom.php?query=%QUERY',
                        method: 'post',
                        triggerLength: 1
                    },
                    onSelect: displayResult
                });

  });
        </script>
   
</body>
</html>