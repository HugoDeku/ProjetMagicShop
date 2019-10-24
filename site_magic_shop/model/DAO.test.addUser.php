<?php
  //Permet de tester le bon fonctionnement des méthodes :
  //addUser()
  //getUser(int) : array
  //removeUser(int)
  //genereID() : int

  //Test de la classe DAO
  require_once("../model/DAO.class.php");

  //Creation de l'unique objet DAO
  $dao = new DAO();

  //Creation d'un Utilisateur
  $id = $dao->genereID();
  $utilisateur = new Utilisateur($id, "utilisateurTest", "test@gmail.com", "0000");

  //ajout de l'uitilisateur à la base de données
  $dao->addUser($utilisateur);

  //verification de l'ajout de l'utilisateur.
  var_dump($dao->getUser($id));

 ?>
