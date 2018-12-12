<?php
if (!isset($_SESSION)) { session_start(); }
include("../".$_SESSION["dir_sis"]."/secure.php");
include("../conecta.php");
include("../funciones/funciones_generales.php");
include ("../funciones/funciones_prestaciones.php");
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
	<form>
<?php include("encabezado.php"); ?>
<div class="container-fluid">
<?php include("../".$_SESSION["dir_sis"]."/recortes/navegacion.php"); ?>

<!-- Barra de Mensajes -->
<div class="panel panel-default">
	<!-- Msg última actualización de datos personales -->
	<?php $url_dp = "nuevo_registro_mod.php?dp_id=".$_GET["dp_id"]; ?>
	<button type="button" style="float: right; margin-top: 4px; margin-right: 4px; border: none; "
		class="btn btn-link"
	   onclick="location.href='<?php echo $url_dp; ?>'">
		<span class="glyphicon glyphicon-map-marker btn-md"></span>
		Última actualización de Datos Personales:
		<strong><?php echo BuscaRegistro("tb_datos_personales", "dp_id", $_GET["dp_id"], "fecha_modificacion"); ?></strong>
	</button>
	<!-- Msg Falta Domicilio! -->
	<?php $url_domi = "nuevo_domicilio_mod.php?dp_id=".$_GET["dp_id"];
  	$id_dom = BuscaRegistro("tb_hogar_beneficiario", "hb_dp_id", $_GET["dp_id"], "hb_id");
		if (!isset($id_dom)) {
	?>
		<button type="button" style="float: right; margin-top: 4px; margin-right: 4px; border: none; "
			class="btn btn-danger btn-md"
		   onclick="location.href='<?php echo $url_domi; ?>'">
			<span class="glyphicon glyphicon-alert btn-md"></span>
			Falta Domicilio
		</button>
	<?php }; ?>

  <!-- Nombre de la Persona + Emprendimiento -->
	<div class="panel-heading">
		<h3 class="panel-title">
			Detalle de
			<span class="nombre_emp">
				<strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_name"); ?></strong>
				<small><?php if ($_SESSION["sistema"] == 1) { echo BuscaRegistro ("tb_datos_emprendimiento", "em_dp_id", $_GET["dp_id"], "em_nombre"); } ?></small>
			</span>
		</h3>
	</div>
