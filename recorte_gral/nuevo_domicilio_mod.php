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

<?php
$ho_id = BuscaRegistro("tb_hogar_beneficiario","hb_dp_id",$_GET['dp_id'],"hb_ho_id");
$dom_id = BuscaRegistro("tb_hogar","ho_id",$ho_id,"ho_dom_id");

$modif_grupo_hogar = 0;
if(!empty($dom_id)){
	if(NroRegistro("tb_hogar_beneficiario", "hb_ho_id", $ho_id)>1) {
		$modif_grupo_hogar = 1;
	};
};
?>

<a href="tools/cambios_hogar.php?dp_id=<?php echo $_GET['dp_id']; ?>&ho_id=<?php echo $ho_id; ?>"
	title="modificar" class="fancybox fancybox.iframe" id="modifica_hogar"></a>

<?php include("datos_change_domicilio.php"); ?>

<br><br><br><br>
<?php include("pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/combinado_localidades.js"></script>
<script type="text/javascript" src="../js/geolocaliza.js"></script>
<script type="text/javascript" src="../js/validacion_calle.js"></script>
<script type="text/javascript" src="../js/predictivo_calles.js"></script>
<script type="text/javascript" src="../js/busca_barrio.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
  	$("#parte1").submit(function(event) {
		   if($("#dpcalle").val() != "" && $("#dpcalle").val() != $("#valor_calle").val()){
		          $("#falta_calle").show();
		          event.preventDefault();
       }
    });


		if ($("#iddepartamento").val()=="") {
			$("#iddepartamento").selectedIndex = 3;
			$("#iddepartamento").val(3);
		};

	  var elegido=$("#iddepartamento").val();
		localidad=$("#idlocalidad").val();
	  $.post("localidades.php", { elegido: elegido, localidad: localidad }, function(data){
	        $("#idlocalidad").html(data);
    });
  });
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

	$("#modifica_hogar").fancybox({
		afterClose  : function() {
				//window.location.reload();
		}
	});


	$("#modifica_hogar").fancybox({
			closeClick  : false,
			openEffect  : 'none',
			closeEffect : 'none',
			closeBtn : false ,
			helpers   : {
				  title: null,
					overlay : {
							closeClick: false,
					}
			},
			keys : {
    		close  : null
			}
	});
//	}).trigger("click");

	var modif_grupo_hogar = "<?php echo $modif_grupo_hogar ?>";

	if(modif_grupo_hogar == 1){
		document.getElementById("modifica_hogar").click();
	}

});
</script>

<script language="javascript">
  function selecMiembrosHogar(miembros){
	 var text = miembros;
   document.getElementById('lista_id_miembros').value = text;
   }
</script>
<script type="text/javascript" language="javascript">
$(document).ready(function() {

     $(this).keydown( function (e) {
        var keycode = null;
        if(window.event) {
            keycode = e.keyCode;
        }else if(e) {
            keycode = e.which;
        }

  		 if(keycode=="9"){
 			 	return false;
       }
       else if(keycode=="13"){
        return false;
       }
       else if(keycode=="17"){
			 	return false;
       }
			 else if(keycode=="37"){
 			 	return false;
       }
       else if(keycode=="38"){
        return false;
       }
       else if(keycode=="39"){
			 	return false;
       }
			 else if(keycode=="40"){
			 	return false;
       }
    });
});
</script>

</body>
</html>
