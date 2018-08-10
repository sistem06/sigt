<?php
//Sección Documentos Gráficos

echo '
<div class="col-xs-12 col-sm-6 col-md-3">
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title"><span class="glyphicon glyphicon-wrench"></span>Datos del Emprendimiento</h3>
	  </div>
		<div class="panel-body">';
		echo '<p>Nombre: <strong>'.BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_nombre").'</strong></p>';
		echo '<p>Rubro: <strong>'. BuscaRegistro ("tb_rubros","ru_id",BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_rubro"),"ru_name").'</strong></p>';
		echo '<p>Subrubro: <strong>'. BuscaRegistro ("tb_subrubros","sr_id",BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_subrubro"),"sr_name").'</strong></p>';
		echo '<p>Descripción: <i>'. BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_descripcion").'</i></p>';
		echo '<p>Fecha de Inicio: <strong>'. fecha_dev(BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_fecha_inicio")).'</strong></p>';
		$dom_e = BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_domicilio");
		echo '<p>Domicilio: <strong>'. BuscaRegistro ("tb_domicilios", "dom_id", $dom_e, "dom_domicilio").'</strong></p>';

		 if(BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_tipo_lugar") != 0){
			 $tipo_lugar = BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_tipo_lugar");
		   echo '<p>El lugar es: <strong>'.BuscaRegistro ("tb_tipo_locacion", "tl_id", $tipo_lugar, "tl_name").'</strong></p>';
		 }
		 echo '<p>Tiene espacio suficiente: <strong>'. SiNo(BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_espacio")).'</strong></p>';

		 if(BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_espacio") == 0){
		 	 echo '<p>Motivo del poco espacio: <strong>'.$tipo_lugar = BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_motivo_espacio").'</strong></p>';
		 }

		 $tipo_empr = BuscaRegistro ("tb_datos_emprendimiento", "em_id", $em_id, "em_tipo_empresa");
		 echo '<p>Tipo de emprendimiento: <strong>'. BuscaRegistro ("tb_tipo_emprendimiento", "te_id", $tipo_empr, "te_name").'</strong></p>';

		 if($tipo_empr==2){
		    echo '<table class="table table-striped">
		    <tr><td><b>Nombre</b></td><td><b>Parentezco</b></td></tr>';

		  	$ttx = "select * from tb_familiares INNER JOIN tb_parentesco ON tb_familiares.fam_parentesco = tb_parentesco.par_id where tb_familiares.fam_dp_id = ".$_GET['dp_id'];
		  	$list = mysql_query($ttx);
		  	while($lis_dat = mysql_fetch_array($list)){
					echo '
		  		<tr><td>'.$lis_dat['fam_name'].'</td><td>'.
		  		$lis_dat['par_name'].'
		  		</td>
		  		</tr>';
		  	}
				echo '
		    </table>';
     }
     if($tipo_empr==3){
			 echo '
		   <table class="table table-striped">
			 <tr><td><b>Nombre del Asociado</b></td></tr>';

		   $ttx = "select * from tb_emprendedores_asociados where eas_dp_id = ".$_GET['dp_id'];
			 $list = mysql_query($ttx);
			 while($lis_dat = mysql_fetch_array($list)){
				 echo '
  			<tr><td>'.$lis_dat['eas_name'].'</td>
				</tr>';
			 }
			 echo '
		   </table>';
     }
		 	  echo '
        <a href="nuevo_registro1.php?dp_id='.$_GET["dp_id"].'&em_id='.$em_id.'&estado=E">
					<button type="button" class="btn btn-success">Modificar</button></a>
      </div>
    </div>
    </div>';
?>
