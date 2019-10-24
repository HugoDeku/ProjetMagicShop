<?php
  //Test de la classe DAO
  require_once("../model/DAO.class.php");
  //Création de l'objet DAO;
  $dao = new DAO();
  //Création d'une array avec des élément de la table type
  $types = array('Créature', 'Noir', 'Rouge', 'Bleu'); //résultat attendu 712
  //Vérification de la valeur
  print("Valeur attendu : 712\nValeur obtenue : ".$dao->genType($types)."\n");
 ?>
