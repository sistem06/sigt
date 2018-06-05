<?php
require_once '_conexion.php';
/*sk01*/ session_start();
/*sk01
        mysql_set_charset('utf8');
        header("Content-Type: text/html;charset=utf-8");
*sk01*/

if($_POST['paso']==1){
	$nro_doc = $_POST['dp_nro_doc1'];
	$filtro = DatosPersonales::find_by_sql("SELECT count(dp_id) FROM tb_datos_personales");
	$filtro = DatosPersonales::count(array("conditions" => "dp_nro_doc = '$nro_doc'"));

	if($filtro == 0){

			include_once("../../recorte_gral/apertura_inicial.php");
			   $prox = "../detalle_beneficiario.php?dp_id=".$ult;
			   $prox1 = "nuevo_familiares.php?dp_id=".$ult."&ho_id=".$ult_ho;

			   $recor = new AltaEntrevista();
			   $recor->ent_sis = $_POST['sistema'];
			   $recor->ent_fin = '1';
			   $recor->ent_dp_id = $ult;
			   $recor->ent_proxima = "Datos Personales";
			   $recor->ent_us = $_POST['id_us'];
			   $recor->save();

			   $recor = new AltaEntrevista();
			   $recor->ent_sis = $_POST['sistema'];
			   $recor->ent_fin = '0';
			   $recor->ent_dp_id = $ult;
			   $recor->ent_proxima = "Documentos Graficos";
			   $recor->ent_us = $_POST['id_us'];
			   $recor->save();

			   $recor = new AltaEntrevista();
			   $recor->ent_sis = $_POST['sistema'];
			   $recor->ent_fin = '0';
			   $recor->ent_dp_id = $ult;
			   $recor->ent_proxima = "Miembros del Hogar";
			   $recor->ent_us = $_POST['id_us'];
			   $recor->save();

			   $recor = new AltaEntrevista();
			   $recor->ent_sis = $_POST['sistema'];
			   $recor->ent_fin = '0';
			   $recor->ent_dp_id = $ult;
			   $recor->ent_proxima = "Datos del Emprendimiento";
			   $recor->ent_us = $_POST['id_us'];
			   $recor->save();

			   $recor = new AltaEntrevista();
			   $recor->ent_sis = $_POST['sistema'];
			   $recor->ent_fin = '0';
			   $recor->ent_dp_id = $ult;
			   $recor->ent_proxima = "Instituciones Asociadas";
			   $recor->ent_us = $_POST['id_us'];
			   $recor->save();

			   $recor = new AltaEntrevista();
			   $recor->ent_sis = $_POST['sistema'];
			   $recor->ent_fin = '0';
			   $recor->ent_dp_id = $ult;
			   $recor->ent_proxima = "Lugares de Venta";
			   $recor->ent_us = $_POST['id_us'];
			   $recor->save();

			   $recor = new AltaEntrevista();
			   $recor->ent_sis = $_POST['sistema'];
			   $recor->ent_fin = '0';
			   $recor->ent_dp_id = $ult;
			   $recor->ent_proxima = "Capacitaciones Recibidas";
			   $recor->ent_us = $_POST['id_us'];
			   $recor->save();

			   $recor = new AltaEntrevista();
			   $recor->ent_sis = $_POST['sistema'];
			   $recor->ent_fin = '0';
			   $recor->ent_dp_id = $ult;
			   $recor->ent_proxima = "Subsidios/Créditos Recibidos";
			   $recor->ent_us = $_POST['id_us'];
			   $recor->save();

			   $recor = new AltaEntrevista();
			   $recor->ent_sis = $_POST['sistema'];
			   $recor->ent_fin = '0';
			   $recor->ent_dp_id = $ult;
			   $recor->ent_proxima = "Necesidad de Créditos";
			   $recor->ent_us = $_POST['id_us'];
			   $recor->save();

			   $recor = new AltaEntrevista();
			   $recor->ent_sis = $_POST['sistema'];
			   $recor->ent_fin = '0';
			   $recor->ent_dp_id = $ult;
			   $recor->ent_proxima = "Ingresos";
			   $recor->ent_us = $_POST['id_us'];
			   $recor->save();

			   $beneho = new HogarBeneficiario();
			   $beneho->hb_dp_id = $ult;
			   $beneho->hb_ho_id = $ult_ho;
			   $beneho->save();

			header("location: $prox");
			} else {
			$filtro_dni = DatosPersonales::find_by_dp_nro_doc($nro_doc);
			$old_dp_id = $filtro_dni->dp_id;

			$prox = "../detalle_beneficiario.php?dp_id=".$old_dp_id;

			header("location: $prox");
		}
}

