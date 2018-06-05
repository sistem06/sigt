<?php
/*sk01**	error_reporting(0); */
/*sk01*/  if ($_SERVER['SERVER_NAME'] == 'localhost') {
/*sk01*/    error_reporting(E_ALL);
/*sk01*/  } else {
/*sk01*/    error_reporting(0);
/*sk01*/  };

$conn = mysql_connect("localhost","sistem06_admin","Bari2012");
mysql_set_charset('utf8');
mysql_select_db("sistem06_informes");
?>
