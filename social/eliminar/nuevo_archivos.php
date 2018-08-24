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
  <link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="../assets/estilos_ss.css">
  <link rel="stylesheet" type="text/css" href="../source/jquery.fancybox.css?v=2.1.5" media="screen" />

  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />
</head>
<body>
<?php include("../recorte_gral/encabezado.php"); ?>
<div class="container-fluid">
<?php include("recortes/navegacion.php"); ?>
  <!-- comienza contenido -->
</div>
<div class="container">

<!-- aca comienza el calendario -->
          
<div class="paso_in">
<span class="nombre_emp">
<?php
$dom = DatoRegistro ('tb_hogar', 'ho_dom_id', 'ho_id', $_GET['ho_id'], $conn);
echo 'Miembros del Hogar '.DatoRegistro ('tb_domicilios', 'dom_calle', 'dom_id', $dom, $conn).' '.DatoRegistro ('tb_domicilios', 'dom_nro', 'dom_id', $dom, $conn).' (Vivienda '.DatoRegistro ('tb_hogar', 'ho_vivienda_lote_nro', 'ho_id', $_GET['ho_id'], $conn).' - Hogar '.DatoRegistro ('tb_hogar', 'ho_hogar_lote_nro', 'ho_id', $_GET['ho_id'], $conn).')';
?>
</span>

</div>

<div class="panel panel-info">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-picture"></span>  Adjuntar Imagenes</div>
  </h3>

<?php
$tx_b = "select * from tb_hogar_beneficiario where hb_ho_id =".$_GET['ho_id'];
$dat_b =mysql_fetch_array(mysql_query($tx_b));
$dp_id =$dat_b['hb_dp_id'];
  $txt_ar = "select * from tb_imagenes where (img_dp_id = '".$dp_id."')";
  $query_ar = mysql_query($txt_ar);
  $n_ar = mysql_num_rows($query_ar);
  if ($n_ar==0){
?>
  <form id="parte1" action="tools/add_archivo.php" method="post" role="form" enctype="multipart/form-data" style="padding:10px;">
<?php
$tx_b = "select * from tb_hogar_beneficiario where hb_ho_id =".$_GET['ho_id'];
$dat_b =mysql_fetch_array(mysql_query($tx_b));
$dp_id =$dat_b['hb_dp_id'];
echo "<h3>Imagen del documento de ".BuscaRegistro ("tb_datos_personales", "dp_id", $dp_id, "dp_name")."</h3>";
?>
  <div class="form-group">
  <label class="control-label">Seleccione la imagen del DNI:</label>
                    <input id="input-es" type="file" class="file" multiple="false" data-preview-file-type="any" name="foto" data-allowed-file-extensions='["jpg", "jpeg"]' >
                </div>
                <input type="hidden" name="dp_id" value ="<?php echo $dp_id; ?>">
                <input type="hidden" name="ho_id" value ="<?php echo $_GET['ho_id']; ?>">


  </form>
  <div class="alert alert-danger" role="alert" id="muy_grande" style="display:none">El erchivo a subir es demasiado grande</div>
  <?php
} else {
  $a_ar = mysql_fetch_array($query_ar);
  ?>
  <div style="padding:15px; margin:10px;float:left; border: solid 1px #ddd;">
<img src="../imagenes/dni_th_<?php echo $dp_id; ?>.jpg">
<br><br>
<a href="tools/quitar.php?val=<?php echo $dp_id; ?>&id=img_id&tabla=tb_imagenes"  title="eliminar" class="fancybox fancybox.iframe"><button class="btn btn-danger">Quitar</button></a>
</div>
<br clear="all">
<?php
}
?>
</div>
<form id="parte2" action="tools/add_registro.php" method="post" role="form">
<button type="submit" class="btn btn-info" id="envia2">Continuar al siguiente paso</button>
<input type="hidden" name="paso" value="102">
<input type="hidden" name="dp_id" value="<?php echo $dp_id; ?>">
<input type="hidden" name="ho_id" value="<?php echo $_GET['ho_id']; ?>">
<input type="hidden" name="id_us" value="<?php echo $_SESSION["id_us"]; ?>">
 </form>




          


  <!-- fin contenido -->
</div>
<br><br><br><br>
<?php include("../recorte_gral/pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/sortable.js" type="text/javascript"></script>
    <script src="../js/fileinput.js" type="text/javascript"></script>
    <script src="../js/locales/es.js" type="text/javascript"></script>
 
  

  <script type="text/javascript" language="javascript">
    $(document).ready(function() {
     $("#input-es").change(function (){
     var sizeByte = this.files[0].size;
     var siezekiloByte = parseInt(sizeByte / 1024);
  
     if(siezekiloByte > 1000){
    
         $("#muy_grande").show();
            $("#parte1").submit(function(e){
                 e.preventDefault();
              });
     } else {
        $("#muy_grande").hide();
      //   $("#parte1").unbind('submit').submit()

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
  
</body>
</html>