if($_POST['paso']==1001){

				include_once("../../recorte_gral/apertura_mod_dp.php");

				   $prox = "../detalle_beneficiario.php?dp_id=".$_POST['dp_id'];
				   header("location: $prox");
	}
if($_POST['paso']==1111){
/*sk01** $dp_name = utf8_decode($_POST['dp_apellido']).', '.utf8_decode($_POST['dp_nombre']); */
/*sk01*/ $dp_name = $_POST['dp_apellido']).', '.$_POST['dp_nombre'];
				$cliente = DatosPersonales::find($_POST['dp_id']);
				$cliente->dp_nro_doc = $_POST['dp_nro_doc'];
/*sk01** $cliente->dp_nombre = utf8_decode($_POST['dp_nombre']); */
/*sk01*/ $cliente->dp_nombre = $_POST['dp_nombre'];
/*sk01** $cliente->dp_apellido = utf8_decode($_POST['dp_apellido']); */
/*sk01*/ $cliente->dp_apellido = $_POST['dp_apellido'];
				$cliente->dp_name = $dp_name;
				$cliente->save();

				$sistema = BenSistema::find_by_bs_dp_id($_POST['dp_id']);
				$sistema->bs_dni = $_POST['dp_nro_doc'];
				$sistema->save();

				$prox = "../detalle_beneficiario.php?dp_id=".$_POST['dp_id'];
				   header("location: $prox");
			}
if($_POST['paso']==100){

/*sk01** $dp_apellido =  ucwords(strtolower(utf8_decode($_POST['dp_apellido'])));
/*sk01*/ $dp_apellido =  ucwords(strtolower($_POST['dp_apellido']));
/*sk01** $dp_nombre =  ucwords(strtolower(utf8_decode($_POST['dp_nombre'])));
/*sk01*/ $dp_nombre =  ucwords(strtolower($_POST['dp_nombre']));

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
			   if(empty($_POST['estado'])){
			   $prox = "../nuevo_familiares.php?dp_id=".$_POST['dp_id']."&ho_id=".$ho_id;
			} else {
			   $prox = "../nuevo_familiares.php?dp_id=".$_POST['dp_id']."&ho_id=".$ho_id."&estado=E";
			}
			header("location: $prox");
}

if($_POST['paso']==101){
	$dp_id = $_POST['dp_id'];

	$prox = "../detalle_beneficiario.php?dp_id=$dp_id";
   	$prox1 = "detalle_beneficiario.php?dp_id=$dp_id";

   	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_proxima(1, $dp_id,"Miembros del Hogar");
   	$ent_id = $entre->ent_id;
   	if(isset($ent_id)){
   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_fin = '1';
  $recor->ent_us = $_POST['id_us'];
   $recor->save();
	}
	header("location: $prox");
}

if($_POST['paso']==202){
	$dp_id = $_POST['dp_id'];

	$prox = "../detalle_beneficiario.php?dp_id=$dp_id";
   	$prox1 = "detalle_beneficiario.php?dp_id=$dp_id";

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_proxima(1, $dp_id,"Documentos Graficos");
   	$ent_id = $entre->ent_id;

   	if(isset($ent_id)){
   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_fin = '1';
  $recor->ent_us = $_POST['id_us'];
   $recor->save();
	}

	header("location: $prox");
}

