<?php
$lista_miembros = "sin selec";
if(isset($_POST['miembros'])) {
  $pruebarray = $_POST['miembros'];
  $lista_miembros = implode(', ', $pruebarray);
}
?>
<script type="text/javascript" language="javascript">
  var miembros = "<?php echo $lista_miembros; ?>";
  parent.selecMiembrosHogar(miembros);
  parent.jQuery.fancybox.close();
</script>
