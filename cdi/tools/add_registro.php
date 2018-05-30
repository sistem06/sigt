<?php
require_once '_conexion.php';
mysql_set_charset('utf8');
header("Content-Type: text/html;charset=utf-8");

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
	$es_domi =  Domicilio::count(array('conditions' => "dom_pr_dpto = ".$_POST['dom_pr_dpto']." and dom_localidad = ".$_POST['dom_localidad']." and dom_domicilio='".$dom_domicilio."'"));
				$totnros = strlen($_POST['latitud']);
				$corte = strpos($_POST['latitud'], ',');

				if($es_domi==0){

						if(substr($_POST['latitud'],0,1)=="("){
							$dom_lat = substr($_POST['latitud'], 1, $corte-1);
							$dom_lng = substr($_POST['latitud'], $corte + 1, ($totnros-$corte)-2);
						} else {
							$dom_lat = substr($_POST['latitud'], 0, $corte);
							$dom_lng = substr($_POST['latitud'], $corte + 1, ($totnros-$corte)-1);
						}

						$domi = new Domicilio();
						$domi->dom_pr_dpto = $_POST['dom_pr_dpto'];
					   $domi->dom_localidad = $_POST['dom_localidad'];
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
					   $domi->dom_lat = $dom_lat;
					   $domi->dom_lng = $dom_lng;
					   $domi->save();

					  	$booki = Domicilio::last();
						$ult_dom = $booki->dom_id;
					} else {
						$booki = Domicilio::find_by_dom_domicilio($dom_domicilio);
   						$ult_dom = $booki->dom_id;
					}

					$home = new Hogar();
   					$home->ho_dom_id = $ult_dom;
   					$home->save();

   					$bookii = Hogar::last();
					$ult_ho = $bookii->ho_id;

					$dp_apellido =  ucwords(strtolower(utf8_decode($_POST['dp_apellido'])));
					$dp_nombre =  ucwords(strtolower(utf8_decode($_POST['dp_nombre'])));

					$dp_name = $dp_apellido.', '.$dp_nombre;
					$dp_busqueda = $_POST['dp_nro_doc'].' '.$dp_name;

				   $cliente = new DatosPersonales();
				   $cliente->dp_nombre = $dp_nombre;
				   $cliente->dp_apellido = $dp_apellido;
				   $cliente->dp_name = $dp_name;
				   $cliente->dp_sexo = $_POST['dp_sexo'];
				   $cliente->dp_tipo_doc = $_POST['dp_tipo_doc'];
				   $cliente->dp_nro_doc = $_POST['dp_nro_doc'];
				   $cliente->dp_cuil = $_POST['dp_cuil'];
				   $cliente->dp_estado_civil = $_POST['dp_estado_civil'];
				   $cliente->dp_nacionalidad = $_POST['dp_nacionalidad'];
            if($_POST['dp_nacionalidad']==1){ 
               $cliente->dp_pais_nacimiento = 13;
            } else {
           
               if(!empty($_POST['dp_pais_nacimiento'])){
               $cliente->dp_pais_nacimiento = $_POST['dp_pais_nacimiento'];
            }}

            if(!empty($_POST['dp_anos_residencia'])){
               $cliente->dp_anos_residencia = $_POST['dp_anos_residencia'];
            }

            if(!empty($_POST['dp_nacimiento'])){
               $cliente->dp_nacimiento = $_POST['dp_nacimiento'];
            }
				  
				   $cliente->dp_busqueda = $dp_busqueda;
				  
				   $cliente->save();

				$book = DatosPersonales::last();
				$ult = $book->dp_id;

				$inscripto = new BeneficiarioCDI();
				$inscripto->ins_dp_id = $ult;
				$inscripto->ins_cdi = $_POST['ins_cdi'];
				$inscripto->ins_sala = $_POST['ins_sala'];
				$inscripto->ins_turno = $_POST['ins_turno'];
				$inscripto->ins_motivo = $_POST['ins_motivo'];
				$inscripto->save();

			   $histori = new Historial();
			   $histori->hi_us_id = $_POST['id_us'];
			   $histori->hi_dp_id = $ult;
			   $histori->hi_detalle = "Agrego este beneficiario";
			   $histori->save();
   
			   $alto = new BenSistema();
			   $alto->bs_us = $_POST['id_us'];
			   $alto->bs_dni = $_POST['dp_nro_doc'];
			   $alto->bs_dp_id = $ult;
			   $alto->bs_sis = '9';
			   $alto->bs_sis_ini = '9';
			   $alto->save();

			
			   $prox = "../nuevo_familiares.php?dp_id=".$ult."&ho_id=".$ult_ho;
			   $prox1 = "nuevo_familiares.php?dp_id=".$ult."&ho_id=".$ult_ho;

			   $recor = new AltaEntrevista();
			   $recor->ent_sis = '9';
			   $recor->ent_fin = '0';
			   $recor->ent_dp_id = $ult;
			   $recor->ent_proxima = $prox1;
			   $recor->ent_us = $_POST['id_us'];
			   $recor->save();

			   $beneho = new HogarBeneficiario();
			   $beneho->hb_dp_id = $ult;
			   $beneho->hb_ho_id = $ult_ho;
			   $beneho->save();

			header("location: $prox");
}

