<?php
  require_once("../model/DAO.class.php");
  require_once("../model/Utilisateur.class.php");

  $db = new DAO();


  $nom = htmlentities($_POST['nom']);
  $mdp = htmlentities($_POST['mdp']);
  $mail = htmlentities($_POST['mail']);

  start
  if($db->verifDispoNom($nom)){
    if($db->verifDispoMail($mail)){
      $id = $db->genereID();
      $user = new Utilisateur($id,$nom,$mail,$mdp);


    }
  }else {

  }

 ?>