</div>


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

	// Subsidios y Créditos -->
	if (in_array(14,$data)) { include("box_datos_creditos.php"); $cant_box++; }
	if ($cant_box==4) { echo '</div><div class="row">';	$cant_box=0;}

	// Necesidades del Emprendimiento -->
	if (in_array(2,$data)) { include("box_datos_necesidades_emp.php"); $cant_box++; }
	if ($cant_box==4) { echo '</div><div class="row">';	$cant_box=0;}

	// Historial Laboral -->
	if (in_array(7,$data)) { include("box_datos_laboral.php"); $cant_box++; }
	if ($cant_box==4) { echo '</div><div class="row">';	$cant_box=0;}

	// Ingresos del Hogar -->
	if (in_array(8,$data)) { include("box_datos_ingresos.php"); $cant_box++; }
	if ($cant_box==4) { echo '</div><div class="row">';	$cant_box=0;}

	// Datos Clínicos -->
	if (in_array(5,$data)) { include("box_datos_clinicos.php"); $cant_box++; }
	if ($cant_box==4) { echo '</div><div class="row">';	$cant_box=0;}

	// Datos Educativos -->
	if (in_array(3,$data)) { include("box_datos_educativos.php"); $cant_box++; }
	if ($cant_box==4) { echo '</div><div class="row">';	$cant_box=0;}

	// Datos Postulaciones -->
	if (in_array(13,$data)) { include("box_datos_postulaciones.php"); $cant_box++; }
	if ($cant_box==4) { echo '</div><div class="row">';	$cant_box=0;}

	// Datos Vivienda -->
	if (in_array(15,$data)) { include("box_datos_vivienda.php"); $cant_box++; }

	echo '</div>';
	unset($cant_box);

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
                    $txt_pres_p = "SELECT * FROM tbp_prestaciones_beneficiarios
										               INNER JOIN tbp_prestaciones ON tbp_prestaciones_beneficiarios.pb_pre_id = tbp_prestaciones.pre_id
																	 INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones.pre_pr_id = tbp_prestaciones_lista.tbp_pr_id
																	 WHERE (tbp_prestaciones_beneficiarios.pb_dp_id = '".$_GET['dp_id']."'
																		 and tbp_prestaciones_lista.tbp_sis_id = '".$_SESSION['sistema']."')";
                    $query_pre_p = mysql_query($txt_pres_p);
                    if(mysql_num_rows($query_pre_p)==0){
                        echo "<b> No hay prestaciones para mostrar </b>";
                    } else {
                      while($data_pre_p = mysql_fetch_array($query_pre_p)){
                       echo "<h4>".$data_pre_p['tbp_pr_name']." (".BuscaRegistro("tbp_prestacion_type","pt_id",$data_pre_p['tbp_pt_id'],"pt_name").")</h4>";
                       echo "<i>Agregado por :".BuscaRegistro("tb_usuarios","us_id",$data_pre_p['pre_us_id'],"us_name")." - En la fecha: ".$data_pre_p['pre_fecha_alta']."</i><br>";
                       echo '<p>';
                       RetornaEstado ($data_pre_p['pb_id'], BuscaRegistro("tbp_prestacion_type","pt_id",$data_pre_p['tbp_pt_id'],"pt_id"));
                       echo '</p>';
                       echo "<i>Agregado por :".BuscaRegistro("tb_usuarios","us_id",$data_pre_p['pre_us_id'],"us_name")." - En la fecha: ".$data_pre_p['pre_fecha_alta']."</i><br>";
                            switch ($data_pre_p['tbp_pt_id']) {
                              case '1':
                                echo "Motivo: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Entrevistador: <b>".BuscaRegistro("tb_usuarios","us_id",$data_pre_p['pre_responsable'],"us_name")."</b> - Ubicación: <b>".BuscaRegistro("tb_barrios_gloc","bar_id",$data_pre_p['pre_ubicacion'],"bar_name")."</b> - Fecha: <b>".$data_pre_p['pre_fecha']."</b> - Hora: <b>".$data_pre_p['pre_hora']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                 echo "<br>";
                              break;

                              case '2':
                                echo "Descripción: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Monto: <b>$ ".$data_pre_p['pre_monto']."</b> - Cuotas: <b>".$data_pre_p['pre_cuotas']."</b> - Fecha Inicio: <b>".$data_pre_p['pre_fecha']."</b> - Fecha Fin: <b>".$data_pre_p['pre_fecha_out']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                echo "<br>";
                              break;

                              case '3':
                                echo "Tema: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Responsable: <b>".BuscaRegistro("tb_usuarios","us_id",$data_pre_p['pre_responsable'],"us_name")."</b> - Ubicación: <b>".BuscaRegistro("tb_barrios_gloc","bar_id",$data_pre_p['pre_ubicacion'],"bar_name")."</b> - Fecha Inicio: <b>".$data_pre_p['pre_fecha']."</b> - Fecha Fin: <b>".$data_pre_p['pre_fecha_out']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                echo "<br>";
                              break;

                              case '4':
                                echo "Motivo: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Area: <b>".BuscaRegistro("tb_sistemas","sis_id",$data_pre_p['pre_area'],"sis_name")."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                echo "<br>";
                              break;

                              case '5':
                                echo "Motivo: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Responsable: <b>".BuscaRegistro("tb_usuarios","us_id",$data_pre_p['pre_responsable'],"us_name")."</b> - Ubicación: <b>".BuscaRegistro("tb_barrios_gloc","bar_id",$data_pre_p['pre_ubicacion'],"bar_name")."</b> - Fecha Inicio: <b>".$data_pre_p['pre_fecha']."</b> - Fecha Fin: <b>".$data_pre_p['pre_fecha_out']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                echo "<br>";
                              break;

                              case '6':
                                echo "Motivo: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Lider: <b>".BuscaRegistro("tb_usuarios","us_id",$data_pre_p['pre_responsable'],"us_name")."</b> - Ubicación: <b>".BuscaRegistro("tb_barrios_gloc","bar_id",$data_pre_p['pre_ubicacion'],"bar_name")."</b> - Fecha: <b>".$data_pre_p['pre_fecha']."</b> - Hora: <b>".$data_pre_p['pre_hora']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                echo "<br>";
                              break;

                              case '7':
                                echo "Tema: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Responsable: <b>".BuscaRegistro("tb_usuarios","us_id",$data_pre_p['pre_responsable'],"us_name")."</b> - Ubicación: <b>".BuscaRegistro("tb_barrios_gloc","bar_id",$data_pre_p['pre_ubicacion'],"bar_name")."</b> - Fecha: <b>".$data_pre_p['pre_fecha']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                echo "<br>";
                              break;

                              case '8':
                                echo "Responsable: <b>".BuscaRegistro("tb_usuarios","us_id",$data_pre_p['pre_responsable'],"us_name")."</b> - Destino: <b>".BuscaRegistro("tb_barrios_gloc","bar_id",$data_pre_p['pre_ubicacion'],"bar_name")."</b><br>
                                Fecha: <b>".$data_pre_p['pre_fecha']."</b> - Hora de Salida: <b>".$data_pre_p['pre_hora']."</b> - Hora de llegada: <b>".$data_pre_p['pre_hora_out']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                echo "<br>";
                              break;

                              case '9':
                                echo "Tema: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Responsable: <b>".BuscaRegistro("tb_usuarios","us_id",$data_pre_p['pre_responsable'],"us_name")."</b> - Ubicación: <b>".BuscaRegistro("tb_barrios_gloc","bar_id",$data_pre_p['pre_ubicacion'],"bar_name")."</b> - Fecha: <b>".$data_pre_p['pre_fecha']."</b> - Hora: <b>".$data_pre_p['pre_hora']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                echo "<br>";
                              break;

                              case '10':
                                echo "Descripción: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Monto: <b>$ ".$data_pre_p['pre_monto']."</b> - Cuotas: <b>".$data_pre_p['pre_cuotas']."</b> - Fecha Inicio: <b>".$data_pre_p['pre_fecha']."</b> - Fecha Fin: <b>".$data_pre_p['pre_fecha_out']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                echo "<br>";
                              break;

                              case '11':
                                echo "Descripción: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Monto: <b>$ ".$data_pre_p['pre_monto']."</b> - Cuotas: <b>".$data_pre_p['pre_cuotas']."</b> - Fecha Inicio: <b>".$data_pre_p['pre_fecha']."</b> - Fecha Fin: <b>".$data_pre_p['pre_fecha_out']."</b><br>";
                                echo "Responsable: <b>".$data_pre_p['pre_fam_responsable']."</b> - DNI del Responsable: <b>".$data_pre_p['pre_dni_responsable']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                 echo "<br>";

                                break;

                               case '12':
                                echo "Motivo: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Asesor: <b>".BuscaRegistro("tb_usuarios","us_id",$data_pre_p['pre_responsable'],"us_name")."</b> - Fecha: <b>".$data_pre_p['pre_fecha']."</b> - Ubicación: <b>".BuscaRegistro("tb_barrios_gloc","bar_id",$data_pre_p['pre_ubicacion'],"bar_name")."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                 echo "<br>";
                                break;

                                 case '13':
                                echo "Motivo: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Asistente: <b>".BuscaRegistro("tb_usuarios","us_id",$data_pre_p['pre_responsable'],"us_name")."</b> - Fecha: <b>".$data_pre_p['pre_fecha']."</b> - Ubicación: <b>".BuscaRegistro("tb_barrios_gloc","bar_id",$data_pre_p['pre_ubicacion'],"bar_name")."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                 echo "<br>";
                                break;

                                 case '14':
                                echo "Motivo: <b>".$data_pre_p['pre_tema']."</b><br>";

                                echo "Visitador: <b>".BuscaRegistro("tb_usuarios","us_id",$data_pre_p['pre_responsable'],"us_name")."</b> - Fecha: <b>".$data_pre_p['pre_fecha']."</b> - Ubicación: <b>".BuscaRegistro("tb_barrios_gloc","bar_id",$data_pre_p['pre_ubicacion'],"bar_name")."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                 echo "<br>";
                                break;

                                case '15':

                                echo "Fecha: <b>".$data_pre_p['pre_fecha']."</b> - Ubicación: <b>".BuscaRegistro("tb_barrios_gloc","bar_id",$data_pre_p['pre_ubicacion'],"bar_name")."</b><br>";
                                echo "Dirección de la empresa: <b>".BuscaRegistro("tbp_intermediacion_laboral","il_pb_id",$data_pre_p['pre_id'],"il_direccion_empresa")."</b>";
                                 echo "<br>";
                                 echo "Actividad: <b>".BuscaRegistro("tbp_actividades","act_id",BuscaRegistro("tbp_intermediacion_laboral","il_pb_id",$data_pre_p['pre_id'],"il_actividad"),"act_name")."</b> - Rubro: <b>".BuscaRegistro("tbp_rubro1","rb1_id",BuscaRegistro("tbp_intermediacion_laboral","il_pb_id",$data_pre_p['pre_id'],"il_rubro"),"rb1_name")."</b> - Subrubro: <b>".BuscaRegistro("tbp_rubro2","rb2_id",BuscaRegistro("tbp_intermediacion_laboral","il_pb_id",$data_pre_p['pre_id'],"il_subrubro"),"rb2_name")."</b>";
                                 echo "<br>";
                                break;

                            }
              if(BuscaRegistro("tbp_prestacion_type","pt_id",$data_pre_p['tbp_pt_id'],"pt_temp")==1){
                LinkEstado ($data_pre_p['pb_id'], BuscaRegistro("tbp_prestacion_type","pt_id",$data_pre_p['tbp_pt_id'],"pt_id"));
                echo ' ';
              }
          
              echo '<a href="tools/quitar_prestacion.php?tabla=tbp_prestaciones_beneficiarios&id=pb_id&val='.$data_pre_p['pb_id'].'&tipo='.BuscaRegistro("tbp_prestacion_type","pt_id",$data_pre_p['tbp_pt_id'],"pt_gr").'&pre_id='.$data_pre_p['pre_id'].'" class="fancybox fancybox.iframe"><button type="button" class="btn btn-warning btn-sm">
              <span class="glyphicon glyphicon-trash"></span></button></a> ';

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
                <?php
                    $txt_pres_n = "SELECT * FROM tbp_prestaciones_beneficiarios INNER JOIN tbp_prestaciones ON tbp_prestaciones_beneficiarios.pb_pre_id = tbp_prestaciones.pre_id INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones.pre_pr_id = tbp_prestaciones_lista.tbp_pr_id WHERE (tbp_prestaciones_beneficiarios.pb_dp_id = '".$_GET['dp_id']."' and tbp_prestaciones_lista.tbp_sis_id != '".$_SESSION['sistema']."' and tbp_prestaciones_lista.tbp_in_compartida = '1')";
                    $query_pre_n = mysql_query($txt_pres_n);
                    if(mysql_num_rows($query_pre_n)==0){
                        echo "<b> No hay prestaciones para mostrar </b>";
                    } else {
                      while($data_pre_n = mysql_fetch_array($query_pre_n)){
                       echo "<h4>".$data_pre_n['tbp_pr_name']." (".BuscaRegistro("tbp_prestacion_type","pt_id",$data_pre_n['tbp_pt_id'],"pt_name").")</h4>";

                       echo '<p>';
                       RetornaEstado ($data_pre_n['pb_id'], BuscaRegistro("tbp_prestacion_type","pt_id",$data_pre_n['tbp_pt_id'],"pt_id"));
                       echo '</p>';
                       echo "<i>Agregado por :".BuscaRegistro("tb_usuarios","us_id",$data_pre_n['pre_us_id'],"us_name")." - En la fecha: ".$data_pre_n['pre_fecha_alta']."</i><br>";
                            switch ($data_pre_n['tbp_pt_id']) {
                              case '1':
                                echo "Motivo: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Entrevistador: <b>".BuscaRegistro("tb_usuarios","us_id",$data_pre_n['pre_responsable'],"us_name")."</b> - Ubicación: <b>".BuscaRegistro("tb_barrios_gloc","bar_id",$data_pre_n['pre_ubicacion'],"bar_name")."</b> - Fecha: <b>".$data_pre_n['pre_fecha']."</b> - Hora: <b>".$data_pre_n['pre_hora']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                 echo "<br>";
                                break;

                              case '2':
                                echo "Descripción: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Monto: <b>$ ".$data_pre_n['pre_monto']."</b> - Cuotas: <b>".$data_pre_n['pre_cuotas']."</b> - Fecha Inicio: <b>".$data_pre_n['pre_fecha']."</b> - Fecha Fin: <b>".$data_pre_n['pre_fecha_out']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                 echo "<br>";

                                break;

                                 case '3':
                                echo "Tema: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Responsable: <b>".BuscaRegistro("tb_usuarios","us_id",$data_pre_n['pre_responsable'],"us_name")."</b> - Ubicación: <b>".BuscaRegistro("tb_barrios_gloc","bar_id",$data_pre_n['pre_ubicacion'],"bar_name")."</b> - Fecha Inicio: <b>".$data_pre_n['pre_fecha']."</b> - Fecha Fin: <b>".$data_pre_n['pre_fecha_out']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                 echo "<br>";

                                break;

                                 case '4':
                                echo "Motivo: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Area: <b>".BuscaRegistro("tb_sistemas","sis_id",$data_pre_n['pre_area'],"sis_name")."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                 echo "<br>";

                                break;

                                case '5':
                                echo "Motivo: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Responsable: <b>".BuscaRegistro("tb_usuarios","us_id",$data_pre_n['pre_responsable'],"us_name")."</b> - Ubicación: <b>".BuscaRegistro("tb_barrios_gloc","bar_id",$data_pre_n['pre_ubicacion'],"bar_name")."</b> - Fecha Inicio: <b>".$data_pre_n['pre_fecha']."</b> - Fecha Fin: <b>".$data_pre_n['pre_fecha_out']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                 echo "<br>";

                                break;

                              case '6':
                                echo "Motivo: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Lider: <b>".BuscaRegistro("tb_usuarios","us_id",$data_pre_n['pre_responsable'],"us_name")."</b> - Ubicación: <b>".BuscaRegistro("tb_barrios_gloc","bar_id",$data_pre_n['pre_ubicacion'],"bar_name")."</b> - Fecha: <b>".$data_pre_n['pre_fecha']."</b> - Hora: <b>".$data_pre_n['pre_hora']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                 echo "<br>";
                                break;

                              case '7':
                                echo "Tema: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Responsable: <b>".BuscaRegistro("tb_usuarios","us_id",$data_pre_n['pre_responsable'],"us_name")."</b> - Ubicación: <b>".BuscaRegistro("tb_barrios_gloc","bar_id",$data_pre_n['pre_ubicacion'],"bar_name")."</b> - Fecha: <b>".$data_pre_n['pre_fecha']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                 echo "<br>";
                                break;

                              case '8':
                                echo "Responsable: <b>".BuscaRegistro("tb_usuarios","us_id",$data_pre_n['pre_responsable'],"us_name")."</b> - Destino: <b>".BuscaRegistro("tb_barrios_gloc","bar_id",$data_pre_n['pre_ubicacion'],"bar_name")."</b><br>
                              Fecha: <b>".$data_pre_n['pre_fecha']."</b> - Hora de Salida: <b>".$data_pre_n['pre_hora']."</b> - Hora de llegada: <b>".$data_pre_n['pre_hora_out']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                 echo "<br>";
                                break;

                              case '9':
                                echo "Tema: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Responsable: <b>".BuscaRegistro("tb_usuarios","us_id",$data_pre_n['pre_responsable'],"us_name")."</b> - Ubicación: <b>".BuscaRegistro("tb_barrios_gloc","bar_id",$data_pre_n['pre_ubicacion'],"bar_name")."</b> - Fecha: <b>".$data_pre_n['pre_fecha']."</b> - Hora: <b>".$data_pre_n['pre_hora']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                 echo "<br>";
                                break;

                               case '10':
                                echo "Descripción: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Monto: <b>$ ".$data_pre_n['pre_monto']."</b> - Cuotas: <b>".$data_pre_n['pre_cuotas']."</b> - Fecha Inicio: <b>".$data_pre_n['pre_fecha']."</b> - Fecha Fin: <b>".$data_pre_n['pre_fecha_out']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                 echo "<br>";

                                break;

                              case '11':
                                echo "Descripción: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Monto: <b>$ ".$data_pre_n['pre_monto']."</b> - Cuotas: <b>".$data_pre_n['pre_cuotas']."</b> - Fecha Inicio: <b>".$data_pre_n['pre_fecha']."</b> - Fecha Fin: <b>".$data_pre_n['pre_fecha_out']."</b><br>";
                                echo "Responsable: <b>".$data_pre_n['pre_fam_responsable']."</b> - DNI del Responsable: <b>".$data_pre_n['pre_dni_responsable']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                 echo "<br>";

                                break;

                               case '12':
                                echo "Motivo: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Asesor: <b>".BuscaRegistro("tb_usuarios","us_id",$data_pre_n['pre_responsable'],"us_name")."</b> - Fecha: <b>".$data_pre_n['pre_fecha']."</b> - Ubicación: <b>".BuscaRegistro("tb_barrios_gloc","bar_id",$data_pre_n['pre_ubicacion'],"bar_name")."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                 echo "<br>";
                                break;

                                 case '13':
                                echo "Motivo: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Asistente: <b>".BuscaRegistro("tb_usuarios","us_id",$data_pre_n['pre_responsable'],"us_name")."</b> - Fecha: <b>".$data_pre_n['pre_fecha']."</b> - Ubicación: <b>".BuscaRegistro("tb_barrios_gloc","bar_id",$data_pre_n['pre_ubicacion'],"bar_name")."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                 echo "<br>";
                                break;

                                 case '14':
                                echo "Motivo: <b>".$data_pre_n['pre_tema']."</b><br>";

                                echo "Visitador: <b>".BuscaRegistro("tb_usuarios","us_id",$data_pre_n['pre_responsable'],"us_name")."</b> - Fecha: <b>".$data_pre_n['pre_fecha']."</b> - Ubicación: <b>".BuscaRegistro("tb_barrios_gloc","bar_id",$data_pre_n['pre_ubicacion'],"bar_name")."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                 echo "<br>";
                                break;
                            }

                       echo "<hr>";
                      }
                    }
                  ?>
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
	<?php include("../assets/usuario_lectura.php");	?>
</form>
</body>
</html>
