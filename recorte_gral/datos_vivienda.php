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
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"
</head>
<body>
<?php include("encabezado.php"); ?>
<div class="container-fluid">
<?php include("../".$_SESSION["dir_sis"]."/recortes/navegacion.php"); ?>
	<!-- comienza contenido -->
</div>
<div class="container">
      <h3>Datos de la Vivienda</h3>

<!-- aca comienza el calendario -->
<?php
$dp_id = $_GET['dp_id'];
$ho_id = BuscaRegistro("tb_hogar_beneficiario","hb_dp_id",$dp_id,"hb_ho_id");
if (isset($ho_id)) {
	$regHogar = mysql_fetch_array(mysql_query("select * from tb_hogar where ho_id = ".$ho_id));
}
?>

<form id="parte1" action="add_registro.php" method="post" role="form">

<div class="form-group has-success">
<?php
	$prev = BuscaRegistro("tb_encuestas", "enc_hogar", $ho_id, "enc_caat");
	echo SelectGeneralVal("enc_caat", "form-control", "idcaat", "CAAT que realiza la encuesta:","tb_caats", "ca_id", "ca_name",$prev);
	unset($prev);
?>
<div class="requerido" id="falta_caat">Falta completar este campo</div>
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
		 		$inicio = new \DateTime($prev);
		 		$month = $inicio->format('m');
		 		$year = $inicio->format('Y');
		 		echo '<option value="'.$month.'" selected = "selected">'.$month.'</option>';
				unset($prev);
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
		 		$inicio = new \DateTime($prev);
		 		$month = $inicio->format('m');
		 		$year = $inicio->format('Y');
		 		echo '<option value="'.$year.'" selected = "selected">'.$year.'</option>';
				unset($prev);
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
	<div class="col-xs-12 col-md-6">
  	<div class="form-group">
			<?php
 			 $prev = BuscaRegistro("tb_hogar_general", "hog_ho_id", $ho_id, "hog_miembros");
 			 echo InputGeneralVal("text", "hog_miembros", "form-control", "idmiembros", "escriba el numero de miembros del hogar", "Nro de personas que componen el hogar:",$prev);
 			 unset($prev);
			?>
			<div class="requerido" id="falta_nromiembros">Falta completar este campo</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-6">
  	<div class="form-group">
			<?php
 			 $prev = BuscaRegistro("tb_hogar_general", "hog_ho_id", $ho_id, "hog_habitaciones");
 			 echo InputGeneralVal("text", "hog_habitaciones", "form-control", "idhabitaciones", "escriba el numero de habitaciones del hogar", "Nro de habitaciones exclusivas que tiene el hogar:",$prev);
 			 unset($prev);
			?>
			<div class="requerido" id="falta_nrohabitaciones">Falta completar este campo</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_hogar_general", "hog_ho_id", $ho_id, "hog_ubicacion_urbana");
				echo SelectGeneralVal("hog_ubicacion_urbana", "form-control", "uu", "Ubicacion:","tb_ubicaciones_urbanas", "uu_id", "uu_name",$prev);
				unset($prev);
			?>
  		<div class="requerido" id="falta_uu">Falta completar este campo</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_hogar_general", "hog_ho_id", $ho_id, "hog_tipo_casa");
				echo SelectGeneralVal("hog_tipo_casa", "form-control", "idtipocasa", "Este hogar vive en:","tb_tipo_casa", "tc_id", "tc_name",$prev);
				unset($prev);
			?>
  		<div class="requerido" id="falta_tipo_casa">Falta completar este campo</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_hogar_general", "hog_ho_id", $ho_id, "hog_material_piso");
				echo SelectGeneralVal("hog_material_piso", "form-control", "idmpiso", "Material predominante en los pisos:","tb_material_piso", "mp_id", "mp_name",$prev);
				unset($prev);
			?>
  		<div class="requerido" id="falta_mpiso">Falta completar este campo</div>
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
  		<div class="requerido" id="falta_mparedes">Falta completar este campo</div>
		</div>
	</div>
  <div class="col-xs-12 col-md-4">
    <div id="aa1" style="display:none;">
			<div class="form-group">
				<label>Las paredes exteriores tienen revestimiento?</label>
				<div class="radio">
					<label><input name="hog_revestimiento_externo" type="radio" value="1" <?php if(BuscaRegistro ("tb_hogar_general", "hog_ho_id", $ho_id, "hog_revestimiento_externo")==1) echo 'checked'; ?>> Si | </label>
					<label><input name="hog_revestimiento_externo" type="radio" value="0" <?php if(BuscaRegistro ("tb_hogar_general", "hog_ho_id", $ho_id, "hog_revestimiento_externo")==0) echo 'checked'; ?>> No </label>
				</div>
			</div>
  	</div>
  	<div id="aa2" style="display:none;">
	  	<div class="form-group">
				<?php
					$prev = BuscaRegistro("tb_hogar_general", "hog_ho_id", $ho_id, "hog_revestimiento_techo");
					echo SelectGeneralVal("hog_revestimiento_techo", "form-control", "oss", "Cual es el material predominante en el techo:","tb_cubierta_techo", "ct_id", "ct_name",$prev);
					unset($prev);
				?>			</div>
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
  		<div class="requerido" id="falta_cielorraso">Falta completar este campo</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-6">
	  <div class="form-group">
		<?php
		 $prev = BuscaRegistro("tb_hogar_general", "hog_ho_id", $ho_id, "hog_sup_pb");
		 echo InputGeneralVal("text", "hog_sup_pb", "form-control", "idsuppb", "Superficie de la planta baja en metros cuadrados", "Superficie de la planta baja (m2):",$prev);
		 unset($prev);
		?>
		</div>
	</div>
	<div class="col-xs-12 col-md-6">
  	<div class="form-group">
			<?php
			 $prev = BuscaRegistro("tb_hogar_general", "hog_ho_id", $ho_id, "hog_sup_viv");
			 echo InputGeneralVal("text", "hog_sup_viv", "form-control", "idsupviv", "Superficie total de la vivienda en metros cuadrados", "Superficie total de la vivienda (m2):",$prev);
			 unset($prev);
			?>
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
  <div class="col-xs-12 col-md-6">
  	<div class="form-group">
			<label>Tiene Electricidad?</label>
			<div class="radio">
				<label><input name="hos_electricidad" type="radio" value="1" <?php if(BuscaRegistro ("tb_hogar_servicios", "hos_ho_id", $ho_id, "hos_electricidad")==1) echo 'checked'; ?>> Si | </label>
				<label><input name="hos_electricidad" type="radio" value="0" <?php if(BuscaRegistro ("tb_hogar_servicios", "hos_ho_id", $ho_id, "hos_electricidad")==0) echo 'checked'; ?>> No </label>
			</div>
		<div class="requerido" id="falta_electricidad">Falta completar este campo</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-6">
  	<div class="form-group">
			<label>Tiene Teléfono?</label>
			<div class="radio">
				<label><input name="hos_telefono" type="radio" value="1" <?php if(BuscaRegistro ("tb_hogar_servicios", "hos_ho_id", $ho_id, "hos_telefono")==1) echo 'checked'; ?>> Si | </label>
				<label><input name="hos_telefono" type="radio" value="0" <?php if(BuscaRegistro ("tb_hogar_servicios", "hos_ho_id", $ho_id, "hos_telefono")==0) echo 'checked'; ?>> No </label>
			</div>
			<div class="requerido" id="falta_telefono">Falta completar este campo</div>
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
  		<div class="requerido" id="falta_accesoagua">Falta completar este campo</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_hogar_servicios", "hos_ho_id", $ho_id, "hos_fuente_agua");
				echo SelectGeneralVal("hos_fuente_agua", "form-control", "idfuenteagua", "Fuente de agua que usa para beber o cocinar:","tb_fuente_agua", "fa_id", "fa_name",$prev);
				unset($prev);
			?>
  		<div class="requerido" id="falta_fuente_agua">Falta completar este campo</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_hogar_servicios", "hos_ho_id", $ho_id, "hos_combustible_cocina");
				echo SelectGeneralVal("hos_combustible_cocina", "form-control", "idcoco", "Principal combustible que usa para cocinar:","tb_combustible_cocina", "coco_id", "coco_name",$prev);
				unset($prev);
			?>
  		<div class="requerido" id="falta_coco">Falta completar este campo</div>
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
  		<div class="requerido" id="falta_coca">Falta completar este campo</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_hogar_servicios", "hos_ho_id", $ho_id, "hos_desague");
				echo SelectGeneralVal("hos_desague", "form-control", "iddesague", "Tipo de desagüe del Inodoro:","tb_desagues", "de_id", "de_name",$prev);
				unset($prev);
			?>
  		<div class="requerido" id="falta_desague">Falta completar este campo</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_hogar_servicios", "hos_ho_id", $ho_id, "hos_banio");
				echo SelectGeneralVal("hos_banio", "form-control", "idbanio", "Baño (Tipo):","tb_banios", "ban_id", "ban_name",$prev);
				unset($prev);
			?>
  		<div class="requerido" id="falta_banio">Falta completar este campo</div>
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
				<label><input name="eq_heladera" type="radio" value="0" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_heladera")==0) echo 'checked'; ?>> No </label>
			</div>
			<div class="requerido" id="falta_heladera">Falta completar este campo</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-3">
  	<div class="form-group">
			<label>Tiene Cocina?</label>
			<div class="radio">
				<label><input name="eq_cocina" type="radio" value="1" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_cocina")==1) echo 'checked'; ?>> Si | </label>
				<label><input name="eq_cocina" type="radio" value="0" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_cocina")==0) echo 'checked'; ?>> No </label>
			</div>
			<div class="requerido" id="falta_cocina">Falta completar este campo</div>
		</div>
	</div>
  <div class="col-xs-12 col-md-3">
  	<div class="form-group">
			<label>Tiene Salamandra / Tacho?</label>
			<div class="radio">
				<label><input name="eq_salamandra" type="radio" value="1" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_salamandra")==1) echo 'checked'; ?>> Si | </label>
				<label><input name="eq_salamandra" type="radio" value="0" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_salamandra")==0) echo 'checked'; ?>> No </label>
			</div>
			<div class="requerido" id="falta_salamandra">Falta completar este campo</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-3">
  	<div class="form-group">
			<label>Tiene Teléfono fijo?</label>
			<div class="radio">
				<label><input name="eq_telefono" type="radio" value="1" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_telefono")==1) echo 'checked'; ?>> Si | </label>
				<label><input name="eq_telefono" type="radio" value="0" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_telefono")==0) echo 'checked'; ?>> No </label>
			</div>
			<div class="requerido" id="falta_telefono">Falta completar este campo</div>
		</div>
	</div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-3">
  	<div class="form-group">
			<label>Tiene Celular?</label>
			<div class="radio">
				<label><input name="eq_celular" type="radio" value="1" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_celular")==1) echo 'checked'; ?>> Si | </label>
				<label><input name="eq_celular" type="radio" value="0" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_celular")==0) echo 'checked'; ?>> No </label>
			</div>
			<div class="requerido" id="falta_celular">Falta completar este campo</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-3">
  	<div class="form-group">
			<label>Tiene Lavarropas?</label>
			<div class="radio">
				<label><input name="eq_lavarropa" type="radio" value="1" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_lavarropa")==1) echo 'checked'; ?>> Si | </label>
				<label><input name="eq_lavarropa" type="radio" value="0" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_lavarropa")==0) echo 'checked'; ?>> No </label>
			</div>
			<div class="requerido" id="falta_lavarropa">Falta completar este campo</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-3">
  	<div class="form-group">
			<label>Tiene DVD o Videocassetera?</label>
			<div class="radio">
				<label><input name="eq_dvd" type="radio" value="1" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_dvd")==1) echo 'checked'; ?>> Si | </label>
				<label><input name="eq_dvd" type="radio" value="0" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_dvd")==0) echo 'checked'; ?>> No </label>
			</div>
			<div class="requerido" id="falta_dvd">Falta completar este campo</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-3">
		<div class="form-group">
			<label>Tiene Televisión por cable?</label>
			<div class="radio">
				<label><input name="eq_tvcable" type="radio" value="1" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_dvd")==1) echo 'checked'; ?>> Si | </label>
				<label><input name="eq_tvcable" type="radio" value="0" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_dvd")==0) echo 'checked'; ?>> No </label>
			</div>
			<div class="requerido" id="falta_tvcable">Falta completar este campo</div>
		</div>
	</div>
