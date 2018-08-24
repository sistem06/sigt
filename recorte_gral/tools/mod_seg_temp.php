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

  switch (BuscaRegistro("tbp_seg_temp","st_pb_id",$_GET['pb_id'],"st_estado")) {
    case '2':
      $pre = '<option value="2">Pendiente</option>';
      break;
    case '3':
      $pre = '<option value="3">En Curso</option>';
      break;
    case '9':
      $pre = '<option value="9">Finalizado</option>';
      break;
    case '4':
      $pre = '<option value="4">Baja</option>';
      break;
  }



  $accion = "M";

  ?>
  <div class="container">
  <h3><?php echo $titulo; ?></h3>
    <form id="parte1" action="agrega_modifica_general_prestaciones.php" method="post" role="form">

    <div class="form-group">
    <label>Estado</label>
    <select name="st_estado" class="form-control">
      <?php echo $pre; ?>
      <option value="9">Finalizado</option>
      <option value="4">Baja</option>
    </select>
    </div>

     <div class="form-group">
     <label>Detalle</label>
    <textarea name="st_detalle" class="form-control"><?php echo BuscaRegistro("tbp_seg_temp","st_pb_id",$_GET['pb_id'],"st_detalle"); ?></textarea>
    </div>





<button type="submit" class="btn btn-info" id="envia1"><?php echo $titulo_boton; ?></button>

<input type="hidden" name="pb_id" value="<?php echo $_GET['pb_id']; ?>" />
<input type="hidden" name="accion" value="<?php echo $accion; ?>" />
<input type="hidden" name="tabla" value="tbp_seg_temp" />
</form>
</div>

<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>


<?php
  if (BuscaRegistro ("tbp_seg_temp", "st_pb_id", $_GET['pb_id'], "st_estado") == 9 or BuscaRegistro ("tbp_seg_temp", "st_pb_id", $_GET['pb_id'], "st_estado") == 4) {
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