if($_POST['paso']==100){

			$dp_apellido =  ucwords(strtolower(utf8_decode($_POST['dp_apellido'])));
					$dp_nombre =  ucwords(strtolower(utf8_decode($_POST['dp_nombre'])));

					$dp_name = $dp_apellido.', '.$dp_nombre;
					$dp_busqueda = $_POST['dp_nro_doc'].' '.$dp_name.' '.$_POST['dp_telefono'].' '.$_POST['dp_mail'].' '.$_POST['dp_movil'];

				   $cliente = new DatosPersonales();
				   $cliente->dp_nombre = $dp_nombre;
				   $cliente->dp_apellido = $dp_apellido;
				   $cliente->dp_name = $dp_name;
				   $cliente->dp_sexo = $_POST['dp_sexo'];
				   $cliente->dp_tipo_doc = $_POST['dp_tipo_doc'];
				   $cliente->dp_nro_doc = $_POST['dp_nro_doc'];
				   $cliente->dp_cuil = $_POST['dp_cuil'];
				   $cliente->dp_estado_civil = $_POST['dp_estado_civil'];
				   $cliente->dp_nacionalidad = $_POST['dp_nacionalidad'];
            if($_POST['dp_nacionalidad']==1){ 
               $cliente->dp_pais_nacimiento = 13;
            } else {
           
               if(!empty($_POST['dp_pais_nacimiento'])){
               $cliente->dp_pais_nacimiento = $_POST['dp_pais_nacimiento'];
            }}

            if(!empty($_POST['dp_anos_residencia'])){
               $cliente->dp_anos_residencia = $_POST['dp_anos_residencia'];
            }

            if(!empty($_POST['dp_nacimiento'])){
               $cliente->dp_nacimiento = $_POST['dp_nacimiento'];
            }
				   
				   $cliente->dp_telefono = $_POST['dp_telefono'];
				   $cliente->dp_movil = $_POST['dp_movil'];
				   $cliente->dp_mail = $_POST['dp_mail'];
				   $cliente->dp_busqueda = $dp_busqueda;
				   $cliente->dp_parentesco = $_POST['dp_parentesco'];
				   $cliente->save();

				$book = DatosPersonales::last();
				$ult = $book->dp_id;

			$ho_id = $_POST['ho_id'];
			$beneho = new HogarBeneficiario();
			   $beneho->hb_dp_id = $ult;
			   $beneho->hb_ho_id = $ho_id;
			   $beneho->save();
			   if($_POST['estado']=="E"){
			   $prox = "../nuevo_familiares.php?dp_id=".$_POST['dp_id']."&ho_id=".$ho_id."&estado=E";
			} else {
			   $prox = "../nuevo_familiares.php?dp_id=".$_POST['dp_id']."&ho_id=".$ho_id;
			}
			header("location: $prox");
}

if($_POST['paso']==101){
	$dp_id = $_POST['dp_id'];

	$prox = "../nuevo_archivos.php?dp_id=$dp_id";
   	$prox1 = "nuevo_archivos.php?dp_id=$dp_id";

	$entre = AltaEntrevista::find_by_ent_dp_id($dp_id);
   	$ent_id = $entre->ent_id;

   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_sis = '9';
   $recor->ent_fin = '0';
   $recor->ent_proxima = $prox1;
   $recor->ent_us = $_POST['id_us'];
   $recor->save();

	header("location: $prox");
}

