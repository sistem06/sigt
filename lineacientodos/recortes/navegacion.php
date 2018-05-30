<nav class="navbar navbar-default" role="navigation">
  
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#"><?php echo BuscaRegistro ("tb_sistemas", "sis_id", $_SESSION["sistema"], "sis_name"); ?></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Llamados <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="nuevo_registro.php">Llamado Violencia</a></li>
          <li><a href="nuevo_registro_general.php">Llamado Consulta</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Secciones <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="listado_espera.php">Llamados en Espera</a></li>
            <li><a href="listado.php">Listado General</a></li>
            <li><a href="listado_mio.php">Mis Llamados</a></li>
            
          <li class="divider"></li>
          <?php
      iF($_SESSION['sector']==1){
        ?>
            <li><a href="usuarios.php">Usuarios</a></li>
            <?php
      }
      ?>
        </ul>
      </li>
<!-- agregar en otros -->
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Prestaciones <b class="caret"></b></a>
        <ul class="dropdown-menu">
          
            <li><a href="beneficiarios.php">Emprendedores</a></li>
           
            <li class="divider"></li>
            <li><a href="organizaciones.php">Organizaciones</a></li>

        </ul>
      </li>

     <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Informes <b class="caret"></b></a>
        <ul class="dropdown-menu">
          
            <li><a href="beneficiarios.php">Emprendedores</a></li>
           
            <li class="divider"></li>
            <li><a href="organizaciones.php">Organizaciones</a></li>

        </ul>
      </li>
        <?php
        $txt_que_user = "select * from tb_usuarios_sistemas where uss_us_id = ".$_SESSION["id_us"]." and uss_sistema != ".$_SESSION["sector"] ;
        $que_user = mysql_query($txt_que_user);
        $n_user = mysql_num_rows($que_user);
        if($n_user > 0){
          ?>
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sistemas <b class="caret"></b></a>
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
<!-- fin agregar en otros -->

    </ul>
    <div class="col-sm-3 col-md-3">
        <form class="navbar-form" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Buscar" name="q">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
    </div>
    <ul class="nav navbar-nav navbar-right">
      

        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>  <?php echo $_SESSION["usuario"]; ?><b class="caret"></b></a>
        <ul class="dropdown-menu">
         <li><a href="#"><span class="glyphicon glyphicon-user"></span> Mi Perfil</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Configurar</a></li>
                        <li class="divider"></li>
                        <li><a href="../cerrar_sesion.php"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
        </ul>
      </li>


        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-comment"></span>  Conectados <span class="label label-success">8</span></a>
        <ul class="dropdown-menu">
         
                        <li><a href="#"> Fernando Sacara</a></li>
                        <li><a href="#"> Marisa Montes</a></li>
                        <li><a href="#"> Rodrigo Vargas</a></li>
        </ul>
      </li>




      
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-bell"></span> Avisos <span class="label label-danger">32</span>
                </a>
          <ul class="dropdown-menu dropdown-cart" role="menu">
              <li>
                  <span class="item">
                    <span class="item-left">
                        <img src="http://lorempixel.com/50/50/" alt="" />
                        <span class="item-info">
                            <span>Item name</span>
                            <span>23$</span>
                        </span>
                    </span>
                    <span class="item-right">
                        <button class="btn btn-xs btn-danger pull-right">x</button>
                    </span>
                </span>
              </li>
              <li>
                  <span class="item">
                    <span class="item-left">
                        <img src="http://lorempixel.com/50/50/" alt="" />
                        <span class="item-info">
                            <span>Item name</span>
                            <span>23$</span>
                        </span>
                    </span>
                    <span class="item-right">
                        <button class="btn btn-xs btn-danger pull-right">x</button>
                    </span>
                </span>
              </li>
              <li>
                  <span class="item">
                    <span class="item-left">
                        <img src="http://lorempixel.com/50/50/" alt="" />
                        <span class="item-info">
                            <span>Item name</span>
                            <span>23$</span>
                        </span>
                    </span>
                    <span class="item-right">
                        <button class="btn btn-xs btn-danger pull-right">x</button>
                    </span>
                </span>
              </li>
              <li>
                  <span class="item">
                    <span class="item-left">
                        <img src="http://lorempixel.com/50/50/" alt="" />
                        <span class="item-info">
                            <span>Item name</span>
                            <span>23$</span>
                        </span>
                    </span>
                    <span class="item-right">
                        <button class="btn btn-xs btn-danger pull-right">x</button>
                    </span>
                </span>
              </li>
              <li class="divider"></li>
              <li><a class="text-center" href="">View Cart</a></li>
          </ul>
        </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>