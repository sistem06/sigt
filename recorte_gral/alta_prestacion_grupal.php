<?php
session_start();
include("../".$_SESSION["dir_sis"]."/secure.php");
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
<?php include("encabezado.php"); ?>
<div class="container-fluid">
<?php include("../".$_SESSION["dir_sis"]."/recortes/navegacion.php"); ?>
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
    $query_pre = mysql_query("SELECT * FROM tbp_prestaciones_lista INNER JOIN tbp_prestacion_type ON tbp_prestaciones_lista.tbp_pt_id = tbp_prestacion_type.pt_id WHERE (tbp_prestaciones_lista.tbp_sis_id = '$sis' and (tbp_prestacion_type.pt_gr = '1' or tbp_prestacion_type.pt_gr = '3') and tbp_prestaciones_lista.tbp_pr_activo = '0') order by tbp_prestaciones_lista.tbp_pr_name");
    while($data_pre = mysql_fetch_array($query_pre)){
        echo '<option value="'.$data_pre['tbp_pr_id'].'">'.$data_pre['tbp_pr_name'].'</option>';
    }
  ?>
 </select>
 <div class="requerido" id="falta_prestacion">Falta completar este campo</div>
</div>
</div>
</div>
<div id="cont_ubica" style="display:none;">
<div class="row">
<div class="col-xs-12 col-md-12">
  <div class="form-group has-success">
    <label>Ubicación Barrio:</label>
        <input type="text" placeholder="barrio donde se desarrolla la prestacion" id="ubicacion" name="pre_ubicacion" class="form-control" autocomplete="off">
        <div id="listado_barrios" class="listado_rubros"></div>
        <div class="requerido" id="falta_ubicacion">Falta completar este campo</div>
  </div>
  <input type="hidden" name="pre_ubicacion" id="cod_barrio">
  </div></div>
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
<hr>
<form id="parte2" action="tools/add_registro_prestaciones_gr.php" method="post" role="form">
<input type="hidden" name="paso" value="2">
<input type="hidden" name="dni" id="dni">
<input type="hidden" name="pre_id" value="<?php echo $_GET['pre_id']; ?>">
<div class="row">

<div class="col-xs-12 col-md-12">
<div class="form-group has-success">
  <label>Beneficiario Participante:</label>
  <input type="text" id="beneficiario" name="beneficiario" class="form-control" autocomplete="off">
 <div id="listado_beneficiarios" class="listado_rubros"></div>
 <div class="requerido" id="falta_beneficiario">Falta completar este campo</div>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-md-12">
<button type="submit" class="btn btn-success" id="envia2">Agregar Beneficiario</button>
<input type="hidden" name="pt_id" value="<?php echo BuscaRegistro("tbp_prestaciones_lista","tbp_pr_id",BuscaRegistro("tbp_prestaciones","pre_id",$_GET['pre_id'],"pre_pr_id"),"tbp_pt_id"); ?>" >
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
      <hr>

      <form id="parte3" action="tools/add_registro_prestaciones_gr.php" method="post" role="form">
<input type="hidden" name="paso" value="3">
<input type="hidden" name="us_id" id="us_id">
<input type="hidden" name="pre_id" value="<?php echo $_GET['pre_id']; ?>">
<div class="row">

<div class="col-xs-12 col-md-12">
<div class="form-group has-success">
  <label>Usuario Participante:</label>
  <input type="text" id="usuario" name="usuario" class="form-control" autocomplete="off">
 <div id="listado_usuarios" class="listado_rubros"></div>
 <div class="requerido" id="falta_usuario">Falta completar este campo</div>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-md-12">
<button type="submit" class="btn btn-success" id="envia2">Agregar Usuario</button>
</div>
</div>
</form>
<br>
      <table class="table table-striped">
      <?php
      $tx_list1 = "SELECT * FROM tbp_prestaciones_usuarios WHERE pu_pre_id = ".$_GET['pre_id'];
      $query_list1 = mysql_query($tx_list1);
        while($data_list1 = mysql_fetch_array($query_list1)){
          echo '<tr>';
          echo '<td>'.BuscaRegistro("tb_usuarios","us_id",$data_list1['pu_us_id'],"us_name").'</td>';
           echo '<td><a href="tools/quitar_prestacion.php?val='.$data_list1['pu_id'].'&id=pu_id&tabla=tbp_prestaciones_usuarios"  title="eliminar" class="fancybox fancybox.iframe"><button type="button" class="btn btn-danger  btn-sm"><span class="glyphicon glyphicon-trash"></span></button></a></td>';
           echo '</tr>';
        }
      ?>
      </table>
      <hr>
      <a href="finaliza_grupal.php" class="btn btn-danger" title="Guardar prestación">Finalizar y Guardar Prestación</a>
<?php
}
?>
  <!-- fin contenido -->
