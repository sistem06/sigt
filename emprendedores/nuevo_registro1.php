<?php
include ("secure.php");
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
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"
</head>
<body>
<?php include("../recorte_gral/encabezado.php"); ?>
<div class="container-fluid">
<?php include("recortes/navegacion.php"); ?>
  <!-- comienza contenido -->
</div>
<div class="container">


<!-- aca comienza el calendario -->

<div class="paso_in"><div class="numb1">2</div><div class="numb2">1</div> Datos del Emprendimiento de
<span class="nombre_emp">
<?php
echo DatoRegistro ('tb_datos_personales', 'dp_name', 'dp_id', $_GET['dp_id'], $conn).' ('.DatoRegistro ('tb_datos_personales', 'dp_nro_doc', 'dp_id', $_GET['dp_id'], $conn).')';
?>
</span>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-wrench"></span>Datos del Emprendimiento</div>
  </h3>
</div>



          <form id="parte1" action="tools/add_registro.php" method="post" role="form">
      <div class="row">
<div class="col-xs-12 col-md-12">
    <div class="form-group has-success">
   <?php echo InputGeneralVal("text", "em_nombre", "form-control", "emnombre", "escriba el nombre del emprendimiento", "Nombre o Marca del Emprendimiento:",BuscaRegistro ("tb_datos_emprendimiento", "em_id", $_GET['em_id'], "em_nombre")); ?>
   <div class="requerido" id="falta_nombre">Falta completar este campo</div>
  </div>
</div></div>
<?php if(BuscaRegistro ("tb_datos_emprendimiento", "em_id", $_GET['em_id'], "em_subrubro_old")){
?>
<div class="row">
<div class="col-xs-12 col-md-12">
  <?php echo 'Rubro anterior: <b>'.BuscaRegistro ("tb_datos_emprendimiento", "em_id", $_GET['em_id'], "em_subrubro_old").'</b>'; ?>
</div>
</div>
  <?php
}
?>
<div class="row">
<div class="col-xs-12 col-md-6">
<div class="form-group">
  <?php echo SelectGeneralVal("em_rubro", "form-control", "rubroid", "Rubro:","tb_rubros", "ru_id", "ru_name",BuscaRegistro ("tb_datos_emprendimiento", "em_id", $_GET['em_id'], "em_rubro")); ?>
 <div id="listado_rubros" class="requerido"></div>
 <div class="requerido" id="falta_rubro">Falta completar este campo</div>
</div>
</div>

<div class="col-xs-12 col-md-6">
<div class="form-group">
  <label>Subrubro:</label>
 <select id="subrubroid" class="form-control" name="em_subrubro"/>
 <option value="<?php echo BuscaRegistro ("tb_datos_emprendimiento", "em_id", $_GET['em_id'], "em_subrubro"); ?>"><?php echo BuscaRegistro ("tb_subrubros", "sr_id",BuscaRegistro ("tb_datos_emprendimiento", "em_id", $_GET['em_id'], "em_subrubro"),"sr_name"); ?></option>
 </select>
 <div class="requerido" id="falta_subrubro">Falta completar este campo</div>
</div>
</div>
</div>

<div class="form-group">
<?php echo TextAreaGeneralVal("em_descripcion", "form-control", "iddescripcion", "3", "Descripción del Emprendimiento:",BuscaRegistro ("tb_datos_emprendimiento", "em_id", $_GET['em_id'], "em_descripcion")); ?>
</div>

<div class="form-group">
<label>Fecha de Inicio del Emprendimiento:</label>
<div class="row">
  <div class="col-xs-3">
   Mes:
   <select name="em_mes_in" class="form-control">
   <?php
   echo '<option value="'.substr(BuscaRegistro ("tb_datos_emprendimiento", "em_id", $_GET['em_id'], "em_fecha_inicio"),5,2).'" selected="selected">'.substr(BuscaRegistro ("tb_datos_emprendimiento", "em_id", $_GET['em_id'], "em_fecha_inicio"),5,2).'</option>';
   $mes = 1;
      while($mes < 13){
        if($mes < 10){
          $mesa = '0'.$mes;
        } else {
          $mesa = $mes;
        }
        echo '<option value="'.$mesa.'">'.$mesa.'</option>';
        $mes++;
      }
      ?>
   </select>
   </div>
   <div class="col-xs-3">
   Año:
   <select name="em_ano_in" class="form-control">
   <?php
    echo '<option value="'.substr(BuscaRegistro ("tb_datos_emprendimiento", "em_id", $_GET['em_id'], "em_fecha_inicio"),0,4).'" selected="selected">'.substr(BuscaRegistro ("tb_datos_emprendimiento", "em_id", $_GET['em_id'], "em_fecha_inicio"),0,4).'</option>';
   $ano = date("Y");
      while($ano > 1959){
        echo '<option value="'.$ano.'">'.$ano.'</option>';
        $ano--;
      }
      ?>
   </select>
   </div>
   <?php /* echo InputGeneral("date", "em_fecha_inicio", "form-control", "emfechainicio", "fecha de inicio del emprendimiento", "Fecha de Inicio del Emprendimiento:","");*/ ?>
  </div>
  </div>




<div class="form-group">
<label>Funciona en su Domicilio:</label>
<div class="radio">
  <label>
<input name="em_en_donde" type="radio" value="0" <?php if(TirameDomicilioNro($_GET['dp_id'])==BuscaRegistro ("tb_datos_emprendimiento", "em_id", $_GET['em_id'], "em_domicilio")) echo 'checked'; ?>> Si |
</label>
<label>
<input name="em_en_donde" type="radio" value="1" <?php if(TirameDomicilioNro($_GET['dp_id'])!=BuscaRegistro ("tb_datos_emprendimiento", "em_id", $_GET['em_id'], "em_domicilio")) echo 'checked'; ?>> No
</label>
</div>
</div>

