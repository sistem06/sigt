<?php
if (!isset($_SESSION)) { session_start(); }
include("../".$_SESSION["dir_sis"]."/secure.php");
include ("../conecta.php");
include ("../funciones/funciones_generales.php");
include ("../funciones/funciones_form.php");
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

<!-- aca comienza el calendario -->

<div class="paso_in"> Datos Educativos de
<span class="nombre_emp">
<?php
echo DatoRegistro ('tb_datos_personales', 'dp_name', 'dp_id', $_GET['dp_id'], $conn).' ('.DatoRegistro ('tb_datos_personales', 'dp_nro_doc', 'dp_id', $_GET['dp_id'], $conn).')';
?>
</span>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-pencil"></span>  Datos Educativos</div>
  </h3>
      <div class="panel-body">
<form id="tabla1">
<table class="table table-striped">
	<thead>
	<tr>
	  <th>Nivel Alcanzado</th>
	  <th>Situación</th>
	  <th>Modalidad</th>
	  <th>Titulo Obtenido</th>
	  <th></th>
	</tr>
	</thead>
	<tbody>
	<?php
	$ttx = "select * from tb_datos_nivel_educativo where dne_dp_id = ".$_GET['dp_id'];
	$list = mysql_query($ttx);
	while($lis_dat = mysql_fetch_array($list)){
	?>
	<tr><td><?php echo BuscaRegistro ("tb_nivel_educativo", "ne_id", $lis_dat['dne_nivel'], "ne_name"); ?></td>
		  <td><?php echo BuscaRegistro ("tb_estado_titulo", "et_id", $lis_dat['dne_termino'], "et_name"); ?></td>
			<td><?php echo BuscaRegistro ("tb_modalidad_cursado", "mc_id", $lis_dat['dne_modalidad'], "mc_name"); ?></td>
			<td><?php echo BuscaRegistro ("tb_titulo_secundario", "ts_id", $lis_dat['dne_titulo'], "ts_name"); ?></td>
			<td>
				<a href="tools/quitar.php?val=<?php echo $lis_dat['dne_id']; ?>&id=dne_id&tabla=tb_datos_nivel_educativo"  title="eliminar"
				class="fancybox fancybox.iframe" id="quita_titulo">
				<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>
			</td>
	</tr>
	<?php
	}
	?>
	</tbody>
</table>
<button type="button" class="btn btn-warning" id="muestra_form_edu"><span class="glyphicon glyphicon-plus"></span>Agregar</button>
</form>

<div id="forma_educativa" style="background: #E0F0F4; padding: 10px; display: none;">

<form id="parte1" action="add_registro.php" method="post" role="form">
<div class="row">
  <div class="col-xs-12 col-md-3">
  	<div class="form-group">
			<?php echo SelectGeneral("dne_nivel", "form-control", "denivel", "Nivel alcanzado:", "tb_nivel_educativo", "ne_id", "ne_name"); ?>
  		<div class="requerido" id="falta_nivel">Falta completar este campo</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-3">
		<div id="aa1" style="display:none;">
		    <div class="form-group">
					<?php echo SelectGeneral("dne_termino", "form-control", "determino", "Completo este nivel:", "tb_estado_titulo", "et_id", "et_name"); ?>
		  		<div class="requerido" id="falta_estado">Falta completar este campo</div>
				</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-3">
		<div id="aa3" style="display:none;">
		  <div class="form-group">
				<?php echo SelectGeneral("dne_modalidad", "form-control", "modalidad", "Modalidad:", "tb_modalidad_cursado", "mc_id", "mc_name"); ?>
		  </div>
		</div>
	</div>
	<div class="col-xs-12 col-md-3">
		<div id="aa2" style="display:none;">
			<div class="form-group">
				<label>Titulo Alcanzado:</label>
				<input type="text" name="titulo_gral" class="form-control" id="titulogral" placeholder="escriba el titulo" autocomplete="off">
				<div id="listado_titulos" class="listado_rubros"></div>
			  <div class="requerido" id="falta_titulo">Falta completar este campo</div>
			</div>
		</div>
	</div>
</div>

