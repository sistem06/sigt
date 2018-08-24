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
  <?php echo InputGeneralVal("text", "dp_nro_doc", "form-control", "nrodni", "escriba el nro de Documento", "Nro de Documento:",BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_nro_doc")); ?>
      </div>
   </div>
   </div>

<div class="row">
  <div class="col-xs-12 col-md-6">
  <div class="form-group has-success">
   <?php echo InputGeneralVal("text", "dp_apellido", "form-control", "idapellido", "escriba el apellido", "Apellido:",BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_apellido")); ?>
</div>
   </div>
   <div class="col-xs-12 col-md-6">
   <div class="form-group has-success">
   <?php echo InputGeneralVal("text", "dp_nombre", "form-control", "idnombre", "escriba el nombre", "Nombre:",BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_nombre")); ?>
</div>
   </div>
   </div>
   
<div class="row">
  <div class="col-xs-12 col-md-6">
<div class="form-group has-success">
   <?php echo InputGeneralVal("date", "dp_nacimiento", "form-control", "nacim", "aaaa/mm/dd", "Fecha de Nacimiento:",BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_nacimiento")); ?>
   <div class="requerido" id="falta_nacim">Falta completar este campo</div>
  </div>
  </div>
  <div class="col-xs-12 col-md-6">
      
      <div class="form-group has-success">
  <label class="control-label" for="has-success">Edad</label>
  <input type="text" class="form-control" id="muestra_edad" disabled="disabled">
</div>
  </div>
  </div>

<div class="row">
  <div class="col-xs-12 col-md-6">
  <div class="form-group">
   <?php echo SelectGeneralVal("dp_sexo", "form-control", "idsexo", "Género:","tb_sexos", "sx_id", "sx_name",BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_sexo")); ?>
  </div>
</div>
  <div class="col-xs-12 col-md-6">
  <div class="form-group">
   <?php echo SelectGeneralVal("dp_estado_civil", "form-control", "dpestadocivil", "Estado Civil:","tb_estado_civil", "ec_id", "ec_name",BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_estado_civil")); ?>
  </div>
</div>
</div>
<!-- Comienza Cuil -->

    
  <div class="form-group has-success">
   <?php echo InputGeneralVal("text", "dp_cuil", "form-control", "nrocuil", "escriba el nro de CUIL", "Nro de CUIL:",BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_cuil")); ?>
    <div class="requerido" id="falta_cuil">Falta completar este campo o nro incorrecto</div>
    </div>
    
    <div class="form-group">
 <a href="https://micuilonline.com.ar/averiguar-cuil-cuit" target="blank"><button type="button" class="btn btn-warning">Ver en ANSES</button></a>
     </div>
<!-- Comienza Cuil -->
<div class="row">
  
  <div class="col-xs-12 col-md-4">
  <div class="form-group">
    <?php echo SelectGeneralVal("dp_nacionalidad", "form-control", "idnacionalidad", "Nacionalidad:","tb_tipo_nacionalidad", "tn_id", "tn_name",BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_nacionalidad")); ?>
  </div>
</div>
<div class="col-xs-12 col-md-4">
  <div class="form-group">
   <?php echo SelectGeneral("dp_pais_nacimiento", "form-control", "idpaisnacimiento", "Pais de nacimiento:","tb_paises", "pa_id", "pa_name",BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_pais_nacimiento")); ?>
  </div>
</div>
<div class="col-xs-12 col-md-4">
  

<div class="form-group">
   <?php echo InputGeneralVal("number", "dp_anos_residencia", "form-control", "anos_residencia", "Años de residencia en el pais", "Años de Residencia:",BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_anos_residencia")); ?>
   <div class="requerido" id="falta_resi">La cantidad de años ingresados es incorrecta</div>
  </div>

</div>
</div>
<a href="tools/cambios_sexo.php" class="fancybox fancybox.iframe" id="agregasexo" style="display:none;" >agregar feria</a>


<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-phone"></span>  Comunicación</div>
  </h3>
</div>



<div class="row">
  <div class="col-xs-12 col-md-6">
<div class="form-group">
   <?php echo InputGeneralVal("tel", "dp_telefono", "form-control", "nrotel", "escriba el nro de telefono", "Teléfono fijo:",BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_telefono")); ?>
  </div>
  </div>
<div class="col-xs-12 col-md-6">
  <div class="form-group">
   <?php echo InputGeneralVal("text", "dp_movil", "form-control", "nrocelu", "escriba el nro de celular", "Teléfono Celular:",BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_movil")); ?>
  </div>
</div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-6">
<div class="form-group">
   <?php echo InputGeneralVal("tel", "dp_telefono1", "form-control", "nrotel1", "escriba el nro de telefono", "Teléfono fijo alternativo:",BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_telefono1")); ?>
  </div>
  </div>
<div class="col-xs-12 col-md-6">
  <div class="form-group">
   <?php echo InputGeneralVal("text", "dp_movil1", "form-control", "nrocelu1", "escriba el nro de celular", "Teléfono Celular alternativo:",BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_movil1")); ?>
  </div>
</div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-6">
<div class="form-group">
   <?php echo InputGeneralVal("text", "dp_mail", "form-control", "dpmail", "escriba el correo electronico", "Correo Electrónico:",BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_mail")); ?>
   <div class="requerido" id="falta_mail">la direccion ingresada es incorrecta</div>
  </div>
</div>
<div class="col-xs-12 col-md-6">
<div class="form-group">
   <?php echo InputGeneralVal("text", "dp_facebook", "form-control", "dpfacebook", "escriba la direccion de facebook", "Facebook:",BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_facebook")); ?>
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
          <input type="radio" name="dp_veterano" id="dp_veterano1" value="1" <?php if(BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_veterano")==1) echo "checked"; ?> >
          Si
        </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="dp_veterano" id="dp_veterano2" value="0" <?php if(BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_veterano")==0) echo "checked"; ?>>
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
          <input type="radio" name="dp_fam_veterano" id="dp_fam_vetenaro1" value="1" <?php if(BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_fam_veterano")==1) echo "checked"; ?>>
          Si
        </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="dp_fam_veterano" id="dp_fam_vetenaro2" value="0" <?php if(BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_fam_veterano")==0) echo "checked"; ?>>
          No
        </label>
      </div>
  </div>

    </div>
    </div>
    <!-- comienza po -->
      <div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
          <label>Se reconoce perteneciente a algún pueblo originario?</label>
    
          <div class="radio">
        <label>
          <input type="radio" name="dp_pueblo_originario" id="dp_po1" value="1" class="po" <?php if(BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_pueblo_originario")==1) echo "checked"; ?> >
          Si
        </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="dp_pueblo_originario" id="dp_po2" value="0" class="po" <?php if(BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_pueblo_originario")==0) echo "checked"; ?>>
          No
        </label>
      </div>
  </div>
    </div>
    <div class="col-xs-12 col-md-6">
    <div id="lista_pueblos_originarios" style="display:none;">
      <div class="form-group">
          <?php
          if(BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_nombre_pueblo_originario") != 0){ echo SelectGeneralVal("dp_nombre_pueblo_originario", "form-control", "idnombrepueblo", "Pueblo Originario:","tb_pueblos_originarios", "po_id", "po_name",BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_nombre_pueblo_originario"));} else {echo SelectGeneral("dp_nombre_pueblo_originario", "form-control", "idnombrepueblo", "Pueblo Originario:","tb_pueblos_originarios", "po_id", "po_name");} ?>
  </div>

    </div>
    </div>

</div>
    <!-- fin po -->

  <div class="form-group">
    <label>Observaciones: </label>
    <textarea class="form-control" name="dp_observaciones"><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET['dp_id'], "dp_observaciones"); ?></textarea>
  </div>
  


<div class="form-group">
<button type="submit" class="btn btn-info" id="envia1">Guardar</button>
</div>
<input type="hidden" name="paso" value="1001">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
<input type="hidden" name="sistema" value="<?php echo $_SESSION["sistema"]; ?>">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
</form>