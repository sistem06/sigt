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
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"
</head>
<body>
<?php include("../recorte_gral/encabezado.php"); ?>
<div class="container-fluid">
<?php include("recortes/navegacion.php"); ?>

<div class="container">
      <h3>Modifica Beneficiario</h3>


<?php include("../recorte_gral/datos_personales_mod.php"); ?>



</div>
<br><br><br><br>
<?php include("../recorte_gral/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/validacion_dp_mod.js"></script>
<script type="text/javascript" src="../js/nacionalidad.js"></script>
<script type="text/javascript" src="../js/calculo_edad.js"></script>
<script type="text/javascript" src="../js/calculo_cuil.js"></script>
<script type="text/javascript" language="javascript">
    $(document).ready(function() {

      $("#parte1").keypress(function(e) {
          if (e.which == 13) {
          return false;
          }
      });

      $("#nrodni").attr('disabled','disabled');
      $("#idtipodoc").attr('disabled','disabled');
      $("#idapellido").attr('disabled','disabled');
      $("#idnombre").attr('disabled','disabled');
      var fecha = $("#nacim").val();
        if($("#nacim").val() != ""){
          $.get("../recorte_gral/calcula_edad.php", {fecha_in: fecha}, function(htmlexterno){
              $("#muestra_edad").val(htmlexterno);
          });
        }

        if($('input:radio[name=dp_pueblo_originario]:checked').val()==1){
            $("#lista_pueblos_originarios").show();
        } else {
          $("#lista_pueblos_originarios").hide();
        }

         $(".po").click(function(){
        if($('input:radio[name=dp_pueblo_originario]:checked').val()==1){
            $("#lista_pueblos_originarios").show();
        } else {
          $("#lista_pueblos_originarios").hide();
        }
      });

      $("#nrodni").keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });
      $("#nro_doc").keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });
       $("#anos_residencia").keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });


      if($("#idnacionalidad").val() == 1){
          $("#idpaisnacimiento").attr('disabled','disabled');
          $("#anos_residencia").attr('disabled','disabled');
          $("#anos_residencia").val("");
        } else {
            $("#idpaisnacimiento").removeAttr('disabled','disabled');
            $("#anos_residencia").removeAttr('disabled','disabled');
        }

  });
  </script>
  <script src="../js/bootstrap-typeahead.js"></script>



<script src="../js/jquery.mask.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function(){
  $('#nrocelu').mask('000-00000000');
  $('#nrotel').mask('000-00000000');
  $('#nrocelu1').mask('000-00000000');
  $('#nrotel1').mask('000-00000000');
  $('#nrocuil').mask('00-00000000-0');


  $("#idsexo").change(function(){
      if($("#idsexo").val()==3){
          $("#agregasexo").trigger("click");
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
        $("#agregasexo").fancybox({
        afterClose  : function() {
            $.post("tools/sexos.php",  function(datacurso){
            $("#idsexo").html(datacurso);
            });
        }
    });

});
  </script>


  <script type="text/javascript" language="javascript" src="../js/navbar.js"></script>

</body>
</html>