<button type="submit" class="btn btn-success" id="envia1">Agregar</button>
<input type="hidden" id="valor_titulo" name="valor_titulo">
<input type="hidden" name="paso" value="2002">
<input type="hidden" name="dne_dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION['id_us']; ?>">
</form>
</div>

<a href="tools/cambios_carreras.php"  id="agrega_carrera" class="fancybox fancybox.iframe" style="display:none;">nueva carrera</a>
</div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-pushpin"></span>  Formación Profesional - Cursos </div>
  </h3>
  <div class="panel-body">
		<form id="tabla2">
      <table class="table table-striped">
          <thead>
            <tr>
              <th>Nombre del Curso</th>
              <th>Situación</th>
              <th>Año</th>
              <th></th>
            </tr>
           </thead>
           <tbody>
            <?php
      //      $ttx = "select * from tb_beneficiario_formacion_profesional INNER JOIN tb_formacion_profesional ON tb_beneficiario_formacion_profesional.bfp_fp_id = tb_formacion_profesional.fp_id INNER JOIN tb_situaciones_curso ON tb_beneficiario_formacion_profesional.bfp_situacion = tb_situaciones_curso.sc_id where tb_beneficiario_formacion_profesional.bfp_dp_id = ".$_GET['dp_id'];
            $ttx = "select * from tb_beneficiario_formacion_profesional where bfp_dp_id = ".$_GET['dp_id'];
            $list = mysql_query($ttx);
            while($lis_dat = mysql_fetch_array($list)){
            ?>
            <tr>
						  <td><?php echo BuscaRegistro ("tb_formacion_profesional", "fp_id", $lis_dat['bfp_fp_id'], "fp_name"); ?></td>
						  <td><?php echo (BuscaRegistro ("tb_situaciones_curso", "sc_id", $lis_dat['bfp_situacion'], "sc_name")); ?></td>
						  <td><?php echo $lis_dat['bfp_year']; ?> </td>
							<td><a href="tools/quitar.php?val=<?php echo $lis_dat['bfp_id']; ?>&id=bfp_id&tabla=tb_beneficiario_formacion_profesional"  title="eliminar" class="fancybox fancybox.iframe" id="quita_curso"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
            </tr>
            <?php
            }
            ?>
            </tbody>
      </table>
			<button type="button" class="btn btn-warning" id="muestra_form_fp"><span class="glyphicon glyphicon-plus"></span>Agregar</button>
		</form>

          <div id="cursos_propios" style="background: #E0F0F4; padding: 10px; display: none;">
              <form id="parte2" action="add_registro.php" method="post" role="form">
                <div class="row">
                <div class="col-xs-12 col-md-4">
                <div class="form-group">
                  <label>Curso:</label>
	                  <input type="text" name="bfp_fp_id" class="form-control" id="cursopropio" placeholder="escriba el curso" autocomplete="off">
	                  <div id="listado_cursos" class="listado_rubros"></div>
	                  <div class="requerido" id="falta_curso_propio">Falta completar este campo</div>
                </div>
                </div>
                <div class="col-xs-12 col-md-4">
                <div class="form-group">
                <?php echo SelectGeneral("bfp_situacion", "form-control", "situado", "Situación:", "tb_situaciones_curso", "sc_id", "sc_name"); ?>
                </div>
                </div>
                <div class="col-xs-12 col-md-4">
                <div class="form-group">
                <label>Año</label>
                <select name="bfp_year" class="form-control" id="motivoins">
                <option></option>
                   <?php
                   $ano = date("Y");
                      while($ano > 1959){
                        echo '<option value="'.$ano.'">'.$ano.'</option>';
                        $ano--;
                      }
                      ?>
                   </select>

                </div>
                </div>
                </div>
                <input type="hidden" name="paso" value="1005">
								<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
                <input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
                <button type="submit" class="btn btn-success" id="envia2">Agregar</button>
                <input type="hidden" name="valor_curso" id="valor_curso">
                </form>
                </div>


<a href="tools/cambios_cursos_fp.php"  id="agrega_curso_propio" class="fancybox fancybox.iframe" style="display:none;">nueva carrera</a>
</div>
</div>


