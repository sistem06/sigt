<?php
if (!isset($_SESSION)) { session_start(); }
include("../../".$_SESSION["dir_sis"]."/secure1.php");
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
  if(BuscaRegistro("tbp_prestacion_type","pt_id",BuscaRegistro("tbp_prestaciones_lista","tbp_pr_id",$_GET['tbp_pr_id'],"tbp_pt_id"),"pt_gr")==0){
  $select_car = '<option value="0">Individual</option>'; } else { $select_car = '<option value="1">Grupal</option>'; }
  $select_tipo = "<option></option>";
 // $select_tipo = '<option value="'.BuscaRegistro("tbp_prestaciones_lista","tbp_pr_id",$_GET['tbp_pr_id'],"tbp_pt_id").'">'.BuscaRegistro("tbp_prestacion_type","pt_id",BuscaRegistro("tbp_prestaciones_lista","tbp_pr_id",$_GET['tbp_pr_id'],"tbp_pt_id"),"pt_name").'</option>';
  $input_name = BuscaRegistro("tbp_prestaciones_lista","tbp_pr_id",$_GET['tbp_pr_id'],"tbp_pr_name");
  if(BuscaRegistro("tbp_prestaciones_lista","tbp_pr_id",$_GET['tbp_pr_id'],"tbp_in_compartida")==1){$input_comparte = " checked ";} else {$input_comparte = "";}
  $fechin = BuscaRegistro("tbp_prestaciones_lista","tbp_pr_id",$_GET['tbp_pr_id'],"tbp_pr_fecha_in");
  $fechout = BuscaRegistro("tbp_prestaciones_lista","tbp_pr_id",$_GET['tbp_pr_id'],"tbp_pr_fecha_out");
  $accion = "M";
} else {
  $titulo = "Nueva Prestación";
  $titulo_boton = "Agregar";
  $select_car = "<option></option>";
  $select_tipo = "<option></option>";
  $input_name = "";
  $input_comparte = " checked ";
  $fechin = date("Y-m-d");
  $fechout = "";
  $accion = "A";
}
  ?>
  <div class="container">
  <h3><?php echo $titulo; ?></h3>
    <form id="parte1" action="agrega_modifica_general_prestaciones.php" method="post" role="form">

      <div class="form-group has-success">
      <label>Caracteristica:</label>
      <select id="caracteristicas" class="form-control">
        <?php echo $select_car; ?>
        <option value="0">Individual</option>
        <option value="1">Grupal</option>
      </select>
      <div class="requerido" id="falta_caracteristicas"></div>
      </div>

    <div class="form-group has-success">
      <label>Tipo:</label>
      <select name="tipo" id="tipo" class="form-control">
      <?php echo $select_tipo; ?>
      </select>
        <div class="requerido" id="falta_tipo"></div>
    </div>

    <div class="form-group has-success">
    <label>Nombre:</label>
      <input name="tbp_pr_name" id="nombre" type="text" class="form-control" value="<?php echo $input_name; ?>" autocomplete="off">

        <div class="requerido" id="falta_nombre"></div>
    </div>

      <div class="checkbox">
  <label>
    <input type="checkbox" name="tbp_in_compartida" id="compartida" value="1" <?php echo $input_comparte; ?>>
    Comparte la información de esta prestación con otras áreas
  </label>
</div>

   <div class="form-group has-success">
    <label>Fecha Inicio:</label>
      <input name="tbp_pr_fecha_in" id="fecha_in" type="date" class="form-control" value="<?php echo $fechin; ?>">

        <div class="requerido" id="falta_fecha_in"></div>
    </div>

    <div class="form-group has-success">
    <label>Fecha Final:</label>
      <input name="tbp_pr_fecha_out" id="fecha_out" type="date" class="form-control" value="<?php echo $fechout; ?>">

        <div class="requerido" id="falta_fecha_out"></div>
    </div>

  <button type="submit" class="btn btn-info" id="envia1"><?php echo $titulo_boton; ?></button>



<input type="hidden" id="es_id" name="tbp_pr_id" value="<?php if(isset($_GET['tbp_pr_id'])) { echo $_GET['tbp_pr_id']; } else { echo '0'; } ?>" />

<input type="hidden" name="accion" value="<?php echo $accion; ?>" />

<input type="hidden" name="sistema" value="<?php echo $_SESSION['sistema']; ?>" />

<input type="hidden" name="usuario" value="<?php echo $_SESSION['id_us']; ?>" />

<input type="hidden" name="tabla" value="tbp_prestaciones_lista" />

<input type="hidden" id="estipo" value="<?php echo BuscaRegistro("tbp_prestaciones_lista","tbp_pr_id",$_GET['tbp_pr_id'],"tbp_pt_id"); ?>" />

</form>
</div>
   <script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>

<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        $("#parte1").submit(function(event) {

            if($("#caracteristicas").val()==""){
            $("#falta_caracteristicas").show();
            $('#falta_caracteristicas').text("Debe completar este campo");
            event.preventDefault();
            }
             if($("#nombre").val()==""){
            $("#falta_nombre").show();
            $('#falta_nombre').text("Debe completar este campo");
            event.preventDefault();
            }
            if($("#fecha_in").val()==""){
            $("#falta_fecha_in").show();
            $('#falta_fecha_in').text("Debe completar este campo");
            event.preventDefault();
            }
             if($("#fecha_out").val()==""){
            $("#falta_fecha_out").show();
            $('#falta_fecha_out').text("Debe completar este campo");
            event.preventDefault();
            }
            if($("#fecha_out").val()<$("#fecha_in").val()){
            $("#falta_fecha_out").show();
            $('#falta_pass1').text("La fecha final debe ser mayor que la fecha inicial");
            event.preventDefault();
            }

         /*  $.get("busca_name.php",{nom:$("#nombre").val(), id:$("#es_id").val()},function(datos_name){
              if(datos_name != 0){
                $("#falta_nombre").show();
            $('#falta_nombre').text("El nombre ingresado ya fue usado");
              event.preventDefault();
              return false;
            }

          });*/

        });


        $("#caracteristicas").change(function(){
          var car = $("#caracteristicas").val();
        //  alert(car);
          $.get("busca_car.php",{car:car},function(tipos){
            $("#tipo").html(tipos);
          });
        });

        if($("#caracteristicas").val() != ""){
          var car = $("#caracteristicas").val();
          var estipo = $("#estipo").val();
        //  alert(car);
          $.get("busca_car.php",{car:car, estipo:estipo},function(tipos){
            $("#tipo").html(tipos);
          });
        }
    });
</script>
</body>
</html>
