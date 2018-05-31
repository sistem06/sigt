<?php
require_once '_conexion.php';
mysql_set_charset('utf8');
header("Content-Type: text/html;charset=utf-8");
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
			   $recor->ent_proxima = "Datos Educativos";
			   $recor->ent_us = $_POST['id_us'];
			   $recor->save();

			   $recor = new AltaEntrevista();
			   $recor->ent_sis = $_POST['sistema'];
			   $recor->ent_fin = '0';
			   $recor->ent_dp_id = $ult;
			   $recor->ent_proxima = "Historia Laboral";
			   $recor->ent_us = $_POST['id_us'];
			   $recor->save();

			   $recor = new AltaEntrevista();
			   $recor->ent_sis = $_POST['sistema'];
			   $recor->ent_fin = '0';
			   $recor->ent_dp_id = $ult;
			   $recor->ent_proxima = "Postulaciones";
			   $recor->ent_us = $_POST['id_us'];
			   $recor->save();

			   $recor = new AltaEntrevista();
			   $recor->ent_sis = $_POST['sistema'];
			   $recor->ent_fin = '0';
			   $recor->ent_dp_id = $ult;
			   $recor->ent_proxima = "Discapacidad";
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
				$dp_name = utf8_decode($_POST['dp_apellido']).', '.utf8_decode($_POST['dp_nombre']);
				$cliente = DatosPersonales::find($_POST['dp_id']);
				$cliente->dp_nro_doc = $_POST['dp_nro_doc'];
				$cliente->dp_nombre = utf8_decode($_POST['dp_nombre']);
				$cliente->dp_apellido = utf8_decode($_POST['dp_apellido']);
				$cliente->dp_name = $dp_name;
				$cliente->save();

				$sistema = BenSistema::find_by_bs_dp_id($_POST['dp_id']);
				$sistema->bs_dni = $_POST['dp_nro_doc'];
				$sistema->save();

				$prox = "../detalle_beneficiario.php?dp_id=".$_POST['dp_id'];
				   header("location: $prox");
			}
