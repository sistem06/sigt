<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-user"></span>  Datos Personales</div>
  </h3></div>

<form id="parte1" action="tools/add_registro.php" method="post" role="form">

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
   <?php echo SelectGeneral("dp_tipo_doc", "form-control", "idtipodoc", "Tipo de documento:","tb_docs", "do_id", "do_name"); ?>
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

<div class="row">
  <div class="col-xs-12 col-md-3">
<div class="form-group">
   <?php echo InputGeneral("date", "dp_nacimiento", "form-control", "nacim", "aaaa/mm/dd", "Fecha de Nacimiento:",""); ?>
   <div class="requerido" id="falta_nacim">Falta completar este campo</div>
  </div>
  </div>
  <div class="col-xs-12 col-md-3">
      
      <div class="form-group">
  <label class="control-label" for="has-success">Edad</label>
  <input type="text" class="form-control" id="muestra_edad" disabled="disabled">
</div>
  </div>
  
  <div class="col-xs-12 col-md-3">
  <div class="form-group">
   <?php echo SelectGeneral("dp_sexo", "form-control", "idsexo", "Sexo:","tb_sexos", "sx_id", "sx_name"); ?>
  </div>
</div>
  <div class="col-xs-12 col-md-3">
  <div class="form-group">
   <?php echo SelectGeneral("dp_estado_civil", "form-control", "dpestadocivil", "Estado Civil:","tb_estado_civil", "ec_id", "ec_name"); ?>
  </div>
</div>
</div>
<!-- Comienza Cuil -->

    
  <div class="form-group">
  <label for="nrocuil">Nro de CUIL:</label>
    <input type="text" class="form-control" id="nrocuil" name="dp_cuil"
           placeholder="escriba el nro de CUIL" maxlength="13">
    <div class="requerido" id="falta_cuil">Falta completar este campo o nro incorrecto</div>
    </div>
    
    <div class="form-group">
 <a href="https://micuilonline.com.ar/averiguar-cuil-cuit" target="blank"><button type="button" class="btn btn-warning">Ver en ANSES</button></a>
     </div>
<!-- Comienza Cuil -->
<div class="row">
  
  <div class="col-xs-12 col-md-4">
  <div class="form-group">
    <?php echo SelectGeneral("dp_nacionalidad", "form-control", "idnacionalidad", "Nacionalidad:","tb_tipo_nacionalidad", "tn_id", "tn_name"); ?>
  </div>
</div>
<div class="col-xs-12 col-md-4">
  <div class="form-group">
   <?php echo SelectGeneral("dp_pais_nacimiento", "form-control", "idpaisnacimiento", "Pais de nacimiento:","tb_paises", "pa_id", "pa_name"); ?>
  </div>
</div>
<div class="col-xs-12 col-md-4">
  

<div class="form-group">
   <?php echo InputGeneral("tel", "dp_anos_residencia", "form-control", "anos_residencia", "Años de residencia en el pais", "Años de Residencia:",""); ?>
  </div>

</div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-phone"></span>  Comunicación</div>
  </h3>
</div>



<div class="row">
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneral("tel", "dp_telefono", "form-control", "nrotel", "escriba el nro de telefono", "Teléfono fijo:",""); ?>
  </div>
  </div>
<div class="col-xs-12 col-md-4">
  <div class="form-group">
   <?php echo InputGeneral("text", "dp_movil", "form-control", "nrocelu", "escriba el nro de celular", "Teléfono Celular:",""); ?>
  </div>
</div>
<div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneral("text", "dp_mail", "form-control", "dpmail", "escriba el correo electronico", "Correo Electrónico:",""); ?>
   <div class="requerido" id="falta_mail">la direccion ingresada es incorrecta</div>
  </div>
</div>
</div>





<button type="submit" class="btn btn-info" id="envia1">Agregar</button>
</div>
<input type="hidden" name="paso" value="100">
<input type="hidden" name="ho_id" value="<?php echo $_GET['ho_id']; ?>">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
<input type="hidden" name="estado" value="<?php echo $_GET['estado']; ?>">
</form>