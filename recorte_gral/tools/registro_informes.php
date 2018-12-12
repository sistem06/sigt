<?php
session_start();
include("../../".$_SESSION["dir_sis"]."/secure.php");
	// comienza postulaciones laborales
  $cab2_txt = "select * from tb_informes_listado_items where ili_tabla = 'tb_postulaciones_laborales' and ili_inl_id = ".$_GET["informe"];
  if(mysql_num_rows(mysql_query($cab2_txt)) > 0){
    $agrega_pos2 = "INNER JOIN tb_postulaciones_laborales ON tb_datos_personales.dp_id = tb_postulaciones_laborales.pl_dp_id";
    $que2 = mysql_query($cab2_txt);
    $filtro2 = "";
    $filtro2 .= " and (";
    while($dat2 = mysql_fetch_array($que2)){
      $filtro2 .= " tb_postulaciones_laborales.pl_puesto = ".$dat2['ili_item']." or";
    }
    $filtro2 = substr($filtro2, 0, -3);
    $filtro2 = $filtro2.' ) ';
    $campo2 = ", pl_puesto";
  } else {
    $agrega_pos2 ="";
    $filtro2 = "";
    $campo2 = "";
  }
  // fin postulaciones laborales

  // comienza postulaciones a cursos
  $cab3_txt = "select * from tb_informes_listado_items where ili_tabla = 'tb_postulaciones_cursos' and ili_inl_id = ".$_GET["informe"];
  if(mysql_num_rows(mysql_query($cab3_txt)) > 0){
    $agrega_pos3 = "INNER JOIN tb_postulaciones_cursos ON tb_datos_personales.dp_id = tb_postulaciones_cursos.pc_dp_id";
    $que3 = mysql_query($cab3_txt);
    $filtro3 = "";
    $filtro3 .= " and (";
    while($dat3 = mysql_fetch_array($que3)){
      $filtro3 .= " tb_postulaciones_cursos.pc_curso = ".$dat3['ili_item']." or";
    }
    $filtro3 = substr($filtro3, 0, -3);
    $filtro3 = $filtro3.' ) ';
    $campo3 = ", pc_curso";
  } else {
    $agrega_pos3 ="";
    $filtro3 = "";
    $campo3 = "";
  }
  // fin postulaciones cursos

  // comienza antecedentes laborales puesto
  $cab4_txt = "select * from tb_informes_listado_items where ili_tabla = 'tb_antecedentes_laborales' and ili_variante = 'al_puesto' and ili_inl_id = ".$_GET["informe"];
  if(mysql_num_rows(mysql_query($cab4_txt)) > 0){
    $agrega_pos4 = "INNER JOIN tb_antecedentes_laborales ON tb_datos_personales.dp_id = tb_antecedentes_laborales.al_dp_id";
    $que4 = mysql_query($cab4_txt);
    $filtro4 = "";
    $filtro4 .= " and (";
    while($dat4 = mysql_fetch_array($que4)){
      $filtro4 .= " tb_antecedentes_laborales.al_puesto = ".$dat4['ili_item']." or";
    }
    $filtro4 = substr($filtro4, 0, -3);
    $filtro4 = $filtro4.' ) ';
    $campo4 = ", al_puesto";
  } else {
    $agrega_pos4 ="";
    $filtro4 = "";
    $campo4 = "";
  }
  // fin antecedentes laborales puesto

  // comienza nivel educativo
  $cab5_txt = "select * from tb_informes_listado_items where ili_tabla = 'tb_datos_nivel_educativo' and ili_variante = 'dne_nivel' and ili_inl_id = ".$_GET["informe"];
  if(mysql_num_rows(mysql_query($cab5_txt)) > 0){
    $agrega_pos5 = "INNER JOIN tb_datos_nivel_educativo ON tb_datos_personales.dp_id = tb_datos_nivel_educativo.dne_dp_id";
    $que5 = mysql_query($cab5_txt);
    $filtro5 = "";
    $filtro5 .= " and (";
    while($dat5 = mysql_fetch_array($que5)){
      $filtro5 .= " tb_datos_nivel_educativo.dne_nivel = ".$dat5['ili_item']." or";
    }
    $filtro5 = substr($filtro5, 0, -3);
    $filtro5 = $filtro5.' ) ';
    $campo5 = ", dne_nivel";
  } else {
    $agrega_pos5 ="";
    $filtro5 = "";
    $campo5 = "";
  }
  // fin nivel educativo

  // comienza nivel educativo
  $cab6_txt = "select * from tb_informes_listado_items where ili_tabla = 'tb_datos_nivel_educativo' and ili_variante = 'dne_termino' and ili_inl_id = ".$_GET["informe"];
  if(mysql_num_rows(mysql_query($cab6_txt)) > 0){
    if($agrega_pos5 == ""){
    $agrega_pos6 = "INNER JOIN tb_datos_nivel_educativo ON tb_datos_personales.dp_id = tb_datos_nivel_educativo.dne_dp_id";
  } else {
    $agrega_pos6 ="";
  }
    $que6 = mysql_query($cab6_txt);
    $filtro6 = "";
    $filtro6 .= " and (";
    while($dat6 = mysql_fetch_array($que6)){
      $filtro6 .= " tb_datos_nivel_educativo.dne_termino = ".$dat6['ili_item']." or";
    }
    $filtro6 = substr($filtro6, 0, -3);
    $filtro6 = $filtro6.' ) ';
    $campo6 = ", dne_termino";
  } else {
    $agrega_pos6 ="";
    $filtro6 = "";
    $campo6 = "";
  }
  // fin nivel educativo

  // comienza idiomas
  $cab7_txt = "select * from tb_informes_listado_items where ili_tabla = 'tb_beneficiario_idioma' and ili_variante = 'bi_idi_id' and ili_inl_id = ".$_GET["informe"];
  if(mysql_num_rows(mysql_query($cab7_txt)) > 0){
    $agrega_pos7 = "INNER JOIN tb_beneficiario_idioma ON tb_datos_personales.dp_id = tb_beneficiario_idioma.bi_dp_id";
    $que7 = mysql_query($cab7_txt);
    $filtro7 = "";
    $filtro7 .= " and (";
    while($dat7 = mysql_fetch_array($que7)){
      $filtro7 .= " tb_beneficiario_idioma.bi_idi_id = ".$dat7['ili_item']." or";
    }
    $filtro7 = substr($filtro7, 0, -3);
    $filtro7 = $filtro7.' ) ';
    $campo7 = ", bi_idi_id";
  } else {
    $agrega_pos7 ="";
    $filtro7 = "";
    $campo7 = "";
  }
  // fin idiomas

  // comienza nivel idioma
  $cab8_txt = "select * from tb_informes_listado_items where ili_tabla = 'tb_beneficiario_idioma' and ili_variante = 'bi_nivel' and ili_inl_id = ".$_GET["informe"];
  if(mysql_num_rows(mysql_query($cab8_txt)) > 0){
    if($agrega_pos7 == ""){
    $agrega_pos8 = "INNER JOIN tb_beneficiario_idioma ON tb_datos_personales.dp_id = tb_beneficiario_idioma.bi_dp_id";
  } else {
    $agrega_pos8 ="";
  }
    $que8 = mysql_query($cab8_txt);
    $filtro8 = "";
    $filtro8 .= " and (";
    while($dat8 = mysql_fetch_array($que8)){
      $filtro8 .= " tb_beneficiario_idioma.bi_nivel = ".$dat8['ili_item']." or";
    }
    $filtro8 = substr($filtro8, 0, -3);
    $filtro8 = $filtro8.' ) ';
    $campo8 = ", bi_nivel";
  } else {
    $agrega_pos8 ="";
    $filtro8 = "";
    $campo8 = "";
  }
  // fin nivel idioma

   // comienza titulo
  $cab9_txt = "select * from tb_informes_listado_items where ili_tabla = 'tb_datos_nivel_educativo' and ili_variante = 'dne_titulo' and ili_inl_id = ".$_GET["informe"];
  if(mysql_num_rows(mysql_query($cab9_txt)) > 0){
    if($agrega_pos5 == "" and $agrega_pos6 == ""){
    $agrega_pos9 = "INNER JOIN tb_datos_nivel_educativo ON tb_datos_personales.dp_id = tb_datos_nivel_educativo.dne_dp_id";
  } else {
    $agrega_pos9 ="";
  }
    $que9 = mysql_query($cab9_txt);
    $filtro9 = "";
    $filtro9 .= " and (";
    while($dat9 = mysql_fetch_array($que9)){
      $filtro9 .= " tb_datos_nivel_educativo.dne_titulo = ".$dat9['ili_item']." or";
    }
    $filtro9 = substr($filtro9, 0, -3);
    $filtro9= $filtro9.' ) ';
    $campo9 = ", dne_titulo";
  } else {
    $agrega_pos9 ="";
    $filtro9 = "";
    $campo9 = "";
  }

  // comienza sexo
  $cab10_txt = "select * from tb_informes_listado_items where ili_tabla = 'tb_datos_personales' and ili_variante = 'dp_sexo' and ili_inl_id = ".$_GET["inl_id"];
  if(mysql_num_rows(mysql_query($cab10_txt)) > 0){
       
    $agrega_pos10 ="";
  
    $que10 = mysql_query($cab10_txt);
    $filtro10 = "";
    $filtro10 .= " and (";
    while($dat10 = mysql_fetch_array($que10)){
      $filtro10 .= " tb_datos_personales.dp_sexo = ".$dat10['ili_item']." or";
    }
    $filtro10 = substr($filtro10, 0, -3);
    $filtro10= $filtro10.' ) ';
    $campo10 = ", dp_sexo";
  } else {
    $agrega_pos10 ="";
    $filtro10 = "";
    $campo10 = "";
  }
  // fin sexo

  // comienza edades
  $cab11_txt = "select * from tb_informes_listado_items where ili_tabla = 'tb_datos_personales' and (ili_variante = 'desde' or ili_variante = 'hasta') and ili_inl_id = ".$_GET["inl_id"];
  if(mysql_num_rows(mysql_query($cab11_txt)) > 0){
       
    $agrega_pos11 ="";
  
   
    $filtro11 = "";
    $filtro11 .= " and ( ";
    $cab11_txt_1 = "select * from tb_informes_listado_items where ili_tabla = 'tb_datos_personales' and ili_variante = 'desde' and ili_inl_id = ".$_GET["inl_id"];
        if(mysql_num_rows(mysql_query($cab11_txt_1)) > 0){
          $des = mysql_fetch_array(mysql_query($cab11_txt_1));
          $fecha_des = (date("Y")-$des['ili_item']).'-'.date("m").'-'.date("d");
          $filtro11 .= " tb_datos_personales.dp_nacimiento <= '".$fecha_des."' ";
        }
    if(mysql_num_rows(mysql_query($cab11_txt)) == 2){
          $filtro11 .= " and ";
    }

    $cab11_txt_2 = "select * from tb_informes_listado_items where ili_tabla = 'tb_datos_personales' and ili_variante = 'hasta' and ili_inl_id = ".$_GET["inl_id"];
        if(mysql_num_rows(mysql_query($cab11_txt_2)) > 0){
          $has = mysql_fetch_array(mysql_query($cab11_txt_2));
          $fecha_has = (date("Y")-$has['ili_item']).'-'.date("m").'-'.date("d");
          $filtro11 .= " tb_datos_personales.dp_nacimiento >= '".$fecha_has."' ";
        }
    
    $filtro11 .= " ) ";
    $campo11 = ", dp_nacimiento";
  } else {
    $agrega_pos11 ="";
    $filtro11 = "";
    $campo11 = "";
  }
  // fin edades

  // comienza veteranos
  $cab12_txt = "select * from tb_informes_listado_items where ili_tabla = 'tb_datos_personales' and ili_variante = 'dp_veterano' and ili_inl_id = ".$_GET["inl_id"];
  if(mysql_num_rows(mysql_query($cab12_txt)) > 0){ 
    $dat12 = mysql_fetch_array(mysql_query($cab12_txt));
    $agrega_pos12 ="";
    $que12 = mysql_query($cab12_txt);
    $filtro12 = "";
    $filtro12 .= " and (";
    while($dat12 = mysql_fetch_array($que12)){
      $filtro12 .= " tb_datos_personales.dp_veterano = ".$dat12['ili_item']." or";
    }
    $filtro12 = substr($filtro12, 0, -3);
    $filtro12= $filtro12.' ) ';
    $campo12 = ", dp_veterano";
  } else {
    $agrega_pos12 ="";
    $filtro12 = "";
    $campo12 = "";
  }
  // fin veteranos

   // comienza familiar veteranos
  $cab13_txt = "select * from tb_informes_listado_items where ili_tabla = 'tb_datos_personales' and ili_variante = 'dp_fam_veterano' and ili_inl_id = ".$_GET["inl_id"];
  if(mysql_num_rows(mysql_query($cab13_txt)) > 0){ 
    $dat13 = mysql_fetch_array(mysql_query($cab13_txt));
    $agrega_pos13 ="";
    $que13 = mysql_query($cab13_txt);
    $filtro13 = "";
    $filtro13 .= " and (";
    while($dat13 = mysql_fetch_array($que13)){
      $filtro13 .= " tb_datos_personales.dp_fam_veterano = ".$dat13['ili_item']." or";
    }
    $filtro13 = substr($filtro13, 0, -3);
    $filtro13= $filtro13.' ) ';
    $campo13 = ", dp_fam_veterano";
  } else {
    $agrega_pos13 ="";
    $filtro13 = "";
    $campo13 = "";
  }
  // fin familiar veteranos

  // comienza pueblos originarios
  $cab14_txt = "select * from tb_informes_listado_items where ili_tabla = 'tb_datos_personales' and ili_variante = 'dp_nombre_pueblo_originario' and ili_inl_id = ".$_GET["inl_id"];
  if(mysql_num_rows(mysql_query($cab14_txt)) > 0){ 
    //$dat14 = mysql_fetch_array(mysql_query($cab13_txt));
    $agrega_pos14 ="";
    $que14 = mysql_query($cab14_txt);
    $filtro14 = "";
    $filtro14 .= " and (";
    while($dat14 = mysql_fetch_array($que14)){
      $filtro14 .= " tb_datos_personales.dp_nombre_pueblo_originario = ".$dat14['ili_item']." or";
    }
    $filtro14 = substr($filtro14, 0, -3);
    $filtro14= $filtro14.' ) ';
    $campo14 = ", dp_nombre_pueblo_originario";
  } else {
    $agrega_pos14 ="";
    $filtro14 = "";
    $campo14 = "";
  }
  // fin pueblos originarios

  	/*$select_in = "select dp_id ".$campo3." from tb_datos_personales INNER JOIN tb_beneficiarios_sistema ON tb_datos_personales.dp_id = tb_beneficiarios_sistema.bs_dp_id  ".$agrega_pos3." where (tb_beneficiarios_sistema.bs_sis = '".$_SESSION["sistema"]."' ".$filtro3.") group by tb_datos_personales.dp_id";*/

	$select_in = "select dp_id ".$campo2.$campo3.$campo4.$campo5.$campo6.$campo7.$campo8.$campo9.$campo10.$campo11.$campo12.$campo13.$campo14." from tb_datos_personales INNER JOIN tb_beneficiarios_sistema ON tb_datos_personales.dp_id = tb_beneficiarios_sistema.bs_dp_id ".$agrega_pos2." ".$agrega_pos3." ".$agrega_pos4." ".$agrega_pos5." ".$agrega_pos6." ".$agrega_pos7." ".$agrega_pos8." ".$agrega_pos9." ".$agrega_pos10." ".$agrega_pos11." ".$agrega_pos12." ".$agrega_pos13." ".$agrega_pos14." where (tb_beneficiarios_sistema.bs_sis = ".$_SESSION["sistema"]." ".$filtro2." ".$filtro3." ".$filtro4." ".$filtro5." ".$filtro6." ".$filtro7." ".$filtro8." ".$filtro9." ".$filtro10." ".$filtro11." ".$filtro12." ".$filtro13." ".$filtro14.") group by tb_datos_personales.dp_id";
	$query = mysql_query($select_in);
	$resp = mysql_num_rows($query).' Personas';
//	$resp = $sistem;
	echo $resp;
	?>