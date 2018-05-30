<?php
include ("../conecta.php");
$dat = utf8_decode($_POST['ejemplo']);
mysql_query("insert into tb1 (dat) values ('$dat')");
echo $dat;
?>