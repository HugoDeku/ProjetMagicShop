<?php
  //Test de la classe DAO
  require_once("../model/DAO.class.php");
  require_once("../model/Offre.class.php");
  //Création de l'objet DAO
  $dao = new DAO();
  //Génération d'une référence
  $refTest = $dao->genRef();
  //Création d'un objet Offre
  $offreTest = new Offre($refTest, "titreTest",
                         "descriptionTest", 2, 0.1, "28/10/19",
                         1);
  //Ajout de l'offre dans la base de données
  $dao->addOffre($offreTest);
  //Récupération depuis la base de données.
  $dao->getTitre("titreTest");


 ?>
