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



	switch ($pt_id) {

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
  					while($i < 121){
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


		case '3':
?>
<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="form-group has-success">
		<label>Tema:</label>
  			<input type="text" id="motivo" name="pre_tema" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_motivo">Falta completar este campo</div>
	</div>
	</div>

	<div class="col-xs-12 col-md-6">
		<div class="form-group has-success">
		<label>Responsable:</label>
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
		<label>Fecha Inicial:</label>
  			<input type="date" id="fecha_in" name="pre_fecha" class="form-control" autocomplete="off" value="<?php echo date("Y-m-d"); ?>">
 				<div class="requerido" id="falta_fecha_in">Falta completar este campo</div>
	</div>
	</div>

	<div class="col-xs-12 col-md-6">
	<div class="form-group has-success">
		<label>Fecha Final:</label>
  			<input type="date" id="fecha_out" name="pre_fecha_out" class="form-control" autocomplete="off" value="">
 				<div class="requerido" id="falta_fecha_out">Falta completar este campo</div>
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
		<label>Responsable:</label>
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
		<label>Fecha Inicial:</label>
  			<input type="date" id="fecha_in" name="pre_fecha" class="form-control" autocomplete="off" value="<?php echo date("Y-m-d"); ?>">
 				<div class="requerido" id="falta_fecha_in">Falta completar este campo</div>
	</div>
	</div>

	<div class="col-xs-12 col-md-6">
	<div class="form-group has-success">
		<label>Fecha Final:</label>
  			<input type="date" id="fecha_out" name="pre_fecha_out" class="form-control" autocomplete="off" value="">
 				<div class="requerido" id="falta_fecha_out">Falta completar este campo</div>
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
  			<select id="responsable" name="pre_responsable" class="form-control">
  			<?php echo ListaResponsables(); ?>
  			</select>
 				<div class="requerido" id="falta_responsable">Falta completar este campo</div>
	</div>
	</div>


	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Fecha:</label>
  			<input type="date" id="fecha_in" name="pre_fecha" class="form-control" autocomplete="off">
  			<div class="requerido" id="falta_fecha_in">Falta completar este campo</div>
	</div>
	</div>

	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Fecha:</label>
  			<input type="time" id="hora" name="pre_hora" class="form-control" autocomplete="off">
  			<div class="requerido" id="falta_hora">Falta completar este campo</div>
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

<div class="col-xs-12 col-md-6">
		<div class="form-group has-success">
		<label>Responsable:</label>
  			<select id="responsable" name="pre_responsable" class="form-control">
  			<?php echo ListaResponsables(); ?>
  			</select>
 				<div class="requerido" id="falta_responsable">Falta completar este campo</div>
	</div>
	</div>


	<div class="col-xs-12 col-md-6">
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
	<div class="col-xs-12 col-md-12">
		<div class="form-group has-success">
		<label>Responsable:</label>
  			<select id="responsable" name="pre_responsable" class="form-control">
  			<?php echo ListaResponsables(); ?>
  			</select>
 				<div class="requerido" id="falta_responsable">Falta completar este campo</div>
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
  			<input type="date" id="fecha" name="pre_fecha" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_fecha">Falta completar este campo</div>
	</div>
	</div>
	<div class="col-xs-12 col-md-6">
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

			case '15':
?>
<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="form-group has-success">
		<label>Dirección de la Empresa:</label>
  			<input type="text" id="direccion" name="il_direccion_empresa" class="form-control" autocomplete="off">
 				<div class="requerido" id="falta_direccion">Falta completar este campo</div>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Actividad:</label>
  			<select id="actividad" name="il_actividad" class="form-control">
  				<option></option>
  				<?php
  				$qa = mysql_query("SELECT * FROM tbp_actividades order by act_name");
  					while ($aa = mysql_fetch_array($qa)) {
  						echo '<option value="'.$aa['act_id'].'">'.$aa['act_name'].'</option>';
  					}
  				?>
  			</select>
  			<div class="requerido" id="falta_actividad">Falta completar este campo</div>
	</div>
	</div>

	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Rubro:</label>
  			<select id="rubro" name="il_rubro" class="form-control">
  				<option></option>
  				<?php
  				$qa = mysql_query("SELECT * FROM tbp_rubro1 order by rb1_name");
  					while ($aa = mysql_fetch_array($qa)) {
  						echo '<option value="'.$aa['rb1_id'].'">'.$aa['rb1_name'].'</option>';
  					}
  				?>
  			</select>
  			<div class="requerido" id="falta_rubro">Falta completar este campo</div>
	</div>
	</div>

	<div class="col-xs-12 col-md-4">
	<div class="form-group has-success">
		<label>Subrubro:</label>
  			<select id="subrubro" name="il_subrubro" class="form-control">
  			</select>
  			<div class="requerido" id="falta_subrubro">Falta completar este campo</div>
	</div>
	</div>

</div>
<?php
			break;

	}
	?>
