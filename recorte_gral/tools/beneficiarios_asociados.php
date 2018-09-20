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
      <?php
          switch ($_GET['tabla']) {
            case 'tb_titulo_secundario':
              $titulo = 'Beneficiarios con titulo '.BuscaRegistro ("tb_titulo_secundario", "ts_id", $_GET['ts_id'], "ts_name");
              $query_txt = "select * from tb_datos_nivel_educativo where dne_titulo = ".$_GET['ts_id'];
              $query = mysql_query($query_txt);
                $detalle = "";
             while($dat = mysql_fetch_array($query)){
                $detalle .= BuscaRegistro ("tb_datos_personales", "dp_id", $dat['dne_dp_id'], "dp_name").' - ';
                      }

              break;

              case 'tb_formacion_profesional':
              $titulo = 'Beneficiarios del curso '.BuscaRegistro ("tb_formacion_profesional", "fp_id", $_GET['ts_id'], "fp_name");
              $query_txt = "select * from tb_beneficiario_formacion_profesional where bfp_fp_id = ".$_GET['ts_id'];
              $query = mysql_query($query_txt);

                $detalle = "<p><b>Cursos Tomados</b></p>";
                 while($dat = mysql_fetch_array($query)){
                $detalle .= BuscaRegistro ("tb_datos_personales", "dp_id", $dat['bfp_dp_id'], "dp_name").' - ';
                      }

               $query_txt1 = "select * from tb_postulaciones_cursos where pc_curso = ".$_GET['ts_id'];
              $query1 = mysql_query($query_txt1);

                $detalle .= "<p><b>Postulaciones</b></p>";
                 while($dat1 = mysql_fetch_array($query1)){
                $detalle .= BuscaRegistro ("tb_datos_personales", "dp_id", $dat1['pc_dp_id'], "dp_name").' - ';
                      }

              break;

              case 'tb_actividades':
              $titulo = 'Beneficiarios con la actividad '.BuscaRegistro ("tb_actividades", "act_id", $_GET['ts_id'], "act_name");
              $query_txt = "select * from tb_antecedentes_laborales where al_actividad = ".$_GET['ts_id'];
              $query = mysql_query($query_txt);

                $detalle = "";
                 while($dat = mysql_fetch_array($query)){
                $detalle .= BuscaRegistro ("tb_datos_personales", "dp_id", $dat['al_dp_id'], "dp_name").' - ';
                      }

              break;

               case 'tb_puestos':
              $titulo = 'Beneficiarios con el puesto '.BuscaRegistro ("tb_puestos", "pu_id", $_GET['ts_id'], "pu_name");
              $query_txt = "select * from tb_antecedentes_laborales where al_puesto = ".$_GET['ts_id'];
              $query = mysql_query($query_txt);

                $detalle = "<p><b>Puestos que Ocupó</b></p>";
                 while($dat = mysql_fetch_array($query)){
                $detalle .= BuscaRegistro ("tb_datos_personales", "dp_id", $dat['al_dp_id'], "dp_name").' - ';
                      }

                $query_txt1 = "select * from tb_postulaciones_laborales where pl_puesto = ".$_GET['ts_id'];
              $query1 = mysql_query($query_txt1);

                $detalle = "<p><b>Puestos a los que se postula</b></p>";
                 while($dat1 = mysql_fetch_array($query1)){
                $detalle .= BuscaRegistro ("tb_datos_personales", "dp_id", $dat1['pl_dp_id'], "dp_name").' - ';
                      }

              break;

              case 'tb_categorias':
              $titulo = 'Beneficiarios con la categoria '.BuscaRegistro ("tb_categorias", "cat_id", $_GET['ts_id'], "cat_name");
              $query_txt = "select * from tb_antecedentes_laborales where al_categoria = ".$_GET['ts_id'];
              $query = mysql_query($query_txt);

                $detalle = "";
                 while($dat = mysql_fetch_array($query)){
                $detalle .= BuscaRegistro ("tb_datos_personales", "dp_id", $dat['al_dp_id'], "dp_name").' - ';
                      }

              break;

              case 'tb_calle':
              $titulo = 'Beneficiarios con la calle '.BuscaRegistro ("tb_calle", "ca_id", $_GET['ts_id'], "ca_name");
              $query_txt = "select * from tb_domicilios where dom_calle = ".$_GET['ts_id'];
              $query = mysql_query($query_txt);

                $detalle = "";
                 while($dat = mysql_fetch_array($query)){
                  $ho_id = BuscaRegistro ("tb_hogar", "ho_dom_id", $dat['dom_calle'], "ho_id");
                  $dp_id = BuscaRegistro ("tb_hogar_beneficiario", "ho_id", $ho_id, "hb_dp_id");
                $detalle .= BuscaRegistro ("tb_datos_personales", "dp_id", $dp_id, "dp_name").' - ';
                      }

              break;
          }
      ?>
  <h3><?php echo $titulo; ?></h3>
    <?php echo $detalle; ?>
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
