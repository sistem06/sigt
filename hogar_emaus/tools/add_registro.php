<?php
require_once '_conexion.php';
mysql_set_charset('utf8');
header("Content-Type: text/html;charset=utf-8");
if($_POST['paso']==1){

   $dp_apellido =  ucwords(strtolower(utf8_decode($_POST['dp_apellido'])));
               $dp_nombre =  ucwords(strtolower(utf8_decode($_POST['dp_nombre'])));

               $dp_name = $dp_apellido.', '.$dp_nombre;
               $dp_busqueda = $_POST['dp_nro_doc'].' '.$dp_name.' '.$_POST['dp_telefono'].' '.$_POST['dp_movil'];

               $cliente = new DatosPersonales();
               $cliente->dp_nombre = $dp_nombre;
               $cliente->dp_apellido = $dp_apellido;
               $cliente->dp_name = $dp_name;
               $cliente->dp_sexo = $_POST['dp_sexo'];
               $cliente->dp_tipo_doc = $_POST['dp_tipo_doc'];
               $cliente->dp_nro_doc = $_POST['dp_nro_doc'];
               $cliente->dp_cuil = $_POST['dp_cuil'];
               $cliente->dp_estado_civil = $_POST['dp_estado_civil'];
               $cliente->dp_pais_nacimiento = $_POST['dp_pais_nacimiento'];
               $cliente->dp_nacionalidad = $_POST['dp_nacionalidad'];
               $cliente->dp_nacimiento = $_POST['dp_nacimiento'];
               $cliente->dp_telefono = $_POST['dp_telefono'];
               $cliente->dp_movil = $_POST['dp_movil'];
               $cliente->dp_busqueda = $dp_busqueda;
               $cliente->save();

               $book = DatosPersonales::last();
               $ult = $book->dp_id;

               $cono = new DomicilioConocido();
               $cono->ud_dp_id = $ult;
               $cono->ud_pais = $_POST['ud_pais'];
               if($_POST['ud_pais']==13){
                  $loc = Localidades::find($_POST['ud_localidad']);
                  $lo_name = $loc->loc_name;

                  $pro = Provincias::find($_POST['ud_provincia']);
                  $pr_name = $pro->pr_name;

                   $cono->ud_localidad = $lo_name;
                   $cono->ud_provincia = $pr_name;

               } else {
                  $cono->ud_provincia = $_POST['ud_provincia_alt'];
                  $cono->ud_localidad = $_POST['ud_localidad_alt'];
               }
               $cono->ud_domicilio = $_POST['ud_domicilio'];
               $cono->save();

               $vive = new ViveBeneficiario();
               $vive->vb_dp_id = $ult;
               $vive->vb_dv_id = $_POST['vb_dv_id'];
               $vive->save();

               if($_POST['vb_dv_id']==3){

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

         //   $prox = "../nuevo_registro1.php?dp_id=".$ult;
         //   $prox1 = "nuevo_registro1.php?dp_id=".$ult;
            $prox = "../nuevo_familiares.php?dp_id=".$ult."&ho_id=".$ult_ho;
            $prox1 = "nuevo_familiares.php?dp_id=".$ult."&ho_id=".$ult_ho;

            $beneho = new HogarBeneficiario();
            $beneho->hb_dp_id = $ult;
            $beneho->hb_ho_id = $ult_ho;
            $beneho->save();
            } else {
               $prox = "../nuevo_referentes.php?dp_id=".$ult;
               $prox1 = "nuevo_referente.php?dp_id=".$ult;
            }

            $recor = new AltaEntrevista();
            $recor->ent_sis = '5';
            $recor->ent_fin = '0';
            $recor->ent_dp_id = $ult;
            $recor->ent_proxima = $prox1;
            $recor->ent_us = $_POST['id_us'];
            $recor->save();

            $histori = new Historial();
            $histori->hi_us_id = $_POST['id_us'];
            $histori->hi_dp_id = $ult;
            $histori->hi_detalle = "Agrego este beneficiario";
            $histori->save();
   
            $alto = new BenSistema();
            $alto->bs_us = $_POST['id_us'];
            $alto->bs_dni = $_POST['dp_nro_doc'];
            $alto->bs_dp_id = $ult;
            $alto->bs_sis = '5';
            $alto->bs_sis_ini = '5';
            $alto->save();
         header("location: $prox");
}

