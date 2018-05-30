<?php
 class Asemprenorga extends ActiveRecord\Model {
   public static $table_name = 'tb_emprendedor_organizacion';
   public static $primary_key = 'eo_id';
   public function before_create(){
      $this->fecha_creacion = date('Y-m-d H:i:s');
      $this->fecha_modificacion = date('Y-m-d H:i:s');
   }
   public function before_update(){
      $this->fecha_modificacion = date('Y-m-d H:i:s');
   }
 }
?>