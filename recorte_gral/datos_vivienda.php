<?php
if (!isset($_SESSION)) { session_start(); }
include("../".$_SESSION["dir_sis"]."/secure.php");
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
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
</head>
<body>
<?php include("encabezado.php"); ?>
<div class="container-fluid">
<?php include("../".$_SESSION["dir_sis"]."/recortes/navegacion.php"); ?>
	<!-- comienza contenido -->
</div>
<div class="container">

	<div class="paso_in"> Datos de la Vivienda
	<span class="nombre_emp"><small><?php echo TirameDomicilio($_GET["dp_id"]); ?></small></span>
	</div>

<!-- aca comienza el calendario -->
<?php
$dp_id = $_GET['dp_id'];
$ho_id = BuscaRegistro("tb_hogar_beneficiario","hb_dp_id",$dp_id,"hb_ho_id");
if (isset($ho_id)) {
	$regHogar = mysql_fetch_array(mysql_query("select * from tb_hogar where ho_id = ".$ho_id));
}
?>

<form id="parte1" action="add_registro.php" method="post" role="form">

<div class="form-group">
<?php
	$prev = BuscaRegistro("tb_encuestas", "enc_hogar", $ho_id, "enc_caat");
	echo SelectGeneralVal("enc_caat", "form-control", "idcaat", "CAAT que realiza la encuesta:","tb_caats", "ca_id", "ca_name",$prev);
	unset($prev);
?>
</div>


<div class="form-group">
<label>Fecha de fijación del domicilio:</label>
<div class="row">
  <div class="col-xs-12 col-md-6">
   Mes:
   <select name="ho_inicio_mes" class="form-control">
   <?php
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
			if(isset($ho_id)) {
		 		$prev = BuscaRegistro("tb_hogar", "ho_id", $ho_id, "ho_inicio");
		 		$inicio = explode('-', $prev);
		 		if($inicio[1] != '00') { $month = $inicio[1]; } else { $month = "";}
		 		echo '<option value="'.$month.'" selected = "selected">'.$month.'</option>';
				unset($prev);
	 	  } else {
	 	  	echo '<option value="" selected = "selected"></option>';
	 	  }
    ?>
   </select>
  </div>
  <div class="col-xs-12 col-md-6">
   Año:
   <select name="ho_inicio_ano" class="form-control">
   <?php
   $ano = date("Y");
      while($ano > 1900){
        echo '<option value="'.$ano.'">'.$ano.'</option>';
        $ano--;
      }
			if(isset($ho_id)) {
		 		$prev = BuscaRegistro("tb_hogar", "ho_id", $ho_id, "ho_inicio");
		 		$inicio = explode('-', $prev);
		 		if($inicio[0] != '0000') { $year = $inicio[0]; } else { $year = ""; }
		 		echo '<option value="'.$year.'" selected = "selected">'.$year.'</option>';
				unset($prev);
	 	  } else {
	 	  	echo '<option value="" selected = "selected"></option>';
	 	  }
      ?>
   </select>
  </div>
</div>
</div>

	<!--  Identificación del Hogar -->
<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-check"></span>  Identificación del Hogar</div>
  </h3>
</div>

<div class="row">
  <div class="col-xs-12 col-md-6">
		<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_hogar", "ho_id", $ho_id, "ho_viviendas_lote");
				echo InputGeneralVal("text", "ho_viviendas_lote", "form-control", "nroviv", "escriba el nro de viviendas", "Cantidad de Viviendas en el lote:",$prev);
				unset($prev);
			?>
  	</div>
	</div>
  <div class="col-xs-12 col-md-6">
		<div class="form-group">
		 <?php
			 $prev = BuscaRegistro("tb_hogar", "ho_id", $ho_id, "ho_vivienda_lote_nro");
			 echo InputGeneralVal("text", "ho_vivienda_lote_nro", "form-control", "nrovives", "escriba el nro de Cédula de la Vivienda", "Esta Cedula corresponde a la Vivienda N°:",$prev);
			 unset($prev);
		 ?>
	  </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-6">
		<div class="form-group">
		 <?php
			 $prev = BuscaRegistro("tb_hogar", "ho_id", $ho_id, "ho_hogares_lote");
			 echo InputGeneralVal("text", "ho_hogares_lote", "form-control", "nrolote", "escriba el nro de hogares", "Cantidad de Hogares en la Vivienda:",$prev);
			 unset($prev);
		 ?>
  	</div>
  </div>
  <div class="col-xs-12 col-md-6">
		<div class="form-group">
		 <?php
			 $prev = BuscaRegistro("tb_hogar", "ho_id", $ho_id, "ho_hogar_lote_nro");
			 echo InputGeneralVal("text", "ho_hogar_lote_nro", "form-control", "nrolotees", "escriba el nro de Cédula del Hogar", "Esta Cedula corresponde al Hogar N°:",$prev);
			 unset($prev);
		 ?>
	  </div>
  </div>