</div>
<div class="row">
  <div class="col-xs-12 col-md-3">
  	<div class="form-group">
			<label>Tiene Direct TV?</label>
			<div class="radio">
				<label><input name="eq_directv" type="radio" value="1" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_dvd")==1) echo 'checked'; ?>> Si | </label>
				<label><input name="eq_directv" type="radio" value="0" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_dvd")==0) echo 'checked'; ?>> No </label>
			</div>
			<div class="requerido" id="falta_directv">Falta completar este campo</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-3">
  	<div class="form-group">
			<label>Tiene Horno microondas?</label>
			<div class="radio">
				<label><input name="eq_hornom" type="radio" value="1" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_dvd")==1) echo 'checked'; ?>> Si | </label>
				<label><input name="eq_hornom" type="radio" value="0" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_dvd")==0) echo 'checked'; ?>> No </label>
			</div>
			<div class="requerido" id="falta_hornom">Falta completar este campo</div>
		</div>
	</div>
  <div class="col-xs-12 col-md-3">
  	<div class="form-group">
			<label>Tiene Computadora con Internet?</label>
			<div class="radio">
				<label><input name="eq_pc_web" type="radio" value="1" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_dvd")==1) echo 'checked'; ?>> Si | </label>
				<label><input name="eq_pc_web" type="radio" value="0" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_dvd")==0) echo 'checked'; ?>> No </label>
			</div>
			<div class="requerido" id="falta_pc_web">Falta completar este campo</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-3">
  	<div class="form-group">
			<label>Tiene Computadora sola?</label>
			<div class="radio">
				<label><input name="eq_pc" type="radio" value="1" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_dvd")==1) echo 'checked'; ?>> Si | </label>
				<label><input name="eq_pc" type="radio" value="0" <?php if(BuscaRegistro ("tb_equipamiento_hogar", "eq_ho_id", $ho_id, "eq_dvd")==0) echo 'checked'; ?>> No </label>
			</div>
			<div class="requerido" id="falta_pc">Falta completar este campo</div>
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
			<?php
				$prev = BuscaRegistro("tb_hogar_propiedad", "pr_ho_id", $ho_id, "pr_propiedad");
				echo SelectGeneralVal("pr_propiedad", "form-control", "idpropiedad", "Propiedad del terreno:","tb_tipo_propiedad", "tp_id", "tp_name",$prev);
				unset($prev);
			?>
			<div class="requerido" id="falta_propiedad">Falta completar este campo</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php
				$prev = BuscaRegistro("tb_hogar_propiedad", "pr_ho_id", $ho_id, "pr_ocupacion");
				echo SelectGeneralVal("pr_ocupacion", "form-control", "idocupacion", "Condición de ocupación:","tb_condicion_ocupacion", "co_id", "co_name",$prev);
				unset($prev);
			?>
  		<div class="requerido" id="falta_ocupacion">Falta completar este campo</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
  	<div class="form-group">
			<?php //echo SelectGeneral("pr_uso", "form-control", "iduso", "Condición de uso:", "tb_condicion_uso", "cu_id", "cu_name"); ?>
			<?php
				$prev = BuscaRegistro("tb_hogar_propiedad", "pr_ho_id", $ho_id, "pr_uso");
				echo SelectGeneralVal("pr_uso", "form-control", "iduso", "Condición de uso:","tb_condicion_uso", "cu_id", "cu_name",$prev);
				unset($prev);
			?>
  		<div class="requerido" id="falta_uso">Falta completar este campo</div>
		</div>
	</div>
