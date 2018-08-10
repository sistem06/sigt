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

<form id="parte2" action="add_registro.php" method="post" role="form">
<br>
<button type="submit" class="btn btn-info" id="envia2">Guardar y Volver</button>
<input type="hidden" name="paso" value="101">
<input type="hidden" name="dp_id" value="<?php echo $_GET['dp_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
 </form>


<div style="display:none;" id="datos_familiar">

 <h3>Nuevo Miembro</h3>

<form id="parte0" method="post" role="form">
<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-search"></span>  Dato Inicial</div>
  </h3>
</div>
<div class="form-group has-success">
  <label for="nro_doc">Número de Documento:</label>
  <input type="text" class="form-control" id="nro_doc" maxlength="8">
  <div class="requerido" id="falta_nro_doc">Faltan números en el DNI ingresado</div>
</div>
<div class="form-group">
<button type="button" class="btn btn-info" id="verificar">Verificar</button>
</div>
<input type="hidden" id="sistema_actual" value="<?php echo $_SESSION["sistema"]; ?>">
</form>



<!-- Se ingresa una nueva persona al sistema porque no existía en la db -->
    <div id="respuesta_dni_nueva" style="display:none;"><?php include("datos_personales_familiar.php"); ?></div>
<!-- Se asocia perona existente en la db como familiar -->
    <div id="respuesta_dni_anterior" style="display:none;"><?php include("datos_personales_familiar_corto.php"); ?></div>


</div>
</div>
<br><br><br><br><br><br><br><br>

<?php include("pie.php"); ?>

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

      $("#verificar").click(function() {
          if($("#nro_doc").val().length < 7){
            $("#falta_nro_doc").show();
          } else {
            var nro_doc = $("#nro_doc").val();
            var sistema_actual = $("#sistema_actual").val();
            $.get("../assets/comprobar_inicial_familiar.php", {dnii: nro_doc, tabla: "tb_datos_personales", valorbusc: "dp_nro_doc",actual: sistema_actual}, function(respuesta){
                if(respuesta == "A"){
	                $("#parte0").hide();
	                $("#respuesta_dni_nueva").show();
	                $("#respuesta_dni_anterior").remove();
	                $("#nrodni").attr('disabled','disabled');
									$("#pasa_tipo_doc").val($('select idtipodoc:first-child'))
	                $("#idtipodoc").attr('disabled','disabled');
	                $("#nrodni").val(nro_doc);
	                $("#pasa_dni").val(nro_doc);
                } else {
	                $("#respuesta_dni_anterior").show();
	             		var res = respuesta.split("|");
	                $("#parte0").hide();
	                $("#respuesta_dni_nueva").remove();
	                $("#nrodni").attr('disabled','disabled');
									$("#pasa_tipo_doc").val($('select idtipodoc:first-child'))
	                $("#idtipodoc").attr('disabled','disabled');
	                $("#nrodni").val(nro_doc);
	                $("#pasa_dni").val(nro_doc);
	                $("#idnombre").val(res[3]);
	                $("#pasa_id").val(res[4]);
	                $("#idapellido").val(res[2]);
	                $("#idnombre").attr('disabled','disabled');
	                $("#idapellido").attr('disabled','disabled');
	            	}

            })
          }
      });



      $("#envia1").click(function() {
        if($("#tratamiento").val()=="largo"){
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
