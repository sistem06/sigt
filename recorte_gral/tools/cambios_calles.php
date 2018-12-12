<?php
if (!isset($_SESSION)) { session_start(); }
include ("../../".$_SESSION["dir_sis"]."/secure.php");
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

    <?php
if (!empty($_GET['ca_id'])){
  $titulo = "Modificar Calle";
  $titulo_boton = "Hacer Cambios";
  $calle = InputGeneralVal("text", "ca_name", "form-control", "usuario", "nombre de la calle en PGM", "Nombre en PGM:",BuscaRegistro ("tb_calle", "ca_id", $_GET['ca_id'], "ca_name"));
  $us_form = InputGeneralVal("text", "ca_gm", "form-control", "usuario1", "nombre de la calle en google", "Nombre en Google Maps:",BuscaRegistro ("tb_calle", "ca_id", $_GET['ca_id'], "ca_gm"));


  $accion = "M";
} else {
  $titulo = "Nueva Calle";
  $titulo_boton = "Guardar";
   $calle = InputGeneral("text", "ca_name", "form-control", "usuario", "nombre de la calle en PGM", "Nombre en Google PGM:");
  $us_form = InputGeneral("text", "ca_gm", "form-control", "usuario1", "nombre de la calle en google", "Nombre en Google Maps:");


  $accion = "A";
}
  ?>
  <div class="container">
  <h3><?php echo $titulo; ?></h3>
    <form id="parte1" action="../agrega_modifica_general.php" method="post" role="form">

     <div class="form-group has-success">
   <?php echo $calle; ?>
   <div class="requerido" id="falta_nombre"></div>
</div>


  <div class="form-group">
   <?php echo $us_form; ?>
</div>



  <button type="submit" class="btn btn-info" id="envia1"><?php echo $titulo_boton; ?></button>



<input type="hidden" name="ca_id" value="<?php echo $_GET['ca_id']; ?>" />

<input type="hidden" name="accion" value="<?php echo $accion; ?>" id="accion" />

<input type="hidden" name="tabla" value="tb_calle" />
</form>
</div>
   <script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
 <script src="../../js/bootstrap-typeahead.js"></script>
<script type="text/javascript" language="javascript">
    $(document).ready(function() {


        $("#envia1").click(function() {
           if($("#accion").val()=="A"){
            if($("#usuario").val()==""){
            $("#falta_nombre").show();
            $('#falta_nombre').text("Debe completar este campo");
            return false;
            }
             }
        });
/*
        $("#usuario").focusout(function() {
                    if($("#usuario").val().length >= 3) {
                          $.get("comprobar.php", {dnii: $("#usuario").val(), tabla: "tb_titulo_secundario", valorbusc: "fp_name"}, function(respuesta){
                    if (respuesta == 1){
                        $("#falta_nombre").show();
                        $('#falta_nombre').text("Ya existe un titulo con ese nombre");
                        $('#envia1').attr("disabled", true);
                    } else {
                        $("#falta_nombre").hide();
                        $('#envia1').attr("disabled", false);
                    }
              })
                    }

                  });
*/
    });
</script>

</body>
</html>
