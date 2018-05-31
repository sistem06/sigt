<?php
include("../secure.php");
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

    
  <div class="container">
  <h3>Modificando un Dato Laboral de 
<?php
echo DatoRegistro ('tb_datos_personales', 'dp_name', 'dp_id', $_GET['dp_id'], $conn).' ('.DatoRegistro ('tb_datos_personales', 'dp_nro_doc', 'dp_id', $_GET['dp_id'], $conn).')';
?>
</h3>
     <form id="parte1" action="agrega_modifica_general.php" method="post" role="form">
<div class="row">

<div class="col-xs-12 col-md-4">
      <div class="form-group  has-success">
      
      <label>Actividad:</label>
 <input id="actividad" type="text" class="form-control" placeholder="escriba la actividad" autocomplete="off" name="al_actividad" value="<?php echo BuscaRegistro ("tb_actividades","act_id",BuscaRegistro ("tb_antecedentes_laborales", "al_id", $_GET['al_id'], "al_actividad"),"act_name"); ?>" />
 <div id="listado_actividades" display="none"></div>

            <div class="requerido" id="falta_actividad">Debe consignar alguna activida </div>
            </div>
  </div>

  <div class="col-xs-12 col-md-4">
      <div class="form-group  has-success">
      <label>Puesto:</label>
 <input id="puesto" type="text" class="form-control" placeholder="escriba el puesto" autocomplete="off" name="al_puesto" value="<?php echo BuscaRegistro ("tb_puestos","pu_id",BuscaRegistro ("tb_antecedentes_laborales", "al_id", $_GET['al_id'], "al_puesto"),"pu_name"); ?>" />
 <div id="listado_puestos" display="none"></div>
        <div class="requerido" id="falta_puesto">Debe consignar el puesto que ocupo </div>

            </div>
  </div>
  <a href="tools/cambios_puestos.php"  id="agrega_puesto" class="fancybox fancybox.iframe" style="display:none;">nueva carrera</a>
  <div class="col-xs-12 col-md-4">
        <div class="form-group  has-success">
        <?php echo SelectGeneralVal("al_categoria", "form-control", "categoria", "Categoria:","tb_categorias", "cat_id", "cat_name", BuscaRegistro ("tb_antecedentes_laborales", "al_id", $_GET['al_id'], "al_categoria")); ?>
           <div class="requerido" id="falta_categoria">Debe consignar una categoria </div>
            </div>
  </div>
  <a href="tools/cambios_categorias.php"  id="agrega_categoria" class="fancybox fancybox.iframe" style="display:none;">nueva carrera</a>
  
  <a href="tools/cambios_actividades.php"  id="agrega_actividad" class="fancybox fancybox.iframe" style="display:none;">nueva carrera</a>
</div>

<div class="row">
  <div class="col-xs-12 col-md-4">
          <div class="form-group">
<?php echo InputGeneralVal("date","al_in", "form-control", "inicio","fecha de inicio", "Fecha de Inicio:", BuscaRegistro ("tb_antecedentes_laborales", "al_id", $_GET['al_id'], "al_in")); ?>
  
</div>
</div>
<div class="col-xs-12 col-md-4">
          <div class="form-group">
<label>Desempeña este trabajo actualmente:</label>
<div class="checkbox">
  <label><input type="checkbox" name="al_actual" value="1" id="alactual"
<?php if(BuscaRegistro ("tb_antecedentes_laborales", "al_id", $_GET['al_id'], "al_actual") == 1) echo "cheked"; ?>
  ></label></div>
</div>
</div>
 <div class="col-xs-12 col-md-4">
          <div class="form-group">
<?php echo InputGeneralVal("date","al_out", "form-control", "finaliza","fecha de finalizacion", "Fecha de Finalización:",BuscaRegistro ("tb_antecedentes_laborales", "al_id", $_GET['al_id'], "al_out")); ?>
  <div class="requerido" id="falta_out"></div>
