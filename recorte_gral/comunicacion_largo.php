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
<div class="form-group">
   <?php echo InputGeneral("text", "dp_web", "form-control", "dpweb", "escriba la pagina web", "Página Web:",""); ?>
  </div>