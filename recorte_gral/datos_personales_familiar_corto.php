<div class="panel panel-success">
  <div class="panel-heading"><center>Continue con los siguientes datos del miembro del Hogar</center></div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-user"></span>  Datos Personales</div>
  </h3></div>

<form id="parte1" action="add_registro.php" method="post" role="form">

<div class="row">
  <div class="col-xs-12 col-md-6">
  <div class="form-group has-success">
   <?php echo InputGeneral("text", "dp_apellido", "form-control", "idapellido", "escriba el apellido", "Apellido:",""); ?>
<div class="requerido" id="falta_apellido">Falta completar este campo</div>
</div>
   </div>
   <div class="col-xs-12 col-md-6">
   <div class="form-group has-success">
   <?php echo InputGeneral("text", "dp_nombre", "form-control", "idnombre", "escriba el nombre", "Nombre:",""); ?>
<div class="requerido" id="falta_nombre">Falta completar este campo</div>
</div>
   </div>
   </div>
   <div class="row">
  <div class="col-xs-12 col-md-4">
   <div class="form-group">
   <?php echo SelectGeneralSO("dp_tipo_doc", "form-control", "idtipodoc", "Tipo de documento:","tb_docs", "do_id", "do_name"); ?>
<div class="requerido" id="falta_tipo_doc">Falta completar este campo</div>
</div>
   </div>
   <div class="col-xs-12 col-md-4">
   <div class="form-group">
    <label for="nrodni">Nro de Documento:</label>
    <input type="text" class="form-control" id="nrodni" name="dp_nro_doc"
           placeholder="escriba el nro de Documento" maxlength="8">
    <div class="requerido" id="falta_dni">Falta completar este campo o nro incorrecto</div>

    </div>
   </div>
   <div class="col-xs-12 col-md-4">
  <div class="form-group has-success">
   <?php echo SelectGeneral("dp_parentesco", "form-control", "dpparentesco", "Parentesco:","tb_parentesco", "par_id", "par_name"); ?>
   <div class="requerido" id="falta_parentesco">Falta completar este campo</div>
  </div>
   </div>
   </div>


<!-- Comienza Cuil -->




<!-- Comienza Cuil -->


<button type="submit" class="btn btn-info" id="envia1">Agregar</button>
</div>
<input type="hidden" name="paso" value="100">
<input type="hidden" name="ho_id" value="<?php echo $_GET['ho_id']; ?>">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
<input type="hidden" name="dp_nro_doc1" id="pasa_dni">
<input type="hidden" name="dp_tipo_doc1" id="pasa_tipo_doc">
<input type="hidden" name="dp_id_fam" id="pasa_id">


<input type="hidden" name="tratamiento" id="tratamiento" value="corto">
</form>