<!-- comienza idiomas -->

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-globe"></span>  Idiomas </div>
  </h3>
  <div class="panel-body">
		<form id="tabla3">
      <table class="table table-striped">
          <thead>
            <tr>
              <th>Idioma</th>
              <th>Nivel</th>
              <th></th>
            </tr>
           </thead>
           <tbody>
                  <?php
                    $ttx = "select * from tb_beneficiario_idioma where bi_dp_id = ".$_GET['dp_id'];
                    $list = mysql_query($ttx);
                    while($lis_dat = mysql_fetch_array($list)){
                    ?>
                    <tr><td><?php echo
                    BuscaRegistro ("tb_idiomas", "idi_id", $lis_dat['bi_idi_id'], "idi_name"); ?></td><td><?php echo BuscaRegistro ("tb_niveles_idiomas", "ni_id", $lis_dat['bi_nivel'], "ni_name"); ?></td><td><a href="tools/quitar.php?val=<?php echo $lis_dat['bi_id']; ?>&id=bi_id&tabla=tb_beneficiario_idioma"  title="eliminar" class="fancybox fancybox.iframe" id="quita_idiomas"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                    </tr>
                    <?php
                    }
                    ?>

            </tbody>
      </table>
			<button type="button" class="btn btn-warning" id="muestra_cursos_idiomas"><span class="glyphicon glyphicon-plus"></span>Agregar</button>
		</form>

    <div id="cursos_idiomas" style="background: #E0F0F4; padding: 10px; display: none;">

    <form id="parte5" action="add_registro.php" method="post" role="form">
     	<div class="row">
        <div class="col-xs-12 col-md-6">
	        <div class="form-group">
	         	<?php echo SelectGeneralAccion("bi_idi_id", "form-control", "idioma_select", "Idioma:", "tb_idiomas", "idi_id", "idi_name", "Idiomas"); ?>
	        	<div class="requerido" id="falta_nombre_idioma">Falta completar este campo</div>
	        </div>
    		</div>
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
        			<?php echo SelectGeneral("bi_nivel", "form-control", "nivel_select", "Nivel:", "tb_niveles_idiomas", "ni_id", "ni_name"); ?>
        		</div>
        </div>
    	</div>
      <input type="hidden" name="paso" value="1105">
			<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
      <input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
      <button type="submit" class="btn btn-success" id="envia5">Agregar</button>
  	</form>


    </div>
    <a href="tools/cambios_idiomas.php"  id="agrega_idioma" class="fancybox fancybox.iframe" style="display:none;">nueva carrera</a>
    <a href="tools/cambios_cursos.php"  id="agrega_curso_externo" class="fancybox fancybox.iframe" style="display:none;">nueva carrera</a>
</div>
</div>

<!-- fin idiomas -->

