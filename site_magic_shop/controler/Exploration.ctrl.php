<?php
  require_once("../framework/view.class.php");
  require_once("../model/DAO.class.php");
  require_once("../model/Offre.class.php");

  $db = new DAO;
  $listeTypeDB = $db->getTableType();
  $touteLesOffres = $db->getOffres();
  $trieType = array();
  $offreCorrespondantes = array();

  foreach($_POST['critere'] as $value) {
      $trieType[] = $value;
  }

  if($trieType == NULL){
    foreach ($listeTypeDB as $key => $value) {
      $trieType[] = $value['texteCorrespondant'];
    }
  }
  if($_POST['Correspondance'] == "Doit correspondre parfaitement"){
    $idParfait = $db->genType($trieType);
    $offreCorrespondantes = $db->getType($idParfait);
  }else{
    foreach ($touteLesOffres as $value) {
    $typeOffre = $value->getListeType($listeTypeDB);
    $bool = false;
    foreach ($typeOffre as $valTypeOffre){
      foreach ($trieType as $valTrie) {
        if($valTypeOffre == $valTrie){
          $bool = true;
        }
      }
    }
    if($bool){
      $offreCorrespondantes[] = $value;
    }
  }
  }
  $view = new View("Exploration");
  $view->offres = $offreCorrespondantes;
  $view->show();

 ?>
