<?php
if (!isset($_SESSION)) { session_start(); }
include ("../../".$_SESSION["dir_sis"]."/secure.php");
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
  <h3>Agrupando el puesto <?php echo BuscaRegistro ("tb_puestos", "pu_id", $_GET['pu_id'], "pu_name"); ?></h3>
    <form id="parte1" action="agrega_agrupamiento.php" method="post" role="form">

    <div class="form-group has-success">
   <laber for="seagrupa">Agrupa Con: </laber>
      <select class="form-control" name="seagrupa" id="seagrupa">
          <?php
            $txt = "select * from tb_puestos where (pu_id != '".$_GET['pu_id']."' and pu_name != 'Agregar Nuevo') order by pu_name";
            $query = mysql_query($txt);
                while($dat = mysql_fetch_array($query)){
                  echo '<option value="'.$dat['pu_id'].'">'.$dat['pu_name'].'</option>';
                }
          ?>
      </select>
<div class="requerido" id="falta_nombre"></div>
</div>


   <button type="submit" class="btn btn-info" id="envia1">Agrupar</button>

<input type="hidden" name="tabla" value="tb_puestos" />

<input type="hidden" name="pu_id" value="<?php echo $_GET['pu_id']; ?>" />

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
             if($("#nivel").val()==""){
            $("#falta_titulo").show();
            $('#falta_titulo').text("Debe completar este campo");
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
