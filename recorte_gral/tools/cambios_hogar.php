<?php
require_once '../../_conexion.php';
if (!isset($_SESSION)) { session_start(); }
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
<div class="container" id="selec">

<h3>Miembros del Hogar para los cuales se cambiará la dirección</h3>

<?php
$q = "select * from tb_hogar_beneficiario where hb_ho_id = '".$_GET['ho_id']."' and hb_dp_id <> '".$_GET['dp_id']."'";
$res = mysql_query($q);
?>

<form action="selec_miembros.php" method="post">
<div class="row">
  <div class="col-xs-12 col-md-4">
    <div class="form-group  has-success">

    <?php
    while($miem = mysql_fetch_array($res)){
      echo '
      <div class="checkbox">
        <label>
          <input checked="checked" type="checkbox" name="miembros[]" id="'.$miem['hb_dp_id'].'" value="'.$miem['hb_dp_id'].'">'.
          BuscaRegistro("tb_datos_personales","dp_id",$miem['hb_dp_id'],"dp_name").'
        </label>
      </div> ';
    }
    ?>

    </div>
  </div>
  <div class="col-xs-12 col-md-4">
    <div class="form-group">
      <label>Nota:</label>
      <textarea readonly class="form-control" rows="2" style="overflow:hidden; resize:none;">
Los miembros que NO sean seleccionados permanecerán como un grupo Hogar en la dirección actual.
Los miembros seleccionados formarán un nuevo grupo Hogar en la dirección que se ingrese a continuación.
      </textarea>
    </div>
  </div>
</div> <!-- div class="row" -->
<input type="submit" name="enviar" value="Aceptar Selección" id="envia1" class="btn btn-success"/>
</form>

</div> <!-- class="container" -->

<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
<script src="../../js/bootstrap-typeahead.js"></script>
<script type="text/javascript" language="javascript">
    $(document).ready(function() {
      $("#envia1").click(function() {
        selecMiembrosHogar(document.getElementById('miembros')) ;
      });
    });
</script>

</body>
</html>
