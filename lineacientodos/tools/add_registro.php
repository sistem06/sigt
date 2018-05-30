<?php
require_once '_conexion.php';

if($_POST['paso']==1){
	// comenzamos con el domicilio
	// creo domicilio de referencia
	
	$dom_domicilio = $_POST['dp_calle'].' '.$_POST['dom_nro'];
		if(!empty($_POST['dom_piso'])) $dom_domicilio = $dom_domicilio.' '.$_POST['dom_piso'];
		if(!empty($_POST['dom_depto'])) $dom_domicilio = $dom_domicilio.' dpto. '.$_POST['dom_depto'];
		if(!empty($_POST['dom_edificio'])) $dom_domicilio = $dom_domicilio.' ed. '.$_POST['dom_edificio'];
		if(!empty($_POST['dom_escalera'])) $dom_domicilio = $dom_domicilio.' esc. '.$_POST['dom_escalera'];
		if(!empty($_POST['dom_casa'])) $dom_domicilio = $dom_domicilio.' casa '.$_POST['dom_casa'];
	// 1 verifico si el domicilio fue ingresado
	

						$domi = new Domicilio();
						if($_POST['dom_pr_dpto']){
						$domi->dom_pr_dpto = $_POST['dom_pr_dpto'];
					}
					if(isset($_POST['dom_localidad'])){
					   $domi->dom_localidad = $_POST['dom_localidad'];
					}
					   if($_POST['dp_calle']){
					   $domi->dom_calle = $_POST['dp_calle'];
					   }
					   if($_POST['dom_nro']){
					   $domi->dom_nro = $_POST['dom_nro'];
					   }
					   if($_POST['dom_piso']){
					   $domi->dom_piso = $_POST['dom_piso'];
					   }
					   if($_POST['dom_depto']){
					   $domi->dom_depto = $_POST['dom_depto'];
					   }
					   if($_POST['dom_edificio']){
					   $domi->dom_edificio = $_POST['dom_edificio'];
					   }
					   if($_POST['dom_escalera']){
					   $domi->dom_escalera = $_POST['dom_escalera'];
					   }
					   if($_POST['dom_casa']){
					   $domi->dom_casa = $_POST['dom_casa'];
					   }
					   $domi->dom_domicilio = $dom_domicilio;
					   $domi->save();

					  	$booki = Domicilio::last();
						$ult_dom = $booki->dom_id;
					

					$home = new Hogar();
   					$home->ho_dom_id = $ult_dom;
   					$home->save();

   					$bookii = Hogar::last();
					$ult_ho = $bookii->ho_id;

					$dp_apellido = ucwords(strtolower($_POST['dp_apellido']));
					$dp_nombre = ucwords(strtolower($_POST['dp_nombre']));

					$dp_name = $dp_apellido.', '.$dp_nombre;
					$dp_busqueda = $_POST['dp_nro_doc'].' '.$dp_name.' '.$_POST['dp_telefono'].' '.$_POST['dp_mail'].' '.$_POST['dp_movil'];

				   $cliente = new DatosPersonales();
				  if(!empty($dp_nombre)) $cliente->dp_nombre = $dp_nombre;
				  if(!empty($dp_apellido)) $cliente->dp_apellido = $dp_apellido;
				  if(!empty($dp_name)) $cliente->dp_name = $dp_name;
				  if(!empty($_POST['dp_sexo'])) $cliente->dp_sexo = $_POST['dp_sexo'];
				  if(!empty($_POST['dp_tipo_doc'])) $cliente->dp_tipo_doc = $_POST['dp_tipo_doc'];
				   if(!empty($_POST['dp_nro_doc'])) $cliente->dp_nro_doc = $_POST['dp_nro_doc'];
				 
				  if(!empty($_POST['dp_estado_civil'])) $cliente->dp_estado_civil = $_POST['dp_estado_civil'];
				  if(!empty($_POST['dp_pais_nacimiento'])) $cliente->dp_pais_nacimiento = $_POST['dp_pais_nacimiento'];
				  if(!empty($_POST['dp_nacionalidad'])) $cliente->dp_nacionalidad = $_POST['dp_nacionalidad'];
				   if(!empty($_POST['dp_nacimiento'])){
				   $cliente->dp_nacimiento = $_POST['dp_nacimiento'];
				}
				 if(!empty($_POST['dp_telefono']))  $cliente->dp_telefono = $_POST['dp_telefono'];
				 if(!empty($_POST['dp_movil']))  $cliente->dp_movil = $_POST['dp_movil'];
				 if(!empty($_POST['dp_mail']))  $cliente->dp_mail = $_POST['dp_mail'];
				 if(!empty($_POST['dp_edad'])){
				   $cliente->dp_edad = $_POST['dp_edad'];
				}
				if(!empty($dp_busqueda))   $cliente->dp_busqueda = $dp_busqueda;
				
				   $cliente->save();

				$book = DatosPersonales::last();
				$ult = $book->dp_id;

			   $histori = new Historial();
			   $histori->hi_us_id = $_POST['id_us'];
			   $histori->hi_dp_id = $ult;
			   $histori->hi_detalle = "Agrego este llamado";
			   $histori->save();
   
			   $alto = new BenSistema();
			   $alto->bs_us = $_POST['id_us'];
			   $alto->bs_dni = $_POST['dp_nro_doc'];
			   $alto->bs_dp_id = $ult;
			   $alto->bs_sis = '7';
			   $alto->bs_sis_ini = '7';
			   $alto->save();

			   $prox = "../detalle_llamado.php?dp_id=".$ult;
			   $prox1 = "detalle_llamado.php?dp_id=".$ult;

			   
			   if($_POST['la_102_relacion']==2){
			   		$recorde = new AltaLlamadaDatosPersonales();

			   		$recorde->dp_102_apellido = $_POST['dp_102_apellido'];
			   		$recorde->dp_102_nombre = $_POST['dp_102_nombre'];
			   		$recorde->dp_102_parentesco = $_POST['dp_102_parentesco'];
			   		$recorde->dp_102_tel1 = $_POST['dp_102_tel1'];
			   		$recorde->dp_102_tel2 = $_POST['dp_102_tel2'];
			   		$recorde->dp_102_mail = $_POST['dp_102_mail'];
					$recorde->save();

			   		$book12 = AltaLlamadaDatosPersonales::last();
				$ult12 = $book12->dp_102_id;
			   }


			   $recor = new AltaLlamada();
			   
			   $recor->la_102_us = $_POST['id_us'];
			  
			   $recor->la_102_tipo_llamado = $_POST['la_102_tipo_llamado'];
			   $recor->la_102_relacion = $_POST['la_102_relacion'];
				if($_POST['la_102_relacion']==1){
					$recor->la_clave_ex = $ult;
					   }

				if($_POST['la_102_relacion']==2){
					$recor->la_clave_ex = $ult12;
					   }

				if($_POST['la_102_relacion']==3){
					$recor->la_clave_ex = $_POST['list_instituciones'];
					   }
					   $recor->la_dp_id = $ult;
			   $recor->save();

			   $labor = new DatosLaborales();
			   $labor->dla_dp_id = $ult;
			   $labor->dla_actividad = $_POST['dla_actividad'];
			   $labor->dla_direccion = $_POST['dla_direccion'];
			   $labor->save();



			header("location: $prox");
}

