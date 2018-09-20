<?php
if (!isset($_SESSION)) { session_start(); }
include("../".$_SESSION["dir_sis"]."/secure1.php");
include("../conecta.php");
include("../funciones/funciones_generales.php");
include("../funciones/funciones_form.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/estilos_ss.css">
</head>

<body>

 <?php
   if (!empty($_GET['us_id'])){
     $titulo = "Modificar Usuario";
     $titulo_boton = "Hacer Cambios";
     $us_nombre = InputGeneralVal("text", "nombre", "form-control", "nombre", "nombre del usuario", "Nombre:",BuscaRegistro ("tb_usuarios", "us_id", $_GET['us_id'], "us_nombre"));
     $us_apellido = InputGeneralVal("text", "apellido", "form-control", "apellido", "apellido del usuario", "Apellido:",BuscaRegistro ("tb_usuarios", "us_id", $_GET['us_id'], "us_apellido"));
     if(BuscaRegistro("tb_usuarios","us_id",$_GET['us_id'],"us_login")==1){$us_login = " checked ";} else {$us_login = "";}
     $us_form = InputGeneralVal("text", "usuario", "form-control", "usuario", "recomendado apellido.nombre", "Usuario:",BuscaRegistro ("tb_usuarios", "us_id", $_GET['us_id'], "us_name"));
     $valor = BuscaRegistroDoble ("tb_usuarios_sistemas", "uss_us_id", $_GET['us_id'],"uss_sistema",$_SESSION['sistema'],"uss_tipo");
     $us_tipo = SelectGeneralVal("funcion", "form-control", "funcion", "Tipo de Usuario:","tb_tipo_usuarios", "tus_id", "tus_name",$valor,BuscaRegistro ("tb_tipo_usuarios", "tus_id", $valor, "tus_name"));
     $accion = "M";
     $obs = BuscaRegistro ("tb_usuarios", "us_id", $_GET['us_id'], "us_observaciones");
   } else {
     $titulo = "Nuevo Usuario";
     $titulo_boton = "Guardar";
     $us_nombre = InputGeneralVal("text", "nombre", "form-control", "nombre", "nombre de usuario", "Nombre:","");
     $us_apellido = InputGeneralVal("text", "apellido", "form-control", "apellido", "apellido de usuario", "Apellido:","");
     $us_login = " checked ";
     $us_form = InputGeneralVal("text", "usuario", "form-control", "usuario", "recomendado apellido.nombre", "Usuario:","");
     $us_tipo = SelectGeneral("funcion", "form-control", "funcion", "Tipo de Usuario:","tb_tipo_usuarios", "tus_id", "tus_name");
     $accion = "A";
     $obs = "";
   }
 ?>

 <div class="container">
 <h3><?php echo $titulo; ?></h3>
   <form id="parte1" action="agrega_modifica_general.php" method="post" role="form">

   <!-- Nombre -->
   <div class="form-group has-success">
     <?php echo $us_nombre; ?>
     <div class="requerido" id="falta_nombre"></div>
   </div>

   <!-- Apellido -->
   <div class="form-group has-success">
     <?php echo $us_apellido; ?>
     <div class="requerido" id="falta_apellido"></div>
   </div>

   <!-- Usuario -->
   <div class="form-group has-success">
     <?php echo $us_form; ?>
     <div class="requerido" id="falta_usuario"></div>
   </div>

   <!-- Commentarios -->
   <div class="form-group">
     <label> Comentarios </label>
     <textarea name="observaciones" class="form-control" rows="3" style="overflow:hidden; resize:none;"><?php echo $obs; ?></textarea>
   </div>
   <!-- Login -->

   <div class="checkbox">
     <label>
       <input type="checkbox" name="us_login" id="us_login" <?php echo $us_login; ?>>
       Tiene acceso al sistema?
     </label>
   </div>

   <div id="aa1" style="display:none;">

       <!-- Login -->
       <div class="checkbox">
         <label>
           <input type="checkbox" name="modifpass" id="modifpass">
           Modificar Contraseña
         </label>
       </div>

       <div class="form-group">
        <?php echo InputGeneral("password", "pass", "form-control", "pass", "Contraseña: minimo seis caracteres", "Contraseña:"); ?>
        <div class="requerido" id="falta_pass"></div>
       </div>

       <div class="form-group">
        <?php echo InputGeneral("password", "pass1", "form-control", "pass1", "Repita la contraseña", "Confirme Contraseña:"); ?>
        <div class="requerido" id="falta_pass1"></div>
       </div>

       <div class="form-group has-success">
        <?php echo $us_tipo; ?>
        <div class="requerido" id="falta_tipo"></div>
       </div>

   </div>

   <button type="submit" class="btn btn-info" id="envia1"><?php echo $titulo_boton; ?></button>

   <input type="hidden" name="us_id" value="<?php echo $_GET['us_id']; ?>" />
   <input type="hidden" name="accion" value="<?php echo $accion; ?>" />
   <input type="hidden" name="sistema" value="<?php echo $_SESSION["sistema"]; ?>" />
   <input type="hidden" name="tabla" value="tb_usuarios" />
   </form>

   </div>
   <script type="text/javascript" src="../js/jquery.js"></script>
   <script type="text/javascript" src="../js/bootstrap.min.js"></script>

   <script type="text/javascript" language="javascript">
       $(document).ready(function() {

         $("input:checkbox[name=us_login]").change(function () {
           var x = document.getElementById("us_login").checked;
           //var x = $("#us_login").checked;
           if(x == true){
             $("#aa1").show();
           } else {
             $("#aa1").hide();
           }
         });

         //if($("input:checkbox[name=us_login]:checked").val()==1){
         //if($("input:checkbox[name=us_login]:checked")){
         var z = document.getElementById("us_login").checked;
         if(z == true){
           $("#aa1").show();
         } else {
           $("#aa1").hide();
         }

         if ('<?php echo $accion; ?>' == 'M') {
           document.getElementById("usuario").disabled = true;
           document.getElementById("pass").disabled = true;
           document.getElementById("pass1").disabled = true;
         } else {
           document.getElementById("usuario").disabled = false;
           document.getElementById("pass").disabled = false;
           document.getElementById("pass1").disabled = false;
           document.getElementById("modifpass").checked = true;
         }


         $("input:checkbox[name=modifpass]").change(function () {
           var modifpass = document.getElementById("modifpass").checked;
           if (modifpass == true) {
             document.getElementById("pass").disabled = false;
             document.getElementById("pass1").disabled = false;
           } else {
             document.getElementById("pass").disabled = true;
             document.getElementById("pass1").disabled = true;
           }
         });

           $("#envia1").click(function() {
             if($("#nombre").val()==""){
               $("#falta_nombre").show();
               $('#falta_nombre').text("Debe completar este campo");
               return false;
             }
             if($("#apellido").val()==""){
               $("#falta_apellido").show();
               $('#falta_apellido').text("Debe completar este campo");
               return false;
             }
               if($("#usuario").val()==""){
                 $("#falta_usuario").show();
                 $('#falta_usuario').text("Debe completar este campo");
                 return false;
               }
               if($("#usuario").val().length < 6){
                 $("#falta_usuario").show();
                 $('#falta_usuario').text("Este campo debe tener al menos 6 caracteres");
                 return false;
               }

               var x = document.getElementById("us_login").checked;
               var y = document.getElementById("modifpass").checked;
               if(x == true && y == true){
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
               }
               if (x == true) {
                 if($("#funcion").val()==0){
                   $("#falta_tipo").show();
                   $('#falta_tipo').text("Debe elegir alguna opcion en este campo");
                   return false;
                 }
               }
           }); //envia1()

               $("#usuario").focusout(function() {
                 if($("#usuario").val().length >= 6) {
                   $.get("comprobar.php", {dnii: $("#usuario").val(), tabla: "tb_usuarios", valorbusc: "us_name"}, function(respuesta){
                     if (respuesta == 1){
                         $("#falta_usuario").show();
                         $('#falta_usuario').text("Ya existe un usuario con ese nombre");
                         $('#envia1').attr("disabled", true);
                     } else {
                         $("#falta_usuario").hide();
                         $('#envia1').attr("disabled", false);
                     }
                   })
                 }
               });
       });
   </script>

</body>
</html>
