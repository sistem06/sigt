<?php
session_start();
require_once '../_conexion.php';

if($_POST['paso']==1){
	$nro_doc = $_POST['dp_nro_doc1'];
	$filtro = DatosPersonales::find_by_sql("SELECT count(dp_id) FROM tb_datos_personales");
	$filtro = DatosPersonales::count(array("conditions" => "dp_nro_doc = '$nro_doc'"));

	$secciones_dp_area = SeccionArea::all(array('conditions' => 'sa_sis_id = '.$_SESSION['sistema']));

	if($filtro == 0){

		include_once("apertura_inicial.php");
    $prox = "detalle_persona.php?dp_id=".$ult;

		foreach($secciones_dp_area as $seccion_dp){

			switch($seccion_dp->sa_ten_id){

				case 1: //Capacitaciones Recibidas
				$recor = new AltaEntrevista();
		    $recor->ent_sis = $_SESSION['sistema'];
		    $recor->ent_fin = '0';
		    $recor->ent_dp_id = $ult;
				$recor->ent_ten_id = 1;
		    $recor->ent_proxima = "Capacitaciones Recibidas";
		    $recor->ent_us = $_POST['id_us'];
		    $recor->save();
				break;

				case 2: //Datos del Emprendimiento
				$recor = new AltaEntrevista();
		    $recor->ent_sis = $_SESSION['sistema'];
		    $recor->ent_fin = '0';
		    $recor->ent_dp_id = $ult;
				$recor->ent_ten_id = 2;
		    $recor->ent_proxima = "Datos del Emprendimiento";
		    $recor->ent_us = $_POST['id_us'];
		    $recor->save();
				break;

				case 3: //Datos Educativos
				$recor = new AltaEntrevista();
				$recor->ent_sis = $_SESSION['sistema'];
				$recor->ent_fin = '0';
				$recor->ent_dp_id = $ult;
				$recor->ent_ten_id = 3;
				$recor->ent_proxima = "Datos Educativos";
				$recor->ent_us = $_POST['id_us'];
				$recor->save();
				break;

				case 4: //Datos Personales
				$recor = new AltaEntrevista();
		    $recor->ent_sis = $_SESSION['sistema'];
		    $recor->ent_fin = '1';
		    $recor->ent_dp_id = $ult;
				$recor->ent_ten_id = 4;
		    $recor->ent_proxima = "Datos Personales";
		    $recor->ent_us = $_POST['id_us'];
		    $recor->save();
				break;

				case 5: // Salud / Discapacidad
				$recor = new AltaEntrevista();
				$recor->ent_sis = $_SESSION['sistema'];
				$recor->ent_fin = '0';
				$recor->ent_dp_id = $ult;
				$recor->ent_ten_id = 5;
				$recor->ent_proxima = "Datos Clínicos";
				$recor->ent_us = $_POST['id_us'];
				$recor->save();
				break;

				case 6: //Documentos Graficos
				$recor = new AltaEntrevista();
		    $recor->ent_sis = $_SESSION['sistema'];
		    $recor->ent_fin = '0';
		    $recor->ent_dp_id = $ult;
				$recor->ent_ten_id = 6;
		    $recor->ent_proxima = "Documentos Graficos";
		    $recor->ent_us = $_POST['id_us'];
		    $recor->save();
				break;

				case 7: //Historia Laboral
				$recor = new AltaEntrevista();
				$recor->ent_sis = $_SESSION['sistema'];
				$recor->ent_fin = '0';
				$recor->ent_dp_id = $ult;
				$recor->ent_ten_id = 7;
				$recor->ent_proxima = "Historia Laboral";
				$recor->ent_us = $_POST['id_us'];
				$recor->save();
				break;

				case 8: //Ingresos
				$recor = new AltaEntrevista();
		    $recor->ent_sis = $_SESSION['sistema'];
		    $recor->ent_fin = '0';
		    $recor->ent_dp_id = $ult;
				$recor->ent_ten_id = 8;
		    $recor->ent_proxima = "Ingresos";
		    $recor->ent_us = $_POST['id_us'];
		    $recor->save();
				break;

				case 9: //Instituciones Asociadas
				$recor = new AltaEntrevista();
		    $recor->ent_sis = $_SESSION['sistema'];
		    $recor->ent_fin = '0';
		    $recor->ent_dp_id = $ult;
				$recor->ent_ten_id = 9;
		    $recor->ent_proxima = "Instituciones Asociadas";
		    $recor->ent_us = $_POST['id_us'];
		    $recor->save();
				break;

				case 10: //Lugares de Venta
				$recor = new AltaEntrevista();
		    $recor->ent_sis = $_SESSION['sistema'];
		    $recor->ent_fin = '0';
		    $recor->ent_dp_id = $ult;
				$recor->ent_ten_id = 10;
		    $recor->ent_proxima = "Lugares de Venta";
		    $recor->ent_us = $_POST['id_us'];
		    $recor->save();
				break;

				case 11: //Miembros del Hogar
				$recor = new AltaEntrevista();
		    $recor->ent_sis = $_SESSION['sistema'];
		    $recor->ent_fin = '0';
		    $recor->ent_dp_id = $ult;
				$recor->ent_ten_id = 11;
		    $recor->ent_proxima = "Miembros del Hogar";
		    $recor->ent_us = $_POST['id_us'];
		    $recor->save();
				break;

				case 12: //Necesidad del Emprendimiento
				$recor = new AltaEntrevista();
		    $recor->ent_sis = $_SESSION['sistema'];
		    $recor->ent_fin = '0';
		    $recor->ent_dp_id = $ult;
				$recor->ent_ten_id = 12;
		    $recor->ent_proxima = "Necesidad del Emprendimiento";
		    $recor->ent_us = $_POST['id_us'];
		    $recor->save();
				break;

				case 13: //Postulaciones
				$recor->ent_sis = $_SESSION['sistema'];
				$recor->ent_fin = '0';
				$recor->ent_dp_id = $ult;
				$recor->ent_ten_id = 13;
				$recor->ent_proxima = "Postulaciones";
				$recor->ent_us = $_POST['id_us'];
				break;

				case 14: //Subsidios/Créditos Recibidos
				$recor = new AltaEntrevista();
		    $recor->ent_sis = $_SESSION['sistema'];
		    $recor->ent_fin = '0';
		    $recor->ent_dp_id = $ult;
				$recor->ent_ten_id = 14;
		    $recor->ent_proxima = "Subsidios/Créditos Recibidos";
		    $recor->ent_us = $_POST['id_us'];
		    $recor->save();
				break;

				case 15: //Datos de la Vivienda
				$recor = new AltaEntrevista();
		    $recor->ent_sis = $_SESSION['sistema'];
		    $recor->ent_fin = '0';
		    $recor->ent_dp_id = $ult;
				$recor->ent_ten_id = 15;
		    $recor->ent_proxima = "Datos de la Vivienda";
		    $recor->ent_us = $_POST['id_us'];
		    $recor->save();
				break;
			}
		}

	    $beneho = new HogarBeneficiario();
	    $beneho->hb_dp_id = $ult;
	    $beneho->hb_ho_id = $ult_ho;
	    $beneho->save();

			header("location: $prox");

	} else {

			$filtro_dni = DatosPersonales::find_by_dp_nro_doc($nro_doc);
			$old_dp_id = $filtro_dni->dp_id;

			$prox = "detalle_persona.php?dp_id=".$old_dp_id;

			header("location: $prox");
	}
}

