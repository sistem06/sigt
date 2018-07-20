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
          
<h3>Alta de prestación Grupal</h3>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-inbox"></span>  Alta de prestación Grupal</h3>
  </div>
  
</div>

    <?php
    if(!isset($_GET['pre_id'])){
      ?>
          <form id="parte1" action="tools/add_registro_prestaciones_gr.php" method="post" role="form">
      
<div class="row">
<!--
<div class="col-xs-12 col-md-6">
<div class="form-group has-success">
  <label>Beneficiario:</label>
  <input type="text" id="beneficiario" name="beneficiario" class="form-control" autocomplete="off">
 <div id="listado_beneficiarios" class="listado_rubros"></div>
 <div class="requerido" id="falta_beneficiario">Falta completar este campo</div>
</div>
</div>
-->
<div class="col-xs-12 col-md-12">
<div class="form-group has-success">
  <label>Prestación:</label>
 <select id="prestacion" class="form-control" name="prestacion"/>
  <option></option>
  <?php
  $sis = $_SESSION['sistema'];
    $query_pre = mysql_query("SELECT * FROM tbp_prestaciones_lista INNER JOIN tbp_prestacion_type ON tbp_prestaciones_lista.tbp_pt_id = tbp_prestacion_type.pt_id WHERE (tbp_prestaciones_lista.tbp_sis_id = '$sis' and tbp_prestacion_type.pt_gr = '1') order by tbp_prestaciones_lista.tbp_pr_name");
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

<input type="hidden" name="tipo" id="tipo">
</form>
<?php
} else {

?>
<h4>Agregue los integrantes de la prestación <b><?php echo BuscaRegistro("tbp_prestaciones_lista","tbp_pr_id",BuscaRegistro("tbp_prestaciones","pre_id",$_GET['pre_id'],"pre_pr_id"),"tbp_pr_name"); ?></b></h4>
<form id="parte2" action="tools/add_registro_prestaciones_gr.php" method="post" role="form">
<input type="hidden" name="paso" value="2">
<input type="hidden" name="dni" id="dni">
<input type="hidden" name="pre_id" value="<?php echo $_GET['pre_id']; ?>">
<div class="row">

<div class="col-xs-12 col-md-12">
<div class="form-group has-success">
  <label>Beneficiario:</label>
  <input type="text" id="beneficiario" name="beneficiario" class="form-control" autocomplete="off">
 <div id="listado_beneficiarios" class="listado_rubros"></div>
 <div class="requerido" id="falta_beneficiario">Falta completar este campo</div>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-md-12">
<button type="submit" class="btn btn-info" id="envia2">Agregar Miembro</button>
</div>
</div>
</form>
<br>
      <table class="table table-striped">
      <?php
      $tx_list = "SELECT * FROM tbp_prestaciones_beneficiarios WHERE pb_pre_id = ".$_GET['pre_id'];
      $query_list = mysql_query($tx_list);
        while($data_list = mysql_fetch_array($query_list)){
          echo '<tr>';
          echo '<td>'.BuscaRegistro("tb_datos_personales","dp_id",$data_list['pb_dp_id'],"dp_name").'</td>';
           echo '<td><a href="tools/quitar_prestacion.php?val='.$data_list['pb_id'].'&id=pb_id&tabla=tbp_prestaciones_beneficiarios"  title="eliminar" class="fancybox fancybox.iframe"><button type="button" class="btn btn-danger  btn-sm"><span class="glyphicon glyphicon-trash"></span></button></a></td>';
           echo '</tr>';
        }
      ?>
      </table>
<?php
}
?>
  <!-- fin contenido -->
</div>
<br><br><br><br>
<?php include("../recorte_gral/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

 
  <script type="text/javascript" language="javascript">
    $(document).ready(function() {
     $("#parte1").submit(function(event) {
    if($("#prestacion").val()==""){
      $("#falta_prestacion").show();
      event.preventDefault();
    }
    var tipo = $("#tipo").val();
    switch(tipo){
       case '3':
            if($("#motivo").val()==""){
                $("#falta_motivo").show();
                event.preventDefault();
              }

            if($("#responsable").val()==""){
                $("#falta_responsable").show();
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

      case '6':
            if($("#motivo").val()==""){
                $("#falta_motivo").show();
                event.preventDefault();
              }

            if($("#responsable").val()==""){
                $("#falta_responsable").show();
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

      case '7':
           if($("#motivo").val()==""){
                $("#falta_motivo").show();
                event.preventDefault();
              }

            if($("#responsable").val()==""){
                $("#falta_responsable").show();
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

      case '8':
            
            if($("#responsable").val()==""){
                $("#falta_responsable").show();
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

            if($("#hora_in").val()==""){
                $("#falta_hora_in").show();
                event.preventDefault();
              }

            if($("#hora_out").val()==""){
                $("#falta_hora_out").show();
                event.preventDefault();
              }

      break;

      case '9':
            if($("#motivo").val()==""){
                $("#falta_motivo").show();
                event.preventDefault();
              }

            if($("#responsable").val()==""){
                $("#falta_responsable").show();
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

            if($("#hora_in").val()==""){
                $("#falta_hora_in").show();
                event.preventDefault();
              }

      break;

    }
  });
  
  
                
          $("#prestacion").change(function(){
            //      alert($("#prestacion").val());
                  $.get("tools/busca_datos_gr.php",{busca: $("#prestacion").val()}, function(data){
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