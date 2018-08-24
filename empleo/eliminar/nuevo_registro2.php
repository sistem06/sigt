<?php
include("secure.php");
include ("../conecta.php");
include ("../funciones/funciones_generales.php");
include ("../funciones/funciones_form.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo BuscaRegistro ("tb_sistemas", "sis_id", $_SESSION["sistema"], "sis_name"); ?>	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/estilos_ss.css">
  <link rel="stylesheet" type="text/css" href="../source/jquery.fancybox.css?v=2.1.5" media="screen" />
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
</head>
<body>
<?php include("../recorte_gral/encabezado.php"); ?>
<div class="container-fluid">
<?php include("recortes/navegacion.php"); ?>
  <!-- comienza contenido -->
</div>
<div class="container">

      
<!-- aca comienza el calendario -->
          
<div class="paso_in"><div class="numb1">2</div><div class="numb2">2</div> Datos Laborales de 
<span class="nombre_emp">
<?php
echo DatoRegistro ('tb_datos_personales', 'dp_name', 'dp_id', $_GET['dp_id'], $conn).' ('.DatoRegistro ('tb_datos_personales', 'dp_nro_doc', 'dp_id', $_GET['dp_id'], $conn).')';
?>
</span>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-tags"></span>  Antecedentes Laborales</div>
  </h3>
<div class="panel-body">

<table class="table table-striped">
<thead>
<tr>
  <th>Tipo</th>
  <th>Desde</th>
  <th>Hasta</th>
  <th>Lugar</th>
  <th>Puesto</th>
  <th></th>
  <th></th>
</tr>
</thead>
<tbody>
<?php
$ttx = "select * from tb_antecedentes_laborales where al_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<tr><td><?php echo BuscaRegistro ("tb_tipo_trabajo", "tt_id", $lis_dat['al_tipo_trabajo'], "tt_name"); ?></td><td><?php echo fecha_dev($lis_dat['al_in']); ?></td><td><?php if($lis_dat['al_actual'] != 1){ echo fecha_dev($lis_dat['al_out']);} ?></td><td><?php echo $lis_dat['al_lugar_trabajo']; ?></td><td><?php echo BuscaRegistro ("tb_puestos", "pu_id", $lis_dat['al_puesto'], "pu_name"); ?></td><td><a href="tools/cambios_antecedentes.php?al_id=<?php echo $lis_dat['al_id']; ?>&dp_id=<?php echo $_GET['dp_id']; ?>"  title="modificar" class="fancybox fancybox.iframe" id="modifica_dato"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
  <td><a href="tools/quitar.php?val=<?php echo $lis_dat['al_id']; ?>&id=al_id&tabla=tb_antecedentes_laborales"  title="eliminar" class="fancybox fancybox.iframe" id="quita_dato"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
</tr>
<?php
}
?>
</tbody>
</table>



<button type="button" class="btn btn-warning" id="muestra_form_edu"><span class="glyphicon glyphicon-plus"></span>Agregar</button>


<div id="forma_educativa" style="background: #E0F0F4; padding: 10px; display: none;">


          <form id="parte1" action="tools/add_registro.php" method="post" role="form">
<div class="row">

<div class="col-xs-12 col-md-4">

      <div class="form-group has-success">
  <label>Actividad:</label>
 <input id="actividad" type="text" class="form-control" placeholder="escriba la actividad" autocomplete="off" name="al_actividad"/>
 <div id="listado_actividades" class="listado_rubros"></div>
 <div class="requerido" id="falta_actividad">Debe consignar alguna actividad</div>
</div>
<input type="hidden" id="valor_actividad" name="valor_actividad">
  </div>

  <div class="col-xs-12 col-md-4">
      <div class="form-group has-success">
  <label>Puesto:</label>
 <input id="puesto" type="text" class="form-control" placeholder="escriba el puesto" autocomplete="off" name="al_puesto"/>
 <div id="listado_puestos" class="listado_rubros"></div>
 <div class="requerido" id="falta_puesto">Debe consignar el puesto que ocupo </div>
</div>
<input type="hidden" id="valor_puesto" name="valor_puesto">
  </div>
  <a href="tools/cambios_puestos.php"  id="agrega_puesto" class="fancybox fancybox.iframe" style="display:none;">nueva carrera</a>
  <div class="col-xs-12 col-md-4">
        <div class="form-group  has-success">
        <label>Jerarquia:</label>