if($_POST['paso']==100){
	if($_POST['tratamiento']=="largo"){
			$dp_apellido =  ucwords(strtolower(utf8_decode($_POST['dp_apellido'])));
					$dp_nombre =  ucwords(strtolower(utf8_decode($_POST['dp_nombre'])));

					$dp_name = $dp_apellido.', '.$dp_nombre;
					$dp_busqueda = $_POST['dp_nro_doc'].' '.$dp_name.' '.$_POST['dp_telefono'].' '.$_POST['dp_mail'].' '.$_POST['dp_movil'];

				   $cliente = new DatosPersonales();
				   $cliente->dp_nombre = $dp_nombre;
				   $cliente->dp_apellido = $dp_apellido;
				   $cliente->dp_name = $dp_name;
				   $cliente->dp_sexo = $_POST['dp_sexo'];
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
				$ult = $book->dp_id;

			$ho_id = $_POST['ho_id'];
			$beneho = new HogarBeneficiario();
			   $beneho->hb_dp_id = $ult;
			   $beneho->hb_ho_id = $ho_id;
			   $beneho->save();
			   $prox = "../nuevo_familiares.php?dp_id=".$_POST['dp_id']."&ho_id=".$ho_id;
			   header("location: $prox");
} else {
	$ho_id = $_POST['ho_id'];
			$beneho = new HogarBeneficiario();
			   $beneho->hb_dp_id = $_POST['dp_id_fam'];
			   $beneho->hb_ho_id = $_POST['ho_id'];
			   $beneho->save();
			   $prox = "../nuevo_familiares.php?dp_id=".$_POST['dp_id']."&ho_id=".$ho_id;
			   header("location: $prox");
}

}
if($_POST['paso']==101){
	$dp_id = $_POST['dp_id'];

	$prox = "../detalle_beneficiario.php?dp_id=$dp_id";
   	$prox1 = "detalle_beneficiario.php?dp_id=$dp_id";

   	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_proxima(2, $dp_id,"Miembros del Hogar");
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

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_proxima(2, $dp_id,"Documentos Graficos");
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

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_proxima(2, $dp_id,"Documentos Graficos");
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

   	$prox = "../nuevo_registro1.php?dp_id=".$_POST['dne_dp_id'];
   $prox1 = "nuevo_registro1.php?dp_id=".$_POST['dne_dp_id'];

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

if($_POST['paso']==3){

	$asocia_em = new BeneficiarioCursoExterno();
	$asocia_em->bce_ce_id = $_POST['bce_ce_id'];
   $asocia_em->bce_dp_id = $_POST['dp_id'];
   $asocia_em->bce_year = $_POST['bce_year'];
   $asocia_em->bce_situacion = $_POST['bce_situacion'];
   if(isset($_POST['bce_certificacion'])){
   $asocia_em->bce_certificacion = $_POST['bce_certificacion'];
}
	$asocia_em->save();
	$dp_id = $_POST['dp_id'];
	header("location: ../nuevo_registro1.php?dp_id=$dp_id");
}

if($_POST['paso']==5){
	$benfp = new BeneficiarioFormacionProfesional();
/*	if(!empty($_POST['bfp_fp_id'])){
		$fp = FormacionProfesional::find_by_fp_name(utf8_decode($_POST['bfp_fp_id']));
		$bfp_fp_id = $fp->fp_id;

			
	}*/
	$benfp->bfp_fp_id = $_POST['valor_curso'];
	$benfp->bfp_situacion = $_POST['bfp_situacion'];
   $benfp->bfp_dp_id = $_POST['dp_id'];
   $benfp->bfp_year = $_POST['bfp_year'];
	$benfp->save();
	$dp_id = $_POST['dp_id'];
	header("location: ../nuevo_registro1.php?dp_id=$dp_id");
}

if($_POST['paso']==500){
	$pecas = new PostulacionesCursos();
	
		$pecas->pc_curso = $_POST['valor_curso'];	
	
   $pecas->pc_dp_id = $_POST['dp_id'];
	$pecas->save();
	$dp_id = $_POST['dp_id'];
	header("location: ../nuevo_registro_postulaciones.php?dp_id=$dp_id");
}

if($_POST['paso']==4){

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
   $edu->de_observaciones = utf8_decode($_POST['de_observaciones']);
	$edu->save();
	} else {
		$edu = Educativa::find($dp_id);
		$edu->de_pc = $_POST['de_pc'];
		$edu->de_observaciones = utf8_decode($_POST['de_observaciones']);
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

if($_POST['paso']==6){

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

	$dp_id = $_POST['dp_id'];
	
	header("location: ../nuevo_registro2.php?dp_id=$dp_id");
}

if($_POST['paso']==600){

	$pos = new PostulacionesLaborales();
		$pos->pl_dp_id = $_POST['dp_id'];
		$pos->pl_puesto= $_POST['valor_puesto'];
		$pos->save();

	$dp_id = $_POST['dp_id'];
	
	header("location: ../nuevo_registro_postulaciones.php?dp_id=$dp_id");
}

if($_POST['paso']==1205){

	$lic = new Licencias();
		$lic->lb_dp_id = $_POST['dp_id'];
		$lic->lb_lic_id = $_POST['lb_lic_id'];
		if(!empty($_POST['lb_vencimiento'])){
               $lic->lb_vencimiento = $_POST['lb_vencimiento'];
            }
        if(!empty($_POST['lb_emisora'])){
               $lic->lb_emisora = utf8_decode($_POST['lb_emisora']);
            }
        if(!empty($_POST['lb_provincia'])){
               $lic->lb_provincia = $_POST['lb_provincia'];
            }
         if(!empty($_POST['lb_municipio'])){
               $lic->lb_municipio = $_POST['lb_municipio'];
            }
		$lic->save();

	$dp_id = $_POST['dp_id'];
	
	header("location: ../nuevo_registro1.php?dp_id=$dp_id");
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
		$sal->ds_ente_cud = utf8_decode($_POST['ds_ente_cud']);
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
		$sal->ds_ente_cud = utf8_decode($_POST['ds_ente_cud']);
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

   	$dp_id = $_POST['dp_id'];

	$prox = "../detalle_beneficiario.php?dp_id=".$dp_id;

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_proxima(2, $dp_id,"Historia Laboral");
   	$ent_id = $entre->ent_id;

   	if(isset($ent_id)){
   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_fin = '1';
  $recor->ent_us = $_POST['id_us'];
   $recor->save();
	}
	header("location: $prox");
}

if($_POST['paso']==700){

   	$dp_id = $_POST['dp_id'];

	$prox = "../detalle_beneficiario.php?dp_id=".$dp_id;

	$entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_proxima(2, $dp_id,"Postulaciones");
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

if($_POST['paso']==1105){
	$idi = new Idiomas();
		$idi->bi_dp_id = $_POST['dp_id'];
		$idi->bi_nivel = $_POST['bi_nivel'];
		$idi->bi_idi_id = $_POST['bi_idi_id'];
		$idi->save();
	
	$dp_id = $_POST['dp_id'];
	header("location: ../nuevo_registro1.php?dp_id=$dp_id");
}

if($_POST['paso']==8){
	include_once("../../recorte_gral/apertura_mod_domicilio.php");
	

					   $dp_id = $_POST['dp_id'];
						header("location: ../detalle_beneficiario.php?dp_id=$dp_id");
}


exit();
?>