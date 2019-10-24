<?php
  //Test de la classe DAO
  require_once("../model/DAO.class.php");
  //creation de l'unique objet DAO
  $dao = new DAO();
  //recupération de la ref la plus grande
  //création de la requête
  $req = "SELECT max(ref) FROM Offre";
  //Éxécution de la requête incrémenter de 1
  $maxRef = $dao->db->query($req)->fetchAll()[0][0] + 1;

  //Verification
  print("Résultat attendu : ".$maxRef."\nRésultat obtenu : ".$dao->genRef()."\n");


 ?>
