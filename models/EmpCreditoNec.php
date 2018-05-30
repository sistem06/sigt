<?php
 class EmpCreditoNec extends ActiveRecord\Model {
   public static $table_name = 'tb_emprendedor_credito_nec';
   public static $primary_key = 'ecn_id';
   public function before_create(){
      $this->fecha_creacion = date('Y-m-d H:i:s');
      $this->fecha_modificacion = date('Y-m-d H:i:s');
   }
   public function before_update(){
      $this->fecha_modificacion = date('Y-m-d H:i:s');
   }
 }
?>