if($_POST['paso']==1001){ //Modifica Datos Personales
			include_once("apertura_mod_dp.php");

			$histori = new Historial();
			$histori->hi_us_id = $_POST['id_us'];
			$histori->hi_dp_id = $_POST['dp_id'];
			$histori->hi_detalle = "Modifica Datos Personales";
			$histori->save();

	    $prox = "detalle_persona.php?dp_id=".$_POST['dp_id'];
  	  header("location: $prox");
}

if($_POST['paso']==1111){ // Modifica Datos Personales DNI
	    $dp_name = $_POST['dp_apellido'].', '.$_POST['dp_nombre'];
			$cliente = DatosPersonales::find($_POST['dp_id']);
			$cliente->dp_nro_doc = $_POST['dp_nro_doc'];
	    $cliente->dp_nombre = $_POST['dp_nombre'];
	    $cliente->dp_apellido = $_POST['dp_apellido'];
			$cliente->dp_name = $dp_name;
			$cliente->save();

			$sistema = BenSistema::find_by_bs_dp_id($_POST['dp_id']);
			$sistema->bs_dni = $_POST['dp_nro_doc'];
			$sistema->save();

			$histori = new Historial();
			$histori->hi_us_id = $_POST['id_us'];
			$histori->hi_dp_id = $_POST['dp_id'];
			$histori->hi_detalle = "Modifica Datos Personales DNI";
			$histori->save();

			$prox = "detalle_persona.php?dp_id=".$_POST['dp_id'];
			   header("location: $prox");
}

if($_POST['paso']==100){ //Alta Miembro Hogar
		if($_POST['tratamiento']=="largo"){
				  $dp_apellido =  ucwords(strtolower($_POST['dp_apellido']));
				  $dp_nombre =  ucwords(strtolower($_POST['dp_nombre']));

					$dp_name = $dp_apellido.', '.$dp_nombre;
					$dp_busqueda = $_POST['dp_nro_doc1'].' '.$dp_name.' '.$_POST['dp_telefono'].' '.$_POST['dp_mail'].' '.$_POST['dp_movil'];

				  $cliente = new DatosPersonales();
				  $cliente->dp_nombre = $dp_nombre;
				  $cliente->dp_apellido = $dp_apellido;
				  $cliente->dp_name = $dp_name;
				  $cliente->dp_sexo = $_POST['dp_sexo'];
					// En el alta standard de Personas se está forzando
					// el tipo de documento DNI, no sé por qué, mientras
					// tanto se harcodea acá también.
					//$cliente->dp_tipo_doc = $_POST['dp_tipo_doc1'];
					$cliente->dp_tipo_doc = 1;
				  $cliente->dp_nro_doc = $_POST['dp_nro_doc1'];
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
				  /*sk03** CUIDADO!! el last() podría recuperar el id de otra persona si hubiese un save() desde otra session posterior a este!!!! */
				  $ult = $book->dp_id;

			    $ho_id = $_POST['ho_id'];
			    $beneho = new HogarBeneficiario();
			    $beneho->hb_dp_id = $ult;
			    $beneho->hb_ho_id = $ho_id;
			    $beneho->save();

					$alto = new BenSistema();
  			  $alto->bs_us = $_POST['id_us'];
	 			  $alto->bs_dni = $_POST['dp_nro_doc1'];
	 			  $alto->bs_dp_id = $ult;
	 			  $alto->bs_sis = $_SESSION['sistema'];
	 			  $alto->bs_sis_ini = $_SESSION['sistema'];
	 			  $alto->save();

					$histori = new Historial();
					$histori->hi_us_id = $_POST['id_us'];
					$histori->hi_dp_id = $_POST['dp_id'];
					$histori->hi_detalle = "Alta Miembro Hogar Largo";
					$histori->save();

		} else {
			 	  $ho_id = $_POST['ho_id'];
	 			  $beneho = HogarBeneficiario::find_by_hb_dp_id($_POST['dp_id_fam']);
					if (!isset($beneho)) {
						$beneho = new HogarBeneficiario();
						$beneho->hb_dp_id = $_POST['dp_id_fam'];
					} else {
						//Elimino Hogar y Domicilio anterior de la persona si no hay más
						//integrantes del grupo hogar anterior asociados a los mismos.
						$hb_ho_id_ante = $beneho->hb_ho_id;
						if ($hb_ho_id_ante <> 0) { // Evito error por Hogar inexistente
							$cant_miembros_hogar_ant = HogarBeneficiario::count(array("conditions" => "hb_ho_id = '$hb_ho_id_ante'"));
							if (isset($cant_miembros_hogar_ant) && ($cant_miembros_hogar_ant == 1)) {
								$ho_ant = Hogar::find($hb_ho_id_ante);
								if (isset($ho_ant)) {
									$dom_ant = Domicilio::find($ho_ant->ho_dom_id);
									if (isset($dom_ant)) {
										$dom_ant->Delete();
										$ho_ant->Delete();
									}
								}
							}
						}
					};

 		      $beneho->hb_ho_id = $_POST['ho_id'];
 		      $beneho->save();

					$alto = BenSistema::find_by_bs_dp_id_and_bs_sis($_POST['dp_id_fam'],$_SESSION['sistema']);
					if (empty($alto)) {
						$alto = new BenSistema();
						$alto->bs_sis_ini = 0;
						$alto->bs_dp_id = $_POST['dp_id_fam'];
					};

					$dp_rec = DatosPersonales::find($_POST['dp_id_fam']);
					if (empty($_POST['dp_nro_doc1'])) {
						$alto->bs_dni = $dp_rec->dp_nro_doc;
					} else {
						$alto->bs_dni = $_POST['dp_nro_doc1'];
					}
				  $alto->bs_us = $_POST['id_us'];
	 			  $alto->bs_sis = $_SESSION['sistema'];
	 			  $alto->save();

					$histori = new Historial();
					$histori->hi_us_id = $_POST['id_us'];
					$histori->hi_dp_id = $_POST['dp_id'];
					$histori->hi_detalle = "Alta Miembro Hogar Corto";
					$histori->save();

 		      $prox = "miembros_hogar.php?dp_id=".$_POST['dp_id']."&ho_id=".$ho_id;
 		      header("location: $prox");
	  }

		if(empty($_POST['estado'])){
		   $prox = "miembros_hogar.php?dp_id=".$_POST['dp_id']."&ho_id=".$ho_id;
		} else {
		   $prox = "miembros_hogar.php?dp_id=".$_POST['dp_id']."&ho_id=".$ho_id."&estado=E";
		}
		header("location: $prox");
}

if($_POST['paso']==101){ // Update Entrevista - Miembros del Hogar
	$dp_id = $_POST['dp_id'];

	$prox = "detalle_persona.php?dp_id=$dp_id";
  $prox1 = "detalle_persona.php?dp_id=$dp_id";

  $entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $dp_id,11);
  $ent_id = $entre->ent_id;
  if(isset($ent_id)){
   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_fin = '1';
   $recor->ent_us = $_POST['id_us'];
   $recor->save();
	}
	header("location: $prox");
}

