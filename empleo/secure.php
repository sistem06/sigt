<?php
if (!isset($_SESSION)) { session_start(); }
if ($_SESSION["autenticado"] != "si" or $_SESSION["sector"] == "" or $_SESSION["sistema"] != 2) {
	session_destroy();
    header("Location:../index.php?error=3");
    exit();
}
?>