if($_POST['paso']==102){
	$dp_id = $_POST['dp_id'];

	$prox = "../detalle_beneficiario.php?dp_id=$dp_id";
   	$prox1 = "detalle_beneficiario.php?dp_id=$dp_id";

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_proxima(1, $dp_id,"Documentos Graficos");
   	$ent_id = $entre->ent_id;
   	if(isset($ent_id)){
   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_fin = '1';
  	$recor->ent_us = $_POST['id_us'];
   $recor->save();
	}
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
	$em_dp_id = $_POST['em_dp_id'];
	$em_id = $_POST['em_id'];

	$filtro = Emprendedor::count(array("conditions" => "em_id = '$em_id'"));

/*sk01*/ echo "filtro (array): ".$filtro."</br>";

	if($filtro > 0){

/*sk01*/ echo "Modifica Emprendedor: ".$_POST['em_dp_id']."</br>";

		$emprende = Emprendedor::find($_POST['em_id']);
	//	$emprende->
   $emprende->em_nombre = $_POST['em_nombre'];
   $emprende->em_fecha_inicio = $em_fecha_inicio;
   $emprende->em_rubro = $_POST['em_rubro'];
   $emprende->em_subrubro = $_POST['em_subrubro'];
/*sk01**  $emprende->em_descripcion = utf8_decode($_POST['em_descripcion']); */
/*sk01*/  $emprende->em_descripcion = $_POST['em_descripcion'];
   $emprende->em_tipo_lugar = $em_tipo_lugar;
   $emprende->em_domicilio = $domicilio;
   $emprende->em_espacio = $_POST['em_espacio'];
   $emprende->em_motivo_espacio = $_POST['em_motivo_espacio'];
   $emprende->em_tipo_empresa = $_POST['em_tipo_empresa'];

   $emprende->save();

	} else {

	 $emprende = new Emprendedor();

/*sk01*/ echo "new Emprendedor(): ".$_POST['em_dp_id']."</br>";

   $emprende->em_dp_id = $_POST['em_dp_id'];
   $emprende->em_nombre = $_POST['em_nombre'];
/*sk01**   $emprende->em_fecha_inicio = $em_fecha_inicio; */
   $emprende->em_rubro = $_POST['em_rubro'];
   $emprende->em_subrubro = $_POST['em_subrubro'];
/*sk01** $emprende->em_descripcion = utf8_decode($_POST['em_descripcion']); */
/*sk01*/ $emprende->em_descripcion = $_POST['em_descripcion'];
   $emprende->em_tipo_lugar = $em_tipo_lugar;
   $emprende->em_domicilio = $domicilio;
   $emprende->em_espacio = $_POST['em_espacio'];
   $emprende->em_motivo_espacio = $_POST['em_motivo_espacio'];
   $emprende->em_tipo_empresa = $_POST['em_tipo_empresa'];

/*sk01*/ echo "Valores asignados ====> </br>";
/*sk01*/ echo "FECHA INICIO VAR: ".$em_fecha_inicio."</br></br>";
/*sk01*/ echo "em_dp_id: ".$emprende->em_dp_id."</br>";
/*sk01*/ echo "em_nombre: ".$emprende->em_nombre."</br>";
/*sk01*  echo "em_fecha_inicio: ".$emprende->em_fecha_inicio."</br>"; */
/*sk01*/ echo "em_rubro: ".$emprende->em_rubro."</br>";
/*sk01*/ echo "em_subrubro: ".$emprende->em_subrubro."</br>";
/*sk01*/ echo "em_descripcion: ".$emprende->em_descripcion."</br>";
/*sk01*/ echo "em_tipo_lugar: ".$emprende->em_tipo_lugar."</br>";
/*sk01*/ echo "em_domicilio: ".$emprende->em_domicilio."</br>";
/*sk01*/ echo "em_espacio: ".$emprende->em_espacio."</br>";
/*sk01*/ echo "em_motivo_espacio: ".$emprende->em_motivo_espacio."</br>";
/*sk01*/ echo "em_tipo_empresa: ".$emprende->em_tipo_empresa."</br>";

   $emprende->save();

/*sk01*/ echo "Guardado... </br>";

	$emp_ult = Emprendedor::last();
	$em_id = $emp_ult->em_id;
	}

/*sk01*/ echo "em_tipo_empresa: ".$emprende->em_tipo_empresa."</br>";

	switch($_POST['em_tipo_empresa']){
		case 1:
		$prox = "../detalle_beneficiario.php?dp_id=$em_dp_id";
   		$prox1 = "detalle_beneficiario.php?dp_id=$em_dp_id";
		break;

		case 2:
		$prox = "../nuevo_registro1f.php?dp_id=$em_dp_id&em_id=$em_id";
   		$prox1 = "nuevo_registro1f.php?dp_id=$em_dp_id&em_id=$em_id";
		break;

		case 3:
		$prox = "../nuevo_registro1a.php?dp_id=$em_dp_id&em_id=$em_id";
   		$prox1 = "nuevo_registro1a.php?dp_id=$em_dp_id&em_id=$em_id";
		break;
	}

   	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_proxima(1, $em_dp_id,"Datos del Emprendimiento");
   	$ent_id = $entre->ent_id;
   	if(isset($ent_id)){
    $recor = AltaEntrevista::find($ent_id);
    $recor->ent_fin = '1';
/*sk01** $recor->ent_us = $_POST['id_us']; */
/*sk01*/ $recor->ent_us =	$_SESSION["id_us"];

    $recor->save();
	}

/*sk01*/ echo "em_id (fin):".$em_id."</br>";
/*sk01*/ echo "prox: ".$prox."</br>";
/*sk01** sleep(5); */

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

	 $dp_id = $_POST['dp_id'];

	$prox = "../detalle_beneficiario.php?dp_id=$dp_id";
   	$prox1 = "detalle_beneficiario.php?dp_id=$dp_id";

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_proxima(1, $dp_id,"Instituciones Asociadas");
   	$ent_id = $entre->ent_id;
   	if(isset($ent_id)){
   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_fin = '1';
  	$recor->ent_us = $_POST['id_us'];
   $recor->save();
	}
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

	$dp_id = $_POST['dp_id'];

	$prox = "../detalle_beneficiario.php?dp_id=$dp_id";
   	$prox1 = "detalle_beneficiario.php?dp_id=$dp_id";

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_proxima(1, $dp_id,"Lugares de Venta");
   	$ent_id = $entre->ent_id;
   	if(isset($ent_id)){
   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_fin = '1';
  	$recor->ent_us = $_POST['id_us'];
   $recor->save();
	}
	header("location: $prox");
}

