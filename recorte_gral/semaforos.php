<?php // Semáforos para secciones de datos de las Personas/Beneficiarios
  require_once '../_conexion.php';

  echo '<div class="row">';
  echo '<div class="col-xs-12 col-sm-12 col-md-12">';

  $em_id = BuscaRegistro ("tb_datos_emprendimiento", "em_dp_id", $_GET["dp_id"], "em_id");
  $hb_ho_id = BuscaRegistro ("tb_hogar_beneficiario", "hb_dp_id", $_GET["dp_id"], "hb_ho_id");
  $dp_id = $_GET["dp_id"];

  // Esta rutina agrega los registros en tb_entrevista para aquellas Personas
  // existentes en la DB que se agregan a otra área.
  $secciones_dp_area = SeccionArea::all(array('conditions' => 'sa_sis_id = '.$_SESSION['sistema']));

  foreach($secciones_dp_area as $seccion_dp){

    $entre = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $dp_id,$seccion_dp->sa_ten_id);

    if (!isset($entre)) { //Agrego Sección en el área
      $rec_ten = TipoEntrevista::find_by_ten_id($seccion_dp->sa_ten_id);
      $rec_ent_ant = AltaEntrevista::find_by_ent_dp_id_and_ent_ten_id_and_ent_fin($dp_id,$seccion_dp->sa_ten_id,1);

      if (isset($rec_ent_ant)) {
        $estado = 1;
      } else {
        $estado = 0;
      }

      $recor = new AltaEntrevista();
      $recor->ent_sis = $_SESSION['sistema'];
      $recor->ent_fin = $estado;
      $recor->ent_dp_id = $dp_id;
      $recor->ent_ten_id = $seccion_dp->sa_ten_id;
      $recor->ent_proxima = $rec_ten->ten_descripcion;
      $recor->ent_us = $_SESSION['id_us'];
      $recor->save();
    } // if (!isset($entre)) {

    // Control carga de Datos: Se verifica estado original de los semáforos.
    // Cuando un área agrega una persona existente en la DB bajo otra área, la misma puede recibir o perder
    // datos de secciones ligadas a la dirección o grupo hogar (ej, cambio de grupo hogar, se agrega persona debug
    // otra área, etc).
    switch($seccion_dp->sa_ten_id){
      case 4: //Datos Personales
        $entre2 = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $dp_id,$seccion_dp->sa_ten_id);
        $entre2->ent_fin = 1;
        $entre2->save();
      break;

      case 7: //Antecedentes Laborales
        $laboral = AntecedenteLaboral::find_by_al_dp_id($dp_id);
        if (isset($laboral)) {
          $entre2 = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $dp_id,$seccion_dp->sa_ten_id);
          $entre2->ent_fin = 1;
          $entre2->save();
        }
      break;

      case 11: //Miembros del Hogar
        $miembros = HogarBeneficiario::count(array("conditions" => "hb_ho_id = '$hb_ho_id'"));
        if ($miembros > 1) {
          $entre2 = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $dp_id,$seccion_dp->sa_ten_id);
          $entre2->ent_fin = 1;
          $entre2->save();
        } else {
          $entre2 = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $dp_id,$seccion_dp->sa_ten_id);
          $entre2->ent_fin = 0;
          $entre2->save();
        }
      break;

      case 15: //Datos de la Vivienda
        // Como la vivienda está ligada a una dirección, verifico
        // que la persona no haya cambiado de Domicilio, en este caso
        // marco el semáforo en rojo para que se completen los datos
        // de la nueva vivienda o verde si la nueva dirección ya tiene
        // los datos de la vivienda.
        $hogar_gral = HogarGeneral::find_by_hog_ho_id($hb_ho_id);
        if (!isset($hogar_gral)) {
          $entre2 = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $dp_id,$seccion_dp->sa_ten_id);
          $entre2->ent_fin = 0;
          $entre2->save();
        } else {
          $entre2 = AltaEntrevista::find_by_ent_sis_and_ent_dp_id_and_ent_ten_id($_SESSION['sistema'], $dp_id,$seccion_dp->sa_ten_id);
          $entre2->ent_fin = 1;
          $entre2->save();
        }
      break;
    } //switch
  } //foreach

  // Crea barra de Semáforos
  $text_ent = "select * from tb_entrevista where (ent_sis = '".$_SESSION["sistema"]."' and ent_dp_id ='".$_GET["dp_id"]."')";
  $q_ent = mysql_query($text_ent);
  while($a_ent = mysql_fetch_array($q_ent)){

    switch($a_ent['ent_ten_id']){
          case 1: //Capacitaciones Recibidas
          $dir_entrev = "'datos_capacitaciones.php?dp_id=".$dp_id."&em_id=".$em_id."'";
          break;

          case 2: //Datos del Emprendimiento
          $dir_entrev = "'datos_emprendimiento.php?dp_id=".$dp_id."&em_id=".$em_id."'";
          break;

          case 3: //Datos Educativos
          $dir_entrev = "'datos_educativos.php?dp_id=".$dp_id."'";
          break;

          case 4: //Datos Personales
          $dir_entrev = "'nuevo_registro_mod.php?dp_id=".$dp_id."'";
          break;

          case 5: //Datos Clínicos
          $dir_entrev = "'datos_salud.php?dp_id=".$dp_id."'";
          break;

          case 6: //Documentos Graficos
          $dir_entrev = "'dni_front.php?dp_id=".$dp_id."&estado=E'";
          break;

          case 7: //Historia Laboral
          // no se carga Laboral para Emprendimientos y el archivo nuevo_registro2.php
          // se usa para cargar Organizaciones Asoc. case 9
          //$dir_entrev = "'nuevo_registro2.php?dp_id=".$dp_id."&em_id=".$em_id."&acc=M'";
          //10.08.2018 SK: unifico código, case 7 -> Historia Laboral
          $dir_entrev = "'datos_laboral.php?dp_id=".$dp_id."&estado=E'";
          break;

          case 8: //Ingresos
          $dir_entrev = "'datos_ingresos.php?dp_id=".$dp_id."&em_id=".$em_id."'";
          break;

          case 9: //Instituciones Asociadas
          $dir_entrev = "'datos_instituciones_asoc.php?dp_id=".$dp_id."&em_id=".$em_id."'";
          break;

          case 10: //Lugares de Venta
          $dir_entrev = "'datos_lugares_venta.php?dp_id=".$dp_id."&em_id=".$em_id."&estado=E'";
          break;

          case 11: //Miembros del Hogar
          $dir_entrev = "'miembros_hogar.php?dp_id=".$dp_id."&ho_id=".$hb_ho_id."&estado=E'";
          break;

          case 12: //Necesidad del Emprendimiento
          $dir_entrev = "'datos_necesidades_emp.php?dp_id=".$dp_id."&em_id=".$em_id."&estado=E'";
          break;

          case 13: //Postulaciones
          $dir_entrev = "'datos_postulaciones.php?dp_id=".$dp_id."&em_id=".$em_id."&acc=M'";
          break;

          case 14: //Subsidios/Créditos Recibidos
          $dir_entrev = "'datos_creditos.php?dp_id=".$dp_id."&em_id=".$em_id."&estado=E'";
          break;

          case 15: //Datos de la Vivienda
          $dir_entrev = "'datos_vivienda.php?dp_id=".$dp_id."'";
          break;
    };

    if($a_ent['ent_fin']==0){
      echo '<button type="button"
      onclick="location.href='.$dir_entrev.'"
      class="btn btn-danger btn-sm">
      <span class="glyphicon glyphicon-bell"></span> ';
    }else{
      echo '<button type="button"
      onclick="location.href='.$dir_entrev.'"
      class="btn btn-success btn-sm">
      <span class="glyphicon glyphicon-check"></span> ';
    }
     echo $a_ent['ent_proxima'];
     echo ' </button>  ';
  };

  echo '</div></div>';
  ?>  <!-- Fin Semáforos -->
