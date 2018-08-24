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

    <?php

  $titulo = "Completando datos de la Prestación <span style='color:#318431'>".BuscaRegistro("tbp_prestaciones_lista","tbp_pr_id",BuscaRegistro("tbp_prestaciones","pre_id",BuscaRegistro("tbp_prestaciones_beneficiarios","pb_id",$_GET['pb_id'],"pb_pre_id"),"pre_pr_id"),"tbp_pr_name")."</span> del Beneficiario <span style='color:#316084'>".BuscaRegistro("tb_datos_personales","dp_id",BuscaRegistro("tbp_prestaciones_beneficiarios","pb_id",$_GET['pb_id'],"pb_dp_id"),"dp_name")."</span>";
  $titulo_boton = "Hacer Cambios";
  $us_form = InputGeneralVal("number", "pbcap_asistencia", "form-control", "asistencia", "porcentaje de asistencia", "Porcentaje de Asistencia:",BuscaRegistro("tbp_capacitaciones","pcap_pb_id",$_GET['pb_id'],"pbcap_asistencia"));
 /* $valor = BuscaRegistro ("tb_usuarios", "us_id", $_GET['us_id'], "us_tipo");
  $us_tipo = SelectGeneralVal("funcion", "form-control", "funcion", "Tipo de Usuario:","tb_tipo_usuarios", "tus_id", "tus_name",$valor,BuscaRegistro ("tb_tipo_usuarios", "tus_id", $valor, "tus_name"));*/
  if (BuscaRegistro ("tbp_capacitaciones", "pcap_pb_id", $_GET['pb_id'], "pcap_aprobo") == 1) {
    $aproba ='checked="checked"';
  } else {
    $aproba = '';
  };
  $propia = '<input type="checkbox" value="1" '.$aproba.' name="pcap_aprobo"> Aprobo';


  $estado = '<input type="checkbox" value="9" name="finaliza"> Dar por Finalizada';

  $accion = "M";

  ?>
  <div class="container">
  <h3><?php echo $titulo; ?></h3>
    <form id="parte1" action="agrega_modifica_general_prestaciones.php" method="post" role="form">

    <div class="form-group">
   <?php echo $us_form; ?>
<div class="requerido" id="falta_asistencia"></div>
</div>

  <div class="checkbox">
  <label>
    <?php echo $propia; ?>
  </label>
</div>

<div class="checkbox">
  <label>
    <?php echo $estado; ?>
  </label>
</div>


<button type="submit" class="btn btn-info" id="envia1"><?php echo $titulo_boton; ?></button>

<input type="hidden" name="pb_id" value="<?php echo $_GET['pb_id']; ?>" />
<input type="hidden" name="accion" value="<?php echo $accion; ?>" />
<input type="hidden" name="tabla" value="tbp_capacitaciones" />
</form>
</div>

<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>

<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        $("#parte1").submit(function(event) {
            if($("#asistencia").val() > 100){
            $("#falta_asistencia").show();
            $('#falta_asistencia').text("El valor maximo permitido es 100");
            event.preventDefault();
            }
        });
    });
</script>
<?php
  if (BuscaRegistro ("tbp_capacitaciones", "pcap_pb_id", $_GET['pb_id'], "pbcap_estado") == 9) {
?>
<script type="text/javascript" language="javascript">
    $(document).ready(function() {
      $('#parte1').find('input, textarea, button, select').attr('disabled','disabled');
    });
</script>
<?php
}
?>
</body>
</html>
