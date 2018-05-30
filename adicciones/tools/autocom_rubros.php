<?php
     include("../../conecta.php");
     $tx = 'SELECT sr_id,sr_name FROM tb_subrubros LIMIT 0,2';
     $result = mysql_query($tx);
     while($row = mysql_fetch_array($result)){
     		$user_arr[] = $row['sr_id'];
     		$user_arr2[] = $row['sr_name'];
     }
     echo json_encode($user_arr2);
?>