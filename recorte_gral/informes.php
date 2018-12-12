<?php
session_start();
include("../".$_SESSION["dir_sis"]."/secure.php");
include ("../conecta.php");
include ("../funciones/funciones_generales.php");
include ("../funciones/funciones_form.php");
$select_in = "select dp_id from tb_datos_personales INNER JOIN tb_beneficiarios_sistema ON tb_datos_personales.dp_id = tb_beneficiarios_sistema.bs_dp_id where (tb_beneficiarios_sistema.bs_sis = '".$_SESSION["sistema"]."') group by tb_datos_personales.dp_id";
  $query_in = mysql_query($select_in);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo BuscaRegistro ("tb_sistemas", "sis_id", $_SESSION["sistema"], "sis_name"); ?>	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/estilos_ss.css">
  <link rel="stylesheet" type="text/css" href="../source/jquery.fancybox.css?v=2.1.5" media="screen" />
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
</head>
<body>
<?php include("encabezado.php"); ?>
<div class="container-fluid">
<?php include("../".$_SESSION["dir_sis"]."/recortes/navegacion.php"); ?>
  <!-- comienza contenido -->
</div>
<div class="container">
<input type="hidden" id="sistem" value="<?php echo $_SESSION['sistema']; ?>">
  
<!-- aca comienza el calendario -->
          
<h3>Nuevo Informe / Detalle</h3>    
<?php
$dia_anterior  = mktime(0, 0, 0, date("m"), date("d")-1,   date("Y"));
$dia_anterior = substr(date(DATE_ATOM,$dia_anterior),0,10).' 00:00:00';
$query_elimina_ensayos = mysql_query("select inl_id from tb_informes_listado where inl_fecha < '$dia_anterior' and inl_estado = '0'");
  while($ei = mysql_fetch_row($query_elimina_ensayos)){
     $inl_id = $ei[0];
     mysql_query("delete from tb_informes_listado_items where ili_inl_id = '$inl_id'");
     mysql_query("delete from tb_informes_listado_detalles where ild_inl_id = '$inl_id'");
     mysql_query("delete from tb_informes_listado where inl_id = '$inl_id'");
  }
?>
<!-- inicio de datos personales -->
<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
    Datos Personales a informar
  </h3>
</div>
<div class="panel-body">
    <form id="dp">
                          <div class="row">
                   
                <?php
                        $qu = mysql_query("select * from tb_tabulaciones where tab_table = 'tb_datos_personales'");
                        $nu = mysql_num_rows($qu);
                        while($a = mysql_fetch_array($qu)){
                      ?>
 <div class="col-xs-12 col-md-3">
                  <div class="form-group">

                  <div class="checkbox">
                   
                      <label>
                      <input type="checkbox" id="<?php echo $a['tab_id']; ?>" class="elemento"> 
                      <?php echo $a['tab_name']; ?></label>

                  </div>

                  </div>
</div>
                  <?php
                  }
                  ?>
                    </div>
                    <input id="cliqueados" type="hidden" value="0">
    </form>
            
</div>
<div id="falta_dp" class="requerido">Debe elegir al menos un dato personal </div>
</div>
<!-- fin de datos personales -->
<div class="form-group  has-success">
                  <label>Elija los Criterios que va a usar en el informe</label>
                  <select id="criterion" class="form-control">
                      <option></option>
                      <option>Sexo</option>
                      <option>Edades</option>
                      <option>Veterano de Malvinas</option>
                      <option>Familiar de Veterano de Malvinas</option>
                      <option>Pueblos Originarios</option>
                      <option>Barrio</option>
                      <option>CAAT</option>
                      <option>Nivel Educativo</option>
                      <option>Completo el Nivel Educativo</option>
                      <option>Titulos Alcanzados</option>
                      <option>Idiomas</option>
                      <option>Niveles de Idiomas</option>
                      <option>Permisos, Licencias y Matrículas</option>
                      <option>Manejo de PC</option>
                      <option>Desea seguir etudiando</option>
                      <option>Antecedentes Laborales - Puestos</option>
                      <option>Postulaciones a Cursos</option>
                      <option>Postulaciones a Puestos</option>
                      <option>Discapacidad</option>
                      <option>Tipo de Discapacidad</option>
                  </select>
            </div>


    <!--inicia sexo-->
      <div class="panel panel-info" id="datos_sexo">
  <div class="panel-heading">
  <h3 class="panel-title">
    Sexo
  </h3>
</div>
<div class="panel-body">
    <form>
    <div id="datasexo">
        <div class="row">
                <?php
                $q_sx = mysql_query("SELECT * FROM tb_datos_personales INNER JOIN tb_sexos ON tb_datos_personales.dp_sexo = tb_sexos.sx_id group by tb_sexos.sx_id");
                     //   $nu = mysql_num_rows($qu);
                        while($a_sx = mysql_fetch_array($q_sx)){
                      ?>
 <div class="col-xs-12 col-md-3">
                  <div class="form-group">

                  <div class="checkbox">
                   
                      <label>
                      <input type="checkbox" id="<?php echo $a_sx['sx_id']; ?>" class="elemento8"> 
                      <?php echo $a_sx['sx_name']; ?></label>

                  </div>

                  </div>
</div>
                  <?php
                  }
                  ?>
                  <!-- todos -->
  <div class="col-xs-12 col-md-3">
                  <div class="form-group">
                  <div class="checkbox">
                      <label>
                      <input type="checkbox" id="todos8" class="elemento8"> 
                      <b>Todos</b></label>
                  </div>
                  </div>
</div>
                  <!-- fin todos -->
        </div>
    </div>
    </form>
    </div>
    </div>

    <!--fin sexo-->

    <!--inicia edad-->
      <div class="panel panel-info" id="datos_edades">
  <div class="panel-heading">
  <h3 class="panel-title">
    Edades
  </h3>