if($_POST['paso']==202){ // Alta Documentos Gráficos Frente
	 $dp_id = $_POST['dp_id'];

	 $prox = "detalle_persona.php?dp_id=$dp_id";

	 $entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $dp_id,6);
   $ent_id = $entre->ent_id;

   if(isset($ent_id)){
    $recor = AltaEntrevista::find($ent_id);
    $recor->ent_fin = '1';
    $recor->ent_us = $_POST['id_us'];
    $recor->save();
 	 }

	 $histori = new Historial();
	 $histori->hi_us_id = $_POST['id_us'];
	 $histori->hi_dp_id = $_POST['dp_id'];
	 $histori->hi_detalle = "Alta Imagen DNI Front";
	 $histori->save();

 	 header("location: $prox");
}

if($_POST['paso']==102){ // Alta Documentos Gráficos Back
	$dp_id = $_POST['dp_id'];

	$prox = "detalle_persona.php?dp_id=$dp_id";

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $dp_id,6);
	$ent_id = $entre->ent_id;
	if(isset($ent_id)){
		$recor = AltaEntrevista::find($ent_id);
	  $recor->ent_fin = '1';
	  $recor->ent_us = $_POST['id_us'];
	  $recor->save();
	}

	$histori = new Historial();
	$histori->hi_us_id = $_POST['id_us'];
	$histori->hi_dp_id = $_POST['dp_id'];
	$histori->hi_detalle = "Alta Imagen DNI Back";
	$histori->save();

	header("location: $prox");
}

if($_POST['paso']==2){ // Datos del Emprendimiento

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
					} else {
						$emp_rec = Emprendedor::find($_POST['em_id']);
						$ult_dom = $emp_rec->em_domicilio;
					}

		$em_tipo_lugar = $_POST['em_tipo_lugar'];
		$domicilio = $ult_dom;
	}
	$em_fecha_inicio = $_POST['em_ano_in'].'-'.$_POST['em_mes_in'].'-01';
	$em_dp_id = $_POST['em_dp_id'];
	$em_id = $_POST['em_id'];

	$filtro = Emprendedor::count(array("conditions" => "em_id = '$em_id'"));

	if($filtro > 0){

 	 $emprende = Emprendedor::find($_POST['em_id']);

   $emprende->em_nombre = $_POST['em_nombre'];
   $emprende->em_fecha_inicio = $em_fecha_inicio;
   $emprende->em_rubro = $_POST['em_rubro'];
   $emprende->em_subrubro = $_POST['em_subrubro'];
   $emprende->em_descripcion = $_POST['em_descripcion'];
   $emprende->em_tipo_lugar = $em_tipo_lugar;
   $emprende->em_domicilio = $domicilio;
   $emprende->em_espacio = $_POST['em_espacio'];
   $emprende->em_motivo_espacio = $_POST['em_motivo_espacio'];
   $emprende->em_tipo_empresa = $_POST['em_tipo_empresa'];

   $emprende->save();

	 $histori = new Historial();
	 $histori->hi_us_id = $_POST['id_us'];
	 $histori->hi_dp_id = $_POST['em_dp_id'];
	 $histori->hi_detalle = "Modifica Datos Emprendimiento";
	 $histori->save();

	} else {

	 $emprende = new Emprendedor();

   $emprende->em_dp_id = $_POST['em_dp_id'];
   $emprende->em_nombre = $_POST['em_nombre'];
   $emprende->em_fecha_inicio = $em_fecha_inicio;
   $emprende->em_rubro = $_POST['em_rubro'];
   $emprende->em_subrubro = $_POST['em_subrubro'];
 	 $emprende->em_descripcion = $_POST['em_descripcion'];
   $emprende->em_tipo_lugar = $em_tipo_lugar;
   $emprende->em_domicilio = $domicilio;
   $emprende->em_espacio = $_POST['em_espacio'];
   $emprende->em_motivo_espacio = $_POST['em_motivo_espacio'];
   $emprende->em_tipo_empresa = $_POST['em_tipo_empresa'];

   $emprende->save();

	 $histori = new Historial();
	 $histori->hi_us_id = $_POST['id_us'];
	 $histori->hi_dp_id = $_POST['em_dp_id'];
	 $histori->hi_detalle = "Alta Datos Emprendimiento";
	 $histori->save();

	 $emp_ult = Emprendedor::last();
	 $em_id = $emp_ult->em_id;
	}

	switch($_POST['em_tipo_empresa']){
		case 1:
			$prox = "detalle_persona.php?dp_id=$em_dp_id";
		break;

		case 2:
			$prox = "datos_familiares_asoc.php?dp_id=$em_dp_id&em_id=$em_id";
		break;

		case 3:
			$prox = "datos_emprendedores_asoc.php?dp_id=$em_dp_id&em_id=$em_id";
		break;
	}

   	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $em_dp_id,2);
   	$ent_id = $entre->ent_id;
   	if(isset($ent_id)){
    $recor = AltaEntrevista::find($ent_id);
    $recor->ent_fin = '1';

    $recor->ent_us =	$_SESSION["id_us"];

    $recor->save();
	}

	header("location: $prox");

}

if($_POST['paso']==3){ //Instituciones Asociadas

	$asocia_em = new Asemprenorga();
	$asocia_em->eo_dp_id = $_POST['dp_id'];
  $asocia_em->eo_or_id = $_POST['eo_or_id'];
  $asocia_em->eo_fa_id = $_POST['eo_fa_id'];
	$asocia_em->save();
	$dp_id = $_POST['dp_id'];
	$em_id = $_POST['em_id'];
	if(empty($_POST['estado'])){
	header("location: datos_instituciones_asoc.php?dp_id=$dp_id&em_id=$em_id");
		} else {
	header("location: datos_instituciones_asoc.php?dp_id=$dp_id&em_id=$em_id&estado=E");
		}
}

if($_POST['paso']==4){ //Update Entrevista - Instituciones Asociadas

	 $dp_id = $_POST['dp_id'];

	 $prox = "detalle_persona.php?dp_id=$dp_id";

	 $entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $dp_id,9);
   $ent_id = $entre->ent_id;
   if(isset($ent_id)){
	   $recor = AltaEntrevista::find($ent_id);
	   $recor->ent_fin = '1';
	   $recor->ent_us = $_POST['id_us'];
	   $recor->save();
   }
	header("location: $prox");
}

if($_POST['paso']==5){ // Alta Puntos de Venta
	switch($_POST['ev_tipo']){
		case 1:
		$det = $_POST['nro_feria'];
		break;

		case 2:
		//IS021 $det = $_POST['nro_barrio'];
		$det = $_POST['nro_zona'];
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
	header("location: datos_lugares_venta.php?dp_id=$dp_id&em_id=$em_id");
	} else {
		header("location: datos_lugares_venta.php?dp_id=$dp_id&em_id=$em_id&estado=E");
	}
}

