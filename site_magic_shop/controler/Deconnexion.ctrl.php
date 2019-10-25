<?php
  require_once("../framework/view.class.php");
  session_start();
  session_destroy();
  $view = new View("Accueil");
  $view->show();


 ?>
