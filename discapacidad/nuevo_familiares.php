<?php
include("secure.php");
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
<?php include("../recorte_gral/encabezado.php"); ?>
<div class="container-fluid">
<?php include("recortes/navegacion.php"); ?>
	<!-- comienza contenido -->
</div>
<div class="container">

<div class="paso_in">
<span class="nombre_emp">
<?php
echo "Miembros del Hogar de ".DatoRegistro ('tb_datos_personales', 'dp_name', 'dp_id', $_GET['dp_id'], $conn).' ('.DatoRegistro ('tb_datos_personales', 'dp_nro_doc', 'dp_id', $_GET['dp_id'], $conn).')';
?>
</span>

</div>
<?php
  $tx_m = "select * from tb_hogar_beneficiario where (hb_ho_id = '".$_GET['ho_id']."' and hb_dp_id != '".$_GET['dp_id']."')";
  $query_m = mysql_query($tx_m);
  $num_m = mysql_num_rows($query_m);
  if($num_m == 0){
  ?>
<div class="panel panel-danger">
  <div class="panel-heading">
  <h3 class="panel-title">No se ha agregado ningun Miembro a este Hogar</h3></div>
</div>
<?php
  } else {
?>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Parentesco</th>
      <th>Quitar</th>
    <tr>
  </thead>
  <tbody>
    <?php
    while($ar_m = mysql_fetch_array($query_m)){
      $hb_dp_id = $ar_m['hb_dp_id'];
      $par_id = DatoRegistro ('tb_datos_personales', 'dp_parentesco', 'dp_id', $hb_dp_id, $conn);
      echo '<tr>';
        echo '<td>'.DatoRegistro ('tb_datos_personales', 'dp_name', 'dp_id', $hb_dp_id, $conn).'</td>';
        echo '<td>'.DatoRegistro ('tb_parentesco', 'par_name', 'par_id', $par_id, $conn).'</td>';
        echo '<td><a href="tools/quitar.php?val='.$hb_dp_id.'&id=hb_dp_id&tabla=tb_hogar_beneficiario"  title="eliminar" class="fancybox fancybox.iframe"><button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a></td>';
      echo '</tr>';
    }
    ?>
  </tbody>
</table>
<?php
  }
  ?>
<button class="btn btn-warning" id="addfamiliar">Agregar Miembro</button>

<form id="parte2" action="tools/add_registro.php" method="post" role="form">
<br>
<button type="submit" class="btn btn-info" id="envia2">Continuar al siguiente paso</button>
<input type="hidden" name="paso" value="101">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
 </form>



<div style="display:none;" id="datos_familiar">
      <h3>Nuevo Miembro</h3>
<!-- aca comienza el calendario -->
          


<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-user"></span>  Datos Personales</div>
  </h3></div>

<form id="parte1" action="tools/add_registro.php" method="post" role="form">

<div class="row">
  <div class="col-xs-12 col-md-6">
  <div class="form-group has-success">
   <?php echo InputGeneral("text", "dp_apellido", "form-control", "idapellido", "escriba el apellido", "Apellido:",""); ?>
<div class="requerido" id="falta_apellido">Falta completar este campo</div>
</div>
   </div>
   <div class="col-xs-12 col-md-6">
   <div class="form-group has-success">
   <?php echo InputGeneral("text", "dp_nombre", "form-control", "idnombre", "escriba el nombre", "Nombre:",""); ?>
<div class="requerido" id="falta_nombre">Falta completar este campo</div>
</div>
   </div>
   </div>
   <div class="row">
  <div class="col-xs-12 col-md-4">
   <div class="form-group">
   <?php echo SelectGeneral("dp_tipo_doc", "form-control", "idtipodoc", "Tipo de documento:","tb_docs", "do_id", "do_name"); ?>
<div class="requerido" id="falta_tipo_doc">Falta completar este campo</div>
</div>
   </div>
   <div class="col-xs-12 col-md-4">
   <div class="form-group">
    <label for="nrodni">Nro de Documento:</label>
    <input type="text" class="form-control" id="nrodni" name="dp_nro_doc"
           placeholder="escriba el nro de Documento" maxlength="8">
    <div class="requerido" id="falta_dni">Falta completar este campo o nro incorrecto</div>
    
    </div>
   </div>
   <div class="col-xs-12 col-md-4">
  <div class="form-group has-success">
   <?php echo SelectGeneral("dp_parentesco", "form-control", "dpparentesco", "Parentesco:","tb_parentesco", "par_id", "par_name"); ?>
   <div class="requerido" id="falta_parentesco">Falta completar este campo</div>
  </div>
   </div>
   </div>

<div class="row">
  <div class="col-xs-12 col-md-3">
<div class="form-group">
   <?php echo InputGeneral("date", "dp_nacimiento", "form-control", "nacim", "aaaa/mm/dd", "Fecha de Nacimiento:",""); ?>
   <div class="requerido" id="falta_nacim">Falta completar este campo</div>
  </div>
  </div>
  <div class="col-xs-12 col-md-3">
      
      <div class="form-group">
  <label class="control-label" for="has-success">Edad</label>
  <input type="text" class="form-control" id="muestra_edad" disabled="disabled">
