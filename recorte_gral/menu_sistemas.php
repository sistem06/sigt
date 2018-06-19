<?php
        $txt_que_user = "select * from tb_usuarios_sistemas where uss_us_id = ".$_SESSION["id_us"]." and uss_sistema != ".$_SESSION["sistema"] ;
        $que_user = mysql_query($txt_que_user);
        $n_user = mysql_num_rows($que_user);
        if($n_user > 0){
          ?>
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Áreas <b class="caret"></b></a>
        <ul class="dropdown-menu">

          <?php
          while($a_user = mysql_fetch_array($que_user)){
            $id_sis = $a_user['uss_sistema'];
            $data_sis = mysql_fetch_array(mysql_query("select * from tb_sistemas where sis_id = '$id_sis'"))
            ?>

            <li><a href="../change_sis.php?sis_id=<?php echo $data_sis['sis_id']; ?>"><?php echo $data_sis['sis_name']; ?></a></li>
            <?php
          }
          ?>
        </ul>
      </li>
      <?php
    }
    ?>
