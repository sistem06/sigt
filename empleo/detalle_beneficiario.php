<?php
include("secure.php");
include ("../conecta.php");
include ("../funciones/funciones_generales.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo BuscaRegistro ("tb_sistemas", "sis_id", $_SESSION["sistema"], "sis_name"); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/estilos_ss.css">
  <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="../source/jquery.fancybox.css?v=2.1.5" media="screen" />
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"
</head>
<body>
<?php include("../recorte_gral/encabezado.php"); ?>
<div class="container-fluid">
<?php include("recortes/navegacion.php"); ?>

	   <!-- Nombre Emprendedor y Semáforos de Secciones -->
		 <h1><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_name"); ?></h1>
      <ul class="nav nav-tabs">
  <li class="active" id="ver1"><a href="#" >Datos Personales</a></li>
  <li id="ver2"><a href="#">Prestaciones</a></li>
    </ul>
<br>

    <div id="gr1">
 		 <?php include("recortes/semaforos.php"); ?>
     <br>
		<!-- aca comienza el calendario -->
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span>Datos Personales</h3>
                </div>
                <div class="panel-body">
                <div style="background:#999; padding:5px;margin-top:5px; margin-bottom:10px; text-align:center; color:#fff;">

                    <?php
                    $qh_tx = "SELECT hi_us_id FROM tb_historial WHERE hi_dp_id = ".$_GET["dp_id"];
                    $qh = mysql_query($qh_tx);
                    $ah = mysql_fetch_array($qh);
                    echo "Agregado por ".BuscaRegistro ("tb_usuarios", "us_id", $ah["hi_us_id"], "us_name");
                    ?>
                </div>

                <p>  <a href="../pdf/informe.php?dp_id=<?php echo $_GET['dp_id']; ?>" target="_blank"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>Ver PDF</button></a></p>

                    <p>Nombre: <strong><?php echo BuscaRegistroM ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_name"); ?></strong></p>
                    <p>Documento: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_nro_doc"); ?></strong></p>
                    <p>Nacimiento: <strong><?php echo fecha_dev(BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_nacimiento")); ?></strong></p>
                    <p>Estado Civil: <strong><?php
                    $ec = BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_estado_civil");
                    echo BuscaRegistroM ("tb_estado_civil", "ec_id", $ec, "ec_name");
                    ?></strong></p>
                    <p>Domicilio: <strong><?php
                    echo TirameDomicilio($_GET["dp_id"]);
                    ?></strong></p>
                    <p>Barrio: <strong><?php
                    echo TirameBarrio($_GET["dp_id"]);
                    ?></strong></p>
                    <p>CAAT: <strong><?php
                    echo TirameCaat($_GET["dp_id"]);
                    ?></strong></p>
                     <p>Latitud: <strong><?php
                    echo TirameDomicilioLat($_GET["dp_id"]);
                    ?></strong></p>
                     <p>Longitud: <strong><?php
                    echo TirameDomicilioLng($_GET["dp_id"]);
                    ?></strong></p>
                     <p>Telefono: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_telefono"); ?></strong></p>
                    <p>Celular: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_movil"); ?></strong></p>
                    <p>Telefono alterntivo: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_telefono1"); ?></strong></p>
                    <p>Celular alternativo: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_movil1"); ?></strong></p>
                       <p>Mail: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_mail"); ?></strong></p>
                        <p>Facebook: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_facebook"); ?></strong></p>
                         <p>Web: <strong><?php echo BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_web"); ?></strong></p>
                         <p>Veterano de la Guerra de Malvinas: <strong><?php echo SiNoM (BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_veterano")); ?></strong></p>
                         <p>Es familiar de un Veterano de la Guerra de Malvinas: <strong><?php echo SiNoM (BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_fam_veterano")); ?></strong></p>

                            <?php
                            if(BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_pueblo_originario")== 1){
                              echo "<p>Se reconoce perteneciente al pueblo originario <b>";
                                  if(BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_nombre_pueblo_originario") != 0){
                                      echo BuscaRegistroM ("tb_pueblos_originarios", "po_id", BuscaRegistro ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_nombre_pueblo_originario"),"po_name");
                                  };
                              echo "</b></p>";
                            }
                            ?>
                         <p>Observaciones: <strong><?php echo (BuscaRegistroSu ("tb_datos_personales", "dp_id", $_GET["dp_id"], "dp_observaciones")); ?></strong></p>

                          <iframe class="map2" width="100%" height="350" src="https://maps.google.com/maps?q=<?php echo TirameDomicilioLat($_GET['dp_id']).','.TirameDomicilioLng($_GET['dp_id']); ?>&amp;num=1&amp;ie=UTF8&amp;ll=<?php echo TirameDomicilioLat($_GET['dp_id']).','.TirameDomicilioLng($_GET['dp_id']); ?>&amp;spn=0.041038,0.077162&amp;t=m&amp;z=14&amp;output=embed"></iframe>


                  <p>  <a href="nuevo_registro_mod.php?dp_id=<?php echo $_GET['dp_id']; ?>"><button type="button" class="btn btn-primary">Modificar Datos Personales</button></a></p>

                  <p>  <a href="nuevo_domicilio_mod.php?dp_id=<?php echo $_GET['dp_id']; ?>"><button type="button" class="btn btn-primary">Modificar Domicilio</button></a></p>

                  <?php
                  if($_SESSION["sector"]==5){
                    ?>
                    <p>  <a href="nuevo_registro_mod_dp.php?dp_id=<?php echo $_GET['dp_id']; ?>"><button type="button" class="btn btn-primary">Modificar Nombre o DNI</button></a></p>
                  <?php } ?>

                </div>
              </div>
        </div>
<?php $em_id = BuscaRegistro ("tb_datos_emprendimiento", "em_dp_id", $_GET["dp_id"], "em_id"); ?>
      <div class="col-xs-12 col-sm-6 col-md-3">
      <div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-camera"></span>Documentos Graficos</h3>
                </div>
                <div class="panel-body">
         <?php
          $txt_grap = "select * from tb_imagenes where img_dp_id =".$_GET["dp_id"]." and img_front = 1";
          $query_grap = mysql_query($txt_grap);
          $n_grap = mysql_num_rows($query_grap);

          if($n_grap==0){

             echo '<p><a href="nuevo_archivos.php?dp_id='.$_GET["dp_id"].'&estado=E"><button type="button" class="btn btn-warning">Agregar frente DNI</button></a></p>';

          } else {

              while($a_grap = mysql_fetch_array($query_grap)){
                echo '<p><a class="single-image" href="../imagenes/'.$a_grap["img_dni_name"].'"><img src="../imagenes/'.$a_grap["img_dni_name"].'" width="100%"></a></p>';

                    echo '<a href="nuevo_archivos.php?dp_id='.$_GET["dp_id"].'&estado=E"><button type="button" class="btn btn-warning">Modificar</button></a>';

                echo '<br><br>';
              }
          }

          $txt_grap1 = "select * from tb_imagenes where img_dp_id =".$_GET["dp_id"]." and img_front = 0";
          $query_grap1 = mysql_query($txt_grap1);
          $n_grap1 = mysql_num_rows($query_grap1);

          if($n_grap1==0){


             echo '<p><a href="nuevo_archivos1.php?dp_id='.$_GET["dp_id"].'&estado=E"><button type="button" class="btn btn-warning">Agregar dorso DNI</button></a></p>';
          } else {

              while($a_grap1 = mysql_fetch_array($query_grap1)){
                echo '<p><a class="single-image" href="../imagenes/'.$a_grap1["img_dni_name"].'"><img src="../imagenes/'.$a_grap1["img_dni_name"].'" width="100%"></a></p>';

                    echo '<a href="nuevo_archivos1.php?dp_id='.$_GET["dp_id"].'&estado=E"><button type="button" class="btn btn-warning">Modificar</button></a>';

                echo '<br><br>';
              }
          }






          ?>
          <br><br>

      </div>
      </div>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-3">

      <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-home"></span>Miembros del Hogar</h3>
                </div>
                <div class="panel-body">

        <?php
        $hb_ho_id = BuscaRegistro ("tb_hogar_beneficiario", "hb_dp_id", $_GET["dp_id"], "hb_ho_id");
        $query_hogar = mysql_query("select * from tb_hogar_beneficiario where hb_ho_id = '$hb_ho_id'");
        while($a_hogar = mysql_fetch_array($query_hogar)){
            $n_dp_id = $a_hogar['hb_dp_id'];
            $n_parent = BuscaRegistroM ("tb_datos_personales", "dp_id", $n_dp_id, "dp_parentesco");

          echo '<p>'.BuscaRegistroM ("tb_datos_personales", "dp_id", $n_dp_id, "dp_name").'</p>';
        }


        ?>
        <br>
      <a href="nuevo_familiares.php?dp_id=<?php echo $_GET["dp_id"]; ?>&ho_id=<?php echo $hb_ho_id; ?>&estado=E"><button type="button" class="btn btn-danger">Modificar</button></a>

      </div>
      </div>

      </div>

      <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span>Datos Educativos</h3>
                </div>
                <div class="panel-body">
                    <strong>Nivel educativo alcanzado: </strong>
                    <table class="table table-striped">
                    <?php
                    $txt_ne = "select * from tb_datos_nivel_educativo where dne_dp_id = ".$_GET["dp_id"];
                    $query_ne = mysql_query($txt_ne);
                    while($a_ne = mysql_fetch_array($query_ne)){
                        echo '<tr>';
                          echo '<td>'.BuscaRegistroM ("tb_nivel_educativo", "ne_id", $a_ne["dne_nivel"], "ne_name").'</td>';
                          echo '<td>'.BuscaRegistroM ("tb_estado_titulo", "et_id", $a_ne["dne_termino"], "et_name").'</td>';
                          echo '<td>'.BuscaRegistroM ("tb_titulo_secundario", "ts_id", $a_ne["dne_titulo"], "ts_name").'</td>';
                        echo '</tr>';
                    }
                    ?>
                    </table>

                    <strong>Formacion Profesional - Cursos Realizados: </strong>
                    <table class="table table-striped">
                    <?php
                    $ttx = "select * from tb_beneficiario_formacion_profesional INNER JOIN tb_formacion_profesional ON tb_beneficiario_formacion_profesional.bfp_fp_id = tb_formacion_profesional.fp_id INNER JOIN tb_situaciones_curso ON tb_beneficiario_formacion_profesional.bfp_situacion = tb_situaciones_curso.sc_id where tb_beneficiario_formacion_profesional.bfp_dp_id = ".$_GET['dp_id'];
            $list = mysql_query($ttx);
            while($lis_dat = mysql_fetch_array($list)){
                        echo '<tr>';
                          echo '<td>'.strtoupper(utf8_encode($lis_dat['fp_name'])).'</td>';
                          echo '<td>'.strtoupper(utf8_encode($lis_dat['sc_name'])).'</td>';
                          echo '<td>'.strtoupper(utf8_encode($lis_dat['bfp_year'])).'</td>';
                        echo '</tr>';
                    }
                    ?>
                    </table>


                   <strong>Idiomas que maneja: </strong>
                    <table class="table table-striped">
                    <?php
                    $ttx2 = "select * from tb_beneficiario_idioma where bi_dp_id = ".$_GET['dp_id'];
                    $list2 = mysql_query($ttx2);
                    while($lis_dat2 = mysql_fetch_array($list2)){
                        echo '<tr>';

                          echo '<td>'.(BuscaRegistroM ("tb_idiomas", "idi_id", $lis_dat2['bi_idi_id'], "idi_name")).'</td>';
                          echo '<td>'.utf8_encode(BuscaRegistroM ("tb_niveles_idiomas", "ni_id", $lis_dat2['bi_nivel'], "ni_name")).'</td>';
                        echo '</tr>';
                    }
                    ?>
                    </table>
                    <strong>Permisos / Licencias / Matriculas </strong>
                    <table class="table table-striped">
          <thead>
            <tr>
              <th>Licencia</th>
              <th>Vencimiento</th>
              <th>Entidad Emisora</th>
              <th>Lugar</th>


            </tr>
           </thead>
           <tbody>
           <?php
                    $ttx_lic = "select * from tb_licencias_beneficiario where lb_dp_id = ".$_GET['dp_id'];
                    $list_lic = mysql_query($ttx_lic);
                    while($lis_dat_lic = mysql_fetch_array($list_lic)){
                    ?>
                  <tr><td><?php echo
                    utf8_encode(BuscaRegistroM ("tb_licencias", "lic_id", $lis_dat_lic['lb_lic_id'], "lic_name")); ?></td>
                    <td><?php echo fecha_dev ($lis_dat_lic['lb_vencimiento']); ?></td>
                    <td><?php echo strtoupper(utf8_encode ($lis_dat_lic['lb_emisora'])); ?></td>

                    <td><?php echo
                    utf8_encode(BuscaRegistroM ("tb_localidades_pais", "loc_id", $lis_dat_lic['lb_municipio'], "loc_name")).', '.utf8_encode(BuscaRegistro ("tb_provincias", "pr_id", $lis_dat_lic['lb_provincia'], "pr_name")); ?></td>

                    </tr>
                    <?php
                    }
                    ?>

            </tbody>
      </table>
                    <p>Manejo de PC: <strong><?php
                    $ru = BuscaRegistro ("tb_datos_educativos", "de_dp_id", $_GET["dp_id"], "de_pc");
                    echo BuscaRegistroM ("tb_manejo_pc", "mp_id", $ru, "mp_name");
                    ?></strong></p>

                    <p>Desea seguir estudiando: <strong><?php
                    $co = BuscaRegistro ("tb_datos_educativos", "de_dp_id", $_GET["dp_id"], "de_continuar");
                    echo SiNoM ($co);
                    ?></strong></p>
                    <p>Observaciones: <i><?php echo BuscaRegistroM ("tb_datos_educativos", "de_dp_id", $_GET["dp_id"], "de_observaciones"); ?></i></p>
                    <p>Fecha de Carga: <b><?php echo fecha_dev(BuscaRegistro ("tb_datos_educativos", "de_dp_id", $_GET["dp_id"], "de_fecha_actualizacion")); ?></b></p>
                    <a href="nuevo_registro1.php?dp_id=<?php echo $_GET["dp_id"]; ?>"><button type="button" class="btn btn-success">Modificar</button></a>

                </div>
              </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-wrench"></span>Historia Laboral</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <?php
$ttx = "select * from tb_antecedentes_laborales where al_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<tr><td><?php echo BuscaRegistroM ("tb_tipo_trabajo", "tt_id", $lis_dat['al_tipo_trabajo'], "tt_name"); ?></td><td><?php echo fecha_dev($lis_dat['al_in']); ?></td><td><?php if($lis_dat['al_actual'] != 1){ echo fecha_dev($lis_dat['al_out']);} ?></td><td><?php echo $lis_dat['al_lugar_trabajo']; ?></td><td><?php echo BuscaRegistroM ("tb_puestos", "pu_id", $lis_dat['al_puesto'], "pu_name"); ?></td>
</tr>
<?php
}
?>
                    </table>
                   <a href="nuevo_registro2.php?dp_id=<?php echo $_GET["dp_id"]; ?>&em_id=<?php echo $em_id; ?>&acc=M"><button type="button" class="btn btn-info">Modificar</button></a>
                </div>
              </div>
        </div>

       <!-- comienza postulaciones -->
      <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-road"></span>Postulaciones</h3>
                </div>
                <div class="panel-body">
               <p> <strong>Postulaciones Laborales: </strong> </p>
                    <table class="table table-striped">
                        <?php
$ttx = "select * from tb_postulaciones_laborales where pl_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<tr><td><?php echo BuscaRegistroM ("tb_puestos", "pu_id", $lis_dat['pl_puesto'], "pu_name"); ?></td>
</tr>
<?php
}
?>
                    </table>

        <p>  <strong>Postulaciones a Cursos: </strong> </p>
        <table class="table table-striped">
                        <?php
$ttx = "select * from tb_postulaciones_cursos where pc_dp_id = ".$_GET['dp_id'];
$list = mysql_query($ttx);
while($lis_dat = mysql_fetch_array($list)){
?>
<tr><td><?php echo BuscaRegistroM ("tb_formacion_profesional", "fp_id", $lis_dat['pc_curso'], "fp_name"); ?></td>
</tr>
<?php
}
?>
                    </table>
                   <a href="nuevo_registro_postulaciones.php?dp_id=<?php echo $_GET["dp_id"]; ?>&em_id=<?php echo $em_id; ?>&acc=M"><button type="button" class="btn btn-warning">Modificar</button></a>
                </div>
              </div>
        </div>

       <!-- fin postulaciones -->

      <!-- comienza discapacidad -->
      <div class="col-xs-12 col-sm-6 col-md-3">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-book"></span>Discapacidad</h3>
                </div>
                <div class="panel-body">
               <p> <strong>Tiene Discapacidad: <?php echo SiNo(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tiene_discapacidad")); ?></strong> </p>

            <?php if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tiene_discapacidad")==1){ ?>

        <p>  <strong>Nro de CUD: <?php echo BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_nro_cud"); ?></strong> </p>
        <p>  <strong>Ley que Certifica: <?php echo BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_ley_cud"); ?></strong> </p>
        <?php if(!empty(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_descripcion_cud"))){
          ?>
          <p>  <strong>Descripcion del Certificado: <?php echo BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_descripcion_cud"); ?></strong> </p>
        <?php } ?>
        <p>  <strong>Vigencia Desde: <?php echo fecha_dev(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_desde_cud")); ?></strong> </p>
        <p>  <strong>Vigencia Hasta: <?php echo fecha_dev(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_vencimiento_cud")); ?></strong> </p>
        <?php
        if(!empty(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_ente_cud"))){
          ?>
          <p>  <strong>Ente Certificador: <?php echo BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_ente_cud"); ?></strong> </p>
          <?php
        }
        ?>
         <?php
        if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tipo_discapacidad")>0){
          $td_id = BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tipo_discapacidad");
          $td_name = BuscaRegistro ("tb_tipo_discapacidad", "td_id", $td_id, "td_name");
          ?>
          <p>  <strong>Tipo de discapacidad: <?php echo $td_name; ?></strong> </p>
          <?php
        }
        ?>
        <?php
         if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_origen_discapacidad")>0){
          $od_id = BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_origen_discapacidad");
          $od_name = BuscaRegistro ("tb_origen_discapacidad", "od_id", $od_id, "od_name");
          ?>
          <p>  <strong>Origen de discapacidad: <?php echo $od_name; ?></strong> </p>
          <?php
        }
        ?>
         <?php
         if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tipo_retraso")>0){
          $tr_id = BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_tipo_retraso");
          $tr_name = BuscaRegistro ("tb_tipo_retraso", "tr_id", $tr_id, "tr_name");
          ?>
          <p>  <strong>Tipo de Retraso: <?php echo $tr_name; ?></strong> </p>
          <?php
        }
        ?>
        <?php
         if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_situacion_discapacidad")>0){
          $sd_id = BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_situacion_discapacidad");
          $sd_name = BuscaRegistro ("tb_situacion_discapacidad", "sd_id", $sd_id, "sd_name");
          ?>
          <p>  <strong>Situación de Discapacidad: <?php echo $sd_name; ?></strong> </p>
          <?php
        }
        ?>
         <?php
        if(NroRegistro ("tb_ayudas_discapacidad", "ad_dp_id", $_GET['dp_id'])>0){
         echo '<p><strong>Ayudas Necesarias</strong></p>';
              echo '<ul>';
                $tx_aids = "select * from tb_ayudas_discapacidad where ad_dp_id =".$_GET['dp_id'];
                $query_aids = mysql_query($tx_aids);
                while($data_aids = mysql_fetch_array($query_aids)){
                  echo '<li>'.BuscaRegistro ("tb_discapacidad_ayuda_tecnica", "dat_id", $data_aids['ad_dat_id'], "dat_name").'</li>';
                }
              echo '</ul>';
        }
        ?>

        <?php
        if(!empty(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_descripcion_diagnostico"))){
          ?>
          <p>  <strong>Descripción del Diagnóstico:</strong> <?php echo utf8_decode(BuscaRegistro("tb_datos_salud", "ds_dp_id", $_GET['dp_id'], "ds_descripcion_diagnostico")); ?> </p>
          <?php
        }
        ?>

            <?php } ?>

                   <a href="nuevo_registro_discapacidad.php?dp_id=<?php echo $_GET["dp_id"]; ?>&em_id=<?php echo $em_id; ?>&acc=M"><button type="button" class="btn btn-danger">Modificar</button></a>
                </div>
              </div>
        </div>

       <!-- fin discapacidad -->

    </div>

<!-- fin row 2 -->
       </div>

       </div>

<div id="gr2">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-save"></span> Prestaciones Propias</h3>
                </div>
                <div class="panel-body">
                 <?php 
                    $txt_pres_p = "SELECT * FROM tbp_prestaciones_beneficiarios INNER JOIN tbp_prestaciones ON tbp_prestaciones_beneficiarios.pb_pre_id = tbp_prestaciones.pre_id INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones.pre_pr_id = tbp_prestaciones_lista.tbp_pr_id WHERE (tbp_prestaciones_beneficiarios.pb_dp_id = '".$_GET['dp_id']."' and tbp_prestaciones_lista.tbp_sis_id = '".$_SESSION['sistema']."')";
                    $query_pre_p = mysql_query($txt_pres_p);
                    if(mysql_num_rows($query_pre_p)==0){
                        echo "<b> No hay prestaciones para mostrar </b>";
                    } else {
                      while($data_pre_p = mysql_fetch_array($query_pre_p)){
                       echo "<h4>".$data_pre_p['tbp_pr_name']." (".BuscaRegistro("tbp_prestacion_type","pt_id",$data_pre_p['tbp_pt_id'],"pt_name").")</h4>";
                       echo "<i>Agregado por :".BuscaRegistro("tb_usuarios","us_id",$data_pre_p['pre_us_id'],"us_name")." - En la fecha: ".$data_pre_p['pre_fecha_alta']."</i><br>";

                            switch ($data_pre_p['tbp_pt_id']) {
                              case '1':
                                echo "Motivo: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Entrevistador: <b>".$data_pre_p['pre_responsable']."</b> - Ubicación: <b>".$data_pre_p['pre_ubicacion']."</b> - Fecha: <b>".$data_pre_p['pre_fecha']."</b> - Hora: <b>".$data_pre_p['pre_hora']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                break;

                              case '2':
                                echo "Descripción: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Monto: <b>$ ".$data_pre_p['pre_monto']."</b> - Cuotas: <b>".$data_pre_p['pre_cuotas']."</b> - Fecha Inicio: <b>".$data_pre_p['pre_fecha']."</b> - Fecha Fin: <b>".$data_pre_p['pre_fecha_out']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                break;

                                 case '3':
                                echo "Tema: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Responsable: <b>".$data_pre_p['pre_responsable']."</b> - Ubicación: <b>".$data_pre_p['pre_ubicacion']."</b> - Fecha: <b>".$data_pre_p['pre_fecha']."</b> - Hora: <b>".$data_pre_p['pre_hora']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                break;

                              case '6':
                                echo "Motivo: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Lider: <b>".$data_pre_p['pre_responsable']."</b> - Ubicación: <b>".$data_pre_p['pre_ubicacion']."</b> - Fecha: <b>".$data_pre_p['pre_fecha']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                break;

                              case '7':
                                echo "Tema: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Responsable: <b>".$data_pre_p['pre_responsable']."</b> - Ubicación: <b>".$data_pre_p['pre_ubicacion']."</b> - Fecha: <b>".$data_pre_p['pre_fecha']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                break;

                              case '8':
                                echo "Responsable: <b>".$data_pre_p['pre_responsable']."</b> - Destino: <b>".$data_pre_p['pre_ubicacion']."</b><br>
                              Fecha: <b>".$data_pre_p['pre_fecha']."</b> - Hora de Salida: <b>".$data_pre_p['pre_hora']."</b> - Hora de llegada: <b>".$data_pre_p['pre_hora_out']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                break;

                              case '9':
                                echo "Tema: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Responsable: <b>".$data_pre_p['pre_responsable']."</b> - Ubicación: <b>".$data_pre_p['pre_ubicacion']."</b> - Fecha: <b>".$data_pre_p['pre_fecha']."</b> - Hora: <b>".$data_pre_p['pre_hora']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                break;

                               case '10':
                                echo "Descripción: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Monto: <b>$ ".$data_pre_p['pre_monto']."</b> - Cuotas: <b>".$data_pre_p['pre_cuotas']."</b> - Fecha Inicio: <b>".$data_pre_p['pre_fecha']."</b> - Fecha Fin: <b>".$data_pre_p['pre_fecha_out']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                break;

                              case '11':
                                echo "Descripción: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Monto: <b>$ ".$data_pre_p['pre_monto']."</b> - Cuotas: <b>".$data_pre_p['pre_cuotas']."</b> - Fecha Inicio: <b>".$data_pre_p['pre_fecha']."</b> - Fecha Fin: <b>".$data_pre_p['pre_fecha_out']."</b><br>";
                                echo "Responsable: <b>".$data_pre_p['pre_fam_responsable']."</b> - DNI del Responsable: <b>".$data_pre_p['pre_dni_responsable']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                break;

                               case '12':
                                echo "Motivo: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Asesor: <b>".$data_pre_p['pre_responsable']."</b> - Fecha: <b>".$data_pre_p['pre_fecha']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                break;

                                 case '13':
                                echo "Motivo: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Asistente: <b>".$data_pre_p['pre_responsable']."</b> - Fecha: <b>".$data_pre_p['pre_fecha']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                break;

                                 case '14':
                                echo "Motivo: <b>".$data_pre_p['pre_tema']."</b><br>";
                                echo "Visitador: <b>".$data_pre_p['pre_responsable']."</b> - Fecha: <b>".$data_pre_p['pre_fecha']."</b><br>";
                                echo "Observaciones: ".$data_pre_p['pre_observaciones'];
                                break;
                            }

                       echo "<hr>";
                      }
                    }
                  ?>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title"><span class="glyphicon glyphicon-share-alt"></span> Prestaciones de otras áreas</h3>
                </div>
                <div class="panel-body">
                <?php 
                    $txt_pres_n = "SELECT * FROM tbp_prestaciones_beneficiarios INNER JOIN tbp_prestaciones ON tbp_prestaciones_beneficiarios.pb_pre_id = tbp_prestaciones.pre_id INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones.pre_pr_id = tbp_prestaciones_lista.tbp_pr_id WHERE (tbp_prestaciones_beneficiarios.pb_dp_id = '".$_GET['dp_id']."' and tbp_prestaciones_lista.tbp_sis_id != '".$_SESSION['sistema']."' and tbp_prestaciones_lista.tbp_in_compartida = '1')";
                    $query_pre_n = mysql_query($txt_pres_n);
                    if(mysql_num_rows($query_pre_n)==0){
                        echo "<b> No hay prestaciones para mostrar </b>";
                    } else {
                      while($data_pre_n = mysql_fetch_array($query_pre_n)){
                       echo "<h4>".$data_pre_n['tbp_pr_name']." (".BuscaRegistro("tbp_prestacion_type","pt_id",$data_pre_n['tbp_pt_id'],"pt_name").")</h4>";
                       echo "<i>Agregado por :".BuscaRegistro("tb_usuarios","us_id",$data_pre_n['pre_us_id'],"us_name")." - En la fecha: ".$data_pre_n['pre_fecha_alta']."</i><br>";

                            switch ($data_pre_n['tbp_pt_id']) {
                              case '1':
                                echo "Motivo: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Entrevistador: <b>".$data_pre_n['pre_responsable']."</b> - Ubicación: <b>".$data_pre_n['pre_ubicacion']."</b> - Fecha: <b>".$data_pre_n['pre_fecha']."</b> - Hora: <b>".$data_pre_n['pre_hora']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                break;

                              case '2':
                                echo "Descripción: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Monto: <b>$ ".$data_pre_n['pre_monto']."</b> - Cuotas: <b>".$data_pre_n['pre_cuotas']."</b> - Fecha Inicio: <b>".$data_pre_n['pre_fecha']."</b> - Fecha Fin: <b>".$data_pre_n['pre_fecha_out']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                break;

                                 case '3':
                                echo "Tema: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Responsable: <b>".$data_pre_n['pre_responsable']."</b> - Ubicación: <b>".$data_pre_n['pre_ubicacion']."</b> - Fecha: <b>".$data_pre_n['pre_fecha']."</b> - Hora: <b>".$data_pre_n['pre_hora']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                break;

                              case '6':
                                echo "Motivo: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Lider: <b>".$data_pre_n['pre_responsable']."</b> - Ubicación: <b>".$data_pre_n['pre_ubicacion']."</b> - Fecha: <b>".$data_pre_n['pre_fecha']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                break;

                              case '7':
                                echo "Tema: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Responsable: <b>".$data_pre_n['pre_responsable']."</b> - Ubicación: <b>".$data_pre_n['pre_ubicacion']."</b> - Fecha: <b>".$data_pre_n['pre_fecha']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                break;

                              case '8':
                                echo "Responsable: <b>".$data_pre_n['pre_responsable']."</b> - Destino: <b>".$data_pre_n['pre_ubicacion']."</b><br>
                              Fecha: <b>".$data_pre_n['pre_fecha']."</b> - Hora de Salida: <b>".$data_pre_n['pre_hora']."</b> - Hora de llegada: <b>".$data_pre_n['pre_hora_out']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                break;

                              case '9':
                                echo "Tema: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Responsable: <b>".$data_pre_n['pre_responsable']."</b> - Ubicación: <b>".$data_pre_n['pre_ubicacion']."</b> - Fecha: <b>".$data_pre_n['pre_fecha']."</b> - Hora: <b>".$data_pre_n['pre_hora']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                break;

                               case '10':
                                echo "Descripción: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Monto: <b>$ ".$data_pre_n['pre_monto']."</b> - Cuotas: <b>".$data_pre_n['pre_cuotas']."</b> - Fecha Inicio: <b>".$data_pre_n['pre_fecha']."</b> - Fecha Fin: <b>".$data_pre_n['pre_fecha_out']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                break;

                              case '11':
                                echo "Descripción: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Monto: <b>$ ".$data_pre_n['pre_monto']."</b> - Cuotas: <b>".$data_pre_n['pre_cuotas']."</b> - Fecha Inicio: <b>".$data_pre_n['pre_fecha']."</b> - Fecha Fin: <b>".$data_pre_n['pre_fecha_out']."</b><br>";
                                echo "Responsable: <b>".$data_pre_n['pre_fam_responsable']."</b> - DNI del Responsable: <b>".$data_pre_n['pre_dni_responsable']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                break;

                               case '12':
                                echo "Motivo: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Asesor: <b>".$data_pre_n['pre_responsable']."</b> - Fecha: <b>".$data_pre_n['pre_fecha']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                break;

                                 case '13':
                                echo "Motivo: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Asistente: <b>".$data_pre_n['pre_responsable']."</b> - Fecha: <b>".$data_pre_n['pre_fecha']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                break;

                                 case '14':
                                echo "Motivo: <b>".$data_pre_n['pre_tema']."</b><br>";
                                echo "Visitador: <b>".$data_pre_n['pre_responsable']."</b> - Fecha: <b>".$data_pre_n['pre_fecha']."</b><br>";
                                echo "Observaciones: ".$data_pre_n['pre_observaciones'];
                                break;
                            }

                       echo "<hr>";
                      }
                    }
                  ?>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- fin contenido -->
</div>
<br><br><br><br><br><br>
<?php include("../recorte_gral/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>

  <script type="text/javascript" language="javascript" class="init">
  $(document).ready(function() {
  $("#gr2").hide();

     $("#ver1").click(function(){
         $("#ver1").addClass("active");
         $("#ver2").removeClass("active");

    $("#gr2").hide();
    $("#gr1").show();
    });

      $("#ver2").click(function(){
         $("#ver2").addClass("active");
         $("#ver1").removeClass("active");

    $("#gr1").hide();
    $("#gr2").show();
    });
});
  </script>
  <script type="text/javascript" language="javascript">
    $('#list_emprendedores').DataTable( {
        responsive: true
    } );
  </script>
  <script type="text/javascript" language="javascript" src="../js/navbar.js"></script>
  <script type="text/javascript" src="../source/jquery.fancybox.js?v=2.1.5"></script>
  <script type="text/javascript">
    $(document).ready(function() {
          $('.fancybox').fancybox();
      $("#fancybox-manual-b").click(function() {
        $.fancybox.open({
          href : 'iframe.html',
          type : 'iframe',
          padding : 5
        });
      });
        $(".fancybox").fancybox({
        afterClose  : function() {
            window.location.reload();
        }
    });
});
  </script>
</body>
</html>
