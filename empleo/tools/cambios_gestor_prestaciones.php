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
if (!empty($_GET['tbp_pr_id'])){
  $titulo = "Modificar Prestación";
  $titulo_boton = "Hacer Cambios";
  $select_tipo = '<option value="'.BuscaRegistro("tbp_prestaciones_lista","tbp_pr_id",$_GET['tbp_pr_id'],"tbp_pt_id").'">'.BuscaRegistro("tbp_prestacion_type","pt_id",BuscaRegistro("tbp_prestaciones_lista","tbp_pr_id",$_GET['tbp_pr_id'],"tbp_pt_id"),"pt_name").'</option>';
  $input_name = BuscaRegistro("tbp_prestaciones_lista","tbp_pr_id",$_GET['tbp_pr_id'],"tbp_pr_name");
  if(BuscaRegistro("tbp_prestaciones_lista","tbp_pr_id",$_GET['tbp_pr_id'],"tbp_in_compartida")==1){$input_comparte = " checked ";} else {$input_comparte = "";}
  $accion = "M";
} else {
  $titulo = "Nueva Prestación";
  $titulo_boton = "Agregar";
  $select_tipo = "<option></option>";
  $input_name = "";
  $input_comparte = " checked ";
  $accion = "A";
}
  ?>
  <div class="container">
  <h3><?php echo $titulo; ?></h3>
    <form id="parte1" action="agrega_modifica_general_prestaciones.php" method="post" role="form">

    <div class="form-group has-success">
      <label>Tipo:</label>
      <select name="tipo" id="tipo" class="form-control">
        <?php
          $query_tipo = mysql_query("SELECT * FROM tbp_prestacion_type order by pt_name");
         echo $select_tipo;
          while ($data_tipo = mysql_fetch_array($query_tipo)) {
            echo '<option value="'.$data_tipo['pt_id'].'">'.$data_tipo['pt_name'].'</option>';
          }
        ?>
      </select>
        <div class="requerido" id="falta_tipo"></div>
    </div>

    <div class="form-group has-success">
    <label>Nombre:</label>
      <input name="tbp_pr_name" id="nombre" type="text" class="form-control" value="<?php echo $input_name; ?>">
        
        <div class="requerido" id="falta_nombre"></div>
    </div>

      <div class="checkbox">
  <label>
    <input type="checkbox" name="tbp_in_compartida" id="compartida" value="1" <?php echo $input_comparte; ?>>
    Comparte la información de esta prestación con otras áreas
  </label>
</div>

  <button type="submit" class="btn btn-info" id="envia1"><?php echo $titulo_boton; ?></button>
  


<input type="hidden" name="tbp_pr_id" value="<?php echo $_GET['tbp_pr_id']; ?>" />

<input type="hidden" name="accion" value="<?php echo $accion; ?>" />

<input type="hidden" name="sistema" value="<?php echo $_SESSION['sistema']; ?>" />

<input type="hidden" name="usuario" value="<?php echo $_SESSION['id_us']; ?>" />

<input type="hidden" name="tabla" value="tbp_prestaciones_lista" />
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