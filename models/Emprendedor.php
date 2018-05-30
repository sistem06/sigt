<?php
 class Emprendedor extends ActiveRecord\Model {
   public static $table_name = 'tb_datos_emprendimiento';
   public static $primary_key = 'em_id';
   public function before_create(){
      $this->fecha_creacion = date('Y-m-d H:i:s');
      $this->fecha_modificacion = date('Y-m-d H:i:s');
   }
   public function before_update(){
      $this->fecha_modificacion = date('Y-m-d H:i:s');
   }
 }
?>