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

    <?php
if (!empty($_GET['or_id'])){
  $titulo = "Modificar Institucion";
  $titulo_boton = "Hacer Cambios";
  $us_form = InputGeneralVal("text", "or_name", "form-control", "usuario", "nombre de la organizacion", "Nombre de la Organizacion:",BuscaRegistro ("tb_organizaciones", "or_id", $_GET['or_id'], "or_name"));
  

  $accion = "M";
} else {
  $titulo = "Nueva Institucion";
  $titulo_boton = "Guardar";
  $us_form = InputGeneral("text", "ins_name", "form-control", "usuario", "nombre de la institucion", "Nombre de la Institucion:");
  $direccion = InputGeneral("text", "ins_direccion", "form-control", "nrolocac", "escriba el del domicilio", "Domicilio:","");
  $telefono = InputGeneral("text", "ins_telefono", "form-control", "idpiso", "escriba el nro de telefono", "Telefono:","");
  $contacto = InputGeneral("text", "ins_contacto", "form-control", "iddepto", "escriba el nombre del contacto", "Contacto:","");
  $mail = InputGeneral("text", "ins_mail", "form-control", "idmail", "escriba el mail de la imstitucion", "Mail:","");
  $accion = "A";
}
  ?>
  <div class="container">
  <h3><?php echo $titulo; ?></h3>
    <form id="parte1" action="agrega_modifica_general.php" method="post" role="form">

    <div class="form-group has-success">
   <?php echo $us_form; ?>
<div class="requerido" id="falta_nombre"></div>
</div>

<div class="form-group">
  <?php echo $direccion; ?>
</div>

<div class="form-group">
  <?php echo $telefono; ?>
</div>

<div class="form-group">
  <?php echo $contacto; ?>
</div>

<div class="form-group">
  <?php echo $mail; ?>
</div>

 


  <button type="submit" class="btn btn-info" id="envia1"><?php echo $titulo_boton; ?></button>
  


<input type="hidden" name="or_id" value="<?php echo $_GET['or_id']; ?>" />

<input type="hidden" name="accion" value="<?php echo $accion; ?>" />

<input type="hidden" name="tabla" value="tb_instituciones_cpa" />
</form>
</div>
   <script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
 <script src="../../js/bootstrap-typeahead.js"></script>
 <script src="../../js/jquery.mask.min.js"></script>
<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        $("#envia1").click(function() {
            if($("#usuario").val()==""){
            $("#falta_nombre").show();
            $('#falta_nombre').text("Debe completar este campo");
            return false;
            }
            
        });

           $("#iddepartamento").change(function () {  
                $("#iddepartamento option:selected").each(function () {
            elegido=$(this).val();
            $.post("localidades.php", { elegido: elegido }, function(data){
            $("#idlocalidad").html(data);
            });           
        }); 
      });
           $('#nrocuil').mask('00-00000000-0');

    });
</script>
<script>
            $(function() {
                function displayResult(item) {
                    $('.alert').show().html('You selected <strong>' + item.value + '</strong>: <strong>' + item.text + '</strong>');
                }
                $('#dpcalle').typeahead({
                    ajax: {
                        url: 'autocom.php?query=%QUERY',
                        method: 'post',
                        triggerLength: 1
                    },
                    onSelect: displayResult
                });

  });
        </script>
</body>
</html>