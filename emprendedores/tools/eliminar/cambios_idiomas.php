<?php
include("../secure.php");
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
if (!empty($_GET['zo_id'])){
  $titulo = "Modificar Zona de Comercializacion";
  $titulo_boton = "Hacer Cambios";
  $us_form = InputGeneralVal("text", "zo_name", "form-control", "usuario", "nombre de la zona", "Nombre de la Zona:",BuscaRegistro ("tb_zonas", "zo_id", $_GET['zo_id'], "zo_name"));
 /* $valor = BuscaRegistro ("tb_usuarios", "us_id", $_GET['us_id'], "us_tipo");
  $us_tipo = SelectGeneralVal("funcion", "form-control", "funcion", "Tipo de Usuario:","tb_tipo_usuarios", "tus_id", "tus_name",$valor,BuscaRegistro ("tb_tipo_usuarios", "tus_id", $valor, "tus_name"));*/
  $accion = "M";
} else {
  $titulo = "Nuevo Idioma";
  $titulo_boton = "Guardar";
  $us_form = InputGeneral("text", "idi_name", "form-control", "usuario", "nuevo idioma", "Idioma a agregar:");
  /*$us_tipo = SelectGeneral("funcion", "form-control", "funcion", "Tipo de Usuario:","tb_tipo_usuarios", "tus_id", "tus_name");*/
  $accion = "A";
}
  ?>
  <div class="container">
  <h3><?php echo $titulo; ?></h3>
    <form id="parte1" action="agrega_modifica_general.php" method="post" role="form">

    <div class="form-group">
   <?php echo $us_form; ?>
<div class="requerido" id="falta_nombre"></div>
</div>


  <button type="submit" class="btn btn-info" id="envia1"><?php echo $titulo_boton; ?></button>
  


<input type="hidden" name="idi_id" value="<?php echo $_GET['idi_id']; ?>" />

<input type="hidden" name="accion" value="<?php echo $accion; ?>" />

<input type="hidden" name="tabla" value="tb_idiomas" />
</form>
</div>
   <script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

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
                          $.get("comprobar.php", {dnii: $("#usuario").val(), tabla: "tb_idiomas", valorbusc: "idi_name"}, function(respuesta){
                    if (respuesta == 1){
                        $("#falta_nombre").show();
                        $('#falta_nombre').text("Ya existe ese idioma");
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