if($_POST['paso']==2){
	if($_POST['em_en_donde']==0){
		$domicilio = $_POST['nro_dom'];
		$em_tipo_lugar = 0;
	} else {
		$domicilio = $_POST['em_domicilio'];
		$em_tipo_lugar = $_POST['em_tipo_lugar'];
	}
	$em_fecha_inicio = $_POST['em_ano_in'].'-'.$_POST['em_mes_in'].'-01';

	$emprende = new Emprendedor();
   $emprende->em_dp_id = $_POST['em_dp_id'];
   $emprende->em_nombre = $_POST['em_nombre'];
   $emprende->em_fecha_inicio = $em_fecha_inicio;
   $emprende->em_subrubro = $_POST['em_subrubro'];
   $emprende->em_descripcion = $_POST['em_descripcion'];
   $emprende->em_tipo_lugar = $em_tipo_lugar;
   $emprende->em_domicilio = $domicilio;
   $emprende->em_espacio = $_POST['em_espacio'];
   $emprende->em_motivo_espacio = $_POST['em_motivo_espacio'];
   $emprende->em_tipo_empresa = $_POST['em_tipo_empresa'];
   $emprende->save();

	
	$em_dp_id = $_POST['em_dp_id'];
	
	$emp_ult = Emprendedor::last();
	$ult = $emp_ult->em_id;
	
	switch($_POST['em_tipo_empresa']){
		case 1:
		$prox = "../nuevo_registro2.php?dp_id=$em_dp_id&em_id=$ult";
   		$prox1 = "nuevo_registro2.php?dp_id=$em_dp_id&em_id=$ult";
		break;
		
		case 2:
		$prox = "../nuevo_registro1f.php?dp_id=$em_dp_id&em_id=$ult";
   		$prox1 = "nuevo_registro1f.php?dp_id=$em_dp_id&em_id=$ult";
		break;
		
		case 3:
		$prox = "../nuevo_registro1a.php?dp_id=$em_dp_id&em_id=$ult";
   		$prox1 = "nuevo_registro1a.php?dp_id=$em_dp_id&em_id=$ult";
		break;
	}
	$dp_id = $em_dp_id;

   	$entre = AltaEntrevista::find_by_ent_dp_id($dp_id);
   	$ent_id = $entre->ent_id;

   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_sis = '1';
   $recor->ent_fin = '0';
   $recor->ent_proxima = $prox1;
   $recor->ent_us = $_POST['id_us'];
   $recor->save();

	header("location: $prox");
}

