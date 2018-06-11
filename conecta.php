<?php
/*sk01**	error_reporting(0); */
/*sk01*/  if ($_SERVER['SERVER_NAME'] == 'localhost') {
/*sk01*/    ini_set('display_errors', 'On');
/*sk01*/    error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
/*sk01*/  } else {
/*sk01*/    ini_set('display_errors', 'Off');
/*sk01*/    error_reporting(0);
/*sk01*/  };

$conn = mysql_connect("localhost","sistem06_admin","Bari2012");
mysql_set_charset('utf8');
mysql_select_db("sistem06_informes");
?>
