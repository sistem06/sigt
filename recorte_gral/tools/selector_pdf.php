<?php
if (!isset($_SESSION)) { session_start(); }
include("../../".$_SESSION["dir_sis"]."/secure.php");
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
include ("../../funciones/funciones_form.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/estilos_ss.css">
</head>

<body>


  <div class="container">
  <h3>Seleccione los elementos a Informar</h3>
    <form id="parte1" action="../../pdf/informe_general.php" method="post" role="form" target="blank">

     <div class="form-group">
         <div class="checkbox">
            <label>
              <input type="checkbox" name="datos_personales" class="elemento"> Datos Personales
            </label>
         </div>
     </div>

     <div class="form-group">
         <div class="checkbox">
            <label>
              <input type="checkbox" name="documentos_graficos" class="elemento"> Documentos Gráficos
            </label>
         </div>
     </div>

     <div class="form-group">
         <div class="checkbox">
            <label>
              <input type="checkbox" name="datos_hogar" class="elemento"> Datos del Hogar
            </label>
         </div>
     </div>

     <div class="form-group">
         <div class="checkbox">
            <label>
              <input type="checkbox" name="datos_educativos" class="elemento"> Datos Educativos
            </label>
         </div>
     </div>

     <div class="form-group">
         <div class="checkbox">
            <label>
              <input type="checkbox" name="datos_discapacidad" class="elemento"> Discapacidad
            </label>
         </div>
     </div>


  <button type="button" class="btn btn-info" id="envia1">Crear Informe</button>



<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>" />


</form>
</div>
   <script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

<script type="text/javascript" language="javascript">
    $(document).ready(function() {
      $("#envia1").click(function(){
          $("#parte1").submit();
          parent.jQuery.fancybox.close();
      });
    });
</script>
</body>
</html>