if($_POST['paso']==3){

	$asocia_em = new Asemprenorga();
	$asocia_em->eo_dp_id = $_POST['dp_id'];
   $asocia_em->eo_or_id = $_POST['eo_or_id'];
   $asocia_em->eo_fa_id = $_POST['eo_fa_id'];
	$asocia_em->save();
	$dp_id = $_POST['dp_id'];
	$em_id = $_POST['em_id'];
	header("location: ../nuevo_registro2.php?dp_id=$dp_id&em_id=$em_id");
}

if($_POST['paso']==4){

	 $prox = "../nuevo_registro3.php?dp_id=".$_POST['dp_id']."&em_id=".$_POST['em_id'];
	 $prox1 = "nuevo_registro3.php?dp_id=".$_POST['dp_id']."&em_id=".$_POST['em_id'];
	
	$entre = AltaEntrevista::find_by_ent_dp_id($_POST['dp_id']);
   	$ent_id = $entre->ent_id;

	$recor = AltaEntrevista::find($ent_id);
   $recor->ent_sis = '1';
   $recor->ent_fin = '0';
   $recor->ent_proxima = $prox1;
   $recor->ent_us = $_POST['id_us'];
   $recor->save();

	 header("location: $prox");
}

if($_POST['paso']==5){
	switch($_POST['ev_tipo']){
		case 1:
		$det = $_POST['nro_feria'];
		break;		
		
		case 2:
		$det = $_POST['nro_barrio'];
		break;
		
		case 3:
		$det = $_POST['nro_comercio'];
		break;
		
		case 4:
		$det = $_POST['nro_zona'];
		break;
		
		case 5:
		$comer = new Comercio();
		$comer->co_name = $_POST['nro_comercio'];
		$comer->co_calle = $_POST['nro_calle'];
		$comer->co_nro = $_POST['nro_nro'];
		$comer->co_tipo = "V";
		$comer->save();

		$Ucomer = Comercio::last();
		$det = $Ucomer->co_id;
		break;
		
		case 6:
		$det = $_POST['nro_org'];
		break;
	}

	$pv = new PuntosVenta();
		$pv->ev_dp_id = $_POST['dp_id'];
		$pv->ev_tipo = $_POST['ev_tipo'];
		$pv->ev_det_tipo = $det;
		$pv->save();
	
	$dp_id = $_POST['dp_id'];
	$em_id = $_POST['em_id'];
	header("location: ../nuevo_registro3.php?dp_id=$dp_id&em_id=$em_id");
}