if($_POST['paso']==6){ // Update Entrevista - Alta Lugares de Venta

	$dp_id = $_POST['dp_id'];

	$prox = "detalle_persona.php?dp_id=$dp_id";

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $dp_id,10);
  $ent_id = $entre->ent_id;
  if(isset($ent_id)){
   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_fin = '1';
   $recor->ent_us = $_POST['id_us'];
   $recor->save();
	}
	header("location: $prox");
}

if($_POST['paso']==777){ // Alta Salud/Discapacidad

	$dp_id = $_POST['dp_id'];
	$filtro = Salud::count(array("conditions" => "ds_dp_id = '$dp_id'"));

	if($filtro > 0){
		$sal = Salud::find($_POST['dp_id']);
		$sal->ds_tiene_os = $_POST['ds_tiene_os'];
		$sal->ds_os = $_POST['ds_os'];
		$sal->ds_tiene_discapacidad = $_POST['ds_tiene_discapacidad'];
		$sal->ds_nro_cud = $_POST['ds_nro_cud'];
		if($_POST['ds_ley_cud']==22431){
			$sal->ds_ley_cud = $_POST['ds_ley_cud'];
		} else {
			$sal->ds_ley_cud = $_POST['ds_ley_cud1'];
		}
  	$sal->ds_descripcion_cud = $_POST['ds_descripcion_cud'];
		$sal->ds_desde_cud = $_POST['ds_desde_cud'];
		$sal->ds_vencimiento_cud = $_POST['ds_vencimiento_cud'];
    $sal->ds_ente_cud = $_POST['ds_ente_cud'];
		if(isset($_POST['ds_tipo_discapacidad'])){
			$sal->ds_tipo_discapacidad = $_POST['ds_tipo_discapacidad'];
		}
		if(isset($_POST['ds_origen_discapacidad'])){
			if ($_POST['ds_origen_discapacidad']==0) {
				$sal->ds_origen_discapacidad = $_POST['ds_origen_discapacidad'];
			}
		}
		if(isset($_POST['ds_tipo_retraso'])){
			if ($_POST['ds_tipo_retraso']==0) {
				$sal->ds_tipo_retraso = $_POST['ds_tipo_retraso'];
			}
		}
		if(isset($_POST['ds_situacion_discapacidad'])){
			if ($_POST['ds_situacion_discapacidad']==0) {
				$sal->ds_situacion_discapacidad = $_POST['ds_situacion_discapacidad'];
			}
		}
		$sal->ds_descripcion_diagnostico = $_POST['ds_descripcion_diagnostico'];
		$sal->ds_observaciones = $_POST['ds_observaciones'];
		$sal->ds_rehabilitacion = $_POST['ds_rehabilitacion'];
		$sal->ds_toma_medicacion = $_POST['ds_toma_medicacion'];
		if(isset($_POST['ds_frecuencia_medicacion'])){
			$sal->ds_frecuencia_medicacion = $_POST['ds_frecuencia_medicacion'];
		}
		if(isset($_POST['ds_traslado'])){
			$sal->ds_traslado = $_POST['ds_traslado'];
		}
		if(isset($_POST['ds_asistente_trabajo'])){
			$sal->ds_asistente_trabajo = $_POST['ds_asistente_trabajo'];
		}
		$sal->ds_tratamientos_medicos = $_POST['ds_tratamientos_medicos'];
		$sal->ds_tiene_ss = $_POST['ds_tiene_ss'];
		if(isset($_POST['ds_ss'])){
			$sal->ds_ss = $_POST['ds_ss'];
		}
		$sal->ds_tiene_subsidios = $_POST['ds_tiene_subsidios'];
		if(isset($_POST['ds_subsidios'])){
			$sal->ds_subsidios = $_POST['ds_subsidios'];
		}
		$sal->ds_informacion_importante = $_POST['ds_informacion_importante'];
		$sal->save();

		$histori = new Historial();
	 	$histori->hi_us_id = $_POST['id_us'];
	 	$histori->hi_dp_id = $_POST['dp_id'];
	 	$histori->hi_detalle = "Modifica Datos Clínicos";
	 	$histori->save();

	} else { // else filtro > 0
		$sal = new Salud();
		$sal->ds_dp_id = $_POST['dp_id'];
		$sal->ds_tiene_os = $_POST['ds_tiene_os'];
		$sal->ds_os = $_POST['ds_os'];
		$sal->ds_tiene_discapacidad = $_POST['ds_tiene_discapacidad'];
		$sal->ds_nro_cud = $_POST['ds_nro_cud'];
		if($_POST['ds_ley_cud']==22431){
				$sal->ds_ley_cud = $_POST['ds_ley_cud'];
		} else {
				$sal->ds_ley_cud = $_POST['ds_ley_cud1'];
		}
		$sal->ds_descripcion_cud = $_POST['ds_descripcion_cud'];

		if(!empty($_POST['ds_desde_cud'])){
			$sal->ds_desde_cud = $_POST['ds_desde_cud'];
		}
		if(!empty($_POST['ds_vencimiento_cud'])){
			$sal->ds_vencimiento_cud = $_POST['ds_vencimiento_cud'];
		}
    $sal->ds_ente_cud = $_POST['ds_ente_cud'];
		if(isset($_POST['ds_tipo_discapacidad'])){
			$sal->ds_tipo_discapacidad = $_POST['ds_tipo_discapacidad'];
		}
		if(isset($_POST['ds_origen_discapacidad'])){
			$sal->ds_origen_discapacidad = $_POST['ds_origen_discapacidad'];
		}
		if(isset($_POST['ds_tipo_retraso'])){
			$sal->ds_tipo_retraso = $_POST['ds_tipo_retraso'];
		}
		if(isset($_POST['ds_situacion_discapacidad'])){
			$sal->ds_situacion_discapacidad = $_POST['ds_situacion_discapacidad'];
		}
		if(isset($_POST['ds_descripcion_diagnostico'])){
			$sal->ds_descripcion_diagnostico = $_POST['ds_descripcion_diagnostico'];
		}
		if(isset($_POST['ds_observaciones'])){
			$sal->ds_observaciones = $_POST['ds_observaciones'];
		}
		$sal->ds_rehabilitacion = $_POST['ds_rehabilitacion'];
		$sal->ds_toma_medicacion = $_POST['ds_toma_medicacion'];
		if(isset($_POST['ds_frecuencia_medicacion'])){
			$sal->ds_frecuencia_medicacion = $_POST['ds_frecuencia_medicacion'];
		}
		if(isset($_POST['ds_traslado'])){
			$sal->ds_traslado = $_POST['ds_traslado'];
		}
		if(isset($_POST['ds_asistente_trabajo'])){
			$sal->ds_asistente_trabajo = $_POST['ds_asistente_trabajo'];
		}
		$sal->ds_tratamientos_medicos = $_POST['ds_tratamientos_medicos'];
		$sal->ds_tiene_ss = $_POST['ds_tiene_ss'];
		if(isset($_POST['ds_ss'])){
			$sal->ds_ss = $_POST['ds_ss'];
		}
		$sal->ds_tiene_subsidios = $_POST['ds_tiene_subsidios'];
		if(isset($_POST['ds_subsidios'])){
			$sal->ds_subsidios = $_POST['ds_subsidios'];
		}
		$sal->ds_informacion_importante = $_POST['ds_informacion_importante'];
		$sal->save();

		$histori = new Historial();
	 	$histori->hi_us_id = $_POST['id_us'];
	 	$histori->hi_dp_id = $_POST['dp_id'];
	 	$histori->hi_detalle = "Alta Datos Clínicos";
	 	$histori->save();

	} // fin else filtro > 0

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $dp_id,5);
  $ent_id = $entre->ent_id;

  if(isset($ent_id)){
   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_fin = '1';
   $recor->ent_us = $_POST['id_us'];
   $recor->save();
	}

	header("location: detalle_persona.php?dp_id=$dp_id");
}

