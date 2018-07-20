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
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Emprendedores <b class="caret"></b></a>
        <ul class="dropdown-menu">

            <li><a href="beneficiarios.php">Listado Emprendedores</a></li>
            <li><a href="nuevo_registro.php">Nuevo Emprendedor</a></li>
            <li class="divider"></li>
            <li><a href="organizaciones.php">Organizaciones</a></li>
            <li><a href="ferias.php">Ferias</a></li>
            <li><a href="zonas.php">Zonas de Comercialización</a></li>
            <li><a href="comercios_list.php">Comercios</a></li>
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
            <li><a href="gestor_prestaciones.php">Gestión de Prestaciones</a></li>            
            <li class="divider"></li>
            <li><a href="alta_prestacion_individual.php">Asignación de Prestaciones Individuales</a></li>
            <li><a href="alta_prestacion_grupal.php">Asignación de Prestaciones Grupales</a></li>
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
        <!--menu sistemas -->
        <?php include("../recorte_gral/menu_sistemas.php"); ?>
    <!--fin menu sistemas -->
<!-- fin agregar en otros -->

    </ul>

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
                        <img src="../images/msg_icon_01.jpg" width="50px" height="50px" alt="" />
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
                        <img src="../images/msg_icon_01.jpg" width="50px" height="50px" alt="" />
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
                        <img src="../images/msg_icon_01.jpg" width="50px" height="50px" alt="" />
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
                        <img src="../images/msg_icon_01.jpg" width="50px" height="50px" alt="" />
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
