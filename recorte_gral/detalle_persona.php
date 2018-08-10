<?php
session_start();
include("../".$_SESSION["dir_sis"]."/secure.php");
include("../conecta.php");
include("../funciones/funciones_generales.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title><?php echo BuscaRegistro ("tb_sistemas", "sis_id", $_SESSION["sistema"], "sis_name"); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/estilos_ss.css">
  <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="../source/jquery.fancybox.css?v=2.1.5" media="screen" />
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"
</head>
<body>
<?php include("encabezado.php"); ?>
<div class="container-fluid">
<?php include("../".$_SESSION["dir_sis"]."/recortes/navegacion.php"); ?>

<!-- Nombre Emprendedor -->
<h1><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_name"); ?> <small><?php echo BuscaRegistro ("tb_datos_emprendimiento", "em_dp_id", $_GET["dp_id"], "em_nombre"); ?></small></h1>

<!-- Pestañas -->
<ul class="nav nav-tabs">
  <li class="active" id="ver1"><a href="#" >Datos Personales</a></li>
  <li id="ver2"><a href="#">Prestaciones</a></li>
</ul>
<br>

<!-- Pestaña Datos Personales -->
<div id="gr1">

	<!-- Semáforo de Secciones -->
	<?php include("semaforos.php"); ?>
	<br>

	<!-- Secciones de Datos -->
	<?php
	$query = "select sa_ten_id from tbm_seccion_dp_area where (sa_sis_id = '".$_SESSION["sistema"]."')";
	$result = mysql_query($query);
	$data = array();
	while ($row = mysql_fetch_array($result)) {
		array_push($data, $row["sa_ten_id"]);
	}
	?>

	<?php
	$cant_box = 0;
	echo '<div class="row">';

	// Datos Personales -->
	if (in_array(4,$data)) { include("box_datos_personales.php"); $cant_box++; }

	// Documentos Gráficos -->
	if (in_array(6,$data)) { include("box_doc_graficos.php"); $cant_box++; }

	// Miembros del Hogar -->
	if (in_array(11,$data)) { include("box_miembros_hogar.php"); $cant_box++; }

	// Datos del Emprendimiento -->
	if (in_array(2,$data)) { include("box_datos_emprendimiento.php"); $cant_box++; }
	if ($cant_box==4) { echo '</div><div class="row">';	$cant_box=0;}

	// Instituciones Asociadas -->
	if (in_array(9,$data)) { include("box_datos_instituciones_asoc.php"); $cant_box++; }
	if ($cant_box==4) { echo '</div><div class="row">';	$cant_box=0;}

	// Lugares de Venta -->
	if (in_array(10,$data)) { include("box_datos_lugares_venta.php"); $cant_box++; }
	if ($cant_box==4) { echo '</div><div class="row">';	$cant_box=0;}

	// Lugares de Venta -->
	if (in_array(1,$data)) { include("box_datos_capacitaciones.php"); $cant_box++; }
	if ($cant_box==4) { echo '</div><div class="row">';	$cant_box=0;}

	// Subsidios y Créditos -->
	if (in_array(14,$data)) { include("box_datos_creditos.php"); $cant_box++; }
	if ($cant_box==4) { echo '</div><div class="row">';	$cant_box=0;}

	// Necesidades del Emprendimiento -->
	if (in_array(2,$data)) { include("box_datos_necesidades_emp.php"); $cant_box++; }
	if ($cant_box==4) { echo '</div><div class="row">';	$cant_box=0;}

	// Ingresos del Hogar -->
	if (in_array(8,$data)) { include("box_datos_ingresos.php"); $cant_box++; }
	if ($cant_box==4) { echo '</div><div class="row">';	$cant_box=0;}

	// Datos Discapacidad -->
	if (in_array(5,$data)) { include("box_datos_discapacidad.php"); $cant_box++; }
	if ($cant_box==4) { echo '</div><div class="row">';	$cant_box=0;}

	// Datos Educativos -->
	if (in_array(3,$data)) { include("box_datos_educativos.php"); $cant_box++; }
	if ($cant_box==4) { echo '</div><div class="row">';	$cant_box=0;}

	// Datos Vivienda -->
	if (in_array(15,$data)) { include("box_datos_vivienda.php"); $cant_box++; }
	if ($cant_box!==0) { echo '</div>';	unset($cant_box);}

	?>

</div> <!-- Fin Pestaña Datos Personales -->


<div id="gr2"> <!-- Pestaña Prestaciones -->
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-save"></span> Prestaciones Propias</h3>
                </div>
                <div class="panel-body">
                 <?php
                    $txt_pres_p = "SELECT * FROM tbp_prestaciones_beneficiarios INNER JOIN tbp_prestaciones ON tbp_prestaciones_beneficiarios.pb_pre_id = tbp_prestaciones.pre_id INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones.pre_pr_id = tbp_prestaciones_lista.tbp_pr_id WHERE (tbp_prestaciones_beneficiarios.pb_dp_id = '".$_GET['dp_id']."' and tbp_prestaciones_lista.tbp_sis_id = '".$_SESSION['sistema']."')";
                    $query_pre_p = mysql_query($txt_pres_p);
                    if(mysql_num_rows($query_pre_p)==0){
                        echo "<b> No hay prestaciones para mostrar </b>";
                    } else {
                      while($data_pre_p = mysql_fetch_array($query_pre_p)){
                       echo "<h4>".$data_pre_p['tbp_pr_name']." (".BuscaRegistro("tbp_prestacion_type","pt_id",$data_pre_p['tbp_pt_id'],"pt_name").")</h4>";
                       echo "<i>Agregado por :".BuscaRegistro("tb_usuarios","us_id",$data_pre_p['pre_us_id'],"us_name")." - En la fecha: ".$data_pre_p['pre_fecha_alta']."</i><br>";

                            switch ($data_pre_p['tbp_pt_id']) {
                              case '1':
                                echo "Motivo: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Entrevistador: <b>".$data_pre_p['pre_responsable']."</b> - Ubicación: <b>".$data_pre_p['pre_ubicacion']."</b> - Fecha: <b>".$data_pre_p['pre_fecha']."</b> - Hora: <b>".$data_pre_p['pre_hora']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                break;

                              case '2':
                                echo "Descripción: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Monto: <b>$ ".$data_pre_p['pre_monto']."</b> - Cuotas: <b>".$data_pre_p['pre_cuotas']."</b> - Fecha Inicio: <b>".$data_pre_p['pre_fecha']."</b> - Fecha Fin: <b>".$data_pre_p['pre_fecha_out']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                break;

                               case '10':
                                echo "Descripción: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Monto: <b>$ ".$data_pre_p['pre_monto']."</b> - Cuotas: <b>".$data_pre_p['pre_cuotas']."</b> - Fecha Inicio: <b>".$data_pre_p['pre_fecha']."</b> - Fecha Fin: <b>".$data_pre_p['pre_fecha_out']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                break;

                              case '11':
                                echo "Descripción: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Monto: <b>$ ".$data_pre_p['pre_monto']."</b> - Cuotas: <b>".$data_pre_p['pre_cuotas']."</b> - Fecha Inicio: <b>".$data_pre_p['pre_fecha']."</b> - Fecha Fin: <b>".$data_pre_p['pre_fecha_out']."</b><br>";
                                echo "Responsable: <b>".$data_pre_p['pre_fam_responsable']."</b> - DNI del Responsable: <b>".$data_pre_p['pre_dni_responsable']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                break;

                               case '12':
                                echo "Motivo: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Asesor: <b>".$data_pre_p['pre_responsable']."</b> - Fecha: <b>".$data_pre_p['pre_fecha']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                break;

                                 case '13':
                                echo "Motivo: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Asistente: <b>".$data_pre_p['pre_responsable']."</b> - Fecha: <b>".$data_pre_p['pre_fecha']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                break;

                                 case '14':
                                echo "Motivo: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Visitador: <b>".$data_pre_p['pre_responsable']."</b> - Fecha: <b>".$data_pre_p['pre_fecha']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                break;
                            }

                       echo "<hr>";
                      }
                    }
                  ?>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-share-alt"></span> Prestaciones de otras áreas</h3>
                </div>
                <div class="panel-body">
                </div>
            </div>
        </div>
    </div>
</div>


</div>
<br><br><br><br><br><br>
<?php include("pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>

  <script type="text/javascript" language="javascript" class="init">
  $(document).ready(function() {

     $("#gr2").hide();

     $("#ver1").click(function(){
       $("#ver1").addClass("active");
       $("#ver2").removeClass("active");
	     $("#gr2").hide();
	     $("#gr1").show();
     });

    $("#ver2").click(function(){
       $("#ver2").addClass("active");
       $("#ver1").removeClass("active");
       $("#gr1").hide();
       $("#gr2").show();
    });

	});
  </script>

  <script type="text/javascript" language="javascript" src="../js/navbar.js"></script>
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
</body>
</html>