<select name="al_categoria" class="form-control" id="categoria">
</select>
           <div class="requerido" id="falta_categoria">Debe consignar una jerarquia </div>
            </div>
  </div>
  <a href="tools/cambios_categorias.php"  id="agrega_categoria" class="fancybox fancybox.iframe" style="display:none;">nueva carrera</a>
  
  <a href="tools/cambios_actividades.php"  id="agrega_actividad" class="fancybox fancybox.iframe" style="display:none;">nueva carrera</a>
</div>

<div class="row">
  <div class="col-xs-12 col-md-4">
          <div class="form-group">
<?php echo InputGeneral("date","al_in", "form-control", "inicio","fecha de inicio", "Fecha de Inicio:"); ?>
  
</div>
</div>
<div class="col-xs-12 col-md-4">
          <div class="form-group">
<label>Desempeña este trabajo actualmente:</label>
<div class="checkbox">
  <label><input type="checkbox" name="al_actual" value="1" id="alactual"></label></div>
</div>
</div>
 <div class="col-xs-12 col-md-4">
          <div class="form-group">
<?php echo InputGeneral("date","al_out", "form-control", "finaliza","fecha de finalizacion", "Fecha de Finalización:"); ?>
  <div class="requerido" id="falta_out"></div>
</div>
</div>

</div>

<div class="row">
  <div class="col-xs-12 col-md-6">
      <div class="form-group has-success">
            <?php echo SelectGeneral("al_tipo_trabajo", "form-control", "tipotrabajo", "Tipo de Trabajo:", "tb_tipo_trabajo", "tt_id", "tt_name"); ?>
            <div class="requerido" id="falta_tipotrabajo">Elija el tipo de trabajo</div>
            </div>
  </div>
  <div class="col-xs-12 col-md-6">
          <div class="form-group">
<?php echo InputGeneral("text","al_lugar_trabajo", "form-control", "lugartrabajo","nombre de la empresa ", "Lugar donde fue realizado:"); ?>
  <div class="requerido" id="falta_lugartrabajo"></div>
</div>
</div>
</div>

<div class="row">
  <div class="col-xs-12 col-md-6">
    <div class="form-group">
    <label>Descripcion del Puesto: </label>
    <textarea class="form-control" name="al_descripcion_puesto"></textarea>
  </div>
  </div>
  <div class="col-xs-12 col-md-6">
    <div class="form-group">
    <label>Referencias: </label>
    <textarea class="form-control" name="al_referencias"></textarea>
  </div>
  </div>
</div>

<button type="submit" class="btn btn-success" id="envia1">Agregar</button>
<input type="hidden" name="paso" value="6">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION['id_us']; ?>">
<!-- <input type="text" id="espuesto" name="espuesto"> -->
</form>
</div>
</div>

</div>
      

<form id="parte4" action="tools/add_registro.php" method="post" role="form">
            <button type="submit" class="btn btn-info" id="envia4">Guardar y Volver</button>
<input type="hidden" name="paso" value="7">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
      </form>


  <!-- fin contenido -->
