<?php
if (!isset($_SESSION)) { session_start(); }
include("../../".$_SESSION["dir_sis"]."/secure1.php");
include("../../conecta.php");
include("../../funciones/funciones_generales.php");
include("../../funciones/funciones_form.php");
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
      <h3>Agregar Usuario al Área</h3>

      <form id="parte0" method="post" role="form">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title"> <span class="glyphicon glyphicon-search"></span> Usuario </h3>
          </div>
        </div>
        <!-- fin panel -->
        <div class="form-group has-success">
          <label for="username">Usuario:</label>
          <input type="text" class="form-control" id="username" placeholder="ej. apellido.nombre">
          <div class="requerido" id="falta_username">Faltan nombre de usuario</div>
        </div>
        <div class="form-group">
          <button type="button" class="btn btn-info" id="verificar">Buscar</button>
        </div>
        <input type="hidden" id="sistema_actual" value="<?php echo $_SESSION["sistema"]; ?>">
        <input type="hidden" id="esusuario" value="<?php echo $_SESSION["id_us"]; ?>">
      </form>
      <div id="respuesta_usuario" style="display:none;"></div>

    </div>
    <br><br><br><br>

<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript">
  function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
  }
</script>
<script type="text/javascript" language="javascript">
  $(document).ready(function() {
    $("#verificar").click(function() {
      if($("#username").val().length < 6){
        $("#falta_username").show();
      } else {
        var username = $("#username").val();
        var sistema_actual = $("#sistema_actual").val();
        $.get("../../assets/comprobar_inicial_usuario.php", {username: username, tabla: "tb_usuarios", valorbusc: "us_name",actual: sistema_actual}, function(respuesta){
          if(respuesta == "A"){
            //$("#parte0").hide();
            //$("#username").attr('disabled','disabled');
            //$("#username").val(username);
            $("#respuesta_usuario").show();
            $("#respuesta_usuario").html("No existe el Usuario");
            sleep(3000).then(() => {
              //parent.jQuery.fancybox.close();
              $("#username").val("");
              $("#respuesta_usuario").hide();
            });
          } else if (respuesta == "N") {
            $("#respuesta_usuario").show();
            $("#respuesta_usuario").html("Usuario sin Acceso, no se puede agregar al Área.");
            sleep(2000).then(() => {
              $("#username").val("");
              $("#respuesta_usuario").hide();
            });
          } else {
            var res = respuesta.split("|");
            if(res[0]=="B"){
              $("#respuesta_usuario").show();
              $("#respuesta_usuario").html("El usuario ya tiene acceso al área.");
              sleep(2000).then(() => {
                $("#username").val("");
                $("#respuesta_usuario").hide();
              });
            }
            if(res[0]=="C"){
              var usuario = $("#esusuario").val();
              $("#respuesta_usuario").show();
              $("#respuesta_usuario").html("El usuario es de tipo <b>"+res[3].toUpperCase()+"</b> y pertenece a <b>"+res[2].toUpperCase()+
                "</b> ¿desea agregarlo a esta Área? <a href='add_usuario_area_fin.php?us_id="+
                res[1]+"&id_tipo_usr="+res[4]+"'>AGREGAR</a>");
            }
          }
        })
      }
    });
  });
</script>

</body>
</html>
