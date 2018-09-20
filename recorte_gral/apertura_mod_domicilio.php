<?php
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

			//Con la nueva dirección se crea un nuevo Hogar
			$home = new Hogar();
			$home->ho_dom_id = $ult_dom;
			$home->save();

			$bookii = Hogar::last();
			$ult_ho = $bookii->ho_id;

			//Actualizo relación Hogar/Beneficiario para la persona
			$beneho = HogarBeneficiario::find_by_hb_dp_id($_POST['dp_id']);
			if (!isset($beneho)) {
			 $beneho = new HogarBeneficiario();
			 $beneho->hb_dp_id = $_POST['dp_id'];
			}
			$beneho->hb_ho_id = $ult_ho;
			$beneho->save();

			//Actualizo relación Hogar/Beneficiario para los miembros del Hogar
			if (!empty($_POST['lista_id_miembros'])) {
			 $miembros_hogar = explode("," , $_POST['lista_id_miembros']);
			 foreach($miembros_hogar as $id_miembro){
				 $beneho = HogarBeneficiario::find_by_hb_dp_id($id_miembro);
				   $beneho->hb_ho_id = $ult_ho;
				   $beneho->save();
			 }
			}

			//Si no quedan miembros del hogar en la dirección anterior
			//elimino el Hogar y Dirección.
		  $id_hogar_ant = $_POST['ho_id'];
			$id_dom_ant = $_POST['dom_id'];

			if (!empty($id_hogar_ant)) { //Podría no tener un grupo hogar anterior
				$miembros_hog_ant = HogarBeneficiario::count(array("conditions" => "hb_ho_id = '$id_hogar_ant'"));
				if ($miembros_hog_ant == 0) {
					$dom_ant = Domicilio::find($id_dom_ant);
					$hogar_ant = Hogar::find($id_hogar_ant);
					$dom_ant->Delete();
					$hogar_ant->Delete();
				}
			}
?>
