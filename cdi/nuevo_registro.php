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
      <h3>Nuevo Beneficiario</h3>
<!-- aca comienza el calendario -->
          
<form id="parte1" action="tools/add_registro.php" method="post" role="form">

<?php include("../recorte_gral/datos_personales.php"); ?>
<?php include("../recorte_gral/datos_domicilio.php"); ?>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-pencil"></span>  Inscripción CDI</div>
  </h3>
</div>



<div class="row">
  <div class="col-xs-12 col-md-4">
<div class="form-group has-success">
   <?php echo SelectGeneral("ins_cdi", "form-control", "idcdi", "CDI:","tb_cdi", "cdi_id", "cdi_name"); ?>
   <div class="requerido" id="falta_cdi">Falta completar este campo</div>
  </div>
  </div>
<div class="col-xs-12 col-md-4">
  <div class="form-group has-success">
   <?php echo SelectGeneral("ins_sala", "form-control", "idsalas", "Sala:","tb_salas_cdi", "sal_id", "sal_name"); ?>
   <div class="requerido" id="falta_sala">Falta completar este campo</div>
  </div>
</div>
<div class="col-xs-12 col-md-4">
  <div class="form-group has-success">
   <?php echo SelectGeneral("ins_turno", "form-control", "idturnos", "Turno:","tb_turnos_cdi", "tur_id", "tur_name"); ?>
   <div class="requerido" id="falta_turno">Falta completar este campo</div>
  </div>
</div>
</div>

<div class="form-group">
<label>Motivo:</label>
<textarea class="form-control" rows="3" name="ins_motivo"></textarea>
</div>

<div class="form-group">
<button type="submit" class="btn btn-info" id="envia1">Continuar</button>
</div>
<input type="hidden" name="paso" value="1">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
<input type="hidden" name="sistema" value="<?php echo $_SESSION["sistema"]; ?>">
</form>
  <!-- fin contenido -->
</div>
<br><br><br><br>