if($_POST['paso']==7){ // Alta Capacitaciones Emprendedor

	$capa = new EmpCapacitacion();
	$capa->ec_dp_id = $_POST['dp_id'];
	$capa->ec_or_id = $_POST['nro_org'];
	$capa->ec_motivo = $_POST['nro_motivo'];
	$capa->ec_anio = $_POST['ec_anio'];
	$capa->save();

	$histori = new Historial();
	$histori->hi_us_id = $_POST['id_us'];
	$histori->hi_dp_id = $_POST['dp_id'];
	$histori->hi_detalle = "Alta Capacitación Emprendedor";
	$histori->save();

	$dp_id = $_POST['dp_id'];
	$em_id = $_POST['em_id'];
	if(empty($_POST['estado'])){
	header("location: datos_capacitaciones.php?dp_id=$dp_id&em_id=$em_id");
	} else {
	header("location: datos_capacitaciones.php?dp_id=$dp_id&em_id=$em_id&estado=E");
	}
}

if($_POST['paso']==700){ //Update Entrevista Datos Laborales

 	$dp_id = $_POST['dp_id'];

	$prox = "detalle_persona.php?dp_id=".$dp_id;

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $dp_id,7);
 	$ent_id = $entre->ent_id;

  if(isset($ent_id)){
	  $recor = AltaEntrevista::find($ent_id);
	  $recor->ent_fin = '1';
	  $recor->ent_us = $_POST['id_us'];
	  $recor->save();
	}
	header("location: $prox");
}

if($_POST['paso']==70){ //Alta Datos Laborales

	$capa = new AntecedenteLaboral();
		$capa->al_dp_id = $_POST['dp_id'];
		if(!empty($_POST['al_in'])){
		$capa->al_in= $_POST['al_in'];
	}

	if(!empty($_POST['al_actual'])){
		$capa->al_actual= $_POST['al_actual'];
	}

	if(!empty($_POST['al_out'])){
		$capa->al_out= $_POST['al_out'];
	}
	$capa->al_tipo_trabajo= $_POST['al_tipo_trabajo'];
	$capa->al_lugar_trabajo= $_POST['al_lugar_trabajo'];
	$capa->al_puesto= $_POST['valor_puesto'];
	$capa->al_actividad= $_POST['valor_actividad'];
	$capa->al_categoria= $_POST['al_categoria'];
	$capa->al_descripcion_puesto= $_POST['al_descripcion_puesto'];
	$capa->al_referencias= $_POST['al_referencias'];
	$capa->save();

	$histori = new Historial();
	$histori->hi_us_id = $_POST['id_us'];
	$histori->hi_dp_id = $_POST['dp_id'];
	$histori->hi_detalle = "Alta Datos Laborales";
	$histori->save();

	$dp_id = $_POST['dp_id'];

	header("location: datos_laboral.php?dp_id=$dp_id");
}

if($_POST['paso']==18){ // Update entrevista - Capacitaciones Recibidas

	$dp_id = $_POST['dp_id'];

	$prox = "detalle_persona.php?dp_id=$dp_id";

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $dp_id,1);
  $ent_id = $entre->ent_id;
  if(isset($ent_id)){
   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_fin = '1';
   $recor->ent_us = $_POST['id_us'];
   $recor->save();
	}

	header("location: $prox");
}


if($_POST['paso']==9){ // Emprendedores Subsidios/Créditos Recibidos
	if($_POST['vigente']=="SI"){
		$vig = "SI";
	} else {
		$vig = "NO";
	}
	$recor = new EmpCredito();
	$recor->ec_dp_id = $_POST['dp_id'];
	$recor->ec_or = $_POST['nro_org'];
	$recor->ec_mo = $_POST['nro_destino'];
	$recor->ec_vigente = $vig;
	$recor->ec_monto = $_POST['monto'];
	$recor->ec_ano = $_POST['ano'];
	$recor->save();
	$dp_id = $_POST['dp_id'];
	$em_id = $_POST['em_id'];

	$histori = new Historial();
	$histori->hi_us_id = $_POST['id_us'];
	$histori->hi_dp_id = $_POST['dp_id'];
	$histori->hi_detalle = "Alta Subsidios/Créditos Emprendedor";
	$histori->save();

	if(empty($_POST['estado'])){
		header("location: datos_creditos.php?dp_id=$dp_id&em_id=$em_id");
	} else {
		header("location: datos_creditos.php?dp_id=$dp_id&em_id=$em_id&estado=E");
	}
}

if($_POST['paso']==10){ // Update entrevista - Emprendedores Subsidios/Créditos Recibidos

	$dp_id = $_POST['dp_id'];

	$prox = "detalle_persona.php?dp_id=$dp_id";

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $dp_id,14);
  $ent_id = $entre->ent_id;
  if(!empty($ent_id)){
   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_fin = '1';
   $recor->ent_us = $_POST['id_us'];
   $recor->save();
	}
	header("location: $prox");
}

if($_POST['paso']==11){ // Emprendedores - Alta Necesidad de Crédito
	$capa = new EmpCreditoNec();
	$capa->ecn_dp_id = $_POST['dp_id'];
	$capa->ecn_rubro = $_POST['nro_destino'];
	$capa->ecn_rubro_cap = $_POST['nro_capacitacion'];
	$capa->ecn_observaciones = $_POST['observaciones'];
	$capa->save();

	$histori = new Historial();
	$histori->hi_us_id = $_POST['id_us'];
	$histori->hi_dp_id = $_POST['dp_id'];
	$histori->hi_detalle = "Alta Necesidad de Créditos Emprendedor";
	$histori->save();

	$dp_id = $_POST['dp_id'];
	$em_id = $_POST['em_id'];
	if(empty($_POST['estado'])){
		header("location: datos_necesidades_emp.php?dp_id=$dp_id&em_id=$em_id");
	} else {
		header("location: datos_necesidades_emp.php?dp_id=$dp_id&em_id=$em_id&estado=E");
	}
}

if($_POST['paso']==12){ // Update Entrevista - Alta Necesidades del Emprendimiento

	$dp_id = $_POST['dp_id'];

	$prox = "detalle_persona.php?dp_id=$dp_id";

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $dp_id,12);
  $ent_id = $entre->ent_id;
  if(isset($ent_id)){
    $recor = AltaEntrevista::find($ent_id);
    $recor->ent_fin = '1';
    $recor->ent_us = $_POST['id_us'];
    $recor->save();
	}
	header("location: $prox");
}

