<?php // Semáforos para secciones de datos de las Personas/Beneficiarios
  echo '<div class="row">';
  echo '<div class="col-xs-12 col-sm-12 col-md-12">';

  $em_id = BuscaRegistro ("tb_datos_emprendimiento", "em_dp_id", $_GET["dp_id"], "em_id");
  $hb_ho_id = BuscaRegistro ("tb_hogar_beneficiario", "hb_dp_id", $_GET["dp_id"], "hb_ho_id");
  $dp_id = $_GET["dp_id"];

  $text_ent = "select * from tb_entrevista where (ent_sis = 1 and ent_dp_id ='".$_GET["dp_id"]."')";
  $q_ent = mysql_query($text_ent);
  while($a_ent = mysql_fetch_array($q_ent)){

    switch($a_ent['ent_ten_id']){
          case 1: //Capacitaciones Recibidas
          $dir_entrev = "'nuevo_registro4.php?dp_id=".$dp_id."&em_id=".$em_id."'";
          break;

          case 2: //Datos del Emprendimiento
          $dir_entrev = "'nuevo_registro1.php?dp_id=".$dp_id."&em_id=".$em_id."'";
          break;

          case 3: //Datos Educativos
          $dir_entrev = "'nuevo_registro_edu.php?dp_id=".$dp_id."'";
          break;

          case 4: //Datos Personales
          $dir_entrev = "'nuevo_registro_mod.php?dp_id=".$dp_id."'";
          break;

          case 5: //Discapacidad
          $dir_entrev = "'nuevo_registro_discapacidad.php?dp_id=".$dp_id."&em_id=".$em_id."&acc=M'";
          break;

          case 6: //Documentos Graficos
          $dir_entrev = "'nuevo_archivos.php?dp_id=".$dp_id."&estado=E'";
          break;

          case 7: //Historia Laboral
          // no se carga Laboral para Emprendimientos y el archivo nuevo_registro2.php
          // se usa para cargar Organizaciones Asoc. case 9
          //$dir_entrev = "'nuevo_registro2.php?dp_id=".$dp_id."&em_id=".$em_id."&acc=M'";
          $dir_entrev = "";
          break;

          case 8: //Ingresos
          $dir_entrev = "'nuevo_registro7.php?dp_id=".$dp_id."&em_id=".$em_id."'";
          break;

          case 9: //Instituciones Asociadas
          $dir_entrev = "'nuevo_registro2.php?dp_id=".$dp_id."&em_id=".$em_id."'";
          break;

          case 10: //Lugares de Venta
          $dir_entrev = "'nuevo_registro3.php?dp_id=".$dp_id."&em_id=".$em_id."&estado=E'";
          break;

          case 11: //Miembros del Hogar
          $dir_entrev = "'nuevo_familiares.php?dp_id=".$dp_id."&ho_id=".$hb_ho_id."&estado=E'";
          break;

          case 12: //Necesidad del Emprendimiento
          $dir_entrev = "'nuevo_registro6.php?dp_id=".$dp_id."&em_id=".$em_id."&estado=E'";
          break;

          case 13: //Postulaciones
          $dir_entrev = "'nuevo_registro_postulaciones.php?dp_id=".$dp_id."&em_id=".$em_id."&acc=M'";
          break;

          case 14: //Subsidios/Créditos Recibidos
          $dir_entrev = "'nuevo_registro5.php?dp_id=".$dp_id."&em_id=".$em_id."&estado=E'";
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
