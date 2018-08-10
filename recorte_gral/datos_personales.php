

<div class="panel panel-success">
  <div class="panel-heading"><center>Continue con los siguientes datos del beneficiario</center></div>
</div>



<form id="parte1" action="add_registro.php" method="post" role="form">
<?php include("datos_personales_gral.php"); ?>
<?php include("datos_domicilio.php"); ?>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-phone"></span>  Comunicación</div>
  </h3>
</div>



<div class="row">
  <div class="col-xs-12 col-md-6">
<div class="form-group">
   <?php echo InputGeneral("tel", "dp_telefono", "form-control", "nrotel", "escriba el nro de telefono", "Teléfono fijo:",""); ?>
  </div>
  </div>
<div class="col-xs-12 col-md-6">
  <div class="form-group">
   <?php echo InputGeneral("text", "dp_movil", "form-control", "nrocelu", "escriba el nro de celular", "Teléfono Celular:",""); ?>
  </div>
</div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-6">
<div class="form-group">
   <?php echo InputGeneral("tel", "dp_telefono1", "form-control", "nrotel1", "escriba el nro de telefono", "Teléfono fijo alternativo:",""); ?>
  </div>
  </div>
<div class="col-xs-12 col-md-6">
  <div class="form-group">
   <?php echo InputGeneral("text", "dp_movil1", "form-control", "nrocelu1", "escriba el nro de celular", "Teléfono Celular alternativo:",""); ?>
  </div>
</div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-6">
<div class="form-group">
   <?php echo InputGeneral("text", "dp_mail", "form-control", "dpmail", "escriba el correo electronico", "Correo Electrónico:",""); ?>
   <div class="requerido" id="falta_mail">la direccion ingresada es incorrecta</div>
  </div>
</div>
<div class="col-xs-12 col-md-6">
<div class="form-group">
   <?php echo InputGeneral("text", "dp_facebook", "form-control", "dpfacebook", "escriba la direccion de facebook", "Facebook:",""); ?>
  </div>
  </div>
  </div>

  <div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-star"></span>  Otros datos</div>
  </h3>
  </div>

    <div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
          <label>Es Veterano de la Guerra de Malvinas?</label>

          <div class="radio">
        <label>
          <input type="radio" name="dp_veterano" id="dp_veterano1" value="1" >
          Si
        </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="dp_veterano" id="dp_veterano2" value="0" checked>
          No
        </label>
      </div>
  </div>
    </div>
    <div class="col-xs-12 col-md-6">
      <div class="form-group">
          <label>Es Familiar de un Veterano de la Guerra de Malvinas?</label>

          <div class="radio">
        <label>
          <input type="radio" name="dp_fam_veterano" id="dp_fam_veterano1" value="1">
          Si
        </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="dp_fam_veterano" id="dp_fam_veterano2" value="0" checked>
          No
        </label>
      </div>
  </div>

    </div>
    </div>


      <div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
          <label>Se reconoce perteneciente a algún pueblo originario?</label>

          <div class="radio">
        <label>
          <input type="radio" name="dp_pueblo_originario" id="dp_po1" value="1" class="po" >
          Si
        </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="dp_pueblo_originario" id="dp_po2" value="0" class="po" checked>
          No
        </label>
      </div>
  </div>
    </div>
    <div class="col-xs-12 col-md-6">
    <div id="lista_pueblos_originarios" style="display:none;">
      <div class="form-group">
          <?php echo SelectGeneral("dp_nombre_pueblo_originario", "form-control", "idnombrepueblo", "Pueblo Originario:","tb_pueblos_originarios", "po_id", "po_name"); ?>
  </div>

    </div>
    </div>

</div>


  <div class="form-group">
    <label>Observaciones: </label>
    <textarea class="form-control" name="dp_observaciones"></textarea>
  </div>



<div class="form-group">
<button type="submit" class="btn btn-info" id="envia1">Continuar</button>
</div>
<input type="hidden" name="paso" value="1">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
<input type="hidden" name="sistema" value="<?php echo $_SESSION["sistema"]; ?>">
<input type="hidden" name="dp_nro_doc1" id="pasa_dni">
</form>
