<?php
  require_once("../framework/view.class.php");
  require_once("../model/Utilisateur.class.php");
  require_once("../model/DAO.class.php");

  $db = new DAO;

  $nom = htmlentities($_POST['nom']);
  $mdp = htmlentities($_POST['mdp']);
  $view = new View("Connexion");

  $user = $db->getUser($nom);
  if($user == NULL){
    $user = $db->getUserParMail($nom);
    if($user == NULL){
      $view->erreur = "Le nom/e-mail est incorrect";
      $view->show();
      exit();
    }
  }
  if(($nom == $user['nom'] || $nom == $user['mail']) && $mdp == $user['password']){
    session_start();

    $_SESSION['user'] = new Utilisateur($user['id'],$user['nom'],$user['mail'],$user['password']);
    $view->show("Accueil");
    session_write_close();
  }else{
    $view->erreur = "Le nom/e-mail ou le mot de passe est incorrect";
    $view->show();
  }




 ?>
