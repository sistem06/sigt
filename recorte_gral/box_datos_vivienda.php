<?php
require_once '../_conexion.php';
$ho_ben = HogarBeneficiario::find_by_hb_dp_id($_GET['dp_id']);
$hogar_id = "";
if (isset($ho_ben)) {
  $hogar_id = $ho_ben->hb_ho_id;
};

echo '
<div class="col-xs-12 col-sm-6 col-md-3">
  <div class="panel panel-warning">
    <div class="panel-heading">
     <h3 class="panel-title"><span class="glyphicon glyphicon-picture"></span>Datos de la Vivienda</h3>
    </div>
    <div class="panel-body">
      <p>Vivienda Nro: <strong>'.BuscaRegistro ("tb_hogar", "ho_id", $hogar_id, "ho_vivienda_lote_nro").'</strong></p>
      <p>Cant. de Viviendas en el Lote: <strong>'.BuscaRegistro ("tb_hogar", "ho_id", $hogar_id, "ho_viviendas_lote").'</strong></p>
      <p>Hogar Nro: <strong>'.BuscaRegistro ("tb_hogar", "ho_id", $hogar_id, "ho_hogar_lote_nro").'</strong></p>
      <p>Cant. de Hogares en el Lote: <strong>'.BuscaRegistro ("tb_hogar", "ho_id", $hogar_id, "ho_hogares_lote").'</strong></p>
      <p>Fecha de fijación del domicilio: <strong>'.BuscaRegistro ("tb_hogar", "ho_id", $hogar_id, "ho_inicio").'</strong></p>';

      $documentacion = BuscaRegistro("tb_hogar_propiedad", "pr_ho_id", $hogar_id, "pr_documentacion");
      $ocup = BuscaRegistro("tb_hogar_propiedad", "pr_ho_id", $hogar_id, "pr_ocupacion");
      $uso = BuscaRegistro("tb_hogar_propiedad", "pr_ho_id", $hogar_id, "pr_uso");

      $disabled = "";
      $btn_label = "Modificar";
      $tiene_hogar = BuscaRegistro("tb_hogar_beneficiario","hb_dp_id",$_GET['dp_id'],"hb_ho_id");
      if (!isset($tiene_hogar)) {
        $disabled = "disabled";
        $btn_label = "Falta Domicilio";
      }

      echo '
      <p>La vivienda que ocupa es?: <strong>'.BuscaRegistro ("tb_condicion_uso", "cu_id", $uso, "cu_name").'</strong></p>

      <p>El terreno es..: <strong>'.BuscaRegistro ("tb_condicion_ocupacion", "co_id", $ocup, "co_name").'</strong></p>
      <p>Documentación de la Vivienda: <strong>'.BuscaRegistro ("tb_documentacion_vivienda", "dv_id", $documentacion, "dv_name").'</strong></p>
      <a href="datos_vivienda.php?dp_id='.$_GET['dp_id'].'"><button type="button" '.$disabled.' class="btn btn-warning">'.$btn_label.'</button></a>
    </div>
  </div>
</div>';
?>
