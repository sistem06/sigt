<?php
session_start();
include("../".$_SESSION["dir_sis"]."/secure.php");
include ("../conecta.php");
include ("../funciones/funciones_generales.php");
include ("../funciones/funciones_prestaciones.php");
ActualizaEstado ($_SESSION["sistema"]);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo BuscaRegistro ("tb_sistemas", "sis_id", $_SESSION["sistema"], "sis_name"); ?>	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/estilos_ss.css">
  <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="../source/jquery.fancybox.css?v=2.1.5" media="screen" />
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
</head>
<body>
<?php include("encabezado.php"); ?>
<div class="container-fluid">
<?php include("../".$_SESSION["dir_sis"]."/recortes/navegacion.php"); ?>
	<!-- comienza contenido -->

      <h3>Listado de Prestaciones Asignadas</h3>
<!-- aca comienza el calendario -->
<form role="form">
  <div class="row">
     <div class="col-xs-12 col-sm-6 col-md-3">
        <label>Prestación</label>
          <select id="prestacion_filtro" class="form form-control">
            <?php
           //   $tx_1 = "SELECT * FROM tbp_prestaciones_beneficiarios INNER JOIN tbp_prestaciones ON tbp_prestaciones_beneficiarios.pb_pre_id = tbp_prestaciones.pre_id  INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones_lista.tbp_pr_id = tbp_prestaciones.pre_pr_id WHERE tbp_prestaciones_lista.tbp_sis_id = ".$_SESSION['sistema']." group by tbp_prestaciones.pre_pr_id";
            $tx_1 = "SELECT tbp_pr_id, tbp_pr_name FROM tbp_prestaciones_lista WHERE tbp_sis_id = ".$_SESSION['sistema']." order by tbp_pr_name";
              $query_1 = mysql_query($tx_1);
              echo '<option value="0"></option>';
                while($a1 = mysql_fetch_array($query_1)){
                    echo '<option value="'.$a1['tbp_pr_id'].'">'.$a1['tbp_pr_name'].'</option>';
                }
            ?>
          </select>
     </div>

      <div class="col-xs-12 col-sm-6 col-md-3">
        <label>Beneficiario</label>
          <select id="beneficiario_filtro" class="form form-control">
          <?php
    /*          $tx_2 = "SELECT * FROM tbp_prestaciones_usuarios INNER JOIN tb_usuarios tbp_prestaciones_usuarios.pu_us_id ON tb_usuarios.us_id group by tbp_prestaciones_usuarios.pu_us_id";
               $query_2 = mysql_query($tx_2);
              echo '<option value="0"></option>';
                while($a2 = mysql_fetch_array($query_2)){
                    echo '<option value="'.$a2['tbp_pr_id'].'">'.$a2['tbp_pr_name'].'</option>';
                }*/

                $tx_2 = "SELECT * FROM tbp_prestaciones_beneficiarios INNER JOIN tb_datos_personales ON tbp_prestaciones_beneficiarios.pb_dp_id = tb_datos_personales.dp_id INNER JOIN tbp_prestaciones ON tbp_prestaciones.pre_id = tbp_prestaciones_beneficiarios.pb_pre_id INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones_lista.tbp_pr_id = tbp_prestaciones.pre_pr_id WHERE tbp_prestaciones_lista.tbp_sis_id = ".$_SESSION['sistema']."  group by tbp_prestaciones_beneficiarios.pb_dp_id order by tb_datos_personales.dp_name";
               $query_2 = mysql_query($tx_2);
              echo '<option value="0"></option>';
                while($a2 = mysql_fetch_array($query_2)){
                    echo '<option value="'.$a2['dp_id'].'">'.$a2['dp_name'].'</option>';
                }
            ?>
          </select>
     </div>
  </div>
</form>
<div id="contenedor_tabla"></div>

        <br><br><br><br>
  <!-- fin contenido -->
</div>
<?php include("pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>

  <script type="text/javascript" language="javascript" class="init">
  $(document).ready(function() {
    $("#prestacion_filtro").on("change",MuestraTabla);
   $("#beneficiario_filtro").on("change",MuestraTabla);


   function MuestraTabla (){
        var ben = $("#beneficiario_filtro").val();
        var pres = $("#prestacion_filtro").val();

          //  alert(id_loc+es_calle+es_nro);
            $.post("tools/listado_pres.php", { ben: ben, pres: pres }, function(datos){
              $("#contenedor_tabla").html(datos);
            });

      };

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
        $(".fancybox").fancybox({
        afterClose  : function() {
            window.location.reload();
        }
    });
});
  </script>
  <script type="text/javascript" language="javascript" src="../js/navbar.js"></script>
</body>
</html>