</div>
<br><br><br><br><br><br>
<?php include("../recorte_gral/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

 
  <script type="text/javascript" language="javascript">
    $(document).ready(function() {
     $("#envia1").click(function() {
/*    if($("#actividad").val()==""){
      $("#falta_actividad").show();
      return false;
    } */
    
    
 /*     if($("#puesto").val() == ""){
      $("#falta_puesto").show();
      return false;
      } */

/*      if($("#categoria").val() == ""){
      $("#falta_categoria").show();
      return false;
      } */
  

/*       if($("#tipotrabajo").val() == ""){
      $("#falta_tipotrabajo").show();
      return false;
      } */
  }); 

     $("#parte1").submit(function(event) {
         if($("#puesto").val()==""){
                $("#falta_puesto").show();
                event.preventDefault();
              } 
        if($("#actividad").val()==""){
                $("#falta_actividad").show();
                event.preventDefault();
              }
          if($("#valor_actividad").val()==""){
            $("#falta_actividad").show();
            $("#falta_actividad").text("no ha elegido un elemento de la lista");
            event.preventDefault();
          } 
          if($("#valor_puesto").val()==""){
            $("#falta_puesto").show();
            $("#falta_puesto").text("no ha elegido un elemento de la lista");
            event.preventDefault();
          } 
      });
  
  $("#alactual").click(function(){
    if($("#alactual").is(':checked')){
      $("#finaliza").prop('disabled', true);
    } else {
      $("#finaliza").prop('disabled', false);
    }
  });


    $("#muestra_form_edu").click(function(){
        $("#forma_educativa").toggle();
        if($("#forma_educativa").is(":visible")){
              $("#parte4").hide();
        } else {
               $("#parte4").show();
        }
    });
     

  $("#denivel").change(function () {  
      if ($(this).val()>3) {
      $("#aa1").show(); 
      $("#aa3").show();
        if ($(this).val()>4) {
            $("#aa2").show();
                $("#denivel option:selected").each(function () {
            elegido=$(this).val();
            
            $.post("tools/titulos.php", { elegido: elegido }, function(data){
            $("#titulogral").html(data);
            });           
        });

        } else {
          $("#aa2").hide(); 
        }
      } else {
      $("#aa1").hide();
      $("#aa3").hide(); 
      }
      });
    $.post("tools/puestos.php",  function(datapuesto){
            $("#puesto").html(datapuesto);
            });
    $.post("tools/categorias.php",  function(datacategoria){
            $("#categoria").html(datacategoria);
            });
    $.post("tools/actividades.php",  function(datacactividad){
            $("#actividad").html(datacactividad);
            });

    

     $("#categoria").change(function(){
      if($("#categoria").val()=="Agregar"){
          $("#agrega_categoria").trigger("click");
      }
    });

     $("#actividad").change(function(){
      if($("#actividad").val()=="Agregar Nuevo"){
        alert("si");
          $("#agrega_actividad").trigger("click");
      }
    });

     $("#actividad").keyup(function(){
              if($("#actividad").val().length>1){
                $("#listado_actividades").show();
                  $.get("tools/busca_actividad.php",{busca: $("#actividad").val()}, function(htmlexterno){
                      $("#listado_actividades").html(htmlexterno);
                     
                  });

                   $("#listado_actividades").on("click", ".cada_elemento a", function(){
                    var dato = $(this).attr("value");
                        $("#actividad").val(dato);
                        $("#listado_actividades").hide();
                        if(dato=="Agregar Nueva"){
                              $("#agrega_actividad").trigger("click");
                        }
                         $.get("tools/busca_actividad1.php",{busca: dato}, function(completa){
                           $("#valor_actividad").val(completa);
                          });
                        $("#falta_actividad").hide();
                        return false;
                  });
              } else {
                $("#listado_actividades").hide();
                $("#valor_actividad").val("");
              }
          });

     $("#puesto").keyup(function(){
              if($("#puesto").val().length>1){
                $("#listado_puestos").show();
                  $.get("tools/busca_puestos.php",{busca: $("#puesto").val()}, function(htmlexterno){
                      $("#listado_puestos").html(htmlexterno);
                     
                  });

                   $("#listado_puestos").on("click", ".cada_elemento a", function(){
                    var dato = $(this).attr("value");
                        $("#puesto").val(dato);
                        $("#listado_puestos").hide();
                        if(dato=="Agregar Nuevo"){
                              $("#agrega_puesto").trigger("click");
                        }
                        
                           $.get("tools/busca_puestos1.php",{busca1: dato}, function(completa){
                           $("#valor_puesto").val(completa);
                     
                          });
                        $("#falta_puesto").hide();
                        return false;
                  });
              } else {
                $("#listado_puestos").hide();
                $("#valor_puesto").val("");
              }
          });

  });
  
  </script>
   <script type="text/javascript" src="../source/jquery.fancybox.js?v=2.1.5"></script>
    <script type="text/javascript">
    $(document).ready(function() {
          $('.fancybox').fancybox();
      $("#fancybox-manual-b").click(function() {
        $.fancybox.open({
          href : 'iframe.html',
          type : 'iframe',
          padding : 5
        });
      }); 
        $("#agrega_puesto").fancybox({
        afterClose  : function() { 
        //     $.post("tools/puestos.php",  function(datapuesto){
            $("#puesto").val("");
        //    });

        }
    });

         $("#agrega_categoria").fancybox({
        afterClose  : function() { 
             $.post("tools/categorias.php",  function(datacategoria){
            $("#categoria").html(datacategoria);
            });

        }
    });

         $("#agrega_actividad").fancybox({
        afterClose  : function() { 
      //       $.post("tools/actividades.php",  function(datacactividad){
            $("#actividad").val("");
      //      });

        }
    });

         $("#quita_dato").fancybox({
        afterClose  : function() { 
            window.location.reload();
        }
    }); 

         $("#modifica_dato").fancybox({
        afterClose  : function() { 
            window.location.reload();
        }
    }); 
});
  </script>

<script type="text/javascript" language="javascript" src="../js/navbar.js"></script>
</body>
</html>