</div>
<br><br><br><br>
<br><br><br><br>
<?php include("pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>


  <script type="text/javascript" language="javascript">
    $(document).ready(function() {
     $("#parte1").submit(function(event) {
    if($("#prestacion").val()==""){
      $("#falta_prestacion").show();
      event.preventDefault();
    }

     if($("#ubicacion").val()==""){
                $("#falta_ubicacion").show();
                event.preventDefault();
              }
      if($("#cod_barrio").val()==""){
                $("#falta_ubicacion").show();
                $("#falta_ubicacion").text("debe elegir un barrio de la lista");
                event.preventDefault();
              }

    var tipo = $("#tipo").val();

    switch(tipo){

      case '2':
            if($("#motivo").val()==""){
                $("#falta_motivo").show();
                event.preventDefault();
              }

            if($("#monto").val()==""){
                $("#falta_monto").show();
                event.preventDefault();
              }
            if($("#fecha_in").val()==""){
                $("#falta_fecha_in").show();
                event.preventDefault();
              }
      /*      if($("#fecha_out").val()==""){
                $("#falta_fecha_out").show();
                event.preventDefault();
              }*/
            if($("#cuotas").val()==""){
                $("#falta_cuotas").show();
                event.preventDefault();
              }
      /*      if($("#fecha_out").val()<$("#fecha_in").val()){
                $("#falta_fecha_in").show();
                $("#falta_fecha_in").text("la fecha final debe ser posterior a la fecha inicial");
                event.preventDefault();
              }*/

      break;


       case '3':
            if($("#motivo").val()==""){
                $("#falta_motivo").show();
                event.preventDefault();
              }

            if($("#responsable").val()==""){
                $("#falta_responsable").show();
                event.preventDefault();
              }

            if($("#fecha_in").val()==""){
                $("#falta_fecha_in").show();
                event.preventDefault();
              }

            if($("#fecha_out").val()==""){
                $("#falta_fecha_out").show();
                event.preventDefault();
              }
      break;

      case '5':
            if($("#motivo").val()==""){
                $("#falta_motivo").show();
                event.preventDefault();
              }

            if($("#responsable").val()==""){
                $("#falta_responsable").show();
                event.preventDefault();
              }

            if($("#fecha_in").val()==""){
                $("#falta_fecha_in").show();
                event.preventDefault();
              }

            if($("#fecha_out").val()==""){
                $("#falta_fecha_out").show();
                event.preventDefault();
              }
             if($("#fecha_out").val()<$("#fecha_in").val()){
                $("#falta_fecha_in").show();
                $("#falta_fecha_in").text("la fecha final debe ser posterior a la fecha inicial");
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



            if($("#fecha").val()==""){
                $("#falta_fecha").show();
                event.preventDefault();
              }

            if($("#hora_in").val()==""){
                $("#falta_hora_in").show();
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

            if($("#fecha_in").val()==""){
                $("#falta_fecha_in").show();
                event.preventDefault();
              }

            if($("#fecha_out").val()==""){
                $("#falta_fecha_out").show();
                event.preventDefault();
              }

            if($("#cuotas").val()==""){
                $("#falta_cuotas").show();
                event.preventDefault();
              }
            if($("#fecha_out").val()<$("#fecha_in").val()){
                $("#falta_fecha_in").show();
                $("#falta_fecha_in").text("la fecha final debe ser posterior a la fecha inicial");
                event.preventDefault();
              }

      break;

      case '15':
            if($("#direccion").val()==""){
                $("#falta_direccion").show();
                event.preventDefault();
              }

            if($("#actividad").val()==""){
                $("#falta_actividad").show();
                event.preventDefault();
              }

            if($("#rubro").val()==""){
                $("#falta_rubro").show();
                event.preventDefault();
              }

            if($("#subrubro").val()==""){
                $("#falta_subrubro").show();
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
                  $("#cont_ubica").show();
          });

          $("#agrega").on('change', '#rubro', function(){
              var rubro = $("#rubro").val();
              $.get("tools/busca_subr.php",{rubro:rubro},function(srb){
                  $("#subrubro").html(srb);
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

          $("#ubicacion").keyup(function(){
            if($("#ubicacion").val().length>1){
                $("#listado_barrios").show();
                 $.get("tools/busca_ubi_barrio.php",{busca: $("#ubicacion").val()}, function(htmlexterno1){
                      $("#listado_barrios").html(htmlexterno1);
                  });
                 $("#listado_barrios").on("click", ".cada_elemento a", function(){
                      var dato = $(this).attr("value");
                      var parte_dato = dato.split('|');
                        $("#ubicacion").val(parte_dato[0]);
                        $("#cod_barrio").val(parte_dato[1]);
                        $("#listado_barrios").hide();

                        return false;
                 });
            } else {
              $("#listado_barrios").hide();
                $("#cod_barrio").val("");
            }
          });

          $("#usuario").keyup(function(){
            if($("#usuario").val().length>1){
                $("#listado_usuarios").show();
                 $.get("tools/busca_usuario_pre.php",{busca: $("#usuario").val()}, function(htmlexterno2){
                      $("#listado_usuarios").html(htmlexterno2);
                  });
                 $("#listado_usuarios").on("click", ".cada_elemento a", function(){
                      var dato = $(this).attr("value");
                      var parte_dato = dato.split('|');
                        $("#usuario").val(parte_dato[0]);
                        $("#us_id").val(parte_dato[1]);
                        $("#listado_usuarios").hide();

                        return false;
                 });
            } else {
              $("#listado_usuarios").hide();
                $("#us_id").val("");
            }
          });

   $("#parte2").submit(function(eve){
      if($("#dni").val()==""){
          $("#falta_beneficiario").show();
          $("#falta_beneficiario").text("debe elegir un elemento de la lista");
          eve.preventDefault();
      }
      if($("#beneficiario").val()==""){
          $("#falta_beneficiario").show();
          $("#falta_beneficiario").text("debe elegir un elemento de la lista");
          eve.preventDefault();
      }
   });

    $("#parte3").submit(function(even){
      if($("#us_id").val()==""){
          $("#falta_usuario").show();
          $("#falta_usuario").text("debe elegir un elemento de la lista");
          even.preventDefault();
      }
      if($("#usuario").val()==""){
          $("#falta_usuario").show();
          $("#falta_usuario").text("debe elegir un elemento de la lista");
          even.preventDefault();
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