</div>
<div class="panel-body">
    <form>
    <div id="dataedad">
        <div class="row">
                
 <div class="col-xs-12 col-md-6">
                  <div class="form-group">
                  <label>Desde:</label>
  <select class="form-control" id="edad_desde">
    <option></option>
    <?php
    $j = 0;
    while ($j < 101){
    echo '<option>'.$j.'</option>';
    $j++;
  }
  ?>
  </select>
                  </div>
</div>

<div class="col-xs-12 col-md-6">
                  <div class="form-group">
                  <label>Hasta:</label>
  <select class="form-control" id="edad_hasta">
  <option></option>
    <?php
    $i = 0;
    while ($i < 101){
    echo '<option>'.$i.'</option>';
    $i++;
  }
  ?>
    
  </select>
                  </div>
</div>
           
                  
        </div>
    </div>
    </form>
    </div>
    </div>

    <!--fin edad-->

     <!--inicia veterano-->
      <div class="panel panel-info" id="datos_veterano">
  <div class="panel-heading">
  <h3 class="panel-title">
    Veterano de Malvinas
  </h3>
</div>
<div class="panel-body">
    <form>
    <div id="dataveterano">
        <div class="row">
                
 <div class="col-xs-12 col-md-6">
                  <div class="form-group">
                  <div class="checkbox">
                      <label>
                      <input type="checkbox" id="1" class="elemento10"> 
                      Es Veterano</label>
                  </div>
                  </div>
</div>

<div class="col-xs-12 col-md-6">
                  <div class="form-group">
                  <div class="checkbox">
                      <label>
                      <input type="checkbox" id="0" class="elemento10"> 
                      No es Veterano</label>
                  </div>
                  </div>
</div>
                 
                  
        </div>
    </div>
    </form>
    </div>
    </div>

    <!--fin veterano-->

    <!--inicia veterano-->
      <div class="panel panel-info" id="datos_famveterano">
  <div class="panel-heading">
  <h3 class="panel-title">
    Es familiar de un veterano de Malvinas
  </h3>
</div>
<div class="panel-body">
    <form>
    <div id="datafamveterano">
        <div class="row">
                
 <div class="col-xs-12 col-md-6">
                  <div class="form-group">
                  <div class="checkbox">
                      <label>
                      <input type="checkbox" id="1" class="elemento11"> 
                      Es familiar</label>
                  </div>
                  </div>
</div>

<div class="col-xs-12 col-md-6">
                  <div class="form-group">
                  <div class="checkbox">
                      <label>
                      <input type="checkbox" id="0" class="elemento11"> 
                      No es familiar</label>
                  </div>
                  </div>
</div>
                 
                  
        </div>
    </div>
    </form>
    </div>
    </div>

    <!--fin veterano-->

    <!--inicia pueblos originarios-->
      <div class="panel panel-info" id="datos_pueblos_originarios">
  <div class="panel-heading">
  <h3 class="panel-title">
    Se reconoce perteneciente a un Pueblo Originario
  </h3>
</div>
<div class="panel-body">
    <form>
    <div id="datapueblooriginario">
        <div class="row">
                <?php
                $q_po = mysql_query("SELECT * FROM tb_datos_personales INNER JOIN tb_beneficiarios_sistema ON tb_datos_personales.dp_id = tb_beneficiarios_sistema.bs_dp_id INNER JOIN tb_pueblos_originarios ON tb_datos_personales.dp_nombre_pueblo_originario = tb_pueblos_originarios.po_id WHERE tb_beneficiarios_sistema.bs_sis = '".$_SESSION["sistema"]."' group by tb_pueblos_originarios.po_id");
                     //   $nu = mysql_num_rows($qu);
                        while($a_po = mysql_fetch_array($q_po)){
                      ?>
 <div class="col-xs-12 col-md-3">
                  <div class="form-group">

                  <div class="checkbox">
                   
                      <label>
                      <input type="checkbox" id="<?php echo $a_po['po_id']; ?>" class="elemento12"> 
                      <?php echo $a_po['po_name']; ?></label>

                  </div>

                  </div>
</div>
                  <?php
                  }
                  ?>
                  
        </div>
    </div>
    </form>
    </div>
    </div>

    <!--fin pueblos originarios-->

    <!--inicia barrios-->
      <div class="panel panel-info" id="datos_barrios">
  <div class="panel-heading">
  <h3 class="panel-title">
    Barrios
  </h3>
</div>
<div class="panel-body">
    <form>
    <div id="databarrios">
        <div class="row">
                <?php
                $q_ba = mysql_query("SELECT * FROM tb_datos_personales INNER JOIN tb_hogar_beneficiario ON tb_datos_personales.dp_id = tb_hogar_beneficiario.hb_dp_id INNER JOIN tb_hogar ON tb_hogar_beneficiario.hb_ho_id = tb_hogar.ho_id INNER JOIN tb_domicilios ON tb_hogar.ho_dom_id = tb_domicilios.dom_id WHERE tb_domicilios.dom_barrio != 0 group by tb_domicilios.dom_barrio");

           //     $q_ba = mysql_query("SELECT * FROM tb_datos_personales INNER JOIN tb_beneficiarios_sistema ON tb_datos_personales.dp_id = tb_beneficiarios_sistema.bs_dp_id INNER JOIN tb_hogar_beneficiario ON tb_datos_personales.dp_id = tb_hogar_beneficiario.hb_dp_id INNER JOIN tb_hogar ON tb_hogar_beneficiario.hb_ho_id = tb_hogar.ho_id INNER JOIN tb_domicilios ON tb_hogar.ho_dom_id = tb_domicilios.dom_id WHERE tb_beneficiarios_sistema.bs_sis = '".$_SESSION["sistema"]."' group by tb_domicilios.dom_barrio");
                     //   $nu = mysql_num_rows($qu);
                        while($a_ba = mysql_fetch_array($q_ba)){
                      ?>
 <div class="col-xs-12 col-md-3">
                  <div class="form-group">

                  <div class="checkbox">
                   
                      <label>
                      <input type="checkbox" id="<?php echo $a_ba['dom_barrio']; ?>" class="elemento13"> 
                      <?php echo BuscaRegistro("tb_barrios_gloc","bar_id",$a_ba['dom_barrio'],"bar_name"); ?></label>

                  </div>

                  </div>
</div>
                  <?php
                  }
                  ?>
                  
        </div>
    </div>
    </form>
    </div>
    </div>

    <!--fin barrios-->

    <!--inicia caat-->
      <div class="panel panel-info" id="datos_caat">
  <div class="panel-heading">
  <h3 class="panel-title">
    CAATs
  </h3>