</div>

<!-- Características de la Vivienda -->
<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-home"></span>  Caracteristas de la Vivienda</div>
  </h3>
</div>

<div class="row">
	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
 			 $prev = BuscaRegistro("tb_hogar_general", "hog_ho_id", $ho_id, "hog_miembros");
 			 echo InputGeneralVal("text", "hog_miembros", "form-control", "idmiembros", "escriba el numero de miembros del hogar", "Nro de personas que componen el hogar:",$prev);
 			 unset($prev);
			?>
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
 			 $prev = BuscaRegistro("tb_hogar_general", "hog_ho_id", $ho_id, "hog_habitaciones");
 			 echo InputGeneralVal("text", "hog_habitaciones", "form-control", "idhabitaciones", "escriba el numero de habitaciones del hogar", "Nro de habitaciones exclusivas que tiene el hogar:",$prev);
 			 unset($prev);
			?>
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<label>En el techo ¿Tiene cielorraso o revestimiento?</label>
			<div class="radio">
				<label><input name="hog_cielorraso" type="radio" value="1" <?php if(BuscaRegistro ("tb_hogar_general", "hog_ho_id", $ho_id, "hog_cielorraso")==1) echo 'checked'; ?>> Si | </label>
				<label><input name="hog_cielorraso" type="radio" value="0" <?php if(BuscaRegistro ("tb_hogar_general", "hog_ho_id", $ho_id, "hog_cielorraso")==0) echo 'checked'; ?>> No | </label>
				<label><input name="hog_cielorraso" type="radio" value="3" <?php if(BuscaRegistro ("tb_hogar_general", "hog_ho_id", $ho_id, "hog_cielorraso")==3) echo 'checked'; ?>> Ignorado </label>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_hogar_general", "hog_ho_id", $ho_id, "hog_tipo_casa");
				echo SelectGeneralVal("hog_tipo_casa", "form-control", "idtipocasa", "Este hogar vive en:","tb_tipo_casa", "tc_id", "tc_name",$prev);
				unset($prev);
			?>
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_hogar_general", "hog_ho_id", $ho_id, "hog_material_piso");
				echo SelectGeneralVal("hog_material_piso", "form-control", "idmpiso", "Material predominante en los pisos:","tb_material_piso", "mp_id", "mp_name",$prev);
				unset($prev);
			?>
		</div>
	</div>

	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<label>¿Las paredes externas tienen revoque o revestimiento externo?</label>
			<div class="radio">
				<label><input name="hog_revoque" type="radio" value="1" <?php if(BuscaRegistro ("tb_hogar_general", "hog_ho_id", $ho_id, "hog_revoque")==1) echo 'checked'; ?>> Si | </label>
				<label><input name="hog_revoque" type="radio" value="0" <?php if(BuscaRegistro ("tb_hogar_general", "hog_ho_id", $ho_id, "hog_revoque")==0) echo 'checked'; ?>> No | </label>
				<label><input name="hog_revoque" type="radio" value="3" <?php if(BuscaRegistro ("tb_hogar_general", "hog_ho_id", $ho_id, "hog_revoque")==3) echo 'checked'; ?>> Ignorado </label>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_hogar_general", "hog_ho_id", $ho_id, "hog_material_paredes");
				echo SelectGeneralVal("hog_material_paredes", "form-control", "idmparedes", "Material predominante en las paredes exteriores:","tb_material_paredes", "mpe_id", "mpe_name",$prev);
				unset($prev);
			?>
		</div>
	</div>

  <div class="col-xs-12 col-md-4">
		<div id="aa2">
			<div class="form-group">
				<?php
					$prev = BuscaRegistro("tb_hogar_general", "hog_ho_id", $ho_id, "hog_revestimiento_techo");
					echo SelectGeneralVal("hog_revestimiento_techo", "form-control", "oss", "Cual es el material predominante en el techo:","tb_cubierta_techo", "ct_id", "ct_name",$prev);
					unset($prev);
				?>
			</div>
		</div>
	</div>
</div>

<!-- Servicios -->
<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-phone-alt"></span>  Servicios</div>
  </h3>
</div>