if($_POST['paso']==202){
	$dp_id = $_POST['dp_id'];

	$prox = "../nuevo_archivos1.php?dp_id=$dp_id";
   	$prox1 = "nuevo_archivos1.php?dp_id=$dp_id";

	$entre = AltaEntrevista::find_by_ent_dp_id($dp_id);
   	$ent_id = $entre->ent_id;

   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_sis = '9';
   $recor->ent_fin = '0';
   $recor->ent_proxima = $prox1;
   $recor->ent_us = $_POST['id_us'];
   $recor->save();

	header("location: $prox");
}

if($_POST['paso']==102){
	$dp_id = $_POST['dp_id'];
	$hogar = HogarBeneficiario::find_by_hb_dp_id($dp_id);
   	$ho_id = $hogar->hb_ho_id;

	$prox = "../nuevo_registro1.php?dp_id=$dp_id&ho_id=$ho_id";
   	$prox1 = "nuevo_registro1.php?dp_id=$dp_id&ho_id=$ho_id";

	$entre = AltaEntrevista::find_by_ent_dp_id($dp_id);
   	$ent_id = $entre->ent_id;

   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_sis = '9';
   $recor->ent_fin = '0';
   $recor->ent_proxima = $prox1;
   $recor->ent_us = $_POST['id_us'];
   $recor->save();

	header("location: $prox");
}

if($_POST['paso']==2){
	if($_POST['em_en_donde']==0){
		$domicilio = $_POST['nro_dom'];
		$em_tipo_lugar = 0;
	} else {
		$dom_domicilio = $_POST['dp_calle'].' '.$_POST['dom_nro'];
		if(!empty($_POST['dom_piso'])) $dom_domicilio = $dom_domicilio.' '.$_POST['dom_piso'];
		if(!empty($_POST['dom_depto'])) $dom_domicilio = $dom_domicilio.' dpto. '.$_POST['dom_depto'];
		if(!empty($_POST['dom_edificio'])) $dom_domicilio = $dom_domicilio.' ed. '.$_POST['dom_edificio'];
		if(!empty($_POST['dom_escalera'])) $dom_domicilio = $dom_domicilio.' esc. '.$_POST['dom_escalera'];
		if(!empty($_POST['dom_casa'])) $dom_domicilio = $dom_domicilio.' casa '.$_POST['dom_casa'];
	// 1 verifico si el domicilio fue ingresado
	$es_domi =  Domicilio::count(array('conditions' => "dom_pr_dpto = ".$_POST['dom_pr_dpto']." and dom_localidad = ".$_POST['dom_localidad']." and dom_domicilio='".$dom_domicilio."'"));
				$totnros = strlen($_POST['latitud']);
				$corte = strpos($_POST['latitud'], ',');

				if($es_domi==0){

						if(substr($_POST['latitud'],0,1)=="("){
							$dom_lat = substr($_POST['latitud'], 1, $corte-1);
							$dom_lng = substr($_POST['latitud'], $corte + 1, ($totnros-$corte)-2);
						} else {
							$dom_lat = substr($_POST['latitud'], 0, $corte);
							$dom_lng = substr($_POST['latitud'], $corte + 1, ($totnros-$corte)-1);
						}

						$domi = new Domicilio();
						$domi->dom_pr_dpto = $_POST['dom_pr_dpto'];
					   $domi->dom_localidad = $_POST['dom_localidad'];
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
					   $domi->dom_lat = $dom_lat;
					   $domi->dom_lng = $dom_lng;
					   $domi->dom_lng = $dom_lng;
					   $domi->save();

					  	$booki = Domicilio::last();
						$ult_dom = $booki->dom_id;
					}

		$em_tipo_lugar = $_POST['em_tipo_lugar'];
		$domicilio = $ult_dom;
	}
	$em_fecha_inicio = $_POST['em_ano_in'].'-'.$_POST['em_mes_in'].'-01';

	$emprende = new Emprendedor();
   $emprende->em_dp_id = $_POST['em_dp_id'];
   $emprende->em_nombre = $_POST['em_nombre'];
   $emprende->em_fecha_inicio = $em_fecha_inicio;
   $emprende->em_subrubro = utf8_decode($_POST['em_subrubro']);
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
	if(empty($_POST['estado'])){
	header("location: ../nuevo_registro2.php?dp_id=$dp_id&em_id=$em_id");
		} else {
	header("location: ../nuevo_registro2.php?dp_id=$dp_id&em_id=$em_id&estado=E");
		}
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
		$det = $_POST['nro_comercio1'];
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
	if(empty($_POST['estado'])){
	header("location: ../nuevo_registro3.php?dp_id=$dp_id&em_id=$em_id");
	} else {
		header("location: ../nuevo_registro3.php?dp_id=$dp_id&em_id=$em_id&estado=E");
	}
}

