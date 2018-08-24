<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
	$pt_id = BuscaRegistro("tbp_prestaciones_lista","tbp_pr_id",$_GET['busca'],"tbp_pt_id");
//		echo $pt_id;
	switch ($pt_id) {
		case '1':
?>
<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="form-group has-success">
		<label>Motivo:</label>
  			<input type="text" id="motivo" name="pre_tema" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_motivo">Falta completar este campo</div>
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

			case '2':
?>
<div class="row">
	<div class="col-xs-12 col-md-8">
		<div class="form-group has-success">
		<label>Descripcion:</label>
  			<input type="text" id="motivo" name="pre_tema" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_motivo">Falta completar este campo</div>
	</div>
	</div>
	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Monto:</label>
  			<input type="number" id="monto" name="pre_monto" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_monto">Falta completar este campo</div>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-4">
	<div class="form-group">
		<label>Fecha Inicial:</label>
  			<input type="date" id="fecha_in" name="pre_fecha" class="form-control" autocomplete="off">
	</div>
	</div>

	<div class="col-xs-12 col-md-4">
	<div class="form-group">
		<label>Fecha Final:</label>
  			<input type="date" id="fecha_out" name="pre_fecha_out" class="form-control" autocomplete="off">
	</div>
	</div>

	<div class="col-xs-12 col-md-4">
	<div class="form-group">
		<label>Cuotas:</label>
  			<input type="number" id="cuotas" name="pre_cuotas" class="form-control" autocomplete="off">
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

			case '4':

			break;

			case '10':
?>
<div class="row">
	<div class="col-xs-12 col-md-8">
		<div class="form-group has-success">
		<label>Descripcion:</label>
  			<input type="text" id="motivo" name="pre_tema" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_motivo">Falta completar este campo</div>
	</div>
	</div>
	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Monto:</label>
  			<input type="number" id="monto" name="pre_ubicacion" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_monto">Falta completar este campo</div>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-4">
	<div class="form-group">
		<label>Fecha Inicial:</label>
  			<input type="date" id="fecha_in" name="pre_fecha" class="form-control" autocomplete="off">
	</div>
	</div>

	<div class="col-xs-12 col-md-4">
	<div class="form-group">
		<label>Fecha Final:</label>
  			<input type="date" id="fecha_out" name="pre_fecha_out" class="form-control" autocomplete="off">
	</div>
	</div>

	<div class="col-xs-12 col-md-4">
	<div class="form-group">
		<label>Cuotas:</label>
  			<input type="number" id="cuotas" name="pre_cuotas" class="form-control" autocomplete="off">
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

			case '11':

?>
<div class="row">
	<div class="col-xs-12 col-md-8">
		<div class="form-group has-success">
		<label>Descripcion:</label>
  			<input type="text" id="motivo" name="pre_tema" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_motivo">Falta completar este campo</div>
	</div>
	</div>
	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Monto:</label>
  			<input type="number" id="monto" name="pre_ubicacion" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_monto">Falta completar este campo</div>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-8">
		<div class="form-group has-success">
		<label>Nombre y Apellido del responsable:</label>
  			<input type="text" id="responsable" name="pre_fam_responsable" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_responsable">Falta completar este campo</div>
	</div>
	</div>
	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>DNI del responsable:</label>
  			<input type="text" id="dni_responsable" name="pre_dni_responsable" class="form-control" autocomplete="off" maxlength="8">
 				<div class="requerido" id="falta_dni_responsable">Falta completar este campo</div>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-4">
	<div class="form-group">
		<label>Fecha Inicial:</label>
  			<input type="date" id="fecha_in" name="pre_fecha" class="form-control" autocomplete="off">
	</div>
	</div>

	<div class="col-xs-12 col-md-4">
	<div class="form-group">
		<label>Fecha Final:</label>
  			<input type="date" id="fecha_out" name="pre_fecha_out" class="form-control" autocomplete="off">
	</div>
	</div>

	<div class="col-xs-12 col-md-4">
	<div class="form-group">
		<label>Cuotas:</label>
  			<input type="number" id="cuotas" name="pre_cuotas" class="form-control" autocomplete="off">
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

			case '12':

?>
<div class="row">
	<div class="col-xs-12 col-md-4">
		<div class="form-group has-success">
		<label>Asesor:</label>
  			<input type="text" id="responsable" name="pre_responsable" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_responsable">Falta completar este campo</div>
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
		<label>Motivo:</label>
  			<input type="text" id="motivo" name="pre_tema" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_motivo">Falta completar este campo</div>
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

			case '13':

?>
<div class="row">
	<div class="col-xs-12 col-md-4">
		<div class="form-group has-success">
		<label>Asistente:</label>
  			<input type="text" id="responsable" name="pre_responsable" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_responsable">Falta completar este campo</div>
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
		<label>Motivo:</label>
  			<input type="text" id="motivo" name="pre_tema" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_motivo">Falta completar este campo</div>
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

			case '14':

?>
<div class="row">
	<div class="col-xs-12 col-md-4">
		<div class="form-group has-success">
		<label>Visitador:</label>
  			<input type="text" id="responsable" name="pre_responsable" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_responsable">Falta completar este campo</div>
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
		<label>Motivo:</label>
  			<input type="text" id="motivo" name="pre_tema" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_motivo">Falta completar este campo</div>
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