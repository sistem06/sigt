<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
	$pt_id = BuscaRegistro("tbp_prestaciones_lista","tbp_pr_id",$_GET['busca'],"tbp_pt_id");
//		echo $pt_id;
	switch ($pt_id) {
		case '3':
?>
<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="form-group has-success">
		<label>Tema:</label>
  			<input type="text" id="motivo" name="pre_tema" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_motivo">Falta completar este campo</div>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="form-group has-success">
		<label>Responsable:</label>
  			<input type="text" id="responsable" name="pre_responsable" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_responsable">Falta completar este campo</div>
	</div>
	</div>
	<div class="col-xs-12 col-md-6">
	<div class="form-group has-success">
		<label>Ubicación:</label>
  			<input type="text" id="ubicacion" name="pre_ubicacion" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_ubicacion">Falta completar este campo</div>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-6">
	<div class="form-group has-success">
		<label>Fecha:</label>
  			<input type="date" id="motivo" name="pre_fecha" class="form-control" autocomplete="off" value="<?php echo date("Y-m-d"); ?>">
 				<div class="requerido" id="falta_fecha">Falta completar este campo</div>
	</div>
	</div>
	<div class="col-xs-12 col-md-3">
	<div class="form-group has-success">
		<label>Hora:</label>
  			<select id="hora" name="nm_hora" class="form-control">
 				<?php
 					$d = 0;
 					while($d<24){
 						if($d<10){
 							$d = "0".$d;
 						}
 						echo '<option>'.$d.'</option>';
 						$d++;
 					}
 				?>
 			</select>
	</div>
	</div>
	<div class="col-xs-12 col-md-3">
	<div class="form-group has-success">
		<label>Minutos:</label>
  			<select id="minutos" name="nm_minutos" class="form-control">
 				<?php
 					$s = 0;
 					while($s<60){
 						if($s<10){
 							$s = "0".$s;
 						}
 						echo '<option>'.$s.'</option>';
 						$s++;
 					}
 				?>
 			</select>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="form-group">
			<label>Observaciones:</label>
			<textarea id="observaciones" class="form-control" name="pre_observaciones"></textarea>
		</div>
	</div>
</div>
<?php
			break;

			case '5':
			break;

			case '6':
?>
<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="form-group has-success">
		<label>Motivo:</label>
  			<input type="text" id="motivo" name="pre_tema" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_motivo">Falta completar este campo</div>
	</div>
	</div>
	
</div>
<div class="row">

<div class="col-xs-12 col-md-4">
		<div class="form-group has-success">
		<label>Lider:</label>
  			<input type="text" id="responsable" name="pre_responsable" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_responsable">Falta completar este campo</div>
	</div>
	</div>
	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Ubicación:</label>
  			<input type="text" id="ubicacion" name="pre_ubicacion" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_ubicacion">Falta completar este campo</div>
	</div>
	</div>

	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Fecha:</label>
  			<input type="date" id="fecha_in" name="pre_fecha" class="form-control" autocomplete="off">
  			<div class="requerido" id="falta_fecha_in">Falta completar este campo</div>
	</div>
	</div>

	
	
</div>
<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="form-group">
			<label>Observaciones:</label>
			<textarea id="observaciones" class="form-control" name="pre_observaciones"></textarea>
		</div>
	</div>
</div>
<?php
			break;

			case '7':
?>
<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="form-group has-success">
		<label>Tema:</label>
  			<input type="text" id="motivo" name="pre_tema" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_motivo">Falta completar este campo</div>
	</div>
	</div>
	
</div>
<div class="row">

<div class="col-xs-12 col-md-4">
		<div class="form-group has-success">
		<label>Responsable:</label>
  			<input type="text" id="responsable" name="pre_responsable" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_responsable">Falta completar este campo</div>
	</div>
	</div>
	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Ubicación:</label>
  			<input type="text" id="ubicacion" name="pre_ubicacion" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_ubicacion">Falta completar este campo</div>
	</div>
	</div>

	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Fecha:</label>
  			<input type="date" id="fecha_in" name="pre_fecha" class="form-control" autocomplete="off">
  			<div class="requerido" id="falta_fecha_in">Falta completar este campo</div>
	</div>
	</div>

	
	
</div>
<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="form-group">
			<label>Observaciones:</label>
			<textarea id="observaciones" class="form-control" name="pre_observaciones"></textarea>
		</div>
	</div>
</div>
<?php

			break;

			case '8':

?>
<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="form-group has-success">
		<label>Responsable:</label>
  			<input type="text" id="responsable" name="pre_responsable" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_responsable">Falta completar este campo</div>
	</div>
	</div>
	<div class="col-xs-12 col-md-6">
	<div class="form-group has-success">
		<label>Destino:</label>
  			<input type="text" id="ubicacion" name="pre_ubicacion" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_ubicacion">Falta completar este campo</div>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Fecha:</label>
  			<input type="date" id="fecha" name="pre_fecha" class="form-control" autocomplete="off">
  			<div class="requerido" id="falta_fecha">Falta completar este campo</div>
	</div>
	</div>

	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Hora de Salida:</label>
  			<input type="time" id="hora_in" name="pre_hora" class="form-control" autocomplete="off">
  			<div class="requerido" id="falta_hora_in">Falta completar este campo</div>
	</div>
	</div>

	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Hora de Llegada:</label>
  			<input type="time" id="hora_out" name="pre_hora_out" class="form-control" autocomplete="off">
  			<div class="requerido" id="falta_hora_out">Falta completar este campo</div>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="form-group">
			<label>Observaciones:</label>
			<textarea id="observaciones" class="form-control" name="pre_observaciones"></textarea>
		</div>
	</div>
</div>
<?php

			break;

			case '9':

?>
<div class="row">
		<div class="col-xs-12 col-md-8">
	<div class="form-group has-success">
		<label>Tema:</label>
  			<input type="text" id="motivo" name="pre_tema" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_motivo">Falta completar este campo</div>
	</div>
	</div>
	<div class="col-xs-12 col-md-4">
		<div class="form-group has-success">
		<label>Responsable:</label>
  			<input type="text" id="responsable" name="pre_responsable" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_responsable">Falta completar este campo</div>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Ubicación:</label>
  			<input type="text" id="ubicacion" name="pre_ubicacion" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_ubicacion">Falta completar este campo</div>
	</div>
	</div>
	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Fecha:</label>
  			<input type="date" id="fecha" name="pre_fecha" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_fecha">Falta completar este campo</div>
	</div>
	</div>
	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Hora:</label>
  			<input type="time" id="hora_in" name="pre_hora" class="form-control" autocomplete="off">
  			<div class="requerido" id="falta_hora_in">Falta completar este campo</div>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="form-group">
			<label>Observaciones:</label>
			<textarea id="observaciones" class="form-control" name="pre_observaciones"></textarea>
		</div>
	</div>
</div>
<?php

			break;

	}
	?>