<div class="row">
  <div class="col-xs-12 col-md-4">
		<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_hogar_servicios", "hos_ho_id", $ho_id, "hos_electricidad");
				echo SelectGeneralVal("hos_electricidad", "form-control", "idelectricidad", "Tiene Electricidad:","tb_electricidad", "ele_id", "ele_name",$prev);
				unset($prev);
			?>
		</div>
	</div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_hogar_servicios", "hos_ho_id", $ho_id, "hos_acceso_agua");
				echo SelectGeneralVal("hos_acceso_agua", "form-control", "idaccesoagua", "Acceso al Agua:","tb_acceso_agua", "aa_id", "aa_name",$prev);
				unset($prev);
			?>
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_hogar_servicios", "hos_ho_id", $ho_id, "hos_fuente_agua");
				echo SelectGeneralVal("hos_fuente_agua", "form-control", "idfuenteagua", "Fuente de agua que usa para beber o cocinar:","tb_fuente_agua", "fa_id", "fa_name",$prev);
				unset($prev);
			?>
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_hogar_servicios", "hos_ho_id", $ho_id, "hos_combustible_cocina");
				echo SelectGeneralVal("hos_combustible_cocina", "form-control", "idcoco", "Principal combustible que usa para cocinar:","tb_combustible_cocina", "coco_id", "coco_name",$prev);
				unset($prev);
			?>
		</div>
	</div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_hogar_servicios", "hos_ho_id", $ho_id, "hos_combustible_calefaccion");
				echo SelectGeneralVal("hos_combustible_calefaccion", "form-control", "idcoca", "Principal combustible que usa para calefaccionar:","tb_combustible_cocina", "coco_id", "coco_name",$prev);
				unset($prev);
			?>
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_hogar_servicios", "hos_ho_id", $ho_id, "hos_desague");
				echo SelectGeneralVal("hos_desague", "form-control", "iddesague", "Tipo de desagüe del Inodoro:","tb_desagues", "de_id", "de_name",$prev);
				unset($prev);
			?>
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_hogar_servicios", "hos_ho_id", $ho_id, "hos_banio");
				echo SelectGeneralVal("hos_banio", "form-control", "idbanio", "Baño (Tipo):","tb_banios", "ban_id", "ban_name",$prev);
				unset($prev);
			?>
		</div>
	</div>
</div>

<!-- Equipamiento de la Vivienda -->
<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-phone"></span>  Equipamiento de la Vivienda</div>
  </h3>
</div>

<div class="row">
	<div class="col-xs-12 col-md-3">
  	<div class="form-group">
			<label>Tiene Heladera?</label>
			<div class="radio">
				<label><input name="eq_heladera" type="radio" value="1" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_heladera")==1) echo 'checked'; ?>> Si | </label>
				<label><input name="eq_heladera" type="radio" value="2" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_heladera")==2) echo 'checked'; ?>> No | </label>
				<label><input name="eq_heladera" type="radio" value="0" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_heladera")==0) echo 'checked'; ?>> Ignorado </label>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-3">
  	<div class="form-group">
			<label>Tiene Cocina?</label>
			<div class="radio">
				<label><input name="eq_cocina" type="radio" value="1" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_cocina")==1) echo 'checked'; ?>> Si | </label>
				<label><input name="eq_cocina" type="radio" value="2" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_cocina")==2) echo 'checked'; ?>> No | </label>
				<label><input name="eq_cocina" type="radio" value="0" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_cocina")==0) echo 'checked'; ?>> Ignorado </label>
			</div>
		</div>
	</div>
  <div class="col-xs-12 col-md-3">
  	<div class="form-group">
			<label>Tiene Salamandra / Tacho?</label>
			<div class="radio">
				<label><input name="eq_salamandra" type="radio" value="1" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_salamandra")==1) echo 'checked'; ?>> Si | </label>
				<label><input name="eq_salamandra" type="radio" value="2" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_salamandra")==2) echo 'checked'; ?>> No | </label>
				<label><input name="eq_salamandra" type="radio" value="0" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_salamandra")==0) echo 'checked'; ?>> Ignorado </label>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-3">
  	<div class="form-group">
			<label>Tiene Teléfono fijo?</label>
			<div class="radio">
				<label><input name="eq_telefono" type="radio" value="1" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_telefono")==1) echo 'checked'; ?>> Si | </label>
				<label><input name="eq_telefono" type="radio" value="2" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_telefono")==2) echo 'checked'; ?>> No | </label>
				<label><input name="eq_telefono" type="radio" value="0" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_telefono")==0) echo 'checked'; ?>> Ignorado </label>
			</div>
		</div>
	</div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-3">
  	<div class="form-group">
			<label>Tiene Celular?</label>
			<div class="radio">
				<label><input name="eq_celular" type="radio" value="1" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_celular")==1) echo 'checked'; ?>> Si | </label>
				<label><input name="eq_celular" type="radio" value="2" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_celular")==2) echo 'checked'; ?>> No | </label>
				<label><input name="eq_celular" type="radio" value="0" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_celular")==0) echo 'checked'; ?>> Ignorado </label>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-3">
  	<div class="form-group">
			<label>Tiene Computadora sola?</label>
			<div class="radio">
				<label><input name="eq_pc" type="radio" value="1" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_dvd")==1) echo 'checked'; ?>> Si | </label>
				<label><input name="eq_pc" type="radio" value="2" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_dvd")==2) echo 'checked'; ?>> No | </label>
				<label><input name="eq_pc" type="radio" value="0" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_dvd")==0) echo 'checked'; ?>> Ignorado </label>
			</div>
		</div>
	</div>