</div>
</div>

</div>

<div class="row">
  <div class="col-xs-12 col-md-6">
      <div class="form-group has-success">
            <?php echo SelectGeneralVal("al_tipo_trabajo", "form-control", "tipotrabajo", "Tipo de Trabajo:", "tb_tipo_trabajo", "tt_id", "tt_name",BuscaRegistro ("tb_antecedentes_laborales", "al_id", $_GET['al_id'], "al_tipo_trabajo")); ?>
            <div class="requerido" id="falta_tipotrabajo">Elija el tipo de trabajo</div>
            </div>
  </div>
  <div class="col-xs-12 col-md-6">
          <div class="form-group">
<?php echo InputGeneralVal("text","al_lugar_trabajo", "form-control", "lugartrabajo","nombre de la empresa ", "Lugar donde fue realizado:",BuscaRegistro ("tb_antecedentes_laborales", "al_id", $_GET['al_id'], "al_lugar_trabajo")); ?>
  <div class="requerido" id="falta_lugartrabajo"></div>
</div>
</div>
</div>

<div class="row">
  <div class="col-xs-12 col-md-6">
    <div class="form-group">
    <label>Descripcion del Puesto: </label>
    <textarea class="form-control" name="al_descripcion_puesto"><?php echo BuscaRegistro ("tb_antecedentes_laborales", "al_id", $_GET['al_id'], "al_descripcion_puesto"); ?></textarea>
  </div>
  </div>
  <div class="col-xs-12 col-md-6">
    <div class="form-group">
    <label>Referencias: </label>
    <textarea class="form-control" name="al_referencias"><?php echo BuscaRegistro ("tb_antecedentes_laborales", "al_id", $_GET['al_id'], "al_referencias"); ?></textarea>
  </div>
  </div>
</div>

<button type="submit" class="btn btn-success" id="envia1">Guardar</button>
<input type="hidden" name="tabla" value="1100">
<input type="hidden" name="al_id" value="<?php echo $_GET['al_id']; ?>">
</form>
</div>
   <script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
 <script src="../../js/bootstrap-typeahead.js"></script>
<script type="text/javascript" language="javascript">
    $(document).ready(function() {

        $("#envia1").click(function() {
    if($("#actividad").val()==""){
      $("#falta_actividad").show();
      return false;
    }
    
    
      if($("#puesto").val() == ""){
      $("#falta_puesto").show();
      return false;
      }

      if($("#categoria").val() == ""){
      $("#falta_categoria").show();
      return false;
      }
  

       if($("#tipotrabajo").val() == ""){
      $("#falta_tipotrabajo").show();
      return false;
      }
    

  });

        $("#actividad").keyup(function(){
              if($("#actividad").val().length>1){
                $("#listado_actividades").show();
                  $.get("busca_actividad.php",{busca: $("#actividad").val()}, function(htmlexterno){
                      $("#listado_actividades").html(htmlexterno);
                     
                  });

                   $("#listado_actividades").on("click", ".cada_elemento a", function(){
                    var dato = $(this).attr("value");
                        $("#actividad").val(dato);
                        $("#listado_actividades").hide();
                        return false;
                  });
              } else {
                $("#listado_actividades").hide();
              }
          });

     $("#puesto").keyup(function(){
              if($("#puesto").val().length>1){
            //    alert($("#puesto").val());
                $("#listado_puestos").show();
                  $.get("busca_puestos.php",{busca: $("#puesto").val()}, function(htmlexterno){
                      $("#listado_puestos").html(htmlexterno);
                     
                  });

                   $("#listado_puestos").on("click", ".cada_elemento a", function(){
                    var dato = $(this).attr("value");
                        $("#puesto").val(dato);
                        $("#listado_puestos").hide();
                        
                        return false;
                  });
              } else {
                $("#listado_puestos").hide();
              }
          });
    });
</script>

</body>
</html>