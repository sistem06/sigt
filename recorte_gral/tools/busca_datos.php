<?php
if (!isset($_SESSION)) { session_start(); }
include("../../".$_SESSION["dir_sis"]."/secure.php");
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
	$pt_id = BuscaRegistro("tbp_prestaciones_lista","tbp_pr_id",$_GET['busca'],"tbp_pt_id");
//		echo $pt_id;

	function ListaResponsables(){
		$text_responsables = "SELECT * FROM tb_usuarios INNER JOIN tb_usuarios_sistemas ON tb_usuarios.us_id = tb_usuarios_sistemas.uss_us_id WHERE tb_usuarios_sistemas.uss_sistema = '".$_SESSION['sistema']."' order by tb_usuarios.us_name ";
		$query_responsables = mysql_query($text_responsables);
			echo '<option></option>';
			while ($a_responsables = mysql_fetch_array($query_responsables)) {
				echo '<option value="'.$a_responsables['us_id'].'">'.$a_responsables['us_name'].'</option>';
			}

	}

	function ListaAreas(){
		$text_area = "SELECT * FROM tb_sistemas WHERE sis_id != '".$_SESSION['sistema']."' order by sis_name ";
		$query_area = mysql_query($text_area);
			echo '<option></option>';
			while ($a_area = mysql_fetch_array($query_area)) {
				echo '<option value="'.$a_area['sis_id'].'">'.$a_area['sis_name'].'</option>';
			}

	}
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
		<label>Entrevistador:</label>
  			<select id="responsable" name="pre_responsable" class="form-control">
  			<?php echo ListaResponsables(); ?>
  			</select>
 				<div class="requerido" id="falta_responsable">Falta completar este campo</div>
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
	<div class="col-xs-12 col-md-12">
		<div class="form-group has-success">
		<label>Descripcion:</label>
  			<input type="text" id="motivo" name="pre_tema" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_motivo">Falta completar este campo</div>
	</div>
	</div>

</div>
<div class="row">
	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Monto:</label>
  			<input type="number" id="monto" name="pre_monto" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_monto">Falta completar este campo</div>
	</div>
	</div>

	<div class="col-xs-12 col-md-4">
	<div class="form-group  has-success">
		<label>Fecha Inicial:</label>
  			<input type="date" id="fecha_in" name="pre_fecha" class="form-control" autocomplete="off">
  			<div class="requerido" id="falta_fecha_in">Falta completar este campo</div>
	</div>
	</div>


	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Cuotas:</label>
  			<select id="cuotas" name="pre_cuotas" class="form-control">
  				<option></option>
  				<?php
  					$i=1;
  					while($i < 49){
  						echo '<option>'.$i.'</option>';
  						$i++;
  					}
  				?>
  			</select>
  			<div class="requerido" id="falta_cuotas">Falta completar este campo</div>
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

?>
<div class="row">
	<div class="col-xs-12 col-md-4">
		<div class="form-group has-success">
		<label>Reponsable:</label>
  			<select id="responsable" name="pre_responsable" class="form-control">
  			<?php echo ListaResponsables(); ?>
  			</select>
 				<div class="requerido" id="falta_responsable">Falta completar este campo</div>
	</div>
	</div>

	<div class="col-xs-12 col-md-4">
		<div class="form-group has-success">
		<label>Area:</label>
  			<select id="area" name="pre_area" class="form-control">
  			<?php echo ListaAreas(); ?>
  			</select>
 				<div class="requerido" id="falta_area">Falta completar este campo</div>
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
  			<input type="number" id="monto" name="pre_monto" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_monto">Falta completar este campo</div>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Fecha Inicial:</label>
  			<input type="date" id="fecha_in" name="pre_fecha" class="form-control" autocomplete="off">
  			<div class="requerido" id="falta_fecha_in">Falta completar este campo</div>
	</div>
	</div>

	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Fecha Final:</label>
  			<input type="date" id="fecha_out" name="pre_fecha_out" class="form-control" autocomplete="off">
  			<div class="requerido" id="falta_fecha_out">Falta completar este campo</div>
	</div>
	</div>

	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Cuotas:</label>
  			<input type="number" id="cuotas" name="pre_cuotas" class="form-control" autocomplete="off">
  			<div class="requerido" id="falta_cuotas">Falta completar este campo</div>
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
	<div class="form-group has-success">
		<label>Fecha Inicial:</label>
  			<input type="date" id="fecha_in" name="pre_fecha" class="form-control" autocomplete="off">
  			<div class="requerido" id="falta_fecha_in">Falta completar este campo</div>
	</div>
	</div>

	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Fecha Final:</label>
  			<input type="date" id="fecha_out" name="pre_fecha_out" class="form-control" autocomplete="off">
  			<div class="requerido" id="falta_fecha_out">Falta completar este campo</div>
	</div>
	</div>

	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Cuotas:</label>
  			<input type="number" id="cuotas" name="pre_cuotas" class="form-control" autocomplete="off">
  			<div class="requerido" id="falta_cuotas">Falta completar este campo</div>
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
  			<select id="responsable" name="pre_responsable" class="form-control">
  			<?php echo ListaResponsables(); ?>
  			</select>
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
  			<select id="responsable" name="pre_responsable" class="form-control">
  			<?php echo ListaResponsables(); ?>
  			</select>
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
  			<select id="responsable" name="pre_responsable" class="form-control">
  			<?php echo ListaResponsables(); ?>
  			</select>
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
