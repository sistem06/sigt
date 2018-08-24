<?php
include ("../conecta.php");
$dat = $_POST['ejemplo'];
mysql_query("insert into tb1 (dat) values ('$dat')");
echo $dat;
?>