</div>
<div class="panel-body">
    <form>
    <div id="datacaat">
        <div class="row">
                <?php
                $q_ca = mysql_query("SELECT * FROM tb_datos_personales INNER JOIN tb_hogar_beneficiario ON tb_datos_personales.dp_id = tb_hogar_beneficiario.hb_dp_id INNER JOIN tb_hogar ON tb_hogar_beneficiario.hb_ho_id = tb_hogar.ho_id INNER JOIN tb_domicilios ON tb_hogar.ho_dom_id = tb_domicilios.dom_id WHERE tb_domicilios.dom_caat != 0 group by tb_domicilios.dom_caat");

           //     $q_ba = mysql_query("SELECT * FROM tb_datos_personales INNER JOIN tb_beneficiarios_sistema ON tb_datos_personales.dp_id = tb_beneficiarios_sistema.bs_dp_id INNER JOIN tb_hogar_beneficiario ON tb_datos_personales.dp_id = tb_hogar_beneficiario.hb_dp_id INNER JOIN tb_hogar ON tb_hogar_beneficiario.hb_ho_id = tb_hogar.ho_id INNER JOIN tb_domicilios ON tb_hogar.ho_dom_id = tb_domicilios.dom_id WHERE tb_beneficiarios_sistema.bs_sis = '".$_SESSION["sistema"]."' group by tb_domicilios.dom_barrio");
                     //   $nu = mysql_num_rows($qu);
                        while($a_ca = mysql_fetch_array($q_ca)){
                      ?>
 <div class="col-xs-12 col-md-3">
                  <div class="form-group">

                  <div class="checkbox">
                   
                      <label>
                      <input type="checkbox" id="<?php echo $a_ca['dom_caat']; ?>" class="elemento14"> 
                      <?php echo BuscaRegistro("tb_caats","ca_id",$a_ca['dom_caat'],"ca_name"); ?></label>

                  </div>

                  </div>
</div>
                  <?php
                  }
                  ?>
                  
        </div>
    </div>
    </form>
    </div>
    </div>

    <!--fin caat-->

<!-- inicio nivel educativo -->
<div class="panel panel-info" id="nivel_educativo">
  <div class="panel-heading">
  <h3 class="panel-title">
    Nivel Educativo
  </h3>
</div>
<div class="panel-body">
    <form>
    <div id="dataniveleducativo">
        <div class="row">
                <?php
             //   $q_ne = mysql_query("SELECT * from tb_nivel_educativo INNER JOIN tb_beneficiarios_sistema ON tb_datos_personales.dp_id = tb_beneficiarios_sistema.bs_dp_id INNER JOIN tb_datos_nivel_educativo ON tb_nivel_educativo.ne_id = tb_datos_nivel_educativo.dne_nivel WHERE tb_beneficiarios_sistema.bs_sis = '".$_SESSION["sistema"]."' group by tb_datos_nivel_educativo.dne_nivel");
                $q_ne = mysql_query("SELECT * from tb_nivel_educativo INNER JOIN tb_datos_nivel_educativo ON tb_nivel_educativo.ne_id = tb_datos_nivel_educativo.dne_nivel group by tb_datos_nivel_educativo.dne_nivel");
                     //   $nu = mysql_num_rows($qu);
                        while($a_ne = mysql_fetch_array($q_ne)){
                      ?>
 <div class="col-xs-12 col-md-3">
                  <div class="form-group">

                  <div class="checkbox">
                   
                      <label>
                      <input type="checkbox" id="<?php echo $a_ne['ne_id']; ?>" class="elemento4"> 
                      <?php echo $a_ne['ne_name']; ?></label>

                  </div>

                  </div>
</div>
                  <?php
                  }
                  ?>
                  <!-- todos -->
  <div class="col-xs-12 col-md-3">
                  <div class="form-group">
                  <div class="checkbox">
                      <label>
                      <input type="checkbox" id="todos4" class="elemento4" name="todos4"> 
                      <b>Todos</b></label>
                  </div>
                  </div>
</div>
<!--
 <div class="col-xs-12 col-md-3">
                  <div class="form-group">
                  <div class="checkbox">
                      <label>
                      <input type="checkbox" id="ninguno4" class="elemento4"> 
                      <b>Sin Datos</b></label>
                  </div>
                  </div>
</div>
-->
                  <!-- fin todos -->
        </div>
    </div>
    </form>
    </div>
    </div>


<!-- fin nivel educativo -->

<!-- inicio completo educativo -->
<div class="panel panel-info" id="completo_nivel">
  <div class="panel-heading">
  <h3 class="panel-title">
    Completo el Nivel Educativo
  </h3>