<!-- inicia licencias -->
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">
    <span class="glyphicon glyphicon-credit-card"></span>  Permisos / Licencias / Matriculas
    </h3></div>
      <div class="panel-body">
				<form id="tabla4">
       <table class="table table-striped">
          <thead>
            <tr>
              <th>Licencia</th>
              <th>Vencimiento</th>
              <th>Entidad Emisora</th>
              <th>Provincia</th>
              <th>Municipalidad</th>
              <th></th>
            </tr>
           </thead>
           <tbody>
           <?php
                    $ttx_lic = "select * from tb_licencias_beneficiario where lb_dp_id = ".$_GET['dp_id'];
                    $list_lic = mysql_query($ttx_lic);
                    while($lis_dat_lic = mysql_fetch_array($list_lic)){
                    ?>
                  <tr><td><?php echo
                    (BuscaRegistro ("tb_licencias", "lic_id", $lis_dat_lic['lb_lic_id'], "lic_name")); ?></td>
                    <td><?php echo fecha_dev ($lis_dat_lic['lb_vencimiento']); ?></td>
                    <td><?php echo $lis_dat_lic['lb_emisora']; ?></td>
                    <td><?php echo
                    BuscaRegistro ("tb_provincias", "pr_id", $lis_dat_lic['lb_provincia'], "pr_name"); ?></td>
                    <td><?php echo
                    BuscaRegistro ("tb_localidades_pais", "loc_id", $lis_dat_lic['lb_municipio'], "loc_name"); ?></td>
                    <td><a href="tools/quitar.php?val=<?php echo $lis_dat_lic['lb_id']; ?>&id=lb_id&tabla=tb_licencias_beneficiario"  title="eliminar" class="fancybox fancybox.iframe" id="quita_licencia">
											<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                    </tr>
                    <?php
                    }
                    ?>

            </tbody>
      </table>
			<button type="button" class="btn btn-warning" id="muestra_licencias"><span class="glyphicon glyphicon-plus"></span>Agregar</button>
		</form>


       <div id="cursos_licencias" style="background: #E0F0F4; padding: 10px; display: none;">
             <form id="parte11" action="add_registro.php" method="post" role="form">
                <div class="row">

                  <div class="col-xs-12 col-md-4">
                    <div class="form-group">
                 <?php echo SelectGeneral("lb_lic_id", "form-control", "licencia_select", "Permisos / licencia / matrícula:", "tb_licencias", "lic_id", "lic_name"); ?>
                      <div class="requerido" id="falta_tipo_licencia">Falta completar este campo</div>
                    </div>
                 </div>

                 <div class="col-xs-12 col-md-4">
                    <div class="form-group">
                 <?php echo InputGeneral("date", "lb_vencimiento", "form-control", "vencimiento_canet", "vencimiento del carnet", "Vencimiento del Carnet:"); ?>
                    </div>
                 </div>

                 <div class="col-xs-12 col-md-4">
                    <div class="form-group">
                 <?php echo InputGeneral("text", "lb_emisora", "form-control", "entidad_emisora", "entidad emisora", "Entidad Emisora:"); ?>
                    </div>
                 </div>

                </div>

                <div class="row">

                    <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                 <?php echo SelectGeneral("lb_provincia", "form-control", "provincia_select", "Provincia:", "tb_provincias", "pr_id", "pr_name"); ?>
                    </div>
                 </div>

                 <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                    <label>Municipio:</label>
                    <select name="lb_municipio" id="id_municipio" class="form-control"></select>
                    </div>
                 </div>

                </div>

                <input type="hidden" name="paso" value="1205">
								<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
                <input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
                <button type="submit" class="btn btn-success" id="envia10">Agregar</button>
             </form>
       </div>

      </div>
</div>
<!-- fin licencias -->

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-list"></span>  Otros datos educativos</div>
  </h3>
  <div class="panel-body">
      <form id="parte4" action="add_registro.php" method="post" role="form">
<div class="row">
  <div class="col-xs-12 col-md-6">
            <div class="form-group">
            <?php echo SelectGeneralVal("de_pc", "form-control", "depc", "Manejo de PC:", "tb_manejo_pc", "mp_id", "mp_name",BuscaRegistro("tb_datos_educativos","de_dp_id",$_GET['dp_id'],"de_pc")); ?>
            </div>
  </div>

  <div class="col-xs-12 col-md-6">
  <div class="form-group">
  <label> Desea continuar estudiando: </label>
	<select name="de_continuar" class="form-control" id="idcontinua">

		<?php
			$continua = BuscaRegistro("tb_datos_educativos","de_dp_id",$_GET['dp_id'],"de_continuar");
		?>
		<option value=0 <?php if (!isset($continua)) {echo 'selected="selected"';} ?>></option>
		<option value=1 <?php if ($continua == 1) {echo 'selected="selected"';} ?>> Sí </option>
		<option value=2 <?php if ($continua == 2) {echo 'selected="selected"';} ?>> No </option>
 	</select>
  </div>
  </div>
  </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="form-group">
    <?php echo TextAreaGeneralVal("de_observaciones", "form-control", "observacionesId", "5", "Observaciones:", BuscaRegistro("tb_datos_educativos","de_dp_id",$_GET['dp_id'],"de_observaciones")); ?>
  </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="form-group">
    <?php echo InputGeneralVal("date","de_fecha_actualizacion", "form-control", "fechaactualizacion","actualizacion", "Fecha de Carga:", BuscaRegistro ("tb_datos_educativos", "de_dp_id", $_GET['dp_id'], "de_fecha_actualizacion")); ?>
  </div>
    </div>
