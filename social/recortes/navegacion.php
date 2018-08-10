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
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Secciones <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <?php
            iF($_SESSION['sector']==1){
          ?>
            <li><a href="../recorte_gral/usuarios.php">Usuarios</a></li>
          <?php
            }
          ?>
        <li class="divider"></li>
            <li><a href="../social/beneficiarios.php">Personas</a></li>
            <li><a href="../recorte_gral/nuevo_persona.php">Alta de Persona</a></li>
        <li class="divider"></li>
            <li><a href="../social/hogares.php">Hogares</a></li>
            <li><a href="../social/nuevo_registro.php">Nuevo Hogar</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Prestaciones <b class="caret"></b></a>
        <ul class="dropdown-menu">

            <li><a href="../social/beneficiarios.php">Emprendedores</a></li>

            <li class="divider"></li>
            <li><a href="../social/organizaciones.php">Organizaciones</a></li>

        </ul>
      </li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Informes <b class="caret"></b></a>
        <ul class="dropdown-menu">

            <li><a href="../social/beneficiarios.php">Emprendedores</a></li>

            <li class="divider"></li>
            <li><a href="../social/organizaciones.php">Organizaciones</a></li>

        </ul>
      </li>
      <!--menu sistemas -->
      <?php include("../recorte_gral/menu_sistemas.php"); ?>
      <!--fin menu sistemas -->
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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-bell"></span> Avisos <span class="label label-danger">32</span>
                </a>
          <ul class="dropdown-menu dropdown-cart" role="menu">
              <li>
                  <span class="item">
                    <span class="item-left">
                        <!--<img src="../images/msg_icon_01.jpg" width="50px" height="50px" alt="" />-->
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
                        <!--<img src="../images/msg_icon_01.jpg" width="50px" height="50px" alt="" />-->
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
                        <!--<img src="../images/msg_icon_01.jpg" width="50px" height="50px" alt="" />-->
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
                        <!--<img src="../images/msg_icon_01.jpg" width="50px" height="50px" alt="" />-->
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