</div>
<div class="panel-body">
    <form>
    <div id="datacompletonivel">
        <div class="row">
                <?php
             //   $q_et = mysql_query("SELECT * from tb_estado_titulo INNER JOIN tb_beneficiarios_sistema ON tb_datos_personales.dp_id = tb_beneficiarios_sistema.bs_dp_id INNER JOIN tb_datos_nivel_educativo ON tb_estado_titulo.et_id = tb_datos_nivel_educativo.dne_termino WHERE tb_beneficiarios_sistema.bs_sis = '".$_SESSION["sistema"]."' group by tb_datos_nivel_educativo.dne_termino");
                $q_et = mysql_query("SELECT * from tb_estado_titulo INNER JOIN tb_datos_nivel_educativo ON tb_estado_titulo.et_id = tb_datos_nivel_educativo.dne_termino group by tb_datos_nivel_educativo.dne_termino");
                     //   $nu = mysql_num_rows($qu);
                        while($a_et = mysql_fetch_array($q_et)){
                      ?>
 <div class="col-xs-12 col-md-3">
                  <div class="form-group">

                  <div class="checkbox">
                   
                      <label>
                      <input type="checkbox" id="<?php echo $a_et['et_id']; ?>" class="elemento5"> 
                      <?php echo $a_et['et_name']; ?></label>

                  </div>

                  </div>
</div>
                  <?php
                  }
                  ?>
                  <!-- todos -->
  <div class="col-xs-12 col-md-3">
                  <div class="form-group">
                  <div class="checkbox">
                      <label>
                      <input type="checkbox" id="todos5" class="elemento5"> 
                      <b>Todos</b></label>
                  </div>
                  </div>
</div>
                  <!-- fin todos -->
        </div>
    </div>
    </form>
    </div>
    </div>

<!-- fin completo educativo -->

<!-- inicio de carreras -->
<div class="panel panel-info" id="titulo_carrera">
  <div class="panel-heading">
  <h3 class="panel-title">
    Titulos Alcanzados
  </h3>
</div>
<div class="panel-body">
    <form>
    <div id="datacarreras">
    <div id="tabas">No ha elegido el Nivel Educativo</div>
   
    
                          <div class="row">
                          <div id="listado_carreras"></div>
                    
               
                  
                    </div>
                    </div>
    </form>
</div>
</div>

<!-- fin de carreras -->



<!-- inicio idioma -->
<div class="panel panel-info" id="idiomas">
  <div class="panel-heading">
  <h3 class="panel-title">
    Idiomas
  </h3>
</div>
<div class="panel-body">
    <form>
    <div id="dataidiomas">
        <div class="row">
                <?php
                $q_idi = mysql_query("SELECT * from tb_idiomas INNER JOIN tb_beneficiario_idioma ON tb_idiomas.idi_id = tb_beneficiario_idioma.bi_idi_id group by tb_beneficiario_idioma.bi_idi_id");
                     //   $nu = mysql_num_rows($qu);
                        while($a_idi = mysql_fetch_array($q_idi)){
                      ?>
 <div class="col-xs-12 col-md-3">
                  <div class="form-group">

                  <div class="checkbox">
                   
                      <label>
                      <input type="checkbox" id="<?php echo $a_idi['idi_id']; ?>" class="elemento6"> 
                      <?php echo $a_idi['idi_name']; ?></label>

                  </div>

                  </div>
</div>
                  <?php
                  }
                  ?>
                  <div class="col-xs-12 col-md-3">
                  <div class="form-group">
                  <div class="checkbox">
                      <label>
                      <input type="checkbox" id="todos6" class="elemento6"> 
                      <b>Todos</b></label>
                  </div>
                  </div>
</div>
        </div>
    </div>
    </form>
    </div>
    </div>

<!-- fin idioma -->

<!-- inicio nivel idioma -->
<div class="panel panel-info" id="niveles_idiomas">
  <div class="panel-heading">
  <h3 class="panel-title">
    Niveles de Idiomas
  </h3>
</div>
<div class="panel-body">
    <form>
    <div id="dataidiomasnivel">
        <div class="row">
                <?php
                $q_nidi = mysql_query("SELECT * from tb_niveles_idiomas INNER JOIN tb_beneficiario_idioma ON tb_niveles_idiomas.ni_id = tb_beneficiario_idioma.bi_nivel group by tb_beneficiario_idioma.bi_nivel");
                     //   $nu = mysql_num_rows($qu);
                        while($a_nidi = mysql_fetch_array($q_nidi)){
                      ?>
 <div class="col-xs-12 col-md-3">
                  <div class="form-group">

                  <div class="checkbox">
                   
                      <label>
                      <input type="checkbox" id="<?php echo $a_nidi['ni_id']; ?>" class="elemento7"> 
                      <?php echo $a_nidi['ni_name']; ?></label>

                  </div>

                  </div>
</div>
                  <?php
                  }
                  ?>
                  <div class="col-xs-12 col-md-3">
                  <div class="form-group">
                  <div class="checkbox">
                      <label>
                      <input type="checkbox" id="todos7" class="elemento7"> 
                      <b>Todos</b></label>
                  </div>
                  </div>
</div>
        </div>
    </div>
    </form>
    </div>
    </div>

<!-- fin nivel idioma -->

<!-- inicio licencias -->
<div class="panel panel-info" id="licencias">
  <div class="panel-heading">
  <h3 class="panel-title">
    Permisos, Licencias y Matriculas 
  </h3>
</div>
<div class="panel-body">
    <form>
    <div id="datalicencias">
        <div class="row">
                <?php
                $q_lic = mysql_query("SELECT * from tb_licencias INNER JOIN tb_licencias_beneficiario ON tb_licencias.lic_id = tb_licencias_beneficiario.lb_lic_id group by tb_licencias.lic_id");
                     //   $nu = mysql_num_rows($qu);
                        while($a_lic = mysql_fetch_array($q_lic)){
                      ?>
 <div class="col-xs-12 col-md-3">
                  <div class="form-group">

                  <div class="checkbox">
                   
                      <label>
                      <input type="checkbox" id="<?php echo $a_lic['lic_id']; ?>" class="elemento15"> 
                      <?php echo $a_lic['lic_name']; ?></label>

                  </div>

                  </div>
</div>
                  <?php
                  }
                  ?>
                 
        </div>
    </div>
    </form>
    </div>
    </div>

