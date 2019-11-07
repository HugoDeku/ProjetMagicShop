<?php
  require_once('../model/DAO.class.php');
  require_once('../model/Utilisateur.class.php');
  require_once('../framework/view.class.php');
  require_once('../model/Offre.class.php');
  session_start();
  $user = $_SESSION['user'];
  $db = new DAO;
  session_write_close();



  $ref = $db->genRef();
  $titre = $_POST['titre'];
  $description = $_POST['description'];
  if(!count($_POST['critere'])==0){
    $type = $db->genType($_POST['critere']);
  }else{
    $type = 0;
  }
  $prix = $_POST['prix'];
  $date = date("Y-m-d");
  $nom = $user->getNom();

  $offre = new Offre($ref,$titre,$description,$type,$prix,$date,$nom);
  $db->addOffre($offre);

  $view =new View("AjoutReussit");
  $view->show();



?>
