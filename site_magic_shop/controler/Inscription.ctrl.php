<?php
  require_once("../model/DAO.class.php");
  require_once("../model/Utilisateur.class.php");
  require_once("../framework/view.class.php");

  $db = new DAO;


  $nom = htmlentities($_POST['nom']);
  $mdp = htmlentities($_POST['mdp']);
  $mail = htmlentities($_POST['mail']);

  session_start();
  $view = new View("Inscription");
  if($db->verifDispoNom($nom)){
    if($db->verifDispoMail($mail)){
      $user = new Utilisateur($nom,$mail,$mdp);
      $db->addUser($user);
      $_SESSION['user'] = $user;
    }else{
      $view->verifMail = false;
    }
  }else{
    $view->verifNom = false;
  }

  session_write_close();

  $view->show();

 ?>