if($_POST['paso']==13){ // Alta Ingresos del Emprendimiento

	$dp_id = $_POST['dp_id'];

	$record = Ingresos::find_by_in_dp_id($dp_id);

	if(empty($record)){
		$record = new Ingresos();
		$record->in_dp_id = $dp_id;
	}
	$record->in_por = $_POST['nro_porcentaje'];
	if ($_POST['efe_so']=='si') {
		$record->in_efector = 'si';
		$record->in_efector_expediente = $_POST['efector_expediente'];
	} else {
		$record->in_efector = 'no';
		$record->in_efector_expediente = "";
	}
	$record->save();

  $record2 = EstadoAfip::find_by_ea_dp_id($dp_id);
	if(empty($record2)){
		$record2 = new EstadoAfip();
		$record2->ea_dp_id = $dp_id;
	}
	if(isset($_POST['ea_vencimiento'])) {
		$record2->ea_vencimiento = $_POST['ea_vencimiento'];
	}
	$record2->ea_tipo_relacion = $_POST['ea_tipo_relacion'];
	$record2->save();

	$tipo_ingresos = TipoIngresos::all();

	foreach($tipo_ingresos as $tipo_ingreso){
		$vara = $tipo_ingreso->ti_id;

			if($_POST[$vara]=='si'){
				$otros_ing = OtrosIngresos::find_by_io_dp_id_and_io_ti_id($dp_id,$vara);
				if (empty($otros_ing)) {
					$otros_ing = new OtrosIngresos;
					$otros_ing->io_dp_id = $dp_id;
				}
				$otros_ing->io_ti_id = $vara;
				$otros_ing->save();
			} else {
				$otros_ing = OtrosIngresos::find_by_io_dp_id_and_io_ti_id($dp_id,$vara);

				if (!empty($otros_ing)) {
					$otros_ing->Delete();
				}
			}
	} //foreach

	$prox = "detalle_persona.php?dp_id=$dp_id";

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $dp_id,8);
  $ent_id = $entre->ent_id;
  if(isset($ent_id)){
    $recor = AltaEntrevista::find($ent_id);
    $recor->ent_fin = '1';
    $recor->ent_us = $_POST['id_us'];
    $recor->save();
  }
	header("location: $prox");
}


if($_POST['paso']==14){ // Alta Familiar Emprendedor
	$fama = new Familiar();
	$fama->fam_dp_id = $_POST['dp_id'];
	$fama->fam_name = $_POST['fam_name'];
	$fama->fam_parentesco = $_POST['fam_parentesco'];
	$fama->save();

	$histori = new Historial();
	$histori->hi_us_id = $_POST['id_us'];
	$histori->hi_dp_id = $_POST['dp_id'];
	$histori->hi_detalle = "Alta Familiar Emprendedor";
	$histori->save();

	$dp_id = $_POST['dp_id'];
	$em_id = $_POST['em_id'];
	header("location: datos_familiares_asoc.php?dp_id=$dp_id&em_id=$em_id");
}

if($_POST['paso']==15){ // Datos de la Vivienda

	$ho_ben = HogarBeneficiario::find_by_hb_dp_id($_POST['dp_id']);
	$hogar_id = $ho_ben->hb_ho_id;

	$home = Hogar::find_by_ho_id($hogar_id);
	$ho_inicio = $_POST['ho_inicio_ano'].'-'.$_POST['ho_inicio_mes'].'-01';
	$home->ho_inicio = $ho_inicio;
	$home->ho_viviendas_lote = $_POST['ho_viviendas_lote'];
	$home->ho_vivienda_lote_nro = $_POST['ho_vivienda_lote_nro'];
	$home->ho_hogares_lote = $_POST['ho_hogares_lote'];
	$home->ho_hogar_lote_nro = $_POST['ho_hogar_lote_nro'];
	$home->save();

	$sal = HogarGeneral::find_by_hog_ho_id($hogar_id);
	if (!isset($sal)) {$sal = new HogarGeneral();}
	$sal->hog_ho_id = $hogar_id;
	$sal->hog_miembros = $_POST['hog_miembros'];
  $sal->hog_habitaciones = $_POST['hog_habitaciones'];
  if (isset($_POST['hog_ubicacion_urbana'])) {
		$sal->hog_ubicacion_urbana = $_POST['hog_ubicacion_urbana'];
  }
  $sal->hog_tipo_casa = $_POST['hog_tipo_casa'];
  $sal->hog_material_piso = $_POST['hog_material_piso'];
  $sal->hog_material_paredes = $_POST['hog_material_paredes'];
	if(isset($_POST['hog_revestimiento_externo'])){
	$sal->hog_revestimiento_externo = $_POST['hog_revestimiento_externo'];
	}
	if($_POST['hog_revestimiento_techo'] != ""){
	  $sal->hog_revestimiento_techo = $_POST['hog_revestimiento_techo'];
	}
	if(isset($_POST['hog_sup_pb']) && ($_POST['hog_sup_pb'] != "")){
	  $sal->hog_sup_pb = $_POST['hog_sup_pb'];
	}
	if(isset($_POST['hog_sup_viv']) && ($_POST['hog_sup_viv'] != "")){
	  $sal->hog_sup_viv = $_POST['hog_sup_viv'];
	}
	if (isset($_POST['hog_cielorraso'])) {
  	$sal->hog_cielorraso = $_POST['hog_cielorraso'];
	}
	if (isset($_POST['hog_revoque'])) {
  	$sal->hog_revoque = $_POST['hog_revoque'];
	}
 	$sal->save();

	$servi = HogarServicio::find_by_hos_ho_id($hogar_id);
	if (!isset($servi)) {$servi = new HogarServicio();}
  $servi->hos_ho_id = $hogar_id;
  if(isset($_POST['hos_electricidad'])) {$servi->hos_electricidad = $_POST['hos_electricidad'];} else {
  	$servi->hos_electricidad = "";
  }

  if(isset($_POST['hos_telefono'])) {$servi->hos_telefono = $_POST['hos_telefono'];}
  $servi->hos_acceso_agua = $_POST['hos_acceso_agua'];
  $servi->hos_fuente_agua = $_POST['hos_fuente_agua'];
  $servi->hos_combustible_cocina = $_POST['hos_combustible_cocina'];
  $servi->hos_combustible_calefaccion = $_POST['hos_combustible_calefaccion'];
  $servi->hos_desague = $_POST['hos_desague'];
  $servi->hos_banio = $_POST['hos_banio'];
  $servi->save();

	$equi = HogarEquipamiento::find_by_eq_ho_id($hogar_id);
	if (!isset($equi)) {$equi = new HogarEquipamiento();}
	$equi->eq_ho_id = $hogar_id;
	if(isset($_POST['eq_heladera'])){$equi->eq_heladera = $_POST['eq_heladera'];}
	if(isset($_POST['eq_cocina'])){$equi->eq_cocina = $_POST['eq_cocina'];}
	if(isset($_POST['eq_salamandra'])){$equi->eq_salamandra = $_POST['eq_salamandra'];}
	if(isset($_POST['eq_telefono'])){$equi->eq_telefono = $_POST['eq_telefono'];}
	if(isset($_POST['eq_celular'])){$equi->eq_celular = $_POST['eq_celular'];}
	if(isset($_POST['eq_lavarropa'])){$equi->eq_lavarropa = $_POST['eq_lavarropa'];}
	if(isset($_POST['eq_dvd'])){$equi->eq_dvd = $_POST['eq_dvd'];}
	if(isset($_POST['eq_tvcable'])){$equi->eq_tvcable = $_POST['eq_tvcable'];}
	if(isset($_POST['eq_directv'])){$equi->eq_directv = $_POST['eq_directv'];}
	if(isset($_POST['eq_hornom'])){$equi->eq_hornom = $_POST['eq_hornom'];}
	if(isset($_POST['eq_pc_web'])){$equi->eq_pc_web = $_POST['eq_pc_web'];}
	if(isset($_POST['eq_pc'])){$equi->eq_pc = $_POST['eq_pc'];}
	$equi->save();

	$prop = HogarPropiedad::find_by_pr_ho_id($hogar_id);
	if (!isset($prop)) {$prop = new HogarPropiedad();}
	$prop->pr_ho_id = $hogar_id;
//	$prop->pr_propiedad = $_POST['pr_propiedad'];
	$prop->pr_ocupacion = $_POST['pr_ocupacion'];
	$prop->pr_uso = $_POST['pr_uso'];
	$prop->pr_documentacion = $_POST['pr_documentacion'];
	$prop->save();

	$histLoc = LocacionesViviendas::find_by_hi_ho_id($hogar_id);
	if (!isset($histLoc)) {$histLoc = new LocacionesViviendas();
		$histLoc->hi_ho_id = $hogar_id;}
	if(isset($_POST['hi_years_lote'])){$histLoc->hi_years_lote = $_POST['hi_years_lote'];}
	if(isset($_POST['hi_years_barrio'])){$histLoc->hi_years_barrio = $_POST['hi_years_barrio'];}
	if(isset($_POST['hi_razon_mudar'])){$histLoc->hi_razon_mudar = $_POST['hi_razon_mudar'];}
	if(isset($_POST['hi_conquien_vivia'])){$histLoc->hi_conquien_vivia = $_POST['hi_conquien_vivia'];}
	if(isset($_POST['hi_estado_vivia'])){$histLoc->hi_estado_vivia = $_POST['hi_estado_vivia'];}
	if(isset($_POST['hi_provincia_vivia'])){$histLoc->hi_provincia_vivia = $_POST['hi_provincia_vivia'];}
	if(isset($_POST['hi_localidad_vivia'])){$histLoc->hi_localidad_vivia = $_POST['hi_localidad_vivia'];}
	if(isset($_POST['hi_barrio_vivia'])){$histLoc->hi_barrio_vivia = $_POST['hi_barrio_vivia'];}
	$histLoc->save();

	$enc = Encuesta::find_by_enc_hogar($hogar_id);
	if (!isset($enc)) {$enc = new Encuesta();}
	$enc->enc_caat = $_POST['enc_caat'];
	$enc->enc_usuario = $_SESSION['id_us'];
	$enc->enc_hogar = $hogar_id;
	$enc->save();

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $_POST['dp_id'],15);
  $ent_id = $entre->ent_id;
  if(isset($ent_id)){
    $recor = AltaEntrevista::find($ent_id);
    $recor->ent_fin = '1';
    $recor->ent_us = $_POST['id_us'];
	} else {
		$recor = new AltaEntrevista();
		$recor->ent_fin = '0';
		$recor->ent_sis = $_SESSION['sistema'];
		$recor->ent_dp_id = $_POST['dp_id'];
		$recor->ent_proxima = "Datos de la Vivienda";
	}
	$recor->ent_us = $_SESSION['id_us'];
	$recor->save();

	$histori = new Historial();
	$histori->hi_us_id = $_POST['id_us'];
	$histori->hi_dp_id = $_POST['dp_id'];
	$histori->hi_detalle = "Modifica Datos Vivienda";
	$histori->save();

	$dp_id = $_POST['dp_id'];
	header("location: detalle_persona.php?dp_id=$dp_id");
}