</div>
  </div>
  
  <div class="col-xs-12 col-md-3">
  <div class="form-group">
   <?php echo SelectGeneral("dp_sexo", "form-control", "idsexo", "Sexo:","tb_sexos", "sx_id", "sx_name"); ?>
  </div>
</div>
  <div class="col-xs-12 col-md-3">
  <div class="form-group">
   <?php echo SelectGeneral("dp_estado_civil", "form-control", "dpestadocivil", "Estado Civil:","tb_estado_civil", "ec_id", "ec_name"); ?>
  </div>
</div>
</div>
<!-- Comienza Cuil -->

    
  <div class="form-group">
  <label for="nrocuil">Nro de CUIL:</label>
    <input type="text" class="form-control" id="nrocuil" name="dp_cuil"
           placeholder="escriba el nro de CUIL" maxlength="13">
    <div class="requerido" id="falta_cuil">Falta completar este campo o nro incorrecto</div>
    </div>
    
    <div class="form-group">
 <a href="https://micuilonline.com.ar/averiguar-cuil-cuit" target="blank"><button type="button" class="btn btn-warning">Ver en ANSES</button></a>
     </div>
<!-- Comienza Cuil -->
<div class="row">
  
  <div class="col-xs-12 col-md-4">
  <div class="form-group">
    <?php echo SelectGeneral("dp_nacionalidad", "form-control", "idnacionalidad", "Nacionalidad:","tb_tipo_nacionalidad", "tn_id", "tn_name"); ?>
  </div>
</div>
<div class="col-xs-12 col-md-4">
  <div class="form-group">
   <?php echo SelectGeneral("dp_pais_nacimiento", "form-control", "idpaisnacimiento", "Pais de nacimiento:","tb_paises", "pa_id", "pa_name"); ?>
  </div>
</div>
<div class="col-xs-12 col-md-4">
  

<div class="form-group">
   <?php echo InputGeneral("tel", "dp_anos_residencia", "form-control", "anos_residencia", "Años de residencia en el pais", "Años de Residencia:",""); ?>
  </div>

</div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-phone"></span>  Comunicación</div>
  </h3>
</div>



<div class="row">
  <div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneral("tel", "dp_telefono", "form-control", "nrotel", "escriba el nro de telefono", "Teléfono fijo:",""); ?>
  </div>
  </div>
<div class="col-xs-12 col-md-4">
  <div class="form-group">
   <?php echo InputGeneral("text", "dp_movil", "form-control", "nrocelu", "escriba el nro de celular", "Teléfono Celular:",""); ?>
  </div>
</div>
<div class="col-xs-12 col-md-4">
<div class="form-group">
   <?php echo InputGeneral("text", "dp_mail", "form-control", "dpmail", "escriba el correo electronico", "Correo Electrónico:",""); ?>
  </div>
</div>
</div>





<button type="submit" class="btn btn-info" id="envia1">Agregar</button>
</div>
<input type="hidden" name="paso" value="100">
<input type="hidden" name="ho_id" value="<?php echo $_GET['ho_id']; ?>">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
</form>
  <!-- fin contenido -->
  
</div>
</div>
<br><br><br><br><br><br><br><br>

