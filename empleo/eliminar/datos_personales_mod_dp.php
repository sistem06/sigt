<form id="parte1" action="tools/add_registro.php" method="post" role="form">
<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-user"></span>  Datos Personales </h3>
</div>
</div>

<div class="row">
  <div class="col-xs-12 col-md-6">
   <div class="form-group has-success">
   <?php echo SelectGeneralSO("dp_tipo_doc", "form-control", "idtipodoc", "Tipo de documento:","tb_docs", "do_id", "do_name"); ?>

</div>
   </div>
   <div class="col-xs-12 col-md-6">
   <div class="form-group has-success">
   <label for="nrodni">Nro de Documento:</label>
    <input type="text" class="form-control" id="nrodni" name="dp_nro_doc"
           placeholder="escriba el nro de Documento" maxlength="8" value="<?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_nro_doc"); ?>">
    <div class="requerido" id="falta_dni">Falta completar este campo o nro incorrecto</div>
    <div class="requerido" id="faltadni"></div>
    </div>
   </div>
   </div>

<div class="row">
  <div class="col-xs-12 col-md-6">
  <div class="form-group has-success">
   <?php echo InputGeneralVal("text", "dp_apellido", "form-control", "idapellido", "escriba el apellido", "Apellido:",BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_apellido")); ?>
   <div class="requerido" id="faltaapellido"></div>
</div>
   </div>
   <div class="col-xs-12 col-md-6">
   <div class="form-group has-success">
   <?php echo InputGeneralVal("text", "dp_nombre", "form-control", "idnombre", "escriba el nombre", "Nombre:",BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_nombre")); ?>
   <div class="requerido" id="faltanombre"></div>
</div>
   </div>
   </div>
   
<div class="form-group">
<button type="submit" class="btn btn-info" id="envia1">Guardar</button>
</div>
<div class="yasta"></div>
<input id="nro_doc" value="<?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_nro_doc"); ?>" type="hidden" name="nro_doc">
<input type="hidden" name="paso" value="1111">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
<input type="hidden" name="sistema" value="<?php echo $_SESSION["sistema"]; ?>">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
</form>