<?php
require_once '_conexion.php';

if($_POST['paso']==1){
	
					$eve = new Eventos();
   					$eve->ev_fecha = $_POST['ev_fecha'];
   					$eve->ev_hora = $_POST['ev_hora'];
   					$eve->ev_domicilio = utf8_encode($_POST['ev_domicilio']);
   					$eve->ev_usuario = $_POST['ev_usuarios'];
   					$eve->ev_condicion_org = $_POST['ev_condicion_org'];
   					$eve->ev_tipo = $_POST['ev_tipo'];
   					$eve->ev_observaciones = $_POST['ev_observaciones'];
   					$eve->save();

   					

				$book = Eventos::last();
				$ult = $book->ev_id;

			  
   
			  
				if($_POST['ev_condicion_org']==2){
			   $prox = "../nuevo_evento1.php?ev_id=".$ult;
			   $prox1 = "nuevo_evento1.php?ev_id=".$ult;
			} else {
				$prox = "../nuevo_evento2.php?ev_id=".$ult;
			   $prox1 = "nuevo_evento2.php?ev_id=".$ult;
			}
			header("location: $prox");
			exit();
}

if($_POST['paso']==7){
	
	
	
   $recor = new InstitucionCoorg();
   $recor->ic_ins_id = $_POST['ic_ins_id'];
   $recor->ic_ev_id = $_POST['ic_ev_id'];
   $recor->save();

   	$prox = "../nuevo_evento1.php?ev_id=".$_POST['ic_ev_id'];
	header("location: $prox");
}

if($_POST['paso']==8){
	
	
	
   $recor1 = new InstitucionParticipante();
   $recor1->ip_ins_id = $_POST['ip_ins_id'];
   $recor1->ip_ev_id = $_POST['ip_ev_id'];
   $recor1->save();

   	$prox = "../nuevo_evento2.php?ev_id=".$_POST['ip_ev_id'];
	header("location: $prox");
}

if($_POST['paso']==101){

	$prox = "../nuevo_evento2.php?ev_id=".$_POST['ev_id'];
	header("location: $prox");
}

if($_POST['paso']==102){

	$prox = "../detalle_evento.php?ev_id=".$_POST['ev_id'];
	header("location: $prox");
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