</div>
            <button type="submit" class="btn btn-info" id="envia4">Guardar y Volver</button>
<input type="hidden" name="paso" value="444">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
      </form>
  </div>

</div>
</div>
<br><br><br><br>
<?php include("pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>


  <script type="text/javascript" language="javascript">
    $(document).ready(function() {

      if(!$("#decarnet").is(":checked")){
        $("#detipocarnet").prop('disabled', true);
        $("#vencimientocarnet").prop('disabled', true);
      }
      $("#decarnet").click(function(){
        if($("#decarnet").is(":checked")){
        $("#detipocarnet").prop('disabled', false);
        $("#vencimientocarnet").prop('disabled', false);
      } else {
         $("#detipocarnet").prop('disabled', true);
        $("#vencimientocarnet").prop('disabled', true);
      }

      });

      if(!$("#delibreta").is(":checked")){
        $("#vencimientolibreta").prop('disabled', true);
      }
      $("#delibreta").click(function(){
        if($("#delibreta").is(":checked")){
        $("#vencimientolibreta").prop('disabled', false);
      } else {
        $("#vencimientolibreta").prop('disabled', true);
      }

      });

      if(!$("#delibretaconstruccion").is(":checked")){
        $("#vencimientolibretaconstruccion").prop('disabled', true);
      }
      $("#delibretaconstruccion").click(function(){
        if($("#delibretaconstruccion").is(":checked")){
        $("#vencimientolibretaconstruccion").prop('disabled', false);
      } else {
        $("#vencimientolibretaconstruccion").prop('disabled', true);
      }

      });

       $("#parte1").submit(function(event) {
         if($("#denivel").val()==""){
                $("#falta_nivel").show();
                event.preventDefault();
              }
          // if($("#valor_titulo").val()=="" && $("#denivel").val() > 4){
          //   $("#falta_titulo").show();
          //   $("#falta_titulo").text("no ha elegido un elemento de la lista");
          //   event.preventDefault();
          // }
      });

       $("#parte2").submit(function(event) {
         if($("#cursopropio").val()==""){
                $("#falta_curso_propio").show();
                event.preventDefault();
              }
          if($("#valor_curso").val()==""){
            $("#falta_curso_propio").show();
            $("#falta_curso_propio").text("no ha elegido un elemento de la lista");
            event.preventDefault();
          }
      });

        $("#parte11").submit(function(event) {
         if($("#licencia_select").val()==""){
                $("#falta_tipo_licencia").show();
                event.preventDefault();
              }
      });


  $("#envia5").click(function() {
      if($("#idioma_select").val()==""){
      $("#falta_nombre_idioma").show();
      return false;
    }
  });

    $("#muestra_form_edu").click(function(){
        $("#forma_educativa").toggle();
    });
     $("#muestra_form_fp").click(function(){
        $("#cursos_propios").toggle();
    });
     $("#muestra_form_ce").click(function(){
        $("#cursos_externos").toggle();
    });
     $("#muestra_cursos_idiomas").click(function(){
        $("#cursos_idiomas").toggle();
    });

     $("#muestra_licencias").click(function(){
        $("#cursos_licencias").toggle();
    });

  $("#denivel").change(function () {
       $("#titulogral").val("");
      if ($(this).val()>3) {
      $("#aa1").show();
      $("#aa3").show();
        if ($(this).val()>4) {
            $("#aa2").show();
                $("#denivel option:selected").each(function () {
          var  elegido=$(this).val();

          /*  $.post("tools/titulos.php", { elegido: elegido }, function(data){
            $("#titulogral").html(data);
            });   */

            // busca titulo
                 $("#titulogral").keyup(function(){
              if($("#titulogral").val().length>1){
                $("#listado_titulos").show();
                $('#envia1').attr("disabled", false);
                  $.post("tools/titulos.php",{busca: $("#titulogral").val(),elegido:elegido}, function(htmlexterno){
                      $("#listado_titulos").html(htmlexterno);
                  });

                   $("#listado_titulos").on("click", ".cada_elemento a", function(){
                    var dato = $(this).attr("value");
                        $("#titulogral").val(dato);
                        $("#listado_titulos").hide();
                        $("#falta_titulo").hide();
                        if(dato=="Agregar"){
                              $("#agrega_carrera").trigger("click");
                        }
                        $.post("tools/titulos1.php",{nivel: $("#denivel").val(), titulo: $("#titulogral").val()},function(result){
                    $("#valor_titulo").val(result);
                });
                        return false;
                  });
             } else {
                $("#listado_titulos").hide();
                $("#valor_titulo").val("");
              }
          });

            // fin busca titulo
        });

        } else {
          $("#aa2").hide();
        }
      } else {
      $("#aa1").hide();
      $("#aa3").hide();
      }
      });
  /* $("#titulogral").change(function(){
      if($("#titulogral").val()=="Agregar"){
          $("#agrega_carrera").trigger("click");
      }

    });*/

    $.post("tools/curso_propio.php",  function(datacurso){
            $("#cursopropio").html(datacurso);
            });

    $("#cursopropio").keyup(function(){
              if($("#cursopropio").val().length>1){
                $("#listado_cursos").show();
                $('#envia2').attr("disabled", false);
                  $.post("tools/curso_propio.php",{busca: $("#cursopropio").val()}, function(htmlexterno){
                      $("#listado_cursos").html(htmlexterno);

                  });

                   $("#listado_cursos").on("click", ".cada_elemento a", function(){
                    var dato = $(this).attr("value");
                        $("#cursopropio").val(dato);
                        $("#listado_cursos").hide();
                        $("#falta_curso_propio").hide();
                        if(dato=="Agregar"){
                              $("#agrega_curso_propio").trigger("click");
                        }
                        $.post("tools/curso_propio1.php",{curso: $("#cursopropio").val()},function(result){

                    $("#valor_curso").val(result);


                });
                        return false;
                  });
              } else {
                $("#listado_cursos").hide();
                 $("#valor_curso").val("");
              }
          });
     $.post("tools/curso_externo.php",  function(datacursoex){
            $("#cursoexterno").html(datacursoex);
            });

     $("#cursopropio").change(function(){
      if($("#cursopropio").val()=="Agregar"){
          $("#agrega_curso_propio").trigger("click");
      }
    });

     $("#cursoexterno").change(function(){
      if($("#cursoexterno").val()=="Agregar"){
          $("#agrega_curso_externo").trigger("click");
      }
    });

     $("#idioma_select").change(function(){
      if($("#idioma_select").val()=="Agregar"){
          $("#agrega_idioma").trigger("click");
      }
    });

     $("#provincia_select").change(function () {
                $("#provincia_select option:selected").each(function () {
            elegido=$(this).val();
            $.post("tools/localidades_pais.php", { elegido: elegido }, function(data){
            $("#id_municipio").html(data);
            });
        });
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
        $("#agrega_carrera").fancybox({
        afterClose  : function() {
          //  $.post("tools/titulos.php", { elegido: elegido }, function(data){
            $("#titulogral").val("");
          //  });

        }
    });
        $("#agrega_curso_propio").fancybox({
        afterClose  : function() {
       //     $.post("tools/curso_propio.php",  function(datacurso){
            $("#cursopropio").val("");
       //     });

        }
    });

        $("#agrega_curso_externo").fancybox({
        afterClose  : function() {
            $.post("tools/curso_externo.php",  function(datacursoex){
            $("#cursoexterno").html(datacursoex);
            });

        }
    });

        $("#agrega_idioma").fancybox({
        afterClose  : function() {
            window.location.reload();
        }
    });

        $("#quita_curso_externo").fancybox({
        afterClose  : function() {
            window.location.reload();
        }
    });

        $("#quita_titulo").fancybox({
        afterClose  : function() {
            window.location.reload();
        }
    });

        $("#quita_curso").fancybox({
        afterClose  : function() {
            window.location.reload();
        }
    });

        $("#quita_idiomas").fancybox({
        afterClose  : function() {
            window.location.reload();
        }
    });

         $("#quita_licencia").fancybox({
        afterClose  : function() {
            window.location.reload();
        }
    });
});
  </script>

<script type="text/javascript" language="javascript" src="../js/navbar.js"></script>
</body>
</html>