if($_POST['paso']==6){

		 $prox = "../nuevo_registro4.php?dp_id=".$_POST['dp_id']."&em_id=".$_POST['em_id'];
	 $prox1 = "nuevo_registro4.php?dp_id=".$_POST['dp_id']."&em_id=".$_POST['em_id'];
	
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

if($_POST['paso']==7){

	$capa = new EmpCapacitacion();
		$capa->ec_dp_id = $_POST['dp_id'];
		$capa->ec_or_id = $_POST['nro_org'];
		$capa->ec_motivo = $_POST['nro_motivo'];
		$capa->ec_anio = $_POST['ec_anio'];
		$capa->save();


	$dp_id = $_POST['dp_id'];
	$em_id = $_POST['em_id'];
	if(empty($_POST['estado'])){
	header("location: ../nuevo_registro4.php?dp_id=$dp_id&em_id=$em_id");
	} else {
	header("location: ../nuevo_registro4.php?dp_id=$dp_id&em_id=$em_id&estado=E");	
	}
}

if($_POST['paso']==8){

		 $prox = "../nuevo_registro5.php?dp_id=".$_POST['dp_id']."&em_id=".$_POST['em_id'];
	 $prox1 = "nuevo_registro5.php?dp_id=".$_POST['dp_id']."&em_id=".$_POST['em_id'];
	
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
	$dp_id = $_POST['dp_id'];
	$em_id = $_POST['em_id'];
	if(empty($_POST['estado'])){
	header("location: ../nuevo_registro5.php?dp_id=$dp_id&em_id=$em_id");
	} else {
	header("location: ../nuevo_registro5.php?dp_id=$dp_id&em_id=$em_id&estado=E");	
	} 
}

if($_POST['paso']==10){

		 $prox = "../nuevo_registro6.php?dp_id=".$_POST['dp_id']."&em_id=".$_POST['em_id'];
	 $prox1 = "nuevo_registro6.php?dp_id=".$_POST['dp_id']."&em_id=".$_POST['em_id'];
	
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

if($_POST['paso']==11){
	$capa = new EmpCreditoNec();
		$capa->ecn_dp_id = $_POST['dp_id'];
		$capa->ecn_rubro = $_POST['nro_destino'];
		$capa->ecn_rubro_cap = $_POST['nro_capacitacion'];
		$capa->save();
	
	$dp_id = $_POST['dp_id'];
	$em_id = $_POST['em_id'];
	if(empty($_POST['estado'])){
	header("location: ../nuevo_registro6.php?dp_id=$dp_id&em_id=$em_id");
	} else {
	header("location: ../nuevo_registro6.php?dp_id=$dp_id&em_id=$em_id&estado=E");	
	}
}

if($_POST['paso']==12){

		 $prox = "../nuevo_registro7.php?dp_id=".$_POST['dp_id']."&em_id=".$_POST['em_id'];
	 $prox1 = "nuevo_registro7.php?dp_id=".$_POST['dp_id']."&em_id=".$_POST['em_id'];
	
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



if($_POST['paso']==14){
	$fama = new Familiar();
		$fama->fam_dp_id = $_POST['dp_id'];
		$fama->fam_name = $_POST['fam_name'];
		$fama->fam_parentesco = $_POST['fam_parentesco'];
		$fama->save();


	$dp_id = $_POST['dp_id'];
	$em_id = $_POST['em_id'];
	header("location: ../nuevo_registro1f.php?dp_id=$dp_id&em_id=$em_id");
}

if($_POST['paso']==16){
	$aso = new EmpAsociado();
		$aso->eas_dp_id = $_POST['dp_id'];
		$aso->eas_name = $_POST['eas_name'];
		$aso->save();
	
	$dp_id = $_POST['dp_id'];
	$em_id = $_POST['em_id'];
	header("location: nuevo_registro1a.php?dp_id=$dp_id&em_id=$em_id");
}
exit();
?>