<div id="aa1">

<?php include("../recorte_gral/datos_domicilio.php"); ?>

</div>


<div class="form-group">
<?php echo SelectGeneralVal("em_tipo_lugar", "form-control", "tipolugaroid", "El lugar es:", "tb_tipo_locacion", "tl_id", "tl_name",BuscaRegistro ("tb_datos_emprendimiento", "em_id", $_GET['em_id'], "em_tipo_lugar")); ?>
</div>



<div class="form-group">
<label>Espacio físico suficiente:</label>
<div class="radio">
  <label>
<input name="em_espacio" type="radio" value="1" <?php if(BuscaRegistro ("tb_datos_emprendimiento", "em_id", $_GET['em_id'], "em_espacio")==1) echo 'checked'; ?>> Si |
</label>
<label>
<input name="em_espacio" type="radio" value="0" <?php if(BuscaRegistro ("tb_datos_emprendimiento", "em_id", $_GET['em_id'], "em_espacio")==0) echo 'checked'; ?>> No
</label>
</div>
</div>

<div id="aa2" style="display:none">

<div class="form-group">
<?php echo TextAreaGeneralVal("em_motivo_espacio", "form-control", "idmotivo", "2", "Motivo del poco espacio:",BuscaRegistro ("tb_datos_emprendimiento", "em_id", $_GET['em_id'], "em_motivo_espacio")); ?>
</div>
</div>

<div class="form-group has-success">
<?php echo SelectGeneralVal("em_tipo_empresa", "form-control", "tipoemp", "Tipo de emprendimiento:", "tb_tipo_emprendimiento", "te_id", "te_name",BuscaRegistro ("tb_datos_emprendimiento", "em_id", $_GET['em_id'], "em_tipo_empresa")); ?>
  <div class="requerido" id="falta_tipo">Falta completar este campo</div>
</div>

<button type="submit" class="btn btn-info" id="envia1">Continuar</button>
<input type="hidden" name="paso" value="2">
<input type="hidden" name="em_dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="em_id" value="<?php echo $_GET['em_id']; ?>">
<input type="hidden" name="nro_dom" value="<?php echo TirameDomicilioNro($_GET['dp_id']); ?>">
</form>

  <!-- fin contenido -->
</div>
<br><br><br><br>
<?php include("../recorte_gral/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/combinado_localidades.js"></script>
<script type="text/javascript" src="../js/geolocaliza.js"></script>
<script type="text/javascript" src="../js/validacion_calle.js"></script>
<script type="text/javascript" src="../js/predictivo_calles.js"></script>


  <script type="text/javascript" language="javascript">
    $(document).ready(function() {

      var elegido=$("#iddepartamento").val();
			localidad=$("#idlocalidad").val();
      $.post("../recorte_gral/localidades.php", { elegido: elegido, localidad: localidad }, function(data){
            $("#idlocalidad").html(data);
            });

     $("#parte1").submit(function(event) {
    if($("#emnombre").val()==""){
      $("#falta_nombre").show();
     event.preventDefault();
    }
		/*sk04* IS016 Campos NO requeridos
    if($("#rubroid").val()==""){
      $("#falta_rubro").show();
      event.preventDefault();
    }
    if($("#subrubroid").val()==""){
      $("#falta_subrubro").show();
      event.preventDefault();
    }
		*sk04*/
    if($("#tipoemp").val()==""){
      $("#falta_tipo").show();
      event.preventDefault();
    }
    if($("input[name=em_en_donde]").val()==1 && $("#latid").val()==""){
       $("#falta_mapa").show();
      event.preventDefault();
    }
  });

  $("input[name=em_en_donde]").change(function () {
      if ($(this).val()==1) {
      $("#aa1").show();
      } else {
      $("#aa1").hide();
      }
      });
  $("input[name=em_espacio]").change(function () {
      if ($(this).val()==0) {
      $("#aa2").show();
      } else {
      $("#aa2").hide();
      }
      });


  if ($("input[name=em_en_donde]:checked").val()==1) {
      $("#aa1").show();
      } else {
      $("#aa1").hide();
      }
  if ($("input[name=em_espacio]:checked").val()==0) {
      $("#aa2").show();
      } else {
      $("#aa2").hide();
      }


          $("#rubroid").change(function(){
                  $.get("tools/busca_rubro.php",{busca: $("#rubroid").val()}, function(htmlexterno){
                      $("#subrubroid").html(htmlexterno);
                  });
          });

     $("#iddepartamento").change(function () {
                $("#iddepartamento option:selected").each(function () {
            elegido=$(this).val();
            $.post("tools/localidades.php", { elegido: elegido }, function(data){
            $("#idlocalidad").html(data);
            });
        });
      });

   $("#idlocalidad").on("change",Buscaloc);
   $("#dpcalle").on("change",Buscaloc);
   $("#nrolocac").on("change",Buscaloc);


   function Buscaloc (){
        var id_loc = $("#idlocalidad").val();
            var es_calle = $("#dpcalle").val();
            var es_nro = $("#nrolocac").val();
          //  alert(id_loc+es_calle+es_nro);
            $.post("tools/localidades_str.php", { id_loc: id_loc, es_calle: es_calle, es_nro: es_nro }, function(datos){
              $("#address").attr("value",datos);
            });

      };
  });

  </script>
  <script src="../js/bootstrap-typeahead.js"></script>

</body>
</html>