<?php include("../recorte_gral/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../source/jquery.fancybox.js?v=2.1.5"></script>

 
  <script type="text/javascript" language="javascript">
    $(document).ready(function() {

      $("#parte1").keypress(function(e) {
          if (e.which == 13) {
          return false;
          }
      });

      $("#envia1").click(function() {
        if($("#idapellido").val()==""){
          $("#falta_apellido").show();
          $("#idapellido").focus();
          return false;
        }
         if($("#idnombre").val()==""){
          $("#falta_nombre").show();
          $("#idnombre").focus();
          return false;
        }
        if($("#dpparentesco").val()== ""){
          $("#falta_parentesco").show();
          $("#dpparentesco").focus();
          return false;
        }
      });

      $("#nrodni").keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });
      $("#anos_residencia").keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });

       $("#idnacionalidad").change(function(){
        if($("#idnacionalidad").val() == 1){
          $("#idpaisnacimiento").attr('disabled','disabled');
          $("#anos_residencia").attr('disabled','disabled');
        } else {
            $("#idpaisnacimiento").removeAttr('disabled','disabled');
            $("#anos_residencia").removeAttr('disabled','disabled');
        }
    });
      $("#nrodni").focusout(function() {
        if($("#nrodni").val().length == 8) {
              $.get("tools/comprobar_ben.php", {dnii: $("#nrodni").val(), tabla: "tb_datos_personales", valorbusc: "dp_nro_doc"}, function(respuesta){
                    if (respuesta == "B"){
                        $(".yasta").show();
                        $('#envia1').attr("disabled", true);
                    } 
                    if (respuesta == "A"){
                        $(".yasta").hide();
                        $('#envia1').attr("disabled", false);
                    }
                    if (respuesta != "B" && respuesta != "A"){
                        var res = respuesta.split("|");
                        $(".yasta").show();
                        $('.yasta').html('Con el nro de documento ingresado ya esta en el sistema '+res[1]+' <a href="tools/agrega_al_sistema.php?dp_id='+res[0]+'&id_us='+<?php echo $_SESSION["id_us"]; ?>+'"><button type="button" class="btn btn-danger">Agregar este Beneficiario</button></a>');
                        $('#envia1').attr("disabled", true);
                    } 
              })
        }
    });
    
      $("#idsexo").change(function(){
          if($("#idsexo").val() != 3 && $("#idtipodoc").val()==1 && $("#nrodni").val().length ==8){
            if($("#idsexo").val() == 1){
              var nro_in = 27;
              var pte1 = 38;
            } else {
              var nro_in = 20;
              var pte1 = 10;
            }
            var nr1 = Math.floor($("#nrodni").val()/10000000);
            var nr2 = Math.floor($("#nrodni").val()/1000000)-(nr1 * 10);
            var nr3 = Math.floor($("#nrodni").val()/100000)-((nr1 * 100)+(nr2 * 10));
            var nr4 = Math.floor($("#nrodni").val()/10000)-((nr1 * 1000)+(nr2 * 100)+(nr3 * 10));
            var nr5 = Math.floor($("#nrodni").val()/1000)-((nr1 * 10000)+(nr2 * 1000)+(nr3 * 100)+(nr4 * 10));
            var nr6 = Math.floor($("#nrodni").val()/100)-((nr1 * 100000)+(nr2 * 10000)+(nr3 * 1000)+(nr4 * 100)+(nr5 * 10));
            var nr7 = Math.floor($("#nrodni").val()/10)-((nr1 * 1000000)+(nr2 * 100000)+(nr3 * 10000)+(nr4 * 1000)+(nr5 * 100)+(nr6 * 10));
            var nr8 = $("#nrodni").val()-((nr1 * 10000000)+(nr2 * 1000000)+(nr3 * 100000)+(nr4 * 10000)+(nr5 * 1000)+(nr6 * 100)+(nr7 * 10));
            var sum_nro = pte1 + nr1*3 + nr2*2 + nr3*7 + nr4*6 + nr5*5 + nr6*4 + nr7*3 + nr8*2;
            var cosi = Math.floor(sum_nro / 11);
            var resto = sum_nro - (cosi*11);
              if(resto == 0){
                var zz=0;
              } else {
                  if(resto==1){
                            if($("#idsexo").val() == 1){
                                var nro_in = 23;
                                var zz = 4;
                              } else {
                                var nro_in = 23;
                                var zz = 9;
                              }
                  } else {
                    var zz = 11 - resto;
                  }
              }

            $("#nrocuil").val(nro_in+'-'+$("#nrodni").val()+'-'+zz);
          }
      });

      $("#nacim").focusout(function(){
        var fecha = $("#nacim").val();
        if($("#nacim").val() != ""){
          $.get("tools/calcula_edad.php", {fecha_in: fecha}, function(htmlexterno){
              $("#muestra_edad").val(htmlexterno);
          });
        }
      });

  });
  </script>
  <script src="../js/bootstrap-typeahead.js"></script>

<script>
            $(function() {
                function displayResult(item) {
                    $('.alert').show().html('You selected <strong>' + item.value + '</strong>: <strong>' + item.text + '</strong>');
                }
                $('#dpcalle').typeahead({
                    ajax: {
                        url: 'tools/autocom.php?query=%QUERY',
                        method: 'post',
                        triggerLength: 1
                    },
                    onSelect: displayResult
                });

  });
        </script>

<script src="../js/jquery.mask.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function(){
  $('#nrocelu').mask('000-0000000');
  $('#nrotel').mask('000-0000000');
  $('#nrocuil').mask('00-00000000-0');

   $("#iddepartamento").change(function () {  
                $("#iddepartamento option:selected").each(function () {
            elegido=$(this).val();
            $.post("tools/localidades.php", { elegido: elegido }, function(data){
            $("#idlocalidad").html(data);
            });           
        }); 
      });

   $("#idlocalidad").on("change",Buscaloc);
   $("#dpcalle").on("change",Buscaloc);
   $("#geoloc").on("mouseover",Buscaloc);
   $("#nrolocac").on("change",Buscaloc);
               
            
   function Buscaloc (){
        var id_loc = $("#idlocalidad").val();
            var es_calle = $("#dpcalle").val();
            var es_nro = $("#nrolocac").val();
          //  alert(id_loc+es_calle+es_nro);
            $.post("tools/localidades_str.php", { id_loc: id_loc, es_calle: es_calle, es_nro: es_nro }, function(datos){
              $("#address").attr("value",datos);
            });           
         
      };
  
      $("#addfamiliar").click(function(){
          $("#datos_familiar").toggle();
          if( $('#datos_familiar').is(":visible") ){
          $("#parte2").hide();
            } else {
          $("#parte2").show();
            }
      });

      
      
});
    </script>

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