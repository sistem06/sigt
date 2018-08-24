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
if (!empty($_GET['act_id'])){
  $titulo = "Modificar Actividad";
  $titulo_boton = "Hacer Cambios";
  $us_form = InputGeneralVal("text", "act_name", "form-control", "usuario", "nombre de la actividad", "Nombre de la Actividad:",BuscaRegistro ("tb_actividades", "act_id", $_GET['act_id'], "act_name"));
  

  $accion = "M";
} else {
  $titulo = "Nueva Actividad";
  $titulo_boton = "Guardar";
  $us_form = InputGeneral("text", "act_name", "form-control", "usuario", "nombre de la actividad", "Actividad:");
  
  
  $accion = "A";
}
  ?>
  <div class="container">
  <h3><?php echo $titulo; ?></h3>
  <?php
  if(isset($_GET['act_id'])){
  $tx_his = "SELECT * FROM tb_historial_tablas WHERE (ht_item = '".$_GET['act_id']."' and ht_tabla = 'tb_actividades')";
  $qx_his = mysql_query($tx_his);
    while($a_his = mysql_fetch_array($qx_his)){
        echo "Se <b>".$a_his['ht_motivo']."</b> por <b>".BuscaRegistro("tb_usuarios","us_id",$a_his['ht_us'],"us_name")."</b> el dia ".$a_his['ht_fecha']."<br>";
    }
    echo "<br>";
}
?>
    <form id="parte1" action="agrega_modifica_general.php" method="post" role="form">

    <div class="form-group has-success">
   <?php echo $us_form; ?>
<div class="requerido" id="falta_nombre"></div>
</div>


 
   


  <button type="submit" class="btn btn-info" id="envia1"><?php echo $titulo_boton; ?></button>
  


<input type="hidden" name="act_id" value="<?php echo $_GET['act_id']; ?>" />

<input type="hidden" name="accion" value="<?php echo $accion; ?>" />

<input type="hidden" name="co_dp_id" value="<?php echo $_GET['co_dp_id']; ?>" />

<input type="hidden" name="tabla" value="tb_actividades" />

<input type="hidden" name="id_us" value="<?php echo $_SESSION['id_us'] ?>" />
</form>
</div>
   <script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
 <script src="../../js/bootstrap-typeahead.js"></script>
<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        $("#envia1").click(function() {
            if($("#usuario").val()==""){
            $("#falta_nombre").show();
            $('#falta_nombre').text("Debe completar este campo");
            return false;
            }
            
        });

        $("#usuario").focusout(function() {
                    if($("#usuario").val().length >= 3) {
                          $.get("comprobar.php", {dnii: $("#usuario").val(), tabla: "tb_titulo_secundario", valorbusc: "fp_name"}, function(respuesta){
                    if (respuesta == 1){
                        $("#falta_nombre").show();
                        $('#falta_nombre').text("Ya existe un titulo con ese nombre");
                        $('#envia1').attr("disabled", true);
                    } else {
                        $("#falta_nombre").hide();
                        $('#envia1').attr("disabled", false);
                    }
              })
                    }

                  });

    });
</script>

</body>
</html>