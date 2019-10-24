<?php
  require_once("../model/DAO.class.php");
  require_once("../model/Utilisateur.class.php");

  $db = new DAO();


  $nom = htmlentities($_POST['nom']);
  $mdp = htmlentities($_POST['mdp']);
  $mail = htmlentities($_POST['mail']);

  session_start();
  $verifNom = true;
  $verifMail = true;
  if($db->verifDispoNom($nom)){
    if($db->verifDispoMail($mail)){
      $id = $db->genereID();
      $user = new Utilisateur($id,$nom,$mail,$mdp);
      $db->addUser($user);
      $_SESSION['user'] = $user;
    }else{
      $verifMail = false;
    }
  }else{
    $verifNom = false;
  }
  $_SESSION['verifNom'] = $verifNom;
  $_SESSION['verifMail'] = $verifMail;
  session_write_close();
  $view = new View("FormulaireInscription");
  $view->show();

 ?>
