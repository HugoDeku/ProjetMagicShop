<?php
  require_once("../framework/view.class.php");
  require_once("../model/DAO.class.php");
  require_once("../model/Offre.class.php");

  $db = new DAO;
  $listeTypeDB = $db->getTableType();
  $touteLesOffres = $db->getOffres();

  $trieType = array();

  foreach ($_POST['critere'] as $value) {
    $trieType[] = $value;
  }

  foreach ($touteLesOffres as $key => $value) {
    
  }

  var_dump($trieType);

 ?>