if($_POST['paso']==16){ // Alta Emprendedor Asociado
	$aso = new EmpAsociado();
	$aso->eas_dp_id = $_POST['dp_id'];
	$aso->eas_name = $_POST['eas_name'];
	$aso->save();

	$histori = new Historial();
	$histori->hi_us_id = $_POST['id_us'];
	$histori->hi_dp_id = $_POST['dp_id'];
	$histori->hi_detalle = "Alta Emprendedor Asociado";
	$histori->save();

	$dp_id = $_POST['dp_id'];
	$em_id = $_POST['em_id'];
	header("location: datos_emprendedores_asoc.php?dp_id=$dp_id&em_id=$em_id");
}

if($_POST['paso']==8){ // Modifica Domicilio
	include_once("apertura_mod_domicilio.php");

	$histori = new Historial();
	$histori->hi_us_id = $_POST['id_us'];
	$histori->hi_dp_id = $_POST['dp_id'];
	$histori->hi_detalle = "Modifica Domicilio";
	$histori->save();

  $dp_id = $_POST['dp_id'];
	header("location: detalle_persona.php?dp_id=$dp_id");
}

if($_POST['paso']==2002){ // Alta Datos Educativos (Datos Educativos)

	$edu = new DatosNivelEducativo();
 	$edu->dne_dp_id = $_POST['dne_dp_id'];
 	$edu->dne_nivel = $_POST['dne_nivel'];
 	if($_POST['dne_nivel']>3){
 		$edu->dne_termino = $_POST['dne_termino'];
  }
  if($_POST['dne_nivel']>4 and !empty($_POST['valor_titulo'])){
   	$edu->dne_titulo = $_POST['valor_titulo'];
  }
  if(!empty($_POST['dne_modalidad'])){
  	$edu->dne_modalidad = $_POST['dne_modalidad'];
  }
  $edu->save();

	$histori = new Historial();
	$histori->hi_us_id = $_POST['id_us'];
	$histori->hi_dp_id = $_POST['dne_dp_id'];
	$histori->hi_detalle = "Formación Educativa";
	$histori->save();

  $prox = "datos_educativos.php?dp_id=".$_POST['dne_dp_id'];
  $dp_id = $_POST['dne_dp_id'];

	header("location: $prox");
}

if($_POST['paso']==1005){ // Alta Datos Formación Profesional (Datos Educativos)
	$benfp = new BeneficiarioFormacionProfesional();
	$benfp->bfp_fp_id = $_POST['valor_curso'];
	$benfp->bfp_situacion = $_POST['bfp_situacion'];
  $benfp->bfp_dp_id = $_POST['dp_id'];
  $benfp->bfp_year = $_POST['bfp_year'];
	$benfp->save();

	$histori = new Historial();
	$histori->hi_us_id = $_POST['id_us'];
	$histori->hi_dp_id = $_POST['dp_id'];
	$histori->hi_detalle = "Alta Formación Profesional";
	$histori->save();

	$dp_id = $_POST['dp_id'];
	header("location: datos_educativos.php?dp_id=$dp_id");
}


if($_POST['paso']==1105){ // Alta Idiomas (Datos Educativos)
	$idi = new Idiomas();
	$idi->bi_dp_id = $_POST['dp_id'];
	$idi->bi_nivel = $_POST['bi_nivel'];
	$idi->bi_idi_id = $_POST['bi_idi_id'];
	$idi->save();

	$histori = new Historial();
	$histori->hi_us_id = $_POST['id_us'];
	$histori->hi_dp_id = $_POST['dp_id'];
	$histori->hi_detalle = "Alta Idiomas";
	$histori->save();

	$dp_id = $_POST['dp_id'];
	header("location: datos_educativos.php?dp_id=$dp_id");
}

