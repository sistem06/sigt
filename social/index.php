<?php
  session_destroy();
  header("Location:../index.php?error=3");
  exit();
?>