<!-- fin licencias -->

<!-- inicio PC -->
<div class="panel panel-info" id="manejo_pc">
  <div class="panel-heading">
  <h3 class="panel-title">
    Manejo de PC 
  </h3>
</div>
<div class="panel-body">
    <form>
    <div id="datapc">
        <div class="row">
                <?php
                $q_pc = mysql_query("SELECT * from tb_manejo_pc INNER JOIN tb_datos_educativos ON tb_manejo_pc.mp_id = tb_datos_educativos.de_pc group by tb_datos_educativos.de_pc");
                     //   $nu = mysql_num_rows($qu);
                        while($a_pc = mysql_fetch_array($q_pc)){
                      ?>
 <div class="col-xs-12 col-md-3">
                  <div class="form-group">

                  <div class="checkbox">
                   
                      <label>
                      <input type="checkbox" id="<?php echo $a_pc['mp_id']; ?>" class="elemento16"> 
                      <?php echo $a_pc['mp_name']; ?></label>

                  </div>

                  </div>
</div>
                  <?php
                  }
                  ?>
                 
        </div>
    </div>
    </form>
    </div>
    </div>

<!-- fin PC -->

<!-- inicio seguir estudiando -->
<div class="panel panel-info" id="seguir_estudiando">
  <div class="panel-heading">
  <h3 class="panel-title">
    Desea seguir estudiando? 
  </h3>
</div>
<div class="panel-body">
    <form>
    <div id="datase">
        <div class="row">
               
 <div class="col-xs-12 col-md-6">
                  <div class="form-group">

                  <div class="checkbox">
                   
                      <label>
                      <input type="checkbox" id="1" class="elemento17"> 
                      Si</label>

                  </div>

                  </div>
</div>

<div class="col-xs-12 col-md-6">
                  <div class="form-group">

                  <div class="checkbox">
                   
                      <label>
                      <input type="checkbox" id="0" class="elemento17"> 
                      No</label>

                  </div>

                  </div>
</div>
                  
                 
        </div>
    </div>
    </form>
    </div>
    </div>

<!-- fin seguir estudiando -->

<!-- inicio de antecedentes laboreales puestos -->
<div class="panel panel-info" id="antecedentes_laborales_puestos">
  <div class="panel-heading">
  <h3 class="panel-title">
    Antecedentes Laborales - Puestos
  </h3>