if($_POST['paso']==777){

	$dp_id = $_POST['dp_id'];
	$filtro = Salud::count(array("conditions" => "ds_dp_id = '$dp_id'"));

	if($filtro > 0){
		$sal = Salud::find($_POST['dp_id']);
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
/*sk01** $sal->ds_ente_cud = utf8_decode($_POST['ds_ente_cud']); */
/*sk01*/ $sal->ds_ente_cud = $_POST['ds_ente_cud'];
			if(isset($_POST['ds_tipo_discapacidad'])){
				$sal->ds_tipo_discapacidad = $_POST['ds_tipo_discapacidad'];
			}
			if(isset($_POST['ds_origen_discapacidad']) or $_POST['ds_origen_discapacidad']==0){
				$sal->ds_origen_discapacidad = $_POST['ds_origen_discapacidad'];
			}
			if(isset($_POST['ds_tipo_retraso']) or $_POST['ds_tipo_retraso']==0){
				$sal->ds_tipo_retraso = $_POST['ds_tipo_retraso'];
			}
			if(isset($_POST['ds_situacion_discapacidad']) or $_POST['ds_situacion_discapacidad']==0){
				$sal->ds_situacion_discapacidad = $_POST['ds_situacion_discapacidad'];
			}
		$sal->ds_descripcion_diagnostico = $_POST['ds_descripcion_diagnostico'];
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
	} else {
		$sal = new Salud();
		$sal->ds_dp_id = $_POST['dp_id'];
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
/*sk01** $sal->ds_ente_cud = utf8_decode($_POST['ds_ente_cud']);
/*sk01*/ $sal->ds_ente_cud = $_POST['ds_ente_cud'];
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
	}

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_proxima(2, $dp_id,"Discapacidad");
   	$ent_id = $entre->ent_id;

   	if(isset($ent_id)){
   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_fin = '1';
  $recor->ent_us = $_POST['id_us'];
   $recor->save();
	}

	header("location: ../detalle_beneficiario.php?dp_id=$dp_id");
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

	$dp_id = $_POST['dp_id'];

	$prox = "../detalle_beneficiario.php?dp_id=$dp_id";
   	$prox1 = "detalle_beneficiario.php?dp_id=$dp_id";

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_proxima(1, $dp_id,"Capacitaciones Recibidas");
   	$ent_id = $entre->ent_id;
   	if(isset($ent_id)){
   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_fin = '1';
  	$recor->ent_us = $_POST['id_us'];
   $recor->save();
	}
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

	$dp_id = $_POST['dp_id'];

	$prox = "../detalle_beneficiario.php?dp_id=$dp_id";
   	$prox1 = "detalle_beneficiario.php?dp_id=$dp_id";

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_proxima(1, $dp_id,"Subsidios/Créditos Recibidos");
   	$ent_id = $entre->ent_id;
   	if(isset($ent_id)){
   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_fin = '1';
  	$recor->ent_us = $_POST['id_us'];
   $recor->save();
	}
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

	$dp_id = $_POST['dp_id'];

	$prox = "../detalle_beneficiario.php?dp_id=$dp_id";
   	$prox1 = "detalle_beneficiario.php?dp_id=$dp_id";

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_proxima(1, $dp_id,"Necesidad de Créditos");
   	$ent_id = $entre->ent_id;
   	if(isset($ent_id)){
   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_fin = '1';
  	$recor->ent_us = $_POST['id_us'];
   $recor->save();
	}
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
	header("location: ../nuevo_registro1a.php?dp_id=$dp_id&em_id=$em_id");
}

