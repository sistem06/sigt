<?php
if ($_SERVER['SERVER_NAME'] == 'localhost') {
  ini_set('display_errors', 'On');
  ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
  error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
} else {
  ini_set('display_errors', 'Off');
  error_reporting(0);
  if(!isset($_SERVER['HTTP_REFERER'])) {
    //session_destroy();
    //$index = __DIR__ .'/index.php';
    //header('Location:'.$index);
    echo "ACCESO DIRECTO RESTRINGIDO";
    exit();
  };
};

$conn = mysql_connect("localhost","sistem06_admin","Bari2012");
mysql_set_charset('utf8');
mysql_select_db("sistem06_informes");
?>
