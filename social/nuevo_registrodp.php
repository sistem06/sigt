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
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"
</head>
<body>
<?php include("recortes/encabezado.php"); ?>
<div class="container-fluid">
<?php include("recortes/navegacion.php"); ?>
	<!-- comienza contenido -->
</div>
<div class="container">
<div class="paso_in">
      Nuevo Beneficiario - Datos Personales
<!-- aca comienza el calendario -->
          <span class="nombre_emp">
<?php
$dom = DatoRegistro ('tb_hogar', 'ho_dom_id', 'ho_id', $_GET['dp_id'], $conn);
echo DatoRegistro ('tb_domicilios', 'dom_calle', 'dom_id', $dom, $conn).' '.DatoRegistro ('tb_domicilios', 'dom_nro', 'dom_id', $dom, $conn).' (Vivienda '.DatoRegistro ('tb_hogar', 'ho_vivienda_lote_nro', 'ho_id', $_GET['dp_id'], $conn).' - Hogar '.DatoRegistro ('tb_hogar', 'ho_hogar_lote_nro', 'ho_id', $_GET['dp_id'], $conn).')';
?>
</span>
</div>
<form id="parte1" action="tools/add_registro.php" method="post" role="form">

<div class="row">
  <div class="col-xs-12 col-md-6">
  <div class="form-group">
   <?php echo InputGeneral("text", "dp_apellido", "form-control", "idapellido", "escriba el apellido", "Apellido:",""); ?>
<div class="requerido" id="falta_apellido">Falta completar este campo</div>
</div>
   </div>
   <div class="col-xs-12 col-md-6">
   <div class="form-group">
   <?php echo InputGeneral("text", "dp_nombre", "form-control", "idnombre", "escriba el nombre", "Nombre:",""); ?>
<div class="requerido" id="falta_nombre">Falta completar este campo</div>
</div>
   </div>
   </div>
   <div class="row">
  <div class="col-xs-12 col-md-6">
   <div class="form-group">
   <?php echo SelectGeneral("dp_tipo_doc", "form-control", "idtipodoc", "Tipo de documento:","tb_docs", "do_id", "do_name"); ?>
<div class="requerido" id="falta_tipo_doc">Falta completar este campo</div>
</div>
   </div>
   <div class="col-xs-12 col-md-6">
   <div class="form-group">
    <label for="nrodni">Nro de Documento:</label>
    <input type="text" class="form-control" id="nrodni" name="dp_nro_doc"
           placeholder="escriba el nro de Documento" maxlength="8">
    <div class="requerido" id="falta_dni">Falta completar este campo o nro incorrecto</div>
    
    </div>
   </div>
   </div>
 <div class="yasta">Ya existe un Beneficiario con este DNI </div>
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
<div class="form-group">
   <?php echo InputGeneral("date", "dp_nacimiento", "form-control", "nacim", "aaaa/mm/dd", "Fecha de Nacimiento:",""); ?>
   <div class="requerido" id="falta_nacim">Falta completar este campo</div>
  </div>

<div class="row">
  <div class="col-xs-12 col-md-6">
  <div class="form-group">
   <?php echo SelectGeneral("dp_sexo", "form-control", "idsexo", "Sexo:","tb_sexos", "sx_id", "sx_name"); ?>
  </div>
</div>
  <div class="col-xs-12 col-md-6">
  <div class="form-group">
   <?php echo SelectGeneral("dp_estado_civil", "form-control", "dpestadocivil", "Estado Civil:","tb_estado_civil", "ec_id", "ec_name"); ?>
  </div>
</div>
</div>




<!--
   <div class="dom_alternativa" id="alternativa">Alternativa</div>
<div id="dom_alternativo" style="display:none;">
<div class="gr1"><div class="etiqueta_gral">Dirección:</div><input name="dp_domicilio" class="input_gral" type="text"></div>
</div>
-->
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

<div class="form-group">
   <?php echo InputGeneral("text", "dp_mail", "form-control", "dpmail", "escriba el correo electronico", "Correo Electrónico:",""); ?>
  </div>

