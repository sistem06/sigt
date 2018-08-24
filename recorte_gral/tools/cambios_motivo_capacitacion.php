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
if (!empty($_GET['tc_id'])){
  $titulo = "Modificar Motivo de Capacitacion";
  $titulo_boton = "Hacer Cambios";
  $us_form = InputGeneralVal("text", "zo_name", "form-control", "usuario", "nombre de la zona", "Nombre de la Zona:",BuscaRegistro ("tb_zonas", "zo_id", $_GET['zo_id'], "zo_name"));
   $accion = "M";
} else {
  $titulo = "Nuevo Motivo de Capacitación";
  $titulo_boton = "Guardar";
  $us_form = InputGeneral("text", "tc_name", "form-control", "usuario", "describa el motivo", "Motivo de la capacitacion:");
  $accion = "A";
}
  ?>
  <div class="container">
  <h3><?php echo $titulo; ?></h3>
    <form id="parte1" action="../agrega_modifica_general.php" method="post" role="form">

    <div class="form-group">
   <?php echo $us_form; ?>
<div class="requerido" id="falta_nombre"></div>
</div>

  <button type="submit" class="btn btn-info" id="envia1"><?php echo $titulo_boton; ?></button>



<input type="hidden" name="tc_id" value="<?php echo $_GET['tc_id']; ?>" />

<input type="hidden" name="accion" value="<?php echo $accion; ?>" />

<input type="hidden" name="tabla" value="tb_tipo_capacitaciones" />
</form>
</div>
   <script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>

<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        $("#envia1").click(function() {
            if($("#usuario").val()==""){
            $("#falta_nombre").show();
            $('#falta_nombre').text("Debe completar este campo");
            return false;
            }

        });

            $("#usuario").focusout(function() {
                    if($("#usuario").val().length >= 3) {
                          $.get("comprobar.php", {dnii: $("#usuario").val(), tabla: "tb_zonas", valorbusc: "zo_name"}, function(respuesta){
                    if (respuesta == 1){
                        $("#falta_nombre").show();
                        $('#falta_nombre').text("Ya existe una zona con ese nombre");
                        $('#envia1').attr("disabled", true);
                    } else {
                        $("#falta_nombre").hide();
                        $('#envia1').attr("disabled", false);
                    }
              })
                    }

                  });
    });
</script>
</body>
</html>
