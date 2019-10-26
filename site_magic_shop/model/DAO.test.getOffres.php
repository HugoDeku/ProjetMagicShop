<?php
  require_once("../model/Offre.class.php");
  require_once("../model/DAO.class.php");

  $db = new DAO;
  $array = $db->getOffres();

  $types = $db->getTableType();

  $type = $array[0]->getListeType($types);
  var_dump($type);

  foreach ($type as $key => $value) {
    if($value == "Rouge"){
      echo "oui";
    }
  }


 ?>
