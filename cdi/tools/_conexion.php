<?php
	error_reporting(0);
 require_once '../../libraries/php-activerecord/ActiveRecord.php';
 ActiveRecord\Config::initialize(function($cfg)
 {
    $cfg->set_model_directory('../../models');
    $cfg->set_connections(array(
    'development' => 'mysql://sistem06_admin:Bari2012@localhost/sistem06_informes;charset=utf8'));
 }); 
?>