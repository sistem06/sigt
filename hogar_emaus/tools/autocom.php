<?php
     include("../../conecta.php");
     $tx = 'SELECT ca_id,ca_name FROM tb_calle where ca_name like "%'.$_POST['query'].'%"  LIMIT 0,10';
     $result = mysql_query($tx);
     while($row = mysql_fetch_array($result)){
     		$user_arr[] = $row['ca_id'];
     		$user_arr2[] = $row['ca_name'];
     }
     echo json_encode($user_arr2);
?>