</div>
<div class="panel-body">
    <form>
    <div id="dataantecedentespuesto">
    <ul class="nav nav-tabs">
    <?php
    $query3 = mysql_query("SELECT pu_id, pu_name, SUBSTRING(pu_name, 1,1) as inicial, COUNT(pu_name)
FROM tb_puestos INNER JOIN tb_antecedentes_laborales ON tb_antecedentes_laborales.al_puesto = tb_puestos.pu_id
GROUP BY SUBSTRING(tb_puestos.pu_name, 1,1)");
    while($alfa3 = mysql_fetch_array($query3)){
      echo '<li><a href="#" class="list3" id="'.$alfa3['inicial'].'">'.strtoupper($alfa3['inicial']).'</a></li>';
    }
    ?>
</ul>
                          <div class="row">
                          <div id="listado_postulaciones3"></div>
                    
               
                  
                    </div>
                    </div>
    </form>
</div>
</div>

<!-- fin de antecedentes laborales puestos -->

<div class="panel panel-info" id="postulaciones_cursos">
  <div class="panel-heading">
  <h3 class="panel-title">
    Postulaciones a Cursos
  </h3>
</div>
<div class="panel-body">
    <form>
    <div id="datapostulacioncursos">
    <ul class="nav nav-tabs">
    <?php
    $query1 = mysql_query("SELECT fp_id, fp_name, SUBSTRING(fp_name, 1,1) as inicial, COUNT(fp_name)
FROM tb_formacion_profesional INNER JOIN tb_postulaciones_cursos ON tb_postulaciones_cursos.pc_curso = tb_formacion_profesional.fp_id
GROUP BY SUBSTRING(tb_formacion_profesional.fp_name, 1,1)");
    while($alfa1 = mysql_fetch_array($query1)){
      echo '<li><a href="#" class="list1" id="'.$alfa1['inicial'].'">'.strtoupper($alfa1['inicial']).'</a></li>';
    }
    ?>
</ul>
                    <div class="row">
                          <div id="listado_postulaciones1"></div>
                    </div>
                    </div>
    </form>
</div>
</div>

<!-- fin de postulaciones a cursos -->
<!-- inicio de postulaciones a puestos -->
<div class="panel panel-info" id="postulaciones_puestos">
  <div class="panel-heading">
  <h3 class="panel-title">
    Postulaciones a Puestos
  </h3>
</div>
<div class="panel-body">
    <form>
    <div id="datapostulacionpuesto">
    <ul class="nav nav-tabs">
    <?php
    $query2 = mysql_query("SELECT pu_id, pu_name, SUBSTRING(pu_name, 1,1) as inicial, COUNT(pu_name)
FROM tb_puestos INNER JOIN tb_postulaciones_laborales ON tb_postulaciones_laborales.pl_puesto = tb_puestos.pu_id
GROUP BY SUBSTRING(tb_puestos.pu_name, 1,1)");
    while($alfa2 = mysql_fetch_array($query2)){
      echo '<li><a href="#" class="list2" id="'.$alfa2['inicial'].'">'.strtoupper($alfa2['inicial']).'</a></li>';
    }
    ?>
</ul>
                          <div class="row">
                    <div id="listado_postulaciones2"></div>
                
                  
                    </div>
                    </div>
    </form>
</div>
</div>

<!-- fin de postulaciones a puestos -->

<!-- inicio discapacidad-->
<div class="panel panel-info" id="discapacidad">
  <div class="panel-heading">
  <h3 class="panel-title">
    Posee alguna discapacidad 
  </h3>
</div>
<div class="panel-body">
    <form>
    <div id="datadisc">
        <div class="row">
               
 <div class="col-xs-12 col-md-6">
                  <div class="form-group">

                  <div class="checkbox">
                   
                      <label>
                      <input type="checkbox" id="1" class="elemento18"> 
                      Si</label>

                  </div>

                  </div>
</div>

<div class="col-xs-12 col-md-6">
                  <div class="form-group">

                  <div class="checkbox">
                   
                      <label>
                      <input type="checkbox" id="0" class="elemento18"> 
                      No</label>

                  </div>

                  </div>
</div>
                  
                 
        </div>
    </div>
    </form>
    </div>
    </div>

<!-- fin discapacidad -->

<!-- inicio tipo discapacidad-->
<div class="panel panel-info" id="tipo_discapacidad">
  <div class="panel-heading">
  <h3 class="panel-title">
    Tipo de discapacidad 
  </h3>
</div>
<div class="panel-body">
    <form>
    <div id="datatipodisc">
        <div class="row">

               <?php
                $q_td = mysql_query("SELECT * FROM tb_datos_personales INNER JOIN tb_beneficiarios_sistema ON tb_datos_personales.dp_id = tb_beneficiarios_sistema.bs_dp_id INNER JOIN tb_datos_salud ON tb_datos_personales.dp_id = tb_datos_salud.ds_dp_id WHERE (tb_beneficiarios_sistema.bs_sis = '".$_SESSION["sistema"]."' and tb_datos_salud.ds_tipo_discapacidad != 0) group by tb_datos_salud.ds_tipo_discapacidad");
                     //   $nu = mysql_num_rows($qu);
                        while($a_td = mysql_fetch_array($q_td)){
                      ?>
 <div class="col-xs-12 col-md-3">
                  <div class="form-group">

                  <div class="checkbox">
                   
                      <label>
                      <input type="checkbox" id="<?php echo $a_td['ds_tipo_discapacidad']; ?>" class="elemento19"> 
                      <?php echo BuscaRegistro("tb_tipo_discapacidad","td_id",$a_td['ds_tipo_discapacidad'],"td_name"); ?></label>

                  </div>

                  </div>
</div>
      <?php } ?>

                  
                 
        </div>
    </div>
    </form>
    </div>
    </div>

<!-- fin tipo discapacidad -->


          <form method="post" action="tools/inicia_informe.php" role="form">
            <div class="form-group   has-success">
    <label for="titulo">Titulo del Informe</label>
    <input type="text" class="form-control" id="titulo"
           placeholder="escriba el titulo del informe" name="inl_titulo">
  </div>
  <input type="hidden" id="usuario" value="<?php echo $_SESSION['id_us']; ?>" >
<input type="hidden" id="nro_informe" name="inl_id">
<input type="hidden" name="accion" value="M" >
<div class="form-group">
  <button type="submit" class="btn btn-success" id="finalizar">Finalizar</button>
</div>

          </form>
<div id="contador" style="position:fixed !important; left:0px; top:50%; z-index:10 !important; width:120px; padding:10px; text-align: center; background: #ccc; font-size: 18px;"> <?php echo mysql_num_rows($query_in)." Personas"; ?> </div>
<br><br><br><br><br><br><br><br><br>
<?php include("../recorte_gral/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

 
  <script type="text/javascript" language="javascript">
    $(document).ready(function() {
     var usuario = $("#usuario").val();
       
     $.get("tools/inicia_informe.php",{usuario:usuario},function(datos){
        $("#nro_informe").val(datos);
     });
     $("#nivel_educativo").hide();
     $("#completo_nivel").hide();
     $("#titulo_carrera").hide();
     $("#idiomas").hide();
     $("#niveles_idiomas").hide();
     $("#antecedentes_laborales_puestos").hide();
     $("#postulaciones_cursos").hide();
     $("#postulaciones_puestos").hide();
     $("#datos_sexo").hide();
     $("#datos_edades").hide();
     $("#datos_veterano").hide();
     $("#datos_famveterano").hide();
     $("#datos_pueblos_originarios").hide();
     $("#datos_barrios").hide();
     $("#datos_caat").hide();
     $("#licencias").hide();
     $("#manejo_pc").hide();
     $("#seguir_estudiando").hide();
     $("#discapacidad").hide();
     $("#tipo_discapacidad").hide();

     $("#criterion").change(function(){
        switch( $("#criterion").val()){
            case 'Nivel Educativo':
            $("#nivel_educativo").show();
            break;

            case 'Completo el Nivel Educativo':
            $("#completo_nivel").show();
            break;

            case 'Titulos Alcanzados':
            $("#titulo_carrera").show();
            break;

            case 'Idiomas':
            $("#idiomas").show();
            break;

            case 'Niveles de Idiomas':
            $("#niveles_idiomas").show();
            break;

            case 'Antecedentes Laborales - Puestos':
            $("#antecedentes_laborales_puestos").show();
            break;

            case 'Postulaciones a Cursos':
            $("#postulaciones_cursos").show();
            break;

            case 'Postulaciones a Puestos':
            $("#postulaciones_puestos").show();
            break;

            case 'Sexo':
            $("#datos_sexo").show();
            break;

            case 'Edades':
            $("#datos_edades").show();
            break;

            case 'Veterano de Malvinas':
            $("#datos_veterano").show();
            break;

            case 'Familiar de Veterano de Malvinas':
            $("#datos_famveterano").show();
            break;

            case 'Pueblos Originarios':
            $("#datos_pueblos_originarios").show();
            break;

            case 'Barrio':
            $("#datos_barrios").show();
            break;

            case 'CAAT':
            $("#datos_caat").show();
            break;

             case 'Permisos, Licencias y Matrículas':
            $("#licencias").show();
            break;

            case 'Manejo de PC':
            $("#manejo_pc").show();
            break;

            case 'Desea seguir etudiando':
            $("#seguir_estudiando").show();
            break;

            case 'Discapacidad':
            $("#discapacidad").show();
            break;

            case 'Tipo de Discapacidad':
            $("#tipo_discapacidad").show();
            break;
        }
     });

     $(".elemento").click(function() {
    var informe = $("#nro_informe").val();
    var id_funcion = $(this).attr("id");
    $.get("tools/agrega_camposdp_informes.php", {informe: informe, id_funcion: id_funcion}, function(resultado){
        $("#cliqueados").val(resultado);
    });

    });

     $(".list1").click(function (){
                  var dat = $(this).attr('id');
                  var informe = $("#nro_informe").val();
                  $.get("tools/listado_postulaciones_cursos.php",{dat: dat, informe: informe, tabla:'tb_postulaciones_cursos'},function(vuelta){
                      $("#listado_postulaciones1").html(vuelta);
                  });
                  return false;
                });

     $("#listado_postulaciones1").on('click','.elemento1', function() {
      if( !$(this).is(':checked')){
              $("#todos1").prop('checked', false);
               }
        var sistem = $("#sistem").val();
       var informe = $("#nro_informe").val();
        var id_funcion = $(this).attr("id");
        if($("#todos1").is(':checked')){
              var todos = "todos1";
               }
         $.get("tools/agrega_items_informes.php", {informe: informe, id_funcion: id_funcion, tabla:'tb_postulaciones_cursos',inl_id:informe, todos: todos, sistem:sistem},function(contame){
        $("#contador").html(contame);
              });
      });


          $(".list2").click(function (){
                  var dat = $(this).attr('id');
                  var informe = $("#nro_informe").val();
                  $.get("tools/listado_postulaciones_laborales.php",{dat: dat, informe: informe, tabla:'tb_postulaciones_laborales'},function(vuelta){
                      $("#listado_postulaciones2").html(vuelta);
                  });
                  return false;
                });

          $("#listado_postulaciones2").on('click','.elemento2', function() {
            var sistem = $("#sistem").val();
       var informe = $("#nro_informe").val();
        var id_funcion = $(this).attr("id");
         $.get("tools/agrega_items_informes.php", {informe: informe, id_funcion: id_funcion, tabla:'tb_postulaciones_laborales',inl_id:informe, sistem:sistem},function(contame){         
        $("#contador").html(contame);
              });
      });

           $("#listado_postulaciones2").on('click','#todos2', function() {
              var elemento = $(".elemento2");
              elemento.prop("checked", true);
           });

      $(".list3").click(function (){
                  var dat = $(this).attr('id');
                  var informe = $("#nro_informe").val();
                  $.get("tools/listado_antecedentes_laborales.php",{dat: dat, informe: informe, tabla:'tb_antecedentes_laborales'},function(vuelta){
                      $("#listado_postulaciones3").html(vuelta);
                  });
                  return false;
                });

      $("#listado_postulaciones3").on('click','.elemento3', function() {
        if( !$(this).is(':checked')){
              $("#todos3").prop('checked', false);
               }
               var sistem = $("#sistem").val();
       var informe = $("#nro_informe").val();
        var id_funcion = $(this).attr("id");
        if($("#todos3").is(':checked')){
              var todos = "todos3";
               } 
         $.get("tools/agrega_items_informes.php", {informe: informe, id_funcion: id_funcion, tabla:'tb_antecedentes_laborales', variante:'al_puesto',inl_id:informe, todos: todos, sistem:sistem},function(contame){
        $("#contador").html(contame);
              });
      });

       $("#listado_postulaciones3").on('click','#todos3', function() {
              var elemento = $(".elemento3");
              elemento.prop("checked", true);
           });

       $(".elemento4").click(function() {
        if( !$(this).is(':checked')){
              $("#todos4").prop('checked', false);
               }
    var informe = $("#nro_informe").val();
    var id_funcion = $(this).attr("id");
    if($("#todos4").is(':checked')){
              var todos4 = "si";
               } 
    
    $.get("tools/tabs_carreras.php", {informe: informe, id_funcion: id_funcion, tabla:'tb_datos_nivel_educativo', variante:'dne_nivel',todos4:todos4}, function(tabs){
        VectorCadena = tabs.split('|');
        $("#tabas").html(VectorCadena[0]);
        $("#listado_carreras").html("");
         $("#contador").html(VectorCadena[1]);
    });
        
    });

       $("#tabas").on("click",".list_tit", function(){
         var dat = $(this).attr('id');
                  var informe = $("#nro_informe").val();
                  $.get("tools/listado_carreras.php",{dat: dat, informe: informe, tabla:'tb_datos_nivel_educativo'},function(vuelta){
                      $("#listado_carreras").html(vuelta);
                  });
          return false;
       });

       $("#listado_carreras").on('click','.elemento_car', function() {
        var sistem = $("#sistem").val();
       var informe = $("#nro_informe").val();
        var id_funcion = $(this).attr("id");
         $.get("tools/agrega_items_informes.php", {informe: informe, id_funcion: id_funcion, tabla:'tb_datos_nivel_educativo', variante:'dne_titulo', sistem:sistem},function(contame){
        $("#contador").html(contame);
              });
      });

       $(".elemento5").click(function() {
        if( !$(this).is(':checked')){
              $("#todos5").prop('checked', false);
               }
               var sistem = $("#sistem").val();
    var informe = $("#nro_informe").val();
    var id_funcion = $(this).attr("id");
    if($("#todos5").is(':checked')){
              var todos = "todos5";
               }
    $.get("tools/agrega_items_informes.php", {informe: informe, id_funcion: id_funcion, tabla:'tb_datos_nivel_educativo', variante:'dne_termino', todos: todos, sistem:sistem},function(contame){
        $("#contador").html(contame);
              });

    });
        $(".elemento6").click(function() {
          if( !$(this).is(':checked')){
              $("#todos6").prop('checked', false);
               }
              var sistem = $("#sistem").val();
    var informe = $("#nro_informe").val();
    var id_funcion = $(this).attr("id");
    if($("#todos6").is(':checked')){
              var todos = "todos6";
               }
    $.get("tools/agrega_items_informes.php", {informe: informe, id_funcion: id_funcion, tabla:'tb_beneficiario_idioma', variante:'bi_idi_id',inl_id:informe, todos: todos, sistem:sistem},function(contame){
        $("#contador").html(contame);
              });

    });

        $(".elemento7").click(function() {
          if( !$(this).is(':checked')){
              $("#todos7").prop('checked', false);
               }
               var sistem = $("#sistem").val();
    var informe = $("#nro_informe").val();
    var id_funcion = $(this).attr("id");
    if($("#todos7").is(':checked')){
              var todos = "todos7";
               }
    $.get("tools/agrega_items_informes.php", {informe: informe, id_funcion: id_funcion, tabla:'tb_beneficiario_idioma', variante:'bi_nivel',inl_id:informe, todos: todos, sistem:sistem},function(contame){
        $("#contador").html(contame);
              });

    });

        $(".elemento8").click(function() {
          if( !$(this).is(':checked')){
              $("#todos8").prop('checked', false);
               }
               var sistem = $("#sistem").val();
    var informe = $("#nro_informe").val();
    var id_funcion = $(this).attr("id");
    if($("#todos8").is(':checked')){
              var todos = "todos8";
               }
    $.get("tools/agrega_items_informes.php", {informe: informe, id_funcion: id_funcion, tabla:'tb_datos_personales', variante:'dp_sexo',inl_id:informe, todos: todos, sistem:sistem},function(contame){
        $("#contador").html(contame);
              });

    });

        $("#edad_hasta").on("change",EntreEdades);
        $("#edad_desde").on("change",EntreEdades);

        function EntreEdades (){
                var informe = $("#nro_informe").val();
                var nro_desde = $("#edad_desde").val();
                var nro_hasta = $("#edad_hasta").val();
                $.get("tools/agrega_items_informes.php", {informe: informe, desde: nro_desde, tabla:'tb_datos_personales',hasta:nro_hasta,inl_id:informe},function(contame){
        $("#contador").html(contame);
              });
         
      };

      $(".elemento10").click(function() {
        var sistem = $("#sistem").val();
    var informe = $("#nro_informe").val();
    var id_funcion = $(this).attr("id");
    $.get("tools/agrega_items_informes.php", {informe: informe, id_funcion: id_funcion, tabla:'tb_datos_personales', variante:'dp_veterano',inl_id:informe, sistem:sistem},function(contame){
        $("#contador").html(contame);
              });

    });

      $(".elemento11").click(function() {
        var sistem = $("#sistem").val();
    var informe = $("#nro_informe").val();
    var id_funcion = $(this).attr("id");
    $.get("tools/agrega_items_informes.php", {informe: informe, id_funcion: id_funcion, tabla:'tb_datos_personales', variante:'dp_fam_veterano',inl_id:informe, sistem:sistem},function(contame){
        $("#contador").html(contame);
              });

    });

      $(".elemento12").click(function() {
        var sistem = $("#sistem").val();
    var informe = $("#nro_informe").val();
    var id_funcion = $(this).attr("id");
    $.get("tools/agrega_items_informes.php", {informe: informe, id_funcion: id_funcion, tabla:'tb_datos_personales', variante:'dp_nombre_pueblo_originario',inl_id:informe, sistem:sistem},function(contame){
        $("#contador").html(contame);
              });

    });

        $("#todos1").click(function(){
            if($(this).is(':checked')){
              $("#datapostulacioncursos input[type=checkbox]").prop('checked', true);
               } 
        });

        $("#todos3").click(function(){
            if($(this).is(':checked')){
              $("#dataantecedentespuesto input[type=checkbox]").prop('checked', true);
               } 
        });

        $("#todos4").click(function(){
            if($(this).is(':checked')){
              $("#dataniveleducativo input[type=checkbox]").prop('checked', true);
               } 
        });

        $("#todos5").click(function(){
            if($(this).is(':checked')){
              $("#datacompletonivel input[type=checkbox]").prop('checked', true);
               } 
        });

        $("#todos6").click(function(){
            if($(this).is(':checked')){
              $("#dataidiomas input[type=checkbox]").prop('checked', true);
               } 
        });

        $("#todos7").click(function(){
            if($(this).is(':checked')){
              $("#dataidiomasnivel input[type=checkbox]").prop('checked', true);
               } 
        });

        $("#todos8").click(function(){
            if($(this).is(':checked')){
              $("#datasexo input[type=checkbox]").prop('checked', true);
               } 
        });

      $("#finalizar").click(function(){
          if($("#cliqueados").val()==0){
            $("#falta_dp").show();
            $("#dp").focus();
            return false;
          }
      });

  });
  </script>
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
  <script type="text/javascript" language="javascript" src="../js/navbar.js"></script>
</body>
</html>