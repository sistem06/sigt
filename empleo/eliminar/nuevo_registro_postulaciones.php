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
          
<div class="paso_in"><div class="numb1">2</div><div class="numb2">3</div> Postulaciones de 
<span class="nombre_emp">
<?php
echo DatoRegistro ('tb_datos_personales', 'dp_name', 'dp_id', $_GET['dp_id'], $conn).' ('.DatoRegistro ('tb_datos_personales', 'dp_nro_doc', 'dp_id', $_GET['dp_id'], $conn).')';
?>
</span>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-tags"></span>  Postulaciones Laborales</div>
  </h3>
<div class="panel-body">

<table class="table table-striped">
<thead>
<tr>
 
  <th>Puesto</th>
  <th></th>
</tr>
</thead>
<tbody>
<?php
$ttx = "select * from tb_postulaciones_laborales where pl_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<tr>
<td><?php echo BuscaRegistro ("tb_puestos", "pu_id", $lis_dat['pl_puesto'], "pu_name"); ?></td>
  <td><a href="tools/quitar.php?val=<?php echo $lis_dat['pl_id']; ?>&id=pl_id&tabla=tb_postulaciones_laborales"  title="eliminar" class="fancybox fancybox.iframe" id="quita_dato"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
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

<div class="col-xs-12 col-md-12">

    
      <div class="form-group has-success">
  <label>Puesto:</label>
 <input id="puesto" type="text" class="form-control" placeholder="escriba el puesto" autocomplete="off" name="al_puesto"/>
 <div id="listado_puestos" class="listado_rubros"></div>
 <div class="requerido" id="falta_puesto">Debe consignar el puesto al que postula </div>
</div>

  </div>
  <a href="tools/cambios_puestos.php"  id="agrega_puesto" class="fancybox fancybox.iframe" style="display:none;">nueva carrera</a>
</div>


<button type="submit" class="btn btn-success" id="envia1">Agregar</button>
<input type="hidden" name="paso" value="600">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION['id_us']; ?>">
<input type="hidden" id="valor_puesto" name="valor_puesto">
<!-- <input type="text" id="espuesto" name="espuesto"> -->
</form>
</div>
</div>

</div>
      <!-- comienza cursos -->
<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-pushpin"></span>  Postulaciones a Cursos</div>
  </h3>
  <div class="panel-body">
      <table class="table table-striped">
          <thead>
            <tr>
              <th>Nombre del Curso</th>
              <th></th>
            </tr>
           </thead>
           <tbody>
            <?php
            $ttx = "select * from tb_postulaciones_cursos where pc_dp_id = ".$_GET['dp_id'];
            $list = mysql_query($ttx);
            while($lis_dat = mysql_fetch_array($list)){
            ?>
            <tr><td><?php echo BuscaRegistro ("tb_formacion_profesional", "fp_id", $lis_dat['pc_curso'], "fp_name"); ?></td><td><a href="tools/quitar.php?val=<?php echo $lis_dat['pc_id']; ?>&id=pc_id&tabla=tb_postulaciones_cursos"  title="eliminar" class="fancybox fancybox.iframe" id="quita_curso"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
            </tr>
            <?php
            }
            ?>
            </tbody>
      </table>

      <button type="button" class="btn btn-warning" id="muestra_form_fp"><span class="glyphicon glyphicon-plus"></span>Agregar</button>

          <div id="cursos_propios" style="background: #E0F0F4; padding: 10px; display: none;">
              <form id="parte2" action="tools/add_registro.php" method="post" role="form">
                <div class="row">
                <div class="col-xs-12 col-md-12">
                <div class="form-group">
                  <label>Curso al que desea postularse:</label>
                               <input type="text" name="bfp_fp_id" class="form-control" id="cursopropio" placeholder="escriba el curso" autocomplete="off">
                              <div id="listado_cursos"  class="listado_rubros"></div>
                              <div class="requerido" id="falta_curso_propio">Falta completar este campo</div>
                </div>
                </div>
               <div class="col-xs-12 col-md-12">
                <div class="form-group">
               <button type="submit" class="btn btn-success" id="envia2">Agregar</button>
                </div>
                </div>
                </div>
                
                <input type="hidden" name="paso" value="500">
                <input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
                <input type="hidden" id="valor_curso" name="valor_curso">

                </form>
                </div>
              
          
<a href="tools/cambios_cursos_fp.php"  id="agrega_curso_propio" class="fancybox fancybox.iframe" style="display:none;">nueva carrera</a>
</div>
</div>


      <!-- fin cursos -->

<form id="parte4" action="tools/add_registro.php" method="post" role="form">
            <button type="submit" class="btn btn-info" id="envia4">Guardar y Volver</button>
<input type="hidden" name="paso" value="700">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
      </form>


  <!-- fin contenido -->
</div>
<br><br><br><br><br><br><br><br><br><br>
<?php include("../recorte_gral/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

 
  <script type="text/javascript" language="javascript">
    $(document).ready(function() {

       $("#parte1").submit(function(event) {
         if($("#puesto").val()==""){
                $("#falta_puesto").show();
                event.preventDefault();
              } 
          if($("#valor_puesto").val()==""){
            $("#falta_puesto").show();
            $("#falta_puesto").text("no ha elegido un elemento de la lista");
            event.preventDefault();
          }
      });
       $("#parte2").submit(function(event) {
         if($("#cursopropio").val()==""){
                $("#falta_curso_propio").show();
                event.preventDefault();
              } 
           if($("#valor_curso").val()==""){
            $("#falta_curso_propio").show();
            $("#falta_curso_propio").text("no ha elegido un elemento de la lista");
            event.preventDefault();
          }
      });

        $("#muestra_form_edu").click(function(){
        $("#forma_educativa").toggle();
     /*   if($("#forma_educativa").is(":visible")){
              $("#parte4").hide();
        } else {
               $("#parte4").show();
        }*/
    });

     $("#muestra_form_fp").click(function(){
        $("#cursos_propios").toggle();
    /*    if($("#cursos_propios").is(":visible")){
              $("#parte4").hide();
        } else {
               $("#parte4").show();
        } */
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

     $("#cursopropio").keyup(function(){
              if($("#cursopropio").val().length>3){
                $("#listado_cursos").show();
                  $.post("tools/curso_propio.php",{busca: $("#cursopropio").val()}, function(htmlexterno){
                      $("#listado_cursos").html(htmlexterno);
                     
                  });

                   $("#listado_cursos").on("click", ".cada_elemento a", function(){
                    var dato = $(this).attr("value");
                        $("#cursopropio").val(dato);
                        $("#listado_cursos").hide();
                        if(dato=="Agregar"){
                              $("#agrega_curso_propio").trigger("click");
                        }
                         $.post("tools/curso_propio1.php",{curso: dato}, function(completa){
                           $("#valor_curso").val(completa);
                          });
                         $("#falta_curso_propio").hide();
                        return false;
                  });
              } else {
                $("#listado_cursos").hide();
                $("#valor_curso").val("");
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

         $("#quita_curso").fancybox({
        afterClose  : function() { 
            window.location.reload();
        }
    });

         $("#agrega_curso_propio").fancybox({
        afterClose  : function() { 
       //     $.post("tools/curso_propio.php",  function(datacurso){
            $("#cursopropio").val("");
       //     }); 

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