if($_POST['paso']==100){

         $dpr_apellido =  ucwords(strtolower(utf8_decode($_POST['dp_apellido'])));
               $dpr_nombre =  ucwords(strtolower(utf8_decode($_POST['dp_nombre'])));

               $dpr_name = $dpr_apellido.', '.$dpr_nombre;

               $cliente = new DatosPersonalesReferente();
               $cliente->dpr_nombre = $dpr_nombre;
               $cliente->dpr_apellido = $dpr_apellido;
               $cliente->dpr_name = $dpr_name;
               $cliente->dpr_sexo = $_POST['dp_sexo'];
               $cliente->dpr_tipo_doc = $_POST['dp_tipo_doc'];
               $cliente->dpr_nro_doc = $_POST['dp_nro_doc'];
               $cliente->dpr_estado_civil = $_POST['dp_estado_civil'];
               if(!empty($_POST['dp_nacimiento'])){
               $cliente->dpr_nacimiento = $_POST['dp_nacimiento'];
            }
               $cliente->dpr_telefono = $_POST['dp_telefono'];
               $cliente->dpr_movil = $_POST['dp_movil'];
               $cliente->dpr_correo = $_POST['dp_mail'];
               $cliente->dpr_parentesco = $_POST['dp_parentesco'];
               $cliente->dpr_dpto_provincial = $_POST['dom_pr_dpto'];
               $cliente->dpr_localidad = $_POST['dom_localidad'];
               $cliente->dpr_calle = $_POST['dp_calle'];
               $cliente->dpr_nro = $_POST['dom_nro'];
               $cliente->dpr_piso = $_POST['dom_piso'];
               $cliente->dpr_dpto = $_POST['dom_depto'];
               $cliente->dpr_casa = $_POST['dom_casa'];
               $cliente->dpr_escalera = $_POST['dom_escalera'];
               $cliente->dpr_edificio = $_POST['dom_edificio'];
               $cliente->save();

            $book = DatosPersonalesReferente::last();
            $ult = $book->dpr_id;

         $ho_id = $_POST['ho_id'];
         $beneho = new ReferenteBeneficiario();
            $beneho->rb_dpr_id = $ult;
            $beneho->rb_dp_id = $_POST['dp_id'];
            $beneho->save();
            $prox = "../nuevo_referentes.php?dp_id=".$_POST['dp_id'];
            header("location: $prox");
}

if($_POST['paso']==101){
   $dp_id = $_POST['dp_id'];

   $prox = "../nuevo_archivos.php?dp_id=$dp_id";
      $prox1 = "nuevo_archivos.php?dp_id=$dp_id";

   $entre = AltaEntrevista::find_by_ent_dp_id($dp_id);
      $ent_id = $entre->ent_id;

   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_sis = '5';
   $recor->ent_fin = '0';
   $recor->ent_proxima = $prox1;
   $recor->ent_us = $_POST['id_us'];
   $recor->save();

   header("location: $prox");
}

if($_POST['paso']==102){
   $dp_id = $_POST['dp_id'];

   $prox = "../nuevo_registro1.php?dp_id=$dp_id";
      $prox1 = "nuevo_registro1.php?dp_id=$dp_id";

   $entre = AltaEntrevista::find_by_ent_dp_id($dp_id);
      $ent_id = $entre->ent_id;

   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_sis = '5';
   $recor->ent_fin = '0';
   $recor->ent_proxima = $prox1;
   $recor->ent_us = $_POST['id_us'];
   $recor->save();

   header("location: $prox");
}

if($_POST['paso']==2){

	$sal = new Salud();
   	$sal->ds_dp_id = $_POST['ds_dp_id'];
   	$sal->ds_tiene_os = $_POST['ds_tiene_os'];
   	if($_POST['ds_os'] != ""){
   	$sal->ds_os = $_POST['ds_os'];
   }
   if($_POST['ds_nro_cud'] != ""){
   	$sal->ds_nro_cud = $_POST['ds_nro_cud'];
   }
   if($_POST['ds_vencimiento_cud'] != ""){
   	$sal->ds_vencimiento_cud = $_POST['ds_vencimiento_cud'];
   }
   	$sal->ds_tiene_cud = $_POST['ds_tiene_cud'];
   	$sal->ds_observaciones = $_POST['ds_observaciones'];

       if($_POST['ds_problemas_salud'] == 1){
      $sal->ds_cuales_problemas_salud = $_POST['ds_cuales_problemas_salud'];
      $sal->ds_lugar_atencion = $_POST['ds_lugar_atencion'];
   }
      $sal->ds_problemas_salud = $_POST['ds_problemas_salud'];
   	$sal->save();

   	$prox = "../detalle_beneficiario.php?dp_id=".$_POST['ds_dp_id'];
   $prox1 = "detalle_beneficiario.php?dp_id=".$_POST['ds_dp_id'];

   	$dp_id = $_POST['ds_dp_id'];

   	$entre = AltaEntrevista::find_by_ent_dp_id($_POST['ds_dp_id']);
   	$ent_id = $entre->ent_id;

   $recor = AltaEntrevista::find($ent_id);
   $recor->ent_sis = '5';
   $recor->ent_fin = '1';
   
   $recor->ent_us = $_POST['id_us'];
   $recor->save();

	header("location: $prox");
}
exit();
?>