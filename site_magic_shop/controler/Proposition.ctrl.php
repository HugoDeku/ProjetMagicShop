<?php
  require_once("../framework/view.class.php");

  session_start()
  if(isset($_SESSION['user'])){
    $vue = new View("Proposition");
    $vue->show();
  }else{
    $vue = new View("Erreur");
    $vue->message = "Vous avez besoin d'un compte pour pouvoir proposer une offre";
    $vue->show();
  }
 ?>