</div>

<!-- Datos del Lote -->
<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-paperclip"></span>  Datos del Lote</div>
  </h3>
</div>

<div class="row">

	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php //echo SelectGeneral("pr_uso", "form-control", "iduso", "Condición de uso:", "tb_condicion_uso", "cu_id", "cu_name"); ?>
			<?php
				$prev = BuscaRegistro("tb_hogar_propiedad", "pr_ho_id", $ho_id, "pr_uso");
				echo SelectGeneralVal("pr_uso", "form-control", "iduso", "La vivienda que ocupa es?","tb_condicion_uso", "cu_id", "cu_name",$prev);
				unset($prev);
			?>
		</div>
	</div>

	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_hogar_propiedad", "pr_ho_id", $ho_id, "pr_ocupacion");
				echo SelectGeneralVal("pr_ocupacion", "form-control", "idocupacion", "El terreno es..","tb_condicion_ocupacion", "co_id", "co_name",$prev);
				unset($prev);
			?>
		</div>
	</div>

	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_hogar_propiedad", "pr_ho_id", $ho_id, "pr_documentacion");
				echo SelectGeneralVal("pr_documentacion", "form-control", "iddocumentacion", "Documentación de la Vivienda:","tb_documentacion_vivienda", "dv_id", "dv_name",$prev);
				unset($prev);
			?>
		</div>
	</div>


</div>
	<!-- Fin contenido -->

<!-- nuevo historial -->
<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-time"></span>  Historial de Locaciones </div>
  </h3>
</div>

<div class="row">
	<div class="col-xs-12 col-md-6">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_historial_locaciones", "hi_ho_id", $ho_id, "hi_years_lote");
				?>
				<label>¿Cuantos años vive en este lote?</label>
				<select name="hi_years_lote" class="form form-control">
					<?php
					echo '<option value="'.$prev.'">'.$prev.'</option>';
						$i=0;
						while($i<81){
							echo '<option value="'.$i.'">'.$i.'</option>';
							$i++;
						}
					?>
				</select>
				<?php
				unset($prev);
			?>
		</div>
	</div>

	<div class="col-xs-12 col-md-6">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_historial_locaciones", "hi_ho_id", $ho_id, "hi_years_barrio");
				?>
				<label>¿Cuantos años vive en este barrio?</label>
				<select name="hi_years_barrio" id="years_barrio" class="form form-control">
					<?php
					echo '<option value="'.$prev.'">'.$prev.'</option>';
					echo '<option value="999">Desde Siempre</option>';
						$i=0;
						while($i<81){
							echo '<option value="'.$i.'">'.$i.'</option>';
							$i++;
						}
					?>
				</select>
				<?php
				unset($prev);
			?>
		</div>
	</div>


</div>

