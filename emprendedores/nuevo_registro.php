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
      <h3>Nuevo Beneficiario</h3>       
        <form id="parte0" method="post" role="form">
            <div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title"> <span class="glyphicon glyphicon-search"></span>  Dato Inicial </h3>
  </div>
</div>
<!-- fin panel -->
  <div class="form-group has-success">
  <label for="nro_doc">Número de Documento:</label>
  <input type="text" class="form-control" id="nro_doc" maxlength="8">
  <div class="requerido" id="falta_nro_doc">Faltan números en el DNI ingresado</div>
</div>
<div class="form-group">
<button type="button" class="btn btn-info" id="verificar">Verificar</button>
</div>
<input type="hidden" id="sistema_actual" value="<?php echo $_SESSION["sistema"]; ?>">
<input type="hidden" id="esusuario" value="<?php echo $_SESSION["id_us"]; ?>">
</form>
<div id="respuesta_dni_anterior" style="display:none;"></div>
<div id="respuesta_dni_nueva" style="display:none;"><?php include("datos_personales.php"); ?></div>



</div>
<br><br><br><br>
<?php include("../recorte_gral/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

 <script type="text/javascript" src="../js/validacion_inicial_dp.js"></script>
 <script type="text/javascript" src="../js/validacion_dp.js"></script>
 <script type="text/javascript" src="../js/nacionalidad.js"></script>
 <script type="text/javascript" src="../js/calculo_cuil.js"></script>
 <script type="text/javascript" src="../js/calculo_edad.js"></script>
 <script type="text/javascript" src="../js/predictivo_calles.js"></script>
 <script type="text/javascript" src="../js/busca_barrio.js"></script>
 <script type="text/javascript" src="../js/geolocaliza.js"></script>
 <script type="text/javascript" src="../js/validacion_calle.js"></script>
 <script type="text/javascript" src="../js/combinado_localidades.js"></script>
 <script type="text/javascript" src="../js/emergente_sexo.js"></script>
<script type="text/javascript" language="javascript">

    $(document).ready(function() {

      $("#nrodni").keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });
      $("#nro_doc").keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });
       $("#anos_residencia").keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });

           $(".po").click(function(){
        if($('input:radio[name=dp_pueblo_originario]:checked').val()==1){
            $("#lista_pueblos_originarios").show();
        } else {
          $("#lista_pueblos_originarios").hide();
        }
      });
  });
  </script>

<script src="../js/jquery.mask.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function(){
  $('#nrocelu').mask('000-0000000');
  $('#nrotel').mask('000-0000000');
  $('#nrocelu1').mask('000-0000000');
  $('#nrotel1').mask('000-0000000');
  $('#nrocuil').mask('00-00000000-0');

      var elegido=$("#iddepartamento").val();
      $.post("../recorte_gral/localidades.php", { elegido: elegido }, function(data){
            $("#idlocalidad").html(data);
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