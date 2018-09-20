<?php
if (!isset($_SESSION)) { session_start(); }
include ("../../conecta.php");
$txt = 'insert into tb_usuarios_sistemas (uss_us_id, uss_sistema, uss_tipo, uss_conectado)
        values ('.$_GET['us_id'].','.$_SESSION['sistema'].','.$_GET['id_tipo_usr'].', 0)';
$query = mysql_query($txt);
?>
<script type="text/javascript" language="javascript">
  parent.jQuery.fancybox.close();
</script>