<div id="mas_historial" style="display:none;">
	<div class="row">

		<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_historial_locaciones", "hi_ho_id", $ho_id, "hi_razon_mudar");
				echo SelectGeneralVal("hi_razon_mudar", "form-control", "idmudar", "Se mudo porque...","tb_razones_mudar", "rm_id", "rm_name",$prev);
				unset($prev);
			?>
		</div>
	</div>

	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_historial_locaciones", "hi_ho_id", $ho_id, "hi_conquien_vivia");
				echo SelectGeneralVal("hi_conquien_vivia", "form-control", "idconquien", "Con quien vivia?","tb_conquien_vivia", "cqv_id", "cqv_name",$prev);
				unset($prev);
			?>
		</div>
	</div>

	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_historial_locaciones", "hi_ho_id", $ho_id, "hi_estado_vivia");
				echo SelectGeneralVal("hi_estado_vivia", "form-control", "idestado", "En el lugar donde vivia","tb_lugar_vivia", "lv_id", "lv_name",$prev);
				unset($prev);
			?>
		</div>
	</div>

	</div>

	<div class="row">

		<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_historial_locaciones", "hi_ho_id", $ho_id, "hi_provincia_vivia");
				echo SelectGeneralVal("hi_provincia_vivia", "form-control", "provincia_vivia", "Provincia donde vivia anteriormente","tb_provincias", "pr_id", "pr_name",$prev);
				unset($prev);
			?>
		</div>
	</div>

	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
  		<label>Ciudad donde vivia anteriormente</label>
  		<select name = "hi_localidad_vivia" class="form-control" id="localidad_vivia">
  			<?php
				$prev = BuscaRegistro("tb_historial_locaciones", "hi_ho_id", $ho_id, "hi_localidad_vivia");
				$prev1 = BuscaRegistro("tb_localidades_pais", "loc_id", $prev, "loc_name");
				echo '<option value="'.$prev.'">'.$prev1.'</option>';
				unset($prev);
				unset($prev1);
			?>

  		</select>
		</div>
	</div>

	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_historial_locaciones", "hi_ho_id", $ho_id, "hi_barrio_vivia");
				echo InputGeneralVal("text", "hi_barrio_vivia", "form-control", "ubicacion", "escriba el barrio donde vivia", "Barrio donde vivia anteriormente:",$prev);
				unset($prev);
			?>
			<div id="listado_barrios" class="listado_rubros"></div>
		</div>
	</div>

	</div>

</div>

<!-- fin historial -->

	<button type="submit" class="btn btn-info" id="envia1">Guardar</button>
	<input type="hidden" name="paso" value="15">
	<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
	<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
	<input type="hidden" name="nro_dom" value="<?php echo TirameDomicilioNro($_GET['dp_id']); ?>">
	</form>

	  <!-- fin contenido -->
	</div> <!-- div class="container" -->
	<br><br><br><br>
	<?php include("pie.php"); ?>

	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript">
		 $(document).ready(function() {

		 	if($("#years_barrio").val()!="" && $("#years_barrio").val()!=999){
		 			$("#mas_historial").show();
		 		} else {
		 			$("#mas_historial").hide();
		 		}

		 	$("#provincia_vivia").change(function(){
		 		var prov = $("#provincia_vivia").val();
		 		$.get("tools/busca_localidad.php",{loc_pr_id : prov}, function(datos_loc){
		 			$("#localidad_vivia").html(datos_loc);
		 		});
		 	});

		/* 	$("#localidad_vivia").change(function(){
		 		alert($("#localidad_vivia").val());
		 	});*/

		 	if($("#localidad_vivia").val()==3708){

		 		$("#ubicacion").keyup(function(){
            if($("#ubicacion").val().length>1){
                $("#listado_barrios").show();
                 $.get("tools/busca_ubi_barrio.php",{busca: $("#ubicacion").val()}, function(htmlexterno1){
                      $("#listado_barrios").html(htmlexterno1);
                  });
                 $("#listado_barrios").on("click", ".cada_elemento a", function(){
                      var dato = $(this).attr("value");
                      var parte_dato = dato.split('|');
                        $("#ubicacion").val(parte_dato[0]);
                        $("#listado_barrios").hide();

                        return false;
                 });
            } else {
              $("#listado_barrios").hide();
            }
          });
		 	}

		 	$("#years_barrio").change(function(){
		 		if($("#years_barrio").val()!="" && $("#years_barrio").val()!=999){
		 			$("#mas_historial").show();
		 		} else {
		 			$("#mas_historial").hide();
		 		}
		 	});

			 $("#parte1").keypress(function(e) {
					 if (e.which == 13) {
					 return false;
					 }
			 });

			 $("#envia1").click(function() {

		   }); /* $("#envia1").click(function() */

			 $("#idmiembros").keypress(function(tecla) {
         if(tecla.charCode < 48 || tecla.charCode > 57) return false;
	     });
	       $("#idhabitaciones").keypress(function(tecla) {
	         if(tecla.charCode < 48 || tecla.charCode > 57) return false;
	     });

	   }); /* $(document).ready(function() */
	</script>
	<script type="text/javascript" language="javascript" src="../js/navbar.js"></script>
 </body>
 </html>
