<?php
  //Test de la classe DAO
  require_once("../model/DAO.class.php");
  //Création de l'objet DAO;
  $dao = new DAO();
  //Création de deux offres avec un type test -1
  $ot1 = Offre($dao->genRef(), "titreTest1", "descTest1", -1, 0.1, "28/10/19", "uTest");
  $ot2 = Offre($dao->genRef(), "titreTest2", "descTest2", -1, 0.1, "28/10/19", "uTest");

  //ajout de ces offres à la base de donnée
  $dao->addOffre($ot1);
  $dao->addOffre($ot2);
  //Récupération des offres créées.
  var_dump($dao->getType(-1));

 ?>
