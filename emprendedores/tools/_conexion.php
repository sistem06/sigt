<?php
 require_once '../../libraries/php-activerecord/ActiveRecord.php';
 ActiveRecord\Config::initialize(function($cfg)
 {
    $cfg->set_model_directory('../../models');
    $cfg->set_connections(array(
/*sk01** 'development' => 'mysql://sistem06_admin:Bari2012@localhost/sistem06_informes'));	*/
/*sk01*/ 'development' => 'mysql://sistem06_admin:Bari2012@localhost/sistem06_informes;charset=utf8'));
 });

 if ($_SERVER['SERVER_NAME'] == 'localhost') {
   /*ini_set('display_errors', 'On'); */
   ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
   error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
 } else {
   ini_set('display_errors', 'Off');
   error_reporting(0);
 };
?>
