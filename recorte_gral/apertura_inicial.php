<?php
	// comenzamos con el domicilio
	// creo domicilio de referencia
	$dom_domicilio = $_POST['dp_calle'].' '.$_POST['dom_nro'];
		if(!empty($_POST['dom_piso'])) $dom_domicilio = $dom_domicilio.' '.$_POST['dom_piso'];
		if(!empty($_POST['dom_depto'])) $dom_domicilio = $dom_domicilio.' dpto. '.$_POST['dom_depto'];
		if(!empty($_POST['dom_edificio'])) $dom_domicilio = $dom_domicilio.' ed. '.$_POST['dom_edificio'];
		if(!empty($_POST['dom_escalera'])) $dom_domicilio = $dom_domicilio.' esc. '.$_POST['dom_escalera'];
		if(!empty($_POST['dom_casa'])) $dom_domicilio = $dom_domicilio.' casa '.$_POST['dom_casa'];

		$totnros = strlen($_POST['latitud']);
		$corte = strpos($_POST['latitud'], ',');


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
		if($_POST['dp_calle']){$domi->dom_calle = $_POST['dp_calle'];}
		if($_POST['dom_nro']){$domi->dom_nro = $_POST['dom_nro'];}
		if($_POST['dom_piso']){$domi->dom_piso = $_POST['dom_piso'];}
		if($_POST['dom_depto']){$domi->dom_depto = $_POST['dom_depto'];}
		if($_POST['dom_edificio']){$domi->dom_edificio = $_POST['dom_edificio'];}
		if($_POST['dom_escalera']){$domi->dom_escalera = $_POST['dom_escalera'];}
		if($_POST['dom_casa']){$domi->dom_casa = $_POST['dom_casa'];}
		if($_POST['barrioid']){$domi->dom_barrio = $_POST['barrioid'];}
		if($_POST['caatid']){$domi->dom_caat = $_POST['caatid'];}
		$domi->dom_domicilio = $dom_domicilio;
		$domi->dom_lat = $dom_lat;
		$domi->dom_lng = $dom_lng;
		$domi->save();

		$booki = Domicilio::last();
		$ult_dom = $booki->dom_id;

		$home = new Hogar();
		$home->ho_dom_id = $ult_dom;
		$home->save();

		$bookii = Hogar::last();
		$ult_ho = $bookii->ho_id;

		$dp_apellido =  ucwords(strtolower($_POST['dp_apellido']));
		$dp_nombre =  ucwords(strtolower($_POST['dp_nombre']));

		$dp_name = $dp_apellido.', '.$dp_nombre;
		$dp_busqueda = $_POST['dp_nro_doc1'].' '.$dp_name.' '.$_POST['dp_telefono'].' '.$_POST['dp_mail'].' '.$_POST['dp_movil'];

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
			}
		}
		if(!empty($_POST['dp_anos_residencia'])){
   		$cliente->dp_anos_residencia = $_POST['dp_anos_residencia'];
		}
		if(!empty($_POST['dp_nacimiento'])){
   		$cliente->dp_nacimiento = $_POST['dp_nacimiento'];
		}
		if(!empty($_POST['dp_web'])){
   		$cliente->dp_web = $_POST['dp_web'];
		}
		if($_POST['dp_veterano']==1){
   		$cliente->dp_veterano = $_POST['dp_veterano'];
		}
		if($_POST['dp_fam_veterano']==1){
   		$cliente->dp_fam_veterano = $_POST['dp_fam_veterano'];
		}
		if($_POST['dp_pueblo_originario']==1){
   		$cliente->dp_pueblo_originario = $_POST['dp_pueblo_originario'];
   		if(isset($_POST['dp_nombre_pueblo_originario'])){
   				$cliente->dp_nombre_pueblo_originario = $_POST['dp_nombre_pueblo_originario'];
   		}
		}
		$cliente->dp_telefono = $_POST['dp_telefono'];
		$cliente->dp_movil = $_POST['dp_movil'];
		$cliente->dp_telefono1 = $_POST['dp_telefono1'];
		$cliente->dp_movil1 = $_POST['dp_movil1'];
		$cliente->dp_observaciones = $_POST['dp_observaciones'];
		$cliente->dp_mail = $_POST['dp_mail'];
		$cliente->dp_busqueda = $dp_busqueda;
		$cliente->dp_facebook = $_POST['dp_facebook'];
		$cliente->dp_us_relevamiento = $_POST['us_relevamiento'];
		$cliente->save();

		$book = DatosPersonales::last();
		$ult = $book->dp_id;

		$histori = new Historial();
		$histori->hi_us_id = $_POST['id_us'];
		$histori->hi_dp_id = $ult;
		$histori->hi_detalle = "Alta de Persona";
		$histori->save();

		$alto = new BenSistema();
		$alto->bs_us = $_POST['id_us'];
		$alto->bs_dni = $_POST['dp_nro_doc1'];
		$alto->bs_dp_id = $ult;
		$alto->bs_sis = $_POST['sistema'];
		$alto->bs_sis_ini = $_POST['sistema'];
		$alto->save();
?>