if($_POST['paso']==8){
	include_once("../../recorte_gral/apertura_mod_domicilio.php");


					   $dp_id = $_POST['dp_id'];
						header("location: ../detalle_beneficiario.php?dp_id=$dp_id");
}

if($_POST['paso']==2002){

	$edu = new DatosNivelEducativo();
   	$edu->dne_dp_id = $_POST['dne_dp_id'];
   	$edu->dne_nivel = $_POST['dne_nivel'];
   	if($_POST['dne_nivel']>3){
   	$edu->dne_termino = $_POST['dne_termino'];
   }
   if($_POST['dne_nivel']>4 and !empty($_POST['valor_titulo'])){

  /* 	$secu = TituloEducativo::find_by_ts_name(utf8_decode($_POST['titulo_gral']));
				$dne_titulo = $secu->ts_id;*/

   	$edu->dne_titulo = $_POST['valor_titulo'];
   }
   if(!empty($_POST['dne_modalidad'])){
   	$edu->dne_modalidad = $_POST['dne_modalidad'];
   }
   	$edu->save();

   	$prox = "../nuevo_registro_edu.php?dp_id=".$_POST['dne_dp_id'];
   $prox1 = "nuevo_registro_edu.php?dp_id=".$_POST['dne_dp_id'];

   	$dp_id = $_POST['dne_dp_id'];
/*
   	$entre = AltaEntrevista::find_by_ent_dp_id($_POST['dne_dp_id']);
   	$ent_id = $entre->ent_id;

   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_sis = '2';
   $recor->ent_fin = '0';
   $recor->ent_proxima = $prox1;
   $recor->ent_us = $_POST['id_us'];
   $recor->save();
*/
	header("location: $prox");
}
if($_POST['paso']==1105){
	$idi = new Idiomas();
		$idi->bi_dp_id = $_POST['dp_id'];
		$idi->bi_nivel = $_POST['bi_nivel'];
		$idi->bi_idi_id = $_POST['bi_idi_id'];
		$idi->save();

	$dp_id = $_POST['dp_id'];
	header("location: ../nuevo_registro_edu.php?dp_id=$dp_id");
}

if($_POST['paso']==1205){

	$lic = new Licencias();
		$lic->lb_dp_id = $_POST['dp_id'];
		$lic->lb_lic_id = $_POST['lb_lic_id'];
		if(!empty($_POST['lb_vencimiento'])){
               $lic->lb_vencimiento = $_POST['lb_vencimiento'];
            }
        if(!empty($_POST['lb_emisora'])){
/*sk01**       $lic->lb_emisora = utf8_decode($_POST['lb_emisora']); */
/*sk01*/       $lic->lb_emisora = $_POST['lb_emisora'];
            }
        if(!empty($_POST['lb_provincia'])){
               $lic->lb_provincia = $_POST['lb_provincia'];
            }
         if(!empty($_POST['lb_municipio'])){
               $lic->lb_municipio = $_POST['lb_municipio'];
            }
		$lic->save();

	$dp_id = $_POST['dp_id'];

	header("location: ../nuevo_registro_edu.php?dp_id=$dp_id");
}

if($_POST['paso']==444){

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
		}
   $edu->de_pc = $_POST['de_pc'];
/*sk01** $edu->de_observaciones = utf8_decode($_POST['de_observaciones']); */
/*sk01*/ $edu->de_observaciones = $_POST['de_observaciones'];
	$edu->save();
	} else {
		$edu = Educativa::find($dp_id);
		$edu->de_pc = $_POST['de_pc'];
/*sk01** $edu->de_observaciones = utf8_decode($_POST['de_observaciones']); */
/*sk01*/ $edu->de_observaciones = $_POST['de_observaciones'];
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
		}
		$edu->save();
	}

	$prox = "../detalle_beneficiario.php?dp_id=$dp_id";
   	$prox1 = "detalle_beneficiario.php?dp_id=$dp_id";

   		$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_proxima(2, $dp_id,"Datos Educativos");
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