</div>
	<!-- Fin contenido -->

	<button type="submit" class="btn btn-info" id="envia1">Guardar</button>
	<input type="hidden" name="paso" value="15">
	<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
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

			 $("#parte1").keypress(function(e) {
					 if (e.which == 13) {
					 return false;
					 }
			 });

			 $("#envia1").click(function() {
				 if($("#idcaat").val()==""){
					 $("#falta_caat").show();
					 $("#falta_caat").focus();
					 return false;
				 }

				 if($("#idmiembros").val()==""){
		       $("#falta_nromiembros").show();
		       return false;
		     }
		     if($("#idhabitaciones").val()==""){
		       $("#falta_nrohabitaciones").show();
		       return false;
		     }

		     if($("#uu").val()==""){
		       $("#falta_uu").show();
		       return false;
		     }
		     if($("#idtipocasa").val()==""){
		       $("#falta_tipo_casa").show();
		       return false;
		     }
		     if($("#idmpiso").val()==""){
		       $("#falta_mpiso").show();
		       return false;
		     }
		     if($("#idmparedes").val()==""){
		       $("#falta_mparedes").show();
		       return false;
		     }
		     if(typeof $("input[name='hog_cielorraso']:checked").val() === "undefined"){
		                       $("#falta_cielorraso").show();
		                       return false;
		                     }
		     if(typeof $("input[name='hos_electricidad']:checked").val() === "undefined"){
		                       $("#falta_electricidad").show();
		                       return false;
		                     }
		     if(typeof $("input[name='hos_telefono']:checked").val() === "undefined"){
		                       $("#falta_telefono").show();
		                       return false;
		                     }
		     if($("#idaccesoagua").val()==""){
		       $("#falta_accesoagua").show();
		       return false;
		     }
		     if($("#idfuenteagua").val()==""){
		       $("#falta_fuente_agua").show();
		       return false;
		     }
		     if($("#idcoco").val()==""){
		       $("#falta_coco").show();
		       return false;
		     }
		     if($("#idcoca").val()==""){
		       $("#falta_coca").show();
		       return false;
		     }
		     if($("#iddesague").val()==""){
		       $("#falta_desague").show();
		       return false;
		     }
		     if($("#idbanio").val()==""){
		       $("#falta_banio").show();
		       return false;
		     }

				 if(typeof $("input[name='eq_heladera']:checked").val() === "undefined"){
		                       $("#falta_heladera").show();
		                       return false;
		                     }
		     if(typeof $("input[name='eq_cocina']:checked").val() === "undefined"){
		                       $("#falta_cocina").show();
		                       return false;
		                     }
		     if(typeof $("input[name='eq_salamandra']:checked").val() === "undefined"){
		                       $("#falta_salamandra").show();
		                       return false;
		                     }
		     if(typeof $("input[name='eq_telefono']:checked").val() === "undefined"){
		                       $("#falta_telefono").show();
		                       return false;
		                     }
		     if(typeof $("input[name='eq_celular']:checked").val() === "undefined"){
		                       $("#falta_celular").show();
		                       return false;
		                     }
		     if(typeof $("input[name='eq_lavarropa']:checked").val() === "undefined"){
		                       $("#falta_lavarropa").show();
		                       return false;
		                     }
		     if(typeof $("input[name='eq_dvd']:checked").val() === "undefined"){
		                       $("#falta_dvd").show();
		                       return false;
		                     }
		     if(typeof $("input[name='eq_tvcable']:checked").val() === "undefined"){
		                       $("#falta_tvcable").show();
		                       return false;
		                     }
		     if(typeof $("input[name='eq_directv']:checked").val() === "undefined"){
		                       $("#falta_directv").show();
		                       return false;
		                     }
		     if(typeof $("input[name='eq_hornom']:checked").val() === "undefined"){
		                       $("#falta_hornom").show();
		                       return false;
		                     }
		     if(typeof $("input[name='eq_pc_web']:checked").val() === "undefined"){
		                       $("#falta_pc_web").show();
		                       return false;
		                     }
		     if(typeof $("input[name='eq_pc']:checked").val() === "undefined"){
		                       $("#falta_pc").show();
		                       return false;
		                     }
		     if($("#idpropiedad").val()==""){
		       $("#falta_propiedad").show();
		       return false;
		     }
		     if($("#idocupacion").val()==""){
		       $("#falta_ocupacion").show();
		       return false;
		     }
		     if($("#iduso").val()==""){
		       $("#falta_uso").show();
		       return false;
		     }

		   }); /* $("#envia1").click(function() */

		   $("#idmparedes").change(function () {
	       if ($(this).val()==1) {
		       $("#aa1").show();
		       $("#aa2").hide();
		       } else {
		       $("#aa1").hide();
		       $("#aa2").show();
	       }
       });

			 $("#idmiembros").keypress(function(tecla) {
         if(tecla.charCode < 48 || tecla.charCode > 57) return false;
	     });
	       $("#idhabitaciones").keypress(function(tecla) {
	         if(tecla.charCode < 48 || tecla.charCode > 57) return false;
	     });
	       $("#idsupviv").keypress(function(tecla) {
	         if(tecla.charCode < 48 || tecla.charCode > 57) return false;
	     });
	       $("#idsuppb").keypress(function(tecla) {
	         if(tecla.charCode < 48 || tecla.charCode > 57) return false;
	     });

	   }); /* $(document).ready(function() */
	</script>
	<script type="text/javascript" language="javascript" src="../js/navbar.js"></script>
 </body>
 </html>
