<div id="navbar" class="navbar-collapse collapse">
 <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Secciones <span class="sr-only">(current)</span></a></li>
            <?php
			iF($_SESSION['sector']==1){
				?>
            <li><a href="usuarios.php">Usuarios</a></li>
            <?php
			}
			?>
            <li><a href="emprendedores.php">Emprendedores</a></li>
            <li><a href="nuevo_registro.php">Nuevo Emprendedor</a></li>
            <li><a href="organizaciones.php">Organizaciones</a></li>
            <li><a href="ferias.php">Ferias</a></li>
            <li><a href="zonas.php">Zonas de Comercialización</a></li>
       <!--     <li><a href="zonas.php">Puntos de Venta (Comercios)</a></li> -->
          </ul>
          <!--
		  <div id="users_chat">
		  <h3>Chat</h3>
          </div>
          -->
		</div> 