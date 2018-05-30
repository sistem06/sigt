<?php
include("../secure1.php");
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
if (!empty($_GET['us_id'])){
  $titulo = "Modificar Usuario";
  $titulo_boton = "Hacer Cambios";
  $us_form = InputGeneralVal("text", "usuario", "form-control", "usuario", "nombre de usuario recomendado apellido.nombre", "Usuario:",BuscaRegistro ("tb_usuarios", "us_id", $_GET['us_id'], "us_name"));
  $valor = BuscaRegistroDoble ("tb_usuarios_sistemas", "uss_us_id", $_GET['us_id'],"uss_sistema","1","uss_tipo");
  $us_tipo = SelectGeneralVal("funcion", "form-control", "funcion", "Tipo de Usuario:","tb_tipo_usuarios", "tus_id", "tus_name",$valor,BuscaRegistro ("tb_tipo_usuarios", "tus_id", $valor, "tus_name"));
  $accion = "M";
} else {
  $titulo = "Nuevo Usuario";
  $titulo_boton = "Guardar";
  $us_form = InputGeneralVal("text", "usuario", "form-control", "usuario", "nombre de usuario recomendado apellido.nombre", "Usuario:","");
  $us_tipo = SelectGeneral("funcion", "form-control", "funcion", "Tipo de Usuario:","tb_tipo_usuarios", "tus_id", "tus_name");
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

<div class="form-group">
   <?php echo InputGeneral("password", "pass", "form-control", "pass", "Contraseña: minimo seis caracteres", "Contraseña:"); ?>
   <div class="requerido" id="falta_pass"></div>
  </div>

  <div class="form-group">
   <?php echo InputGeneral("password", "pass1", "form-control", "pass1", "Repita la contraseña", "Confirme Contraseña:"); ?>
   <div class="requerido" id="falta_pass1"></div>
  </div>

<div class="form-group">
   <?php echo $us_tipo; ?>
   <div class="requerido" id="falta_tipo"></div>
  </div>

  <button type="submit" class="btn btn-info" id="envia1"><?php echo $titulo_boton; ?></button>
  


<input type="hidden" name="us_id" value="<?php echo $_GET['us_id']; ?>" />

<input type="hidden" name="accion" value="<?php echo $accion; ?>" />

<input type="hidden" name="sistema" value="1" />

<input type="hidden" name="tabla" value="tb_usuarios" />
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
             if($("#usuario").val().length < 6){
            $("#falta_nombre").show();
            $('#falta_nombre').text("Este campo debe tener al menos 6 caracteres");
            return false;
            }
            if($("#pass").val()==""){
            $("#falta_pass").show();
            $('#falta_pass').text("Debe completar este campo");
            return false;
            }
             if($("#pass").val().length < 6){
            $("#falta_pass").show();
            $('#falta_pass').text("Este campo debe tener al menos 6 caracteres");
            return false;
            }
            if($("#pass1").val()==""){
            $("#falta_pass1").show();
            $('#falta_pass1').text("Debe completar este campo");
            return false;
            }
             if($("#pass1").val().length < 6){
            $("#falta_pass1").show();
            $('#falta_pass1').text("Este campo debe tener al menos 6 caracteres");
            return false;
            }
            if($("#pass").val() != $("#pass1").val()){
            $("#falta_pass1").show();
            $('#falta_pass1').text("Las contraseñas no coinciden");
            return false;
            }
            if($("#funcion").val()==""){
            $("#falta_tipo").show();
            $('#falta_tipo').text("Debe elegir alguna opcion en este campo");
            return false;
            }
        });

            $("#usuario").focusout(function() {
                    if($("#usuario").val().length >= 6) {
                          $.get("comprobar.php", {dnii: $("#usuario").val(), tabla: "tb_usuarios", valorbusc: "us_name"}, function(respuesta){
                    if (respuesta == 1){
                        $("#falta_nombre").show();
                        $('#falta_nombre').text("Ya existe un usuario con ese nombre");
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