<div class="form-group">
   <?php echo InputGeneral("text", "dp_facebook", "form-control", "dpfacebook", "escriba la direccion de facebook", "Facebook:",""); ?>
  </div>

<div class="form-group">
<button type="submit" class="btn btn-info" id="envia1">Continuar</button>
</div>
<input type="hidden" name="paso" value="4">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
</form>
  <!-- fin contenido -->
</div>
<br><br><br><br>

<?php include("recortes/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>


 
  <script type="text/javascript" language="javascript">
    $(document).ready(function() {
      $("#envia1").click(function() {
        if($("#idapellido").val()==""){
          $("#falta_apellido").show();
          return false;
        }
         if($("#idnombre").val()==""){
          $("#falta_nombre").show();
          return false;
        }
        if($("#idtipodoc").val() == ""){
          $("#falta_tipo_doc").show();
          return false;
        }
        if($("#nrodni").val().length < 8){
          $("#falta_dni").show();
          return false;
        } else {
             $.get("tools/comprobar_ben.php", {dnii: $("#nrodni").val(), tabla: "tb_datos_personales", valorbusc: "dp_nro_doc"}, function(respuesta){
                    if (respuesta == "B"){
                        $(".yasta").show();
                        $('#envia1').attr("disabled", true);
                    } 
                    if (respuesta == "A"){
                        $(".yasta").hide();
                        $('#envia1').attr("disabled", false);
                    }
                    if (respuesta != "B" && respuesta != "A"){
                        $(".yasta").show();
                        $('.yasta').html('Este Emprendedor esta dado de alta en otro sistema <a href="tools/agrega_al_sistema.php?dp_id='+respuesta+'&id_us='+<?php echo $_SESSION["id_us"]; ?>+'"><button type="button" class="btn btn-danger">Agregar este Beneficiario</button></a>');
                        $('#envia1').attr("disabled", true);
                    } 
              })

        }
         if($("#nacim").val()==""){
          $("#falta_nacim").show();
          return false;
        }
        if($("#nrocuil").val().length < 13){
          $("#falta_cuil").show();
          return false;
        }
      });

      $("#nrodni").keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });
      $("#nrodni").focusout(function() {
        if($("#nrodni").val().length == 8) {
              $.get("tools/comprobar_ben.php", {dnii: $("#nrodni").val(), tabla: "tb_datos_personales", valorbusc: "dp_nro_doc"}, function(respuesta){
                    if (respuesta == "B"){
                        $(".yasta").show();
                        $('#envia1').attr("disabled", true);
                    } 
                    if (respuesta == "A"){
                        $(".yasta").hide();
                        $('#envia1').attr("disabled", false);
                    }
                    if (respuesta != "B" && respuesta != "A"){
                        $(".yasta").show();
                        $('.yasta').html('Este Emprendedor esta dado de alta en otro sistema <a href="tools/agrega_al_sistema.php?dp_id='+respuesta+'&id_us='+<?php echo $_SESSION["id_us"]; ?>+'"><button type="button" class="btn btn-danger">Agregar este Beneficiario</button></a>');
                        $('#envia1').attr("disabled", true);
                    } 
              })
        }
    });
    
  });
  </script>
  <script src="../js/bootstrap-typeahead.js"></script>

<script>
            $(function() {
                function displayResult(item) {
                    $('.alert').show().html('You selected <strong>' + item.value + '</strong>: <strong>' + item.text + '</strong>');
                }
                $('#dpcalle').typeahead({
                    ajax: {
                        url: 'tools/autocom.php?query=%QUERY',
                        method: 'post',
                        triggerLength: 1
                    },
                    onSelect: displayResult
                });

  });
        </script>

<script src="../js/jquery.mask.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function(){
  $('#nrocelu').mask('000-0000000');
  $('#nrotel').mask('000-0000000');
  $('#nrocuil').mask('00-00000000-0');
});
    </script>
  <script type="text/javascript" language="javascript" src="../js/navbar.js"></script>
</body>
</html>