<?php include("../recorte_gral/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>


 
  <script type="text/javascript" language="javascript">
    $(document).ready(function() {

      $("#parte1").keypress(function(e) {
          if (e.which == 13) {
          return false;
          }
      });

      $("#envia1").click(function() {
        if($("#idapellido").val()==""){
          $("#falta_apellido").show();
          $("#idapellido").focus();
          return false;
        }
         if($("#idnombre").val()==""){
          $("#falta_nombre").show();
          $("#idnombre").focus();
          return false;
        }
        if($("#idtipodoc").val() == ""){
          $("#falta_tipo_doc").show();
          $("#idtipodoc").focus();
          return false;
        }
        if($("#nrodni").val().length < 8){
          $("#falta_dni").show();
          $("#nrodni").focus();
          return false;
        } else {
             $.get("tools/comprobar_ben.php", {dnii: $("#nrodni").val(), tabla: "tb_datos_personales", valorbusc: "dp_nro_doc"}, function(respuesta){
                    if (respuesta == "B"){
                        $(".yasta").show();
                        $('#envia1').attr("disabled", true);
                        $(".yasta").focus();
                         return false;
                    } 
                    if (respuesta != "B" && respuesta != "A"){
                        $(".yasta").show();
                        $('.yasta').html('Con el nro de documento ingresado ya esta en el sistema <a href="tools/agrega_al_sistema.php?dp_id='+respuesta+'&id_us='+<?php echo $_SESSION["id_us"]; ?>+'"><button type="button" class="btn btn-danger">Agregar este Beneficiario</button></a>');
                        $('#envia1').attr("disabled", true);
                         return false;
                          $(".yasta").focus();
                    } 
              })

        }
         if($("#nacim").val()==""){
          $("#falta_nacim").show();
          $("#nacim").focus();
          return false;
        }
        if($("#nrocuil").val().length < 13){
          $("#falta_cuil").show();
          $("#nrocuil").focus();
          return false;
        }
        if($("#latid").val()==""){
          $("#falta_mapa").show();
          $("#falta_mapa").focus();
          return false;
        }
        if($("#dpmail").val() != "" && ($("#dpmail").val().indexOf('@', 0) == -1 || $("#dpmail").val().indexOf('.', 0) == -1)){
        	$("#falta_mail").show();
          $("#dpmail").focus();
        }
        if($("#idcdi").val()==""){
          $("#falta_cdi").show();
          $("#falta_cdi").focus();
          return false;
        }
        if($("#idsalas").val()==""){
          $("#falta_sala").show();
          $("#falta_sala").focus();
          return false;
        }
        if($("#idturnos").val()==""){
          $("#falta_turno").show();
          $("#falta_turno").focus();
          return false;
        }
      });

      $("#nrodni").keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });
      $("#anos_residencia").keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });

       $("#idnacionalidad").change(function(){
        if($("#idnacionalidad").val() == 1){
          $("#idpaisnacimiento").attr('disabled','disabled');
          $("#anos_residencia").attr('disabled','disabled');
        } else {
            $("#idpaisnacimiento").removeAttr('disabled','disabled');
            $("#anos_residencia").removeAttr('disabled','disabled');
        }
    });
      $("#nrodni").focusout(function() {
        if($("#nrodni").val().length == 8) {
              $.get("tools/comprobar_ben.php", {dnii: $("#nrodni").val(), tabla: "tb_datos_personales", valorbusc: "dp_nro_doc"}, function(respuesta){
                    if (respuesta == "B"){
                        $(".yasta").show();
                        $('#envia1').attr("disabled", true);
                    } 
                    if (respuesta == "A"){
                        $(".yasta").hide();
                        $('#envia1').attr("disabled", false);
                    }
                    if (respuesta != "B" && respuesta != "A"){
                        var res = respuesta.split("|");
                        $(".yasta").show();
                        $('.yasta').html('Con el nro de documento ingresado ya esta en el sistema '+res[1]+' <a href="tools/agrega_al_sistema.php?dp_id='+res[0]+'&id_us='+<?php echo $_SESSION["id_us"]; ?>+'"><button type="button" class="btn btn-danger">Agregar este Beneficiario</button></a>');
                        $('#envia1').attr("disabled", true);
                    } 
              })
        }
    });
    
      $("#idsexo").change(function(){
          if($("#idsexo").val() != 3 && $("#idtipodoc").val()==1 && $("#nrodni").val().length ==8){
            if($("#idsexo").val() == 1){
              var nro_in = 27;
              var pte1 = 38;
            } else {
              var nro_in = 20;
              var pte1 = 10;
            }
            var nr1 = Math.floor($("#nrodni").val()/10000000);
            var nr2 = Math.floor($("#nrodni").val()/1000000)-(nr1 * 10);
            var nr3 = Math.floor($("#nrodni").val()/100000)-((nr1 * 100)+(nr2 * 10));
            var nr4 = Math.floor($("#nrodni").val()/10000)-((nr1 * 1000)+(nr2 * 100)+(nr3 * 10));
            var nr5 = Math.floor($("#nrodni").val()/1000)-((nr1 * 10000)+(nr2 * 1000)+(nr3 * 100)+(nr4 * 10));
            var nr6 = Math.floor($("#nrodni").val()/100)-((nr1 * 100000)+(nr2 * 10000)+(nr3 * 1000)+(nr4 * 100)+(nr5 * 10));
            var nr7 = Math.floor($("#nrodni").val()/10)-((nr1 * 1000000)+(nr2 * 100000)+(nr3 * 10000)+(nr4 * 1000)+(nr5 * 100)+(nr6 * 10));
            var nr8 = $("#nrodni").val()-((nr1 * 10000000)+(nr2 * 1000000)+(nr3 * 100000)+(nr4 * 10000)+(nr5 * 1000)+(nr6 * 100)+(nr7 * 10));
            var sum_nro = pte1 + nr1*3 + nr2*2 + nr3*7 + nr4*6 + nr5*5 + nr6*4 + nr7*3 + nr8*2;
            var cosi = Math.floor(sum_nro / 11);
            var resto = sum_nro - (cosi*11);
              if(resto == 0){
                var zz=0;
              } else {
                  if(resto==1){
                            if($("#idsexo").val() == 1){
                                var nro_in = 23;
                                var zz = 4;
                              } else {
                                var nro_in = 23;
                                var zz = 9;
                              }
                  } else {
                    var zz = 11 - resto;
                  }
              }

            $("#nrocuil").val(nro_in+'-'+$("#nrodni").val()+'-'+zz);
          }
      });

      $("#nacim").focusout(function(){
        var fecha = $("#nacim").val();
        if($("#nacim").val() != ""){
          $.get("tools/calcula_edad.php", {fecha_in: fecha}, function(htmlexterno){
              $("#muestra_edad").val(htmlexterno);
          });
        }
      });

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

<script src="../js/jquery.mask.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function(){
  $('#nrocelu').mask('000-0000000');
  $('#nrotel').mask('000-0000000');
  $('#nrocuil').mask('00-00000000-0');

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
   $("#geoloc").on("mouseover",Buscaloc);
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
  <script type="text/javascript" language="javascript" src="../js/navbar.js"></script>
</body>
</html>