if($_POST['paso']==7){

	$capa = new EmpCapacitacion();
		$capa->ec_dp_id = $_POST['dp_id'];
		$capa->ec_or_id = $_POST['nro_org'];
		$capa->ec_motivo = $_POST['nro_motivo'];
		$capa->save();

/*
	$txt = "insert into tb_emprendedor_capacitaciones (ec_dp_id, ec_or_id, ec_motivo) values ('".$_POST['dp_id']."', '".$_POST['nro_org']."', '".$_POST['nro_motivo']."')";
	mysqli_query($conn,$txt);
	*/
	$dp_id = $_POST['dp_id'];
	$em_id = $_POST['em_id'];
	header("location: nuevo_registro4.php?dp_id=$dp_id&em_id=$em_id");
}
if($_POST['paso']==9){
	if($_POST['vigente']=="SI"){
		$vig = "SI";
	} else {
		$vig = "NO";
	}
	$capa = new EmpCredito();
		$capa->ec_dp_id = $_POST['dp_id'];
		$capa->ec_or = $_POST['nro_org'];
		$capa->ec_mo = $_POST['nro_destino'];
		$capa->ec_vigente = $vig;
		$capa->save();
	/*
	$txt = "insert into tb_emprendedor_credito (ec_dp_id, ec_or, ec_mo, ec_vigente) values ('".$_POST['dp_id']."', '".$_POST['nro_org']."', '".$_POST['nro_destino']."', '".$vig."')";
	mysqli_query($conn,$txt);*/
	$dp_id = $_POST['dp_id'];
	$em_id = $_POST['em_id'];
	header("location: nuevo_registro5.php?dp_id=$dp_id&em_id=$em_id");
}

if($_POST['paso']==11){
	$capa = new EmpCreditoNec();
		$capa->ecn_dp_id = $_POST['dp_id'];
		$capa->ecn_rubro = $_POST['nro_destino'];
		$capa->ecn_rubro_cap = $_POST['nro_capacitacion'];
		$capa->save();
		/*
	$txt = "insert into tb_emprendedor_credito_nec (ecn_dp_id, ecn_rubro, ecn_rubro_cap) values ('".$_POST['dp_id']."', '".$_POST['nro_destino']."', '".$_POST['nro_capacitacion']."')";
	mysqli_query($conn,$txt);*/
	$dp_id = $_POST['dp_id'];
	$em_id = $_POST['em_id'];
	header("location: nuevo_registro6.php?dp_id=$dp_id&em_id=$em_id");
}

if($_POST['paso']==14){
	$fama = new Familiar();
		$fama->fam_dp_id = $_POST['dp_id'];
		$fama->fam_name = $_POST['fam_name'];
		$fama->fam_parentesco = $_POST['fam_parentesco'];
		$fama->save();

	/*$txt = "insert into tb_familiares (fam_dp_id, fam_name, fam_parentesco) values ('".$_POST['dp_id']."', '".$_POST['fam_name']."', '".$_POST['fam_parentesco']."')";
	mysqli_query($conn,$txt);*/
	$dp_id = $_POST['dp_id'];
	$em_id = $_POST['em_id'];
	header("location: nuevo_registro1f.php?dp_id=$dp_id&em_id=$em_id");
}

if($_POST['paso']==16){
	$aso = new EmpAsociado();
		$aso->eas_dp_id = $_POST['dp_id'];
		$aso->eas_name = $_POST['eas_name'];
		$aso->save();
	/*
	$txt = "insert into tb_emprendedores_asociados (eas_dp_id, eas_name) values ('".$_POST['dp_id']."', '".$_POST['eas_name']."')";
	mysqli_query($conn,$txt);*/
	$dp_id = $_POST['dp_id'];
	$em_id = $_POST['em_id'];
	header("location: nuevo_registro1a.php?dp_id=$dp_id&em_id=$em_id");
}
exit();
?>