if($_POST['paso']==1205){ //Alta Licencias (Datos Educativos)

	$lic = new Licencias();
	$lic->lb_dp_id = $_POST['dp_id'];
	$lic->lb_lic_id = $_POST['lb_lic_id'];
	if(!empty($_POST['lb_vencimiento'])){
    $lic->lb_vencimiento = $_POST['lb_vencimiento'];
  }
  if(!empty($_POST['lb_emisora'])){
  	$lic->lb_emisora = $_POST['lb_emisora'];
  }
  if(!empty($_POST['lb_provincia'])){
    $lic->lb_provincia = $_POST['lb_provincia'];
  }
  if(!empty($_POST['lb_municipio'])){
    $lic->lb_municipio = $_POST['lb_municipio'];
  }
	$lic->save();

	$histori = new Historial();
	$histori->hi_us_id = $_POST['id_us'];
	$histori->hi_dp_id = $_POST['dp_id'];
	$histori->hi_detalle = "Alta Licencias";
	$histori->save();

	$dp_id = $_POST['dp_id'];
	header("location: datos_educativos.php?dp_id=$dp_id");
}

if($_POST['paso']==444){ // Alta/Modificación Datos Educativos

	$dp_id = $_POST['dp_id'];
	$filtro = Educativa::count(array("conditions" => "de_dp_id = '$dp_id'"));

	if($filtro == 0){
		$edu = new Educativa();
		$edu->de_dp_id = $_POST['dp_id'];
			if(isset($_POST['de_continuar'])){
   			$edu->de_continuar = $_POST['de_continuar'];
			}
			if(!empty($_POST['de_carnet'])){
		   $edu->de_carnet = 1;
			}
			if(!empty($_POST['de_vencimiento_carnet'])){
		   $edu->de_vencimiento_carnet = $_POST['de_vencimiento_carnet'];
			}
			if(!empty($_POST['de_carnet'])){
		   $edu->de_tipo_carnet = $_POST['de_tipo_carnet'];
			}
			if(!empty($_POST['de_libreta'])){
		   $edu->de_libreta = 1;
			}
			if(!empty($_POST['de_vencimiento_libreta'])){
		   $edu->de_vencimiento_libreta = $_POST['de_vencimiento_libreta'];
			}
			if(!empty($_POST['de_libreta_construccion'])){
		   $edu->de_libreta_construccion = 1;
			}
			if(!empty($_POST['de_vencimiento_libreta_construccion'])){
		   $edu->de_vencimiento_libreta_construccion = $_POST['de_vencimiento_libreta_construccion'];
			}
			if(!empty($_POST['de_fecha_actualizacion'])){
				$edu->de_fecha_actualizacion = $_POST['de_fecha_actualizacion'];
			} else {
				$edu->de_fecha_actualizacion = date("Y-m-d H:i:s");
			}
      $edu->de_pc = $_POST['de_pc'];
      $edu->de_observaciones = $_POST['de_observaciones'];
			$edu->save();

			$histori = new Historial();
			$histori->hi_us_id = $_POST['id_us'];
			$histori->hi_dp_id = $_POST['dp_id'];
			$histori->hi_detalle = "Alta Datos Educativos";
			$histori->save();

	} else {
			$edu = Educativa::find($dp_id);
			$edu->de_pc = $_POST['de_pc'];
	    $edu->de_observaciones = $_POST['de_observaciones'];
			if(isset($_POST['de_continuar'])){
  	  	$edu->de_continuar = $_POST['de_continuar'];
			}
			if(!empty($_POST['de_carnet'])){
	    	$edu->de_carnet = 1;
		 	}
			if(!empty($_POST['de_vencimiento_carnet'])){
		   $edu->de_vencimiento_carnet = $_POST['de_vencimiento_carnet'];
			}
			if(!empty($_POST['de_carnet'])){
		   $edu->de_tipo_carnet = $_POST['de_tipo_carnet'];
			}
			if(!empty($_POST['de_libreta'])){
		   $edu->de_libreta = 1;
			}
			if(!empty($_POST['de_vencimiento_libreta'])){
		   $edu->de_vencimiento_libreta = $_POST['de_vencimiento_libreta'];
			}
			if(!empty($_POST['de_libreta_construccion'])){
		   $edu->de_libreta_construccion = 1;
			}
			if(!empty($_POST['de_vencimiento_libreta_construccion'])){
		   $edu->de_vencimiento_libreta_construccion = $_POST['de_vencimiento_libreta_construccion'];
			}

			if(!empty($_POST['de_fecha_actualizacion'])){
				$edu->de_fecha_actualizacion = $_POST['de_fecha_actualizacion'];
			} else {
				$edu->de_fecha_actualizacion = date("Y-m-d H:i:s");
			}

				$edu->save();
				$histori = new Historial();
				$histori->hi_us_id = $_POST['id_us'];
				$histori->hi_dp_id = $_POST['dp_id'];
				$histori->hi_detalle = "Modifica Datos Educativos";
				$histori->save();
			}

			$prox = "detalle_persona.php?dp_id=$dp_id";

   		$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $dp_id,3);
	   	$ent_id = $entre->ent_id;
	   	if(isset($ent_id)){
		   $recor = AltaEntrevista::find($ent_id);
		   $recor->ent_fin = '1';
		   $recor->ent_us = $_POST['id_us'];
		   $recor->save();
			}
			header("location: $prox");
}
if($_POST['paso']==600){

	$pos = new PostulacionesLaborales();
	$pos->pl_dp_id = $_POST['dp_id'];
	$pos->pl_puesto= $_POST['valor_puesto'];
	$pos->save();

	$dp_id = $_POST['dp_id'];
	$histori = new Historial();
	$histori->hi_us_id = $_POST['id_us'];
	$histori->hi_dp_id = $_POST['dp_id'];
	$histori->hi_detalle = "Alta Postulación";
	$histori->save();
	header("location: datos_postulaciones.php?dp_id=$dp_id");
}
if($_POST['paso']==500){
	$pecas = new PostulacionesCursos();

	$pecas->pc_curso = $_POST['valor_curso'];

  $pecas->pc_dp_id = $_POST['dp_id'];
	$pecas->save();

	$dp_id = $_POST['dp_id'];
	$histori = new Historial();
	$histori->hi_us_id = $_POST['id_us'];
	$histori->hi_dp_id = $_POST['dp_id'];
	$histori->hi_detalle = "Alta Postulación Curso";
	$histori->save();

	header("location: datos_postulaciones.php?dp_id=$dp_id");
}
if($_POST['paso']==400){

  $dp_id = $_POST['dp_id'];

	$prox = "detalle_persona.php?dp_id=".$dp_id;

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $dp_id,13);
  $ent_id = $entre->ent_id;

  if(isset($ent_id)){
   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_fin = '1';
   $recor->ent_us = $_POST['id_us'];
   $recor->save();
	}
	header("location: $prox");
}

exit();
?>
